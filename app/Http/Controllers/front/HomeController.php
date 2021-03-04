<?php

namespace App\Http\Controllers\front;

use App\Helpers\cart;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Download;
use App\Models\Message;
use App\Models\Product;
use App\Models\Purchlist;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\User;
use App\Models\Userlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('distribute', 'انتشار')->get();
        $products = Product::where('distribute', 'انتشار')->get();
        $banners = Banner::where('distribute', 'انتشار')->get();
        $blogs = Blog::where('status', 'انتشار')->latest()->get();
        return view('front.index', compact('sliders', 'products', 'banners', 'blogs'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function cart()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return view('front.cart', compact('cart'));
    }

    public function category($id, $sort = 0)
    {
        $pro = Product::latest()->get();
        $categoryId = Category::where('title', $id)->first()->id;
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $categories = Category::find($categoryId)->products->pluck('id')->toArray();
        $title = Category::find($categoryId);
        if ($sort == 2) {
            $products = Product::whereIn('id', $categories)
                ->orderBy('price', 'asc')
                ->get();
        }
        if ($sort == 1) {
            $products = Product::whereIn('id', $categories)
                ->orderBy('price', 'desc')
                ->get();
        }
        if ($sort == 3) {
            $products = Product::whereIn('id', $categories)
                ->orderBy('exist', 'desc')
                ->get();
        }
        if ($sort == 0) {
            $products = Product::whereIn('id', $categories)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return view('front.category', compact('navcategories', 'maincategories', 'subcategories', 'products', 'title', 'pro', 'id'));
    }

    public function checkout()
    {
        if (!auth()->user()) {
            return redirect()->route('login')->with('checkout', 'لطفا ابتدا ثبت نام فرمایید.اگر ثبت نام کرده اید ورود کنید.');
        }
        $user = User::find(auth()->user()->id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return view('front.checkout', compact('cart', 'user'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function fag()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        return view('front.fag', compact('navcategories', 'maincategories', 'subcategories'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categoryIds = $product->categories->pluck('id')->toArray();
        $relatedProducts = Product::whereHas('categories', function ($q) use ($categoryIds) {
            $q->whereIn('categories.id', $categoryIds);
        })->get();
        return view('front.product', compact('product', 'relatedProducts'));
    }

    public function addcart(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldcart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return back()->with('success', 'محصول مورد نظر به سبد افزوده شد.');
    }

//    public function addcartdownload(Request $request, $id)
//    {
//        $product = Download::findOrFail($id);
//        $oldcart = Session::has('cart') ? Session::get('cart') : null;
//        $cart = new  cart($oldcart);
//        $cart->add($product, $product->id);
//        $request->session()->put('cart', $cart);
//        return back();
//    }

    public function removeproduct(Request $request, $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($cart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);
        unset($cart->items[$id]);
        return back();
    }

//    public function removedownload(Request $request, $id)
//    {
//        $product = Download::findOrFail($id);
//        $cart = Session::has('cart') ? Session::get('cart') : null;
//        $cart = new cart($cart);
//        $cart->remove($product, $product->id);
//        $request->session()->put('cart', $cart);
//        unset($cart->items[$id]);
//        return back();
//    }

    public function addqty(Request $request, $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        if ($request->quantity < $product->count) {
            $cart = new cart($cart);
            $cart->addnumber($product, $product->id, $request->quantity);
            $request->session()->put('cart', $cart);
            return back();
        }
        Session::flash('mount', 'متاسفانه مقدار انتخابی برای این محصول بیش از تعداد موجود در انبار می باشد.');
        return back();
    }

    public function topay(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->save();

        $userlist = new Userlist();
        $userlist->user_id = auth()->user()->id;
        $userlist->factor = $this->factor();
        $userlist->totalprice = Session::get('cart')->totalPrice;
        $userlist->receiveprice = $request->checkout_payment_method;
        $userlist->save();

        foreach (Session::get('cart')->items as $person) {
            if (isset($person['item']->slug)) {
                $purchlist = Purchlist::create([
                    'product_id' => $person['item']->id,
                    'count' => $person['qty'],
                    'price' => $person['price'],
                    'factor_number' => $userlist->id,
                ]);
            } else {
                $purchlist = Purchlist::create([
                    'product_id' => "download" . $person['item']->id,
                    'count' => $person['qty'],
                    'price' => $person['price'],
                    'factor_number' => $userlist->id,
                ]);
            }

//            $purchlist->factor_number = $userlist->id;
            $purchlist->save();
        }

        return redirect()->route('pay');
    }

    public function factor()
    {
        $number = rand(10000, 9999999);
        if ($this->checkfactor($number)) {
            return $this->factor();
        }
        return $number;
    }

    public function checkfactor($number)
    {
        return Userlist::where('factor', $number)->exists();
    }

    public function profile()
    {
        if (Auth::check()) {
            $userlists = Userlist::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
            foreach ($userlists->pluck('id') as $userlist) {
                $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get();
            }
            if (!isset($purchlist)) {
                $purchlist = null;
            }

            //        foreach ($purchlist->product_id as $purch) {
//            foreach ($purch as $p) {
//                $purchdownload[] = Download::where('id', 'like',  '%' . $p->product_id .'%')->get();
//            }
//        }
            $purchl = Product::with('photos')->get();
            $messages = Message::where('type', 'send')->get();
            $downloads = Download::all();
            return view('front.profile', compact('purchlist', 'userlists', 'purchl', 'messages', 'downloads'));
        }
        return redirect()->route('login');
    }

    public static function sendmail($id)
    {
        $user = User::findOrFail($id);
        $userlists = Userlist::where('user_id', $id)->where('status', 'success')->latest('created_at')->first();
        foreach ($userlists->pluck('id') as $userlist) {
            $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get();
        }
        if (!isset($purchlist)) {
            $purchlist = null;
        }
        $purchl = Product::with('photos')->get();
        Mail::send('front/mail',
            [
                'user' => $user,
                'userlists' => $userlists,
                'purchlists' => $purchlist,
                'purchl' => $purchl,
            ], function ($m) use ($user) {
                $m->from('info@tabrizrobot.ir', 'مبتکران آذر ذهن');
                $m->to($user->email, $user->name)->subject('فاکتور خرید(tabrizrobot.ir)');
            });

        Mail::send('front/mail',
            [
                'user' => $user,
                'userlists' => $userlists,
                'purchlists' => $purchlist,
                'purchl' => $purchl,
            ], function ($m) use ($user) {
                $m->from('info@tabrizrobot.ir', 'مبتکران آذر ذهن');
                $m->to('maztabriz@gmail.com', $user->name)->subject('فاکتور خرید(tabrizrobot.ir)');
            });

        return "ok";
    }

    public function message(Request $request)
    {
        if (!$request->id) {
            $validator = Validator::make($request->all(), [
                'g-recaptcha-response' => 'required|captcha',
                'email' => 'required|email',
                'description' => 'required',
            ], [
                'g-recaptcha-response.required' => 'لطفا اعتبار سنجی کنید',
                'g-recaptcha-response.captcha' => 'مشکل در کپچرا.لطفا بعدا امتحان کنید.',
                'emai.required' => 'لطفا ایمیل خود را وارد کنید.',
                'emai.email' => 'لطفا ایمیل معتبر وارد کنید.',
                'description.required' => 'لطفا متن خود را وارد کنید.',
            ]);
            $validator->validate();
        }

        $message = new Message();
        $message->name = $request->name;
        $message->description = $request->description;
        $message->type = "get";

        if (!$request->id) {
            $message->email = $request->email;
        } else {
            $mail = User::findOrFail($request->id)->email;
            $message->email = $mail;
        }

        if ($request->id)
            $message->user_id = $request->id;

        $message->save();
        Session::flash('message', ' با تشکر از شما، نظر شما ارسال شد.');

        if (isset($request->id)) {
            return redirect()->route('profile');
        } else {
            return back();
        }
    }

    public function messageApi()
    {
        $message = Message::where('type', 'public')->latest('created_at');
        return response()->json($message, 200);
    }

//    public function downloads()
//    {
//        $navcategories = Category::where('type', 'null')->get();
//        $maincategories = Category::where('type', '!=', 'null')->get();
//        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
//        $downloads = Download::all();
//        return view('front.download', compact('navcategories', 'maincategories', 'subcategories', 'downloads'));
//    }

    public function direct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha',
            'price' => 'required|numeric',
        ], [
            'g-recaptcha-response.required' => 'لطفا اعتبار سنجی کنید',
            'g-recaptcha-response.captcha' => 'مشکل در کپچرا.لطفا بعدا امتحان کنید.',
            'price.required' => 'لطفا مبلغ خود را وارد کنید.',
            'price.numeric' => 'لطفا مبلغ معتبر وارد کنید.',
        ]);
        $validator->validate();
        $data = [
            'mount' => $request->price,
            'name' => $request->name,
            'description' => $request->description
        ];

        Session::put('data', $data);
        return redirect()->route('pay2');
    }

    public function userUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|min:7|max:12',
//            'city' => 'required',
//            'address' => 'required',
//            'postcode' => 'numeric',
        ], [
            'fname.required' => 'لطفا نام خود را وارد کنید.',
            'lname.required' => 'لطفا نام خانوادگی خود را وارد کنید.',
            'phone.required' => 'لطفا تلفن تماس خود را وارد کنید',
            'phone.min' => 'لطفا شماره تماس معتبر وارد کنید.',
            'phone.max' => 'لطفا شماره تماس معتبر وارد کنید.',
//            'city.required' => 'لطفا شهر خود را وارد کنید.',
//            'address.required' => 'لطفا آدرس خود را وارد کنید.',
//            'postcode.required' => 'لزفا کد پستی خود را وارد کنید.',
//            'postcode.numeric' => 'لطفا کدپستی معتبر وارد کنید.',
        ]);
        $validator->validate();

        $user = User::find(auth()->user()->id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->postcode = $request->postcode;
//        $user->password = Hash::make($request->password);
        $user->save();

        return back();
    }

    public function apiGetProducts()
    {
        $products = Product::latest()->get();
        $response = ['products' => $products];
        return response()->json($response, 200);
    }

    public function downloadvideo($id)
    {
        if ($id == 1)
            return response()->download(getcwd() . '/front/image/video/elevator.mp4', 'جرثقیل');
        elseif ($id == 2)
            return response()->download(getcwd() . '/front/image/video/simple.mp4', 'سیستم ساده حرکتی');

    }

    public static function registeremail($id)
    {
        $user = User::find($id);
        Mail::send('front/registeremail',
            [
                'user' => $user,
            ], function ($m) use ($user) {
                $m->from('info@tabrizrobot.ir', 'مبتکران آذر ذهن');
                $m->to($user->email, $user->name)->subject('ثبت نام کاربر (tabrizrobot.ir)');
            });
    }

    public function tags($id = null)
    {
        if (isset($id)){
            $category = Category::where('title','LIKE' , '%'.$id.'%')->first();
            if (isset($category)){
                return redirect()->route('category',$category->title);
            }
            elseif (!isset($category)){
                $product = Product::where('slug','LIKE' , '%'.$id.'%')->first();
                if (isset($product))
                    return redirect()->route('product.self',$product->slug);
            }
        }
        $tags = Tag::latest()->get();
        return view('front.tags',compact('tags'));
    }
}

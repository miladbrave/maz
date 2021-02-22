<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchlist;
use App\Models\User;
use App\Models\Userlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class FactorController extends Controller
{

    public function index()
    {
        $userlists = Userlist::where('status','success')->latest('created_at')->paginate(30);
        foreach ($userlists->pluck('id') as $userlist) {
            $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get();
        }
        if (!isset($purchlist)) {
            $purchlist = null;
        }
        $purchl = Product::with('photos')->get();
        return view('back.factors.index', compact('userlists', 'purchlist', 'purchl'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $userlists = Userlist::where('status','fail')->latest('created_at')->paginate(30);
        foreach ($userlists->pluck('id') as $userlist) {
            $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get();
        }
        if (!isset($purchlist)) {
            $purchlist = null;
        }
        $purchl = Product::with('photos')->get();
        return view('back.factors.faillist', compact('userlists', 'purchlist', 'purchl'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $userlist = Userlist::where('factor', $id)->first();
        $userlist->shenase = $request->shenase;
        $userlist->save();

        $user = User::findOrFail($userlist->user_id);
        Mail::send('back.factors.shenase',
            [
                'user' => $user,
                'deliver' => $request->delivery,
                'userlist' => $userlist,
                'shenase' => $request->shenase,
            ], function ($m) use ($user) {
                $m->from('info@tabrizrobot.ir', 'تبریز ربات');
                $m->to($user->email, $user->name)->subject('شماره مرسوله خریداری شده');
            });

        return back();
    }

    public function destroy($id)
    {
        //
    }

    function generate_pdf($id) {
        $user = User::findOrFail($id);
        $userlists = Userlist::where('user_id', $id)->where('status', 'success')->latest('created_at')->first();
        foreach ($userlists->pluck('id') as $userlist) {
            $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get();
        }
        if (!isset($purchlist)) {
            $purchlist = null;
        }
        $purchl = Product::with('photos')->get();
        $data = [
            'user' => $user,
            'userlists' => $userlists,
            'purchlists' => $purchlist,
            'purchl' => $purchl,
        ];
        $pdf = PDF::loadView('back.factors.pdf', $data);
        return $pdf->stream('factor.pdf');
    }
}

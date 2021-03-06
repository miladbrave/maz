<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Purchlist;
use App\Models\User;
use App\Models\Userlist;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $online = User::online()->get();
        $visit =  DB::table('shetabit_visits')->count();
        $users = User::all();
        $totalrecive = Userlist::where('status','success')->get();
        $purchlists = Purchlist::whereIn('factor_number',$totalrecive->pluck('id'))->pluck('count')->toArray();

        return view('back.index',compact('users','totalrecive','online','visit','purchlists'));
    }

    public function sendmain(Request $request)
    {
        $message = new Message();
        $message->description = $request->description;
        $message->user_id = $request->user;
        $message->email = "admin";
        $message->name = $request->title;
        $message->type = "public";
        $message->save();
        return back();
    }

    public function mainmessage()
    {
        return view('back.admin.adminmessage');
    }

    public function chartApi()
    {
        $months = Userlist::where('status','success')->get(['totalprice','created_at'])->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('m');
        });
        foreach ($months as $m){
            $test[] = $m->sum('totalprice');
        }
        $response = [
            "price" => $test,
        ];
        return response()->json($response,200);
    }
}

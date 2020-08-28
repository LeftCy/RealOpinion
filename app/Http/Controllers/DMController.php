<?php

namespace App\Http\Controllers;

use App\GiveOpinion;
use App\Meeting;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DMController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user;
        $opinion_type = $request->opinion_type;
        $opinion_id = $request->opinion_id;
        $required_coin = $request->coin;
        $user = User::find($user_id);
        $user_name = $user->name;

        //ログイン中のユーザーが保有しているコイン数
        $my_user = Auth::user();
        $my_user_coin = $my_user->coin;

        //コインの保有数と必要数の判別
        if ($my_user_coin >= $required_coin) {
            $coin_judgment = true;
        } else {
            $coin_judgment = false;
        }

        return view('dm.index', compact('user_id', 'user_name', 'required_coin', 'coin_judgment', 'my_user_coin'));
    }

    public function send(Request $request)
    {
        $input_message = $request->body;
        $user_name = $request->user_name;
        $required_coin = $request->required_coin;
        $r_user_id = $request->user_id;

        //送信者の場合
        $s_user_items = User::where('id', Auth::id())->get();
        //受信者の場合
        $r_user_items = User::where('id', $r_user_id)->get();

        foreach ($s_user_items as $s_user_item) {
            //送信者のコイン減少
            $s_user_item->coin -= $required_coin;
            $s_user_item->save();
        }
        foreach ($r_user_items as $r_user_item) {
            //受信者のコイン増加
            $r_user_item->coin += $required_coin;
            $r_user_item->save();
        }

        //メッセージ処理
        $message = new Message();
        $message->sender_user_id = Auth::id();
        $message->recipient_user_id = $r_user_id;
        $message->msg = $input_message;
        $message->save();

        return view('dm.send', compact('input_message', 'user_name', 'required_coin'));
    }

    public function give(Request $request)
    {
        $user_id = $request->user;
        $opinion_type = $request->opinion_type;
        $opinion_id = $request->opinion_id;
        $required_coin = $request->coin;
        $user = User::find($user_id);
        $user_name = $user->name;

        //ログイン中のユーザーが保有しているコイン数
        $my_user = Auth::user();
        $my_user_coin = $my_user->coin;

        //コインの保有数と必要数の判別
        if ($my_user_coin >= $required_coin) {
            $coin_judgment = true;
        } else {
            $coin_judgment = false;
        }

        return view('dm.give', compact('user_id', 'user_name', 'required_coin', 'coin_judgment', 'my_user_coin'));
    }

    public function giveSend(Request $request)
    {
        $input_message = $request->body;
        $user_name = $request->user_name;
        $required_coin = $request->required_coin;
        $r_user_id = $request->user_id;

        //送信者の場合
        $s_user_items = User::where('id', Auth::id())->get();
        //受信者の場合
        $r_user_items = User::where('id', $r_user_id)->get();

        foreach ($s_user_items as $s_user_item) {
            //送信者のコイン増加
            $s_user_item->coin += $required_coin;
            $s_user_item->save();
        }
        foreach ($r_user_items as $r_user_item) {
            //受信者のコイン減少
            $r_user_item->coin -= $required_coin;
            $r_user_item->save();
        }

        //メッセージ処理
        $message = new Message();
        $message->sender_user_id = Auth::id();
        $message->recipient_user_id = $r_user_id;
        $message->msg = $input_message;
        $message->save();

        return view('dm.giveSend', compact('input_message', 'user_name', 'required_coin'));
    }
}

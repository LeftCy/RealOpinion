<?php

namespace App\Http\Controllers;

use App\GiveOpinion;
use App\Meeting;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class MyPageController extends Controller
{
    public function index()
    {   
        //ログイン中のユーザーの情報を取得
        $user = Auth::user();
        $user_id = Auth::id();

        //過去の投稿を取得(自分が投稿したものだけを表示)
        $meetings = Meeting::orderBy('updated_at', 'DESC')->where('user_id', $user_id)->get();
        $give_opinions = GiveOpinion::orderBy('updated_at', 'DESC')->where('user_id', $user_id)->get();
        
        //配列の個数を算出
        $m_count = count($meetings);
        $g_count = count($give_opinions);

        //メッセージを取得
        $messages = DB::table('users')
            //テーブルの結合
            ->join('messages', 'messages.sender_user_id', '=', 'users.id')
            //新しくきたメッセージを上から表示
            ->orderBy('messages.created_at', 'DESC')
            //受信者がログイン中のユーザーのメッセージのみ表示
            ->where('recipient_user_id', Auth::id())
            ->get();
        $message_count = count($messages);

        return view('mypage.index', compact(
            'user',
            'meetings',
            'give_opinions',
            'm_count',
            'g_count',
            'messages',
            'message_count',
        ));
    }
}

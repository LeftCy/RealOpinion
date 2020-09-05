<?php

namespace App\Http\Controllers;

use App\Board;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardsController extends Controller
{
    public function index()
    {
        //ログインユーザーIDを取得し、そのユーザーが送受信したboradを取得
        $current_user_id = Auth::user()->id;
        $boards = Board::where('s_user_id', $current_user_id)->orwhere('r_user_id', $current_user_id)->get();
        return view('message.index', compact('boards'));
    }

    public function show($id)
    {
        //ボードモデルおよびメッセージモデルから、クリックしたboard_idの情報を取得
        $messages = Message::where('board_id', $id)->get();
        $board = Board::find($id);

        return view('message.message', compact('message', 'board'));
    }

    public function store(Request $request)
    {
        $board = new Board;
        $board->s_user_id = $request->s_user_id;
        $board->r_user_id = $request->r_user_id;
        $board->save();

        //board一覧表示に戻る
        return redirect()->action('BoardsController@index', compact('board'));
    }
    
    public function confirm(Request $request)
    {
        $message_id = $request->id;
        $s_name = $request->name;
        $user = Auth::user();
        $r_name = $user->name;
        $msg = $request->msg;
        $created_at = $request->created_at;
        $sender_user_id = $request->sender_user_id;

        return view('message.confirm', compact('message_id','s_name','r_name', 'msg', 'created_at', 'sender_user_id')); 
    }
}

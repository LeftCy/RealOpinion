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
    
    public function confirm()
    {
        return view('message.confirm'); 
    }
}

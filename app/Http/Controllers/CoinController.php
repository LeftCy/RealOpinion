<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoinController extends Controller
{
    public function index()
    {
        #ログインユーザー情報を取得
        $user = Auth::user();   
        $user_coin = $user->coin;
        return view('coin.index', compact('user_coin'));
    }
    
    public function confirm(Request $request)
    {
        $request->validate([
            'coin' => 'required',
        ]);

        $inputs = $request->all();

        return view('coin.confirm', compact('inputs'));
    }

    public function send(Request $request)
    {
        //フォームで受け取った値を取得
        $inputs = $request->all();
        //ログイン中のユーザーの情報を取得
        $user = Auth::user();
        //ログイン中のユーザーのcoinカラムの値にフォームで受け取った値を足した値を代入
        $user->coin += $inputs['coin'];
        //変更を保存
        $user->save();
        
        $user_coin = $user['coin'];

        return view('coin.thanks', compact('inputs', 'user_coin'));
    }
}

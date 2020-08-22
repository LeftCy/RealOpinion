<?php

namespace App\Http\Controllers;

use App\Mail\ContactSendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index() {
        $user = Auth::user();
        $user_name = $user->name;
        $user_email = $user->email;
        return view('contact.index', compact('user_name', 'user_email'));
    }

    public function confirm(Request $request) {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'body'  => 'required',
            'category' => 'required',
        ]);

        $inputs = $request->all();

        return view('contact.confirm', compact('inputs'));
    }

    public function send(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'body'  => 'required',
            'category' => 'required',
        ]);

        $action = $request->input('action');

        $inputs = $request->except('action');

        if ($action !== 'submit') {
            return redirect()->route('contact.index')->withInput($inputs);
        } else {
            //入力されたメールアドレスにメールを送信する
            \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));

            //多重送信対策のためトークンを再発行
            $request->session()->regenerateToken();

            //送信完了ページのviewを表示
            return view('contact.thanks');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //ビューディレクトリ（/resources/views）にある hello ディレクトリ以下の、index.blade.php 表示させるという意味
    //indexアクションの定義。
    public function index() {
        //controller側から呼び出す
        return view('hello.index');
    }
}

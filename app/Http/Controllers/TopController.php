<?php

namespace App\Http\Controllers;

use App\Category;
//meetingsを取り扱うため下記を追加
use App\Meeting;
//同じくgive_opinionsを取り扱うため追加
use App\GiveOpinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{
    //Topページを呼び出す。
    public function top() {
        $categories = Category::all();
        
        //上位3件を取得
        $meetings = Meeting::orderBy('updated_at', 'DESC')->take(3)->get();
        $give_opinions = GiveOpinion::orderBy('updated_at', 'DESC')->take(3)->get();
        return view('top.top', compact('meetings', 'give_opinions', 'categories'));

    }
    
}

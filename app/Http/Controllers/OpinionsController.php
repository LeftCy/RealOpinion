<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\GiveOpinion;
use App\Category;

class OpinionsController extends Controller
{
    public function index(Request $request) {
        // /opinionsがカテゴリを指定して呼び出されている場合のみtrue
        if ($request->category !== null) {
            if ($request->category == 99) {
                $list = [1,2,3,4,5,6,7,8,9,10,11,12,13];
                $meetings = Meeting::orderBy('updated_at', 'DESC')->whereIn('category_id', $list)->paginate(6);
                $give_opinions = GiveOpinion::orderBy('updated_at', 'DESC')->whereIn('category_id', $list)->paginate(6);
                $category = Category::find($request->category);
            } elseif ($request->category == 88) {
                $list = [14,15,16];
                $meetings = Meeting::orderBy('updated_at', 'DESC')->whereIn('category_id', $list)->paginate(6);
                $give_opinions = GiveOpinion::orderBy('updated_at', 'DESC')->whereIn('category_id', $list)->paginate(6);
                $category = Category::find($request->category);
            } elseif ($request->category == 77) {
                $list = [17];
                $meetings = Meeting::orderBy('updated_at', 'DESC')->whereIn('category_id', $list)->paginate(6);
                $give_opinions = GiveOpinion::orderBy('updated_at', 'DESC')->whereIn('category_id', $list)->paginate(6);
                $category = Category::find($request->category);
            } else {
                $meetings = Meeting::orderBy('updated_at', 'DESC')->where('category_id', $request->category)->paginate(6);
                $give_opinions = GiveOpinion::orderBy('updated_at', 'DESC')->where('category_id', $request->category)->paginate(6);
                $category = Category::find($request->category);
            }
        } else { //全てのカテゴリの場合
            $meetings = Meeting::orderBy('updated_at', 'DESC')->paginate(6);
            $give_opinions = GiveOpinion::orderBy('updated_at', 'DESC')->paginate(6);
            $category = Category::find($request->category);
        }

        //$meetings = Meeting::all();
        //$give_opinions = GiveOpinion::all();
        $categories = Category::all();
        //全カテゴリのデータからmajor_category_nameのカラムのみを取得(unique()で重複しない値だけを取得する)
        $major_category_names = Category::pluck('major_category_name')->unique(); 
        return view('opinions.index', compact('meetings', 'give_opinions', 'categories', 'major_category_names', 'category'));
    }
}

<?php

namespace App\Http\Controllers;

use App\GiveOpinion;
use App\GiveOpinion as AppGiveOpinion;
use Illuminate\Http\Request;
use App\Http\Requests\GiveOpinionRequest;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GiveOpinionController extends Controller
{
    /*
    //認証が必要なページでログインしていなければ認証ページに飛ばす
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
        $this->middleware('verified');
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $give_opinions = GiveOpinion::all();

        return view('give_opinions.index', compact('give_opinions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('give_opinions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $give_opinions = new GiveOpinion();
        $give_opinions->name = $request->input('name');
        $give_opinions->description = $request->input('description');
        $give_opinions->assessment = $request->input('assessment');
        $give_opinions->coin = $request->input('coin');
        $give_opinions->category_id = $request->input('category_id');
        //別環境でも参照できる様にシンボリックリンクを相対パスで作成すること
        $path = $request->file('image')->store('public/give_opinions_images');
        $give_opinions->image = 'public/give_opinions_images/'.basename($path);
        $give_opinions->user_id = Auth::id();

        $give_opinions->save();

        return redirect()->route('give_opinions.show',  $give_opinions->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GiveOpinion  $giveOpinion
     * @return \Illuminate\Http\Response
     */
    public function show(GiveOpinion $giveOpinion)
    {
        return view('give_opinions.show', compact('giveOpinion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GiveOpinion  $giveOpinion
     * @return \Illuminate\Http\Response
     */
    public function edit(GiveOpinion $giveOpinion)
    {
        if (Auth::id() == $giveOpinion->user_id) {
            $categories = Category::all();
            return view('give_opinions.edit', compact('giveOpinion', 'categories'));
        } else {
            abort('403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GiveOpinion  $giveOpinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiveOpinion $giveOpinion)
    {
        /*
        $giveOpinion->name = $request->input('name');
        $giveOpinion->description = $request->input('description');
        $giveOpinion->assessment = $request->input('assessment');
        $giveOpinion->coin = $request->input('coin');
        $giveOpinion->category_id = $request->input('category_id');
        //_拡張子の判別
        $file_ex = $request->file('image')->getClientOriginalExtension();
        //別環境でも参照できる様にシンボリックリンクを相対パスで作成すること
        $giveOpinion->image = $request->image->storeAs('public/meeting_images', Auth::id() .'.'.$file_ex);
        $giveOpinion->update();

        return redirect()->route('give_opinions.show', ['id' => $giveOpinion->id]);
        */

        $give_opinions = new GiveOpinion();
        $give_opinions->name = $request->input('name');
        $give_opinions->description = $request->input('description');
        $give_opinions->assessment = $request->input('assessment');
        $give_opinions->coin = $request->input('coin');
        $give_opinions->category_id = $request->input('category_id');
        //別環境でも参照できる様にシンボリックリンクを相対パスで作成すること
        $path = $request->file('image')->store('public/give_opinions_images');
        $give_opinions->image = 'public/give_opinions_images/'.basename($path);
        $give_opinions->user_id = Auth::id();

        $give_opinions->save();

        return redirect()->route('give_opinions.show',  $give_opinions->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GiveOpinion  $giveOpinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiveOpinion $giveOpinion)
    {
        $giveOpinion->delete();
        return view('give_opinions.deleted');
    }

    public function delete(Request $request)
    {
        GiveOpinion::find($request->id)->delete();
        return view('give_opinions.deleted');
    }
}

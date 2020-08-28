<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Category;
use App\Meeting;
use App\Meeting as AppMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = Meeting::all();

        return view('meetings.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        $user_assessment = $user->assessment;

        return view('meetings.create', compact('categories', 'user_assessment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(MeetingRequest $request)
    public function store(MeetingRequest $request)
    {
        $meeting = new Meeting();
        $meeting->name = $request->input('name');
        $meeting->description = $request->input('description');
        $meeting->assessment = $request->input('assessment');
        $meeting->coin = $request->input('coin');
        $meeting->category_id = $request->input('category_id');
        //別環境でも参照できる様にシンボリックリンクを相対パスで作成すること
        $path = $request->file('image')->store('public/meetings_images');
        $meeting->image = 'public/meetings_images/'.basename($path);
        $meeting->user_id = Auth::id();
        
        $meeting->save();

        return redirect()->route('meetings.show', $meeting->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(meeting $meeting)
    {
        $user = User::find($meeting->user_id);
        $user_name = $user->name;

        return view('meetings.show', compact('meeting', 'user_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(meeting $meeting)
    {
        /*
        $this->authorize('edit', $meeting);

        $meeting = Meeting::findOrFail($id);//$idはedit関数の第2引数に入れていた。->  edit(meeting $meeting, $id)
        return view('meetings.edit')->with('edit', $meeting);
        */

        //うまく機能しないため仕方なくこちらを使って対処。作成したポリシーの意味がない。
        if (Auth::id() == $meeting->user_id) {
            $categories = Category::all();
            return view('meetings.edit', compact('meeting', 'categories'));
        } else {
            abort('403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, meeting $meeting)
    {
        $meeting = new Meeting();
        $meeting->name = $request->input('name');
        $meeting->description = $request->input('description');
        $meeting->assessment = $request->input('assessment');
        $meeting->coin = $request->input('coin');
        $meeting->category_id = $request->input('category_id');
        //別環境でも参照できる様にシンボリックリンクを相対パスで作成すること
        $path = $request->file('image')->store('public/meetings_images');
        $meeting->image = 'public/meetings_images/'.basename($path);
        $meeting->user_id = Auth::id();
        
        $meeting->save();

        return redirect()->route('meetings.show', $meeting->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(meeting $meeting)
    {
        $meeting->delete();
        return view('meetings.deleted');
    }
}

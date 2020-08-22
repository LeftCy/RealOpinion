@php
$title = 'realOpinion';
$description = 'カテゴリ';
@endphp

@extends('layouts.app')

@section('content')
    <div class="opinions row">
        <div class="category-container col-md-3">
                @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
                
                @endcomponent
        </div>
        <div class="main-contents col-md-9">
            <div class="hear-opinion">
                <div class="container">
                    @if ($category !== null)
                        <a href="/opinions">全てのカテゴリ</a> > <a href="{{ route('opinions', ['category' => $category->major_category_name]) }}">{{ $category->major_category_name }}</a> > {{ $category->name }}
                        <h1>{{ $category->name }}の一覧{{ $meetings->count() }}件</h1>
                    @endif
                </div>
                <h2>声を聞く</h2>
                <div class="card-columns">
                    @foreach ($meetings as $meeting)
                        <a class="card" href="{{ route('meetings.show', $meeting) }}">
                            <img src="{{asset($meeting->image)}}" class="card-img-top" alt="ユーザーが登録した画像ファイル">
                            <div class="card-body">
                                <h5 class="card-title">{{$meeting->name}}</h5>
                                @switch($meeting->assessment)
                                    @case (1)
                                        <p>評価: {{ '⭐️' }}</p>
                                        @break
                                    @case (2)
                                        <p>評価: {{ '⭐️⭐️' }}</p>
                                        @break
                                    @case (3)
                                        <p>評価: {{ '⭐️⭐️⭐️' }}</p>
                                        @break
                                    @case (4)
                                        <p>評価: {{ '⭐️⭐️⭐️⭐️' }}</p>
                                        @break
                                    @case (5)
                                        <p>評価: {{ '⭐️⭐️⭐️⭐️⭐️' }}</p>
                                        @break
                                    @default
                                        <p>評価の値が不正です</p>
                                @endswitch
                                <p class="card-text">コイン: {{$meeting->coin}}枚</p>
                                <p class="card-text">カテゴリ:{{$meeting->category->name}}</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">
                                    <small class="text-muted">{{ $meeting->updated_at->diffForHumans() }}に更新されました</small>
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="paginate">
                    <div class="paginate-center">
                        {{ $meetings->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
            
            <div class="give-opinion">
                <div class="container">
                    @if ($category !== null)
                    <a href="/opinions">全てのカテゴリ</a> > <a href="#">{{ $category->major_category_name }}</a> > {{ $category->name }}
                    <h1>{{ $category->name }}の一覧{{ $give_opinions->count() }}件</h1>
                    @endif
                </div>
                <h2>声を届ける</h2>
                <div class="card-columns">
                    @foreach ($give_opinions as $give_opinion)
                        <a class="card" href="{{ route('give_opinions.show', $give_opinion) }}">
                            <img src="{{asset($give_opinion->image)}}" class="card-img-top" alt="ユーザーが登録した画像ファイル">
                            <div class="card-body">
                                <h5 class="card-title">{{$give_opinion->name}}</h5>
                                @switch($give_opinion->assessment)
                                    @case (1)
                                        <p>評価: {{ '⭐️' }}</p>
                                        @break
                                    @case (2)
                                        <p>評価: {{ '⭐️⭐️' }}</p>
                                        @break
                                    @case (3)
                                        <p>評価: {{ '⭐️⭐️⭐️' }}</p>
                                        @break
                                    @case (4)
                                        <p>評価: {{ '⭐️⭐️⭐️⭐️' }}</p>
                                        @break
                                    @case (5)
                                        <p>評価: {{ '⭐️⭐️⭐️⭐️⭐️' }}</p>
                                        @break
                                    @default
                                        <p>評価の値が不正です</p>
                                @endswitch
                                <p class="card-text">コイン: {{$give_opinion->coin}}枚</p>
                                <!--  -->
                                <p class="card-text">カテゴリ:{{$give_opinion->category->name}}</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">
                                    <small class="text-muted">{{ $give_opinion->updated_at->diffForHumans() }}に更新されました</small>
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="paginate">
                    <div class="paginate-center">
                        {{ $give_opinions->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).on('load',function(){
            $('#active-category').addClass('active');
        });
    </script>
@endsection
<div class="category-links">
    @foreach ($major_category_names as $major_category_name)
        @if ($major_category_name == "プログラミング言語")
            <a class="major-category-link" href="{{ route('opinions', ['category' => 99]) }}">{{ $major_category_name }}</a>
        @elseif ($major_category_name == "転職・就職")
            <a class="major-category-link" href="{{ route('opinions', ['category' => 88]) }}">{{ $major_category_name }}</a>
        @elseif ($major_category_name == "その他")
            <a class="major-category-link" href="{{ route('opinions', ['category' => 77]) }}">{{ $major_category_name }}</a>
        @endif
        <!-- カテゴリ要素を表示 -->
        @foreach ($categories as $category)
            <!-- 大まかなカテゴリに対応したカテゴリ要素を表示 -->
            @if ($category->major_category_name === $major_category_name)
            <p>
                <label class="sidebar-category-label">
                    <a href="{{ route('opinions',['category' => $category->id]) }}">{{ $category->name }}</a>
                </label>
            </p>
            @endif
        @endforeach
    @endforeach
</div>
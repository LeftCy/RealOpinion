<footer style="background-image: url({{ asset('images/footer.jpg') }});">
    <div class="footer-logo">
        <a href="#">
            <img src="{{ asset('images/icon.png') }}" alt="realOpinion">
        </a>
    </div>
    <div class="footer-right">
        <div class="footer-list">
            <a href="{{ url('/about') }}">サービスについて</a>
            <a href="{{ route('coin.index') }}">コイン購入</a>
            <a href="{{ url('/contact') }}">お問い合わせ</a>
        </div>
    </div>
</footer>
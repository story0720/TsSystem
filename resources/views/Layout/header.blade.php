<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
            <span>{{ Auth::user()->name }}</span>
        </a>

        <!-- 檢查當前用戶是否已經登錄 -->
    @if (Auth::check())
        <!-- 如果已經登錄，則顯示登出按鈕 -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">登出</button>
        </form>
    @else
        <!-- 如果未登錄，則顯示登入按鈕 -->
        <a href="{{ route('login') }}">登入</a>
    @endif
    </ul>
</nav>

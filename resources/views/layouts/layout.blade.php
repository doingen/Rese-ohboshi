<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/reset.css">
  <link rel="stylesheet" href="/layout.css">
</head>
<body>
  <header>
    <div class="menu" id="menu">
      <div class="menu__inner">
        @if(Auth::check())
          <ul>
            <li><a href="{{route('shop.index')}}">Home</a></li>
            <li>
              <form method="post" action="{{route('logout')}}">
              @csrf
                <button>Logout</button>
              </form>
            </li>
            <li><a href="{{route('mypage')}}">Mypage</a></li>
          </ul>
        @else
          <ul>
            <li><a href="{{route('shop.index')}}">Home</a></li>
            <li><a href="{{route('register.index')}}">Registration</a></li>
            <li><a href="{{route('login.index')}}">Login</a></li>
          </ul>
        @endif
      </div>
    </div>
    <button class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <script src="/js/menu.js"></script>
    <h1 class="appName">
      <a href="{{route('shop.index')}}">Rese</a>
    </h1>
    @if(session('login_success'))
      <div class="alert_success">{{session('login_success')}}</div><br>
    @endif
  </header>
  @yield('contents')
</body>

@extends('layouts.layout')

@section('contents')
<script src="https://kit.fontawesome.com/99288424cc.js" crossorigin="anonymous"></script>
<title>ログイン</title>
<div class="auth__box">
  <div class="auth__title">
    <p>Login</p>
  </div>
  <div class="auth__item">
    @if($errors->has('login_error'))
      <p class="alert_notice">{{$errors->first('login_error')}}</p>
    @endif
    <form method="post" action="{{route('login')}}">
    @csrf
      <div class="auth__item--inner">
        <div class="auth__input"> 
          <i class="fa-solid fa-envelope"></i><input type="text" name="email" value="{{old('email')}}" placeholder="Email">
          @if($errors->has('email'))
            <p class="alert_notice">{{$errors->first('email')}}</p><br>
          @endif 
        </div>
        <div class="auth__input">
          <i class="fa-solid fa-lock"></i><input type="text" name="password" placeholder="Password">
          @if($errors->has('password'))
            <p class="alert_notice">{{$errors->first('password')}}</p><br>
          @endif
        </div>
        <div class="auth__bottom">
          <a href="{{route('register.index')}}">会員登録がまだの方はこちら</a>
          <button class="auth__button">ログイン</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
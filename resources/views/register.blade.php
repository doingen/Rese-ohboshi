@extends('layouts.layout')

@section('contents')
<script src="https://kit.fontawesome.com/99288424cc.js" crossorigin="anonymous"></script>
<title>会員登録</title>
<div class="auth__box">
  <div class="auth__title">
    <p>Registration</p>
  </div>
  <div class="auth__item">
    <form method="post" action="{{route('register')}}">
    @csrf
      <div class="auth__item--inner">
        <div class="auth__input">
          @if($errors->has('name'))
            <p class="alert_notice">{{$errors->first('name')}}</p><br>
          @endif
          <i class="fa-solid fa-user"></i><input type="text" name="name" value="{{old('name')}}" placeholder="Username">
        </div>
        <div class="auth__input">
          @if($errors->has('email'))
            <p class="alert_notice">{{$errors->first('email')}}</p><br>
          @endif  
          <i class="fa-solid fa-envelope"></i><input type="text" name="email" value="{{old('email')}}" placeholder="Email">
        </div>
        <div class="auth__input">
          @if($errors->has('password'))
            <p class="alert_notice">{{$errors->first('password')}}</p><br>
          @endif
          <i class="fa-solid fa-lock"></i><input type="text" name="password" placeholder="Password">
        </div>
      </div>  
      <button class="auth__button register__button">登録</button>
    </form>
  </div>
</div>
@endsection
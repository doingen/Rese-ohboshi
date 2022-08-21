@extends('layouts.layout')

@section('contents')
<script src="https://kit.fontawesome.com/99288424cc.js" crossorigin="anonymous"></script>
<title>マイページ</title>
  <main>
    @foreach($user as $user)
    <div class="pageLeft mypage__pageLeft">
      <h3>予約状況</h3>
        @foreach($user->reservations as $index => $reservation)
        <div class="mypage__reservation">
          @php
            $str = $reservation->pivot->reservation_date;
            $date = substr($str,0,10);
            $time = substr($str,11,5);
          @endphp
          <span><i class="fa-solid fa-clock"></i></span>
          <p class="mypage__reservation--num">予約@php echo $index+1 @endphp</p>
          <a href="{{route('reserve.delete', ['reserve_id' => $reservation->pivot->id])}}" class="mypage__reservation--delete"><i class="fa-regular fa-circle-xmark"></i></a>
          <div class="mypage__confirm">
            <span>Shop</span><p>{{$reservation->name}}</p>
            <span>Date</span><p>@php echo $date; @endphp</p>
            <span>Time</span><p>@php echo $time; @endphp</p>
            <span>Number</span><p>{{$reservation->pivot->number_of_people}}人</p>  
          </div>
        </div>
      @endforeach
    </div>
    <div class="pageRight mypage__pageRight">
      <h2>{{$user->name}}さん</h2>
      <h3>お気に入り店舗</h3>
      <div class="mypage__wrapper">
        @foreach($user->favorites as $fav)
        <div class="card">
          <div class="card--top">
            <img src="{{($fav->image)}}">
          </div>
          <div class="card--bottom">
            <p>{{$fav->name}}</p>
            <span>#{{$fav->area->name}}</span>
            <span>#{{$fav->genre->name}}</span><br>
            <div class="card--buttons">
              <a href="{{route('shop.detail', ['shop_id' => $fav->id])}}" class="card--detail">詳しくみる</a>
              <a href="{{route('favorite.delete', ['shop_id' => $fav->id])}}" class="card--fav"><i class="fa-solid fa-heart fa-xl" style="color:red"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endforeach
  </main>
@endsection
@extends('layouts.layout')

@section('contents')
<script src="https://kit.fontawesome.com/99288424cc.js" crossorigin="anonymous"></script>
<title>店舗一覧</title>
<div class="shop__search-box">
  <form method="get" action="{{route('shop.search')}}">
    <select name="areas">
      <option value="">All area</option>
      <option value="1">東京都</option>
      <option value="2">大阪府</option>
      <option value="3">福岡県</option>
    </select>
    <select name="genres">
      <option value="">All genre</option>
      <option value="1">寿司</option>
      <option value="2">焼肉</option>
      <option value="3">居酒屋</option>
      <option value="4">イタリアン</option>
      <option value="5">ラーメン</option>
    </select>
    <img src="{{asset('img/虫眼鏡.jpeg')}}">
    <input type="text" name="searchWord" placeholder="Search...">
  </form>
</div>
<main>
  <div class="shop__wrapper">
    @foreach($items as $item)
      <div class="card">
        <div class="card--top">
          <img src="{{($item->image)}}">
        </div>
        <div class="card--bottom">
          <p>{{$item->name}}</p>
          <span>#{{$item->area->name}}</span>
          <span>#{{$item->genre->name}}</span><br>
          <div class="card--buttons">
            <a href="{{route('shop.detail', ['shop_id' => $item->id])}}" class="card--detail">詳しくみる</a>
            @if($item->favoriteOrNot())
              <a href="{{route('favorite.delete', ['shop_id' => $item->id])}}" class="card--fav"><i class="fa-solid fa-heart fa-xl" style="color:red"></i></a>
            @else
              <a href="{{route('favorite.create', ['shop_id' => $item->id])}}" class="card--fav"><i class="fa-solid fa-heart fa-xl" style="color:lightgray"></i></a>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
</main>
@endsection
@extends('layouts.layout')

@section('contents')
<title>予約完了</title>
  <div class="thanks__container">
    <div class="thanks__item">
      <p>ご予約ありがとうございます</p>
      <a href="{{route('shop.detail', [ 'shop_id' => $id ])}}">戻る</a>
    </div>
  </div>
@endsection
@extends('layouts.layout')

@section('contents')
<title>{{$item->name}}</title>
<main>
  <div class="pageLeft">
    <div class="shop_detail__content">
      <div class="shop_detail__content-title">
        <a href="{{route('shop.index')}}"><</a>
        <h2 class="shop_detail__shop-name">{{$item->name}}</h2>
      </div>
      <img src="{{($item->image)}}"><br>
      <span class="tag">#{{$item->area->name}}</span>
      <span class="tag">#{{$item->genre->name}}</span><br>
      <p>{{$item->intro}}</p>
    </div>
  </div>
  <div class="pageRight shop_detail__pageRight">
    <form action="{{route('reserve.create', ['shop_id' => $item->id])}}" method="post" id="reserveForm">
      @csrf
      <div class="shop_detail__form">
        <h2>予約</h2>
        <input type="date" name="reservation_date" id="reservationDate" value={{ $session != null ? $session['reservation_date'] : ''}}><br>
        @if($errors->has('reservation_date'))
          <span class="alert_reserve">{{$errors->first('reservation_date')}}</span><br>
        @endif
        <select name="reservation_hour" id="reservation_hour">
          @for($t = 10; $t <= 22; $t++)
            <option @if(isset($session)) {{ $session['reservation_hour'] == $t ? 'selected' :'' }} @endif>@php echo $t @endphp</option>
          @endfor
        </select>
        <span>時</span>
        <select name="reservation_minute" id="reservation_minute">
          <option @if(isset($session)) {{ $session['reservation_minute'] == 00 ? 'selected' :'' }} @endif>00</option>
          <option @if(isset($session)) {{ $session['reservation_minute'] == 30 ? 'selected' :'' }} @endif>30</option>
        </select>
        <span>分</span><br>
        <select name="number_of_people" id="numberOfPeople">
          <option></option>
          <option value="1" @if(isset($session)) {{ $session['number_of_people'] == 1 ? 'selected' :'' }} @endif>1人</option>
          <option value="2" @if(isset($session)) {{ $session['number_of_people'] == 2 ? 'selected' :'' }} @endif>2人</option>
          <option value="3" @if(isset($session)) {{ $session['number_of_people'] == 3 ? 'selected' :'' }} @endif>3人</option>
          <option value="4" @if(isset($session)) {{ $session['number_of_people'] == 4 ? 'selected' :'' }} @endif>4人</option>
          <option value="5" @if(isset($session)) {{ $session['number_of_people'] == 5 ? 'selected' :'' }} @endif>5人</option>
        </select>
        @if($errors->has('number_of_people'))
          <span class="alert_reserve">{{$errors->first('number_of_people')}}</span><br>
        @endif
        <div class="shop_detail__confirm">
          <span>Shop</span><p>{{$item->name}}</p>
          <span>Date</span><p id="outputDate"></p>
          <span>Time</span><p id="outputTime"></p>
          <span>Number</span><p id="outputNumber"></p>  
        </div>
      </div>
      <button class="shop_detail__reserve-button">予約する</button>
    </form>
  </div>
  <script src="{{ asset('js/shop_detail.js') }}"></script>
</main>
@endsection


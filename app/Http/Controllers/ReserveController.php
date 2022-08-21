<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{
    public function create(ReserveRequest $request){
        $form = $request->all();
        unset($form['_token']);
        $form['user_id'] = \Auth::id();
        $form['reservation_date'] = $form['reservation_date']. " ". $form['reservation_hour']. ":". $form['reservation_minute'];
        Reservation::create($form);
        \Session::forget('reservation');
        return view('thanks_reserve', ['id' => $request->shop_id]);
    }

    public function delete(Request $request){
        Reservation::where('id', $request->reserve_id)->delete();
        return redirect('/mypage');
    }
}

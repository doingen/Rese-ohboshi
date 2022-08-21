<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function create($shop_id)
    {
        $fav = ['shop_id'=>$shop_id, 'user_id'=> \Auth::id()];
        Favorite::create($fav);
        return redirect()->back();
    }

    public function delete($shop_id){
        Favorite::where('user_id', \Auth::id())->where('shop_id', $shop_id)->delete();
        return redirect()->back();
    }
}

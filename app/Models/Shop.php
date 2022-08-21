<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public $fillable = ['area_id', 'genre_id', 'name', 'intro', 'image'];

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }

    public function favorites(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }

    public function favoriteOrNot(){
    $fav = Favorite::where('user_id', \Auth::id())
            ->where('shop_id', $this->id)
            ->first();

    if($fav != null){
        return true;
    }
    else{
        return false;
    }
    }
}

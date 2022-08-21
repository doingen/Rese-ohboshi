<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id', 'reservation_date', 'number_of_people'];

    public function user(){
        $this->belongsTo('App\Models\User');
    }

    public function shop(){
        $this->belongsTo('App\Models\Shop');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $items = Shop::with('area')->with('genre')->get();
        return view('shop', ['items' => $items]);
    }

    public function search(Request $request){
        if($request->searchWord != null){
            if($request->areas != null){
                if($request->genres != null){
                    $items = Shop::where('name', 'LIKE',"%{$request->searchWord}%")
                    ->where('genre_id', $request->genres)
                    ->where('area_id', $request->areas)
                    ->get();
                }
                else{
                    $items = Shop::where('name', 'LIKE',"%{$request->searchWord}%")
                    ->where('area_id', $request->areas)
                    ->get();
                }
            }
            elseif($request->genres != null){
                $items = Shop::where('name', 'LIKE',"%{$request->searchWord}%")
                    ->where('genre_id',$request->genres)
                    ->get();
            }
            else{
                $items = Shop::where('name', 'LIKE',"%{$request->searchWord}%")->get();
            }
        }
        elseif($request->areas != null){
            if($request->genres != null){
                $items = Shop::where('genre_id', $request->genres)
                    ->where('area_id', $request->areas)
                    ->get();
            }
            else{
                $items = Shop::where('area_id', $request->areas)->get();
            }
        }
        else{
            if($request->genres != null){
                $items = Shop::where('genre_id',$request->genres)->get();
            }
            else{
                $items = Shop::all();
            }
        }
        return view('shop', ['items' => $items]);
    }

    public function detail($shopId){
        $session = \Session::get('reservation');
        $item = Shop::where('id', $shopId)->first();
        return view('shop_detail', ['item' => $item, 'session' => $session]);
    }
}


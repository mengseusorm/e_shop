<?php

namespace App\Http\Controllers;

use App\Models\AddToCart;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function showProductOrder(Request $request)
    {
        dd($request->all());   
    }
    public function addToCart(AddToCart $addTocart , $request) { 
        $addTocart->create([
            'product_id' => $request,
        ]);

        // if($addTocart){
        //     return view('frontend_e_shop.pages.homepage',
        //     [
        //         "addToCart" => AddToCart::orderBy('id', 'desc')->get()
        //     ]
        // );
        // }

    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    { 
        return view('frontend_e_shop.pages.homepage',[
            'products' => Product::all()
        ]);
        // return view('frontend.index');
    }
}

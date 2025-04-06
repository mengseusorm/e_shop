<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $product = Product::with(['category'])
            ->where('status', 1)
            ->latest()
            ->paginate(12);
        return view('frontend_e_shop.pages.shop.index',[
            'products' => $product,
        ]);
    }

    public function category($category)
    {
        $product = Product::with(['category'])
            ->where('status', 1)
            ->where('category_id', $category)
            ->latest()
            ->paginate(12);
        return view('frontend_e_shop.pages.shop.index',[
            'products' => $product,
        ]);
    }
}

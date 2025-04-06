<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RateOnProductController extends Controller
{
    public function index()
    {
        return view('backend.rate_on_product.index');
    }
    public function destroy($id)
    {
        // Delete the rate on product by ID
        // You can implement your logic here
        return redirect()->route('admin.rate_on_product')->withFlashSuccess(__('The Rate on Product was successfully deleted.'));
    }
    public function show($id)
    {
        // Fetch the rate on product by ID and pass it to the view
        return view('backend.rate_on_product.show', compact('id'));
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Domains\Auth\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\CountryCode;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;

class ProuductController extends Controller
{
    public ProductService $ProductService;

    public function __construct(ProductService $ProductService)
    {
        $this->ProductService = $ProductService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index',[
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create',[
                'merchants'  => Merchant::all(),
                'categories' => Category::all(),
                'countries'  => CountryCode::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    { 
        $this->ProductService->store($request->validated());
        return redirect()->route('admin.product')->withFlashSuccess(__('The Product was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.product.show',[
                'product' => Product::findOrFail($id)
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        return view('backend.product.edit',[
                'product'    => Product::findOrFail($id),
                'merchants'  => Merchant::all(),
                'categories' => Category::where('status',1)->get(),
                'countries'  => CountryCode::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,Product $product)
    {
        $this->ProductService->update($product,$request->validated());
        return redirect()->route('admin.product')->withFlashSuccess(__('The Product was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->ProductService->destroy($product);
        return redirect()->route('admin.product')->withFlashSuccess(__('The Product was successfully deleted.'));
    } 
}

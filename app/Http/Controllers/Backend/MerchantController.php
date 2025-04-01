<?php

namespace App\Http\Controllers\backend;

use App\Domains\Auth\Services\countryCodeService;
use App\Domains\Auth\Services\MerchantService;
use App\Http\Controllers\Controller;
use App\Http\Requests\MerchantRequest;
use App\Http\Resources\CountryCodeResource;
use App\Models\CountryCode;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public MerchantService $MerchantService;
    public countryCodeService $countryCodeService;
    

    public function __construct(MerchantService $MerchantService,CountryCodeService $countryCodeService)
    {
        $this->MerchantService = $MerchantService;
        $this->countryCodeService = $countryCodeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('backend.merchant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CountryCode $countryCode)
    {
        return view('backend.merchant.create',['countryCodes' => $countryCode->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantRequest $request)
    {
        $merchant = $this->MerchantService->store($request->validated()); 
        return redirect()->route('admin.merchant')->withFlashSuccess(__('The Merchant was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.merchant.edit',['merchant' => Merchant::find($id),'country_code' => CountryCode::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MerchantRequest $request,Merchant $merchant)
    {
        $merchantUpdate = $this->MerchantService->update($merchant,$request->validated()); 
        return redirect()->route('admin.merchant')->withFlashSuccess(__('The Merchant Code was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        $this->MerchantService->destroy($merchant);

        return redirect()->route('admin.merchant')->withFlashSuccess(__('The Merchant was successfully deleted.'));
    }
}

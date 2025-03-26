<?php

namespace App\Http\Controllers\backend;

use App\Domains\Auth\Services\CountryCodeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryCodeRequest;
use App\Models\CountryCode;
use Illuminate\Http\Request;

class CountryCodeController extends Controller
{
    public CountryCodeService $countryCodeService;

    public function __construct(CountryCodeService $countryCodeService)
    {
        $this->countryCodeService = $countryCodeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.countryCode.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.countryCode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryCodeRequest $request)
    {   
        $countryCode = $this->countryCodeService->store($request->validated()); 
        return redirect()->route('admin.country.code')->withFlashSuccess(__('The Country Code was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.countryCode.edit',['countrycode' => CountryCode::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryCodeRequest $request, CountryCode $countryCode)
    {
        $countryCode = $this->countryCodeService->update($countryCode,$request->validated()); 
        return redirect()->route('admin.country.code')->withFlashSuccess(__('The Country Code was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryCode $countryCode)
    {
        $this->countryCodeService->destroy($countryCode);

        return redirect()->route('admin.country.code')->withFlashSuccess(__('The Country was successfully deleted.'));
    }
}

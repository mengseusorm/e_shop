<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Services\CurrencyService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public CurrencyService $CurrencyService;

    public function __construct(CurrencyService $CurrencyService)
    {
        $this->CurrencyService = $CurrencyService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.currency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        $this->CurrencyService->store($request->validated());
        return redirect()->route('admin.currency')->withFlashSuccess(__('The Currency was successfully created.'));
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
        return view('backend.currency.edit', ['currency' => Currency::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        $this->CurrencyService->update($currency, $request->validated());
        return redirect()->route('admin.currency')->withFlashSuccess(__('The Currency was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        if ($this->CurrencyService->destroy($currency)) {
            return redirect()->route('admin.currency')->withFlashSuccess(__('The Currency was successfully deleted.'));
        }
        return redirect()->route('admin.currency')->withFlashDanger(__('There was a problem deleting this Currency.'));
    }
}

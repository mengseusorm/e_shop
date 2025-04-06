<?php

namespace App\Domains\Auth\Services;

use App\Exceptions\GeneralException;
use App\Models\Currency;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Log;

/**
 * Class CurrencyService.
 */
class CurrencyService extends BaseService
{
    /**
     * CurrencyService constructor.
     *
     * @param  Currency  $Currency
     */
    public function __construct(Currency $Currency)
    {
        $this->model = $Currency;
    }

    /**
     * @param  array  $data
     * @return Currency
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Currency
    {
        DB::beginTransaction(); 
        try {
            $Currency = $this->model::create([
                'name'         => $data['name'],
                'code'         => $data['code'],
                'symbol'       => $data['symbol'],
                'exchange_rate'=> $data['exchange_rate'],
            ]);
        } catch (Exception $e) {
            Log::error('Currency creation failed: ' . $e->getMessage());
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem creating the Currency.'));
        } 
        DB::commit();

        return $Currency;
    }

    /**
     * @param  Currency  $Currency
     * @param  array  $data
     * @return Currency
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Currency $Currency, array $data = []): Currency
    {   
        DB::beginTransaction(); 
        try {
            $Currency->update([
                'name'         => $data['name'],
                'code'         => $data['code'],
                'symbol'       => $data['symbol'],
                'exchange_rate'=> $data['exchange_rate'],
            ]); 
        } catch (Exception $e) {
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem updating the Currency.'));
        } 
        DB::commit();

        return $Currency;
    }

    /**
     * @param  Currency  $Currency
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Currency $Currency): bool
    { 
        if ($this->deleteById($Currency->id)) {  
            return true;
        } 
        throw new GeneralException(__('There was a problem deleting the Currency.'));
    }

    public function uploadImage($image): string
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $croppedImage = Image::make($image)->fit(300, 300);
        Storage::disk('public')->put('uploads/' . $filename, (string) $croppedImage->encode());

        return $filename;
    }
}

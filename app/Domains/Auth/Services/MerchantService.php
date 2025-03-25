<?php

namespace App\Domains\Auth\Services;

use App\Exceptions\GeneralException;
use App\Models\Merchant;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Class MerchantService.
 */
class MerchantService extends BaseService
{
    /**
     * MerchantService constructor.
     *
     * @param  Merchant  $Merchant
     */
    public function __construct(Merchant $Merchant)
    {
        $this->model = $Merchant;
    }

    /**
     * @param  array  $data
     * @return Merchant
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Merchant
    {
        DB::beginTransaction();  
        try {
            $Merchant = $this->model::create([
                'merchant_name' => $data['merchant_name'], 
                'address' => $data['address'],
                'phone_number' => $data['phone_number'],
                'dob'       => $data['dob']
            ]);
        } catch (Exception $e) {
            Log::info($e);
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem creating the Merchant.'));
        } 
        DB::commit();

        return $Merchant;
    }

    /**
     * @param  Merchant  $Merchant
     * @param  array  $data
     * @return Merchant
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Merchant $Merchant, array $data = []): Merchant
    {
        DB::beginTransaction(); 
        try {
            $Merchant->update([
                'Merchant_name' => $data['Merchant_name'], 
                'Merchant_slug' => $data['Merchant_slug'],
                'status'        => $data['status'],
                'description'   => $data['description']
            ]); 
        } catch (Exception $e) {
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem updating the Merchant.'));
        } 
        DB::commit();

        return $Merchant;
    }

    /**
     * @param  Merchant  $Merchant
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Merchant $Merchant): bool
    { 
        if ($this->deleteById($Merchant->id)) {  
            return true;
        } 
        throw new GeneralException(__('There was a problem deleting the Merchant.'));
    }
}

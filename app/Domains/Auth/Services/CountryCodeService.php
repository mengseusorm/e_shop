<?php

namespace App\Domains\Auth\Services;

use Exception;
use App\Models\CountryCode;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

/**
 * Class CountryCodeService.
 */
class CountryCodeService extends BaseService
{
    /**
     * CountryCodeService constructor.
     *
     * @param  CountryCode  $CountryCode
     */
    public function __construct(CountryCode $CountryCode)
    {
        $this->model = $CountryCode;
    }

    /**
     * @param  array  $data
     * @return CountryCode
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): CountryCode
    {
        DB::beginTransaction();  
        try { 
            $CountryCode = $this->model::create([
                'country_name' => $data['country_name'], 
                'country_code' => $data['country_code'],
                'zip'          => $data['zip'],
            ]);
        } catch (Exception $e) {
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem creating the CountryCode.'));
        } 
        DB::commit();

        return $CountryCode;
    }

    /**
     * @param  CountryCode  $CountryCode
     * @param  array  $data
     * @return CountryCode
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(CountryCode $CountryCode, array $data = []): CountryCode
    {
        DB::beginTransaction(); 
        try {
            $CountryCode->update([
                'CountryCode_name' => $data['CountryCode_name'], 
                'CountryCode_slug' => $data['CountryCode_slug'],
                'status'        => $data['status'],
                'description'   => $data['description']
            ]); 
        } catch (Exception $e) {
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem updating the CountryCode.'));
        } 
        DB::commit();

        return $CountryCode;
    }

    /**
     * @param  CountryCode  $CountryCode
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(CountryCode $CountryCode): bool
    { 
        if ($this->deleteById($CountryCode->id)) {  
            return true;
        } 
        throw new GeneralException(__('There was a problem deleting the CountryCode.'));
    }
}

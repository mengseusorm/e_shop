<?php

namespace App\Domains\Auth\Services;

use App\Exceptions\GeneralException;
use App\Models\CountryCode;
use App\Models\CountryCodeModel;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
    public function __construct(CountryCodeModel $CountryCode)
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
    public function store(array $data = []): CountryCodeModel
    {
        DB::beginTransaction(); 
        $filename = '';
        try {
            if($data['image']){
                $image = $data['image'];
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $croppedImage = Image::make($image)->fit(300, 300);
                Storage::disk('public')->put('uploads/' . $filename, (string) $croppedImage->encode());
            }

            $CountryCode = $this->model::create([
                'image'         => $filename,
                'CountryCode_name' => $data['CountryCode_name'], 
                'CountryCode_slug' => $data['CountryCode_slug'],
                'status'        => $data['status'],
                'description'   => $data['description']
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
    public function update(CountryCodeModel $CountryCode, array $data = []): CountryCodeModel
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
    public function destroy(CountryCodeModel $CountryCode): bool
    { 
        if ($this->deleteById($CountryCode->id)) {  
            return true;
        } 
        throw new GeneralException(__('There was a problem deleting the CountryCode.'));
    }
}

<?php

namespace App\Domains\Auth\Services;

use App\Exceptions\GeneralException;
use App\Models\Product;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

/**
 * Class ProductService.
 */
class ProductService extends BaseService
{
    /**
     * ProductService constructor.
     *
     * @param  Product  $Product
     */
    public function __construct(Product $Product)
    {
        $this->model = $Product;
    }

    /**
     * @param  array  $data
     * @return Product
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Product
    {  
        $data['image'] = $data['image'] ?? null;  
        DB::beginTransaction(); 
        $filename = 'no-image.png'; 
        try {
            if($data['image']){
                $image = $data['image'];
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $croppedImage = Image::make($image)->fit(300, 300);
                Storage::disk('public')->put('uploads/' . $filename, (string) $croppedImage->encode());
            }
            $slug = $data['name'];
            $get_slug = implode('-', explode(' ', strtolower($slug))); 

            $Product = $this->model::create([
                'image'         => $filename, 
                'slug'          => strtolower($get_slug),
                'product_code'  => $this->randomProductCode(),
                'name'          => $data['name'], 
                'merchant_id'   => $data['merchant_id'], 
                'price'         => $data['price'],   
                'status'        => $data['status'], 
                'size'          => $data['size'], 
                'description'   => $data['description'], 
                'category_id'   => $data['category_id'],
                'country_code_id' => $data['country_code_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack(); 
            Log::info($e);
            throw new GeneralException(__('There was a problem creating the Product.'));
        } 
        DB::commit();

        return $Product;
    }

    /**
     * @param  Product  $Product
     * @param  array  $data
     * @return Product
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Product $Product, array $data = []): Product
    {
        DB::beginTransaction(); 
        try {
            $Product->update([
                'Product_name' => $data['Product_name'], 
                'Product_slug' => $data['Product_slug'],
                'status'        => $data['status'],
                'description'   => $data['description']
            ]); 
        } catch (Exception $e) {
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem updating the Product.'));
        } 
        DB::commit();

        return $Product;
    }

    /**
     * @param  Product  $Product
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Product $Product): bool
    { 
        if ($this->deleteById($Product->id)) {  
            return true;
        } 
        throw new GeneralException(__('There was a problem deleting the Product.'));
    }

    public function randomProductCode(){
        return 'PRD-' . strtoupper(uniqid());
    }
}

<?php

namespace App\Domains\Auth\Services;

use App\Exceptions\GeneralException;
use App\Models\Category;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Class CategoryService.
 */
class CategoryService extends BaseService
{
    /**
     * CategoryService constructor.
     *
     * @param  Category  $Category
     */
    public function __construct(Category $Category)
    {
        $this->model = $Category;
    }

    /**
     * @param  array  $data
     * @return Category
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Category
    {
        DB::beginTransaction(); 
        $filename = 'no_image_available.png'; 
        try {
            if($data['image']){
                $filename = $this->uploadImage($data['image']);
            }
            $slug = $data['category_name'];
            $get_slug = implode('-', explode(' ', strtolower($slug))); 

            $Category = $this->model::create([
                'image'         => $filename,
                'category_name' => $data['category_name'], 
                'category_slug' => $get_slug,
                'status'        => $data['status'],
                'description'   => $data['description']
            ]);
        } catch (Exception $e) {
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem creating the Category.'));
        } 
        DB::commit();

        return $Category;
    }

    /**
     * @param  Category  $Category
     * @param  array  $data
     * @return Category
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Category $Category, array $data = []): Category
    {   
        $data['image'] = $data['image'] ?? null;
        DB::beginTransaction(); 
        $filename = 'no_image_available.png'; 
        try {
            if($data['image']){
               $filename = $this->uploadImage($data['image']);
            }
            $slug = $data['category_name'];
            $get_slug = implode('-', explode(' ', strtolower($slug))); 

            $Category->update([
                'image'         => $filename,
                'category_name' => $data['category_name'], 
                'category_slug' => $get_slug,
                'status'        => $data['status'],
                'description'   => $data['description']
            ]); 
        } catch (Exception $e) {
            DB::rollBack(); 
            throw new GeneralException(__('There was a problem updating the Category.'));
        } 
        DB::commit();

        return $Category;
    }

    /**
     * @param  Category  $Category
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Category $Category): bool
    { 
        if ($this->deleteById($Category->id)) {  
            return true;
        } 
        throw new GeneralException(__('There was a problem deleting the Category.'));
    }

    public function uploadImage($image): string
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $croppedImage = Image::make($image)->fit(300, 300);
        Storage::disk('public')->put('uploads/' . $filename, (string) $croppedImage->encode());

        return $filename;
    }
}

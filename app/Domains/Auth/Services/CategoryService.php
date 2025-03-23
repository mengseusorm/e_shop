<?php

namespace App\Domains\Auth\Services;

use App\Exceptions\GeneralException;
use App\Models\Category;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

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
        try {
            $Category = $this->model::create([
                'category_name' => $data['category_name'], 
                'category_slug' => $data['category_slug'],
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
        DB::beginTransaction(); 
        try {
            $Category->update([
                'category_name' => $data['category_name'], 
                'category_slug' => $data['category_slug'],
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
}

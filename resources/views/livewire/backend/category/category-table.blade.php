<div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="@lang('Search categorys...')" class="form-control w-50 mb-2">
    </div> 
    <table class="table">
        <thead>
            <tr> 
                <th class="text-uppercase">
                   @lang('image')
                </th>
                <th wire:click="sortBy('category_name')" style="cursor:pointer" class="text-uppercase">
                    @lang('Category name')
                    @if($sortField === 'name')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('status')" style="cursor:pointer" class="text-uppercase">
                    @lang('status')
                    @if($sortField === 'status')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th class="text-uppercase">@lang('actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr> 
                    <td>
                        <img src="{{asset($category->image ? '/storage/uploads/'.$category->image : '/images/no_image_available.jpg')}}" alt="" width="50" height="50"> 
                    </td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->category_slug }}</td>
                    <td>
                        <span class="badge badge-success">
                            {{ $category->status == App\Enums\Status::ACTIVE ? __('Active') : __('Inactive') }}
                        </span>
                    </td>
                    <td> 
                        <x-utils.edit-button :href="route('admin.category.edit', $category->id)" />
                        <x-utils.delete-button :href="route('admin.category.destroy', $category->id)"/> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <div class="mt-2">
        {{ $categories->links() }}
    </div>
</div>

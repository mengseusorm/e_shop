<div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Search categorys..." class="form-control w-50 mb-2">
    </div> 
    <table class="table table-striped">
        <thead>
            <tr> 
                <th wire:click="sortBy('category_name')" style="cursor:pointer">
                    @lang('Cagegory name')
                    @if($sortField === 'name')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('category_slug')" style="cursor:pointer">
                    @lang('Category-slug')
                    @if($sortField === 'email')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('status')" style="cursor:pointer">
                    @lang('Status')
                    @if($sortField === 'status')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr> 
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->category_slug }}</td>
                    <td>
                        <span class="badge badge-success">
                            {{ $category->status == App\Enums\Status::ACTIVE ? __('Active') : __('Inactive') }}
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm text-uppercase" href="{{route('admin.category.edit',$category->id)}}">
                            <i class="fas fa-pencil-alt"></i>
                            @lang('Edit')
                        </a>
                        {{-- <button class="btn btn-outline-danger btn-sm text-uppercase" wire:click="deletecategory({{ $category->id }})">
                            <i class="fas fa-trash"></i>
                            @lang('Delete')
                        </button> --}}
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

<div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="@lang('Search products...')" class="form-control w-50 mb-2">
    </div> 
    <table class="table">
        <thead>
            <tr> 
                <th wire:click="sortBy('product_code')" style="cursor:pointer" class="text-uppercase">
                    @lang('Product Code')
                    @if($sortField === 'product_code')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th  wire:click="sortBy('name')" style="cursor:pointer" class="text-uppercase" width="300">
                    @lang('Name')
                    @if($sortField === 'name')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('merchant_id')" style="cursor:pointer" class="text-uppercase">
                    @lang('Merchant')
                    @if($sortField === 'merchant_id')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('price')" style="cursor:pointer" class="text-uppercase">
                    @lang('Price')
                    @if($sortField === 'price')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('status')" style="cursor:pointer" class="text-uppercase">
                    @lang('status')
                    @if($sortField === 'status')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('size')" style="cursor:pointer" class="text-uppercase">
                    @lang('size')
                    @if($sortField === 'size')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th> 
                <th wire:click="sortBy('category_id')" style="cursor:pointer" class="text-uppercase">
                    @lang('Category')
                    @if($sortField === 'category_id')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('country_code_id')" style="cursor:pointer" class="text-uppercase">
                    @lang('country-code')
                    @if($sortField === 'country_code_id')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th> 
                <th class="text-uppercase">
                    @lang('Actions')
                </th>
            </tr>
        </thead>
        <tbody>  
            @foreach($products as $product)   
                <tr> 
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->merchant->merchant_name }}</td> 
                    <td>{{ $product->price }} {{$product->currency != null ? $product->currency->symbol : ''}}</td> 
                    <td>
                        <span class="badge badge-success">
                            {{ $product->status}}
                        </span> 
                    </td>
                    <td>
                        <span class="badge badge-success">  
                            {{ $product->size == 1 ? 'Small' : ($product->size == 2 ? 'Medium' : 'Large') }}
                        </span>
                    </td> 
                    <td>
                        {{ $product->category->category_name }}
                    </td> 
                    <td>
                        {{ $product->country->country_name }}
                    </td> 
                    <td> 
                        <x-utils.view-button :href="route('admin.product.show', $product->id)" /> 
                        <x-utils.edit-button :href="route('admin.product.edit', $product->id)" />
                        <x-utils.delete-button :href="route('admin.product.destroy', $product->id)"/> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <div class="mt-2">
        {{ $products->links() }}
    </div>
</div>

<div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Search Merchant..." class="form-control w-50 mb-2">
    </div> 
    <table class="table">
        <thead>
            <tr> 
                <th wire:click="sortBy('type')" style="cursor:pointer" class="text-uppercase">
                    @lang('Type')
                    @if($sortField === 'type')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('merchant_name')" style="cursor:pointer" class="text-uppercase">
                    @lang('Name')
                    @if($sortField === 'merchant_name')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('country_code')" style="cursor:pointer" class="text-uppercase">
                    @lang('Country')
                    @if($sortField === 'country_code')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('address')" style="cursor:pointer" class="text-uppercase">
                    @lang('Address')
                    @if($sortField === 'address')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('phone_number')" style="cursor:pointer" class="text-uppercase">
                    @lang('Phone number')
                    @if($sortField === 'phone_number')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('dob')" style="cursor:pointer" class="text-uppercase">
                    @lang('Date of birth')
                    @if($sortField === 'dob')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th class="text-uppercase">
                    @lang('Actions')
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($merchants as $merchant)
                    {{
                        dd($merchant)
                    }}
                <tr> 
                    <td>{{ $merchant->type }}</td>
                    <td>{{ $merchant->merchant_name }}</td>
                    <td>{{ $merchant->country_code }}</td>
                    <td>{{ $merchant->address }}</td>
                    <td>{{ $merchant->phone_number }}</td>
                    <td>{{ $merchant->dob }}</td>
                    <td> 
                        <x-utils.edit-button :href="route('admin.merchant.edit', $merchant->id)" />
                        <x-utils.delete-button :href="route('admin.merchant.destory', $merchant->id)"/> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <div class="mt-2">
        {{ $merchants->links() }}
    </div>
</div>

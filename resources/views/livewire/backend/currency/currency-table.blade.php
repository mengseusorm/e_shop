<div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="@lang('Search Currency...')" class="form-control w-50 mb-2">
    </div> 
    <table class="table">
        <thead>
            <tr> 
                <th wire:click="sortBy('name')" style="cursor:pointer" class="text-uppercase">
                    @lang('Name')
                    @if($sortField === 'name')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('code')" style="cursor:pointer" class="text-uppercase">
                    @lang('code')
                    @if($sortField === 'code')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('symbol')" style="cursor:pointer" class="text-uppercase">
                    @lang('symbol')
                    @if($sortField === 'symbol')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('exchange_rate')" style="cursor:pointer" class="text-uppercase">
                    @lang('exchange_rate')
                    @if($sortField === 'exchange_rate')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th class="text-uppercase">
                    @lang('Actions')
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($currencies as $currency)
                <tr> 
                    <td>{{ $currency->name }}</td>
                    <td>{{ $currency->code }}</td>
                    <td>
                        <span class="badge badge-success">
                            {{ $currency->symbol}}
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-info">
                            {{ $currency->exchange_rate}}
                        </span>
                    </td>
                    <td> 
                        <x-utils.edit-button :href="route('admin.currency.edit', $currency->id)" />
                        <x-utils.delete-button :href="route('admin.currency.destroy', $currency->id)"/> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <div class="mt-2">
        {{ $currencies->links() }}
    </div>
</div>

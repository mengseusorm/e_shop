<div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="@lang('Search country-code...')" class="form-control w-50 mb-2">
    </div> 
    <table class="table">
        <thead>
            <tr> 
                <th wire:click="sortBy('country_name')" style="cursor:pointer" class="text-uppercase">
                    @lang('Country name')
                    @if($sortField === 'country_name')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('country_code')" style="cursor:pointer" class="text-uppercase">
                    @lang('country-code')
                    @if($sortField === 'country_code')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('zip')" style="cursor:pointer" class="text-uppercase">
                    @lang('zip')
                    @if($sortField === 'zip')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th class="text-uppercase">
                    @lang('Actions')
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($countryCodes as $countryCode)
                <tr> 
                    <td>{{ $countryCode->country_name }}</td>
                    <td>{{ $countryCode->country_code }}</td>
                    <td>
                        <span class="badge badge-success">
                            {{ $countryCode->zip}}
                        </span>
                    </td>
                    <td> 
                        <x-utils.edit-button :href="route('admin.country.code.edit', $countryCode->id)" />
                        <x-utils.delete-button :href="route('admin.country.code.destroy', $countryCode->id)"/> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <div class="mt-2">
        {{ $countryCodes->links() }}
    </div>
</div>

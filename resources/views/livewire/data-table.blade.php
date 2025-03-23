<div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Search users..." class="form-control w-50 mb-2">
    </div> 
    <table class="table table-striped">
        <thead>
            <tr>
                <th wire:click="sortBy('id')" style="cursor:pointer">
                    ID
                    @if($sortField === 'id')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('name')" style="cursor:pointer">
                    Name
                    @if($sortField === 'name')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th wire:click="sortBy('email')" style="cursor:pointer">
                    Email
                    @if($sortField === 'email')
                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                    @endif
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" wire:click="deleteUser({{ $user->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <div class="mt-2">
        {{ $users->links() }}
    </div>
</div>

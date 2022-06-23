<div>
    <div class="flex flex-wrap w-full mb-4">
        <div class="w-full mx-auto md:w-6/12 mb-4 md:mb-0">
            <x-jet-input wire:model.debounce.300ms="search" type="text"
                class="flex-1 block w-full border-gray-300 rounded-md focus:ring-emerald-400 focus:border-emerald-400 sm:text-sm"
                placeholder="Search users..." />

        </div>
        <div class="relative w-4/12 mx-auto md:w-2/12 md:mb-0">
            <select wire:model="orderBy"
                class="block w-full px-3 py-2 capitalize bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-400 focus:border-emerald-400 sm:text-sm"
                id="grid-state">
                <option class="capitalize" value="name">{{ __('user') }}</option>
                <option class="capitalize" value="realname">{{ __('Name') }}</option>
                <option class="capitalize" value="realsurname">{{ __('surname') }}</option>
                <option class="capitalize" value="email">Email</option>
                <option class="capitalize" value="created_at">Sign Up Date</option>
            </select>

        </div>
        <div class="relative w-4/12 mx-1 md:w-2/12">
            <select wire:model="orderAsc"
                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-400 focus:border-emerald-400 sm:text-sm"
                id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
        </div>
        <div class="relative w-3/12 mx-auto md:w-1/12">
            <select wire:model="perPage"
                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-400 focus:border-emerald-400 sm:text-sm"
                id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
    </div>

    @if ($inventories->count())
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-md  text-gray-700 uppercase bg-emerald-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            {{ __('code') }}
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            {{ __('ubication') }}
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            {{ __('barcode') }}
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            {{ __('status') }}
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            Accions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventories as $itemInven)
                        <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                            <td
                                class="px-6 py-4 text-sm font-light text-gray-900 md:whitespace-normal whitespace-nowrap">
                                {{ $itemInven->code }}</td>
                            <td
                                class="px-6 py-4 text-sm font-light text-gray-900 md:whitespace-normal whitespace-nowrap">
                                {{ $itemInven->ubication }}
                            </td>
                            <td
                                class="px-6 py-4 text-sm font-light text-gray-900 md:whitespace-normal whitespace-nowrap">
                                {{ $itemInven->barcode }}
                            </td>
                            <td
                                class="px-6 py-4 text-sm font-light text-gray-900 md:whitespace-normal whitespace-nowrap">
                                {{ $itemInven->status }}</td>
                            <td
                                class="px-6 py-4 text-sm font-light text-gray-900 md:whitespace-normal whitespace-nowrap">
                                {{ $itemInven->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-3">
                                <div class="flex justify-center item-center">
                                    <a wire:click="showInventory({{ $itemInven }})">
                                        <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </a>
                                    {{-- @livewire('admin.edit-inventory', ['inventory' => $inventory], key($inventory->id)) --}}
                                    <a wire:click="editInventory({{ $itemInven }})">
                                        <button class="w-4 mr-2 transform hover:text-blue-500 hover:scale-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a wire:click="$emit('deleteInventory',{{ $itemInven->id }})">
                                        <button class="w-4 mr-2 transform hover:text-red-500 hover:scale-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($inventories->hasPages())
            {!! $inventories->links() !!}
        @endif
    @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <p class="w-full text-left  bg-emerald-300 text-gray-600 px-6 py-4 text-lg">No users found</p>
        </div>
    @endif
</div>

{{-- MODAL --}}
<x-jet-dialog-modal wire:model="open_edit">
    <x-slot name="title">
        {{ __('Edit') }}
    </x-slot>
    <x-slot name="content">
        <div class="mb-4">
            <x-jet-label value="{{ __('Code') }}" />
            <x-jet-input wire:model="inventory.code" class="w-full" type="text" />
            @error('inventory.code')
                <x-jet-input-error for="inventory.code" />
            @enderror
        </div>
        <div class="mb-4">
            <x-jet-label value="{{ __('Ubication') }}" />
            <x-jet-input wire:model="inventory.ubication" class="w-full" type="text" />
            @error('ubication')
                <x-jet-input-error for="ubication" />
            @enderror
        </div>
        <div class="mb-4">
            <x-jet-label value="{{ __('Barcode') }}" />
            <x-jet-input wire:model="inventory.barcode" class="w-full" type="text" />
            @error('barcode')
                <x-jet-input-error for="barcode" />
            @enderror
        </div>
        <div class="mb-4">
            <x-jet-label value="{{ __('Status') }}" />
            <x-jet-input wire:model="inventory.status" class="w-full" type="text" />
            @error('status')
                <x-jet-input-error for="status" />
            @enderror
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-danger-button wire:click="$set('open_edit',false)" class="mr-2">
            {{ __('Close') }}
        </x-jet-danger-button>
        <x-jet-danger-button wire:click="updateInventory" wire:loading.remove wire:target='updateInventory'>
            {{ __('Update') }}
        </x-jet-danger-button>
        <span wire:loading wire:target='updateInventory'>{{ __('Loading') . '....' }}</span>
    </x-slot>
</x-jet-dialog-modal>

@push('js')
    <script>
        Livewire.on('add', function() {
            Swal.fire(
                `{{ __('Created Successfully') }}`,
                `{{ __('A') }}`,
                'success',
            );
        });
    </script>
    <script>
        Livewire.on('edit', function() {
            Swal.fire(
                `{{ __('Edited Successfully') }}`,
                `{{ __('A') }}`,
                'success',
            );
        });
    </script>
    <script>
        Livewire.on('deleteInventory', inventoryId => {
            Swal.fire({
                title: `{{ __('Are you sure?') }}`,
                text: `{{ __("You won't be able to revert this!") }}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `{{ __('Yes, delete it!') }}`,
                cancelButtonText: `{{ __('Cancel') }}`
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.inventory', 'delete', inventoryId);
                    Swal.fire(
                        '{{ __('Deleted!') }}!',
                        '{{ __('The Inventory was successfully eliminated') }}',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush

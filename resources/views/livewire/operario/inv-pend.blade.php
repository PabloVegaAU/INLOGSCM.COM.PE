<div>
    <div class="flex flex-wrap w-full mb-4">
        <div class="w-full mx-auto mb-4 md:w-6/12 md:mb-0">
            <x-jet-input wire:model.debounce.300ms="search" type="text"
                class="flex-1 block w-full border-gray-300 rounded-md focus:ring-emerald-400 focus:border-emerald-400 sm:text-sm"
                placeholder="Search inventory's name..." />
        </div>
        <div class="relative w-4/12 mx-auto md:w-2/12 md:mb-0">
            <select wire:model="orderBy"
                class="block w-full px-3 py-2 capitalize bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-400 focus:border-emerald-400 sm:text-sm"
                id="grid-state">
                <option class="capitalize" value="name">{{ __('name') }}</option>
                <option class="capitalize" value="status">{{ __('status') }}</option>
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
                <thead class="text-gray-700 uppercase text-md bg-emerald-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            {{ __('status') }}
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            {{ __('Created At') }}
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                            {{ __('Accions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventories as $itemInven)
                        <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                            <td
                                class="px-6 py-4 text-sm font-light text-gray-900 md:whitespace-normal whitespace-nowrap">
                                {{ $itemInven->name }}</td>
                            <td
                                class="px-6 py-4 text-sm font-light text-gray-900 md:whitespace-normal whitespace-nowrap">
                                {{ $itemInven->status }}
                            </td>
                            <td
                                class="px-6 py-4 text-sm font-light text-gray-900 md:whitespace-normal whitespace-nowrap">
                                {{ $itemInven->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-3">
                                <div class="flex justify-center item-center">
                                    @if (count($itemInven->products) > 0)
                                        <a href="{{ route('operario.inventories.show', $itemInven) }}">
                                            <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </a>
                                    @endif
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
            <p class="w-full px-6 py-4 text-lg text-left text-gray-600 bg-emerald-300">No inventories found</p>
        </div>
    @endif
</div>

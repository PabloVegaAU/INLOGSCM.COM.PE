<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 capitalize">
        {{ __('Products') }}: Inv. {{ $products[0]->inventory->name }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <a href="{{ route('admin.inventories.index') }}"
                class="uppercase px-4 py-2 mb-4 text-white transition duration-500 border rounded-md select-none bg-emerald-400 ease hover:bg-emerald-600 focus:outline-none focus:shadow-outline focus:border-emerald-300 focus:ring focus:ring-emerald-200">
                {{ __('back') }}
            </a>
            @if ($products[0]->inventory->status == 'done')
                <button disabled
                    class="uppercase px-4 py-2 mb-4 text-white transition duration-500 border rounded-md select-none bg-red-400 ease hover:bg-red-500 focus:outline-none focus:shadow-outline focus:border-emerald-300 focus:ring focus:ring-emerald-200">
                    {{ __('Done Inv') }}
                </button>
            @else
                <a href="#" wire:click="finish_inventory({{ $products[0]->inventory->id }})" name="inv"
                    class="uppercase px-4 py-2 mb-4 text-white transition duration-500 border rounded-md select-none bg-orange-400 ease hover:bg-orange-500 focus:outline-none focus:shadow-outline focus:border-orange-300 focus:ring focus:ring-orange-200">
                    {{ __('Done Inv') }}
                </a>
            @endif
        </div>
        @error('inv')
            <x-jet-input-error for="inv" />
        @enderror

        @if ($products[0]->inventory->status != 'done')
            <div class="mt-4">
                <x-jet-label value="{{ __('Barcode') }}" />
                <x-jet-input class="w-full" type="text" wire:model='barcode' wire:poll.2000ms="check" />
                @error('barcode')
                    <x-jet-input-error for="barcode" />
                @enderror
            </div>
        @endif
        @if (session('success'))
            <div
                class="px-4 py-2 mb-4 text-white border rounded-md select-none bg-emerald-400 ease focus:outline-none focus:shadow-outline focus:border-emerald-300 focus:ring focus:ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif
        @if ($products->count())
            <div class="shadow-md sm:rounded-lg my-4">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 uppercase text-md bg-emerald-200 ">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                                {{ __('ubication') }}</th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                                {{ __('barcode') }}</th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                                {{ __('code') }}</th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                                {{ __('description') }}</th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                                {{ __('stock') }}</th>
                            @if ($products[0]->inventory->status != 'done')
                                <th scope="col" class="px-6 py-4 text-sm font-bold text-left text-gray-900">
                                    {{ __('accion') }}</th>
                            @endif
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    {{ $product->ubication }}</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-wrap">
                                    {{ $product->barcode }}</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-wrap">
                                    {{ $product->code }}</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-wrap">
                                    {{ $product->description }}</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-wrap">
                                    {{ $product->stock }}/{{ $product->checked }}</td>
                                @if ($product->inventory->status != 'done')
                                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-wrap">
                                        <div class="flex justify-center item-center">
                                            @livewire('admin.edit-product', ['product' => $product], key($product->id))
                                            <button wire:click="stock_reset({{ $product->id }})"
                                                class="w-4 mr-2 transform hover:text-blue-500 hover:scale-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-counterclockwise"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                    <path
                                                        d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                                </svg>
                                            </button>
                                @endif

            </div>
            </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    @if ($products->hasPages())
        {!! $products->links() !!}
    @endif
@else
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <p class="w-full px-6 py-4 text-lg text-left text-gray-600 bg-emerald-300">No users found</p>
    </div>
    @endif
</div>
</div>

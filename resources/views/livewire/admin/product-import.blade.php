<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 capitalize">
            {{ __('Products') }}: Inv. {{ $products[0]->inventory->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.inventories.index') }}"
                class="uppercase px-4 py-2 mb-4 text-white transition duration-500 border rounded-md select-none bg-emerald-400 ease hover:bg-emerald-600 focus:outline-none focus:shadow-outline focus:border-emerald-300 focus:ring focus:ring-emerald-200">
                {{ __('back') }}
            </a>
            <div>
                <div class="mb-4">
                    <x-jet-label value="{{ __('barcode') }}" />
                    <x-jet-input class="w-full" type="text" wire:model='barcode' />
                    @error('barcode')
                        <x-jet-input-error for="barcode" />
                    @enderror
                </div>
            </div>
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
</x-app-layout>

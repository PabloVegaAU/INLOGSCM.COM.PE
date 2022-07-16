<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div
                    class="px-4 py-2 mb-4 text-white border rounded-md select-none  bg-emerald-400 ease focus:outline-none focus:shadow-outline focus:border-emerald-300 focus:ring focus:ring-emerald-200">
                    {{ session('success') }}
                </div>
            @endif
            <livewire:operario.inv-pend />
        </div>
    </div>
</x-app-layout>

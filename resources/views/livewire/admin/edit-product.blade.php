<div>
    <button wire:click="$set('open',true)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
    </button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Edit') . ' ' . $product->code }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="{{ __('Ubication') }}" />
                <x-jet-input wire:model="product.ubication" class="w-full" type="text" />
                @error('product.ubication')
                    <x-jet-input-error for="product.ubication" />
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="{{ __('Barcode') }}" />
                <x-jet-input wire:model="product.barcode" class="w-full" type="text" />
                @error('product.barcode')
                    <x-jet-input-error for="product.barcode" />
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="{{ __('Code') }}" />
                <x-jet-input wire:model="product.code" class="w-full" type="text" />
                @error('product.code')
                    <x-jet-input-error for="product.code" />
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="{{ __('Description') }}" />
                <textarea wire:model="product.description"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                </textarea>
                @error('product.description')
                    <x-jet-input-error for="product.description" />
                @enderror
            </div>
            {{-- <div class="mb-4">
                <x-jet-label value="{{ __('Status') }}" />
                <x-jet-input wire:model="inventory.status" class="w-full" type="text" />
                @error('status')
                    <x-jet-input-error for="status" />
                @enderror
            </div> --}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open',false)" class="mr-2">
                {{ __('Close') }}
            </x-jet-danger-button>
            <x-jet-secondary-button wire:click="save" wire:loading.remove wire:target='save'>
                {{ __('Create') }}
            </x-jet-secondary-button>
            <span wire:loading wire:target='save'>{{ __('Loading') . '....' }}</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>

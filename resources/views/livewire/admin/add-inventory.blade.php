<div>
    <button wire:click="$set('open',true)"
        class="px-4 py-2 mb-4 text-white transition duration-500 border rounded-md select-none  bg-emerald-400 ease hover:bg-emerald-600 focus:outline-none focus:shadow-outline focus:border-emerald-300 focus:ring focus:ring-emerald-200">
        {{ __('ADD') }}
    </button>

    <input type="file" name="file" id="file" class="inputfile"
        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
    <label for="file"
        class="px-4 py-2 mb-4 text-white transition duration-500 border rounded-md select-none  bg-emerald-400 ease hover:bg-emerald-600 focus:outline-none focus:shadow-outline focus:border-emerald-300 focus:ring focus:ring-emerald-200">
        {{ __('IMPORT') }}
    </label>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Create new') }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="{{ __('Code') }}" />
                <x-jet-input class="w-full" type="text" wire:model='code' />
                @error('code')
                    <x-jet-input-error for="code" />
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="{{ __('Ubication') }}" />
                <x-jet-input class="w-full" type="text" wire:model='ubication' />
                @error('ubication')
                    <x-jet-input-error for="ubication" />
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="{{ __('Barcode') }}" />
                <x-jet-input class="w-full" type="text" wire:model='barcode' />
                @error('barcode')
                    <x-jet-input-error for="ubication" />
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="{{ __('Status') }}" />
                <x-jet-input class="w-full" type="text" wire:model='status' />
                @error('status')
                    <x-jet-input-error for="ubication" />
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open',false)" class="mr-2">
                {{ __('Close') }}
            </x-jet-danger-button>
            <x-jet-danger-button wire:click="save" wire:loading.remove wire:target='save'>
                {{ __('Create') }}
            </x-jet-danger-button>
            <span wire:loading wire:target='save'>{{ __('Loading') . '....' }}</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>

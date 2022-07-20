<div>
    <button wire:click="$set('open',true)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
    </button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Edit') . ' ' . $inventory->code }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input wire:model="inventory.name" class="w-full" type="text" />
                @error('inventory.name')
                    <x-jet-input-error for="inventory.name" />
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="{{ __('Operator') }}" />
                <select id="user_id"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="user_id" wire:model="inventory.user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            {{ $this->inventory->user->id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('inventory.operator')
                    <x-jet-input-error for="inventory.operator" />
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="{{ __('Status') }}" />
                <select id="status"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="status" wire:model="inventory.status">
                        <option value="done" {{ $this->inventory->user->id == "done" ? 'selected' : '' }}>
                            done
                        </option>
                        <option value="not yet" {{ $this->inventory->user->id == "not yet" ? 'selected' : '' }}>
                            not yet
                        </option>
                        <option value="process" {{ $this->inventory->user->id == "process" ? 'selected' : '' }}>
                            process
                        </option>
                </select>
                @error('status')
                    <x-jet-input-error for="status" />
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
            <x-jet-danger-button wire:click="save" wire:loading.remove wire:target='save'>
                {{ __('Create') }}
            </x-jet-danger-button>
            <span wire:loading wire:target='save'>{{ __('Loading') . '....' }}</span>
        </x-slot>
    </x-jet-dialog-modal>

</div>

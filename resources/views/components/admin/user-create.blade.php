<div class="w-full px-6 py-4 overflow-hidden bg-white shadow-md sm:max-w-full sm:rounded-lg">

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div>
            <x-jet-label for="name" value="{{ __('Username') }}" />
            <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" autofocus
                autocomplete="off" />
            <x-jet-input-error for="name" />
        </div>

        <div class="mt-4">
            <x-jet-label for="realname" value="{{ __('Name') }}" />
            <x-jet-input id="realname" class="block w-full mt-1" type="text" name="realname" :value="old('realname')" required
                autofocus autocomplete="off" />
            <x-jet-input-error for="realname" />
        </div>

        <div class="mt-4">
            <x-jet-label for="realsurname" value="{{ __('Surname') }}" />
            <x-jet-input id="realsurname" class="block w-full mt-1" type="text" name="realsurname" :value="old('realsurname')"
                required autofocus autocomplete="off" />
            <x-jet-input-error for="realsurname" />
        </div>

        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" autofocus
                autocomplete="off" />
            <x-jet-input-error for="email" />
        </div>

        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" :value="old('password')"
                required autocomplete="new-password" />
            <x-jet-input-error for="password" />
        </div>

        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" :value="old('password_confirmation')"
                name="password_confirmation" required autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-jet-button class="ml-4">
                {{ __('Register') }}
            </x-jet-button>
        </div>
    </form>
</div>
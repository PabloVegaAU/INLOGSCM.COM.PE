<div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 place-items-center">
    <div class="p-12 mt-10 rounded-full bg-sky-600 hover:bg-sky-700">
        <a href="{{ route('admin.users.index') }}">
            <div class="flex flex-row">
                <div class="mr-5">
                    <img src="{{ asset('storage/images/logo.png') }}" class="w-28 h-28">
                </div>
                <div class="place-self-center">
                    {{ __('GESTIONAR DE CUENTAS') }}
                </div>
            </div>
        </a>
    </div>
</div>
<div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 md:grid-cols-2 place-items-center">
    <div class="p-12 rounded-full bg-sky-600 hover:bg-sky-700">
        <a href="/">
            <div class="flex flex-row">
                <div class="mr-5">
                    <img src="{{ asset('storage/images/logo.png') }}" class="w-28 h-28" alt="">
                </div>
                <div class="place-self-center">
                    {{ __('INVENTARIOS CONCLUIDOS') }}

                </div>
            </div>
        </a>
    </div>

    <div class="justify-center p-12">
        <div class="p-12 rounded-full bg-sky-600 hover:bg-sky-700 ">
            <div class="flex flex-row">
                <div class="mr-5">
                    <img src="{{ asset('storage/images/logo.png') }}" class="w-28 h-28" alt="">
                </div>
                <div class="place-self-center">
                    {{ __('INVENTARIOS CONCLUIDOS') }}
                </div>
            </div>
            </a>
        </div>
    </div>

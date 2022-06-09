<div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 md:grid-cols-2 place-items-center">
    <div class="p-3 md:p-12 mt-10 rounded-full bg-emerald-100 hover:bg-emerald-200 mb-4">
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
    <div class="p-3 md:p-12 mt-10 rounded-full bg-emerald-100 hover:bg-emerald-200 mb-4">
        <a href="{{ route('admin.inventories.index') }}">
            <div class="flex flex-row">
                <div class="mr-5">
                    <img src="{{ asset('storage/images/logo.png') }}" class="w-28 h-28">
                </div>
                <div class="place-self-center">
                    {{ __('GESTIONAR DE INVENTARIOS') }}
                </div>
            </div>
        </a>
    </div>
</div>
<div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 md:grid-cols-2 place-items-center">
    <div class="p-3 md:p-12 rounded-full bg-emerald-100 hover:bg-emerald-200 mb-4">
        <a href="/">
            <div class="flex flex-row">
                <div class="mr-5">
                    <img src="{{ asset('storage/images/logo.png') }}" class="w-28 h-28" alt="">
                </div>
                <div class="place-self-center">
                    {{ __('INVENTARIOS PENDIENTES') }}

                </div>
            </div>
        </a>
    </div>


    <div class="p-3 md:p-12 rounded-full bg-emerald-100 hover:bg-emerald-200 mb-4">
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

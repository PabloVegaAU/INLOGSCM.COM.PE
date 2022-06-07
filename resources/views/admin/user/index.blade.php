<x-app-layout>
    @if (session()->has('message'))
        <div class="inline-flex items-center w-full px-6 py-5 mb-3 text-base text-green-700 bg-green-100 rounded-lg"
            role="alert">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                </path>
            </svg>
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('admin.users.create') }}">
                <button
                    class="px-4 py-2 mb-4 text-white transition duration-500 border rounded-md select-none border-emerald-500 bg-emerald-400 ease hover:bg-emerald-600 focus:outline-none focus:shadow-outline">
                    {{ __('ADD') }}
                </button>
            </a>
            <div>
                <livewire:users-table>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('admin.users.create') }}">
                <button
                    class="px-4 py-2 m-2 text-white transition duration-500 bg-indigo-500 border border-indigo-500 rounded-md select-none ease hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                    {{ __('ADD') }}
                </button>
            </a>

            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-admin.UserList />
            </div>
        </div>
    </div>
</x-app-layout>

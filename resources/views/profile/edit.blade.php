<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="lg:flex items-center">
                <div class="m-4 ">
                    <form action="{{ route('truncate-tables') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-xl"
                            onclick="return confirm('Are you really really positive you want to delete all data ?')">Delete
                            all the
                            Data</button>
                    </form>
                </div>

                <div class="m-4 bg-indigo-600 border-white hover:bg-indigo-700 w-fit rounded-xl">

                    <button id="schemaDumpButton" class="text-white font-medium p-1 pr-3 py-2 pl-3">Download
                        Database</button>
                    <script>
                        document.getElementById('schemaDumpButton').addEventListener('click', function() {
                            window.location.href = "{{ route('schema.dump') }}";
                        });
                    </script>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

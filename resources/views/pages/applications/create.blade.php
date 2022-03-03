<x-app-layout>
    <x-slot name="header">

    </x-slot>
    {{-- List all projects by loged in user --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('projects.store') }}" method="post">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>


                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <textarea name="description" id="description" cols="30" rows="10" class=" block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        </div>


                        <div class="mt-4">
                            <x-label :value="__('What i need')" />
                        </div>
                        @foreach ($academies as $academy)

                        <div class="mt-4">
                            <x-label for="academy{{ $academy->id }}" value="{{ $academy->name }}" />

                            <x-input id="academy{{ $academy->id }}" class="block mt-1 w-full" type="checkbox" name="academy_id[]" value="{{ $academy->id }}" />
                        </div>
                        @endforeach
                        <x-button class="mt-4">
                            {{ __('Create') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
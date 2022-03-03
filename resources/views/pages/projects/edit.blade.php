<x-app-layout>
    @section('css')
    <style>
        body {
            overflow: hidden;
            font-family: montserrat, sans-serif;
            font-style: normal;
            font-size: large;
            background-color: #f6f6f6;
        }

        .title-text-size {
            font-size: 55px;

        }
    </style>
    @endsection
    <x-slot name="header">

    </x-slot>
    {{-- List all projects by loged in user --}}



    <form action="/projects/{{$project->id}}/update-projects" method="post">
        @csrf
        <div class="row margin-create">
            <div class="col-6">

                <h3 class="col mb-5">
                    {{ __('Edit Project') }}
                </h3>

                <div>
                    <input id="name" class=" input-border-style bg-transparent block mt-1 " type="text" name="name" value="{{$project->name}}" required autofocus>
                </div>


                <div class="mt-4">
                    <label for="description" :value="__('Description')" class="biography-style">Description of project
                        <textarea name="description" id="description" cols="30" rows="10" class="block rounded-md mt-1 w-full width-textarea fw-lighter" placeholder=" Lorem Ipsum is simply dummy text of the printing and typesetting industry unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry unchanged" required name="biography" id="biography" cols="30" rows="10">{{$project->description}}</textarea>
                </div>
            </div>

            <div class="col-6 justify-content-center row">
                <div class="mb-5">
                    <x-label class="h3" :value="__('What I need')" />
                </div>
                @foreach ($academies as $academy)

                <div class="col-3 text-center checkbox-button radio-button-style">
                    <x-label class="justify-content-center skills-hover" for="academy{{ $academy->id }}" value="{{ $academy->name }}" />

                    <x-input id="academy{{ $academy->id }}" class="block w-full" type="checkbox" name="academy_id[]" value="{{ $academy->id }}" />
                </div>

                @endforeach
            </div>

        </div>

        <div class="d-flex col-11 academies-button-style justify-content-sm-end align-items-end items-center">
            <x-button class="green button-style">
                {{ __('Update') }}
            </x-button>
        </div>

    </form>
    </div>



</x-app-layout>
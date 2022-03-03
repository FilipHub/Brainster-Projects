<x-app-layout>
    @section('css')
    <style>
        .header,
        .footer {
            overflow: hidden;
            position: fixed;
        }

        body {
            overflow-x: hidden;
            font-family: montserrat, sans-serif;
            font-style: normal;
            /* font-size: large; */
            height: 100%;

            background-color: #f6f6f6;

        }
    </style>
    @endsection
    <x-slot name="header">

    </x-slot>


    <form action="/profile/update-profile" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="row margin-create">
            <div class="col-5">

                <h3 class=" col mb-5">
                    {{ __('My Profile') }}
                </h3>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="image-wrapper mb-2">
                            <p class="profile-image-style mt-2 text-center">
                                <img value="{{ $user->image }}" class="img-rounded image-shape" src="{{ asset('storage/'.$user->image) }}" width="80px" alt="">
                            </p>
                        </div>

                        <p class="row mt-3 profile-upload d-flex justify-content-center">
                            <x-input id="image" class="block mt-1 w-full" required type="file" name="image" capture />
                            <x-label class="label-text-size" for="image" value="Click here to upload an image" />
                        </p>
                    </div>
                    <div class="col-sm-6 mt-3">


                        <!-- Name -->
                        <x-input id="name" class="input-border-style block mt-1 w-full" type="name" name="name" value="{{ $user->name }}" required />


                        <!-- Surname -->
                        <x-input id="surname" class="input-border-style block mt-1 w-full" type="surname" name="surname" value="{{ $user->surname }}" required />


                        <!-- Email Address -->
                        <x-input id="email" class="input-border-style block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />


                    </div>
                    <div class="col-12">
                        <div class="mt-4">
                            <label for="biography" :value="__('Biography')" class="biography-style">Biography
                                <textarea name="biography" id="biography" cols="30" rows="10" class="block rounded-md mt-1 w-full width-textarea fw-lighter" placeholder=" Lorem Ipsum is simply dummy text of the printing and typesetting industry unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry unchanged" required name="biography" id="biography" cols="30" rows="10">{{ $user->biography }}
                                </textarea>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-7 justify-content-center mt-5 row">
                <div class="my-profile-skills text-center">

                    @foreach($skills as $skill)

                    <div class="profile-edit-button display-inline m-1 ">
                        <x-label class="justify-content-center skills-hover" for="skill{{ $skill->id }}" value="{{$skill->name}}" />
                        <x-input id="skill{{ $skill->id }}" class="block mt-1 w-full" type="checkbox" name="skills_ids[]" value="" />

                    </div>

                    @endforeach

                </div>

                <div class="d-flex mt-2 justify-content-sm-end align-items-end align-bottom">

                    <x-button class="ml-4 green button-style">
                        {{ __('EDIT') }}
                    </x-button>
                </div>

            </div>

        </div>




    </form>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-danger logout-button">Logout</button>

    </form>
    @section('js')
    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("readMore");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
    @endsection
</x-app-layout>
<x-guest-layout>
    @section('css')
    <style>
        body {
            overflow: hidden;
            font-family: montserrat, sans-serif;
            font-style: normal;
            font-size: large;
        }

        .title-text-size {
            font-size: 55px;

        }
    </style>
    @endsection

    <section id="sectionOne" class="first-step vh-100">
        <x-auth-card>
            <x-auth-validation-errors :errors="$errors" />
            <x-slot name="logo">

            </x-slot>
            <div class="">
                <h1 class="text-black mt-4 title-text-size font-weight-bold mb-5">Register</h1>
            </div>

            <!-- Validation Errors -->


            <form method="POST" action="{{ route('step_one') }}">
                @csrf

                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <div class="">
                            <x-input id="name" placeholder="Name" class="width-input bg-transparent block mt-1 w-full input-border-style" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                    </div>

                    <div class="col-sm-6 mt-3">
                        <!-- Surname -->
                        <div>
                            <x-input id="surname" placeholder="Surname" class="width-input input-border-style block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input id="email" placeholder="Email" class="width-input input-border-style block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input id="password" placeholder="Password" class="width-input input-border-style block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
                    </div>
                </div>
                <div class="row m-0 mt-5">
                    <div class="mt-4 p-0">
                        <p class="biography-style">Biography</p>
                        <textarea class="width-textarea fw-lighter" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged." required name="biography" id="biography" cols="30" rows="10" class="block rounded-md mt-1 w-full"></textarea>
                    </div>
                </div>

                <div class="flex mt-2">

                    <x-button class="ml-4 green button-style">
                        {{ __('Next') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </section>












    <section id="sectionTwo" class="second-step vh-100">
        <div class="row">
            <div class="col-sm-12 vh-100">
                <x-slot name="logo">

                </x-slot>
                <div class="my-5 offset-sm-1 pb-5">
                    <div class="row mt-5">
                        <div class="col-sm-3">
                            <p class="text-black title-text-size">Academies
                            </p>
                        </div>


                        <div class="col-sm-9 align-items-center orange-span-style">
                            <p class="orange-span"></p>
                        </div>
                    </div>

                    <p style="font-size: 20px; letter-spacing: 1px;">Please select one of the academies listed below</p>
                </div>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 mt-5" :errors="$errors" />

                <form method="POST" action="{{ route('step_two') }}">
                    @csrf

                    <div class="step-2-sizing text-center">
                        @foreach($academies as $academy)
                        <button type="button" class="radio-button-style academy_btn  m-2" onclick="submitButtonStyle(this) ">
                            <x-label id="academies" class="justify-content-center  radioButton" for="academy{{$academy->id}}" value="{{$academy->name}}" />
                            <x-input id="academy{{ $academy->id }}" type="radio" name="academy_id" value="{{$academy->id}}" />
                        </button>
                        @endforeach
                    </div>

                    <div class="d-flex col-11 academies-button-style justify-content-sm-end align-items-end items-center">

                        <x-button class="green button-style">
                            {{ __('Next') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </section>










    <section id="sectionThree" class="third-step vh-100 col-12">
        <div class="row">
            <div class="col-sm-12 vh-100">
                <x-slot name="logo">

                </x-slot>
                <div class="mt-5 offset-1 pb-4">
                    <div class="row mt-5">
                        <div class="col-sm-1 marigin-right">
                            <p class="text-black mr-3 title-text-size">Skills
                            </p>
                        </div>


                        <div class="col-sm-10 p-0 orange-span-style align-items-center">
                            <p class="orange-span-skills"></p>
                        </div>
                    </div>

                    <p style="font-size: 20px; letter-spacing: 1px;">Please select your skill set</p>
                </div>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 mt-5" :errors="$errors" />

                <form method="POST" action="{{ route('step_three') }}">
                    @csrf
                    <div class="step-3-scroll text-center">

                        @foreach($skills as $skill)
                        <button type="button" class="skill_btn justify-content-center m-2" onclick="submitButtonStyle(this) ">
                            <x-label for="skill{{ $skill->id }}" class="checkbox-button ">
                                <x-input id="skill{{ $skill->id }}" class="block mt-1 w-full" type="checkbox" name="skills_ids[]" value="{{$skill->id}}" />
                                <div class="d-flex justify-content-center text-align-middle">
                                    <span class="span-text-center">{{$skill->name}}</span>
                                </div>
                            </x-label>
                        </button>

                        @endforeach
                    </div>

                    <!-- <div class="flex items-center justify-end mt-4"> -->

                    <div class="d-flex col-11 skills-button-style justify-content-sm-end align-items-end items-center">

                        <x-button class="green bd-highlight button-style">
                            {{ __('Next') }}
                        </x-button>
                    </div>
                    <!-- </div> -->
                </form>
            </div>
        </div>
    </section>













    <section id="sectionFour" class="fourth-step vh-100 col-12">
        <div class="row">
            <div class="col-sm-12 vh-100">

                <x-slot name="logo">

                </x-slot>
                <div class="my-3 pb-4">
                    <div class="row offset-sm-1 mt-5">
                        <div class="col-sm-5">
                            <p class="text-black title-text-size">Your profile image
                            </p>
                        </div>


                        <div class="col-sm-7 align-items-center orange-span-style">
                            <p class="orange-span"></p>
                        </div>
                    </div>


                </div>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('step_four') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex justify-content-center">
                        <div class="row image-div">
                            <img class="register-profile-picture" src="{{ asset('storage/uploads/users/images/default.png') }}" alt="Card image cap">
                            <x-input id="image" class="block w-full" type="file" name="image" capture />
                            <x-label for="image" class="row label-style d-flex justify-content-center" value="Click here to upload an image" />
                        </div>



                    </div>



                    <div class="d-flex col-12 mt-5 skills-button-style justify-content-sm-center">
                        <x-button class="green mt-5 bd-highlight button-style">
                            {{ __('FINISH') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>



    </section>



    @section('js')
    <script>
        let url_string = window.location.href
        let url = new URL(url_string);
        let registration_step = url.searchParams.get("registration_step");



        if (registration_step == null || registration_step == 1) {
            document.getElementById("sectionOne").scrollIntoView();
        }

        if (registration_step == 2) {
            document.getElementById("sectionTwo").scrollIntoView();
        }

        if (registration_step == 3) {
            document.getElementById("sectionThree").scrollIntoView();
        }

        if (registration_step == 4) {
            document.getElementById("sectionFour").scrollIntoView();
        }

        if (document.querySelector("academy{{ $academy->id }}").checked) {
            document.querySelector(".radioButton").style.selected = "#48695c";
        }

        function submitButtonStyle(_this) {
            _this.style.backgroundColor = "#48695c"
            _this.style.color = "white"

        }
    </script>
    @endsection

</x-guest-layout>
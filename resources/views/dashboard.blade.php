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

            background-image: url("../css/Images/3.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top;
            background-attachment: fixed;

        }
    </style>
    @endsection
    <x-slot name="header">

    </x-slot>


    {{-- Filter by academies --}}
    <div class="row p-0 d-flex">
        <div class="col-sm-3 pt-4 dashboard-offset" id="fixed">
            <p class="text-center bigger-text">In what field can you be amazing?</p>

            <div class="row d-flex justify-content-evenly academies-wrapper py-5">
                <div class="col-4 mx-3 radio-button-style">
                    <a class="text-decoration-none dashboard-academies-style text-center" href="/dashboard">
                        <div class="col-6  dashboard-academies-style text-center">
                            All
                        </div>
                    </a>
                </div>
                @foreach ($academies as $academy)
                <div class="col-4 mx-3 radio-button-style ">
                    <a class="text-decoration-none dashboard-academies-style text-center" href="?academy={{ $academy->id }}">
                        <div class="col-6 dashboard-academies-style text-center">
                            {{ $academy->name }}
                        </div>
                    </a>
                </div>

                @endforeach


            </div>
        </div>
        <div class="pt-2 pl-0 pr-0 row ">

            <p class="col-sm-3 offset-8 mt-3"><span class="d-inline"><img class="icons1 mt-4" src="../css/icons/3.png"></span>Checkout the latest projects</p>

            @foreach ($projects as $project)
            <div class="bg-white row card-style col-sm-7 m-project mt-5 mb-5 offset-4">
                <div class="col-4 position-relative">
                    <div class="image-wrapper mb-5">
                        <p class="image-style text-center">

                            <img class="img-rounded image-shape" src="{{ asset('storage/'.$project->user->image) }}" width="80px" alt="">

                        </p>
                    </div>


                    <p class="mt-4 text-center name-style">
                        {{ $project->user->name }} {{$project->user->surname}}
                    </p>
                    <p class="orange text-center">
                        @if($project->user->academy->name === "Backend Development")
                        I'm a Backend Developer
                        @elseif($project->user->academy->name === "Design")
                        I'm a Designer
                        @elseif($project->user->academy->name === "Frontend Development")
                        I'm a Frontend Developer
                        @elseif($project->user->academy->name === "Marketing")
                        I'm a Marketer
                        @elseif($project->user->academy->name === "Data Science")
                        I'm a Data Scientist
                        @elseif($project->user->academy->name === "QA")
                        I'm a QA Engineer
                        @elseif($project->user->academy->name === "UX/UI")
                        I'm a UX/UI Designer
                        @endif
                    </p>

                    <div class="mt-5 pt-5 parent-div">
                        <div class="child-div">
                            <p class="text-center font-size-small">
                                I am looking for:
                            </p>

                            <div class="row d-flex justify-content-center">
                                @php
                                $requirementsCounter = 0;
                                @endphp
                                @foreach ($project->requirements as $requirement)
                                @if($requirementsCounter<'4') <div class="half-circle col-3">
                                    @if($requirement->name === "Backend Development")
                                    Backend Dev
                                    @elseif($requirement->name === "Design")
                                    Designer
                                    @elseif($requirement->name === "Frontend Development")
                                    Frontend Dev
                                    @elseif($requirement->name === "Marketing")
                                    Marketer
                                    @elseif($requirement->name === "Data Science")
                                    Data
                                    @elseif($requirement->name === "QA")
                                    QA
                                    @elseif($requirement->name === "UX/UI")
                                    UX/UI
                                    @endif
                            </div>
                            @php
                            $requirementsCounter++;
                            @endphp
                            @endif

                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-8">
                <div class="counter-wrapper">
                    <p class="counter-style">
                        <span class="counter-number-font">{{ $project->applicants->count() }}</span>

                        <br>
                        Applicants
                    </p>
                </div>

                <p class="mt-4">
                    {{ $project->name }}
                </p>
                <p class="mt-4">
                    Project description:
                <p class="font-size-small">
                    {{ str_limit($project->description, 200, '') }}

                    @if (strlen($project->description) > 200)
                    <span id="dots">...</span>
                    <span id="more">{{ substr($project->description, 200) }}</span>
                    <button class="show-more-button" onclick="myFunction()" id="readMore">Show more</button>
                    @endif


                </p>
                </p>

                <div class="mt-4 mb-2 d-flex justify-content-sm-end align-items-end align-bottom">
                    @if ( in_array( $project->id, auth()->user()->applications()->pluck('projects.id')->toArray() ) )
                    <a class="mt-4 text-decoration-none apply-button-selected">
                        {{ __("I'M IN") }}
                    </a>
                    @else

                    <form name="myform" id="myform" action=" {{ route('applications.store', ['id' => $project->id]) }}" method="POST">
                        @csrf
                        <x-button id="submit" onClick="successMessage()" class=" mt-4 apply-button">
                            {{ __("I'M IN") }}
                        </x-button>
                        <div style="display: none;" id="application-successful" class="col-6 offset-3 alert alert-success fixed-top" role="alert">
                            <span> Succesfully applied to the project !</span>
                        </div>
                    </form>




                    @endif

                </div>
            </div>


        </div>

    </div>
    @endforeach
    </div>

    @section('js')
    <script>
        function successMessage() {
            document.getElementById("application-successful").style.display = "inline";
            setTimeout(function() {
                location.reload(true);
            }, 2000);

        }



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
        $('.radio-btn').click(function() {
            $('.col').removeClass('text-white').css({
                'background-color': '#ffffff',
            });;
            $(this).filter(':checked').parent().addClass('text-white').css({
                'background-color': '#48695c',
            });
        });
    </script>
    @endsection


</x-app-layout>
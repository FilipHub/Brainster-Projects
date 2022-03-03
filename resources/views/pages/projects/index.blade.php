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
            background-image: url("../css/Images/4.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top;
            background-attachment: fixed;
        }
    </style>
    @endsection
    <x-slot name="header">
        <h6 class="">
        </h6>
    </x-slot>
    {{-- List all projects created by the logged in user --}}
    <div class="row">
        <div class="col-10 offset-1 mb-4">
            <h6>Have new idea to make the world better?</h6>
            <h3><a class="text-decoration-none text-black ml-5" href="{{ route('projects.create') }}">Create new project
                    <img class="icons" src="../css/icons/1.png" alt="">
                </a>

            </h3>
        </div>
    </div>
    <div class="row d-flex">
        @foreach ($projects as $project)
        <div class="row my-projects-card">
            <div class="row bg-white  card-style my-5 col-8 offset-2">
                <div class="col-4">
                    <div class="col-4 position-relative">
                        <div class="image-wrapper mb-5">
                            <p class="image-style text-center">

                                <img class="img-rounded image-shape" src="{{ asset('storage/'.$project->user->image) }}" width="80px" alt="">


                            </p>
                        </div>
                    </div>

                    <p class="mt-4 text-center name-style">
                        {{ $project->user->name }}
                        {{$project->user->surname}}
                    </p>
                    <p class=" orange text-center">
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

                    <div class="mt-5 pt-5">
                        <p class="text-center font-size-small">
                            I am looking for:
                        </p>

                        <div class="row d-flex the-position justify-content-center">
                            @php
                            $requirementsCounter = 0;
                            @endphp
                            @foreach ($project->requirements as $requirement)
                            @if($requirementsCounter<4) <div class="half-circle col-3">
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
            <div class="col-8">
                <a href="/projects/{{$project->id}}/applicants">
                    <div class="counter-wrapper">
                        <p class="counter-style">
                            <span class="counter-number-font">{{ $project->applicants->count() }}</span>

                            <br>
                            Applicants
                        </p>
                    </div>
                </a>

                <p class="mt-4">
                    {{ $project->name }}
                </p>
                <p class="mt-4">
                    Project description:
                <p class="font-size-small">
                    {{ str_limit($project->description, 400, '') }}

                    @if (strlen($project->description) > 400)
                    <span id="dots">...</span>
                    <span id="more">{{ substr($project->description, 200) }}</span>
                    <button class="show-more-button" onclick="myFunction()" id="readMore">Read more</button>
                    @endif


                </p>
                </p>
            </div>
        </div>
        <div class="col-1 icon-wrapper">
            <a href="/projects/{{$project->id}}/edit"><img class="icons mt-5" src="../css/icons/8.png"></a>

            <form action="/projects/{{$project->id}}/destroy" method="POST">
                @csrf
                <x-button class="delete-button"><img class="icons mt-2" src="../css/icons/7.png"></x-button>
            </form>

        </div>
    </div>

    @endforeach

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
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
            background-image: url("../css/Images/5.jpg");
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
    <div class="row">
        <h3 class="col offset-1">
            {{ __('My Applications') }}
        </h3>
    </div>

    <div class="row d-flex ">
        @foreach ($projects as $project)
        <div class="row my-applications-card">
            <div class="row bg-white  card-style my-5 col-8 offset-2">
                <div class="col-4">
                    <div class="image-wrapper mb-5">
                        <p class="image-style text-center">

                            <img class="img-rounded" src="{{ asset('storage/'.$project->user->image)  }}" width="80px" alt="">

                        </p>
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
                    <button class="show-more-button" onclick="myFunction()" id="readMore">Read more</button>
                    @endif

                </p>
                </p>
            </div>
        </div>
        <!-- <small>{{ $project->created_at->format('d/m/y') }}</small> -->
        <div class="col-1 application-icon-wrapper text-center">
            <form action="/applications/{{$project->applicants}}/destroy" method="POST">
                @csrf
                <x-button class="delete-button"><img class="icons mt-5" src="../css/icons/2.png"><br><span class="icons mt-2 text-secondary">Cancel</span>
                </x-button>
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
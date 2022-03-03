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
        <h6 class="">
        </h6>
    </x-slot>
    {{-- List all projects created by the logged in user --}}
    <div class="row">
        <div class="col-10 offset-1 mb-4">
            <h3>{{ $project->name }} Applicants</h3>
            <h5 class="d-inline">Choose your teamates </h5><img class="icons2 d-inline" src="/css/icons/4.png" alt="">
        </div>
    </div>
    <div class="row d-flex mt-5">
        <div class="col-8 mt-5 d-flex justify-content-around offset-2">
            @foreach($project->applicants as $applicant)

            <div class="col-4 m-1 text-center bg-white applicants-card ">
                <div class="image-wrapper mb-5">
                    <p class="image-style-profile text-center">
                        <img class="img-rounded image-shape" src="{{ asset('storage/'.$applicant->image) }}" width="80px" alt="">
                    </p>
                </div>
                <h5 class="mt-5">{{$applicant->name}}</h5>
                <p class="orange">{{$applicant->academy->name}}</p>
                <p class="font-size-small">{{$applicant->email}}</p>
                <p class="message-font">{{$applicant->biography}}</p>

                <img class="icon_plus mb-3" src="/css/icons/1.png" alt="">
            </div>
            @endforeach

        </div>


    </div>


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
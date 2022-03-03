@section('css')
<style>
    body {
        font-family: montserrat, sans-serif;
        font-style: normal;
        font-weight: 700;
        /* font-size: large; */


    }
</style>
@endsection

<nav class="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">
            <h4 class="text-black logo d-block d-flex px-4 text-uppercase">brainster<span class="text-secondary text-uppercase">preneurs</span></h4>
        </a>

        <a class="" href="/projects">
            <ul class="navbar-nav align-items-center d-flex flex-row-reverse">
                <li class="nav-item mx-3">
                    <div style="width:50px; margin-bottom:4px; height:50px; margin-right:50px; background-color: transparent;  border-radius:50%" class="d-flex align-middle justify-content-center">
                        <img style="width:50px; margin-bottom:4px; height:50px; margin-right:50px;  border-radius:50%" src="storage/{{Auth::user()->image}}" alt="">
                    </div>
                </li>
                <li class="nav-item mx-3 active ">
                    <a class="text-decoration-none text-black" href="/profile">My Profile</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="text-decoration-none text-black" href="/applications">My Applications</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="text-decoration-none text-black" href="/projects">My Projects</a>
                </li>

            </ul>
        </a>


    </div>
    <div class="col-sm-12 align-items-center orange-span-style">
        <p class="orange-span-full"></p>
    </div>
</nav>
<script>
    function navFunction() {
        var showNav = document.getElementById("showNav");

        if (showNav.style.display === "none") {
            showNav.style.display = "none";
        } else {
            showNav.style.display = "inline";
        }
    }
</script>
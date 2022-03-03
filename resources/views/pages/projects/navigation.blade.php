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

        <a href="/projects">
            <div style="width:50px; height:50px; margin-right:50px; background-color:black;  border-radius:50%" class="d-flex align-middle justify-content-center">
            </div>
        </a>

        <div class="bg-trasparent">
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="d-flex border-none">
                        <div>{{ Auth::user()->name }}</div>
                        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <!-- <x-slot name="content">
                    <!-- Authentication -->
                <form class="bg-trasparent" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link class="bg-transparent" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                </x-slot> -->
            </x-dropdown>
        </div>
    </div>

</nav>

<div class="col-sm-12 align-items-center orange-span-style">
    <p class="orange-span-full"></p>
</div>
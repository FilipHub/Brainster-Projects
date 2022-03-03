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
    <div class="login-background vh-100">
        <div class="py-5">
            <div class="row py-5 ">

                <div class="col-7 offset-1 py-5 pl-5-5 my-5">
                    <h1 class="text-black font-weight-bold d-block py-4 text-uppercase">brainster<span class="text-secondary text-uppercase">preneurs</span></h1>
                    <h2 class="text-black">Propel your ideas to life!</h2>

                </div>

                <div class="col-4 py-5 mt-5">

                    <x-slot name="logo">
                        <a href="/">

                            <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                        </a>
                    </x-slot>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="row mt-5">
                        <form class="" method="POST" action="{{ route('login') }}">
                            <div class="col-12 mt-5 pt-5 ">
                                <form class="">
                                    <h2 class="text-black font-weight-bold">Login</h2>
                                    <div class="form-group">
                                        @csrf

                                        <!-- Email Address -->
                                        <div>
                                            <x-input id="email" class=" py-1 input-border-style" type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">

                                            <x-input id="password" class=" py-1  input-border-style" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                                        </div>

                                        <!-- Remember Me -->




                                        <x-button class="login-btn text-decoration-none">
                                            {{ __('Log in') }}
                                        </x-button>
                                    </div>
                            </div>
                        </form>
                        <div>
                            <span class="text-black fontSize">Don't have an account, register<a href="register" class="text-black text-decoration-underline">
                                    here!
                                </a></span>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    </div>
</x-guest-layout>
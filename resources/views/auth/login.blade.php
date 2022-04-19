<x-guest-layout>
    
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

        <div class="flex max-w-sm mx-auto mt-10 overflow-hidden bg-white rounded-lg shadow-lg -gray-800 lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')"></div>
        
        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
            <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">Brand</h2>

            <p class="text-xl text-center text-gray-600 -200">Welcome back!</p>

            <a href="#" class="flex items-center justify-center mt-4 text-gray-600 transition-colors duration-200 transform border rounded-lg order-gray-700 -200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <div class="px-4 py-2">
                    <svg class="w-6 h-6" viewBox="0 0 40 40">
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107"/>
                        <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00"/>
                        <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50"/>
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2"/>
                    </svg>
                </div>

                <span class="w-5/6 px-4 py-3 font-bold text-center">Sign in with Google</span>
            </a>

            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b order-gray-600 lg:w-1/4"></span>

                <a href="#" class="text-xs text-center text-gray-500 uppercase -400 hover:underline">or login with email</a>

                <span class="w-1/5 border-b order-gray-400 lg:w-1/4"></span>
            </div>

            <div class="mt-4">
                <x-label for="email" class='block mb-2 text-sm font-medium text-gray-600 -200' :value="__('Email')" />

                <x-input id="email" class=" mt-1  block w-full px-4 py-2 text-gray-700 bg-white border rounded-md" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                      <x-label for="password" class="block mb-2 text-sm font-medium text-gray-600 -200"  :value="__('Password')" />
                   
                       @if (Route::has('password.request'))
                    <a class="text-xs text-gray-500 -300 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                   
                </div>

                 <x-input id="password" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md -gray-800 -300 order-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="mt-8">
                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                    Login
                </button>
               
            </div>
            
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b order-gray-600 md:w-1/4"></span>

                <a href="/register" class="text-xs text-gray-500 uppercase -400 hover:underline">or sign up</a>
                
                <span class="w-1/5 border-b order-gray-600 md:w-1/4"></span>
            </div>
        </div>
    </div>
     <span class="w-1/5 border-b order-gray-600 md:w-1/4"></span>
        </form>
   
</x-guest-layout>


    
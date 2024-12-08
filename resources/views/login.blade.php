@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-1/3  max-w-md p-8 space-y-6 bg-white shadow-lg rounded-lg container">
        <h2 class="text-3xl font-semibold text-center text-gray-800">Login</h2>
        @if(session()->has('success'))
        <div id="flash-message" class="py-2 ring ring-green-100 flex justify-center rounded-sm items-center bg-green-400 opacity-80 w-full h-full">
            <p class="text-lg">{{ session('success') }}</p>
        </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required class="input input-bordered w-full mt-1" placeholder="you@example.com">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="input input-bordered  w-full mt-1" placeholder="********">
                </div>

                <!-- Remember me -->
                {{-- <div class="flex items-center justify-between flex-nowrap">
                    <label for="remember" class="inline-flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="checkbox checkbox-success">
                        <span class="ml-2 text-sm text-gray-600"> Remember Me</span>
                    </label>
                </br>
                <a href="#" class="text-sm  text-blue-500 hover:text-blue-800">Forgot Password?</a>
                </div> --}}

                <!-- Submit -->
                <div>
                    <button type="submit" class=" my-2 btn bg-green-400 w-full">Login</button>
                </div>
            </div>
        </form>
        <p class="text-sm text-center text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-800">Register here</a>
        </p>
        <div class="flex justify-center">
            <a href="{{ route('home') }}" class="font-thin px-3 py-2 text-gray-800 bg-slate-100 rounded-xl" >Back to Home</a>

        </div>
    </div>
</div>
@endsection

@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-800">Create an Account</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" class="input input-bordered w-full mt-1
                            @error('name')
                                border-red-500 ring-red-500 focus:input-error focus:ring-red-500
                            @enderror"
                    placeholder="Your full name" required value="{{ old('name') }}" >
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="input input-bordered w-full mt-1
                            @error('email')
                                border-red-500 ring-red-500 focus:input-error focus:ring-red-500
                            @enderror"
                    placeholder="Your email" required value="{{ old('email') }}" >
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="input input-bordered w-full mt-1
                            @error('password')
                                border-red-500 ring-red-500 focus:input-error focus:ring-red-500
                            @enderror"
                    placeholder="********" required >
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input input-bordered w-full mt-1
                            @error('password')
                                border-red-500 ring-red-500 focus:input-error focus:ring-red-500
                            @enderror"
                    placeholder="********" requiered >
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- user baru harus punya loket sendiri --}}
                {{-- input untuk nama loket --}}
                <div>
                    <label for="nama_loket" class="block text-sm font-medium text-gray-700">Nama Loket</label>
                    <input type="text" id="nama_loket" name="nama_loket"  class="input input-bordered w-full mt-1
                            @error('nama_loket')
                                border-red-500 ring-red-500 focus:input-error focus:ring-red-500
                            @enderror"
                    placeholder="Nama Loket" required value="{{ old('nama_loket') }}" >
                    @error('nama_loket')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                {{-- deskripisi atau nama instansi --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Nama Instansi</label>
                    <input type="text" id="deskripsi" name="deskripsi" class="input input-bordered w-full mt-1
                            @error('deskripsi')
                                border-red-500 ring-red-500 focus:input-error focus:ring-red-500
                            @enderror"
                    placeholder="Nama Instansi / Deskripsi" required value="{{ old('deskripsi') }}" >
                    @error('deskripsi')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit" class="btn btn-primary w-full">Register</button>
                </div>
            </div>
        </form>

        <p class="text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Login here</a>
        </p>
    </div>
</div>
@endsection

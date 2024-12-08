@extends('layouts.app')

@section('content')
<div class="container mx-auto  ">
    <div class=" flex text-center w-full h-[80vh] flex-col justify-center ">
        <h1 class="mt-6 text-4xl font-bold">Selamat Datang di Aplikasi Loket v{{ $versiAplikasi }}</h1>
        <p class="text-lg mt-4">{{ $sambutan }}</p>
    </div>
</div>

@endsection

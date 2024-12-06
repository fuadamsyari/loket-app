@extends('layouts.app')

@section('content')
<div class="container mx-auto  ">
    <a href="{{ route('home') }}" class="font-thin  px-3 py-2 text-green-600 bg-slate-100 rounded-xl" >Home</a>
    <div class=" flex text-center  bg-slate-100 rounded-2xl  h-[90vh] flex-col justify-center p-8 mt-3">
        <div class="notif relative mx-auto w-1/2 h-20 flex items-center mb-3">
            @if(session('message'))

            <div id="flash-message" class="ring ring-green-100 flex justify-center rounded-2xl items-center bg-green-400 opacity-80 w-full h-full">
               <p class="text-lg">{{ session('message') }}</p>
            </div>
            @endif
        </div>

        <div class="flex flex-wrap justify-center">
        @foreach ($lokets as $loket)
            <div class="w-1/3">
                <div class="mx-auto card bg-base-100 w-96 shadow-xl h-[29rem]">
                    <figure class="px-10 pt-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-40 fill-green-200">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                        </svg>
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">{{ $loket->nama_loket }}</h2>
                      <p>{{ $loket->deskripsi }}</p>
                      <div class="card-actions">
                        <form action="{{ route('loket.pilih') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn bg-green-400" name="loket" value="{{ $loket->id }}">Cetak Antrean</button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection

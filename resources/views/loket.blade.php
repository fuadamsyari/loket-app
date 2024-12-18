@extends('layouts.app',['active' => 'loket'])

@section('content')
<div class="container mx-auto  ">
    <a href="{{ route('home') }}" class="   px-3 py-2 text-grey-500 bg-slate-200 rounded-xl" >Home</a><span> / {{ $title }} </span>
    <div class="notif  mx-auto w-1/2 h-16 flex items-center mb-3">
        @if(session('message'))
        <div id="flash-message" class=" mx-auto ring ring-green-100 flex justify-center rounded-sm items-center bg-green-400 opacity-80 w-1/2 h-1/2">
           <p class="text-lg">{{ session('message') }}</p>
        </div>
        @endif
    </div>
    {{-- content kartu cetak antrean --}}
    <div class="pt-3 pb-4 pl-3 bg-slate-200 h-[75vh] rounded-2xl overflow-hidden ">
        <div id="scroll-kontent" class="text-center h-full  flex-col justify-center  overflow-y-scroll">
            <div class=" flex flex-wrap">
                @foreach ($lokets as $loket)
                    <div class="w-1/3  mb-4 ">
                        <div class="mx-auto my-3 min-h-full  card bg-slate-50 w-80 shadow-xl">
                            <figure class="px-10 pt-10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-40 fill-green-200">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                                </svg>
                            </figure>
                            <div class="card-body items-center text-center">
                            <h2 class="card-title">{{ $loket->nama_loket }}</h2>
                            <p>{{ $loket->deskripsi }}</p>
                            <div class="card-actions mt-2">
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
</div>


@endsection

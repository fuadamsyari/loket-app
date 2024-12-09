@extends('layouts.app')

@section('content')
<div class="mx-auto container flex p-3 overflow-y-auto bg-slate-100 h-[90vh] rounded-2xl ">
    <div class=" w-1/2   flex flex-col flex-nowrap  text-center ">
        <div class="loket-details w-1/3 text-left mb-10">
            <p><strong>Admin:</strong> {{ $user->name}}</p>
            <p><strong>Email:</strong> {{ $user->email}}</p>
            <br>
            <p><strong>Kode Loket:</strong> {{ $loket->kode_loket }}</p>
            <p><strong>Nama Loket:</strong> {{ $loket->nama_loket }}</p>
            <p><strong>Deskripsi:</strong> {{ $loket->deskripsi }}</p>
            <br>
        </div>
        <div class="bg-slate-200 mt-10 mx-auto p-5 rounded-3xl justify-self-center">
            <h1 class="font-bold text-2xl" >Navigasi Antrean</h1>
            <div class="navigasi mt-16">
                <form action="{{ route('antrean/pref') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="btn w-40 my-4 bg-red-400">Pref</button>
                </form>
                <form action="{{ route('antrean/next') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="btn w-40 my-4 bg-yellow-400">Next</button>
                </form>
            </div>
        </div>
    </div>
    <div class=" w-1/2 bg-yellow-30 flex-wrap pt-3 text-center">
        <h1 class="font-bold text-2xl mx-auto" >Daftar Antrean</h1>
        <div class="table flex">
            <p class="bg-yellow-400 text-center my-2 text-white">Diproses</p>
            <div class="overflow-x-auto">
                <table class="table table-xs table-pin-rows table-pin-cols">
                <thead>
                        <td>Nomor Antrean</td>
                        <td>Status</td>
                        <td>Waktu</td>

                </thead>
                <tbody>
                    @foreach ($antreans->get('diproses', collect()) as $antrean)
                    <tr>
                        <td>{{ $antrean->nomor_antrean }}</td>
                        <td>{{ $antrean->status }}</td>
                        <td>{{ $antrean->waktu }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <p class="bg-red-400 text-center my-2 text-white">Menunggu</p>
            <div class="overflow-x-auto overflow-scroll h-80 ">
                <table class="table table-xs table-pin-rows table-pin-cols">
                    <thead>
                        <td>Nomor Antrean</td>
                        <td>Status</td>
                        <td>Waktu</td>
                </thead>
                <tbody>
                    @if($antreans->has('menunggu'))
                        @foreach ($antreans->get('menunggu') as $antrean)
                        <tr>
                            <td>{{ $antrean->nomor_antrean }}</td>
                            <td>{{ $antrean->status }}</td>
                            <td>{{ $antrean->waktu }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
            <p class="bg-green-400 text-center my-2 text-white">Selesai</p>
            <div class="overflow-x-auto overflow-scroll h-80 ">
                <table class="table table-xs table-pin-rows table-pin-cols">
                    <thead>
                        <td>Nomor Antrean</td>
                        <td>Status</td>
                        <td>Waktu</td>

                </thead>
                <tbody>
                    @if($antreans->has('selesai'))
                        @foreach ($antreans->get('selesai') as $antrean)
                        <tr>
                            <td>{{ $antrean->nomor_antrean }}</td>
                            <td>{{ $antrean->status }}</td>
                            <td>{{ $antrean->waktu }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

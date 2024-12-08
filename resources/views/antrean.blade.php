@extends('layouts.app')

@section('content')
<div class="mx-auto container flex p-3 overflow-y-auto bg-slate-100 h-[90vh] rounded-2xl ">
    <div class=" w-1/2   flex flex-col flex-nowrap pt-32  text-center ">
        <h1 class="font-bold text-2xl" >Navigasi Antrean</h1>
        <div class="navigasi mt-16">
            <a href="" class="btn w-40 my-4 bg-red-400">Pref</a>
            <a href="" class="btn w-40 my-4 bg-yellow-400 ">Next</a>
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

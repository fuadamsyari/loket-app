@extends('layouts.app')

@section('content')
<div class="container mx-auto  ">
    <div class=" flex text-center bg-slate-50 w-full h-[90vh] flex-col justify-center p-8">
        <div class="flex flex-wrap justify-center">
            <div class="w-1/3">
                <div class="mx-auto card bg-base-100 w-96 shadow-xl h-[29rem]">
                    <figure class="px-10 pt-10">
                      <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes"
                        class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">DJP</h2>
                      <p>Kantor Pelayanan Direktorat Jendral Pajak Mall Pelayanan Publik</p>
                      <div class="card-actions">
                        <form action="{{ route('loket.pilih') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" name="loket" value="loket1">Pilih Loket 1</button>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="w-1/3">
                <div class="mx-auto card bg-base-100 w-96 shadow-xl h-[29rem]">
                    <figure class="px-10 pt-10">
                      <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes"
                        class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">Samsat</h2>
                      <p>Kantor Pelayanan Samasat Mall Pelayanan Publik</p>
                      <form action="{{ route('loket.pilih') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary" name="loket" value="loket2">Pilih Loket 2</button>
                    </form>
                    </div>
                  </div>
            </div>
            <div class="w-1/3">
                <div class="mx-auto card bg-base-100 w-96 shadow-xl h-[29rem]">
                    <figure class="px-10 pt-10">
                      <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes"
                        class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">BPJS</h2>
                      <p>Kantor Pelayanan BPJS Mall Palayanan Publik</p>
                      <form action="{{ route('loket.pilih') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary" name="loket" value="loket3">Pilih Loket 3</button>
                    </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>


@endsection

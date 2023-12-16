@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
@include('section.hero')

<section>
    <div class="container py-5 px-5 position-relative">
        <div class="position-absolute top-0 start-0 ms-5" style="z-index:0; color:#f0f0f0">
            <span class="iconify" data-width="170" data-icon="material-symbols:forklift"></span>
        </div>
        <div class="position-relative" style="z-index: 2">
            <h1 class="fs-2 mb-1">{{setting('typography.sewa_title')}}</h1>
            <p>{{setting('typography.sewa_desc')}}</p>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('sewa.send')}}" method="POST" class="mx-auto p-4 border rounded-2 my-5" style="max-width: 40em">
                @csrf
                @method('POST')
                <h5 class="mb-3">Butuh Sewa Forklift atau alat berat lain-nya <br/>
                    Buruan hubungi kami dan dapatkan harga menarik
                </h5>
                <div class="row mb-3 align-items-center">
                    <label for="name" class="mb-1 col-12 col-md-3">Nama Lengkap</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="company" class="mb-1 col-12 col-md-3">Nama Perusahaan</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="company" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="email" class="mb-1 col-12 col-md-3">Email</label>
                    <div class="col-12 col-md-9">
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="no" class="mb-1 col-12 col-md-3">No Hp / Whatsapp</label>
                    <div class="col-12 col-md-9">
                        <input type="number" name="no" class="form-control" required>
                    </div>
                </div>
                <h5 class="mb-3">Detail Alat yang di butuhkan</h5>
                <div class="row mb-3 align-items-center">
                    <label for="needs" class="mb-1 col-12 col-md-3">Alat yang diperlukan</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="needs" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 align-items-start">
                    <label for="spesification" class="mb-1 col-12 col-md-3">Spesifikasi alat</label>
                    <div class="col-12 col-md-9">
                        <textarea name="spesification" rows="10" cols="10" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="duration" class="mb-1 col-12 col-md-3">Lama Sewa / Rental</label>
                    <div class="col-12 col-md-9 d-flex align-items-center gap-3">
                        <input type="date" class="form-control" name="duration-start" id="duration" required>
                        <span>s/d</span>
                        <input type="date" class="form-control" name="duration-end" id="duration" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger rounded-0 bg-liftco text-white p-2 px-3">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</section>

@include('section.brand')
@include('section.news')

@endsection

@section('beforebody')
@endsection
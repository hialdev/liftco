@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
@include('section.hero')

<section class="bg-light">
    <div class="container p-0">
        <div class="row align-items-stretch">
            <div class="col-12 col-lg-4 py-5 px-5">
                <h2 class="mb-3">Distributor Dan Agen Forklift Terpercaya</h2>
                <p>PT. Liftco Indo Perkasa adalah Agen
                    dan Distributor ScissorLift, Reach
                    Truck, dan stacker, perusahaan yang
                    bergerak di bidang Material Handling
                    dan Maintenance Building
                    Equipment sebagai distributor forklift,
                    boomlift, wheel loader, stacker , etc
                    yang berlokasi di Jabodetabek,
                    Semarang dan Surabaya.</p>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row h-100 align-items-stretch">
                    <div class="col-6 p-5 pe-0">
                        <div class="row align-items-center mb-4 position-relative" style="z-index:1;margin-right: -8em">
                            <div class="col-8">
                                <div class="fs-5 text-end fw-semibold ms-auto" style="max-width: 10em;">Services Terbaik</div>
                            </div>
                            <div class="col-4">
                                <div class="">
                                    <img src="/src/image/quality-service.png" alt="Quality Service" class="block bg-white p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height:100px; object-fit:contain">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-4 position-relative" style="z-index:1;margin-right: -8em">
                            <div class="col-8">
                                <div class="fs-5 text-end fw-semibold ms-auto" style="max-width: 10em;">Support Dapat Diandalkan</div>
                            </div>
                            <div class="col-4">
                                <div class="">
                                    <img src="/src/image/availability.png" alt="Support 24 Hour" class="block bg-white p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height:100px; object-fit:contain">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-4 position-relative" style="z-index:1;margin-right: -8em">
                            <div class="col-8">
                                <div class="fs-5 text-end fw-semibold ms-auto" style="max-width: 10em;">Harga Sewa Ramah di Kantong</div>
                            </div>
                            <div class="col-4">
                                <div class="">
                                    <img src="/src/image/best-price.png" alt="Best Price" class="block bg-white p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height:100px; object-fit:contain">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <img src="/src/image/lift.jpg" alt="Lift Image" class="block h-100 w-100" style="object-fit: cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('section.news',['news'=>$news])

@include('section.brand')

<section>
    <div class="container py-5 px-5 position-relative">
        <div class="position-absolute top-0 start-0 ms-5" style="z-index:0; color:#f0f0f0">
            <span class="iconify" data-width="170" data-icon="material-symbols:forklift"></span>
        </div>
        <div class="position-relative" style="z-index: 2">
            <h2 class="mb-3">Brand brand yang mempercayakan service kami</h2>
            <p>PT. Liftco Indo Perkasa adalah Agen dan Distributor ScissorLift, Reach Truck, dan stacker, perusahaan yang bergerak di bidang Material
                Handling dan Maintenance Building Equip
            </p>
            <div class="client-carousel owl-carousel owl-theme mt-2">
                @forelse ($clients as $client)
                <div class="d-flex align-items-center justify-content-center p-3 px-5">
                    <img src="{{Voyager::image($client->image)}}" alt="Client Logo {{$client->title}}" title="{{$client->title}}" class="d-block" style="aspect-ratio:10/7;object-fit:contain;max-height: 3.7em;">
                </div>
                @empty
                <div class="p-3 text-center">No Data</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection

@section('beforebody')
@endsection
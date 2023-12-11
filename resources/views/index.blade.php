@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
@include('modals.firstload')
@include('section.hero')

<section class="bg-light">
    <div class="container p-0">
        <div class="row align-items-stretch">
            <div class="col-12 col-lg-4 py-5 px-5">
                <h2 class="mb-3">{{setting('typography.value_title')}}</h2>
                <p>{{setting('typography.value_desc')}}</p>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row h-100 align-items-stretch">
                    <div class="col-6 p-5 pe-0">
                        @forelse ($values as $value)
                        <div class="row align-items-center mb-4 position-relative" style="z-index:1;margin-right: -8em">
                            <div class="col-8">
                                <div class="fs-5 text-end fw-semibold ms-auto" style="max-width: 10em;">{{$value->title}}</div>
                            </div>
                            <div class="col-4">
                                <div class="">
                                    <img src="{{Voyager::image($value->image)}}" alt="{{$value->title}}" class="block bg-white p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height:100px; object-fit:contain">
                                </div>
                            </div>
                        </div>
                        @empty
                        <div>No Data</div>                            
                        @endforelse
                    </div>
                    <div class="col-6">
                        <img src="{{Voyager::image($getimage->get('value-image')->image)}}" alt="Lift Image" class="block h-100 w-100" style="object-fit: cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('section.news')

@include('section.brand')

<section>
    <div class="container py-5 px-5 position-relative">
        <div class="position-absolute top-0 start-0 ms-5" style="z-index:0; color:#f0f0f0">
            <span class="iconify" data-width="170" data-icon="material-symbols:forklift"></span>
        </div>
        <div class="position-relative" style="z-index: 2">
            <h2 class="mb-3">{{setting('typography.client_title')}}</h2>
            <p>{{setting('typography.client_desc')}}</p>
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
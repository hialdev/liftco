@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
@include('section.hero')

<section>
    <div class="container p-0">
        <div class="row">
            <div class="col-12 col-lg-4 order-last order-lg-first">
                <div class="p-5 h-100 bg-light">
                    @include('partials.product_sidebar')

                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="p-5">
                    <h2 class="text-5xl font-semibold text-slate-900 my-4">Forklift Diesel Small</h2>
                    <img src="{{Voyager::image($product->image)}}" alt="{{$product->title}} Image" class="d-block w-100 rounded-3 mb-3">
                    <h3>{{$product->title}}</h3>

                    <div class="content pt-3 border-top">
                        {!! $product->content !!}
                    </div>

                    <div class=" my-4 d-flex align-items-center justify-content-between">
                        <a target="_blank" href="{{$product->link_catalog}}" class="text-decoration-none btn btn-outline-danger">Download Catalog</a>
                        <a target="_blank" href="https://wa.me/{{setting('site.whatsapp')}}?text=Request+Detail+And+Price+{{$product->title}}" class="text-decoration-none btn btn-outline-danger">Request Detail and Price</a>
                    </div>
                    <div class="rounded-3 overflow-hidden">
                        <iframe class="w-100" style="aspect-ratio:16/9;object-fit:cover" src="{{$product->link_embed}}" title="{{$product->title}} YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('section.news')
@endsection

@section('beforebody')
@endsection
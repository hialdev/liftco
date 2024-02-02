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
                    <h2 class="text-5xl font-medium text-slate-900 my-4">{{$type->title}}</h2>
                    <div class="content">
                        {!! $type->content !!}
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1 class="fs-3 mb-4">All {{$type->title}} Products</h1>
                        </div>
                        @forelse ($products as $product)
                        <div class="col-6 col-lg-4 mb-3">
                            <a href="{{route('product.show',$product->slug)}}" class="text-decoration-none d-block text-center text-dark">
                                <img src="{{Voyager::image($product->image)}}" alt="{{$product->title}} Product Image" class="d-block w-100" style="aspect-ratio:1/1; object-fit:cover">
                                <h2 class="fs-6 lc lc-2 py-3 bg-light">{{$product->title}}</h2>
                            </a>
                        </div>
                        @empty
                        <div>
                            No Data
                        </div> 
                        @endforelse
                        
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
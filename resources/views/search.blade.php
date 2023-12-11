@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
<section>
    <div class="container py-5">
        <h1 class="text-capitalize">Menampilkan Pencarian</h1>
        <div class="d-flex justify-center">
            <h2 class="d-inline-block p-1 px-2 text-liftco text-center">
                "Kata Kunci Pencahariannya"
            </h2>
        </div>
        <h3>Product</h3>
        <div class="p-1 bg-danger mb-3" style="width: 2em;"></div>
        <div class="row p-5">
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
        <a href="{{route('product')}}" class="btn btn-outline-danger">Lihat Semua</a>
        <h3>News</h3>
        <div class="p-1 bg-danger mb-3" style="width: 2em;"></div>
        <div class="row mt-4">
            @forelse ($news as $new)
            <div data-aos="fade-up" data-aos-delay="10" data-aos-duration="1000" class="col-12 mb-4">
                <a href="{{route('news.show',$new->slug)}}" class="text-decoration-none text-dark d-flex align-items-center gap-4">
                    <img src="{{Voyager::image($new->image)}}" alt="Image Thumbnail {{$new->title}} News" class="block" style="aspect-ratio:1/1;object-fit:cover;width:30%;max-width:10em;">
                    <div class="">
                        <h3 class="fs-6 fs-lg-5 lc lc-2">{{$new->title}}</h3>
                        <p class="fs-6 text-secondary lc lc-2 text-justify">{{$new->meta_description}}</p>
                        <div class="text-liftco">Read More</div>
                    </div>
                </a>
            </div>
            @empty
            <div class="p-4 text-center">No Data</div>
            @endforelse
        </div>
        <a href="{{route('news')}}" class="btn btn-outline-danger">Lihat Semua</a>
    </div>
</section>

@include('section.news')

@endsection


@section('beforebody')
@endsection
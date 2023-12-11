@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
@include('section.hero')
@include('section.brand')

<section>
    <div class="container p-0">
        <div class="row">
            <div class="col-12 col-lg-4 order-last order-lg-first">
                <div class="p-5 h-100 bg-light">
                    @include('partials.product_sidebar')

                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row p-5">
                    <div class="col-12">
                        <h1 class="fs-3 mb-4">Our Products</h1>
                    </div>
                    @forelse ($products->items() as $product)
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
                    
                    @php
                        $lastPage = (int)$products->lastPage();
                        $currentPage = (int)$products->currentPage();
                        $i = $currentPage;
                    @endphp
                    @if ($lastPage != 1)
                    <div class="col-12 my-4">
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <a href="{{$products->path().'?page=1'}}" class="btn {{$currentPage == 1 ? 'btn-danger' : 'btn-outline-danger'}} p-1 px-2 rounded-0">First</a>
                            @if ($currentPage > 2)
                            @php
                                $back = $currentPage - 1;
                            @endphp
                            <a href="{{$products->path().'?page='.$back}}" class="btn {{$currentPage == 1 ? 'btn-danger' : 'btn-outline-danger'}} p-1 px-2 rounded-0"><</a>
                            @endif
                            @while ($i < $lastPage)
                                <a href="{{$products->path().'?page='.$i}}" class="btn {{$currentPage == $i ? 'btn-danger' : 'btn-outline-danger'}} p-1 px-2 rounded-0">{{$i}}</a>
                                @php
                                    $i++
                                @endphp
                            @endwhile
                            <a href="{{$products->path().'?page='.$lastPage}}" class="btn {{$currentPage == $lastPage ? 'btn-danger' : 'btn-outline-danger'}} p-1 px-2 rounded-0">Last</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('beforebody')
@endsection
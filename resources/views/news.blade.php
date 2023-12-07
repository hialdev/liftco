@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
@include('section.hero')

<section class="">
    <div class="container py-5 px-5 position-relative">
        <div class="position-absolute top-0 start-0 ms-5" style="z-index:0; color:#ececec">
            <span class="iconify" data-width="170" data-icon="material-symbols:forklift"></span>
        </div>
        <div class="position-relative">
            <h1 class="fs-2 mb-3">Update info dan berita terkini</h1>
            <p>PT. Liftco Indo Perkasa adalah Agen dan Distributor ScissorLift, Reach Truck, dan stacker, perusahaan yang bergerak di bidang Material
                Handling dan Maintenance Building Equip
            </p>
            <div class="row mt-4">
                @forelse ($news as $new)
                <div data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000" class="col-12 mb-4">
                    <a href="{{route('news.show',$new->slug)}}" class="text-decoration-none text-dark d-flex align-items-center gap-4">
                        <img src="{{Voyager::image($new->image)}}" alt="Image Thumbnail {{$new->title}} News" class="block" style="aspect-ratio:1/1;object-fit:cover;width:10em">
                        <div class="">
                            <h3 class="fs-5 lc lc-1">{{$new->title}}</h3>
                            <p class="fs-6 text-secondary lc lc-3 text-justify">{{$new->meta_description}}</p>
                            <div class="text-liftco">Read More</div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="p-4 text-center">No Data</div>
                @endforelse
            </div>
            <div class="d-flex align-items-center justify-content-center gap-2">
                <a href="" class="btn btn-danger p-1 px-2 rounded-0 bg-liftco text-white">First</a>
                <a href="" class="btn btn-outline-danger p-1 px-2 rounded-0">2</a>
                <a href="" class="btn btn-outline-danger p-1 px-2 rounded-0">3</a>
                <a href="" class="btn btn-outline-danger p-1 px-2 rounded-0">Last</a>
            </div>
        </div>
    </div>
</section>

@include('section.brand')
@endsection

@section('beforebody')
@endsection
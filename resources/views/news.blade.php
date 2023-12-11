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
            <h1 class="fs-2 mb-3">{{setting('typography.news_title')}}</h1>
            <p>{{setting('typography.news_desc')}}</p>
            <form action="{{route('news')}}" method="GET" class="w-100 mx-auto my-5" style="max-width:40em">
                <div class="d-flex align-items-center gap-2 rounded-3">
                    <input name="search" type="text" class="form-control w-full d-block" placeholder="Cari berita" value="{{$search ? $search : '' }}">
                    <button type="submit" class="btn btn-danger bg-liftco text-white "><span class="iconify" data-icon="akar-icons:search"></span></button>
                </div>
            </form>
            @if ($category)
                <h4>News for Category : </h4>
                <div class="d-inline-block p-1 px-2 bg-liftco text-white">{{$category}}</div>
            @endif
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
            @php
                $lastPage = (int)$news->lastPage();
                $currentPage = (int)$news->currentPage();
                $i = $currentPage;
            @endphp
            @if ($lastPage != 1)
            <div class="col-12 my-4">
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <a href="{{$news->path().'?page=1'}}" class="btn {{$currentPage == 1 ? 'btn-danger' : 'btn-outline-danger'}} p-1 px-2 rounded-0">First</a>
                    @if ($currentPage > 2)
                    @php
                        $back = $currentPage - 1;
                    @endphp
                    <a href="{{$news->path().'?page='.$back}}" class="btn {{$currentPage == 1 ? 'btn-danger' : 'btn-outline-danger'}} p-1 px-2 rounded-0"><</a>
                    @endif
                    @while ($i < $lastPage)
                        <a href="{{$news->path().'?page='.$i}}" class="btn {{$currentPage == $i ? 'btn-danger' : 'btn-outline-danger'}} p-1 px-2 rounded-0">{{$i}}</a>
                        @php
                            $i++
                        @endphp
                    @endwhile
                    <a href="{{$news->path().'?page='.$lastPage}}" class="btn {{$currentPage == $lastPage ? 'btn-danger' : 'btn-outline-danger'}} p-1 px-2 rounded-0">Last</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@include('section.brand')
@endsection

@section('beforebody')
@endsection
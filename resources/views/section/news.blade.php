<section class="" style="background-color: #e7e7e7">
    <div class="container py-5 px-5 position-relative">
        <div class="position-absolute top-0 start-0 ms-5" style="z-index:0; color:#f7f7f7">
            <span class="iconify" data-width="170" data-icon="material-symbols:forklift"></span>
        </div>
        <div class="position-relative">
            <h2 class="mb-3">{{setting('typography.news_title')}}</h2>
            <p>{{setting('typography.news_desc')}}</p>
            <div class="row mt-4">
                @forelse ($newsglobal as $new)
                <div data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000" class="col-6 col-lg-4 col-xl-3">
                    <a href="{{route('news.show',$new->slug)}}" class="d-block mb-4 text-decoration-none text-dark">
                        <img src="{{Voyager::image($new->image)}}" alt="Image Thumbnail {{$new->title}} News" class="w-100 mb-2" style="aspect-ratio:1/1; object-fit:cover;">
                        <h6 class="lc lc-3 mb-2">{{$new->title}}</h6>
                        <p class="fs-6 text-secondary lc lc-3 text-justify">{{$new->meta_description}}</p>
                        <div class="text-liftco">Read More</div>
                    </a>
                </div>
                @empty
                <div class="p-4 text-center">No Data</div>
                @endforelse
                
            </div>
        </div>
    </div>
</section>
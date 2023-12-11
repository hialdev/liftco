<section>
    <div class="container py-5 px-5 position-relative">
        <div class="position-absolute top-0 start-0 ms-5" style="z-index:0; color:#f0f0f0">
            <span class="iconify" data-width="170" data-icon="material-symbols:forklift"></span>
        </div>
        <div class="position-relative" style="z-index: 2">
            <h2 class="mb-3">{{setting('typography.brand_title')}}</h2>
            <p>{{setting('typography.brand_desc')}}</p>
            <div class="brand-carousel owl-carousel owl-theme mt-2">
                @forelse ($brandsglobal as $brand)
                <a href="{{route('product.brand',$brand->slug)}}" class="d-flex align-items-center justify-content-center p-3 px-5">
                    <img src="{{Voyager::image($brand->image)}}" alt="{{$brand->title}} Logo " title="{{$brand->title}} Brand" class="d-block" style="aspect-ratio:10/7;object-fit:contain;max-height: 3.7em;">
                </a>
                @empty
                <div>No Data</div>
                @endforelse
            </div>
        </div>
    </div>
</section>
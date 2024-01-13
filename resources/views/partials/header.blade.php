<header>
    <div class="shadow-lg py-2 md:py-3 menu-box px-3">
        <div class="container">
            <div class="d-flex py-2 py-md-1 align-items-center justify-content-between gap-1 position-relative">
                <a href="{{route('home')}}" class="d-block position-absolute top-0 bg-liftco p-3"><img src="{{ setting('site.logo') !== '' ? Voyager::image(setting('site.logo')) : '/src/image/logowhite.jpg'}}" alt="{{setting('site.title').' Logo'}}" style="width:auto;height:{{setting('site.logo_size')}}px;"></a>
                <nav class="d-flex align-items-center gap-5 menu ms-auto">
                    
                    <button class="btn p-0 d-flex align-items-center d-lg-none" id="menu-close">
                        <span class="iconify fs-2" data-icon="pajamas:long-arrow"></span>
                    </button>
                    <div>
                        <a href="#" id="menu-product-btn" style="font-size:14px !important;" class="fs-6 text-decoration-none d-flex align-items-center gap-2 {{ request()->is('product*') ? 'active' : '' }}">Product <span class="iconify color-inherit" data-icon="icon-park-outline:down"></span>
                        </a>
                        <div style="width: 100%;display: none;" class="dropdown" id="menu-product-dropdown">
                            <ul class="list-unstyled bg-light p-3 rounded-4 row">
                                <li class="col-12 mb-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="fw-semibold fs-5 text-dark">Brand Product</div>
                                    </div>
                                </li>
                                @forelse ($brandsglobal as $brand)
                                <li class="col-12 col-lg-3">
                                    <a href="{{route('product.brand',$brand->title)}}" class="d-flex gap-3 align-items-center text-decoration-none text-dark">
                                        <div class="rounded-4 bg-white d-flex align-items-center justify-content-center p-3 p-lg-4 mb-2" style="height:6em;width:6em">
                                            <img src="{{Voyager::image($brand->image)}}" alt="{{$brand->title}} Logo" class="d-block rounded-2" style="aspect-ratio:1/1;max-width: 4em;object-fit:contain">
                                        </div>
                                        <h6>{{$brand->title}}</h6>
                                    </a>
                                </li>
                                @empty
                                <div>No Data</div>
                                @endforelse
                                
                                <li class="col-12 my-3">
                                    <a href="{{route('product')}}" class="d-inline-flex p-2 px-3 align-items-center gap-3 text-decoration-none bg-liftco text-white rounded-5 ">See Products <span class="iconify" data-icon="pajamas:long-arrow"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{route('sewa')}}" style="font-size:14px !important;" class="{{ request()->is('sewa-rental') ? 'active' : '' }} fs-6 text-decoration-none">Sewa / Rental</a>
                    <a href="{{route('news')}}" style="font-size:14px !important;" class="{{ request()->is('news*') ? 'active' : '' }} fs-6 text-decoration-none">News</a>
                    <a href="{{route('contact')}}" style="font-size:14px !important;" class="{{ request()->is('contact') ? 'active' : '' }} fs-6 text-decoration-none">Contact us</a>
                    <div class="order-last d-flex align-items-center border border-2 rounded-4 overflow-hidden">
                        <input type="text" class="form-control border-0 w-100 outline-0 rounded-0" name="q" placeholder="Cari disini..">
                        <button class="btn d-flex align-items-center justify-content-center bg-danger text-white rounded-0 h-100" style="padding: 0.55em;">
                            <span class="iconify" data-icon="iconamoon:search"></span>
                        </button>
                    </div>
                </nav>
                <button class="btn p-0 d-flex align-items-center d-lg-none ms-auto" id="menu-open">
                    <span class="iconify fs-2" data-icon="fluent:text-align-right-16-filled"></span>
                </button>
            </div>
        </div>
    </div>
</header>
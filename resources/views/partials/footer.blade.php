<footer class="bg-white text-dark">
    <div class="container py-5 px-5">
        <div class="row justify-content-around">
            <div data-aos="fade-down" data-aos-delay="0" data-aos-duration="1000" class="mb-3 col-12 col-lg-6 pe-4">
                <img src="{{Voyager::image(setting('footer.logo'))}}" alt="Footer Logo brand" class="d-block mb-4" style="max-width:17em;">
                {!! setting('footer.footer_desc') !!}
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12 text-end">
                        <span class="iconify text-liftco" data-width="50" data-icon="gg:phone"></span>
                        <h5 class="text-liftco">Anda Ada Pertanyaan?</h5>
                        <div class="fs-3 fw-semibold">(021) 29672215 & (021) 29672219</div>
                        <div class="fs-3 fw-semibold mb-2">{{setting('site.whatsapp')}}</div>
                        <p class="mb-2">Senin- Jumat: 9:00-17:00</p>
                        <p class="mb-3 ms-auto" style="max-width: 20em">PT. Liftco Indo Perkasa
                            Jl. KH. Hasyim Ashari Kav. DPR C 260-261
                            Neroktog, Pinang, Tangerang 15145</p>
                    </div>
                    <div data-aos="fade-down" data-aos-delay="150" data-aos-duration="1000" class="mb-3 col-6">
                        <h5 class="mb-3">Quick Links</h5>
                        <ul class="list-unstyled d-flex flex-column gap-3">
                            <li><a href="{{route('product')}}" class="text-decoration-none text-dark">Product</a></li>
                            <li><a href="{{route('sewa')}}" class="text-decoration-none text-dark">Sewa / Rental</a></li>
                            <li><a href="{{route('news')}}" class="text-decoration-none text-dark">News</a></li>
                            <li><a href="{{route('contact')}}" class="text-decoration-none text-dark">Contact Us & Branch</a></li>
                            <li><a href="{{route('tos')}}" class="text-decoration-none text-dark">Term Of Service</a></li>
                            <li><a href="{{route('privacy')}}" class="text-decoration-none text-dark">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000" class="mb-3 col-6 ms-auto text-end">
                        <h5 class="mb-3">Products</h5>
                        <ul class="list-unstyled d-flex flex-column gap-3">
                            @foreach ($products as $product)
                            <li><a href="{{route('product.show',$product->slug)}}" class="text-decoration-none text-dark">{{$product->slug}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-12 pt-5 border-top">
                &copy; {{setting('footer.credit')}}
            </div>
        </div>
    </div>
</footer>
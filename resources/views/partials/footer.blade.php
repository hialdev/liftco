<footer class="bg-white text-dark">
    <div class="container py-5 px-5">
        <div class="row justify-content-around">
            <div data-aos="fade-down" data-aos-delay="0" data-aos-duration="1000" class="mb-3 col-12 col-lg-6 pe-4">
                <img src="/src/image/logonormal.jpg" alt="Footer Logo brand" class="d-block mb-4" style="max-width:17em;">
                <p>
                    
                    PT. Liftco Indo Perkasa adalah Perusahaan yang bergerak di
                    bidang Material Handling dan Maintenance Building
                    Equipment yang berlokasi di Tangerang dan Surabaya.
                    Didirikan berdasarkan Akta Notaris Siti Nur Isminingsih, S.H
                    No. 182 Tanggal 10 February 2011. <br />
                </p>
                <p>
                    Selain Sales Produk. Kami juga melayani : <br/>
                    Rental<br/>
                    Service<br/>
                    Spare Part dan Modifikasi<br/>
                    Jasa Service Semua Merk Equipment Material Handling
                </p>
                <p>
                    PT. Liftco Indo Perkasa adalah agen resmi Anhui Heli
                    Industrial Vehicle Imp. & Exp. Co., Ltd di Indonesia untuk
                    Sales, Service dan Sparepart dengan produk Forklift Diesel,
                    Forklift Electric, Forklift Gasoline, Reach Truck, Reach
                    Stacker, Wheel Loader, Stracker Electric, Handlift, Pallet
                    Mover, dan Sparepart original.
                </p>
                <p>
                    PT. Liftco Indo Perkasa juga sebagai agen resmi Mantall
                    Heavy Industry Co.Ltd di Indonesia untuk Sales, Service dan
                    Sparepart dengan produk Aerial Work Platform, Scissorlift,
                    Boomlift, Truck Mounted dan Sparepart original.
                </p>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12 text-end">
                        <span class="iconify text-liftco" data-width="50" data-icon="gg:phone"></span>
                        <h5 class="text-liftco">Anda Ada Pertanyaan?</h5>
                        <div class="fs-3 fw-semibold">(021) 29672215 & (021) 29672219</div>
                        <div class="fs-3 fw-semibold mb-2">081234567890</div>
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
                Copyright © 2020 - 2024 PT Liftco Indo Perkasa. All Rights Reserved
                {{-- &copy; {{setting('footer.credit')}} --}}
            </div>
        </div>
    </div>
</footer>
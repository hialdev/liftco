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
                    <form action="" class="w-100 mx-auto" style="max-width:40em">
                        <div class="d-flex align-items-center gap-2 rounded-3">
                            <input type="text" class="form-control w-full d-block" placeholder="Cari product">
                            <button type="submit" class="btn btn-danger bg-liftco text-white "><span class="iconify" data-icon="akar-icons:search"></span></button>
                        </div>
                    </form>
                    @include('partials.product_sidebar')

                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="p-5">
                    <img src="/src/image/brand.jpg" alt="Heli Logo" class="d-block mb-4" style="max-width:13em; object-fit:contain">
                    <div class="content">
                        <img src="/src/image/news2.jpg" alt="Heli JPG">
                        <p>
                            HELI is one of the World’s largest forklift manufacturers, and was ranked 8th in the
                            world by “Modern Material Handling Report for 2011.” Founded in 1958, Anhui
                            HELI has since grown into a Shanghai Stock Exchange listed company with a
                            network of overseas agencies across 75 countries, where developed markets in
                            Europe and America account for 60% of its export destinations.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p>
                            Recently HELI has launched a new heavy-duty electric forklift into the market with
                            a loading capacity of 10 tons. This new battery powered counterbalanced forklift
                            truck ensures that companies with loading needs of up to 10 tons get an
                            eco-friendly and noiseless solution with features that significantly reduce the
                            running costs by improving safety ...
                        </p>
                        <p>
                            As the biggest manufacturer of forklift trucks in China, HELI, introduced a new line
                            of materials handling products into the market formally at the end of 2015. We are
                            widely recognised for our innovation and our consistent ability to improve
                            warehouse operations.
                        </p>
                        <p>
                            On the 8th of February 2018, Anhui Heli Co. Ltd (HELI) and ZF Friedrichshafen AG
                            (ZF) established a joint-venture company at Hefei, China. The company intends to
                            create a global leading R&D, manufacture, assembling and sales base of
                            industrial vehic
                        </p>
                        <img src="/src/image/lift.jpg" alt="Image Lift">
                        
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
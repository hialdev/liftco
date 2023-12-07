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
                    <h2 class="text-5xl font-semibold text-slate-900 my-4">Forklift Diesel Small</h2>
                    <img src="/src/image/lift1.jpg" alt="Forklift Image" class="d-block w-100 rounded-3 mb-3">
                    <h3>Isuzu C240 Engine</h3>

                    <div class="content pt-3 border-top">
                        <p>
                            New H3 series is the key product which HELI blockbuster launches. Based on the
                            high technology, mass manufacturing capability and experienced sales and
                            services of HELI, new H series becomes a milestone of HELI’s products which fully
                            consider the needs of market and customers.
                        </p>
                        <p>
                            Improved performance, superior quality<br/>
                            Vibration 20% reduced<br/>
                            Noise 3dB reduced<br/>
                            Workspace 45% increased<br/>
                            Operator’s view 20% improved<br/>
                            Working e"ciency 20% improved<br/>
                            Loading capacity increased over 5%<br/>
                            Stability 5% improved<br/>
                            Reliability 40% improved<br/>
                            Engine hood open angle increased to 80°<br/>
                        </p>
                    
                        <h3>Forklift Specifications</h3>
                        <table>
                            <tr>
                                <th>Specification</th>
                                <th>Details</th>
                            </tr>
                            <tr>
                                <td>Load Capacity</td>
                                <td>Up to 5,000 pounds</td>
                            </tr>
                            <tr>
                                <td>Maximum Lift Height</td>
                                <td>15 feet</td>
                            </tr>
                            <tr>
                                <td>Fuel Type</td>
                                <td>Electric, Gas, Diesel</td>
                            </tr>
                            <tr>
                                <td>Turning Radius</td>
                                <td>Varies based on model</td>
                            </tr>
                        </table>
                    </div>

                    <div class=" my-4 d-flex align-items-center justify-content-between">
                        <a href="#link-to-catalog" class="text-decoration-none btn btn-outline-danger">Download Catalog</a>
                        <a href="#link-to-chat-whatsapp" class="text-decoration-none btn btn-outline-danger">Request Detail and Price</a>
                    </div>
                    <div class="rounded-3 overflow-hidden">
                        <iframe class="w-100" style="aspect-ratio:16/9;object-fit:cover" src="https://www.youtube.com/embed/bcbPfX2jetk?si=TzYkeX_eR6yC35-Z" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
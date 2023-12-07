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
                    <h2 class="text-5xl font-medium text-slate-900 my-4">Forklift Diesel Small</h2>
                    <div class="content">
                        <p>
                            Material handling equipment (MHE) is mechanical equipment used for the
                            movement, storage, control, and protection of materials, goods and products
                            throughout the process of manufacturing, distribution, consumption, and
                            disposal.[1] The di!erent types of equipment can be classified into four major
                            categories:[2] transport equipment, positioning equipment, unit load formation
                            equipment, and storage equipment.
                        </p>
                        <img src="/src/image/poeple (1).jpg" alt="Image Poeple">
                        <p>
                            Transport equipment is used to move material from one location to another (e.g.,
                            between workplaces, between a loading dock and a storage area, etc.), while
                            positioning equipment is used to manipulate material at a single location.[3] The
                            major subcategories of transport equipment are conveyors, cranes, and industrial
                            trucks. Material can also be transported manually using no equipment
                        </p>
                        <img src="/src/image/poeple (2).jpg" alt="Image Poeple">
                        <p>Hand trucks (including carts and dollies), the simplest type of industrial truck,
                            cannot transport or stack pallets, is non-powered, and requires the operator to
                            walk. A pallet jack, which cannot stack a pallet, uses front wheels mounted inside
                            the end of forks that extend to the floor as the pallet is only lifted enough to clear
                            the floor for subsequent travel</p>
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
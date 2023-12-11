<form action="{{route('product')}}" method="GET" class="w-100 mx-auto" style="max-width:40em">
    <div class="d-flex align-items-center gap-2 rounded-3">
        <input type="text" class="form-control w-full d-block" placeholder="Cari product" name="search" value="{{isset($search) ? $search : ''}}">
        <button type="submit" class="btn btn-danger bg-liftco text-white "><span class="iconify" data-icon="akar-icons:search"></span></button>
    </div>
</form>
<div class="mt-4">
    @forelse ($product_categories as $prd_ctg)
    <ul class="p-0 menu-1st">
        <li class="d-flex align-items-center justify-content-between">
            <a href="{{route('product.category',$prd_ctg->slug)}}" class="d-block text-dark p-2 text-decoration-none fw-semibold">{{$prd_ctg->title}}</a>
            @if (count($prd_ctg->productModels) > 0)
            <div class="product-menu-1st cursor-pointer d-flex align-items-center p-2 justify-content-center bg-liftco text-white">
                <span class="iconify text-white" data-icon="icon-park-outline:down"></span>
            </div>
            @endif
        </li>
        @foreach ($prd_ctg->productModels as $prd_mdl)
        <ul class="menu-2nd border-start">
            <li class="d-flex align-items-center justify-content-between">
                <a href="{{route('product.model',$prd_mdl->slug)}}" class="d-block text-dark p-2 text-decoration-none fw-semibold">{{$prd_mdl->title}}</a>
                @if (count($prd_mdl->productTypes) > 0)
                <div class="product-menu-2nd cursor-pointer d-flex align-items-center p-2 justify-content-center bg-secondary text-white">
                    <span class="iconify w-[24px] h-[24px] text-white" data-icon="icon-park-outline:down"></span>
                </div>
                @endif
            </li>
            @foreach ($prd_mdl->productTypes as $prd_typ)
            <ul class="menu-3rd border-start">
                <li class="d-flex align-items-center justify-content-between">
                    <a href="{{route('product.type',$prd_typ->slug)}}" class="d-block text-dark p-2 text-decoration-none fw-semibold">{{$prd_typ->title}}</a>
                    @if (count($prd_typ->products) > 0)
                    <div class="product-menu-3rd cursor-pointer d-flex align-items-center p-2 justify-content-center" style="background-color: #e7e7e7">
                        <span class="iconify w-[24px] h-[24px] text-black" data-icon="icon-park-outline:down"></span>
                    </div>
                    @endif
                </li>
                <ul class="menu-last border-start list-unstyled px-3">
                    @foreach ($prd_typ->products as $prd)
                    <li><a href="{{route('product.show', $prd->slug)}}" class="d-block text-dark p-2 text-decoration-none d-block p-2">{{$prd->title}}</a></li>
                    @endforeach
                </ul>
            </ul>
            @endforeach
        </ul>
        @endforeach
    </ul>
    @empty
    <ul>
        <li>No Data</li>
    </ul>
    @endforelse

</div>
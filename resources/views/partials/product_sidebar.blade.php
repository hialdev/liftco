<div class="mt-4">
    <ul class="p-0 menu-1st">
        <li class="d-flex align-items-center justify-content-between">
            <a href="{{route('product.category','trial')}}" class="d-block text-dark p-2 text-decoration-none fw-semibold">Material Handling Equipment</a>
            <div class="product-menu-1st cursor-pointer d-flex align-items-center p-2 justify-content-center bg-liftco text-white">
                <span class="iconify text-white" data-icon="icon-park-outline:down"></span>
            </div>
        </li>
        <ul class="menu-2nd border-start">
            <li class="d-flex align-items-center justify-content-between">
                <a href="{{route('product.model','trial')}}" class="d-block text-dark p-2 text-decoration-none fw-semibold">IC Forklift Truck</a>
                <div class="product-menu-2nd cursor-pointer d-flex align-items-center p-2 justify-content-center bg-secondary text-white">
                    <span class="iconify w-[24px] h-[24px] text-white" data-icon="icon-park-outline:down"></span>
                </div>
            </li>
            <ul class="menu-3rd border-start">
                <li class="d-flex align-items-center justify-content-between">
                    <a href="{{route('product.type','trial')}}" class="d-block text-dark p-2 text-decoration-none fw-semibold">Forklift Diesel Small</a>
                    <div class="product-menu-3rd cursor-pointer d-flex align-items-center p-2 justify-content-center" style="background-color: #e7e7e7">
                        <span class="iconify w-[24px] h-[24px] text-black" data-icon="icon-park-outline:down"></span>
                    </div>
                </li>
                <ul class="menu-last border-start list-unstyled px-3">
                    @foreach ($products as $product)
                        <li><a href="{{route('product.show', $product->slug)}}" class="d-block text-dark p-2 text-decoration-none d-block p-2">Isuzu C240 Engine</a></li>
                    @endforeach
                </ul>
            </ul>
        </ul>
    </ul>

</div>
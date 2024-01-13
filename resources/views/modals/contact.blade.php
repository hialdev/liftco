<div class="position-fixed bottom-0 top-0 end-0 m-1 m-md-3" style="z-index: 99;">
    <div class="d-flex flex-column align-items-center justify-content-center h-100 gap-2">
        <a href="https://wa.me/{{setting('site.whatsapp')}}" class="text-decoration-none d-block ">
            <span style="width:30px;height:30px" class="iconify" data-icon="logos:whatsapp-icon"></span>
        </a>
        {{-- <a href="https://t.me/{{setting('site.telegram')}}" class="text-decoration-none d-block ">
            <span style="width:30px;height:30px" class="iconify" data-icon="logos:telegram"></span>
        </a> --}}
        <a href="tel:{{setting('site.telp')}}" class="text-decoration-none d-block bg-primary text-white d-flex align-items-center justify-content-center rounded-circle p-2">
            <span style="width:15px;height:15px" class="iconify" data-icon="solar:phone-calling-rounded-bold"></span>
        </a>
        {{-- <a href="mailto:{{setting('site.mail')}}" class="text-decoration-none d-block rounded d-flex p-0 align-items-center justify-content-center ">
            <span style="width:30px;height:30px" class="iconify" data-icon="fluent-emoji:e-mail"></span>
        </a> --}}
    </div>
</div>
@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
{{-- <section>
    <div class="container p-0 position-relative">
        <iframe src="{{$mainoffice->link_gmap}}" class="w-100" style="aspect-ratio:16/9;border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="d-none d-lg-block position-absolute bottom-0 start-0 ms-4 bg-white p-4">
            <h3>{{$mainoffice->title}}</h3>
            <div class="d-flex align-items-end" style="max-width: 35em">
                <div style="max-width: 50%">
                    <p>{{$mainoffice->address}}</p>
                    <p><strong>Telp:</strong><br />
                        {{$mainoffice->telp}}</p>
                </div>
                <div class="text-liftco">
                    <p><strong>Whatsapp:</strong><br />
                        {{$mainoffice->whatsapp}}</p>
                    <p>
                        <strong>Jam Kerja:</strong><br />
                        {{$mainoffice->jam_kerja}}
                    </p>
                    <p>
                        <strong>Email:</strong><br />
                        {{$mainoffice->email}}</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section>
    <div class="container p-0">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="bg-liftco text-white p-5 h-100">
                    <div class="text-center my-5">
                        <span class="iconify" data-width="150" data-icon="fa-solid:mail-bulk"></span>
                    </div>
                    <h1 class="mb-5">{{setting('typography.contact_title')}}</h1>
                    <h2>{{setting('typography.contact_subtitle')}}</h2>
                </div>
            </div>
            <div class="col-12 col-lg-7 p-5">
                <div class="row">
                    @foreach ($offices as $office)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <h5>{{$office->title}}</h5>
                        <p>{{$office->address}}</p>
                        <p>
                            <strong>Telp:</strong><br/>
                            {{$office->telp}}
                        </p>
                    </div>
                    @endforeach
                </div>
                <div class="p-0 position-relative">
                    <iframe src="{{$mainoffice->link_gmap}}" class="w-100" style="aspect-ratio:16/9;border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    {{-- <div class="d-none d-lg-block position-absolute bottom-0 start-0 ms-4 bg-white p-4">
                        <h3>{{$mainoffice->title}}</h3>
                        <div class="d-flex align-items-end" style="max-width: 35em">
                            <div style="max-width: 50%">
                                <p>{{$mainoffice->address}}</p>
                                <p><strong>Telp:</strong><br />
                                    {{$mainoffice->telp}}</p>
                            </div>
                            <div class="text-liftco">
                                <p><strong>Whatsapp:</strong><br />
                                    {{$mainoffice->whatsapp}}</p>
                                <p>
                                    <strong>Jam Kerja:</strong><br />
                                    {{$mainoffice->jam_kerja}}
                                </p>
                                <p>
                                    <strong>Email:</strong><br />
                                    {{$mainoffice->email}}</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section>
    <div class="container p-5">
        <div class="row">
            @foreach ($offices as $office)
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <h3>{{$office->title}}</h3>
                <p>{{$office->address}}</p>
                <p>
                    <strong>Telp:</strong><br/>
                    {{$office->telp}}
                </p>
                {{-- <p>
                    <strong>Whatsapp:</strong><br/>
                    {{$office->whatsapp}}
                </p>
                <p>
                    <strong>Jam Kerja</strong><br/>
                    {{$office->jam_kerja}}
                </p>
                <p>
                    <strong>Email</strong><br/>
                    {{$office->email}}    
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}
@endsection

@section('beforebody')
@endsection
@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
<section>
    <div class="container py-5 px-5">
        <h1 class="text-capitalize">Privacy Policy</h1>
        <div class="p-1 bg-danger mb-3" style="width: 2em;"></div>
        <div>
            {!! setting('site.privacy') !!}
        </div>
    </div>
</section>

@include('section.news')

@endsection

@section('beforebody')
@endsection
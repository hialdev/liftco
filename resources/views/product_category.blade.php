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
                    @include('partials.product_sidebar')
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="p-5">
                    <h2 class="text-5xl font-medium text-slate-900 my-4">{{$category->title}}</h2>
                    <div class="content">
                        {!! $category->content !!}
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
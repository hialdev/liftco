@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
<section>
    <div class="container p-0">
        <div class="bg-light py-5 px-5 px-lg-0">
            <div class="mx-auto" style="max-width: 720px">
                <img src="{{Voyager::image($news->image)}}" alt="{{$news->title}} Image" class="w-100 my-4 rounded-4" style="aspect-ratio:16/9">
                <div class="fs-6 text-secondary fw-semibold">{{makeDate($news->created_at)}}</div>
                <h1>{{$news->title}}</h1>
                <div class="d-flex my-3 align-items-center gap-2">
                    <span class="iconify" data-icon="mingcute:tag-line"></span>
                    <div class="d-flex align-items-center gap-2 flex-wrap tag-box">
                        @forelse ($news->categories as $category)
                        <a href="{{route('news.category',$category->slug)}}" class="p-1 px-3 bg-light cursor-pointer d-block text-dark rounded-4 text-nowrap text-lowercase text-decoration-none">{{$category->name}}</a>
                        @empty
                        <a href="#" class="p-1 px-3 bg-light cursor-pointer d-block text-dark rounded-4 text-nowrap text-lowercase text-decoration-none">Undefined</a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 px-5 px-lg-0">
                <div class="content mx-auto" style="max-width: 720px">
                    {!! $news->content !!}
                </div>
            </div>
        </div>
    </div>
</section>

@include('section.news')
@include('section.brand')

@endsection

@section('beforebody')
<script>
    $(document).ready(function() {
    var $tableOfContents = $('#toc-ul');

    // Mencari semua heading yang akan dimasukkan ke dalam daftar isi
    var $headings = $('h2');

    // Membuat daftar isi
    $headings.each(function(index, element) {
      var $heading = $(element);
      var headingText = $heading.text();
      var headingLevel = parseInt($heading.prop('tagName').substring(1));
      
      // Membuat anchor ID untuk heading
      var anchorId = 'toc-anchor-' + index;
      $heading.attr('id', anchorId);
      
      // Membuat link daftar isi untuk heading
      var tocEntry = '<a class="d-block" href="#' + anchorId + '"><li class="border-start border-2 ps-3 fs-6 cursor-pointer pb-3 text-secondary fw-semibold text-decoration-underline">' + headingText + '</li></a>';
      $tableOfContents.append(tocEntry);
    });
  });
</script>
@endsection
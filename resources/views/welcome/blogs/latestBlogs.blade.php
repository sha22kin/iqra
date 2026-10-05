@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{websiteTitle(isset($page) ? $page->name : '')}}</title>
@endsection

@section('SEO')
<meta name="title" property="og:title" content="{{isset($page) ? $page->seo_title : general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!isset($page) ? $page->seo_desc : general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{isset($page) ? $page->seo_keyword : general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{url()->current()}}" />
<link rel="canonical" href="{{url()->current()}}">
@endsection

@section('contents')

<!-- ======================================================================
       News Main Content
       ====================================================================== -->
<main class="news-page-main">
<div class="container">
@foreach($posts as $post)
<div class="row news-item align-items-start position-relative" data-aos="fade-up">
<div class="col-md-3 mb-3 mb-md-0">
<div class="news-img-wrapper">
<img alt="{{$post->name}}" class="news-img" src="{{asset($post->image())}}"/>
</div>
</div>
<div class="col-md-9">
<div class="news-content">
<div class="news-date">{{ \Carbon\Carbon::parse($post->created_at)->format('d M') }}</div>
<h3 class="news-title">{{$post->name}}</h3>
<p class="news-excerpt">
    {{ rtrim(Str::limit(strip_tags($post->short_description), 180, ''), ' .') }}...
</p>
<a class="news-read-more stretched-link" href="{{route('blogView', $post->slug)}}">Read More</a>
</div>
</div>
</div>
@endforeach
@if($posts->hasPages())
<div class="mt-4">
    {{ $posts->links('pagination::bootstrap-5') }}
</div>
@endif
</div>
</main>
<!-- ======================================================================
       Footer Section
       ====================================================================== -->

@endsection
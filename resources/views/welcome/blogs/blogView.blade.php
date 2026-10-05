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
       News Details Main Content
       ====================================================================== -->
<main class="news-details-page-main">
<div class="container">
<div class="row">
<div class="col-lg-9 col-xl-8 mx-auto">
<div class="news-details-date">{{ \Carbon\Carbon::parse($post->created_at)->format('M d') }}</div>
<h1 class="news-details-title" data-aos="fade-down">
    {{$post->name}}
</h1>
<div class="news-details-content">
    {!! $post->description !!}
</div>
@if($prevPost || $nextPost)
<div class="news-details-nav">
@if($prevPost)
<a class="news-details-nav-link news-details-nav-prev" href="{{route('blogView', $prevPost->slug)}}">
<i class="fa-solid fa-angle-left news-details-nav-icon"></i>
<span class="news-details-nav-text">{{$prevPost->name}}</span>
</a>
@else
<span></span>
@endif
@if($nextPost)
<a class="news-details-nav-link news-details-nav-next" href="{{route('blogView', $nextPost->slug)}}">
<span class="news-details-nav-text">{{$nextPost->name}}</span>
<i class="fa-solid fa-angle-right news-details-nav-icon"></i>
</a>
@endif
</div>
@endif
</div>
</div>
</main>
<!-- ======================================================================
       Footer Section
       ====================================================================== -->

@endsection
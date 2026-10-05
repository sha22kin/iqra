@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($category->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($category->name)}}" />
        <meta name="description" property="og:description" content="{!!$category->seo_description?:general()->meta_description!!}" />
        <meta name="keywords" content="{{$category->seo_keyword?:general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{asset($category->image())}}" />
        <meta name="url" property="og:url" content="{{route('serviceCategory',$category->slug?:'no-title')}}" />
        <link rel="canonical" href="{{route('serviceCategory',$category->slug?:'no-title')}}">
@endsection 
@push('css')
@endpush 

@section('contents')

<main>
<section class="iq-services-section">
<div class="container">
<h1 class="iq-services-main-title" data-aos="fade-down">{{ $category->name }}</h1>
<p class="text-center text-muted mb-5 mx-auto" style="max-width: 820px; font-size: 1.05rem; line-height: 1.8;">
{!! $category->description !!}
</p>
<div class="row g-4">
    @foreach($services as $service)
    <div class="col-md-6 col-lg-4">
        @include(welcomeTheme().'services.includes.serviceGrid')
    </div>
    @endforeach
</div>
<!-- pagination -->
<div class="mt-5">
{{$services->links('pagination')}}
</div>
</div>
</section>
</main>

@endsection 

@push('js') @endpush
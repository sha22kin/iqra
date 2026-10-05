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

<main>
<section class="iq-services-section">
<div class="container">
<h1 class="iq-services-main-title" data-aos="fade-down">{{ $page->short_description ?: 'Our Services' }}</h1>
@if($page->description)
<p class="text-center text-muted mb-5 mx-auto" style="max-width: 820px; font-size: 1.05rem; line-height: 1.8;">
{!! strip_tags($page->description, '<a><strong><em><b><i><br>') !!}
</p>
@endif
<div class="row g-4">
@foreach($services->filter(fn($s) => $s->short_description)->values() as $index => $service)
<div class="col-12 col-md-6 col-lg-4">
<article class="iq-service-card" data-aos="fade-up" @if($index % 3) data-aos-delay="{{ ($index % 3) * 150 }}" @endif id="{{$service->slug}}">
<div class="iq-service-img-wrap">
<img alt="{{$service->seo_title ?: $service->name}}" class="iq-service-img" src="{{asset($service->image())}}"/>
</div>
<div class="iq-service-card-body">
<h2 class="iq-service-card-title" data-aos="fade-down">{{$service->seo_title ?: $service->name}}</h2>
<p class="iq-service-card-desc">{{ strip_tags($service->short_description) }}</p>
</div>
</article>
</div>
@endforeach
</div>
@if($services->hasPages())
<div class="mt-4">
    {{ $services->links('pagination::bootstrap-5') }}
</div>
@endif
</div>
</section>

@foreach($services as $index => $service)
@if($index % 2 == 0)
<section class="iq-about-section iq-section-white">
<div class="container">
<div class="row align-items-center">
<div class="col-12 col-lg-6">
<div class="iq-about-img-panel" data-aos="fade-right">
<div class="iq-about-image-card">
<img alt="{{$service->name}}" class="iq-about-card-img" src="{{asset($service->image())}}"/>
</div>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="iq-about-text-panel iq-about-text-panel-alt" data-aos="fade-left">
<h2 class="iq-about-heading" data-aos="fade-down">{{$service->name}}</h2>
{!! $service->description !!}
</div>
</div>
</div>
</div>
</section>
@else
<section class="iq-about-section iq-section-tint">
<div class="container">
<div class="row align-items-center">
<div class="col-12 col-lg-6">
<div class="iq-about-text-panel" data-aos="fade-right">
<h2 class="iq-about-heading" data-aos="fade-down">{{$service->name}}</h2>
{!! $service->description !!}
</div>
</div>
<div class="col-12 col-lg-6">
<div class="iq-about-img-panel" data-aos="fade-left">
<div class="iq-about-image-card">
<img alt="{{$service->name}}" class="iq-about-card-img" src="{{asset($service->image())}}"/>
</div>
</div>
</div>
</div>
</div>
</section>
@endif
@endforeach

<!-- Market Segmentation Section -->
<section class="iq-about-section iq-section-tint">
<div class="container">
<h2 class="iq-about-heading text-center mb-4" data-aos="fade-down">Market Segmentation</h2>
<p class="iq-about-text text-center mb-5" style="max-width: 750px; margin-left: auto; margin-right: auto;">
          IQRA Transportation Ltd serves a diverse clientele across various industries, providing tailored logistics solutions to meet each sector's unique demands.
        </p>
<div class="table-responsive">
<table class="table table-bordered table-hover align-middle" style="background: #fff; border-radius: 8px; overflow: hidden; font-size: 0.97rem;">
<thead style="background-color: var(--iq-primary); color: #ffffff;">
<tr>
<th style="padding: 14px 20px; font-weight: 600; width: 20%;">Industry</th>
<th style="padding: 14px 20px; font-weight: 600;">Description</th>
</tr>
</thead>
<tbody>
<tr>
<td style="padding: 14px 20px; font-weight: 600; color: var(--iq-primary);">E-Commerce</td>
<td style="padding: 14px 20px; color: #555;">Providing rapid delivery solutions to online retailers to meet consumer demand.</td>
</tr>
<tr style="background-color: #f9f9f9;">
<td style="padding: 14px 20px; font-weight: 600; color: var(--iq-primary);">Manufacturing</td>
<td style="padding: 14px 20px; color: #555;">Offering supply chain solutions to optimize production and distribution.</td>
</tr>
<tr>
<td style="padding: 14px 20px; font-weight: 600; color: var(--iq-primary);">Pharmaceuticals</td>
<td style="padding: 14px 20px; color: #555;">Ensuring secure and timely delivery of sensitive products to healthcare providers.</td>
</tr>
<tr style="background-color: #f9f9f9;">
<td style="padding: 14px 20px; font-weight: 600; color: var(--iq-primary);">Retail</td>
<td style="padding: 14px 20px; color: #555;">Supporting retail operations with efficient warehousing and distribution services.</td>
</tr>
<tr>
<td style="padding: 14px 20px; font-weight: 600; color: var(--iq-primary);">Automotive</td>
<td style="padding: 14px 20px; color: #555;">Providing logistics solutions to manage complex supply chains and just-in-time deliveries.</td>
</tr>
</tbody>
</table>
</div>
</div>
</section>

<!-- Customer Profiles Section -->
<section class="iq-about-section iq-section-white">
<div class="container">
<div class="row align-items-center">
<div class="col-12 col-lg-6">
<div class="iq-about-img-panel" data-aos="fade-right">
<div class="iq-about-image-card">
<img alt="Customer Profiles" class="iq-about-card-img" src="{{asset('frontend_assets/images/about-team-group.jpg')}}"/>
</div>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="iq-about-text-panel iq-about-text-panel-alt" data-aos="fade-left">
<h2 class="iq-about-heading" data-aos="fade-down">Customer Profiles</h2>
<p class="iq-about-text">Our customers vary widely, including small startups, medium-sized enterprises, and large multinational corporations. We tailor our logistics solutions to meet the specific needs of each client, ensuring that we provide the most effective and efficient service possible.</p>
<ul class="iq-about-list">
<li class="iq-about-item"><strong>E-Commerce Startups:</strong> Require fast, reliable shipping options to compete in the online market.</li>
<li class="iq-about-item"><strong>Manufacturers:</strong> Need integrated logistics solutions that streamline production and distribution.</li>
<li class="iq-about-item"><strong>Pharmaceutical Companies:</strong> Demand secure and timely delivery of sensitive products.</li>
</ul>
</div>
</div>
</div>
</div>
</section>

<section class="iq-newsletter-section">
<div class="iq-newsletter-wrapper">
<img alt="Corporate workplace desk and laptop" class="iq-newsletter-bg-img" src="{{asset('frontend_assets/images/')}}/about-newsletter-bg.jpg"/>
<div class="iq-newsletter-overlay">
<div class="container">
<div class="row">
<div class="col-12 col-lg-7">
<div class="iq-newsletter-content" data-aos="zoom-in">
<h2 class="iq-newsletter-title" data-aos="fade-down">Subscribe to Our Newsletter</h2>
<p class="iq-newsletter-subtitle">Sign up with your email address to receive news and updates.</p>
<form action="{{route('subscribe')}}" class="iq-newsletter-form" method="POST">
@csrf
<div class="iq-newsletter-form-box">
<input class="iq-newsletter-input" name="email" placeholder="Email Address" required="" type="email"/>
<button class="iq-newsletter-btn" type="submit">Sign Up</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
@endsection
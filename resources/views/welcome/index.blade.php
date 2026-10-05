@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle()}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('index')}}" />
<link rel="canonical" href="{{route('index')}}">
@endsection 
@push('css')
<script type="application/ld+json">
    { 
    "@context": "https://schema.org", 
    "@type": "WebPage", 
    "url": "{{route('index')}}", 
    "name": "{{websiteTitle()}}",
    "author": {
        "@type": "Webpage",
        "name": "{{websiteTitle()}}"
    },
    "description": "{!!general()->meta_description!!}"
    }
</script>
@endpush 

@section('contents')
<!-- Hero Banner Section -->
<section class="iq-hero-section">
<div class="iq-hero-wrapper">
<img alt="Shipping port and cargo logistics" class="iq-hero-image" src="{{asset('frontend_assets/images/hero-port.jpg')}}"/>
<div class="iq-hero-overlay">
<div class="container">
<h1 class="iq-hero-title" data-aos="fade-down">{{ isset($homePage) ? $homePage->short_description : 'Your Logistics Made Easy' }}</h1>
</div>
</div>
</div>
</section>

<!-- Overview Section -->
<section class="iq-overview-section">
<div class="container">
<div class="row align-items-center">
<div class="col-12 col-lg-6">
<div class="iq-overview-heading-box">
<h2 class="iq-overview-heading" data-aos="fade-down">Leading Service provider in<br/>Bangladesh</h2>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="iq-overview-content-box">
{!! isset($homePage) ? $homePage->description : '' !!}
</div>
</div>
</div>
</div>
</section>

<!-- Our Services Section -->
<section class="iq-services-section" id="services">
<div class="container">
<!-- Section Heading -->
<div class="iq-section-header" data-aos="fade-down">
<h2 class="iq-section-title" data-aos="fade-down">Our Services</h2>
</div>
<!-- Service Cards Grid -->
<div class="row g-4">
@foreach($latestServices as $index => $service)
<div class="col-12 col-md-4">
<div class="iq-service-card" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
<div class="iq-service-image-box">
<img alt="{{$service->name}}" class="iq-service-img" src="{{asset($service->image())}}"/>
</div>
<div class="iq-service-body">
<h3 class="iq-service-title"><a href="{{route('serviceView',$service->slug)}}">{{$service->name}}</a></h3>
<p class="iq-service-text">
    {{ Str::limit(strip_tags($service->short_description), 150) }}
</p>
</div>
</div>
</div>
@endforeach
</div>
<!-- Section CTA Button -->
<div class="iq-services-action">
<a class="iq-btn-primary" href="{{route('pageView','services')}}">More Services</a>
</div>
</div>
</section>

<!-- Contact Section -->
<section class="iq-contact-section" id="contact">
<div class="container">
<div class="row">
<div class="col-12 col-lg-5">
<div class="iq-contact-info-panel" data-aos="fade-right">
<h2 class="iq-contact-main-heading" data-aos="fade-down">Contact</h2>
<p class="iq-contact-subtitle">Feel free to contact us with any questions.</p>
<div class="iq-contact-detail-group">
<div class="iq-contact-detail-label">Email</div>
<div class="iq-contact-detail-value">
<a class="iq-contact-detail-link" href="mailto:{{general()->email}}">{{general()->email}}</a><br>
<a class="iq-contact-detail-link" href="mailto:export@iqragroup.net">export@iqragroup.net</a><br>
<a class="iq-contact-detail-link" href="mailto:import@iqragroup.net">import@iqragroup.net</a>
</div>
</div>
<div class="iq-contact-detail-group">
<div class="iq-contact-detail-label">Phone</div>
<div class="iq-contact-detail-value">
<a class="iq-contact-detail-link" href="tel:{{general()->mobile}}">{{general()->mobile}}</a>
</div>
</div>
</div>
</div>
<div class="col-12 col-lg-7">
<div class="iq-contact-form-panel" data-aos="fade-left">
<form action="{{route('contactMail')}}" method="POST">
@csrf
<input type="hidden" name="subject" value="Home Page Contact Form">
<input type="hidden" name="anchor" value="#contact">
<div style="position:absolute;left:-9999px;" aria-hidden="true"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
@if(session('contact_success'))
<div class="alert alert-success mb-4">{{session('contact_success')}}</div>
@endif
@if(session('contact_error'))
<div class="alert alert-danger mb-4">{{session('contact_error')}}</div>
@endif
@if($errors->any())
<div class="alert alert-danger mb-4"><ul class="mb-0 ps-3">@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>
@endif
<div class="iq-form-group">
<div class="iq-form-heading-label">Name</div>
<div class="row g-3">
<div class="col-12 col-sm-6">
<label class="iq-form-sublabel" for="iqFirstName">First Name <span class="iq-form-label-req">(required)</span></label>
<input class="iq-form-control" id="iqFirstName" name="first_name" value="{{old('first_name')}}" maxlength="50" required="" type="text"/>
</div>
<div class="col-12 col-sm-6">
<label class="iq-form-sublabel" for="iqLastName">Last Name <span class="iq-form-label-req">(required)</span></label>
<input class="iq-form-control" id="iqLastName" name="last_name" value="{{old('last_name')}}" maxlength="50" required="" type="text"/>
</div>
</div>
</div>
<div class="iq-form-group">
<label class="iq-form-sublabel" for="iqEmail">Email <span class="iq-form-label-req">(required)</span></label>
<input class="iq-form-control" id="iqEmail" name="email" value="{{old('email')}}" maxlength="100" required="" type="email"/>
</div>
<div class="iq-form-group">
<label class="iq-form-sublabel" for="iqMessage">Message <span class="iq-form-label-req">(required)</span></label>
<textarea class="iq-form-control iq-form-textarea" id="iqMessage" name="message" maxlength="3000" required="">{{old('message')}}</textarea>
</div>
<button class="iq-btn-submit" type="submit">Submit</button>
</form>
</div>
</div>
</div>
</div>
</section>
@endsection
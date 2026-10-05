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
       Contact Page Top Section
       ====================================================================== -->
<section class="contact-page-top">
<div class="container">
<div class="row align-items-center">
<!-- Left Column: Info -->
<div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5">
<h1 class="contact-title" data-aos="fade-down">Contact us.</h1>
<h4 class="fs-5 fw-bold mb-2 text-dark">Iqra Transportation Ltd.</h4>
<div class="contact-info-block mb-3">
<h5 class="fs-6 fw-semibold mb-1 text-dark">OFFICE ADDRESS DHAKA:</h5>
<div>85 (GROUND FLOOR), NIJHUM RESIDENTIAL AREA,<br/>JIGATOLA, DHANMONDI, DHAKA-1209, BANGLADESH.</div>
</div>
<div class="contact-info-block mb-3">
<h5 class="fs-6 fw-semibold mb-1 text-dark">CHITTAGONG OFFICE:</h5>
<div>Siraj Monjil (G/F), 3601/5899, Badamtoli, Agrabad-4100, Double Mooring, Chattogram</div>
</div>
<div class="contact-info-block mb-3">
<div><strong>Telephone:</strong> 02226684851</div>
<div><strong>Cell:</strong> +8801720518612</div>
<div><strong>Whatsapp:</strong> +8801720518612</div>
<div><strong>Email:</strong> <a class="text-decoration-none text-dark" href="mailto:customs@iqragroup.net">customs@iqragroup.net</a>, <a class="text-decoration-none text-dark" href="mailto:import@iqragroup.net">import@iqragroup.net</a>, <a class="text-decoration-none text-dark" href="mailto:export@iqragroup.net">export@iqragroup.net</a></div>
</div>
<div class="contact-social-links">
<a aria-label="LinkedIn" class="contact-social-link" href="https://www.linkedin.com/company/146633035/admin/dashboard/" target="_blank">
<i class="fa-brands fa-linkedin-in"></i>
</a>
<a aria-label="Facebook" class="contact-social-link" href="https://www.facebook.com/profile.php?id=61594175524744&amp;sk=followers" target="_blank">
<i class="fa-brands fa-facebook-f"></i>
</a>
</div>
</div>
<!-- Right Column: Map -->
<div class="col-lg-7">
<div class="contact-map-wrapper">
<!-- Embedding Google Maps for Tejgaon Industrial Area, Dhaka -->
<iframe allowfullscreen="" class="contact-map-iframe" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14605.903792015332!2d90.39088612502693!3d23.765181710321287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77724186539%3A0xc346332145e69e46!2sTejgaon%20Industrial%20Area%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd"></iframe>
</div>
</div>
</div>
</div>
</section>
<!-- ======================================================================
       Contact Page Bottom Section (Form)
       ====================================================================== -->
<section class="contact-page-bottom">
<div class="container">
<form action="{{route('contactMail')}}" method="POST" class="contact-form" id="contact-form" data-aos="fade-up">
@csrf
<input type="hidden" name="subject" value="Contact Us Page Form">
<input type="hidden" name="anchor" value="#contact-form">
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
<!-- Name Group -->
<div class="mb-4">
<div class="contact-form-label">Name</div>
<div class="row g-3">
<div class="col-md-12">
<label class="contact-form-sublabel" for="name">Full Name <span>(required)</span></label>
<input class="contact-input" id="name" name="name" value="{{old('name')}}" maxlength="100" required="" type="text"/>
</div>
</div>
</div>
<!-- Email Field -->
<div class="mb-4">
<label class="contact-form-sublabel" for="email">Email <span>(required)</span></label>
<input class="contact-input" id="email" name="email" value="{{old('email')}}" maxlength="100" required="" type="email"/>
</div>
<!-- Message Field -->
<div class="mb-4">
<label class="contact-form-sublabel" for="message">Message <span>(required)</span></label>
<textarea class="contact-input contact-textarea" id="message" name="message" maxlength="3000" required="">{{old('message')}}</textarea>
</div>
<!-- Submit Button -->
<div>
<button class="contact-submit-btn" type="submit">Send</button>
</div>
</form>
</div>
</section>
<!-- ======================================================================
       Footer Section
       ====================================================================== -->
@endsection
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
<!-- ====================================================================
         Section 1: Our Vision Section (White Background)
         ==================================================================== -->
<section class="iq-vision-section pb-2">
<div class="container">
<div class="row align-items-center">
<!-- Vision Content Column -->
<div class="col-12 col-lg-6">
<div class="iq-vision-content-panel">
<h2 class="iq-vision-heading" data-aos="fade-down">Our Mission</h2>
<p class="iq-vision-mission-text" style="font-size: 1.05rem; line-height: 1.8; color: #555555; text-align: justify; margin-bottom: 2.5rem;">
                To transform the logistics landscape by delivering highly efficient, reliable, and scalable solutions that drive the success of our clients globally. We strive to ensure that every logistics challenge is met with innovative and tailored solutions that promote business growth.
              </p>
<h2 class="iq-vision-heading mt-4" data-aos="fade-down">Our Vision</h2>
<p class="iq-vision-mission-text" style="font-size: 1.05rem; line-height: 1.8; color: #555555; text-align: justify;">
                To be the world's most trusted and innovative logistics partner, fostering economic growth, environmental sustainability, and community development. We envision a future where logistics is not just a service but a catalyst for global commerce and connectivity.
              </p>
</div>
</div>
<!-- Vision Image Column -->
<div class="col-12 col-lg-6">
<div class="iq-vision-img-panel">
<div class="iq-vision-image-card">
<img alt="Businessman walking up architectural staircase" class="iq-vision-card-img" src="{{asset('frontend_assets/images/')}}/vision-stairs-man.jpg"/>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ====================================================================
         Section 2: Our Values Section (Tinted Background)
         ==================================================================== -->
<section class="iq-values-section pt-2">
<div class="container">
<div class="row">
<div class="col-12">
<div class="iq-values-content-panel text-center mb-2">
<h2 class="iq-values-heading" data-aos="fade-down" style="font-size: 2.2rem; font-weight: 700; text-transform: uppercase;">Core Values</h2>
</div>
</div>
</div>
<div class="row g-4 justify-content-center">
<div class="col-md-6 col-lg-4">
<div class="card h-100 border-0 shadow-sm p-4 bg-white rounded-4 text-center">
<div class="mb-3">
<i class="fa-solid fa-lightbulb text-primary" style="font-size: 2.5rem;"></i>
</div>
<h4 class="text-primary fw-bold mb-3">Innovation</h4>
<p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">We are committed to pioneering cutting-edge solutions to enhance logistics and supply chain efficiency. Our approach focuses on harnessing new technologies and methodologies to stay ahead of industry trends.</p>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="card h-100 border-0 shadow-sm p-4 bg-white rounded-4 text-center">
<div class="mb-3">
<i class="fa-solid fa-handshake-angle text-primary" style="font-size: 2.5rem;"></i>
</div>
<h4 class="text-primary fw-bold mb-3">Integrity</h4>
<p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">Upholding honesty, transparency, and accountability in all operations is our priority. We believe that building trust with our clients and partners is essential for long-term relationships.</p>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="card h-100 border-0 shadow-sm p-4 bg-white rounded-4 text-center">
<div class="mb-3">
<i class="fa-solid fa-users text-primary" style="font-size: 2.5rem;"></i>
</div>
<h4 class="text-primary fw-bold mb-3">Customer Focus</h4>
<p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">Putting clients first to ensure seamless and reliable service delivery is at the heart of our operations. We actively listen to our clients and tailor our services to meet their unique needs and challenges.</p>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="card h-100 border-0 shadow-sm p-4 bg-white rounded-4 text-center">
<div class="mb-3">
<i class="fa-solid fa-leaf text-primary" style="font-size: 2.5rem;"></i>
</div>
<h4 class="text-primary fw-bold mb-3">Sustainability</h4>
<p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">We are committed to environmentally responsible practices across all logistics services. We believe in doing our part to protect the planet for future generations while delivering effective logistics solutions.</p>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="card h-100 border-0 shadow-sm p-4 bg-white rounded-4 text-center">
<div class="mb-3">
<i class="fa-solid fa-award text-primary" style="font-size: 2.5rem;"></i>
</div>
<h4 class="text-primary fw-bold mb-3">Excellence</h4>
<p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">Striving for continuous improvement and operational excellence in everything we do is our guiding principle. We constantly seek ways to enhance our services and exceed expectations.</p>
</div>
</div>
</div>
</div>
</section>
<!-- ====================================================================
         Section 3: Subscribe to Our Newsletter Section
         ==================================================================== -->
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
<form action="#" class="iq-newsletter-form" method="POST">
<div class="iq-newsletter-form-box">
<input class="iq-newsletter-input" placeholder="Email Address" required="" type="email"/>
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
<!-- ======================================================================
       Footer Section
       ====================================================================== -->

@endsection
@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:websiteTitle($page->name)}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
<meta name="url" property="og:url" content="{{route('pageView',$page->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('pageView',$page->slug?:'no-title')}}">
@endsection
@push('css')
<style>
    .om-profile{position:sticky;top:100px;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);overflow:hidden;box-shadow:0 18px 40px rgba(6,38,74,.10);}
    .om-photo{position:relative;aspect-ratio:4/5;background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);overflow:hidden;}
    .om-photo img{width:100%;height:100%;object-fit:cover;display:block;}
    .om-photo .om-photo-empty{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,.35);font-size:6rem;}
    .om-photo::after{content:"";position:absolute;left:0;right:0;bottom:0;height:5px;background:linear-gradient(90deg,var(--nlfb-green) 0 50%,var(--nlfb-red) 50% 100%);}
    .om-profile-body{padding:1.5rem 1.5rem 1.6rem;text-align:center;}
    .om-profile-body h4{font-size:1.25rem;margin-bottom:.2rem;color:var(--nlfb-ink);}
    .om-role{display:inline-block;font-size:.74rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nlfb-blue);background:var(--nl-tint-blue);border-radius:999px;padding:.3rem .8rem;margin-bottom:1rem;}
    .om-web{display:inline-flex;align-items:center;gap:.5rem;font-size:.88rem;font-weight:600;color:var(--nlfb-blue);border:1px solid var(--nl-line-strong);border-radius:999px;padding:.45rem 1rem;transition:background .2s ease,color .2s ease;}
    .om-web:hover{background:var(--nlfb-blue);color:#fff;}

    .om-letter{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:2.4rem 2.4rem 2rem;position:relative;}
    .om-letter::before{content:"\201C";position:absolute;top:-.35rem;right:1.6rem;font-family:"Poppins",serif;font-size:7rem;line-height:1;color:var(--nl-tint-blue);pointer-events:none;}
    .om-salute{font-family:"Poppins",sans-serif;font-weight:700;font-size:1.2rem;color:var(--nlfb-blue);margin-bottom:1.2rem;}
    .om-letter p{font-size:1rem;line-height:1.8;color:var(--nl-text);margin-bottom:1.15rem;}
    .om-letter .om-lead{font-size:1.06rem;}

    .om-stat{background:var(--nlfb-cream);border-radius:var(--radius-md);padding:1.1rem 1rem;height:100%;text-align:center;}
    .om-stat .om-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:1.7rem;line-height:1.1;color:var(--nlfb-red);}
    .om-stat span{display:block;font-size:.8rem;font-weight:600;color:var(--nl-muted);margin-top:.3rem;line-height:1.35;}

    .om-pillars{display:grid;grid-template-columns:repeat(4,1fr);gap:.75rem;margin:1.4rem 0 1.6rem;}
    .om-pillar{border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem .6rem;text-align:center;}
    .om-pillar i{width:42px;height:42px;border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto .55rem;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .om-pillar:nth-child(2) i{background:linear-gradient(145deg,#00693e,#013d24);}
    .om-pillar:nth-child(3) i{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .om-pillar span{font-size:.85rem;font-weight:700;color:var(--nlfb-ink);}

    .om-phase{background:var(--nl-tint-green);border-left:4px solid var(--nlfb-green);border-radius:var(--radius-md);padding:1.2rem 1.4rem;margin-bottom:1.4rem;}
    .om-phase h6{font-size:.78rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nlfb-green);margin-bottom:.75rem;}
    .om-chips{display:flex;flex-wrap:wrap;gap:.45rem;}
    .om-chips span{font-size:.8rem;font-weight:600;color:var(--nlfb-green);background:var(--nl-surface);border:1px solid #cfe9dc;border-radius:999px;padding:.32rem .8rem;}

    .om-wish{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);color:#fff;border-radius:var(--radius-md);padding:1.2rem 1.4rem;display:flex;align-items:center;gap:.9rem;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.1rem;margin:1.6rem 0;}
    .om-wish i{font-size:1.4rem;color:#5fd3a3;}

    .om-sign{border-top:1px dashed var(--nl-line-strong);padding-top:1.3rem;display:flex;align-items:center;gap:1rem;}
    .om-sign img{width:56px;height:56px;border-radius:50%;object-fit:cover;flex-shrink:0;}
    .om-sign h5{margin-bottom:.1rem;font-size:1.05rem;color:var(--nlfb-ink);}
    .om-sign p{margin:0;font-size:.86rem;color:var(--nl-muted);line-height:1.5;}
    .om-sign a{color:var(--nlfb-blue);font-weight:600;}

    @media (max-width:991.98px){
        .om-profile{position:static;max-width:420px;margin-inline:auto;}
    }
    @media (max-width:575.98px){
        .om-letter{padding:1.6rem 1.25rem 1.4rem;}
        .om-pillars{grid-template-columns:repeat(2,1fr);}
    }
</style>
@endpush

@section('contents')
<div class="breadcrumb-area"
@if($page->bannerFile)
style="background-image:url({{asset($page->banner())}});background-repeat: no-repeat;
    background-size: cover;padding: 50px 0;"
@endif
>
    <div class="container">
        <div class="title">
            <h1>{{$page->name}}</h1>
            <ul>
                <li><a href="{{route('index')}}">Home</a></li>
                <li>{{$page->name}}</li>
            </ul>
        </div>
    </div>
</div>

<!-- ============ OFFICIAL MESSAGE ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">From the Secretary General</div>
            <h2 class="section-title mt-2">Official Message</h2>
        </div>

        <div class="row g-4 g-lg-5 align-items-start">
            <!-- Profile -->
            <div class="col-lg-4">
                <div class="om-profile">
                    <div class="om-photo">
                        @if($page->imageFile)
                        <img src="{{asset($page->image())}}" alt="Prof. Mohammad Ali">
                        @else
                        <div class="om-photo-empty"><i class="fa-solid fa-user-doctor"></i></div>
                        @endif
                    </div>
                    <div class="om-profile-body">
                        <h4>Prof. Mohammad Ali</h4>
                        <div class="om-role">Secretary General</div>
                        <div>
                            <a class="om-web" href="https://profmohammadali.com.bd" target="_blank" rel="noopener"><i class="fa-solid fa-globe"></i> profmohammadali.com.bd</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Letter -->
            <div class="col-lg-8">
                <div class="om-letter">
                    <div class="om-salute">Honorable Nationals of Bangladesh,</div>

                    <p class="om-lead">You are fully aware that Bangladesh is one of the densely populated countries of the world with poor socioeconomic &amp; hygienic conditions. The incidence of different kinds of liver disease like Hepatitis, Cirrhosis &amp; Liver Cancers is common in our country. About 4%- 07% of our population have hepatitis B &amp; 1%-3% have hepatitis C infections. About 3.5% of pregnant women have hepatitis B viral infection. They are potential source of transmission of hepatitis B virus to their newborn. In addition, alcoholic liver disease also increasing. Contaminated food and drinks with many kinds of chemicals and preservative also continuously contributing to increase various kinds diseases of liver.</p>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <div class="om-stat"><div class="om-num">4%&ndash;7%</div><span>of the population have hepatitis B</span></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="om-stat"><div class="om-num">1%&ndash;3%</div><span>have hepatitis C infections</span></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="om-stat"><div class="om-num">3.5%</div><span>of pregnant women have hepatitis B viral infection</span></div>
                        </div>
                    </div>

                    <p>Multiple factors are related to the cause and spread of liver diseases in our country. May conditions can be well prevented. Extremely limited treatment facilities cause untimely death of many and only fortunate few can afford for treatment abroad. Nation looses a huge amount of foreign currency each year.</p>

                    <p class="mb-0">The National Liver Foundation of Bangladesh (NLFB) is a not for profit organization, dedicated to Prevention, Treatment, Education and Research on liver diseases in Bangladesh. All the income of the foundation is utilized for the interest of liver disease patients in Bangladesh and for the development of the foundation.</p>

                    <div class="om-pillars">
                        <div class="om-pillar"><i class="fa-solid fa-shield-virus"></i><span>Prevention</span></div>
                        <div class="om-pillar"><i class="fa-solid fa-stethoscope"></i><span>Treatment</span></div>
                        <div class="om-pillar"><i class="fa-solid fa-graduation-cap"></i><span>Education</span></div>
                        <div class="om-pillar"><i class="fa-solid fa-flask"></i><span>Research</span></div>
                    </div>

                    <p>The Foundation activities have been planned in four phases. The first phases activities have already been started. It includes liver clinic service, screening and vaccination service, E-mail service, postal service &amp; campaigns for awareness &amp; prevention of liver diseases. Laboratory and ultrasound facilities also started.</p>

                    <div class="om-phase">
                        <h6><i class="fa-solid fa-circle-check me-1"></i> First Phase &mdash; Already Started</h6>
                        <div class="om-chips">
                            <span>Liver clinic service</span>
                            <span>Screening &amp; vaccination service</span>
                            <span>E-mail service</span>
                            <span>Postal service</span>
                            <span>Awareness &amp; prevention campaigns</span>
                            <span>Laboratory</span>
                            <span>Ultrasound</span>
                        </div>
                    </div>

                    <p class="mb-0">It is our dream to establish a centre of excellence for treatment of all kinds of disease of liver in Bangladesh. Your cooperation, assistance support will encourage us in rendering the services to millions of people of Bangladesh.</p>

                    <div class="om-wish">
                        <i class="fa-solid fa-heart-pulse"></i>
                        <span>Wish healthy liver for all.</span>
                    </div>

                    <div class="om-sign">
                        @if($page->imageFile)
                        <img src="{{asset($page->image())}}" alt="Prof. Mohammad Ali">
                        @endif
                        <div>
                            <h5>Prof. Mohammad Ali</h5>
                            <p>Secretary General</p>
                            <p>web: <a href="https://profmohammadali.com.bd" target="_blank" rel="noopener">profmohammadali.com.bd</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-hand-holding-heart" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Support Our Mission</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Your cooperation, assistance and support will encourage us in rendering services to millions of people of Bangladesh.</p>
                </div>
                <div class="col-lg-3 text-lg-end mt-3 mt-lg-0">
                    <a href="{{route('pageView','contact-us')}}" class="btn-panel btn">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
@endpush

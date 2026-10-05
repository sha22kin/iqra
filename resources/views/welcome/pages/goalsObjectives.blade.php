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
    .go-intro p{font-size:1.04rem;color:var(--nl-text);line-height:1.75;}
    .go-target{position:relative;width:100%;max-width:340px;aspect-ratio:1;margin:0 auto;}
    .go-target .go-ring{position:absolute;border-radius:50%;inset:0;}
    .go-target .gr-1{background:var(--nl-tint-red);}
    .go-target .gr-2{inset:14%;background:var(--nl-surface);}
    .go-target .gr-3{inset:26%;background:var(--nl-tint-blue);}
    .go-target .gr-4{inset:38%;background:linear-gradient(145deg,#0b5fa5,#06264a);display:flex;align-items:center;justify-content:center;color:#fff;font-size:2rem;box-shadow:0 14px 30px rgba(6,38,74,.3);}
    .go-target .go-tag{position:absolute;display:flex;align-items:center;gap:.45rem;background:var(--nl-surface);border-radius:999px;padding:.45rem .9rem;font-size:.82rem;font-weight:700;color:var(--nlfb-heading);box-shadow:0 10px 24px rgba(6,38,74,.14);white-space:nowrap;animation:goFloat 4s ease-in-out infinite;}
    .go-target .go-tag i{font-size:.9rem;}
    .go-target .gt-1{top:4%;left:-6%;}
    .go-target .gt-2{top:44%;right:-10%;animation-delay:1.2s;}
    .go-target .gt-3{bottom:2%;left:4%;animation-delay:2.4s;}
    @keyframes goFloat{0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);}}

    .go-goal{position:relative;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:2rem 1.75rem 1.75rem;height:100%;display:flex;flex-direction:column;overflow:hidden;transition:transform .25s ease,box-shadow .25s ease;}
    .go-goal:hover{transform:translateY(-8px);box-shadow:0 22px 40px rgba(6,38,74,.14);}
    .go-goal::before{content:"";position:absolute;left:0;top:0;right:0;height:5px;background:var(--go-accent,var(--nlfb-blue));}
    .go-goal .go-no{position:absolute;top:.8rem;right:1.2rem;font-family:"Poppins",sans-serif;font-weight:700;font-size:3.6rem;line-height:1;color:var(--nl-tint-blue-2);}
    .go-goal .go-icon{position:relative;width:60px;height:60px;border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:#fff;margin-bottom:1.2rem;background:var(--go-grad);}
    .go-goal .go-label{position:relative;font-size:.74rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--go-accent);margin-bottom:.4rem;}
    .go-goal p.go-text{position:relative;font-size:1.02rem;line-height:1.65;color:var(--nlfb-ink);font-weight:500;margin-bottom:1.2rem;}
    .go-goal .go-sub{margin-top:auto;border-top:1px dashed var(--nl-line);padding-top:1rem;}
    .go-goal .go-sub h6{font-size:.74rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:.6rem;}
    .go-goal .go-chips{display:flex;flex-wrap:wrap;gap:.4rem;}
    .go-goal .go-chips span{font-size:.78rem;font-weight:600;border-radius:999px;padding:.3rem .75rem;background:var(--go-soft);color:var(--go-accent);}
    .go-red{--go-accent:var(--nlfb-red);--go-soft:var(--nl-tint-red);--go-grad:linear-gradient(145deg,#e4002b,#8f0019);}
    .go-green{--go-accent:var(--nlfb-green);--go-soft:var(--nl-tint-green-2);--go-grad:linear-gradient(145deg,#00693e,#013d24);}
    .go-blue{--go-accent:var(--nlfb-blue);--go-soft:var(--nl-tint-blue);--go-grad:linear-gradient(145deg,#0b5fa5,#06264a);}

    .go-pillar{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.4rem 1rem;text-align:center;height:100%;transition:transform .2s ease,box-shadow .2s ease;}
    .go-pillar:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);}
    .go-pillar i{width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto .75rem;font-size:1.2rem;background:var(--nl-tint-blue);color:var(--nlfb-blue);}
    .go-pillar-col:nth-child(odd) .go-pillar i{background:var(--nl-tint-green-2);color:var(--nlfb-green);}
    .go-pillar h6{font-size:1rem;font-weight:700;margin:0;color:var(--nlfb-ink);}

    .go-path{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2.4rem 2rem;color:#fff;position:relative;overflow:hidden;}
    .go-path::after{content:"";position:absolute;left:0;right:0;bottom:0;height:5px;background:linear-gradient(90deg,var(--nlfb-green) 0 50%,var(--nlfb-red) 50% 100%);}
    .go-path h2{color:#fff;}
    .go-steps{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;position:relative;margin-top:1.8rem;}
    .go-step{position:relative;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);border-radius:var(--radius-md);padding:1.2rem 1.1rem;}
    .go-step .go-step-no{width:34px;height:34px;border-radius:50%;background:var(--nl-surface);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;margin-bottom:.7rem;}
    .go-step h6{color:#fff;font-weight:700;font-size:.98rem;margin-bottom:.3rem;}
    .go-step p{margin:0;font-size:.86rem;color:rgba(255,255,255,.8);line-height:1.5;}
    .go-step:not(:last-child)::after{content:"\f061";font-family:"Font Awesome 6 Free";font-weight:900;position:absolute;right:-.85rem;top:50%;transform:translateY(-50%);width:1.6rem;height:1.6rem;border-radius:50%;background:#5fd3a3;color:var(--nlfb-heading);display:flex;align-items:center;justify-content:center;font-size:.7rem;z-index:1;}

    .go-link{display:flex;align-items:center;gap:1rem;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.2rem 1.3rem;height:100%;color:var(--nlfb-ink);transition:transform .2s ease,box-shadow .2s ease,border-color .2s ease;}
    .go-link:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);border-color:var(--nlfb-blue);color:var(--nlfb-ink);}
    .go-link > i:first-child{flex-shrink:0;width:46px;height:46px;border-radius:12px;background:var(--nl-tint-blue);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;font-size:1.1rem;}
    .go-link h6{margin:0 0 .15rem;font-weight:700;}
    .go-link span{font-size:.84rem;color:var(--nl-muted);}
    .go-link .go-arrow{margin-left:auto;color:var(--nlfb-blue);}

    @media (max-width:991.98px){
        .go-steps{grid-template-columns:1fr;}
        .go-step:not(:last-child)::after{content:"\f063";right:50%;top:auto;bottom:-.85rem;transform:translateX(50%);}
    }
    @media (max-width:575.98px){
        .go-target{max-width:260px;}
        .go-target .gt-1{left:-2%;}
        .go-target .gt-2{right:-4%;}
        .go-path{padding:1.8rem 1.25rem;}
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

<!-- ============ INTRO ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="go-intro">
                    <div class="eyebrow">What We Aim For</div>
                    <h2 class="section-title mt-2 mb-3">Goals &amp; objectives of the foundation</h2>
                    <p>The National Liver Foundation of Bangladesh (NLFB) is a not-for-profit organisation dedicated to Prevention, Treatment, Education and Research on liver diseases in Bangladesh, with special emphasis on viral hepatitis.</p>
                    <p class="mb-0">Every activity of the foundation is guided by three core goals &mdash; building public awareness, developing skilled health personnel, and creating a modern centre of excellence for liver care.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="go-target">
                    <div class="go-ring gr-1"></div>
                    <div class="go-ring gr-2"></div>
                    <div class="go-ring gr-3"></div>
                    <div class="go-ring gr-4"><i class="fa-solid fa-bullseye"></i></div>
                    <div class="go-tag gt-1"><i class="fa-solid fa-bullhorn text-nlfb-red"></i> Awareness</div>
                    <div class="go-tag gt-2"><i class="fa-solid fa-user-graduate text-nlfb-green"></i> Training</div>
                    <div class="go-tag gt-3"><i class="fa-solid fa-hospital text-nlfb-blue"></i> Centre of Excellence</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ THE THREE GOALS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Our Three Goals</div>
            <h2 class="section-title mt-2">Goals &amp; Objectives</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="go-goal go-red">
                    <span class="go-no">01</span>
                    <div class="go-icon"><i class="fa-solid fa-bullhorn"></i></div>
                    <div class="go-label">Public Awareness</div>
                    <p class="go-text">To raise public awareness about the course, dangers &amp; treatment of liver disease</p>
                    <div class="go-sub">
                        <h6>How we work on it</h6>
                        <div class="go-chips">
                            <span>Awareness campaigns</span>
                            <span>Free leaflets</span>
                            <span>Mass media</span>
                            <span>e-liver service</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="go-goal go-green">
                    <span class="go-no">02</span>
                    <div class="go-icon"><i class="fa-solid fa-user-graduate"></i></div>
                    <div class="go-label">Training &amp; Education</div>
                    <p class="go-text">To train medical paramedics and ancillary technical personal in the field of various aspects of liver disease.</p>
                    <div class="go-sub">
                        <h6>How we work on it</h6>
                        <div class="go-chips">
                            <span>Seminars</span>
                            <span>Doctors</span>
                            <span>Nurses</span>
                            <span>Paramedics</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="go-goal go-blue">
                    <span class="go-no">03</span>
                    <div class="go-icon"><i class="fa-solid fa-hospital"></i></div>
                    <div class="go-label">Centre of Excellence</div>
                    <p class="go-text">To establish a modern center of excellence for prevention, treatment, education &amp; research on liver diseases in Bangladesh.</p>
                    <div class="go-sub">
                        <h6>How we work on it</h6>
                        <div class="go-chips">
                            <span>Liver clinic</span>
                            <span>Laboratory</span>
                            <span>Ultrasound</span>
                            <span>Screening &amp; vaccination</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ FOUR PILLARS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Built on Four Pillars</div>
            <h2 class="section-title mt-2">Prevention, Treatment, Education &amp; Research</h2>
        </div>
        <div class="row g-3 g-md-4">
            <div class="col-6 col-lg-3 go-pillar-col"><div class="go-pillar"><i class="fa-solid fa-shield-virus"></i><h6>Prevention</h6></div></div>
            <div class="col-6 col-lg-3 go-pillar-col"><div class="go-pillar"><i class="fa-solid fa-stethoscope"></i><h6>Treatment</h6></div></div>
            <div class="col-6 col-lg-3 go-pillar-col"><div class="go-pillar"><i class="fa-solid fa-book-open-reader"></i><h6>Education</h6></div></div>
            <div class="col-6 col-lg-3 go-pillar-col"><div class="go-pillar"><i class="fa-solid fa-flask"></i><h6>Research</h6></div></div>
        </div>
    </div>
</section>

<!-- ============ PATH TO THE GOAL ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="go-path">
            <div class="text-center">
                <div class="eyebrow" style="color:#5fd3a3;">From Goals to Action</div>
                <h2 class="section-title mt-2 mb-2">The Road to a Healthier Liver for All</h2>
                <p class="mb-0" style="color:rgba(255,255,255,.85);max-width:680px;margin-inline:auto;">Each goal builds on the one before &mdash; awareness creates demand for trained care, and trained care lays the foundation for a centre of excellence.</p>
            </div>
            <div class="go-steps">
                <div class="go-step">
                    <div class="go-step-no">1</div>
                    <h6>Raise Awareness</h6>
                    <p>Educate the public about the course, dangers and treatment of liver disease.</p>
                </div>
                <div class="go-step">
                    <div class="go-step-no">2</div>
                    <h6>Train Personnel</h6>
                    <p>Build skills among paramedics and ancillary technical personnel.</p>
                </div>
                <div class="go-step">
                    <div class="go-step-no">3</div>
                    <h6>Centre of Excellence</h6>
                    <p>Prevention, treatment, education and research under one roof.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ LEARN MORE ============ -->
@php
    $missionPage = pageTemplate('Mission Statement');
    $messagePage = pageTemplate('Official Message');
@endphp
@if($missionPage || $messagePage)
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @if($missionPage)
            <div class="col-md-6 col-lg-5">
                <a class="go-link" href="{{route('pageView',$missionPage->slug?:'no-title')}}">
                    <i class="fa-solid fa-flag"></i>
                    <div><h6>{{$missionPage->name}}</h6><span>Our mission, vision &amp; planned phases</span></div>
                    <i class="fa-solid fa-arrow-right go-arrow"></i>
                </a>
            </div>
            @endif
            @if($messagePage)
            <div class="col-md-6 col-lg-5">
                <a class="go-link" href="{{route('pageView',$messagePage->slug?:'no-title')}}">
                    <i class="fa-solid fa-envelope-open-text"></i>
                    <div><h6>{{$messagePage->name}}</h6><span>A message from the Secretary General</span></div>
                    <i class="fa-solid fa-arrow-right go-arrow"></i>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- ============ CTA ============ -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-hand-holding-heart" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Help Us Reach These Goals</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Your cooperation, assistance and support will help us serve millions of people across Bangladesh.</p>
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

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
    .ms-intro p{font-size:1.02rem;color:var(--nl-text);}
    .ms-note{background:var(--nlfb-cream);border-left:4px solid var(--nlfb-blue);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .bg-white .ms-note{background:var(--nl-tint-blue-2);}
    .ms-good{background:var(--nl-tint-green);border-left:4px solid var(--nlfb-green);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .ms-warn{background:var(--nl-tint-red-2);border-left:4px solid var(--nlfb-red);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .ms-note p,.ms-good p,.ms-warn p{color:var(--nl-text);}

    .ms-fact-panel{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2rem;color:#fff;box-shadow:0 18px 40px rgba(6,38,74,.22);}
    .ms-fact-panel h4{font-size:.78rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:rgba(255,255,255,.75);margin-bottom:1.25rem;}
    .ms-fact-row{display:flex;gap:.9rem;align-items:center;margin-bottom:1rem;}
    .ms-fact-row:last-child{margin-bottom:0;}
    .ms-fact-row i{width:34px;height:34px;flex-shrink:0;border-radius:10px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;}
    .ms-fact-row h6{margin-bottom:0;font-size:.92rem;color:#fff;}
    .ms-fact-row p{margin-bottom:0;font-size:.8rem;color:rgba(255,255,255,.78);line-height:1.4;}

    .ms-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.75rem 1.6rem;height:100%;display:flex;flex-direction:column;text-align:left;transition:transform .25s ease,box-shadow .25s ease;}
    .ms-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .ms-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;margin-bottom:1.1rem;flex-shrink:0;}
    .hi-blue{background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .hi-green{background:linear-gradient(145deg,#00693e,#013d24);}
    .hi-red{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .ms-card h5{font-size:1.05rem;line-height:1.35;margin-bottom:.6rem;color:var(--nlfb-ink);}
    .ms-card p{font-size:.9rem;line-height:1.55;color:var(--nl-muted);margin-bottom:.7rem;}
    .ms-card p:last-child{margin-bottom:0;}
    .ms-card ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .ms-card ul:last-child{margin-bottom:0;}
    .ms-card ul li{position:relative;font-size:.86rem;line-height:1.5;color:var(--nl-muted);padding-left:1.05rem;margin-bottom:.4rem;}
    .ms-card ul li:last-child{margin-bottom:0;}
    .ms-card ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .md-green ul li::before{background:var(--nlfb-green);}
    .md-red ul li::before{background:var(--nlfb-red);}
    .ms-card .ms-sub-heading{font-size:.76rem;font-weight:700;letter-spacing:.02em;text-transform:uppercase;color:var(--nl-faint);margin:.9rem 0 .5rem;}
    .ms-card .ms-sub-heading:first-of-type{margin-top:0;}
    .ms-tag{display:inline-block;font-size:.7rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;padding:.25rem .6rem;border-radius:999px;margin-bottom:.8rem;align-self:flex-start;}
    .ms-tag.tg-blue{background:var(--nl-tint-blue);color:var(--nlfb-blue);}
    .ms-tag.tg-green{background:var(--nl-tint-green-2);color:var(--nlfb-green);}
    .ms-tag.tg-red{background:var(--nl-tint-red);color:var(--nlfb-red);}

    .ms-stat{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem 1.5rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .ms-stat:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .ms-stat .ms-stat-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.4rem;line-height:1;color:var(--nlfb-blue);margin-bottom:.35rem;}
    .ms-stat.st-red .ms-stat-num{color:var(--nlfb-red);}
    .ms-stat.st-green .ms-stat-num{color:var(--nlfb-green);}
    .ms-stat .ms-stat-num small{font-size:1rem;font-weight:600;}
    .ms-stat .ms-stat-label{font-size:.78rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:.75rem;}
    .ms-stat p{font-size:.9rem;color:var(--nl-muted);margin-bottom:0;line-height:1.5;}
    .ms-bar{height:8px;border-radius:999px;background:var(--nl-line);overflow:hidden;margin:.9rem 0 .2rem;}
    .ms-bar span{display:block;height:100%;border-radius:999px;background:linear-gradient(90deg,var(--nlfb-red),#8f0019);}
    .ms-bar.br-blue span{background:linear-gradient(90deg,var(--nlfb-blue),var(--nlfb-blue-dark));}
    .ms-bar.br-green span{background:linear-gradient(90deg,var(--nlfb-green),#013d24);}

    .ms-risk-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.4rem 1.3rem;height:100%;display:flex;gap:1rem;align-items:flex-start;transition:transform .25s ease,box-shadow .25s ease;}
    .ms-risk-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .ms-risk-card .ms-risk-icon{flex-shrink:0;width:44px;height:44px;border-radius:50%;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;}
    .bg-nlfb-cream .ms-risk-card .ms-risk-icon{background:var(--nl-tint-blue);}
    .ms-risk-card p{margin-bottom:0;font-size:.9rem;color:var(--nl-muted);line-height:1.5;}
    .ms-chips{display:flex;flex-wrap:wrap;gap:.45rem;margin-top:.75rem;}
    .ms-chips span{font-size:.78rem;font-weight:600;color:var(--nlfb-blue);background:var(--nl-tint-blue);border-radius:999px;padding:.3rem .75rem;}

    .ms-list{list-style:none;padding-left:0;margin-bottom:0;}
    .ms-list li{position:relative;padding:.6rem 0 .6rem 2rem;border-bottom:1px dashed var(--nl-line);color:var(--nl-text);font-size:.92rem;}
    .ms-list li:last-child{border-bottom:none;}
    .ms-list li > i{position:absolute;left:0;top:.75rem;color:var(--nlfb-blue);}
    .ms-list.hl-red li > i{color:var(--nlfb-red);}
    .ms-list.hl-green li > i{color:var(--nlfb-green);}
    .ms-list .ms-sublist{list-style:none;padding-left:0;margin:.5rem 0 0;display:flex;flex-wrap:wrap;gap:.45rem;}
    .ms-list .ms-sublist li{padding:.28rem .75rem;border:none;border-radius:999px;background:var(--nl-tint-red);color:var(--nlfb-red);font-size:.8rem;font-weight:600;}

    .ms-symptom{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem .75rem;text-align:center;height:100%;transition:transform .2s ease,box-shadow .2s ease;}
    .ms-symptom:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);}
    .ms-symptom i{width:40px;height:40px;border-radius:10px;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;margin:0 auto .6rem;font-size:1.05rem;}
    .ms-symptom.sy-red i{background:var(--nl-tint-red);color:var(--nlfb-red);}
    .ms-symptom span{font-size:.82rem;font-weight:600;color:var(--nlfb-ink);line-height:1.3;display:block;}
    .ms-group-title{font-size:.8rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:1rem;}

    .ms-schedule{display:flex;align-items:center;flex-wrap:wrap;gap:.4rem;margin:.4rem 0 .2rem;}
    .ms-dose{display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;height:64px;border-radius:50%;background:var(--nl-tint-blue);color:var(--nlfb-blue);font-family:"Poppins",sans-serif;font-weight:700;font-size:1.2rem;line-height:1;}
    .ms-dose small{font-family:"Inter",sans-serif;font-size:.62rem;font-weight:600;text-transform:uppercase;margin-top:.2rem;}
    .ms-dose-line{flex:0 0 18px;height:2px;background:#c9d9ea;}

    .ms-level{display:flex;gap:1rem;align-items:center;padding:1rem 1.1rem;border-radius:var(--radius-md);margin-bottom:.75rem;background:var(--nl-surface);border:1px solid var(--nl-line);}
    .ms-level:last-child{margin-bottom:0;}
    .ms-level .ms-level-val{flex:0 0 130px;font-family:"Poppins",sans-serif;font-weight:700;font-size:1rem;}
    .ms-level p{margin-bottom:0;font-size:.9rem;color:var(--nl-text);}
    .lv-green{border-left:5px solid var(--nlfb-green);} .lv-green .ms-level-val{color:var(--nlfb-green);}
    .lv-blue{border-left:5px solid var(--nlfb-blue);} .lv-blue .ms-level-val{color:var(--nlfb-blue);}
    .lv-red{border-left:5px solid var(--nlfb-red);} .lv-red .ms-level-val{color:var(--nlfb-red);}

    .ms-term{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;}
    .ms-term h5{display:flex;align-items:center;gap:.6rem;font-size:1.05rem;margin-bottom:.7rem;color:var(--nlfb-ink);}
    .ms-term h5 i{color:var(--nlfb-blue);}
    .ms-term p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;}
    .ms-term p:last-child{margin-bottom:0;}
    .ms-ig{display:flex;gap:.75rem;align-items:flex-start;padding:.7rem .9rem;border-radius:var(--radius-md);background:var(--nlfb-cream);margin-bottom:.6rem;font-size:.88rem;color:var(--nl-text);}
    .ms-ig:last-child{margin-bottom:0;}
    .ms-ig strong{flex:0 0 auto;color:var(--nlfb-blue);}

    .ms-marker{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .ms-marker:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .ms-marker .ms-marker-code{display:inline-block;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.25rem;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);padding:.3rem .9rem;border-radius:10px;margin-bottom:.4rem;}
    .ms-marker.mk-green .ms-marker-code{background:linear-gradient(145deg,#00693e,#013d24);}
    .ms-marker.mk-red .ms-marker-code{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .ms-marker h6{font-size:.85rem;color:var(--nl-faint);font-weight:600;margin-bottom:.9rem;}
    .ms-marker p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;margin-bottom:.7rem;}
    .ms-marker p:last-child{margin-bottom:0;}
    .ms-marker ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .ms-marker ul:last-child{margin-bottom:0;}
    .ms-marker ul li{position:relative;font-size:.88rem;line-height:1.5;color:var(--nl-text);padding-left:1.05rem;margin-bottom:.35rem;}
    .ms-marker ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .ms-marker.mk-green ul li::before{background:var(--nlfb-green);}
    .ms-marker.mk-red ul li::before{background:var(--nlfb-red);}

    .ms-summary-panel{background:linear-gradient(160deg,var(--nlfb-blue-dark) 0%,#06264a 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;}
    .ms-summary-panel ul{list-style:none;padding-left:0;margin-bottom:0;}
    .ms-summary-panel li{position:relative;padding:.55rem 0 .55rem 2rem;font-size:.95rem;color:rgba(255,255,255,.92);border-bottom:1px solid rgba(255,255,255,.12);}
    .ms-summary-panel li:last-child{border-bottom:none;}
    .ms-summary-panel li i{position:absolute;left:0;top:.75rem;color:#5fd3a3;}
    .ms-summary-panel p{color:rgba(255,255,255,.85);}

    @media (max-width:575.98px){
        .ms-level{flex-direction:column;align-items:flex-start;gap:.3rem;}
        .ms-level .ms-level-val{flex:none;}
        .ms-dose{width:54px;height:54px;font-size:1rem;}
    }
    .ms-genotypes{display:flex;flex-wrap:wrap;gap:.45rem;margin-bottom:.9rem;}
    .ms-genotypes span{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;color:var(--nlfb-blue);background:var(--nl-tint-blue);}
    .ms-old{opacity:.95;}
    .ms-new{border:2px solid var(--nlfb-green);}
    .ms-cure-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.2rem;line-height:1;color:var(--nlfb-green);}
    .ms-regimen{display:flex;align-items:center;flex-wrap:wrap;gap:.75rem;margin-bottom:1rem;}
    .ms-regimen > div{flex:1 1 140px;background:var(--nl-tint-green);border-radius:var(--radius-md);padding:.8rem 1rem;text-align:center;}
    .ms-regimen strong{display:block;color:var(--nlfb-ink);font-size:.98rem;}
    .ms-regimen span{font-size:.82rem;font-weight:600;color:var(--nlfb-green);}
    .ms-regimen > i{color:var(--nlfb-green);}
    .ms-mission{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem 1.5rem;height:100%;position:relative;overflow:hidden;transition:transform .25s ease,box-shadow .25s ease;}
    .ms-mission:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .ms-mission .ms-no{position:absolute;top:.6rem;right:1rem;font-family:"Poppins",sans-serif;font-weight:700;font-size:3rem;line-height:1;color:var(--nl-tint-blue-2);}
    .ms-mission p{position:relative;margin:0;font-size:.95rem;line-height:1.6;color:var(--nl-text);}
    .ms-vision{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;box-shadow:0 18px 40px rgba(6,38,74,.22);position:relative;overflow:hidden;}
    .ms-vision::after{content:"";position:absolute;left:0;right:0;bottom:0;height:5px;background:linear-gradient(90deg,var(--nlfb-green) 0 50%,var(--nlfb-red) 50% 100%);}
    .ms-vision .ms-vision-icon{width:56px;height:56px;border-radius:16px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1rem;}
    .ms-vision h3{color:#fff;font-size:1.35rem;margin-bottom:.75rem;}
    .ms-vision p{color:rgba(255,255,255,.9);font-size:1.05rem;line-height:1.7;margin:0;}

    .ms-phase-nav{display:flex;flex-wrap:wrap;justify-content:center;gap:.6rem;margin-bottom:2.5rem;}
    .ms-phase-nav a{display:flex;align-items:center;gap:.5rem;font-weight:700;font-size:.88rem;color:var(--nlfb-heading);background:var(--nl-surface);border:1px solid var(--nl-line-strong);border-radius:999px;padding:.5rem 1.1rem;transition:background .2s ease,color .2s ease;}
    .ms-phase-nav a span{width:24px;height:24px;border-radius:50%;background:var(--nlfb-blue);color:#fff;display:flex;align-items:center;justify-content:center;font-size:.75rem;}
    .ms-phase-nav a:hover{background:var(--nlfb-blue);color:#fff;}
    .ms-phase-nav a:hover span{background:var(--nl-surface);color:var(--nlfb-blue);}

    .ms-phase{position:relative;padding-left:4.2rem;margin-bottom:2.5rem;scroll-margin-top:110px;}
    .ms-phase:last-child{margin-bottom:0;}
    .ms-phase::before{content:"";position:absolute;left:1.35rem;top:3rem;bottom:-2.5rem;width:2px;background:#c9d9ea;}
    .ms-phase:last-child::before{display:none;}
    .ms-phase .ms-phase-badge{position:absolute;left:0;top:0;width:2.9rem;height:2.9rem;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.1rem;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);box-shadow:0 0 0 5px var(--nl-tint-blue);}
    .ms-phase.ph-green .ms-phase-badge{background:linear-gradient(145deg,#00693e,#013d24);box-shadow:0 0 0 5px var(--nl-tint-green-2);}
    .ms-phase.ph-red .ms-phase-badge{background:linear-gradient(145deg,#e4002b,#8f0019);box-shadow:0 0 0 5px var(--nl-tint-red);}
    .ms-phase h3{font-size:1.3rem;margin-bottom:.8rem;color:var(--nlfb-ink);padding-top:.45rem;}

    .ms-service{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.2rem 1.2rem;height:100%;display:flex;gap:.9rem;align-items:flex-start;transition:transform .2s ease,box-shadow .2s ease;}
    .ms-service:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);}
    .ms-service > i{flex-shrink:0;width:42px;height:42px;border-radius:12px;background:var(--nl-tint-blue);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;font-size:1.05rem;}
    .ms-service h6{font-size:.95rem;margin-bottom:.25rem;color:var(--nlfb-ink);font-weight:700;}
    .ms-service p{margin:0;font-size:.86rem;line-height:1.5;color:var(--nl-muted);}

    @media (max-width:575.98px){
        .ms-phase{padding-left:3.4rem;}
        .ms-phase .ms-phase-badge{width:2.4rem;height:2.4rem;font-size:.95rem;}
        .ms-phase::before{left:1.15rem;}
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

<!-- ============ MISSION AND ACTIVITIES ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="ms-intro">
                    <div class="eyebrow">Who We Are</div>
                    <h2 class="section-title mt-2 mb-3">Mission and Activities</h2>
                    <p class="mb-0">National Liver Foundation of Bangladesh is a not-for-profit Non-Government Organisation (NGO) established in April, 1999 in Dhaka, Bangladesh. This Organisation is the first of its kind in Bangladesh which is dedicated to Prevention, Treatment, Education and Research on liver diseases with special emphasis on viral hepatitis.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ms-fact-panel">
                    <h4>At a Glance</h4>
                    <div class="ms-fact-row">
                        <i class="fa-solid fa-calendar-check"></i>
                        <div><h6>Established</h6><p>April, 1999 in Dhaka, Bangladesh</p></div>
                    </div>
                    <div class="ms-fact-row">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                        <div><h6>Not-for-profit NGO</h6><p>Non-Government Organisation</p></div>
                    </div>
                    <div class="ms-fact-row">
                        <i class="fa-solid fa-award"></i>
                        <div><h6>First of its Kind</h6><p>In Bangladesh</p></div>
                    </div>
                    <div class="ms-fact-row">
                        <i class="fa-solid fa-virus"></i>
                        <div><h6>Special Emphasis</h6><p>Viral hepatitis</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ MISSION STATEMENT ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">What Drives Us</div>
            <h2 class="section-title mt-2">National Liver Foundation of Bangladesh Mission statement</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="ms-mission">
                    <span class="ms-no">01</span>
                    <div class="ms-icon hi-red"><i class="fa-solid fa-bullhorn"></i></div>
                    <p>To raise mass public awareness on prevention of liver diseases, especially viral hepatitis (B &amp; C).</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ms-mission">
                    <span class="ms-no">02</span>
                    <div class="ms-icon hi-green"><i class="fa-solid fa-hospital"></i></div>
                    <p>To create facilities for prevention and treatment of liver diseases with minimum cost.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ms-mission">
                    <span class="ms-no">03</span>
                    <div class="ms-icon hi-blue"><i class="fa-solid fa-landmark"></i></div>
                    <p>To make advocacy and coordination with the Government, regarding the issues of viral hepatitis and liver diseases in Bangladesh</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ms-mission">
                    <span class="ms-no">04</span>
                    <div class="ms-icon hi-blue"><i class="fa-solid fa-building-shield"></i></div>
                    <p>To establish a center of excellence for Prevention, Treatment, Education and Research on Liver diseases in Bangladesh</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ VISION STATEMENT ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="ms-vision text-center">
                    <div class="ms-vision-icon mx-auto"><i class="fa-solid fa-eye"></i></div>
                    <h3>National Liver Foundation of Bangladesh Vision statement</h3>
                    <p>To minimize the incidence of viral hepatitis (B &amp; C) to a negligible level and ensure the treatment facilities of liver diseases for all.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ PLANNED PHASES ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-4">
            <div class="eyebrow">Our Roadmap</div>
            <h2 class="section-title mt-2">Planned phases of operation of the LFB</h2>
        </div>
        <div class="ms-phase-nav">
            <a href="#phase-1"><span>1</span> First phase</a>
            <a href="#phase-2"><span>2</span> Second phase</a>
            <a href="#phase-3"><span>3</span> Third phase</a>
            <a href="#phase-4"><span>4</span> Fourth phase</a>
        </div>

        <!-- First phase -->
        <div class="ms-phase ph-green" id="phase-1">
            <div class="ms-phase-badge">1</div>
            <h3>First phase:</h3>
            <div class="ms-good mb-4" style="background:var(--nl-surface);">
                <p class="mb-0">The main objective of the first phase comprises the exhaustive prevention of liver diseases, development of public awareness and counseling of liver disease patients in Bangladesh.</p>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-user-doctor"></i>
                        <div><h6>Liver clinic service:</h6><p>Examination of the liver disease patients by specialists &amp; their necessary management</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-vial"></i>
                        <div><h6>Investigagation facilities;</h6><p>All the investigations will be done with minimum cost</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-envelope-open-text"></i>
                        <div><h6>e-liver service:</h6><p>Replies to queries from liver disease patients and counseling along with the transmission of relevant leaflets about liver diseases via e-mail.</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-globe"></i>
                        <div><h6>Website liver service:</h6><p>Communication and exchange of information about liver diseases between Bangladesh and the outside world through website.</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-envelope"></i>
                        <div><h6>Postal service:</h6><p>Counseling liver patients and rendering proper guidance through letters.</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-syringe"></i>
                        <div><h6>Screening and vaccination service:</h6><p>Screening of mass population for the prevalence of liver diseases and vaccination program.</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-tower-broadcast"></i>
                        <div><h6>Mass media service:</h6><p>Wide range of discussion on awareness, prevention and various aspects of liver diseases through the use of various public domain information exchange media.</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-file-lines"></i>
                        <div><h6>Information service:</h6><p>Issuance of free leaflets about liver diseases among the mass Population.</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <div><h6>Awareness Programmes:</h6><p>Seminers and discussions among doctors, nurses and paramedics about the guideline of prevention, investigation and treatment of liver diseases in Bangladesh .</p></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ms-service">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <div><h6>Decentralization</h6><p>Decentralization of awareness programmes in divisional head quarters, district, thana levels and in remote areas of the country.</p></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second phase -->
        <div class="ms-phase" id="phase-2">
            <div class="ms-phase-badge">2</div>
            <h3>Second phase:</h3>
            <ul class="ms-list" style="background:var(--nl-surface);border-radius:var(--radius-md);padding:.4rem 1.2rem;">
                <li><i class="fa-solid fa-circle-check"></i> Extensive implementation of the work program of the first phase.</li>
                <li><i class="fa-solid fa-circle-check"></i> Extending diagnostic facilities of the liver diseases</li>
            </ul>
        </div>

        <!-- Third phase -->
        <div class="ms-phase" id="phase-3">
            <div class="ms-phase-badge">3</div>
            <h3>Third phase:</h3>
            <ul class="ms-list" style="background:var(--nl-surface);border-radius:var(--radius-md);padding:.4rem 1.2rem;">
                <li><i class="fa-solid fa-circle-check"></i> Extensive implementation of the work program of the first and second phases.</li>
                <li><i class="fa-solid fa-hospital"></i> Setting up a centre (Hospital) for the treatment of liver diseases based on medical, surgical and interventional approach i.e. a centre for prevention, diagnostic and therapeutic services.</li>
            </ul>
        </div>

        <!-- Fourth phase -->
        <div class="ms-phase ph-red" id="phase-4">
            <div class="ms-phase-badge">4</div>
            <h3>Fourth phase:</h3>
            <div class="ms-card md-red" style="height:auto;">
                <div class="d-flex gap-3 align-items-start">
                    <div class="ms-icon hi-red mb-0"><i class="fa-solid fa-building-circle-check"></i></div>
                    <p class="mb-0" style="font-size:.98rem;color:var(--nl-text);">Establishing a modernized well-equipped centre with all facilities for the prevention, treatment , education and research on liver diseases in Bangladesh</p>
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
                    <h3 class="mb-2">Be Part of Our Mission</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Help us minimize viral hepatitis in Bangladesh and ensure treatment facilities of liver diseases for all.</p>
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

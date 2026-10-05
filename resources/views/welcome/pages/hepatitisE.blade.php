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
    .hev-intro p{font-size:1.02rem;color:var(--nl-text);}
    .hev-note{background:var(--nlfb-cream);border-left:4px solid var(--nlfb-blue);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .bg-white .hev-note{background:var(--nl-tint-blue-2);}
    .hev-good{background:var(--nl-tint-green);border-left:4px solid var(--nlfb-green);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .hev-warn{background:var(--nl-tint-red-2);border-left:4px solid var(--nlfb-red);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .hev-note p,.hev-good p,.hev-warn p{color:var(--nl-text);}

    .hev-fact-panel{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2rem;color:#fff;box-shadow:0 18px 40px rgba(6,38,74,.22);}
    .hev-fact-panel h4{font-size:.78rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:rgba(255,255,255,.75);margin-bottom:1.25rem;}
    .hev-fact-row{display:flex;gap:.9rem;align-items:center;margin-bottom:1rem;}
    .hev-fact-row:last-child{margin-bottom:0;}
    .hev-fact-row i{width:34px;height:34px;flex-shrink:0;border-radius:10px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;}
    .hev-fact-row h6{margin-bottom:0;font-size:.92rem;color:#fff;}
    .hev-fact-row p{margin-bottom:0;font-size:.8rem;color:rgba(255,255,255,.78);line-height:1.4;}

    .hev-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.75rem 1.6rem;height:100%;display:flex;flex-direction:column;text-align:left;transition:transform .25s ease,box-shadow .25s ease;}
    .hev-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hev-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;margin-bottom:1.1rem;flex-shrink:0;}
    .hi-blue{background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .hi-green{background:linear-gradient(145deg,#00693e,#013d24);}
    .hi-red{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .hev-card h5{font-size:1.05rem;line-height:1.35;margin-bottom:.6rem;color:var(--nlfb-ink);}
    .hev-card p{font-size:.9rem;line-height:1.55;color:var(--nl-muted);margin-bottom:.7rem;}
    .hev-card p:last-child{margin-bottom:0;}
    .hev-card ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .hev-card ul:last-child{margin-bottom:0;}
    .hev-card ul li{position:relative;font-size:.86rem;line-height:1.5;color:var(--nl-muted);padding-left:1.05rem;margin-bottom:.4rem;}
    .hev-card ul li:last-child{margin-bottom:0;}
    .hev-card ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .ed-green ul li::before{background:var(--nlfb-green);}
    .ed-red ul li::before{background:var(--nlfb-red);}
    .hev-card .hev-sub-heading{font-size:.76rem;font-weight:700;letter-spacing:.02em;text-transform:uppercase;color:var(--nl-faint);margin:.9rem 0 .5rem;}
    .hev-card .hev-sub-heading:first-of-type{margin-top:0;}
    .hev-tag{display:inline-block;font-size:.7rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;padding:.25rem .6rem;border-radius:999px;margin-bottom:.8rem;align-self:flex-start;}
    .hev-tag.tg-blue{background:var(--nl-tint-blue);color:var(--nlfb-blue);}
    .hev-tag.tg-green{background:var(--nl-tint-green-2);color:var(--nlfb-green);}
    .hev-tag.tg-red{background:var(--nl-tint-red);color:var(--nlfb-red);}

    .hev-stat{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem 1.5rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .hev-stat:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hev-stat .hev-stat-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.4rem;line-height:1;color:var(--nlfb-blue);margin-bottom:.35rem;}
    .hev-stat.st-red .hev-stat-num{color:var(--nlfb-red);}
    .hev-stat.st-green .hev-stat-num{color:var(--nlfb-green);}
    .hev-stat .hev-stat-num small{font-size:1rem;font-weight:600;}
    .hev-stat .hev-stat-label{font-size:.78rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:.75rem;}
    .hev-stat p{font-size:.9rem;color:var(--nl-muted);margin-bottom:0;line-height:1.5;}
    .hev-bar{height:8px;border-radius:999px;background:var(--nl-line);overflow:hidden;margin:.9rem 0 .2rem;}
    .hev-bar span{display:block;height:100%;border-radius:999px;background:linear-gradient(90deg,var(--nlfb-red),#8f0019);}
    .hev-bar.br-blue span{background:linear-gradient(90deg,var(--nlfb-blue),var(--nlfb-blue-dark));}
    .hev-bar.br-green span{background:linear-gradient(90deg,var(--nlfb-green),#013d24);}

    .hev-risk-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.4rem 1.3rem;height:100%;display:flex;gap:1rem;align-items:flex-start;transition:transform .25s ease,box-shadow .25s ease;}
    .hev-risk-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hev-risk-card .hev-risk-icon{flex-shrink:0;width:44px;height:44px;border-radius:50%;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;}
    .bg-nlfb-cream .hev-risk-card .hev-risk-icon{background:var(--nl-tint-blue);}
    .hev-risk-card p{margin-bottom:0;font-size:.9rem;color:var(--nl-muted);line-height:1.5;}
    .hev-chips{display:flex;flex-wrap:wrap;gap:.45rem;margin-top:.75rem;}
    .hev-chips span{font-size:.78rem;font-weight:600;color:var(--nlfb-blue);background:var(--nl-tint-blue);border-radius:999px;padding:.3rem .75rem;}

    .hev-list{list-style:none;padding-left:0;margin-bottom:0;}
    .hev-list li{position:relative;padding:.6rem 0 .6rem 2rem;border-bottom:1px dashed var(--nl-line);color:var(--nl-text);font-size:.92rem;}
    .hev-list li:last-child{border-bottom:none;}
    .hev-list li > i{position:absolute;left:0;top:.75rem;color:var(--nlfb-blue);}
    .hev-list.hl-red li > i{color:var(--nlfb-red);}
    .hev-list.hl-green li > i{color:var(--nlfb-green);}
    .hev-list .hev-sublist{list-style:none;padding-left:0;margin:.5rem 0 0;display:flex;flex-wrap:wrap;gap:.45rem;}
    .hev-list .hev-sublist li{padding:.28rem .75rem;border:none;border-radius:999px;background:var(--nl-tint-red);color:var(--nlfb-red);font-size:.8rem;font-weight:600;}

    .hev-symptom{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem .75rem;text-align:center;height:100%;transition:transform .2s ease,box-shadow .2s ease;}
    .hev-symptom:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);}
    .hev-symptom i{width:40px;height:40px;border-radius:10px;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;margin:0 auto .6rem;font-size:1.05rem;}
    .hev-symptom.sy-red i{background:var(--nl-tint-red);color:var(--nlfb-red);}
    .hev-symptom span{font-size:.82rem;font-weight:600;color:var(--nlfb-ink);line-height:1.3;display:block;}
    .hev-group-title{font-size:.8rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:1rem;}

    .hev-schedule{display:flex;align-items:center;flex-wrap:wrap;gap:.4rem;margin:.4rem 0 .2rem;}
    .hev-dose{display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;height:64px;border-radius:50%;background:var(--nl-tint-blue);color:var(--nlfb-blue);font-family:"Poppins",sans-serif;font-weight:700;font-size:1.2rem;line-height:1;}
    .hev-dose small{font-family:"Inter",sans-serif;font-size:.62rem;font-weight:600;text-transform:uppercase;margin-top:.2rem;}
    .hev-dose-line{flex:0 0 18px;height:2px;background:#c9d9ea;}

    .hev-level{display:flex;gap:1rem;align-items:center;padding:1rem 1.1rem;border-radius:var(--radius-md);margin-bottom:.75rem;background:var(--nl-surface);border:1px solid var(--nl-line);}
    .hev-level:last-child{margin-bottom:0;}
    .hev-level .hev-level-val{flex:0 0 130px;font-family:"Poppins",sans-serif;font-weight:700;font-size:1rem;}
    .hev-level p{margin-bottom:0;font-size:.9rem;color:var(--nl-text);}
    .lv-green{border-left:5px solid var(--nlfb-green);} .lv-green .hev-level-val{color:var(--nlfb-green);}
    .lv-blue{border-left:5px solid var(--nlfb-blue);} .lv-blue .hev-level-val{color:var(--nlfb-blue);}
    .lv-red{border-left:5px solid var(--nlfb-red);} .lv-red .hev-level-val{color:var(--nlfb-red);}

    .hev-term{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;}
    .hev-term h5{display:flex;align-items:center;gap:.6rem;font-size:1.05rem;margin-bottom:.7rem;color:var(--nlfb-ink);}
    .hev-term h5 i{color:var(--nlfb-blue);}
    .hev-term p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;}
    .hev-term p:last-child{margin-bottom:0;}
    .hev-ig{display:flex;gap:.75rem;align-items:flex-start;padding:.7rem .9rem;border-radius:var(--radius-md);background:var(--nlfb-cream);margin-bottom:.6rem;font-size:.88rem;color:var(--nl-text);}
    .hev-ig:last-child{margin-bottom:0;}
    .hev-ig strong{flex:0 0 auto;color:var(--nlfb-blue);}

    .hev-marker{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .hev-marker:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hev-marker .hev-marker-code{display:inline-block;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.25rem;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);padding:.3rem .9rem;border-radius:10px;margin-bottom:.4rem;}
    .hev-marker.mk-green .hev-marker-code{background:linear-gradient(145deg,#00693e,#013d24);}
    .hev-marker.mk-red .hev-marker-code{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .hev-marker h6{font-size:.85rem;color:var(--nl-faint);font-weight:600;margin-bottom:.9rem;}
    .hev-marker p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;margin-bottom:.7rem;}
    .hev-marker p:last-child{margin-bottom:0;}
    .hev-marker ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .hev-marker ul:last-child{margin-bottom:0;}
    .hev-marker ul li{position:relative;font-size:.88rem;line-height:1.5;color:var(--nl-text);padding-left:1.05rem;margin-bottom:.35rem;}
    .hev-marker ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .hev-marker.mk-green ul li::before{background:var(--nlfb-green);}
    .hev-marker.mk-red ul li::before{background:var(--nlfb-red);}

    .hev-summary-panel{background:linear-gradient(160deg,var(--nlfb-blue-dark) 0%,#06264a 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;}
    .hev-summary-panel ul{list-style:none;padding-left:0;margin-bottom:0;}
    .hev-summary-panel li{position:relative;padding:.55rem 0 .55rem 2rem;font-size:.95rem;color:rgba(255,255,255,.92);border-bottom:1px solid rgba(255,255,255,.12);}
    .hev-summary-panel li:last-child{border-bottom:none;}
    .hev-summary-panel li i{position:absolute;left:0;top:.75rem;color:#5fd3a3;}
    .hev-summary-panel p{color:rgba(255,255,255,.85);}

    @media (max-width:575.98px){
        .hev-level{flex-direction:column;align-items:flex-start;gap:.3rem;}
        .hev-level .hev-level-val{flex:none;}
        .hev-dose{width:54px;height:54px;font-size:1rem;}
    }
    .hev-genotypes{display:flex;flex-wrap:wrap;gap:.45rem;margin-bottom:.9rem;}
    .hev-genotypes span{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;color:var(--nlfb-blue);background:var(--nl-tint-blue);}
    .hev-old{opacity:.95;}
    .hev-new{border:2px solid var(--nlfb-green);}
    .hev-cure-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.2rem;line-height:1;color:var(--nlfb-green);}
    .hev-regimen{display:flex;align-items:center;flex-wrap:wrap;gap:.75rem;margin-bottom:1rem;}
    .hev-regimen > div{flex:1 1 140px;background:var(--nl-tint-green);border-radius:var(--radius-md);padding:.8rem 1rem;text-align:center;}
    .hev-regimen strong{display:block;color:var(--nlfb-ink);font-size:.98rem;}
    .hev-regimen span{font-size:.82rem;font-weight:600;color:var(--nlfb-green);}
    .hev-regimen > i{color:var(--nlfb-green);}
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

<!-- ============ WHAT IS HEPATITIS E ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="hev-intro">
                    <div class="eyebrow">Understanding the Infection</div>
                    <h2 class="section-title mt-2 mb-3">What is Hepatitis E?</h2>
                    <p class="mb-0">Hepatitis E is an inflammatory liver disease caused by infection with the Hepatitis E virus (HEV). The virus is primarily transmitted through the fecal&ndash;oral route, usually by consuming food or water contaminated with the feces of an infected person.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hev-fact-panel">
                    <h4>At a Glance</h4>
                    <div class="hev-fact-row">
                        <i class="fa-solid fa-virus"></i>
                        <div><h6>Cause</h6><p>Infection with the Hepatitis E virus (HEV)</p></div>
                    </div>
                    <div class="hev-fact-row">
                        <i class="fa-solid fa-glass-water"></i>
                        <div><h6>Route of Spread</h6><p>Fecal&ndash;oral, via contaminated food or water</p></div>
                    </div>
                    <div class="hev-fact-row">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div><h6>Symptom Onset</h6><p>Usually 2&ndash;10 weeks after infection</p></div>
                    </div>
                    <div class="hev-fact-row">
                        <i class="fa-solid fa-person-pregnant"></i>
                        <div><h6>Highest Danger</h6><p>During pregnancy, especially in the third trimester</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ HOW IT SPREADS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Modes of Transmission</div>
            <h2 class="section-title mt-2">How Hepatitis E Spreads</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="hev-risk-card">
                    <div class="hev-risk-icon"><i class="fa-solid fa-glass-water"></i></div>
                    <p>Consumption of contaminated food and drinking water.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hev-risk-card">
                    <div class="hev-risk-icon"><i class="fa-solid fa-hands-bubbles"></i></div>
                    <p>Poor sanitation, inadequate hygiene, and improper handwashing.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hev-risk-card">
                    <div class="hev-risk-icon"><i class="fa-solid fa-bowl-food"></i></div>
                    <p>Eating unhygienically prepared street food or drinking fresh sugarcane juice from unsafe sources.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hev-risk-card">
                    <div class="hev-risk-icon"><i class="fa-solid fa-drumstick-bite"></i></div>
                    <p>Eating undercooked meat.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hev-risk-card">
                    <div class="hev-risk-icon"><i class="fa-solid fa-droplet"></i></div>
                    <p>Through transfusion of infected blood or blood products (rare).</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hev-risk-card">
                    <div class="hev-risk-icon"><i class="fa-solid fa-baby"></i></div>
                    <p>From an infected pregnant mother to her newborn (vertical transmission).</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ GLOBAL BURDEN ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">The Bigger Picture</div>
            <h2 class="section-title mt-2">Global Burden of Hepatitis E</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="hev-stat">
                    <div class="hev-stat-label"><i class="fa-solid fa-earth-asia me-1"></i> New Infections / Year</div>
                    <div class="hev-stat-num">20 <small>million</small></div>
                    <p class="mt-2">Approximately 20 million people are newly infected with Hepatitis E each year worldwide.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hev-stat">
                    <div class="hev-stat-label"><i class="fa-solid fa-head-side-cough me-1"></i> Develop Symptoms</div>
                    <div class="hev-stat-num">3.3 <small>million</small></div>
                    <p class="mt-2">Around 3.3 million people develop symptoms.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hev-stat st-red">
                    <div class="hev-stat-label"><i class="fa-solid fa-heart-crack me-1"></i> Stillbirths</div>
                    <div class="hev-stat-num">2,700</div>
                    <p class="mt-2">Around 2,700 stillbirths are associated with Hepatitis E infection during pregnancy.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hev-stat st-red">
                    <div class="hev-stat-label"><i class="fa-solid fa-chart-pie me-1"></i> Viral Hepatitis Deaths</div>
                    <div class="hev-stat-num">~3.3%</div>
                    <p class="mt-2">Hepatitis E accounts for approximately 3.3% of deaths due to viral hepatitis worldwide.</p>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-7">
                <div class="hev-card">
                    <span class="hev-tag tg-red">WHO South-East Asia Region (SEAR)</span>
                    <p>The disease is most common in the WHO South-East Asia Region (SEAR).</p>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div class="hev-stat-num" style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1.8rem;color:var(--nlfb-blue);">6.5M</div>
                            <p class="mb-0" style="font-size:.84rem;">Infections occur annually in this region</p>
                        </div>
                        <div class="col-sm-4">
                            <div class="hev-stat-num" style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1.8rem;color:var(--nlfb-red);">160,000</div>
                            <p class="mb-0" style="font-size:.84rem;">Deaths each year (approximately)</p>
                        </div>
                        <div class="col-sm-4">
                            <div class="hev-stat-num" style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1.8rem;color:var(--nlfb-red);">~50%</div>
                            <p class="mb-0" style="font-size:.84rem;">Of all global Hepatitis E cases occur in South-East Asia</p>
                        </div>
                    </div>
                    <div class="hev-bar mt-3"><span style="width:50%"></span></div>
                    <p class="mt-3">An estimated 6.5 million infections occur annually in this region, resulting in approximately 160,000 deaths each year. Nearly 50% of all global Hepatitis E cases occur in South-East Asia.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hev-note d-flex gap-3 align-items-start h-100">
                    <i class="fa-solid fa-location-dot text-nlfb-blue mt-1"></i>
                    <p class="mb-0">The exact prevalence of Hepatitis E in Bangladesh remains unknown.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ WHO IS AT RISK ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="eyebrow">Vulnerable Groups</div>
                <h2 class="section-title mt-2 mb-3">Who Is at Risk?</h2>
                <p class="text-secondary mb-0">Hepatitis E most commonly affects adults between 15 and 40 years of age, while children are less frequently affected.</p>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <div class="hev-stat st-red">
                            <div class="hev-stat-label"><i class="fa-solid fa-person me-1"></i> Adults</div>
                            <div class="hev-stat-num">15&ndash;40 <small>years</small></div>
                            <p class="mt-2">Most commonly affected</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="hev-stat st-green">
                            <div class="hev-stat-label"><i class="fa-solid fa-child me-1"></i> Children</div>
                            <div class="hev-stat-num"><small>Less often</small></div>
                            <p class="mt-2">Children are less frequently affected</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ SYMPTOMS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Signs &amp; Symptoms</div>
            <h2 class="section-title mt-2">Symptoms</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Symptoms usually appear 2&ndash;10 weeks after infection and may include:</p>
        </div>
        <div class="row g-3 justify-content-center">
            <div class="col-6 col-md-3 col-lg"><div class="hev-symptom"><i class="fa-solid fa-temperature-high"></i><span>Mild fever</span></div></div>
            <div class="col-6 col-md-3 col-lg"><div class="hev-symptom"><i class="fa-solid fa-utensils"></i><span>Loss of appetite</span></div></div>
            <div class="col-6 col-md-3 col-lg"><div class="hev-symptom"><i class="fa-solid fa-battery-quarter"></i><span>Weakness and fatigue</span></div></div>
            <div class="col-6 col-md-3 col-lg"><div class="hev-symptom"><i class="fa-solid fa-kit-medical"></i><span>Abdominal pain</span></div></div>
            <div class="col-6 col-md-4 col-lg"><div class="hev-symptom"><i class="fa-solid fa-face-dizzy"></i><span>Nausea and vomiting</span></div></div>
            <div class="col-6 col-md-4 col-lg"><div class="hev-symptom sy-red"><i class="fa-solid fa-eye"></i><span>Jaundice (yellowing of the eyes and skin)</span></div></div>
            <div class="col-12 col-md-4 col-lg"><div class="hev-symptom sy-red"><i class="fa-solid fa-droplet"></i><span>Dark-colored urine</span></div></div>
        </div>
        <div class="hev-note d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-circle-info text-nlfb-blue mt-1"></i>
            <p class="mb-0">Some infected individuals may have very mild symptoms or remain completely asymptomatic.</p>
        </div>
    </div>
</section>

<!-- ============ DIAGNOSIS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Confirming the Diagnosis</div>
            <h2 class="section-title mt-2">Diagnosis</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Your doctor may recommend the following investigations:</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hev-card">
                    <div class="hev-icon hi-blue"><i class="fa-solid fa-vial"></i></div>
                    <h5>Liver Function Tests (LFTs)</h5>
                    <ul>
                        <li>Bilirubin</li>
                        <li>AST (Aspartate Aminotransferase)</li>
                        <li>ALT (Alanine Aminotransferase)</li>
                        <li>Alkaline Phosphatase (ALP)</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hev-card ed-green">
                    <div class="hev-icon hi-green"><i class="fa-solid fa-microscope"></i></div>
                    <h5>Other Investigations</h5>
                    <ul>
                        <li>Anti-Hepatitis E Virus IgM (Anti-HEV IgM)</li>
                        <li>Complete Blood Count (CBC)</li>
                        <li>Abdominal Ultrasound to assess liver enlargement</li>
                        <li>Coagulation Profile: PT, APTT, and INR</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ TREATMENT ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-start g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Supportive Care</div>
                <h2 class="section-title mt-2 mb-3">Treatment</h2>
                <p class="text-secondary">There is no specific antiviral treatment for Hepatitis E.</p>
                <p class="text-secondary mb-2">Management mainly includes:</p>
                <ul class="hev-list hl-green mb-3">
                    <li><i class="fa-solid fa-circle-check"></i> Adequate rest</li>
                    <li><i class="fa-solid fa-circle-check"></i> Symptomatic treatment</li>
                    <li><i class="fa-solid fa-circle-check"></i> Maintaining hydration and proper nutrition</li>
                </ul>
                <p class="text-secondary mb-0">Most patients recover within 1&ndash;3 weeks, although recovery may take up to 12 weeks in some cases.</p>
            </div>
            <div class="col-lg-6">
                <div class="hev-warn d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
                    <p class="mb-0"><strong>Important:</strong> Avoid unnecessary medications during acute Hepatitis E infection, particularly paracetamol (acetaminophen), unless specifically prescribed by a physician, as inappropriate use may worsen liver function.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ PREGNANCY ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Mother &amp; Baby</div>
            <h2 class="section-title mt-2">Hepatitis E During Pregnancy</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:760px;margin-inline:auto;">Hepatitis E can be particularly dangerous during pregnancy, especially in the third trimester. Possible complications include:</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="hev-stat st-red">
                    <div class="hev-stat-label"><i class="fa-solid fa-person-pregnant me-1"></i> Maternal Mortality</div>
                    <div class="hev-stat-num">20&ndash;25%</div>
                    <div class="hev-bar"><span style="width:25%"></span></div>
                    <p class="mt-2">Maternal mortality of up to 20&ndash;25% in severe cases.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hev-stat st-red">
                    <div class="hev-stat-label"><i class="fa-solid fa-baby me-1"></i> Adverse Outcomes</div>
                    <div class="hev-stat-num">~56%</div>
                    <div class="hev-bar"><span style="width:56%"></span></div>
                    <p class="mt-2">Approximately 56% of infected pregnancies may result in miscarriage, low birth weight, stillbirth, or other adverse pregnancy outcomes.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hev-stat st-red">
                    <div class="hev-stat-label"><i class="fa-solid fa-heart-pulse me-1"></i> Acute Liver Failure</div>
                    <div class="hev-stat-num">15&ndash;22%</div>
                    <div class="hev-bar"><span style="width:22%"></span></div>
                    <p class="mt-2">Among patients who develop acute liver failure, the mortality rate is approximately 15&ndash;22%.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hev-stat">
                    <div class="hev-stat-label"><i class="fa-solid fa-virus-covid me-1"></i> Co-infection</div>
                    <div class="hev-stat-num"><small>HAV / HBV</small></div>
                    <p class="mt-2">Co-infection with other hepatitis viruses, such as Hepatitis A or Hepatitis B, may further increase disease severity.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ PREVENTION ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Protect Yourself</div>
            <h2 class="section-title mt-2">Prevention</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:760px;margin-inline:auto;">The most effective way to prevent Hepatitis E is by maintaining good personal hygiene and ensuring food and water safety.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hev-card ed-green">
                    <div class="hev-icon hi-green"><i class="fa-solid fa-hands-bubbles"></i></div>
                    <h5>General Prevention</h5>
                    <ul>
                        <li>Practice good personal hygiene.</li>
                        <li>Wash your hands thoroughly before eating and after using the toilet.</li>
                        <li>Drink safe, clean drinking water.</li>
                        <li>Ensure proper sanitation and sewage disposal.</li>
                        <li>According to the World Health Organization (WHO), a Hepatitis E vaccine has been developed and licensed in China; however, it is not yet widely available in other countries.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hev-card">
                    <div class="hev-icon hi-blue"><i class="fa-solid fa-person-pregnant"></i></div>
                    <h5>Prevention During Pregnancy</h5>
                    <ul>
                        <li>Maintain strict personal hygiene.</li>
                        <li>Drink only safe, clean water.</li>
                        <li>Avoid ice unless you are certain it has been made from safe drinking water.</li>
                        <li><strong>If jaundice develops during pregnancy, seek immediate medical attention, including testing for Hepatitis E and appropriate treatment.</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ KEY POINTS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="hev-summary-panel">
                    <h2 class="mb-4" style="color:#fff;">Key Points to Remember</h2>
                    <ul>
                        <li><i class="fa-solid fa-circle-check"></i> Hepatitis E is a food- and water-borne viral infection.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Good hygiene and safe sanitation are the most effective preventive measures.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Consult a physician promptly if symptoms of hepatitis develop.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Pregnant women should take extra precautions to avoid Hepatitis E infection.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Do not take paracetamol (acetaminophen) or other unnecessary medications during acute Hepatitis E infection unless advised by a healthcare professional.</li>
                        <li><i class="fa-solid fa-circle-check"></i> All patients with Hepatitis E should receive appropriate supportive medical care to reduce the risk of acute liver failure and other serious complications.</li>
                    </ul>
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
                    <i class="fa-solid fa-hand-holding-medical" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Concerned About Hepatitis E?</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Practice good hygiene, drink safe water, and consult a physician promptly if symptoms of hepatitis develop &mdash; especially during pregnancy.</p>
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

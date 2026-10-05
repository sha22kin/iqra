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
    .hb-intro p{font-size:1.02rem;color:var(--nl-text);}
    .hb-note{background:var(--nlfb-cream);border-left:4px solid var(--nlfb-blue);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .bg-white .hb-note{background:var(--nl-tint-blue-2);}
    .hb-good{background:var(--nl-tint-green);border-left:4px solid var(--nlfb-green);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .hb-warn{background:var(--nl-tint-red-2);border-left:4px solid var(--nlfb-red);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .hb-note p,.hb-good p,.hb-warn p{color:var(--nl-text);}

    .hb-fact-panel{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2rem;color:#fff;box-shadow:0 18px 40px rgba(6,38,74,.22);}
    .hb-fact-panel h4{font-size:.78rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:rgba(255,255,255,.75);margin-bottom:1.25rem;}
    .hb-fact-row{display:flex;gap:.9rem;align-items:center;margin-bottom:1rem;}
    .hb-fact-row:last-child{margin-bottom:0;}
    .hb-fact-row i{width:34px;height:34px;flex-shrink:0;border-radius:10px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;}
    .hb-fact-row h6{margin-bottom:0;font-size:.92rem;color:#fff;}
    .hb-fact-row p{margin-bottom:0;font-size:.8rem;color:rgba(255,255,255,.78);line-height:1.4;}

    .hb-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.75rem 1.6rem;height:100%;display:flex;flex-direction:column;text-align:left;transition:transform .25s ease,box-shadow .25s ease;}
    .hb-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hb-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;margin-bottom:1.1rem;flex-shrink:0;}
    .hi-blue{background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .hi-green{background:linear-gradient(145deg,#00693e,#013d24);}
    .hi-red{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .hb-card h5{font-size:1.05rem;line-height:1.35;margin-bottom:.6rem;color:var(--nlfb-ink);}
    .hb-card p{font-size:.9rem;line-height:1.55;color:var(--nl-muted);margin-bottom:.7rem;}
    .hb-card p:last-child{margin-bottom:0;}
    .hb-card ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .hb-card ul:last-child{margin-bottom:0;}
    .hb-card ul li{position:relative;font-size:.86rem;line-height:1.5;color:var(--nl-muted);padding-left:1.05rem;margin-bottom:.4rem;}
    .hb-card ul li:last-child{margin-bottom:0;}
    .hb-card ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .hc-green ul li::before{background:var(--nlfb-green);}
    .hc-red ul li::before{background:var(--nlfb-red);}
    .hb-card .hb-sub-heading{font-size:.76rem;font-weight:700;letter-spacing:.02em;text-transform:uppercase;color:var(--nl-faint);margin:.9rem 0 .5rem;}
    .hb-card .hb-sub-heading:first-of-type{margin-top:0;}
    .hb-tag{display:inline-block;font-size:.7rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;padding:.25rem .6rem;border-radius:999px;margin-bottom:.8rem;align-self:flex-start;}
    .hb-tag.tg-blue{background:var(--nl-tint-blue);color:var(--nlfb-blue);}
    .hb-tag.tg-green{background:var(--nl-tint-green-2);color:var(--nlfb-green);}
    .hb-tag.tg-red{background:var(--nl-tint-red);color:var(--nlfb-red);}

    .hb-stat{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem 1.5rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .hb-stat:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hb-stat .hb-stat-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.4rem;line-height:1;color:var(--nlfb-blue);margin-bottom:.35rem;}
    .hb-stat.st-red .hb-stat-num{color:var(--nlfb-red);}
    .hb-stat.st-green .hb-stat-num{color:var(--nlfb-green);}
    .hb-stat .hb-stat-num small{font-size:1rem;font-weight:600;}
    .hb-stat .hb-stat-label{font-size:.78rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:.75rem;}
    .hb-stat p{font-size:.9rem;color:var(--nl-muted);margin-bottom:0;line-height:1.5;}
    .hb-bar{height:8px;border-radius:999px;background:var(--nl-line);overflow:hidden;margin:.9rem 0 .2rem;}
    .hb-bar span{display:block;height:100%;border-radius:999px;background:linear-gradient(90deg,var(--nlfb-red),#8f0019);}
    .hb-bar.br-blue span{background:linear-gradient(90deg,var(--nlfb-blue),var(--nlfb-blue-dark));}
    .hb-bar.br-green span{background:linear-gradient(90deg,var(--nlfb-green),#013d24);}

    .hb-risk-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.4rem 1.3rem;height:100%;display:flex;gap:1rem;align-items:flex-start;transition:transform .25s ease,box-shadow .25s ease;}
    .hb-risk-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hb-risk-card .hb-risk-icon{flex-shrink:0;width:44px;height:44px;border-radius:50%;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;}
    .bg-nlfb-cream .hb-risk-card .hb-risk-icon{background:var(--nl-tint-blue);}
    .hb-risk-card p{margin-bottom:0;font-size:.9rem;color:var(--nl-muted);line-height:1.5;}
    .hb-chips{display:flex;flex-wrap:wrap;gap:.45rem;margin-top:.75rem;}
    .hb-chips span{font-size:.78rem;font-weight:600;color:var(--nlfb-blue);background:var(--nl-tint-blue);border-radius:999px;padding:.3rem .75rem;}

    .hb-list{list-style:none;padding-left:0;margin-bottom:0;}
    .hb-list li{position:relative;padding:.6rem 0 .6rem 2rem;border-bottom:1px dashed var(--nl-line);color:var(--nl-text);font-size:.92rem;}
    .hb-list li:last-child{border-bottom:none;}
    .hb-list li > i{position:absolute;left:0;top:.75rem;color:var(--nlfb-blue);}
    .hb-list.hl-red li > i{color:var(--nlfb-red);}
    .hb-list.hl-green li > i{color:var(--nlfb-green);}
    .hb-list .hb-sublist{list-style:none;padding-left:0;margin:.5rem 0 0;display:flex;flex-wrap:wrap;gap:.45rem;}
    .hb-list .hb-sublist li{padding:.28rem .75rem;border:none;border-radius:999px;background:var(--nl-tint-red);color:var(--nlfb-red);font-size:.8rem;font-weight:600;}

    .hb-symptom{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem .75rem;text-align:center;height:100%;transition:transform .2s ease,box-shadow .2s ease;}
    .hb-symptom:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);}
    .hb-symptom i{width:40px;height:40px;border-radius:10px;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;margin:0 auto .6rem;font-size:1.05rem;}
    .hb-symptom.sy-red i{background:var(--nl-tint-red);color:var(--nlfb-red);}
    .hb-symptom span{font-size:.82rem;font-weight:600;color:var(--nlfb-ink);line-height:1.3;display:block;}
    .hb-group-title{font-size:.8rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:1rem;}

    .hb-schedule{display:flex;align-items:center;flex-wrap:wrap;gap:.4rem;margin:.4rem 0 .2rem;}
    .hb-dose{display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;height:64px;border-radius:50%;background:var(--nl-tint-blue);color:var(--nlfb-blue);font-family:"Poppins",sans-serif;font-weight:700;font-size:1.2rem;line-height:1;}
    .hb-dose small{font-family:"Inter",sans-serif;font-size:.62rem;font-weight:600;text-transform:uppercase;margin-top:.2rem;}
    .hb-dose-line{flex:0 0 18px;height:2px;background:#c9d9ea;}

    .hb-level{display:flex;gap:1rem;align-items:center;padding:1rem 1.1rem;border-radius:var(--radius-md);margin-bottom:.75rem;background:var(--nl-surface);border:1px solid var(--nl-line);}
    .hb-level:last-child{margin-bottom:0;}
    .hb-level .hb-level-val{flex:0 0 130px;font-family:"Poppins",sans-serif;font-weight:700;font-size:1rem;}
    .hb-level p{margin-bottom:0;font-size:.9rem;color:var(--nl-text);}
    .lv-green{border-left:5px solid var(--nlfb-green);} .lv-green .hb-level-val{color:var(--nlfb-green);}
    .lv-blue{border-left:5px solid var(--nlfb-blue);} .lv-blue .hb-level-val{color:var(--nlfb-blue);}
    .lv-red{border-left:5px solid var(--nlfb-red);} .lv-red .hb-level-val{color:var(--nlfb-red);}

    .hb-term{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;}
    .hb-term h5{display:flex;align-items:center;gap:.6rem;font-size:1.05rem;margin-bottom:.7rem;color:var(--nlfb-ink);}
    .hb-term h5 i{color:var(--nlfb-blue);}
    .hb-term p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;}
    .hb-term p:last-child{margin-bottom:0;}
    .hb-ig{display:flex;gap:.75rem;align-items:flex-start;padding:.7rem .9rem;border-radius:var(--radius-md);background:var(--nlfb-cream);margin-bottom:.6rem;font-size:.88rem;color:var(--nl-text);}
    .hb-ig:last-child{margin-bottom:0;}
    .hb-ig strong{flex:0 0 auto;color:var(--nlfb-blue);}

    .hb-marker{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .hb-marker:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hb-marker .hb-marker-code{display:inline-block;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.25rem;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);padding:.3rem .9rem;border-radius:10px;margin-bottom:.4rem;}
    .hb-marker.mk-green .hb-marker-code{background:linear-gradient(145deg,#00693e,#013d24);}
    .hb-marker.mk-red .hb-marker-code{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .hb-marker h6{font-size:.85rem;color:var(--nl-faint);font-weight:600;margin-bottom:.9rem;}
    .hb-marker p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;margin-bottom:.7rem;}
    .hb-marker p:last-child{margin-bottom:0;}
    .hb-marker ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .hb-marker ul:last-child{margin-bottom:0;}
    .hb-marker ul li{position:relative;font-size:.88rem;line-height:1.5;color:var(--nl-text);padding-left:1.05rem;margin-bottom:.35rem;}
    .hb-marker ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .hb-marker.mk-green ul li::before{background:var(--nlfb-green);}
    .hb-marker.mk-red ul li::before{background:var(--nlfb-red);}

    .hb-summary-panel{background:linear-gradient(160deg,var(--nlfb-blue-dark) 0%,#06264a 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;}
    .hb-summary-panel ul{list-style:none;padding-left:0;margin-bottom:0;}
    .hb-summary-panel li{position:relative;padding:.55rem 0 .55rem 2rem;font-size:.95rem;color:rgba(255,255,255,.92);border-bottom:1px solid rgba(255,255,255,.12);}
    .hb-summary-panel li:last-child{border-bottom:none;}
    .hb-summary-panel li i{position:absolute;left:0;top:.75rem;color:#5fd3a3;}
    .hb-summary-panel p{color:rgba(255,255,255,.85);}

    @media (max-width:575.98px){
        .hb-level{flex-direction:column;align-items:flex-start;gap:.3rem;}
        .hb-level .hb-level-val{flex:none;}
        .hb-dose{width:54px;height:54px;font-size:1rem;}
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

<!-- ============ WHAT IS HEPATITIS B ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="hb-intro">
                    <div class="eyebrow">Understanding the Infection</div>
                    <h2 class="section-title mt-2 mb-3">What is Hepatitis B?</h2>
                    <p>Hepatitis B is a liver disease caused by the Hepatitis B virus (HBV). The virus infects liver cells, causing inflammation that can lead to serious and potentially life-threatening liver disease. In many cases, the infection progresses slowly and silently, gradually damaging the liver over time.</p>
                </div>
                <div class="hb-warn d-flex gap-3 align-items-start mt-4">
                    <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
                    <p class="mb-0">Hepatitis B is the <strong>leading cause of liver cancer</strong> and remains one of the leading causes of death worldwide.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hb-fact-panel">
                    <h4>Long-term HBV infection can result in:</h4>
                    <div class="hb-fact-row">
                        <i class="fa-solid fa-fire"></i>
                        <div><h6>Hepatitis</h6><p>Liver inflammation</p></div>
                    </div>
                    <div class="hb-fact-row">
                        <i class="fa-solid fa-layer-group"></i>
                        <div><h6>Liver fibrosis</h6><p>Scarring of the liver</p></div>
                    </div>
                    <div class="hb-fact-row">
                        <i class="fa-solid fa-disease"></i>
                        <div><h6>Liver cirrhosis</h6><p>Severe liver scarring</p></div>
                    </div>
                    <div class="hb-fact-row">
                        <i class="fa-solid fa-ribbon"></i>
                        <div><h6>Liver cancer</h6><p>Hepatocellular carcinoma</p></div>
                    </div>
                    <div class="hb-fact-row">
                        <i class="fa-solid fa-heart-crack"></i>
                        <div><h6>Liver failure</h6></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ SILENT KILLER ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Why It Goes Unnoticed</div>
            <h2 class="section-title mt-2">Why is Hepatitis B Called the "Silent Killer"?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:780px;margin-inline:auto;">Hepatitis B is often referred to as the "Silent Killer" because most infected individuals do not experience noticeable symptoms, especially during the early stages of infection.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hb-card hc-green">
                    <span class="hb-tag tg-green">Acute Hepatitis B</span>
                    <div class="hb-icon hi-green"><i class="fa-solid fa-shield-virus"></i></div>
                    <h5>Cleared within a few months</h5>
                    <p>Some people naturally clear the virus within a few months through their body's immune response. This is known as acute Hepatitis B infection.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hb-card hc-red">
                    <span class="hb-tag tg-red">Chronic Hepatitis B</span>
                    <div class="hb-icon hi-red"><i class="fa-solid fa-hourglass-half"></i></div>
                    <h5>Virus remains for more than six months</h5>
                    <p>However, if the virus remains in the bloodstream for more than six months, the infection is considered chronic Hepatitis B.</p>
                </div>
            </div>
        </div>
        <div class="hb-note d-flex gap-3 align-items-start mt-4" style="background:var(--nl-surface);">
            <i class="fa-solid fa-circle-info text-nlfb-blue mt-1"></i>
            <p class="mb-0">After entering the body, HBV multiplies rapidly until the immune system produces antibodies against it. While most healthy adults successfully eliminate the virus, some people are unable to do so and become lifelong carriers. The likelihood of developing chronic infection is closely related to the age at which the infection occurs.</p>
        </div>
    </div>
</section>

<!-- ============ RISK BY AGE ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Age Matters</div>
            <h2 class="section-title mt-2">Risk of Chronic Hepatitis B by Age</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">According to the World Health Organization (WHO):</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="hb-stat st-red">
                    <div class="hb-stat-label"><i class="fa-solid fa-baby me-1"></i> Newborns</div>
                    <div class="hb-stat-num">90%</div>
                    <div class="hb-bar"><span style="width:90%"></span></div>
                    <p class="mt-2">90% of infected newborns develop chronic Hepatitis B.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hb-stat">
                    <div class="hb-stat-label"><i class="fa-solid fa-child me-1"></i> Children 1&ndash;5 Years</div>
                    <div class="hb-stat-num">50%</div>
                    <div class="hb-bar br-blue"><span style="width:50%"></span></div>
                    <p class="mt-2">50% of infected children aged 1&ndash;5 years develop chronic infection.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hb-stat st-green">
                    <div class="hb-stat-label"><i class="fa-solid fa-person me-1"></i> Healthy Adults</div>
                    <div class="hb-stat-num">5&ndash;10%</div>
                    <div class="hb-bar br-green"><span style="width:10%"></span></div>
                    <p class="mt-2">5&ndash;10% of infected healthy adults develop chronic infection.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ GLOBAL BURDEN ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">The Bigger Picture</div>
            <h2 class="section-title mt-2">Global Burden of Hepatitis B</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">According to the World Health Organization (WHO):</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="hb-stat">
                    <div class="hb-stat-label"><i class="fa-solid fa-earth-asia me-1"></i> Living with Chronic HBV</div>
                    <div class="hb-stat-num">254 <small>million</small></div>
                    <p class="mt-2">Approximately 254 million people worldwide are living with chronic Hepatitis B.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hb-stat">
                    <div class="hb-stat-label"><i class="fa-solid fa-virus me-1"></i> New Infections / Year</div>
                    <div class="hb-stat-num">1.2 <small>million</small></div>
                    <p class="mt-2">Around 1.2 million new infections occur every year.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hb-stat st-red">
                    <div class="hb-stat-label"><i class="fa-solid fa-heart-pulse me-1"></i> Deaths / Year</div>
                    <div class="hb-stat-num">1.1 <small>million</small></div>
                    <p class="mt-2">Nearly 1.1 million people die annually from Hepatitis B-related liver cirrhosis and liver cancer.</p>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-1">
            <div class="col-lg-4">
                <div class="hb-note d-flex gap-3 align-items-start h-100" style="background:var(--nl-surface);">
                    <i class="fa-solid fa-location-dot text-nlfb-blue mt-1"></i>
                    <p class="mb-0">In Bangladesh, it is estimated that around <strong>4% of the population</strong> are Hepatitis B carriers, although the exact prevalence is not yet known. Many of these individuals develop chronic liver disease and its complications.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hb-note d-flex gap-3 align-items-start h-100" style="background:var(--nl-surface);">
                    <i class="fa-solid fa-person-pregnant text-nlfb-blue mt-1"></i>
                    <p class="mb-0">Pregnant women infected with Hepatitis B have a high risk of transmitting the virus to their newborns during childbirth.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hb-warn d-flex gap-3 align-items-start h-100">
                    <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
                    <p class="mb-0">It is important to remember that Hepatitis B is <strong>significantly more infectious than HIV</strong> (the virus that causes AIDS).</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ SIGNS AND SYMPTOMS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Signs &amp; Symptoms</div>
            <h2 class="section-title mt-2">Signs and Symptoms</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Most people with Hepatitis B do not experience symptoms, and the infection is often detected only through blood testing.</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="hb-group-title">Common Symptoms</div>
                <div class="row g-3">
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3"><div class="hb-symptom"><i class="fa-solid fa-temperature-high"></i><span>Fever</span></div></div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3"><div class="hb-symptom"><i class="fa-solid fa-battery-quarter"></i><span>Fatigue and weakness</span></div></div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3"><div class="hb-symptom"><i class="fa-solid fa-bone"></i><span>Muscle and joint pain</span></div></div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3"><div class="hb-symptom"><i class="fa-solid fa-face-dizzy"></i><span>Nausea and vomiting</span></div></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hb-group-title">Less Common Symptoms</div>
                <div class="row g-3">
                    <div class="col-12 col-md-4 col-lg-12 col-xl-4"><div class="hb-symptom sy-red"><i class="fa-solid fa-droplet-slash"></i><span>Severe vomiting leading to dehydration</span></div></div>
                    <div class="col-12 col-md-4 col-lg-12 col-xl-4"><div class="hb-symptom sy-red"><i class="fa-solid fa-eye"></i><span>Jaundice (yellowing of the skin and eyes, with dark-colored urine)</span></div></div>
                    <div class="col-12 col-md-4 col-lg-12 col-xl-4"><div class="hb-symptom sy-red"><i class="fa-solid fa-water"></i><span>Fluid accumulation in the abdomen (ascites)</span></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ TRANSMISSION ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row align-items-start g-5">
            <div class="col-lg-5">
                <div class="eyebrow">Modes of Transmission</div>
                <h2 class="section-title mt-2 mb-3">How is Hepatitis B Transmitted?</h2>
                <p class="text-secondary">Hepatitis B is a highly contagious virus that spreads through contact with infected blood and certain body fluids, including vaginal secretions.</p>
                <p class="text-secondary mb-0">Common routes of transmission include:</p>
            </div>
            <div class="col-lg-7">
                <ul class="hb-list hl-red">
                    <li><i class="fa-solid fa-circle-exclamation"></i> From an infected mother to her baby during childbirth</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Transfusion of infected blood or blood products</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Sharing contaminated needles or syringes, particularly among people who inject drugs</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Ear or nose piercing and tattooing using unsterilized needles</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Medical or dental procedures performed with improperly sterilized instruments</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Sharing personal items contaminated with blood, such as:
                        <ul class="hb-sublist">
                            <li>Toothbrushes</li>
                            <li>Razors</li>
                            <li>Shaving blades</li>
                        </ul>
                    </li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Unprotected sexual contact with an infected person</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ SOCIAL CONTACT ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Clearing the Myths</div>
            <h2 class="section-title mt-2">Can Hepatitis B Spread Through Social Contact?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;"><strong>No.</strong> Hepatitis B does not spread through casual social contact.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hb-card hc-green">
                    <div class="hb-icon hi-green"><i class="fa-solid fa-handshake"></i></div>
                    <h5>Does NOT spread through casual social contact, such as:</h5>
                    <ul>
                        <li>Handshakes</li>
                        <li>Hugging</li>
                        <li>Sharing meals</li>
                        <li>Using the same glasses, cups, plates, spoons, or clothing</li>
                    </ul>
                    <p class="mt-auto pt-2"><strong>The virus is not transmitted through these everyday interactions.</strong></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hb-card hc-red">
                    <div class="hb-icon hi-red"><i class="fa-solid fa-syringe"></i></div>
                    <h5>However, Hepatitis B CAN spread through items contaminated with infected blood, including:</h5>
                    <ul>
                        <li>Razors</li>
                        <li>Blades</li>
                        <li>Shaving equipment</li>
                        <li>Toothbrushes</li>
                        <li>Needles and syringes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ WHO IS AT RISK ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Vulnerable Groups</div>
            <h2 class="section-title mt-2">Who Is at Risk of Hepatitis B Infection?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">The following groups are at increased risk of Hepatitis B infection:</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="hb-risk-card">
                    <div class="hb-risk-icon"><i class="fa-solid fa-baby"></i></div>
                    <p>Newborn babies born to mothers infected with Hepatitis B.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hb-risk-card">
                    <div class="hb-risk-icon"><i class="fa-solid fa-syringe"></i></div>
                    <p>People who inject drugs and share needles or syringes.</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="hb-risk-card">
                    <div class="hb-risk-icon"><i class="fa-solid fa-people-roof"></i></div>
                    <p>Household members and sexual partners of individuals with Hepatitis B.</p>
                </div>
            </div>
            <div class="col-12">
                <div class="hb-risk-card">
                    <div class="hb-risk-icon"><i class="fa-solid fa-user-doctor"></i></div>
                    <div>
                        <p>Healthcare professionals who are frequently exposed to blood, including:</p>
                        <div class="hb-chips">
                            <span>Surgeons</span>
                            <span>Dialysis unit staff</span>
                            <span>Blood transfusion personnel</span>
                            <span>Dentists</span>
                            <span>Nurses</span>
                            <span>Midwives</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ PREVENTION ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-start g-5">
            <div class="col-lg-5">
                <div class="eyebrow">Protect Yourself</div>
                <h2 class="section-title mt-2 mb-3">How Can Hepatitis B Be Prevented?</h2>
                <p class="text-secondary">The Hepatitis B virus is highly infectious and can survive in dried blood outside the body for up to two weeks.</p>
                <div class="hb-good d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-syringe text-nlfb-green mt-1"></i>
                    <p class="mb-0">The most effective way to prevent Hepatitis B infection is <strong>vaccination</strong>.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <p class="text-secondary mb-2">Additional preventive measures include:</p>
                <ul class="hb-list hl-green">
                    <li><i class="fa-solid fa-circle-check"></i> Avoid direct contact with infected blood and other body fluids, including vaginal secretions.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Ensure that all donated blood and blood products are properly screened before transfusion.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Never share razors, blades, toothbrushes, needles, or other sharp instruments.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Use only new or properly sterilized blades and shaving equipment at barbershops and salons.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Practice safe sex and avoid exposure to infected body fluids.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ PREGNANCY ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Mother &amp; Baby</div>
            <h2 class="section-title mt-2">Hepatitis B During Pregnancy</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:820px;margin-inline:auto;">A mother infected with hepatitis B can transmit the virus to her baby during childbirth. Since infection at birth carries a very high risk of developing lifelong chronic hepatitis B, preventing mother-to-child transmission is a major public health priority.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="hb-card">
                    <div class="hb-icon hi-blue"><i class="fa-solid fa-person-pregnant"></i></div>
                    <h5>Screening During Pregnancy</h5>
                    <p>Because effective vaccines and preventive treatments are available, every pregnant woman should be screened for hepatitis B during pregnancy.</p>
                    <div class="hb-sub-heading">If a pregnant woman tests positive for hepatitis B, further evaluation should include:</div>
                    <ul>
                        <li>HBeAg testing</li>
                        <li>HBV DNA (viral load) testing</li>
                        <li>Liver Function Tests (LFTs)</li>
                    </ul>
                    <p class="mt-2">She should then receive appropriate care and treatment under the supervision of a liver specialist.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hb-card">
                    <div class="hb-icon hi-blue"><i class="fa-solid fa-people-roof"></i></div>
                    <h5>Protecting the Family</h5>
                    <p>If a pregnant woman is hepatitis B positive, her healthcare provider will take measures to prevent transmission to the newborn.</p>
                    <p>Family members should also be tested for hepatitis B, and those who are not infected should receive the hepatitis B vaccine.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hb-card hc-green">
                    <div class="hb-icon hi-green"><i class="fa-solid fa-baby"></i></div>
                    <h5>To effectively prevent transmission:</h5>
                    <ul>
                        <li><strong>The newborn should receive the birth dose of the hepatitis B vaccine within 24 hours of birth.</strong></li>
                        <li><strong>When indicated, Hepatitis B Immunoglobulin (HBIG) should also be administered within the same time frame.</strong></li>
                    </ul>
                    <p class="mt-2">When these preventive measures are followed correctly, the risk of mother-to-child transmission can be reduced dramatically.</p>
                </div>
            </div>
        </div>
        <div class="hb-note d-flex gap-3 align-items-start mt-4" style="background:var(--nl-surface);">
            <i class="fa-solid fa-lightbulb text-nlfb-blue mt-1"></i>
            <p class="mb-0"><strong>Remember:</strong> Mother-to-child transmission during pregnancy and childbirth remains one of the most common routes of hepatitis B infection worldwide. Early screening, appropriate treatment, and timely newborn vaccination are the most effective strategies for preventing lifelong hepatitis B infection.</p>
        </div>
    </div>
</section>

<!-- ============ VACCINATION ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Prevention Works</div>
            <h2 class="section-title mt-2">Hepatitis B Vaccination</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Hepatitis B can be effectively prevented through vaccination.</p>
        </div>
        <div class="hb-warn d-flex gap-3 align-items-start mb-4">
            <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
            <p class="mb-0"><strong>Important:</strong> Individuals should undergo Hepatitis B screening before vaccination. Vaccinating someone who is already infected does not provide any additional benefit.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hb-card">
                    <div class="hb-icon hi-blue"><i class="fa-solid fa-calendar-check"></i></div>
                    <h5>Recommended Vaccination Schedule</h5>
                    <p>According to the World Health Organization (WHO), the vaccine may be administered using either of the following schedules:</p>
                    <div class="hb-sub-heading">Option 1 &mdash; 0, 1 and 6 months, or</div>
                    <div class="hb-schedule mb-2">
                        <div class="hb-dose">0<small>month</small></div><div class="hb-dose-line"></div>
                        <div class="hb-dose">1<small>month</small></div><div class="hb-dose-line"></div>
                        <div class="hb-dose">6<small>months</small></div>
                    </div>
                    <div class="hb-sub-heading">Option 2 &mdash; 0, 1, 2 and 12 months</div>
                    <div class="hb-schedule mb-3">
                        <div class="hb-dose">0<small>month</small></div><div class="hb-dose-line"></div>
                        <div class="hb-dose">1<small>month</small></div><div class="hb-dose-line"></div>
                        <div class="hb-dose">2<small>months</small></div><div class="hb-dose-line"></div>
                        <div class="hb-dose">12<small>months</small></div>
                    </div>
                    <p>If an adequate antibody response is not achieved, an additional booster dose should be given after the third dose.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hb-card hc-green">
                    <div class="hb-icon hi-green"><i class="fa-solid fa-shield-heart"></i></div>
                    <h5>Vaccine Effectiveness</h5>
                    <p>The Hepatitis B vaccine produces a protective immune response in approximately <strong>85&ndash;100%</strong> of healthy individuals.</p>
                    <p>An Anti-HBs antibody test should be performed 1&ndash;3 months after completing the vaccination series to measure immunity.</p>
                    <div class="hb-sub-heading">Interpretation of Anti-HBs antibody levels:</div>
                    <div class="hb-level lv-green">
                        <div class="hb-level-val">&ge;100 mIU/mL</div>
                        <p>Excellent protection</p>
                    </div>
                    <div class="hb-level lv-blue">
                        <div class="hb-level-val">10&ndash;99 mIU/mL</div>
                        <p>Adequate protection</p>
                    </div>
                    <div class="hb-level lv-red">
                        <div class="hb-level-val">&lt;10 mIU/mL</div>
                        <p>Inadequate protection; an additional booster dose is recommended.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ MANAGEMENT ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Living with Hepatitis B</div>
                <h2 class="section-title mt-2 mb-3">Hepatitis B Management</h2>
                <p class="text-secondary">Learning that you have been infected with the hepatitis B virus through a blood test is understandably concerning. However, with regular medical follow-up, appropriate treatment when needed, and adherence to your doctor's advice, most people with chronic hepatitis B can live long, healthy, and productive lives.</p>
                <p class="text-secondary">The management of hepatitis B continues to improve as medical science advances. It is important to receive care based on the latest evidence and treatment guidelines. Regular monitoring helps assess the health of your liver and detect complications early. Common investigations include:</p>
                <ul class="hb-list mb-3">
                    <li><i class="fa-solid fa-vial"></i> Liver Function Tests (LFTs)</li>
                    <li><i class="fa-solid fa-wave-square"></i> Liver ultrasonography (Ultrasound)</li>
                    <li><i class="fa-solid fa-chart-simple"></i> FibroScan (to assess liver fibrosis)</li>
                    <li><i class="fa-solid fa-microscope"></i> Liver biopsy (in selected cases)</li>
                </ul>
                <div class="hb-note d-flex gap-3 align-items-start" style="background:var(--nl-surface);">
                    <i class="fa-solid fa-circle-info text-nlfb-blue mt-1"></i>
                    <p class="mb-0">If liver cancer is suspected, your doctor may recommend additional imaging tests such as an abdominal ultrasound or CT scan.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hb-card hc-green">
                    <div class="hb-icon hi-green"><i class="fa-solid fa-heart-circle-check"></i></div>
                    <h5>Protect Your Liver</h5>
                    <p>Although hepatitis B may or may not cause significant liver damage, preventing additional liver injury is essential. Many substances that enter the body through food, breathing, or the skin are processed by the liver. Therefore, individuals with chronic hepatitis B should take extra care to protect their liver by following these recommendations:</p>
                    <ul>
                        <li>Avoid alcohol and smoking.</li>
                        <li>Get tested for hepatitis A and hepatitis E.</li>
                        <li>Receive the hepatitis A vaccine if you are not already immune.</li>
                        <li>Maintain a healthy body weight.</li>
                        <li>Follow a balanced, nutritious diet and avoid excessive fatty foods, which can contribute to fatty liver disease.</li>
                        <li>Take care of other medical conditions and have regular health check-ups.</li>
                        <li>Attend regular follow-up visits with your liver specialist.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="hb-good d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-lightbulb text-nlfb-green mt-1"></i>
            <p class="mb-0"><strong>Remember,</strong> early detection and timely management of liver damage or liver cancer significantly improve treatment outcomes.</p>
        </div>
    </div>
</section>

<!-- ============ TREATMENT ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Care &amp; Therapy</div>
            <h2 class="section-title mt-2">Treatment of Hepatitis B</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hb-card">
                    <span class="hb-tag tg-green">Acute Hepatitis B</span>
                    <p>Most people with acute hepatitis B do not require specific antiviral treatment. Supportive care, including adequate rest, is usually sufficient while the body clears the infection. Common symptoms during the acute phase may include:</p>
                    <ul>
                        <li>Jaundice</li>
                        <li>Nausea</li>
                        <li>Vomiting</li>
                        <li>Fatigue and weakness</li>
                    </ul>
                    <div class="hb-warn d-flex gap-2 align-items-start my-2" style="padding:.8rem 1rem;">
                        <i class="fa-solid fa-truck-medical text-nlfb-red mt-1"></i>
                        <p class="mb-0" style="font-size:.88rem;">A small number of people develop fulminant hepatitis, a rare but life-threatening form of acute hepatitis B that requires immediate hospitalization and specialized medical care.</p>
                    </div>
                    <p class="mt-2">In most cases, acute hepatitis B resolves completely within six months. Once the virus is cleared, the individual develops natural immunity and is generally protected against future hepatitis B infection.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hb-card hc-red">
                    <span class="hb-tag tg-red">Chronic Hepatitis B</span>
                    <p>People with chronic hepatitis B, however, may require treatment to reduce liver damage and suppress viral replication. If you are diagnosed with hepatitis B through laboratory testing, you should consult a hepatologist (liver specialist) or a gastroenterologist for a comprehensive evaluation.</p>
                    <div class="hb-sub-heading">Your specialist will assess:</div>
                    <ul>
                        <li>How long you have been infected</li>
                        <li>Whether the virus is actively replicating</li>
                        <li>The extent of liver damage, if any</li>
                    </ul>
                    <p class="mt-2">Based on these findings, an individualized treatment plan will be developed.</p>
                </div>
            </div>
        </div>

        <p class="text-secondary text-center mt-5 mb-4">If treatment is indicated, two main types of therapy are currently used:</p>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="hb-card">
                    <div class="hb-icon hi-blue"><i class="fa-solid fa-syringe"></i></div>
                    <h5>1. Interferon Therapy</h5>
                    <ul>
                        <li>Interferon alfa</li>
                        <li>Pegylated interferon alfa</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hb-card hc-green">
                    <div class="hb-icon hi-green"><i class="fa-solid fa-capsules"></i></div>
                    <h5>2. Oral Antiviral Medications</h5>
                    <ul>
                        <li>Tenofovir</li>
                        <li>Entecavir</li>
                        <li>Lamivudine</li>
                        <li>Adefovir</li>
                        <li>Telbivudine</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="hb-note d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-user-doctor text-nlfb-blue mt-1"></i>
            <p class="mb-0">Your doctor will determine the most appropriate treatment based on your clinical condition and current international treatment guidelines.</p>
        </div>
    </div>
</section>

<!-- ============ LAB TESTS: INTRO & TERMS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Diagnosis</div>
            <h2 class="section-title mt-2">Laboratory Blood Tests for Hepatitis B</h2>
            <p class="text-secondary mt-2" style="max-width:820px;margin-inline:auto;">Hepatitis B is diagnosed and managed through a series of blood tests. These tests help determine whether a person has a current infection, has recovered from the infection, or has developed chronic hepatitis B. In most cases, the tests are repeated after 6 months to determine whether the infection has resolved or progressed to a chronic condition.</p>
        </div>
        <div class="hb-warn d-flex gap-3 align-items-start mb-5">
            <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
            <p class="mb-0">Misinterpretation of laboratory reports can sometimes lead to confusion, even among healthcare providers. Therefore, anyone diagnosed with hepatitis B should consult a hepatology or liver disease specialist for proper interpretation and medical advice.</p>
        </div>

        <p class="text-secondary mb-4">Below are some important terms and laboratory markers commonly used in hepatitis B diagnosis.</p>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hb-term">
                    <h5><i class="fa-solid fa-virus-covid"></i> Antigen</h5>
                    <p>An <strong>antigen</strong> is a foreign substance, usually a protein, that enters the body and triggers an immune response. In hepatitis B, proteins found on or within the hepatitis B virus (HBV) are referred to as antigens.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hb-term">
                    <h5><i class="fa-solid fa-shield-virus"></i> Antibody</h5>
                    <p>An <strong>antibody</strong> is a protein produced by the body's immune system to fight against antigens. Different antibodies are measured during hepatitis B testing, including:</p>
                    <div class="hb-ig"><strong>IgM antibodies</strong><span>&ndash; indicate a recent or acute infection.</span></div>
                    <div class="hb-ig"><strong>IgG antibodies</strong><span>&ndash; indicate long-term immunity or previous exposure.</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ COMMON BLOOD TESTS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Key Markers</div>
            <h2 class="section-title mt-2">Common Hepatitis B Blood Tests</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="hb-marker mk-red">
                    <div class="hb-marker-code">HBsAg</div>
                    <h6>Hepatitis B Surface Antigen</h6>
                    <p>HBsAg is the primary marker used to detect a current hepatitis B infection.</p>
                    <ul>
                        <li>A positive result indicates that hepatitis B virus is present in the body.</li>
                        <li>A negative result indicates that hepatitis B surface antigen is not detected.</li>
                    </ul>
                    <p>HBsAg appears early during infection, often before symptoms develop, making it useful for identifying both symptomatic and asymptomatic infections. If the body's immune system successfully clears the virus, HBsAg disappears from the bloodstream.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hb-marker mk-red">
                    <div class="hb-marker-code">HBeAg</div>
                    <h6>Hepatitis B e Antigen</h6>
                    <p>HBeAg is another viral protein found during active hepatitis B infection.</p>
                    <p class="mb-2">Its presence generally indicates:</p>
                    <ul>
                        <li>Active viral replication</li>
                        <li>Higher levels of hepatitis B virus in the blood</li>
                        <li>Increased infectivity</li>
                    </ul>
                    <p>HBeAg is an important marker for assessing the activity of the infection.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hb-marker mk-green">
                    <div class="hb-marker-code">Anti-HBs</div>
                    <h6>Antibody to Hepatitis B Surface Antigen</h6>
                    <p>Anti-HBs develops after the disappearance of HBsAg.</p>
                    <p class="mb-2">A positive Anti-HBs result usually indicates:</p>
                    <ul>
                        <li>Recovery from a previous hepatitis B infection, or</li>
                        <li>Successful hepatitis B vaccination.</li>
                    </ul>
                    <p>The presence of Anti-HBs generally provides protection against future hepatitis B infection.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hb-marker">
                    <div class="hb-marker-code">Anti-HBc</div>
                    <h6>Antibody to Hepatitis B Core Antigen</h6>
                    <p>Anti-HBc is produced after exposure to the hepatitis B core antigen.</p>
                    <p>A positive result indicates previous or ongoing hepatitis B infection. In some cases, it may also indicate occult (hidden) hepatitis B infection, where the virus remains in the body despite the absence of detectable HBsAg.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ ADDITIONAL TESTS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">After Diagnosis</div>
            <h2 class="section-title mt-2">Additional Tests After Hepatitis B Diagnosis</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:760px;margin-inline:auto;">If hepatitis B infection is confirmed, further laboratory tests are often required to determine the severity of the disease, viral activity, and the need for treatment.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hb-marker mk-green">
                    <div class="hb-marker-code">Anti-HBe (HBeAb)</div>
                    <h6>Hepatitis B e Antibody</h6>
                    <p>Anti-HBe develops after the disappearance of HBeAg.</p>
                    <p class="mb-2">Its presence usually suggests:</p>
                    <ul>
                        <li>Reduced viral replication</li>
                        <li>Lower infectivity</li>
                        <li>Improvement in disease activity</li>
                    </ul>
                    <p>Healthcare providers often use this marker to monitor treatment response and disease progression.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hb-marker">
                    <div class="hb-marker-code">HBV DNA Test</div>
                    <h6>Viral Load</h6>
                    <p>The HBV DNA test measures the amount of hepatitis B virus present in the bloodstream (viral load).</p>
                    <p class="mb-2">This test is usually performed alongside other hepatitis B blood tests and provides valuable information regarding:</p>
                    <ul>
                        <li>Viral replication level</li>
                        <li>Disease severity</li>
                        <li>Need for antiviral treatment</li>
                        <li>Monitoring response to antiviral therapy</li>
                        <li>Long-term prognosis</li>
                    </ul>
                    <p>Although the HBV DNA test is relatively expensive, it is one of the most important investigations for making treatment decisions and monitoring patients receiving antiviral therapy.</p>
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
                    <h3 class="mb-2">Concerned About Hepatitis B?</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Get screened, get vaccinated, and consult a liver specialist for proper interpretation of your test results and medical advice.</p>
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

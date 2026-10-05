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
    .hdv-intro p{font-size:1.02rem;color:var(--nl-text);}
    .hdv-note{background:var(--nlfb-cream);border-left:4px solid var(--nlfb-blue);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .bg-white .hdv-note{background:var(--nl-tint-blue-2);}
    .hdv-good{background:var(--nl-tint-green);border-left:4px solid var(--nlfb-green);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .hdv-warn{background:var(--nl-tint-red-2);border-left:4px solid var(--nlfb-red);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .hdv-note p,.hdv-good p,.hdv-warn p{color:var(--nl-text);}

    .hdv-fact-panel{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2rem;color:#fff;box-shadow:0 18px 40px rgba(6,38,74,.22);}
    .hdv-fact-panel h4{font-size:.78rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:rgba(255,255,255,.75);margin-bottom:1.25rem;}
    .hdv-fact-row{display:flex;gap:.9rem;align-items:center;margin-bottom:1rem;}
    .hdv-fact-row:last-child{margin-bottom:0;}
    .hdv-fact-row i{width:34px;height:34px;flex-shrink:0;border-radius:10px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;}
    .hdv-fact-row h6{margin-bottom:0;font-size:.92rem;color:#fff;}
    .hdv-fact-row p{margin-bottom:0;font-size:.8rem;color:rgba(255,255,255,.78);line-height:1.4;}

    .hdv-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.75rem 1.6rem;height:100%;display:flex;flex-direction:column;text-align:left;transition:transform .25s ease,box-shadow .25s ease;}
    .hdv-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hdv-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;margin-bottom:1.1rem;flex-shrink:0;}
    .hi-blue{background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .hi-green{background:linear-gradient(145deg,#00693e,#013d24);}
    .hi-red{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .hdv-card h5{font-size:1.05rem;line-height:1.35;margin-bottom:.6rem;color:var(--nlfb-ink);}
    .hdv-card p{font-size:.9rem;line-height:1.55;color:var(--nl-muted);margin-bottom:.7rem;}
    .hdv-card p:last-child{margin-bottom:0;}
    .hdv-card ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .hdv-card ul:last-child{margin-bottom:0;}
    .hdv-card ul li{position:relative;font-size:.86rem;line-height:1.5;color:var(--nl-muted);padding-left:1.05rem;margin-bottom:.4rem;}
    .hdv-card ul li:last-child{margin-bottom:0;}
    .hdv-card ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .dd-green ul li::before{background:var(--nlfb-green);}
    .dd-red ul li::before{background:var(--nlfb-red);}
    .hdv-card .hdv-sub-heading{font-size:.76rem;font-weight:700;letter-spacing:.02em;text-transform:uppercase;color:var(--nl-faint);margin:.9rem 0 .5rem;}
    .hdv-card .hdv-sub-heading:first-of-type{margin-top:0;}
    .hdv-tag{display:inline-block;font-size:.7rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;padding:.25rem .6rem;border-radius:999px;margin-bottom:.8rem;align-self:flex-start;}
    .hdv-tag.tg-blue{background:var(--nl-tint-blue);color:var(--nlfb-blue);}
    .hdv-tag.tg-green{background:var(--nl-tint-green-2);color:var(--nlfb-green);}
    .hdv-tag.tg-red{background:var(--nl-tint-red);color:var(--nlfb-red);}

    .hdv-stat{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem 1.5rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .hdv-stat:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hdv-stat .hdv-stat-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.4rem;line-height:1;color:var(--nlfb-blue);margin-bottom:.35rem;}
    .hdv-stat.st-red .hdv-stat-num{color:var(--nlfb-red);}
    .hdv-stat.st-green .hdv-stat-num{color:var(--nlfb-green);}
    .hdv-stat .hdv-stat-num small{font-size:1rem;font-weight:600;}
    .hdv-stat .hdv-stat-label{font-size:.78rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:.75rem;}
    .hdv-stat p{font-size:.9rem;color:var(--nl-muted);margin-bottom:0;line-height:1.5;}
    .hdv-bar{height:8px;border-radius:999px;background:var(--nl-line);overflow:hidden;margin:.9rem 0 .2rem;}
    .hdv-bar span{display:block;height:100%;border-radius:999px;background:linear-gradient(90deg,var(--nlfb-red),#8f0019);}
    .hdv-bar.br-blue span{background:linear-gradient(90deg,var(--nlfb-blue),var(--nlfb-blue-dark));}
    .hdv-bar.br-green span{background:linear-gradient(90deg,var(--nlfb-green),#013d24);}

    .hdv-risk-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.4rem 1.3rem;height:100%;display:flex;gap:1rem;align-items:flex-start;transition:transform .25s ease,box-shadow .25s ease;}
    .hdv-risk-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hdv-risk-card .hdv-risk-icon{flex-shrink:0;width:44px;height:44px;border-radius:50%;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;}
    .bg-nlfb-cream .hdv-risk-card .hdv-risk-icon{background:var(--nl-tint-blue);}
    .hdv-risk-card p{margin-bottom:0;font-size:.9rem;color:var(--nl-muted);line-height:1.5;}
    .hdv-chips{display:flex;flex-wrap:wrap;gap:.45rem;margin-top:.75rem;}
    .hdv-chips span{font-size:.78rem;font-weight:600;color:var(--nlfb-blue);background:var(--nl-tint-blue);border-radius:999px;padding:.3rem .75rem;}

    .hdv-list{list-style:none;padding-left:0;margin-bottom:0;}
    .hdv-list li{position:relative;padding:.6rem 0 .6rem 2rem;border-bottom:1px dashed var(--nl-line);color:var(--nl-text);font-size:.92rem;}
    .hdv-list li:last-child{border-bottom:none;}
    .hdv-list li > i{position:absolute;left:0;top:.75rem;color:var(--nlfb-blue);}
    .hdv-list.hl-red li > i{color:var(--nlfb-red);}
    .hdv-list.hl-green li > i{color:var(--nlfb-green);}
    .hdv-list .hdv-sublist{list-style:none;padding-left:0;margin:.5rem 0 0;display:flex;flex-wrap:wrap;gap:.45rem;}
    .hdv-list .hdv-sublist li{padding:.28rem .75rem;border:none;border-radius:999px;background:var(--nl-tint-red);color:var(--nlfb-red);font-size:.8rem;font-weight:600;}

    .hdv-symptom{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem .75rem;text-align:center;height:100%;transition:transform .2s ease,box-shadow .2s ease;}
    .hdv-symptom:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);}
    .hdv-symptom i{width:40px;height:40px;border-radius:10px;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;margin:0 auto .6rem;font-size:1.05rem;}
    .hdv-symptom.sy-red i{background:var(--nl-tint-red);color:var(--nlfb-red);}
    .hdv-symptom span{font-size:.82rem;font-weight:600;color:var(--nlfb-ink);line-height:1.3;display:block;}
    .hdv-group-title{font-size:.8rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:1rem;}

    .hdv-schedule{display:flex;align-items:center;flex-wrap:wrap;gap:.4rem;margin:.4rem 0 .2rem;}
    .hdv-dose{display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;height:64px;border-radius:50%;background:var(--nl-tint-blue);color:var(--nlfb-blue);font-family:"Poppins",sans-serif;font-weight:700;font-size:1.2rem;line-height:1;}
    .hdv-dose small{font-family:"Inter",sans-serif;font-size:.62rem;font-weight:600;text-transform:uppercase;margin-top:.2rem;}
    .hdv-dose-line{flex:0 0 18px;height:2px;background:#c9d9ea;}

    .hdv-level{display:flex;gap:1rem;align-items:center;padding:1rem 1.1rem;border-radius:var(--radius-md);margin-bottom:.75rem;background:var(--nl-surface);border:1px solid var(--nl-line);}
    .hdv-level:last-child{margin-bottom:0;}
    .hdv-level .hdv-level-val{flex:0 0 130px;font-family:"Poppins",sans-serif;font-weight:700;font-size:1rem;}
    .hdv-level p{margin-bottom:0;font-size:.9rem;color:var(--nl-text);}
    .lv-green{border-left:5px solid var(--nlfb-green);} .lv-green .hdv-level-val{color:var(--nlfb-green);}
    .lv-blue{border-left:5px solid var(--nlfb-blue);} .lv-blue .hdv-level-val{color:var(--nlfb-blue);}
    .lv-red{border-left:5px solid var(--nlfb-red);} .lv-red .hdv-level-val{color:var(--nlfb-red);}

    .hdv-term{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;}
    .hdv-term h5{display:flex;align-items:center;gap:.6rem;font-size:1.05rem;margin-bottom:.7rem;color:var(--nlfb-ink);}
    .hdv-term h5 i{color:var(--nlfb-blue);}
    .hdv-term p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;}
    .hdv-term p:last-child{margin-bottom:0;}
    .hdv-ig{display:flex;gap:.75rem;align-items:flex-start;padding:.7rem .9rem;border-radius:var(--radius-md);background:var(--nlfb-cream);margin-bottom:.6rem;font-size:.88rem;color:var(--nl-text);}
    .hdv-ig:last-child{margin-bottom:0;}
    .hdv-ig strong{flex:0 0 auto;color:var(--nlfb-blue);}

    .hdv-marker{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .hdv-marker:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hdv-marker .hdv-marker-code{display:inline-block;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.25rem;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);padding:.3rem .9rem;border-radius:10px;margin-bottom:.4rem;}
    .hdv-marker.mk-green .hdv-marker-code{background:linear-gradient(145deg,#00693e,#013d24);}
    .hdv-marker.mk-red .hdv-marker-code{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .hdv-marker h6{font-size:.85rem;color:var(--nl-faint);font-weight:600;margin-bottom:.9rem;}
    .hdv-marker p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;margin-bottom:.7rem;}
    .hdv-marker p:last-child{margin-bottom:0;}
    .hdv-marker ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .hdv-marker ul:last-child{margin-bottom:0;}
    .hdv-marker ul li{position:relative;font-size:.88rem;line-height:1.5;color:var(--nl-text);padding-left:1.05rem;margin-bottom:.35rem;}
    .hdv-marker ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .hdv-marker.mk-green ul li::before{background:var(--nlfb-green);}
    .hdv-marker.mk-red ul li::before{background:var(--nlfb-red);}

    .hdv-summary-panel{background:linear-gradient(160deg,var(--nlfb-blue-dark) 0%,#06264a 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;}
    .hdv-summary-panel ul{list-style:none;padding-left:0;margin-bottom:0;}
    .hdv-summary-panel li{position:relative;padding:.55rem 0 .55rem 2rem;font-size:.95rem;color:rgba(255,255,255,.92);border-bottom:1px solid rgba(255,255,255,.12);}
    .hdv-summary-panel li:last-child{border-bottom:none;}
    .hdv-summary-panel li i{position:absolute;left:0;top:.75rem;color:#5fd3a3;}
    .hdv-summary-panel p{color:rgba(255,255,255,.85);}

    @media (max-width:575.98px){
        .hdv-level{flex-direction:column;align-items:flex-start;gap:.3rem;}
        .hdv-level .hdv-level-val{flex:none;}
        .hdv-dose{width:54px;height:54px;font-size:1rem;}
    }
    .hdv-genotypes{display:flex;flex-wrap:wrap;gap:.45rem;margin-bottom:.9rem;}
    .hdv-genotypes span{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;color:var(--nlfb-blue);background:var(--nl-tint-blue);}
    .hdv-old{opacity:.95;}
    .hdv-new{border:2px solid var(--nlfb-green);}
    .hdv-cure-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.2rem;line-height:1;color:var(--nlfb-green);}
    .hdv-regimen{display:flex;align-items:center;flex-wrap:wrap;gap:.75rem;margin-bottom:1rem;}
    .hdv-regimen > div{flex:1 1 140px;background:var(--nl-tint-green);border-radius:var(--radius-md);padding:.8rem 1rem;text-align:center;}
    .hdv-regimen strong{display:block;color:var(--nlfb-ink);font-size:.98rem;}
    .hdv-regimen span{font-size:.82rem;font-weight:600;color:var(--nlfb-green);}
    .hdv-regimen > i{color:var(--nlfb-green);}
    .hdv-dep{display:flex;align-items:center;justify-content:center;gap:1rem;margin:.5rem 0 1.4rem;}
    .hdv-dep .hdv-virus{width:84px;height:84px;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.1rem;background:rgba(255,255,255,.15);border:2px solid rgba(255,255,255,.35);}
    .hdv-dep .hdv-virus small{font-family:"Inter",sans-serif;font-size:.62rem;font-weight:600;text-transform:uppercase;opacity:.8;}
    .hdv-dep .hdv-virus.v-d{background:var(--nlfb-red);border-color:var(--nlfb-red);}
    .hdv-dep > i{font-size:1.2rem;opacity:.8;}
    .hdv-people{display:flex;gap:.35rem;margin:.6rem 0 .2rem;font-size:1.35rem;color:#c9d9ea;}
    .hdv-people .on{color:var(--nlfb-red);}
    .hdv-mult{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.4rem;line-height:1;color:var(--nlfb-red);}
    .hdv-mult small{font-size:1rem;font-weight:600;}
    .hdv-timeline{position:relative;padding-left:2rem;}
    .hdv-timeline::before{content:"";position:absolute;left:.55rem;top:.3rem;bottom:.3rem;width:2px;background:#c9d9ea;}
    .hdv-timeline .hdv-tl-item{position:relative;margin-bottom:1.2rem;}
    .hdv-timeline .hdv-tl-item:last-child{margin-bottom:0;}
    .hdv-timeline .hdv-tl-item::before{content:"";position:absolute;left:-1.85rem;top:.3rem;width:14px;height:14px;border-radius:50%;background:var(--nlfb-green);border:3px solid #fff;box-shadow:0 0 0 2px var(--nlfb-green);}
    .hdv-timeline h6{font-family:"Poppins",sans-serif;font-weight:700;color:var(--nlfb-green);margin-bottom:.2rem;}
    .hdv-timeline p{margin-bottom:0;font-size:.92rem;color:var(--nl-text);}
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

<!-- ============ WHAT IS HEPATITIS D ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="hdv-intro">
                    <div class="eyebrow">Understanding the Infection</div>
                    <h2 class="section-title mt-2 mb-3">What is Hepatitis D?</h2>
                    <p>Hepatitis D (HDV) is an inflammatory liver disease caused by the Hepatitis D virus (HDV). It can result in both acute and chronic hepatitis.</p>
                </div>
                <div class="hdv-warn d-flex gap-3 align-items-start mt-4">
                    <i class="fa-solid fa-link text-nlfb-red mt-1"></i>
                    <p class="mb-0">The Hepatitis D virus can <strong>only infect individuals who are already infected with the Hepatitis B virus (HBV)</strong>. Approximately 5% of people with chronic Hepatitis B have a co-infection with Hepatitis D, significantly increasing the risk of chronic hepatitis, liver cirrhosis, and liver cancer.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hdv-fact-panel">
                    <h4>HDV Depends on HBV</h4>
                    <div class="hdv-dep">
                        <div class="hdv-virus">HBV<small>Hepatitis B</small></div>
                        <i class="fa-solid fa-plus"></i>
                        <div class="hdv-virus v-d">HDV<small>Hepatitis D</small></div>
                    </div>
                    <div class="hdv-fact-row">
                        <i class="fa-solid fa-percent"></i>
                        <div><h6>~5% co-infection</h6><p>Of people with chronic Hepatitis B</p></div>
                    </div>
                    <div class="hdv-fact-row">
                        <i class="fa-solid fa-disease"></i>
                        <div><h6>Higher risk of</h6><p>Chronic hepatitis, liver cirrhosis, and liver cancer</p></div>
                    </div>
                    <div class="hdv-fact-row">
                        <i class="fa-solid fa-earth-asia"></i>
                        <div><h6>12 million people</h6><p>An estimated 12 million people worldwide are living with Hepatitis D</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ WHY CO-INFECTION IS DANGEROUS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">A More Severe Disease</div>
            <h2 class="section-title mt-2">Hepatitis B and D Co-infection</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:760px;margin-inline:auto;">Being infected with both viruses makes liver disease considerably more serious.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="hdv-stat st-red">
                    <div class="hdv-stat-label"><i class="fa-solid fa-arrow-trend-up me-1"></i> Severity of Liver Disease</div>
                    <div class="hdv-mult">2&ndash;3<small>&times; higher</small></div>
                    <p class="mt-2">Co-infection with Hepatitis B and Hepatitis D increases the severity of liver disease by 2&ndash;3 times.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hdv-stat st-red">
                    <div class="hdv-stat-label"><i class="fa-solid fa-ribbon me-1"></i> Risk of Liver Cancer</div>
                    <div class="hdv-mult">3&ndash;6<small>&times; higher</small></div>
                    <p class="mt-2">Co-infection raises the risk of liver cancer by 3&ndash;6 times.</p>
                </div>
            </div>
        </div>

        <p class="text-secondary text-center mt-5 mb-4">Among people infected with both Hepatitis B and D:</p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="hdv-stat">
                    <div class="hdv-stat-label"><i class="fa-solid fa-disease me-1"></i> Liver Cirrhosis</div>
                    <div class="hdv-stat-num">1 <small>in</small> 6</div>
                    <div class="hdv-people">
                        <i class="fa-solid fa-person on"></i><i class="fa-solid fa-person"></i><i class="fa-solid fa-person"></i><i class="fa-solid fa-person"></i><i class="fa-solid fa-person"></i><i class="fa-solid fa-person"></i>
                    </div>
                    <p class="mt-2">Approximately 1 in 6 may develop liver cirrhosis.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hdv-stat">
                    <div class="hdv-stat-label"><i class="fa-solid fa-ribbon me-1"></i> Liver Cancer</div>
                    <div class="hdv-stat-num">1 <small>in</small> 5</div>
                    <div class="hdv-people">
                        <i class="fa-solid fa-person on"></i><i class="fa-solid fa-person"></i><i class="fa-solid fa-person"></i><i class="fa-solid fa-person"></i><i class="fa-solid fa-person"></i>
                    </div>
                    <p class="mt-2">Approximately 1 in 5 may develop liver cancer.</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="hdv-stat st-red">
                    <div class="hdv-stat-label"><i class="fa-solid fa-hourglass-half me-1"></i> Cirrhosis Within 5 Years</div>
                    <div class="hdv-stat-num">~30%</div>
                    <div class="hdv-bar"><span style="width:30%"></span></div>
                    <p class="mt-2">Around 30% of people with Hepatitis D infection may develop liver cirrhosis within five years.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ WHERE IS IT COMMON ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Where It Is Common</div>
            <h2 class="section-title mt-2">Regions with Higher Hepatitis D Infection</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Hepatitis D infection is more common in:</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="hdv-risk-card">
                    <div class="hdv-risk-icon"><i class="fa-solid fa-earth-asia"></i></div>
                    <p>Mongolia</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hdv-risk-card">
                    <div class="hdv-risk-icon"><i class="fa-solid fa-earth-europe"></i></div>
                    <p>The Republic of Moldova</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hdv-risk-card">
                    <div class="hdv-risk-icon"><i class="fa-solid fa-earth-africa"></i></div>
                    <p>Parts of West and Central Africa</p>
                </div>
            </div>
        </div>
        <div class="hdv-note d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-location-dot text-nlfb-blue mt-1"></i>
            <p class="mb-0">The exact prevalence of Hepatitis D in Bangladesh is currently unknown.</p>
        </div>
    </div>
</section>

<!-- ============ TRANSMISSION & RISK ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Modes of Transmission</div>
            <h2 class="section-title mt-2">How Does Hepatitis D Spread?</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="hdv-card dd-red">
                    <div class="hdv-icon hi-red"><i class="fa-solid fa-droplet"></i></div>
                    <h5>Transmission</h5>
                    <p>Like Hepatitis B, the virus is transmitted through infected blood, blood products, and other body fluids.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hdv-card">
                    <div class="hdv-icon hi-blue"><i class="fa-solid fa-users"></i></div>
                    <h5>People at higher risk include:</h5>
                    <ul>
                        <li>Those who share needles</li>
                        <li>Indigenous populations in high-prevalence regions</li>
                        <li>Patients receiving long-term haemodialysis</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hdv-card dd-green">
                    <div class="hdv-icon hi-green"><i class="fa-solid fa-person-breastfeeding"></i></div>
                    <h5>Mother-to-Child</h5>
                    <p>Mother-to-child transmission of Hepatitis D is considered uncommon.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ PREVENTION, DIAGNOSIS, TREATMENT ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Prevent, Detect &amp; Treat</div>
            <h2 class="section-title mt-2">Prevention, Diagnosis and Treatment</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="hdv-card dd-green">
                    <span class="hdv-tag tg-green">Prevention</span>
                    <div class="hdv-icon hi-green"><i class="fa-solid fa-syringe"></i></div>
                    <h5>Hepatitis B Vaccination</h5>
                    <p>Hepatitis B vaccination is the most effective way to prevent Hepatitis D, as HDV cannot survive without HBV.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hdv-card">
                    <span class="hdv-tag tg-blue">Diagnosis</span>
                    <div class="hdv-icon hi-blue"><i class="fa-solid fa-vial"></i></div>
                    <h5>HDV-RNA Testing</h5>
                    <p>Hepatitis D is diagnosed through HDV-RNA testing, which confirms active viral infection.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hdv-card dd-red">
                    <span class="hdv-tag tg-red">Treatment</span>
                    <div class="hdv-icon hi-red"><i class="fa-solid fa-user-doctor"></i></div>
                    <h5>Pegylated Interferon Alfa</h5>
                    <p>The standard treatment for Hepatitis D includes Pegylated Interferon Alfa, prescribed under the supervision of a liver specialist.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ GLOBAL DECLINE ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="eyebrow">Progress Through Vaccination</div>
                <h2 class="section-title mt-2 mb-3">A Steady Global Decline</h2>
                <p class="text-secondary mb-0">Protecting people from Hepatitis B also protects them from Hepatitis D.</p>
            </div>
            <div class="col-lg-7">
                <div class="hdv-card dd-green">
                    <div class="hdv-timeline">
                        <div class="hdv-tl-item">
                            <h6>1980</h6>
                            <p>Introduction of the Hepatitis B vaccine.</p>
                        </div>
                        <div class="hdv-tl-item">
                            <h6>Worldwide</h6>
                            <p>Implementation of successful vaccination programmes.</p>
                        </div>
                        <div class="hdv-tl-item">
                            <h6>Today</h6>
                            <p>The global prevalence of Hepatitis D has steadily declined.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdv-good d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-shield-heart text-nlfb-green mt-1"></i>
            <p class="mb-0">Since the introduction of the Hepatitis B vaccine in 1980 and the implementation of successful vaccination programmes worldwide, the global prevalence of Hepatitis D has steadily declined.</p>
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
                    <h3 class="mb-2">Living with Hepatitis B?</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Ask a liver specialist about Hepatitis D testing. Hepatitis B vaccination remains the best protection against Hepatitis D.</p>
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

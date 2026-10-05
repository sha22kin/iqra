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
    .hcv-intro p{font-size:1.02rem;color:var(--nl-text);}
    .hcv-note{background:var(--nlfb-cream);border-left:4px solid var(--nlfb-blue);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .bg-white .hcv-note{background:var(--nl-tint-blue-2);}
    .hcv-good{background:var(--nl-tint-green);border-left:4px solid var(--nlfb-green);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .hcv-warn{background:var(--nl-tint-red-2);border-left:4px solid var(--nlfb-red);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .hcv-note p,.hcv-good p,.hcv-warn p{color:var(--nl-text);}

    .hcv-fact-panel{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2rem;color:#fff;box-shadow:0 18px 40px rgba(6,38,74,.22);}
    .hcv-fact-panel h4{font-size:.78rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:rgba(255,255,255,.75);margin-bottom:1.25rem;}
    .hcv-fact-row{display:flex;gap:.9rem;align-items:center;margin-bottom:1rem;}
    .hcv-fact-row:last-child{margin-bottom:0;}
    .hcv-fact-row i{width:34px;height:34px;flex-shrink:0;border-radius:10px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;}
    .hcv-fact-row h6{margin-bottom:0;font-size:.92rem;color:#fff;}
    .hcv-fact-row p{margin-bottom:0;font-size:.8rem;color:rgba(255,255,255,.78);line-height:1.4;}

    .hcv-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.75rem 1.6rem;height:100%;display:flex;flex-direction:column;text-align:left;transition:transform .25s ease,box-shadow .25s ease;}
    .hcv-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hcv-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;margin-bottom:1.1rem;flex-shrink:0;}
    .hi-blue{background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .hi-green{background:linear-gradient(145deg,#00693e,#013d24);}
    .hi-red{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .hcv-card h5{font-size:1.05rem;line-height:1.35;margin-bottom:.6rem;color:var(--nlfb-ink);}
    .hcv-card p{font-size:.9rem;line-height:1.55;color:var(--nl-muted);margin-bottom:.7rem;}
    .hcv-card p:last-child{margin-bottom:0;}
    .hcv-card ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .hcv-card ul:last-child{margin-bottom:0;}
    .hcv-card ul li{position:relative;font-size:.86rem;line-height:1.5;color:var(--nl-muted);padding-left:1.05rem;margin-bottom:.4rem;}
    .hcv-card ul li:last-child{margin-bottom:0;}
    .hcv-card ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .cd-green ul li::before{background:var(--nlfb-green);}
    .cd-red ul li::before{background:var(--nlfb-red);}
    .hcv-card .hcv-sub-heading{font-size:.76rem;font-weight:700;letter-spacing:.02em;text-transform:uppercase;color:var(--nl-faint);margin:.9rem 0 .5rem;}
    .hcv-card .hcv-sub-heading:first-of-type{margin-top:0;}
    .hcv-tag{display:inline-block;font-size:.7rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;padding:.25rem .6rem;border-radius:999px;margin-bottom:.8rem;align-self:flex-start;}
    .hcv-tag.tg-blue{background:var(--nl-tint-blue);color:var(--nlfb-blue);}
    .hcv-tag.tg-green{background:var(--nl-tint-green-2);color:var(--nlfb-green);}
    .hcv-tag.tg-red{background:var(--nl-tint-red);color:var(--nlfb-red);}

    .hcv-stat{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem 1.5rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .hcv-stat:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hcv-stat .hcv-stat-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.4rem;line-height:1;color:var(--nlfb-blue);margin-bottom:.35rem;}
    .hcv-stat.st-red .hcv-stat-num{color:var(--nlfb-red);}
    .hcv-stat.st-green .hcv-stat-num{color:var(--nlfb-green);}
    .hcv-stat .hcv-stat-num small{font-size:1rem;font-weight:600;}
    .hcv-stat .hcv-stat-label{font-size:.78rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:.75rem;}
    .hcv-stat p{font-size:.9rem;color:var(--nl-muted);margin-bottom:0;line-height:1.5;}
    .hcv-bar{height:8px;border-radius:999px;background:var(--nl-line);overflow:hidden;margin:.9rem 0 .2rem;}
    .hcv-bar span{display:block;height:100%;border-radius:999px;background:linear-gradient(90deg,var(--nlfb-red),#8f0019);}
    .hcv-bar.br-blue span{background:linear-gradient(90deg,var(--nlfb-blue),var(--nlfb-blue-dark));}
    .hcv-bar.br-green span{background:linear-gradient(90deg,var(--nlfb-green),#013d24);}

    .hcv-risk-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.4rem 1.3rem;height:100%;display:flex;gap:1rem;align-items:flex-start;transition:transform .25s ease,box-shadow .25s ease;}
    .hcv-risk-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hcv-risk-card .hcv-risk-icon{flex-shrink:0;width:44px;height:44px;border-radius:50%;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;}
    .bg-nlfb-cream .hcv-risk-card .hcv-risk-icon{background:var(--nl-tint-blue);}
    .hcv-risk-card p{margin-bottom:0;font-size:.9rem;color:var(--nl-muted);line-height:1.5;}
    .hcv-chips{display:flex;flex-wrap:wrap;gap:.45rem;margin-top:.75rem;}
    .hcv-chips span{font-size:.78rem;font-weight:600;color:var(--nlfb-blue);background:var(--nl-tint-blue);border-radius:999px;padding:.3rem .75rem;}

    .hcv-list{list-style:none;padding-left:0;margin-bottom:0;}
    .hcv-list li{position:relative;padding:.6rem 0 .6rem 2rem;border-bottom:1px dashed var(--nl-line);color:var(--nl-text);font-size:.92rem;}
    .hcv-list li:last-child{border-bottom:none;}
    .hcv-list li > i{position:absolute;left:0;top:.75rem;color:var(--nlfb-blue);}
    .hcv-list.hl-red li > i{color:var(--nlfb-red);}
    .hcv-list.hl-green li > i{color:var(--nlfb-green);}
    .hcv-list .hcv-sublist{list-style:none;padding-left:0;margin:.5rem 0 0;display:flex;flex-wrap:wrap;gap:.45rem;}
    .hcv-list .hcv-sublist li{padding:.28rem .75rem;border:none;border-radius:999px;background:var(--nl-tint-red);color:var(--nlfb-red);font-size:.8rem;font-weight:600;}

    .hcv-symptom{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem .75rem;text-align:center;height:100%;transition:transform .2s ease,box-shadow .2s ease;}
    .hcv-symptom:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);}
    .hcv-symptom i{width:40px;height:40px;border-radius:10px;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;margin:0 auto .6rem;font-size:1.05rem;}
    .hcv-symptom.sy-red i{background:var(--nl-tint-red);color:var(--nlfb-red);}
    .hcv-symptom span{font-size:.82rem;font-weight:600;color:var(--nlfb-ink);line-height:1.3;display:block;}
    .hcv-group-title{font-size:.8rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nl-faint);margin-bottom:1rem;}

    .hcv-schedule{display:flex;align-items:center;flex-wrap:wrap;gap:.4rem;margin:.4rem 0 .2rem;}
    .hcv-dose{display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;height:64px;border-radius:50%;background:var(--nl-tint-blue);color:var(--nlfb-blue);font-family:"Poppins",sans-serif;font-weight:700;font-size:1.2rem;line-height:1;}
    .hcv-dose small{font-family:"Inter",sans-serif;font-size:.62rem;font-weight:600;text-transform:uppercase;margin-top:.2rem;}
    .hcv-dose-line{flex:0 0 18px;height:2px;background:#c9d9ea;}

    .hcv-level{display:flex;gap:1rem;align-items:center;padding:1rem 1.1rem;border-radius:var(--radius-md);margin-bottom:.75rem;background:var(--nl-surface);border:1px solid var(--nl-line);}
    .hcv-level:last-child{margin-bottom:0;}
    .hcv-level .hcv-level-val{flex:0 0 130px;font-family:"Poppins",sans-serif;font-weight:700;font-size:1rem;}
    .hcv-level p{margin-bottom:0;font-size:.9rem;color:var(--nl-text);}
    .lv-green{border-left:5px solid var(--nlfb-green);} .lv-green .hcv-level-val{color:var(--nlfb-green);}
    .lv-blue{border-left:5px solid var(--nlfb-blue);} .lv-blue .hcv-level-val{color:var(--nlfb-blue);}
    .lv-red{border-left:5px solid var(--nlfb-red);} .lv-red .hcv-level-val{color:var(--nlfb-red);}

    .hcv-term{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;}
    .hcv-term h5{display:flex;align-items:center;gap:.6rem;font-size:1.05rem;margin-bottom:.7rem;color:var(--nlfb-ink);}
    .hcv-term h5 i{color:var(--nlfb-blue);}
    .hcv-term p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;}
    .hcv-term p:last-child{margin-bottom:0;}
    .hcv-ig{display:flex;gap:.75rem;align-items:flex-start;padding:.7rem .9rem;border-radius:var(--radius-md);background:var(--nlfb-cream);margin-bottom:.6rem;font-size:.88rem;color:var(--nl-text);}
    .hcv-ig:last-child{margin-bottom:0;}
    .hcv-ig strong{flex:0 0 auto;color:var(--nlfb-blue);}

    .hcv-marker{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.6rem;height:100%;transition:transform .25s ease,box-shadow .25s ease;}
    .hcv-marker:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .hcv-marker .hcv-marker-code{display:inline-block;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.25rem;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);padding:.3rem .9rem;border-radius:10px;margin-bottom:.4rem;}
    .hcv-marker.mk-green .hcv-marker-code{background:linear-gradient(145deg,#00693e,#013d24);}
    .hcv-marker.mk-red .hcv-marker-code{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .hcv-marker h6{font-size:.85rem;color:var(--nl-faint);font-weight:600;margin-bottom:.9rem;}
    .hcv-marker p{font-size:.9rem;color:var(--nl-muted);line-height:1.55;margin-bottom:.7rem;}
    .hcv-marker p:last-child{margin-bottom:0;}
    .hcv-marker ul{list-style:none;padding-left:0;margin:0 0 .7rem;}
    .hcv-marker ul:last-child{margin-bottom:0;}
    .hcv-marker ul li{position:relative;font-size:.88rem;line-height:1.5;color:var(--nl-text);padding-left:1.05rem;margin-bottom:.35rem;}
    .hcv-marker ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .hcv-marker.mk-green ul li::before{background:var(--nlfb-green);}
    .hcv-marker.mk-red ul li::before{background:var(--nlfb-red);}

    .hcv-summary-panel{background:linear-gradient(160deg,var(--nlfb-blue-dark) 0%,#06264a 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;}
    .hcv-summary-panel ul{list-style:none;padding-left:0;margin-bottom:0;}
    .hcv-summary-panel li{position:relative;padding:.55rem 0 .55rem 2rem;font-size:.95rem;color:rgba(255,255,255,.92);border-bottom:1px solid rgba(255,255,255,.12);}
    .hcv-summary-panel li:last-child{border-bottom:none;}
    .hcv-summary-panel li i{position:absolute;left:0;top:.75rem;color:#5fd3a3;}
    .hcv-summary-panel p{color:rgba(255,255,255,.85);}

    @media (max-width:575.98px){
        .hcv-level{flex-direction:column;align-items:flex-start;gap:.3rem;}
        .hcv-level .hcv-level-val{flex:none;}
        .hcv-dose{width:54px;height:54px;font-size:1rem;}
    }
    .hcv-genotypes{display:flex;flex-wrap:wrap;gap:.45rem;margin-bottom:.9rem;}
    .hcv-genotypes span{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;color:var(--nlfb-blue);background:var(--nl-tint-blue);}
    .hcv-old{opacity:.95;}
    .hcv-new{border:2px solid var(--nlfb-green);}
    .hcv-cure-num{font-family:"Poppins",sans-serif;font-weight:700;font-size:2.2rem;line-height:1;color:var(--nlfb-green);}
    .hcv-regimen{display:flex;align-items:center;flex-wrap:wrap;gap:.75rem;margin-bottom:1rem;}
    .hcv-regimen > div{flex:1 1 140px;background:var(--nl-tint-green);border-radius:var(--radius-md);padding:.8rem 1rem;text-align:center;}
    .hcv-regimen strong{display:block;color:var(--nlfb-ink);font-size:.98rem;}
    .hcv-regimen span{font-size:.82rem;font-weight:600;color:var(--nlfb-green);}
    .hcv-regimen > i{color:var(--nlfb-green);}
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

<!-- ============ WHAT IS HEPATITIS C ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="hcv-intro">
                    <div class="eyebrow">Understanding the Infection</div>
                    <h2 class="section-title mt-2 mb-3">What is Hepatitis C?</h2>
                    <p class="mb-0">Hepatitis C is an inflammatory liver disease caused by the Hepatitis C Virus (HCV). The virus primarily infects liver cells and can lead to serious liver damage over time. In most cases, the infection progresses slowly, often causing significant liver damage before any symptoms appear. Chronic infection may result in liver fibrosis, cirrhosis, liver failure, and even liver cancer (hepatocellular carcinoma).</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hcv-fact-panel">
                    <h4>Chronic infection may result in:</h4>
                    <div class="hcv-fact-row">
                        <i class="fa-solid fa-layer-group"></i>
                        <div><h6>Liver fibrosis</h6></div>
                    </div>
                    <div class="hcv-fact-row">
                        <i class="fa-solid fa-disease"></i>
                        <div><h6>Cirrhosis</h6></div>
                    </div>
                    <div class="hcv-fact-row">
                        <i class="fa-solid fa-heart-crack"></i>
                        <div><h6>Liver failure</h6></div>
                    </div>
                    <div class="hcv-fact-row">
                        <i class="fa-solid fa-ribbon"></i>
                        <div><h6>Liver cancer</h6><p>Hepatocellular carcinoma</p></div>
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
            <h2 class="section-title mt-2">The "Silent Killer"</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:780px;margin-inline:auto;">Hepatitis C is often referred to as the "silent killer" because many infected individuals experience no noticeable symptoms for years.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hcv-card cd-green">
                    <span class="hcv-tag tg-green">Acute Hepatitis C</span>
                    <div class="hcv-stat-num text-nlfb-green mb-2" style="font-family:'Poppins',sans-serif;font-weight:700;font-size:2.2rem;">~30%</div>
                    <p>Approximately 30% of people naturally clear the virus within the first few months after infection. This stage is known as acute hepatitis C infection.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hcv-card cd-red">
                    <span class="hcv-tag tg-red">Chronic Hepatitis C</span>
                    <div class="hcv-stat-num text-nlfb-red mb-2" style="font-family:'Poppins',sans-serif;font-weight:700;font-size:2.2rem;">~70%</div>
                    <p>However, if the virus remains in the bloodstream for more than six months, the infection is classified as chronic hepatitis C. Around 70% of infected individuals develop chronic infection.</p>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-6 col-lg-3">
                <div class="hcv-stat">
                    <div class="hcv-stat-label"><i class="fa-solid fa-hourglass-half me-1"></i> Symptom Onset</div>
                    <div class="hcv-stat-num">15&ndash;20 <small>years</small></div>
                    <p class="mt-2">Symptoms may take 15&ndash;20 years to appear.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="hcv-stat st-red">
                    <div class="hcv-stat-label"><i class="fa-solid fa-disease me-1"></i> Develop Cirrhosis</div>
                    <div class="hcv-stat-num">15%&ndash;30%</div>
                    <p class="mt-2">Approximately 15%&ndash;30% of people with chronic hepatitis C eventually develop liver cirrhosis.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="hcv-stat">
                    <div class="hcv-stat-label"><i class="fa-solid fa-earth-asia me-1"></i> Global Cirrhosis Cases</div>
                    <div class="hcv-stat-num">~27%</div>
                    <p class="mt-2">Globally, hepatitis C accounts for nearly 27% of liver cirrhosis cases.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="hcv-stat st-red">
                    <div class="hcv-stat-label"><i class="fa-solid fa-ribbon me-1"></i> Global Liver Cancer Cases</div>
                    <div class="hcv-stat-num">25%</div>
                    <p class="mt-2">Hepatitis C accounts for 25% of liver cancer cases.</p>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-6">
                <div class="hcv-warn d-flex gap-3 align-items-start h-100">
                    <i class="fa-solid fa-hand-holding-heart text-nlfb-red mt-1"></i>
                    <p class="mb-0">It is also one of the <strong>leading reasons for liver transplantation</strong>.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hcv-note d-flex gap-3 align-items-start h-100" style="background:var(--nl-surface);">
                    <i class="fa-solid fa-circle-info text-nlfb-blue mt-1"></i>
                    <p class="mb-0">Once the virus enters the body, it rapidly multiplies until the immune system produces antibodies. Although the immune response may limit the infection, approximately <strong>75% of infected individuals</strong> continue to carry the virus for life unless treated.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ HOW MANY PEOPLE ARE AFFECTED ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">The Bigger Picture</div>
            <h2 class="section-title mt-2">How Many People Are Affected?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">According to the WHO Global Hepatitis Report 2026:</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="hcv-stat">
                    <div class="hcv-stat-label"><i class="fa-solid fa-people-group me-1"></i> Living with Chronic HCV</div>
                    <div class="hcv-stat-num">47 <small>million</small></div>
                    <p class="mt-2">Approximately 47 million people were living with chronic hepatitis C virus (HCV) infection in 2024.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hcv-stat">
                    <div class="hcv-stat-label"><i class="fa-solid fa-virus me-1"></i> New Infections</div>
                    <div class="hcv-stat-num">900,000</div>
                    <p class="mt-2">Around 900,000 new HCV infections occurred globally in 2024.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hcv-stat st-red">
                    <div class="hcv-stat-label"><i class="fa-solid fa-heart-pulse me-1"></i> Deaths</div>
                    <div class="hcv-stat-num">240,000</div>
                    <p class="mt-2">An estimated 240,000 people died from hepatitis C-related cirrhosis and liver cancer in 2024.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hcv-stat st-green">
                    <div class="hcv-stat-label"><i class="fa-solid fa-capsules me-1"></i> Treated Since 2015</div>
                    <div class="hcv-stat-num">20%</div>
                    <div class="hcv-bar br-green"><span style="width:20%"></span></div>
                    <p class="mt-2">Although hepatitis C is curable with highly effective direct-acting antiviral (DAA) medicines, global progress remains off track, and only 20% of people eligible for treatment since 2015 have received it.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ BANGLADESH ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Local Context</div>
                <h2 class="section-title mt-2 mb-3">Situation in Bangladesh</h2>
                <p class="text-secondary">According to the Directorate General of Health Services (DGHS) Health Bulletin 2024, the estimated prevalence of hepatitis C virus (HCV) infection in Bangladesh is 0.66%, while hepatitis B virus (HBV) prevalence is approximately 4%.</p>
                <p class="text-secondary mb-0">Although the prevalence of hepatitis C is relatively low, thousands of people are living with chronic infection, many of whom remain undiagnosed until they develop advanced liver disease such as cirrhosis or liver cancer.</p>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-6">
                        <div class="hcv-stat st-red">
                            <div class="hcv-stat-label">HCV Prevalence</div>
                            <div class="hcv-stat-num">0.66%</div>
                            <p class="mt-2">Hepatitis C virus (HCV) infection in Bangladesh</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hcv-stat">
                            <div class="hcv-stat-label">HBV Prevalence</div>
                            <div class="hcv-stat-num">~4%</div>
                            <p class="mt-2">Hepatitis B virus (HBV) in Bangladesh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hcv-warn d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
            <p class="mb-0">Hepatitis C is <strong>more infectious than HIV</strong> through blood exposure, and there is currently <strong>no vaccine</strong> to prevent hepatitis C infection. Prevention relies entirely on avoiding exposure to infected blood.</p>
        </div>
    </div>
</section>

<!-- ============ SYMPTOMS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Signs &amp; Symptoms</div>
            <h2 class="section-title mt-2">Symptoms of Hepatitis C</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Most people have no symptoms until the infection is detected through a blood test.</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="hcv-group-title">Common Symptoms</div>
                <div class="row g-3">
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3"><div class="hcv-symptom"><i class="fa-solid fa-temperature-high"></i><span>Fever</span></div></div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3"><div class="hcv-symptom"><i class="fa-solid fa-battery-quarter"></i><span>Fatigue and weakness</span></div></div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3"><div class="hcv-symptom"><i class="fa-solid fa-bone"></i><span>Muscle and joint pain</span></div></div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3"><div class="hcv-symptom"><i class="fa-solid fa-face-dizzy"></i><span>Nausea or vomiting</span></div></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hcv-group-title">Less Common Symptoms</div>
                <div class="row g-3">
                    <div class="col-12 col-md-4 col-lg-12 col-xl-4"><div class="hcv-symptom sy-red"><i class="fa-solid fa-droplet-slash"></i><span>Severe vomiting leading to dehydration</span></div></div>
                    <div class="col-12 col-md-4 col-lg-12 col-xl-4"><div class="hcv-symptom sy-red"><i class="fa-solid fa-eye"></i><span>Jaundice (yellowing of the skin, eyes, and dark urine)</span></div></div>
                    <div class="col-12 col-md-4 col-lg-12 col-xl-4"><div class="hcv-symptom sy-red"><i class="fa-solid fa-water"></i><span>Fluid accumulation in the abdomen (ascites)</span></div></div>
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
                <h2 class="section-title mt-2 mb-3">How Is Hepatitis C Transmitted?</h2>
                <p class="text-secondary mb-0">Hepatitis C spreads primarily through contact with infected blood. Transmission may occur through:</p>
            </div>
            <div class="col-lg-7">
                <ul class="hcv-list hl-red">
                    <li><i class="fa-solid fa-circle-exclamation"></i> Transfusion of unscreened blood or blood products</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Sharing needles or syringes, particularly among people who inject drugs</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Ear or nose piercing and tattooing with contaminated equipment</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Medical or dental procedures performed with improperly sterilized instruments</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Sharing personal items contaminated with blood, such as:
                        <ul class="hcv-sublist">
                            <li>Razors</li>
                            <li>Blades</li>
                            <li>Toothbrushes</li>
                        </ul>
                    </li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Unprotected sexual contact (less common but possible)</li>
                    <li><i class="fa-solid fa-circle-exclamation"></i> Mother-to-child transmission during childbirth (approximately 5% risk)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ CASUAL CONTACT ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Clearing the Myths</div>
            <h2 class="section-title mt-2">Can Hepatitis C Spread Through Casual Contact?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;"><strong>No.</strong> Hepatitis C does not spread through casual contact.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hcv-card cd-green">
                    <div class="hcv-icon hi-green"><i class="fa-solid fa-handshake"></i></div>
                    <h5>Hepatitis C does NOT spread through:</h5>
                    <ul>
                        <li>Handshakes</li>
                        <li>Hugging</li>
                        <li>Sharing meals</li>
                        <li>Sharing glasses, plates, cups, or utensils</li>
                        <li>Sharing clothing</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hcv-card cd-red">
                    <div class="hcv-icon hi-red"><i class="fa-solid fa-droplet"></i></div>
                    <h5>Blood-to-blood contact only</h5>
                    <p>The virus spreads only through blood-to-blood contact. Items contaminated with blood, such as razors, toothbrushes, needles, and blades, can transmit the infection.</p>
                    <ul>
                        <li>Razors</li>
                        <li>Toothbrushes</li>
                        <li>Needles</li>
                        <li>Blades</li>
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
            <h2 class="section-title mt-2">Who Is at Risk?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">People at increased risk include:</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="hcv-risk-card">
                    <div class="hcv-risk-icon"><i class="fa-solid fa-syringe"></i></div>
                    <p>People who inject drugs</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hcv-risk-card">
                    <div class="hcv-risk-icon"><i class="fa-solid fa-people-roof"></i></div>
                    <p>Household members and sexual partners of infected individuals</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="hcv-risk-card">
                    <div class="hcv-risk-icon"><i class="fa-solid fa-baby"></i></div>
                    <p>Babies born to mothers with hepatitis C</p>
                </div>
            </div>
            <div class="col-12">
                <div class="hcv-risk-card">
                    <div class="hcv-risk-icon"><i class="fa-solid fa-user-doctor"></i></div>
                    <div>
                        <p>Healthcare workers frequently exposed to blood, including:</p>
                        <div class="hcv-chips">
                            <span>Surgeons</span>
                            <span>Dialysis unit staff</span>
                            <span>Blood bank personnel</span>
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
                <h2 class="section-title mt-2 mb-3">Prevention</h2>
                <div class="hcv-warn d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-ban text-nlfb-red mt-1"></i>
                    <p class="mb-0">There is <strong>no vaccine</strong> available to prevent hepatitis C.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <p class="text-secondary mb-2">You can reduce your risk by:</p>
                <ul class="hcv-list hl-green">
                    <li><i class="fa-solid fa-circle-check"></i> Avoiding contact with infected blood and body fluids</li>
                    <li><i class="fa-solid fa-circle-check"></i> Receiving only screened blood and blood products</li>
                    <li><i class="fa-solid fa-circle-check"></i> Never sharing needles or syringes</li>
                    <li><i class="fa-solid fa-circle-check"></i> Ensuring sterile equipment is used for medical procedures, dental treatment, tattooing, and body piercing</li>
                    <li><i class="fa-solid fa-circle-check"></i> Avoiding shared razors, blades, toothbrushes, and other personal items that may be contaminated with blood</li>
                    <li><i class="fa-solid fa-circle-check"></i> Practicing safer sex, especially if blood exposure is possible</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ LAB TESTS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Diagnosis</div>
            <h2 class="section-title mt-2">Laboratory Tests for Hepatitis C</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:820px;margin-inline:auto;">Blood tests are essential for diagnosing hepatitis C and monitoring treatment. Follow-up testing is usually performed six months after infection to determine whether the virus has cleared or progressed to chronic infection.</p>
        </div>
        <div class="hcv-note d-flex gap-3 align-items-start mb-5" style="background:var(--nl-surface);">
            <i class="fa-solid fa-user-doctor text-nlfb-blue mt-1"></i>
            <p class="mb-0">Everyone diagnosed with hepatitis C should consult a hepatologist or gastroenterologist for proper evaluation and treatment.</p>
        </div>

        <div class="hcv-group-title text-center">Important Laboratory Terms</div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="hcv-marker">
                    <div class="hcv-marker-code">Antigen</div>
                    <p class="mt-2">A foreign substance, such as a protein from the hepatitis C virus, that triggers an immune response.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hcv-marker mk-green">
                    <div class="hcv-marker-code">Anti-HCV</div>
                    <h6>Antibody</h6>
                    <p>Proteins produced by the immune system in response to HCV infection. A positive Anti-HCV test indicates either a current or previous hepatitis C infection. <strong>It does not confirm active infection.</strong></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="hcv-marker mk-red">
                    <div class="hcv-marker-code">HCV RNA</div>
                    <h6>Genetic Material of the Virus</h6>
                    <p>The genetic material of the hepatitis C virus. <strong>Detection of HCV RNA confirms an active hepatitis C infection.</strong></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="hcv-marker">
                    <div class="hcv-marker-code">Viral Load</div>
                    <h6>Quantitative HCV RNA</h6>
                    <p>The amount of hepatitis C virus present in the blood. Viral load does not indicate the severity of liver damage but is important for monitoring treatment response. This is measured using a quantitative HCV RNA test.</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="hcv-marker">
                    <div class="hcv-marker-code">Genotype</div>
                    <h6>Six Major Genotypes (1&ndash;6)</h6>
                    <div class="hcv-genotypes">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span>
                    </div>
                    <p>Hepatitis C has six major genotypes (1&ndash;6). Although they are all hepatitis C viruses, they differ slightly in genetic structure. Genotyping may be required when planning treatment in certain cases.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ TREATMENT ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Living with Hepatitis C</div>
                <h2 class="section-title mt-2 mb-3">Treatment</h2>
                <p class="text-secondary">Being diagnosed with hepatitis C can be distressing. Fortunately, hepatitis C is now a <strong>curable disease</strong> for most people with modern antiviral therapy.</p>
                <p class="text-secondary mb-0">Some individuals may already have liver damage at the time of diagnosis, while others may not. Preventing additional liver injury is essential.</p>
            </div>
            <div class="col-lg-6">
                <div class="hcv-card cd-green">
                    <div class="hcv-icon hi-green"><i class="fa-solid fa-heart-circle-check"></i></div>
                    <h5>Patients are advised to:</h5>
                    <ul>
                        <li>Avoid alcohol and smoking</li>
                        <li>Get tested and vaccinated against Hepatitis A and Hepatitis B, if not already immune</li>
                        <li>Maintain a healthy body weight</li>
                        <li>Eat a balanced, nutritious diet</li>
                        <li>Attend regular medical follow-up</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="hcv-good d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-lightbulb text-nlfb-green mt-1"></i>
            <p class="mb-0">Early diagnosis and treatment significantly reduce the risk of liver cirrhosis and liver cancer.</p>
        </div>
    </div>
</section>

<!-- ============ ANTIVIRAL THERAPY ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6">
                <div class="eyebrow">Curing the Infection</div>
                <h2 class="section-title mt-2 mb-3">Antiviral Therapy</h2>
                <p class="text-secondary mb-0">Treatment is recommended for people with chronic hepatitis C to eliminate the virus and prevent progressive liver damage.</p>
            </div>
            <div class="col-lg-6">
                <p class="text-secondary mb-2">Patients should consult a hepatologist or gastroenterologist, who will assess:</p>
                <ul class="hcv-list">
                    <li><i class="fa-solid fa-circle-check"></i> Whether the virus is actively replicating</li>
                    <li><i class="fa-solid fa-circle-check"></i> The degree of liver damage</li>
                    <li><i class="fa-solid fa-circle-check"></i> The most appropriate treatment regimen</li>
                </ul>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="hcv-card hcv-old">
                    <span class="hcv-tag tg-red">Previous Treatment</span>
                    <div class="hcv-icon hi-red"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    <p>Historically, treatment consisted of:</p>
                    <ul>
                        <li>Pegylated Interferon injections</li>
                        <li>Ribavirin tablets</li>
                    </ul>
                    <p class="mt-2">These treatments were expensive, had significant side effects, and lower cure rates.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hcv-card cd-green hcv-new">
                    <span class="hcv-tag tg-green">Current Standard Treatment</span>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="hcv-icon hi-green mb-0"><i class="fa-solid fa-capsules"></i></div>
                        <div>
                            <div class="hcv-cure-num">&gt;95%</div>
                            <div class="hcv-stat-label mb-0">Cure rate with DAAs</div>
                        </div>
                    </div>
                    <p>Today, Direct-Acting Antiviral (DAA) medications have revolutionized hepatitis C treatment, achieving cure rates of more than 95%.</p>
                    <div class="hcv-sub-heading">A commonly prescribed regimen includes:</div>
                    <div class="hcv-regimen">
                        <div><strong>Sofosbuvir</strong><span>400 mg</span></div>
                        <i class="fa-solid fa-plus"></i>
                        <div><strong>Velpatasvir</strong><span>100 mg</span></div>
                    </div>
                    <ul>
                        <li>This combination is effective against all major HCV genotypes (pan-genotypic).</li>
                        <li>Treatment is generally given for 12&ndash;24 weeks, depending on the presence or absence of liver cirrhosis.</li>
                        <li>DAAs are highly effective, well tolerated, and have far fewer side effects than older therapies.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ PREGNANCY ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Mother &amp; Baby</div>
                <h2 class="section-title mt-2 mb-3">Hepatitis C and Pregnancy</h2>
                <p class="text-secondary">Pregnant women with hepatitis C often worry about transmitting the virus to their babies.</p>
                <div class="hcv-stat st-green">
                    <div class="hcv-stat-label"><i class="fa-solid fa-person-pregnant me-1"></i> Mother-to-Child Transmission Risk</div>
                    <div class="hcv-stat-num">5%&ndash;10%</div>
                    <div class="hcv-bar br-green"><span style="width:10%"></span></div>
                    <p class="mt-2">The risk of mother-to-child transmission is approximately 5%&ndash;10%, which is relatively low.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hcv-warn d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
                    <p class="mb-0">However, certain hepatitis C medications&mdash;particularly <strong>Ribavirin</strong>&mdash;can cause serious birth defects. Women and men taking Ribavirin should use effective contraception and avoid pregnancy during treatment and for the recommended period after treatment, as advised by their physician.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ KEY MESSAGE ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="hcv-summary-panel">
                    <h2 class="mb-4" style="color:#fff;">Key Message</h2>
                    <ul>
                        <li><i class="fa-solid fa-circle-check"></i> Hepatitis C is often a silent disease with few or no symptoms.</li>
                        <li><i class="fa-solid fa-circle-check"></i> There is no vaccine against hepatitis C.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Early diagnosis through blood testing is essential.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Modern Direct-Acting Antiviral (DAA) medicines can cure more than 95% of patients.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Preventing exposure to infected blood remains the most effective way to avoid hepatitis C infection.</li>
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
                    <h3 class="mb-2">Concerned About Hepatitis C?</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Hepatitis C is curable. Get a blood test, and consult a hepatologist or gastroenterologist for proper evaluation and treatment.</p>
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

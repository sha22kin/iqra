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
    .wil-intro p{font-size:1.02rem;color:var(--nl-text);}
    .wil-note{
        background:var(--nlfb-cream);
        border-left:4px solid var(--nlfb-blue);
        border-radius:var(--radius-md);
        padding:1.1rem 1.4rem;
    }
    .wil-warn{
        background:var(--nl-tint-red-2);
        border-left:4px solid var(--nlfb-red);
        border-radius:var(--radius-md);
        padding:1.1rem 1.4rem;
    }
    .wil-intro-img{
        border-radius:var(--radius-lg);
        overflow:hidden;
        box-shadow:0 18px 40px rgba(6,38,74,.14);
        background:linear-gradient(160deg,var(--nlfb-cream) 0%,#e8f1fa 100%);
        min-height:340px;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:2rem;
        position:relative;
    }
    .wil-liver-svg{
        width:100%;
        max-width:340px;
        height:auto;
        filter:drop-shadow(0 14px 24px rgba(6,38,74,.18));
    }
    .wil-lobe-label{
        font-size:.72rem;
        font-weight:700;
        letter-spacing:.03em;
        text-transform:uppercase;
        fill:var(--nlfb-heading);
    }
    .wil-stat{
        background:var(--nl-surface);
        border:1px solid var(--nl-line);
        border-radius:var(--radius-lg);
        padding:1.5rem 1.2rem;
        text-align:center;
        height:100%;
        transition:transform .25s ease,box-shadow .25s ease;
    }
    .wil-stat:hover{
        transform:translateY(-6px);
        box-shadow:0 18px 34px rgba(6,38,74,.12);
    }
    .wil-stat .wil-stat-icon{
        width:52px;height:52px;border-radius:14px;
        display:flex;align-items:center;justify-content:center;
        font-size:1.3rem;color:#fff;margin:0 auto 1rem;
    }
    .wil-stat h3{
        font-size:1.4rem;
        color:var(--nlfb-heading);
        margin-bottom:.25rem;
    }
    .wil-stat p{
        font-size:.84rem;
        color:var(--nl-muted);
        margin-bottom:0;
    }
    .test-card{
        background:var(--nl-surface);
        border:1px solid var(--nl-line);
        border-radius:var(--radius-lg);
        padding:1.75rem 1.6rem;
        height:100%;
        display:flex;
        flex-direction:column;
        text-align:left;
        transition:transform .25s ease,box-shadow .25s ease;
    }
    .test-card:hover{
        transform:translateY(-6px);
        box-shadow:0 18px 34px rgba(6,38,74,.12);
    }
    .test-icon{
        width:52px;height:52px;border-radius:14px;
        display:flex;align-items:center;justify-content:center;
        font-size:1.3rem;color:#fff;margin-bottom:1.1rem;
        flex-shrink:0;
    }
    .ti-blue{background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .ti-green{background:linear-gradient(145deg,#00693e,#013d24);}
    .ti-red{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .test-card h5{
        font-size:1.05rem;
        line-height:1.35;
        margin-bottom:.6rem;
        color:var(--nlfb-ink);
    }
    .test-card p{font-size:.9rem;line-height:1.55;color:var(--nl-muted);margin-bottom:.7rem;}
    .test-card ul{
        list-style:none;
        padding-left:0;
        margin:auto 0 0;
        padding-top:.75rem;
        border-top:1px dashed var(--nl-line);
    }
    .test-card ul li{
        position:relative;
        font-size:.84rem;
        line-height:1.5;
        color:var(--nl-muted);
        padding-left:1.05rem;
        margin-bottom:.4rem;
    }
    .test-card ul li:last-child{margin-bottom:0;}
    .test-card ul li::before{
        content:"";
        position:absolute;
        left:0;
        top:.55em;
        width:6px;height:6px;
        border-radius:50%;
        background:var(--nlfb-blue);
    }
    .tc-green ul li::before{background:var(--nlfb-green);}
    .tc-red ul li::before{background:var(--nlfb-red);}
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
            <div class="col-lg-6">
                <div class="wil-intro mb-4">
                    <div class="eyebrow">Know Your Body</div>
                    <h2 class="section-title mt-2 mb-3">What Is the Liver?</h2>
                    <p>The liver is one of the most vital organs in the human body, performing more than 500 essential functions. It is not only an organ but also a gland, as it produces and secretes substances that are essential for digestion. Because of its critical role, any disease or infection affecting the liver can have serious consequences for overall health.</p>
                </div>
                <div class="wil-note d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-circle-info text-nlfb-blue mt-1"></i>
                    <p class="mb-0">The liver is located in the upper right side of the abdomen, just beneath the diaphragm. It lies above the stomach, right kidney, and intestines and is protected by the lower ribs.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wil-intro-img">
                    <svg class="wil-liver-svg" viewBox="0 0 400 320" role="img" aria-label="Illustration of the human liver showing its right and left lobes">
                        <defs>
                            <linearGradient id="liverGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#0d74c9"/>
                                <stop offset="55%" stop-color="#0b5fa5"/>
                                <stop offset="100%" stop-color="#06264a"/>
                            </linearGradient>
                            <linearGradient id="liverShine" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#ffffff" stop-opacity=".35"/>
                                <stop offset="100%" stop-color="#ffffff" stop-opacity="0"/>
                            </linearGradient>
                        </defs>

                        <!-- Right Lobe (larger) -->
                        <path d="M95,150 C70,105 100,55 165,45 C215,37 258,55 278,90 C300,82 325,98 333,128 C345,165 322,205 285,215 C288,238 268,258 240,258 C218,272 185,266 165,250 C130,252 100,228 92,195 C78,185 82,165 95,150 Z" fill="url(#liverGrad)"/>

                        <!-- Left Lobe (smaller, overlapping) -->
                        <path d="M278,90 C312,80 345,100 350,138 C354,168 336,192 308,198 C300,175 288,150 278,128 C272,114 273,100 278,90 Z" fill="#00693e" opacity=".92"/>

                        <!-- Shine overlay -->
                        <path d="M95,150 C70,105 100,55 165,45 C215,37 258,55 278,90 C260,88 230,90 200,100 C160,112 120,130 95,150 Z" fill="url(#liverShine)"/>

                        <!-- Lobe divider -->
                        <path d="M250,95 C258,140 258,190 245,255" stroke="rgba(255,255,255,.35)" stroke-width="2" fill="none" stroke-dasharray="4 5"/>

                        <!-- Right lobe label -->
                        <line x1="150" y1="150" x2="90" y2="150" stroke="#8fa0b3" stroke-width="1.5"/>
                        <circle cx="150" cy="150" r="4" fill="#0b5fa5"/>
                        <text x="40" y="146" class="wil-lobe-label" text-anchor="middle">Right</text>
                        <text x="40" y="160" class="wil-lobe-label" text-anchor="middle">Lobe</text>

                        <!-- Left lobe label -->
                        <line x1="310" y1="145" x2="360" y2="145" stroke="#8fa0b3" stroke-width="1.5"/>
                        <circle cx="310" cy="145" r="4" fill="#00693e"/>
                        <text x="365" y="141" class="wil-lobe-label" text-anchor="start">Left</text>
                        <text x="365" y="155" class="wil-lobe-label" text-anchor="start">Lobe</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ QUICK FACTS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Anatomy at a Glance</div>
            <h2 class="section-title mt-2">Location &amp; Quick Facts</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="wil-stat">
                    <div class="wil-stat-icon ti-blue"><i class="fa-solid fa-location-dot"></i></div>
                    <h3>Upper Right</h3>
                    <p>Sits in the upper right abdomen, beneath the diaphragm</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="wil-stat">
                    <div class="wil-stat-icon ti-green"><i class="fa-solid fa-layer-group"></i></div>
                    <h3>2 Lobes</h3>
                    <p>Made up of a right lobe and a left lobe</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="wil-stat">
                    <div class="wil-stat-icon ti-red"><i class="fa-solid fa-weight-scale"></i></div>
                    <h3>~1.5 kg</h3>
                    <p>Average weight of a healthy adult liver</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="wil-stat">
                    <div class="wil-stat-icon ti-blue"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Rib Protected</h3>
                    <p>Shielded by the lower ribs above the stomach and intestines</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ FUNCTIONS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">The Body's Biochemical Factory</div>
            <h2 class="section-title mt-2">Functions of the Liver</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">The liver is responsible for producing, storing, processing, and detoxifying numerous substances essential for life.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="test-card tc-blue">
                    <div class="test-icon ti-blue"><i class="fa-solid fa-industry"></i></div>
                    <h5>What Does the Liver Produce?</h5>
                    <p>It plays a central role in digestion and metabolism.</p>
                    <ul>
                        <li>Converts nutrients from food into energy</li>
                        <li>Produces bile to digest fats &amp; absorb vitamins</li>
                        <li>Produces cholesterol &amp; triglycerides</li>
                        <li>Stores &amp; releases glucose as glycogen</li>
                        <li>Produces blood proteins like albumin</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="test-card tc-green">
                    <div class="test-icon ti-green"><i class="fa-solid fa-warehouse"></i></div>
                    <h5>What Does the Liver Store?</h5>
                    <p>It serves as the body's storage center, releasing nutrients whenever needed.</p>
                    <ul>
                        <li>Vitamins A, D, E, and B12</li>
                        <li>Minerals such as iron and copper</li>
                        <li>Glycogen, the stored form of glucose</li>
                        <li>Produces clotting factors for wound healing</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="test-card tc-red">
                    <div class="test-icon ti-red"><i class="fa-solid fa-filter"></i></div>
                    <h5>Detoxification</h5>
                    <p>One of the liver's most important roles is cleansing the body of harmful substances.</p>
                    <ul>
                        <li>Alcohol</li>
                        <li>Medications</li>
                        <li>Environmental chemicals</li>
                        <li>Toxins</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="test-card tc-blue">
                    <div class="test-icon ti-blue"><i class="fa-solid fa-recycle"></i></div>
                    <h5>Waste Processing &amp; Metabolism</h5>
                    <p>The liver helps the body eliminate waste products by:</p>
                    <ul>
                        <li>Converting ammonia into urea, excreted by the kidneys</li>
                        <li>Processing bilirubin from old red blood cells</li>
                        <li>Preventing jaundice caused by bilirubin build-up</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="test-card tc-green">
                    <div class="test-icon ti-green"><i class="fa-solid fa-venus-mars"></i></div>
                    <h5>Hormone Regulation</h5>
                    <p>The liver helps regulate the levels of several hormones circulating in the blood, particularly sex hormones such as:</p>
                    <ul>
                        <li>Testosterone</li>
                        <li>Estrogen</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="test-card tc-red">
                    <div class="test-icon ti-red"><i class="fa-solid fa-shield-virus"></i></div>
                    <h5>Immune Defense</h5>
                    <p>The liver plays an important role in the body's immune system, helping remove bacteria, viruses, and other harmful microorganisms from the bloodstream to support the body's natural defenses.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ DETOX WARNING ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Protect Your Liver</div>
                <h2 class="section-title mt-2 mb-3">Detoxification: The Liver's Cleansing Function</h2>
                <p class="text-secondary">Although the liver can break down alcohol, excessive alcohol consumption can overwhelm its capacity and eventually lead to liver damage.</p>
                <p class="text-secondary mb-0">Similarly, taking medications without medical advice, using counterfeit or unapproved drugs, or combining multiple medications inappropriately can seriously harm the liver. Some medications are highly toxic to the liver and should only be taken under the supervision of a qualified healthcare professional.</p>
            </div>
            <div class="col-lg-6">
                <div class="wil-warn d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
                    <p class="mb-0">When bilirubin accumulates in the bloodstream, it causes <strong>jaundice</strong>, resulting in yellowing of the skin and eyes &mdash; a common sign of liver disease, including hepatitis.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ EARLY DETECTION CTA ============ -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-heart-circle-check" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Liver Disease: Why Early Detection Matters</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">The liver is remarkably resilient and keeps working even when damaged. Early diagnosis, healthy lifestyle choices, vaccination against hepatitis, and regular medical check-ups can help protect your liver and maintain lifelong health.</p>
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

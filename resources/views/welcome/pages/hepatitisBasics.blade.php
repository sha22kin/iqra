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
    .hep-intro p{font-size:1.02rem;color:var(--nl-text);}
    .hep-note{
        background:var(--nlfb-cream);
        border-left:4px solid var(--nlfb-blue);
        border-radius:var(--radius-md);
        padding:1.1rem 1.4rem;
    }
    .hep-good{
        background:var(--nl-tint-green);
        border-left:4px solid var(--nlfb-green);
        border-radius:var(--radius-md);
        padding:1.1rem 1.4rem;
    }
    .hep-panel{
        background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);
        border-radius:var(--radius-lg);
        padding:2rem;
        color:#fff;
        box-shadow:0 18px 40px rgba(6,38,74,.22);
    }
    .hep-panel h4{
        font-size:.78rem;
        font-weight:700;
        letter-spacing:.04em;
        text-transform:uppercase;
        color:rgba(255,255,255,.75);
        margin-bottom:1.25rem;
    }
    .hep-panel-stat{
        text-align:center;
        padding:.75rem .5rem;
    }
    .hep-panel-stat h2{
        font-size:2rem;
        font-weight:800;
        margin-bottom:.15rem;
        color:#fff;
    }
    .hep-panel-stat p{
        font-size:.78rem;
        color:rgba(255,255,255,.8);
        margin-bottom:0;
        line-height:1.4;
    }
    .hep-panel-divider{
        border-top:1px solid rgba(255,255,255,.18);
        margin:1.25rem 0;
    }
    .hep-stat{
        background:var(--nl-surface);
        border:1px solid var(--nl-line);
        border-radius:var(--radius-lg);
        padding:1.6rem 1.2rem;
        text-align:center;
        height:100%;
        transition:transform .25s ease,box-shadow .25s ease;
    }
    .hep-stat:hover{
        transform:translateY(-6px);
        box-shadow:0 18px 34px rgba(6,38,74,.12);
    }
    .hep-stat .hep-stat-icon{
        width:52px;height:52px;border-radius:14px;
        display:flex;align-items:center;justify-content:center;
        font-size:1.3rem;color:#fff;margin:0 auto 1rem;
    }
    .hep-stat h3{
        font-size:1.5rem;
        color:var(--nlfb-heading);
        margin-bottom:.25rem;
    }
    .hep-stat p{
        font-size:.84rem;
        color:var(--nl-muted);
        margin-bottom:0;
    }
    .ti-blue{background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .ti-green{background:linear-gradient(145deg,#00693e,#013d24);}
    .ti-red{background:linear-gradient(145deg,#e4002b,#8f0019);}
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
    .test-card h5{
        font-size:1.1rem;
        line-height:1.35;
        margin-bottom:.15rem;
        color:var(--nlfb-ink);
    }
    .test-sub{
        font-size:.74rem;
        font-weight:700;
        letter-spacing:.03em;
        text-transform:uppercase;
        color:var(--nl-faint);
        margin-bottom:.7rem;
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
    .hep-diff-list{
        list-style:none;
        padding-left:0;
        margin-bottom:0;
    }
    .hep-diff-list li{
        position:relative;
        padding:.6rem 0 .6rem 2rem;
        border-bottom:1px dashed var(--nl-line);
        color:var(--nl-text);
        font-size:.95rem;
    }
    .hep-diff-list li:last-child{border-bottom:none;}
    .hep-diff-list li i{
        position:absolute;
        left:0;
        top:.75rem;
        color:var(--nlfb-blue);
    }
    .hep-vax-card{
        background:var(--nl-surface);
        border:1px solid var(--nl-line);
        border-radius:var(--radius-lg);
        padding:1.6rem 1.5rem;
        height:100%;
    }
    .hep-vax-card h5{
        color:var(--nlfb-heading);
        margin-bottom:.85rem;
        display:flex;
        align-items:center;
        gap:.6rem;
    }
    .hep-vax-card ul{
        padding-left:1.1rem;
        margin-bottom:0;
        color:var(--nl-muted);
        font-size:.9rem;
        line-height:1.7;
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
                <div class="hep-intro mb-4">
                    <div class="eyebrow">Understanding Liver Inflammation</div>
                    <h2 class="section-title mt-2 mb-3">What Is Hepatitis?</h2>
                    <p>Hepatitis is the inflammation of the liver. The most common causes of liver inflammation include infections by microorganisms such as viruses, bacteria, and parasites (protozoa). In addition, hepatitis can also result from excessive alcohol consumption, certain medications and drugs, toxins, and metabolic disorders.</p>
                    <p>In viral hepatitis, the virus primarily attacks liver cells. The major hepatitis viruses affecting humans are <strong>Hepatitis A (HAV), Hepatitis B (HBV), Hepatitis C (HCV), Hepatitis D (HDV)</strong> and <strong>Hepatitis E (HEV)</strong>.</p>
                </div>
                <div class="hep-note d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-circle-info text-nlfb-blue mt-1"></i>
                    <p class="mb-0">Viral hepatitis occurs in two forms &mdash; <strong>Acute infection</strong>, a short-term infection usually lasting less than six months, and <strong>Chronic infection</strong>, a long-term infection persisting for more than six months that may lead to serious liver complications.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hep-panel">
                    <h4>WHO Global Hepatitis Report 2026</h4>
                    <div class="row">
                        <div class="col-6 hep-panel-stat">
                            <h2>1.34M</h2>
                            <p>Deaths in 2024 caused by viral hepatitis</p>
                        </div>
                        <div class="col-6 hep-panel-stat">
                            <h2>~3,700</h2>
                            <p>Deaths every single day worldwide</p>
                        </div>
                    </div>
                    <div class="hep-panel-divider"></div>
                    <div class="row">
                        <div class="col-6 hep-panel-stat">
                            <h2>1.1M</h2>
                            <p>Deaths (82%) attributable to Hepatitis B</p>
                        </div>
                        <div class="col-6 hep-panel-stat">
                            <h2>240K</h2>
                            <p>Deaths (18%) caused by Hepatitis C</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="hep-note d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-globe text-nlfb-blue mt-1"></i>
                    <p class="mb-0">According to the World Health Organization (WHO) Global Hepatitis Report 2026, viral hepatitis remains one of the world's leading public health challenges, causing an estimated <strong>1.34 million deaths in 2024</strong> &mdash; equivalent to approximately <strong>3,700 deaths every day</strong>. Of these, around <strong>1.1 million deaths (82%)</strong> were attributable to Hepatitis B, while <strong>240,000 deaths (18%)</strong> were caused by Hepatitis C.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ BANGLADESH BURDEN ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">DGHS Health Bulletin 2024</div>
            <h2 class="section-title mt-2">Hepatitis Burden in Bangladesh</h2>
        </div>
        <div class="row g-4 justify-content-center align-items-stretch">
            <div class="col-md-6 col-lg-3">
                <div class="hep-stat">
                    <div class="hep-stat-icon ti-blue"><i class="fa-solid fa-syringe"></i></div>
                    <h3>~4.0%</h3>
                    <p>Estimated prevalence of Hepatitis B in Bangladesh</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hep-stat">
                    <div class="hep-stat-icon ti-red"><i class="fa-solid fa-droplet"></i></div>
                    <h3>~0.6%</h3>
                    <p>Estimated prevalence of Hepatitis C in Bangladesh</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hep-stat">
                    <div class="hep-stat-icon ti-green"><i class="fa-solid fa-user-doctor"></i></div>
                    <h3>&lt;1%</h3>
                    <p>Of the population infected with Hepatitis C</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="hep-note d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-flag text-nlfb-blue mt-1"></i>
                    <p class="mb-0">According to the Directorate General of Health Services (DGHS) Health Bulletin 2024, Bangladesh continues to face a significant burden of viral hepatitis. The estimated prevalence of hepatitis B and hepatitis C is approximately <strong>4.0%</strong> and <strong>0.6%</strong>, respectively, making viral hepatitis a major public health concern. Hepatitis contributes substantially to chronic liver disease, cirrhosis and liver cancer in the country.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ HOW THEY DIFFER ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="eyebrow">Same Organ, Different Behaviour</div>
                <h2 class="section-title mt-2 mb-3">How Hepatitis Viruses Differ</h2>
                <p class="text-secondary mb-0">Although all hepatitis viruses affect the liver, they differ in several important ways &mdash; which shapes how each type is prevented, diagnosed, and treated.</p>
            </div>
            <div class="col-lg-7">
                <ul class="hep-diff-list">
                    <li><i class="fa-solid fa-circle-check"></i> Mode of transmission</li>
                    <li><i class="fa-solid fa-circle-check"></i> Incubation period (time between infection and the appearance of symptoms)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Availability and effectiveness of vaccines</li>
                    <li><i class="fa-solid fa-circle-check"></i> Risk of developing chronic infection</li>
                    <li><i class="fa-solid fa-circle-check"></i> Rate of liver damage</li>
                    <li><i class="fa-solid fa-circle-check"></i> Potential to cause liver cirrhosis and liver cancer</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ TYPES OF VIRAL HEPATITIS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Five Main Types</div>
            <h2 class="section-title mt-2">Types of Viral Hepatitis</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:760px;margin-inline:auto;">There are five main types of hepatitis viruses: Hepatitis A, B, C, D, and E. In Bangladesh, Hepatitis A, B, C, and E are relatively common, while Hepatitis D is less frequently encountered.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="test-card tc-blue">
                    <div class="test-icon ti-blue"><i class="fa-solid fa-utensils"></i></div>
                    <h5>Hepatitis A (HAV)</h5>
                    <div class="test-sub">Fecal&ndash;Oral Route</div>
                    <p>Transmitted primarily by consuming contaminated food or water. It is found worldwide but is more common in areas with poor sanitation and inadequate sewage disposal systems.</p>
                    <ul>
                        <li>Generally not a life-threatening disease</li>
                        <li>Can cause severe illness in people with HIV or pre-existing chronic liver disease</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="test-card tc-red">
                    <div class="test-icon ti-red"><i class="fa-solid fa-droplet"></i></div>
                    <h5>Hepatitis B (HBV)</h5>
                    <div class="test-sub">Blood &amp; Body Fluids</div>
                    <p>Far more infectious than HIV. Can spread through:</p>
                    <ul>
                        <li>Unprotected sexual contact</li>
                        <li>Sharing needles, syringes, razors, or toothbrushes</li>
                        <li>Mother-to-child transmission during childbirth</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="test-card tc-green">
                    <div class="test-icon ti-green"><i class="fa-solid fa-vial-circle-check"></i></div>
                    <h5>Hepatitis C (HCV)</h5>
                    <div class="test-sub">Mainly Blood-Borne</div>
                    <p>Transmitted primarily through infected blood and, less commonly, through other body fluids. Sexual transmission is possible but less frequent. Mother-to-child transmission during childbirth can also occur, with an estimated transmission risk of approximately 5%. Less than 1% of the population in Bangladesh is infected with Hepatitis C.</p>
                    <p>Unlike Hepatitis A, most Hepatitis C infections become chronic, increasing the risk of:</p>
                    <ul>
                        <li>Chronic liver disease</li>
                        <li>Liver cirrhosis</li>
                        <li>Liver cancer</li>
                        <li>Liver failure</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="hep-note d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-circle-info text-nlfb-blue mt-1"></i>
            <p class="mb-0">Hepatitis D (HDV) occurs only alongside Hepatitis B infection and is less frequently encountered in Bangladesh, while Hepatitis E (HEV), like Hepatitis A, spreads mainly through contaminated food or water and is relatively common in the country.</p>
        </div>
    </div>
</section>

<!-- ============ HEPATITIS B DETAIL ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Know the Warning Signs</div>
                <h2 class="section-title mt-2 mb-3">Hepatitis B: Symptoms &amp; Complications</h2>
                <p class="text-secondary mb-2">Most people with Hepatitis B have no noticeable symptoms. When symptoms occur, they may include:</p>
                <ul class="hep-diff-list mb-3">
                    <li><i class="fa-solid fa-circle-check"></i> Loss of appetite</li>
                    <li><i class="fa-solid fa-circle-check"></i> Nausea and vomiting</li>
                    <li><i class="fa-solid fa-circle-check"></i> Abdominal pain</li>
                    <li><i class="fa-solid fa-circle-check"></i> Jaundice (yellowing of the eyes and skin)</li>
                </ul>
                <p class="text-secondary mb-0">The first six months after infection are considered the acute phase. In most adults, the body's immune system clears the virus during this period. However, if the virus is not eliminated within six months, the infection may become chronic &mdash; meaning the person carries the virus for life and remains at risk of long-term liver disease. Approximately <strong>4% of the population in Bangladesh</strong> is living with chronic Hepatitis B infection.</p>
            </div>
            <div class="col-lg-6">
                <div class="test-card tc-red">
                    <div class="test-icon ti-red"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <h5>Possible Complications If Untreated</h5>
                    <ul>
                        <li>Liver failure</li>
                        <li>Liver cirrhosis</li>
                        <li>Liver cancer</li>
                        <li>Premature death</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ HEPATITIS B VACCINATION ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Prevention Works</div>
            <h2 class="section-title mt-2">Hepatitis B Vaccination</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Hepatitis B infection can be effectively prevented through vaccination.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="hep-vax-card">
                    <h5><i class="fa-solid fa-calendar-check text-nlfb-blue"></i> WHO-Recommended Schedules</h5>
                    <ul>
                        <li>0, 1, and 6 months, or</li>
                        <li>0, 1, 2, and 12 months (for selected individuals requiring an accelerated schedule)</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hep-vax-card">
                    <h5><i class="fa-solid fa-baby text-nlfb-green"></i> For Babies Born to Mothers with Hepatitis B</h5>
                    <ul>
                        <li>A birth dose of the Hepatitis B vaccine within 24 hours of birth</li>
                        <li>Hepatitis B Immunoglobulin (HBIG) when indicated, to significantly reduce the risk of mother-to-child transmission</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ HEPATITIS C GOOD NEWS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hep-good d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-heart-circle-check text-nlfb-green mt-1"></i>
                    <p class="mb-0">Currently, there is no vaccine available to prevent Hepatitis C infection. However, significant advances in medical treatment mean that Hepatitis C is <strong>now curable</strong> with highly effective antiviral medications.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="text-secondary mb-0">Early diagnosis and timely treatment allow most patients to achieve a cure and live long, healthy lives &mdash; making regular screening one of the most important steps in protecting your liver.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="py-5 bg-nlfb-cream">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-shield-virus" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Protect Yourself &amp; Your Family from Hepatitis</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Get vaccinated, get tested early, and consult a specialist if you notice any symptoms. Early diagnosis and timely care make all the difference.</p>
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

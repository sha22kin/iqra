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
    .ha-intro p{font-size:1.02rem;color:var(--nl-text);}
    .ha-note{background:var(--nlfb-cream);border-left:4px solid var(--nlfb-blue);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .ha-good{background:var(--nl-tint-green);border-left:4px solid var(--nlfb-green);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}
    .ha-warn{background:var(--nl-tint-red-2);border-left:4px solid var(--nlfb-red);border-radius:var(--radius-md);padding:1.1rem 1.4rem;}

    .ha-fact-panel{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2rem;color:#fff;box-shadow:0 18px 40px rgba(6,38,74,.22);}
    .ha-fact-panel h4{font-size:.78rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:rgba(255,255,255,.75);margin-bottom:1.25rem;}
    .ha-fact-row{display:flex;gap:.9rem;align-items:flex-start;margin-bottom:1.1rem;}
    .ha-fact-row:last-child{margin-bottom:0;}
    .ha-fact-row i{width:34px;height:34px;flex-shrink:0;border-radius:10px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;}
    .ha-fact-row h6{margin-bottom:.15rem;font-size:.92rem;color:#fff;}
    .ha-fact-row p{margin-bottom:0;font-size:.8rem;color:rgba(255,255,255,.78);line-height:1.4;}

    .test-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.75rem 1.6rem;height:100%;display:flex;flex-direction:column;text-align:left;transition:transform .25s ease,box-shadow .25s ease;}
    .test-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .test-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;margin-bottom:1.1rem;flex-shrink:0;}
    .ti-blue{background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .ti-green{background:linear-gradient(145deg,#00693e,#013d24);}
    .ti-red{background:linear-gradient(145deg,#e4002b,#8f0019);}
    .test-card h5{font-size:1.05rem;line-height:1.35;margin-bottom:.6rem;color:var(--nlfb-ink);}
    .test-card p{font-size:.9rem;line-height:1.55;color:var(--nl-muted);margin-bottom:.7rem;}
    .test-card ul{list-style:none;padding-left:0;margin:0;}
    .test-card ul li{position:relative;font-size:.84rem;line-height:1.5;color:var(--nl-muted);padding-left:1.05rem;margin-bottom:.4rem;}
    .test-card ul li:last-child{margin-bottom:0;}
    .test-card ul li::before{content:"";position:absolute;left:0;top:.55em;width:6px;height:6px;border-radius:50%;background:var(--nlfb-blue);}
    .tc-green ul li::before{background:var(--nlfb-green);}
    .tc-red ul li::before{background:var(--nlfb-red);}
    .test-card .ha-sub-heading{font-size:.76rem;font-weight:700;letter-spacing:.02em;text-transform:uppercase;color:var(--nl-faint);margin:.9rem 0 .5rem;}
    .test-card .ha-sub-heading:first-of-type{margin-top:0;}

    .ha-risk-card{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:1.4rem 1.3rem;height:100%;display:flex;gap:1rem;align-items:flex-start;transition:transform .25s ease,box-shadow .25s ease;}
    .ha-risk-card:hover{transform:translateY(-6px);box-shadow:0 18px 34px rgba(6,38,74,.12);}
    .ha-risk-card .ha-risk-icon{flex-shrink:0;width:44px;height:44px;border-radius:50%;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;}
    .ha-risk-card p{margin-bottom:0;font-size:.88rem;color:var(--nl-muted);line-height:1.5;}

    .ha-diff-list{list-style:none;padding-left:0;margin-bottom:0;}
    .ha-diff-list li{position:relative;padding:.6rem 0 .6rem 2rem;border-bottom:1px dashed var(--nl-line);color:var(--nl-text);font-size:.92rem;}
    .ha-diff-list li:last-child{border-bottom:none;}
    .ha-diff-list li i{position:absolute;left:0;top:.75rem;color:var(--nlfb-blue);}
    .ha-diff-list.hl-red li i{color:var(--nlfb-red);}
    .ha-diff-list.hl-green li i{color:var(--nlfb-green);}

    .ha-symptom{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem .75rem;text-align:center;height:100%;transition:transform .2s ease,box-shadow .2s ease;}
    .ha-symptom:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);}
    .ha-symptom i{width:40px;height:40px;border-radius:10px;background:var(--nlfb-cream);color:var(--nlfb-blue);display:flex;align-items:center;justify-content:center;margin:0 auto .6rem;font-size:1.05rem;}
    .ha-symptom span{font-size:.8rem;font-weight:600;color:var(--nlfb-ink);line-height:1.3;display:block;}

    .ha-summary-panel{background:linear-gradient(160deg,var(--nlfb-blue-dark) 0%,#06264a 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;}
    .ha-summary-panel ul{list-style:none;padding-left:0;margin-bottom:0;}
    .ha-summary-panel li{position:relative;padding:.55rem 0 .55rem 2rem;font-size:.94rem;color:rgba(255,255,255,.9);border-bottom:1px solid rgba(255,255,255,.12);}
    .ha-summary-panel li:last-child{border-bottom:none;}
    .ha-summary-panel li i{position:absolute;left:0;top:.75rem;color:#5fd3a3;}
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

<!-- ============ WHAT IS HEPATITIS A ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="ha-intro mb-4">
                    <div class="eyebrow">Understanding the Infection</div>
                    <h2 class="section-title mt-2 mb-3">What Is Hepatitis A?</h2>
                    <p>Hepatitis A is a liver disease caused by infection with the Hepatitis A virus (HAV). The virus spreads through the fecal&ndash;oral route, meaning that it is transmitted when a person consumes food or water contaminated with the feces of an infected individual. Once inside the body, the virus infects the liver and causes inflammation (hepatitis).</p>
                    <p class="mb-0">Hepatitis A usually causes acute hepatitis, and most people recover completely within a few weeks as their immune system clears the virus. Recovery results in lifelong immunity against future Hepatitis A infection. However, in rare cases, the disease can progress to acute liver failure (fulminant hepatitis), which is a life-threatening medical emergency.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ha-fact-panel">
                    <h4>At a Glance</h4>
                    <div class="ha-fact-row">
                        <i class="fa-solid fa-virus"></i>
                        <div>
                            <h6>Cause</h6>
                            <p>Infection with the Hepatitis A virus (HAV)</p>
                        </div>
                    </div>
                    <div class="ha-fact-row">
                        <i class="fa-solid fa-utensils"></i>
                        <div>
                            <h6>Route of Spread</h6>
                            <p>Fecal&ndash;oral, via contaminated food or water</p>
                        </div>
                    </div>
                    <div class="ha-fact-row">
                        <i class="fa-solid fa-chart-line"></i>
                        <div>
                            <h6>Typical Course</h6>
                            <p>Usually acute hepatitis, resolving in a few weeks</p>
                        </div>
                    </div>
                    <div class="ha-fact-row">
                        <i class="fa-solid fa-shield-heart"></i>
                        <div>
                            <h6>After Recovery</h6>
                            <p>Lifelong immunity against future Hepatitis A infection</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ HOW DOES IT SPREAD ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Modes of Transmission</div>
            <h2 class="section-title mt-2">How Does Hepatitis A Spread?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:760px;margin-inline:auto;">Hepatitis A is primarily transmitted through contaminated food and water. Common modes of transmission include:</p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <ul class="ha-diff-list">
                    <li><i class="fa-solid fa-circle-check"></i> Consuming contaminated food or drinking water</li>
                    <li><i class="fa-solid fa-circle-check"></i> Poor sanitation and inadequate sewage disposal systems</li>
                    <li><i class="fa-solid fa-circle-check"></i> Poor personal hygiene, particularly not washing hands properly after using the toilet</li>
                    <li><i class="fa-solid fa-circle-check"></i> Eating uncovered or unhygienically prepared street food</li>
                    <li><i class="fa-solid fa-circle-check"></i> Drinking sugarcane juice or other beverages prepared under unhygienic conditions</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="ha-diff-list">
                    <li><i class="fa-solid fa-circle-check"></i> Poor food handling practices in restaurants and food establishments, including failure to maintain hygiene or use gloves when necessary</li>
                    <li><i class="fa-solid fa-circle-check"></i> Living or eating in overcrowded environments with poor sanitation, such as schools, hostels, military barracks, prisons, and refugee camps</li>
                    <li><i class="fa-solid fa-circle-check"></i> Sexual contact with an infected person</li>
                    <li><i class="fa-solid fa-circle-check"></i> Men who have sex with men (MSM)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ WHO IS AT HIGHER RISK ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Vulnerable Groups</div>
            <h2 class="section-title mt-2">Who Is at Higher Risk?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Hepatitis A is more common among:</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-child"></i></div>
                    <p>Children, particularly those under 15 years of age (approximately 90% of infections occur in this age group in highly endemic areas).</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-plane"></i></div>
                    <p>Travelers visiting regions where Hepatitis A is common.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-house-chimney-crack"></i></div>
                    <p>People living in communities with poor sanitation.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-people-group"></i></div>
                    <p>Individuals during periodic community outbreaks.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-users-line"></i></div>
                    <p>People living in overcrowded settings with inadequate hygiene.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ REGIONS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Where It Is Common</div>
            <h2 class="section-title mt-2">Regions with High Hepatitis A Prevalence</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Hepatitis A is more common in:</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-earth-asia"></i></div>
                    <p>The Indian subcontinent, including Bangladesh, India, Nepal, and Pakistan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-earth-africa"></i></div>
                    <p>North Africa and Sub-Saharan Africa.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-mosque"></i></div>
                    <p>The Middle East.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-earth-asia"></i></div>
                    <p>China.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ha-risk-card">
                    <div class="ha-risk-icon"><i class="fa-solid fa-earth-europe"></i></div>
                    <p>Parts of Eastern Europe.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ GLOBAL BURDEN ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="eyebrow">The Bigger Picture</div>
                <h2 class="section-title mt-2 mb-3">Global Burden of Hepatitis A</h2>
                <p class="text-secondary mb-0">Reliable national data on the burden of Hepatitis A in Bangladesh remain limited, but its global impact on liver health is well documented.</p>
            </div>
            <div class="col-lg-7">
                <ul class="ha-diff-list">
                    <li><i class="fa-solid fa-circle-check"></i> According to the World Health Organization (WHO), Hepatitis A remains a significant public health concern worldwide.</li>
                    <li><i class="fa-solid fa-circle-check"></i> The disease contributes to a small proportion of deaths related to viral hepatitis globally.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Co-infection with Hepatitis E, Hepatitis B, or Hepatitis C may increase the risk of severe illness and complications.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Reliable national data on the burden of Hepatitis A in Bangladesh remain limited.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ SIGNS AND SYMPTOMS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Signs &amp; Symptoms</div>
            <h2 class="section-title mt-2">What Symptoms Should You Watch For?</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Symptoms usually appear 2 to 6 weeks after exposure to the virus. Common symptoms include:</p>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-temperature-high"></i><span>Mild fever</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-utensils"></i><span>Loss of appetite</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-battery-quarter"></i><span>Fatigue &amp; weakness</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-face-dizzy"></i><span>Nausea &amp; vomiting</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-kit-medical"></i><span>Abdominal pain</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-dumbbell"></i><span>Muscle aches</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-head-side-cough"></i><span>Flu-like symptoms</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-eye"></i><span>Jaundice (skin &amp; eyes)</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-droplet"></i><span>Dark-colored urine</span></div></div>
            <div class="col-6 col-md-4 col-lg-2"><div class="ha-symptom"><i class="fa-solid fa-hand-sparkles"></i><span>Itching</span></div></div>
        </div>
    </div>
</section>

<!-- ============ DIAGNOSIS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Confirming the Diagnosis</div>
            <h2 class="section-title mt-2">Diagnosis</h2>
            <p class="text-secondary mt-2 mb-0" style="max-width:720px;margin-inline:auto;">Your doctor may recommend the following tests:</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="test-card tc-blue">
                    <div class="test-icon ti-blue"><i class="fa-solid fa-vial"></i></div>
                    <h5>Blood Tests</h5>
                    <div class="ha-sub-heading">Liver Function Tests (LFTs)</div>
                    <ul>
                        <li>Bilirubin</li>
                        <li>ALT (Alanine Aminotransferase)</li>
                        <li>AST (Aspartate Aminotransferase)</li>
                        <li>Alkaline Phosphatase (ALP)</li>
                    </ul>
                    <div class="ha-sub-heading">Other Blood Tests</div>
                    <ul>
                        <li>Anti-HAV IgM antibody (confirms recent Hepatitis A infection)</li>
                        <li>Complete Blood Count (CBC)</li>
                    </ul>
                    <div class="ha-sub-heading">Coagulation Profile</div>
                    <ul>
                        <li>Prothrombin Time (PT)</li>
                        <li>Activated Partial Thromboplastin Time (APTT)</li>
                        <li>International Normalized Ratio (INR)</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="test-card tc-green">
                    <div class="test-icon ti-green"><i class="fa-solid fa-wave-square"></i></div>
                    <h5>Imaging</h5>
                    <ul>
                        <li>Abdominal ultrasound may help identify liver enlargement and assess liver condition.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ TREATMENT ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row align-items-start g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Supportive Care</div>
                <h2 class="section-title mt-2 mb-3">Treatment</h2>
                <p class="text-secondary">There is no specific antiviral treatment for Hepatitis A. Management focuses on:</p>
                <ul class="ha-diff-list hl-green mb-3">
                    <li><i class="fa-solid fa-circle-check"></i> Adequate rest</li>
                    <li><i class="fa-solid fa-circle-check"></i> Proper hydration</li>
                    <li><i class="fa-solid fa-circle-check"></i> Nutritional support</li>
                    <li><i class="fa-solid fa-circle-check"></i> Treatment of symptoms</li>
                    <li><i class="fa-solid fa-circle-check"></i> Regular medical follow-up</li>
                </ul>
                <p class="text-secondary mb-0">Most patients recover within 1 to 3 weeks, although complete recovery may occasionally take up to 12 weeks.</p>
            </div>
            <div class="col-lg-6">
                <div class="ha-warn d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-triangle-exclamation text-nlfb-red mt-1"></i>
                    <p class="mb-0"><strong>Important:</strong> Avoid taking unnecessary medications during Hepatitis A infection. In particular, paracetamol (acetaminophen) should not be used without medical advice, as it may worsen liver injury in susceptible patients.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ POSSIBLE COMPLICATIONS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="eyebrow">When Things Go Wrong</div>
                <h2 class="section-title mt-2 mb-3">Possible Complications</h2>
                <p class="text-secondary mb-0">Although most people recover completely, complications may occur, including:</p>
            </div>
            <div class="col-lg-7">
                <ul class="ha-diff-list hl-red">
                    <li><i class="fa-solid fa-circle-check"></i> Impaired liver function</li>
                    <li><i class="fa-solid fa-circle-check"></i> Coagulopathy (blood clotting abnormalities)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Disseminated Intravascular Coagulation (DIC)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Septicemia</li>
                    <li><i class="fa-solid fa-circle-check"></i> Hepatorenal syndrome (kidney dysfunction associated with liver disease)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Acute liver failure (Fulminant Hepatitis)</li>
                </ul>
            </div>
        </div>
        <div class="ha-warn d-flex gap-3 align-items-start mt-4">
            <i class="fa-solid fa-truck-medical text-nlfb-red mt-1"></i>
            <p class="mb-0">Acute liver failure is a medical emergency requiring intensive supportive care. If liver function cannot be restored, emergency liver transplantation may be the only life-saving treatment.</p>
        </div>
    </div>
</section>

<!-- ============ PREVENTION ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="eyebrow">Protect Yourself</div>
                <h2 class="section-title mt-2 mb-3">Prevention</h2>
                <p class="text-secondary mb-0">Hepatitis A can largely be prevented by maintaining good hygiene and receiving vaccination. Preventive measures include:</p>
            </div>
            <div class="col-lg-7">
                <ul class="ha-diff-list hl-green">
                    <li><i class="fa-solid fa-circle-check"></i> Practice good personal hygiene</li>
                    <li><i class="fa-solid fa-circle-check"></i> Wash hands thoroughly before eating and after using the toilet</li>
                    <li><i class="fa-solid fa-circle-check"></i> Drink safe and clean water</li>
                    <li><i class="fa-solid fa-circle-check"></i> Ensure proper sewage and sanitation systems in the community</li>
                    <li><i class="fa-solid fa-circle-check"></i> Receive the Hepatitis A vaccine</li>
                    <li><i class="fa-solid fa-circle-check"></i> Get vaccinated before traveling to countries where Hepatitis A is common</li>
                    <li><i class="fa-solid fa-circle-check"></i> Practice safe sex</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ VACCINATION ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="eyebrow">Prevention Works</div>
                <h2 class="section-title mt-2 mb-3">Hepatitis A Vaccination</h2>
            </div>
            <div class="col-lg-6">
                <div class="ha-good d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-syringe text-nlfb-green mt-1"></i>
                    <p class="mb-0">The Hepatitis A vaccine is highly effective. A single dose provides protective immunity in most healthy individuals within one month, while many national immunization schedules recommend a two-dose series for long-term protection, depending on the vaccine used.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ KEY FACTS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="ha-summary-panel">
                    <h2 class="mb-4" style="color:#fff;">Key Facts to Remember</h2>
                    <ul>
                        <li><i class="fa-solid fa-circle-check"></i> Hepatitis A is a food- and water-borne viral infection.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Good hygiene and safe sanitation are the most effective ways to prevent infection.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Seek medical advice promptly if symptoms of Hepatitis A develop.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Do not take paracetamol (acetaminophen) or other medications without consulting your doctor.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Early supportive treatment helps reduce the risk of severe complications, including acute liver failure.</li>
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
                    <h3 class="mb-2">Concerned About Hepatitis A?</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Practice safe hygiene, get vaccinated, and speak to a specialist promptly if you notice any symptoms. Early care makes all the difference.</p>
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

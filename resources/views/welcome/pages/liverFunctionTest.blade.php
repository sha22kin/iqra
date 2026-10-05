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
    .lft-intro p{font-size:1.02rem;color:var(--nl-text);}
    .lft-note{
        background:var(--nlfb-cream);
        border-left:4px solid var(--nlfb-blue);
        border-radius:var(--radius-md);
        padding:1.1rem 1.4rem;
    }
    .lft-intro-img{
        border-radius:var(--radius-lg);
        overflow:hidden;
        box-shadow:0 18px 40px rgba(6,38,74,.14);
    }
    .lft-intro-img img{
        width:100%;
        height:100%;
        min-height:320px;
        object-fit:cover;
        display:block;
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
    .addl-item{
        display:flex;gap:1rem;align-items:flex-start;
        background:var(--nl-surface);border-radius:var(--radius-md);
        padding:1.1rem 1.2rem;height:100%;
        border:1px solid var(--nl-line);
    }
    .addl-item .addl-icon{
        flex-shrink:0;width:44px;height:44px;border-radius:50%;
        background:var(--nlfb-cream);color:var(--nlfb-blue);
        display:flex;align-items:center;justify-content:center;
    }
    .addl-item h6{margin-bottom:.2rem;}
    .addl-item p{font-size:.86rem;color:var(--nl-muted);margin-bottom:0;}
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
                <div class="lft-intro mb-4">
                    <div class="eyebrow">Understanding Your Results</div>
                    <h2 class="section-title mt-2 mb-3">What Is a Liver Function Test?</h2>
                    <p>Doctors often recommend a Liver Function Test (LFT), also known as a Liver Panel, to assess the health and function of your liver. These blood tests provide important information about liver function and help identify liver diseases, monitor ongoing liver conditions, and evaluate the effectiveness of treatment.</p>
                </div>
                <div class="lft-note d-flex gap-3 align-items-start">
                    <i class="fa-solid fa-circle-info text-nlfb-blue mt-1"></i>
                    <p class="mb-0">The laboratory report usually includes the <strong>reference (normal) ranges</strong> for each test. These values may vary depending on age, sex, and the laboratory performing the test. Certain viruses, alcohol consumption, medications, unhealthy diets, and exposure to chemicals can damage the liver and affect these results.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lft-intro-img">
                    <img src="https://images.unsplash.com/photo-1758691462863-9e1b8a863140?auto=format&fit=crop&w=900&q=75" alt="Doctor explaining liver function test results to a patient">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ COMMON TESTS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">Liver Panel Breakdown</div>
            <h2 class="section-title mt-2">Common Tests Included in a Liver Function Test</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="test-card tc-blue">
                    <div class="test-icon ti-blue"><i class="fa-solid fa-droplet"></i></div>
                    <h5>Bilirubin</h5>
                    <p>A yellow pigment produced when red blood cells break down. Elevated levels may indicate liver disease, bile duct obstruction, or certain blood disorders, leading to jaundice.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="test-card tc-green">
                    <div class="test-icon ti-green"><i class="fa-solid fa-flask"></i></div>
                    <h5>ALT</h5>
                    <div class="test-sub">Alanine Aminotransferase</div>
                    <p>An enzyme found primarily in liver cells. Elevated ALT usually indicates liver cell injury or inflammation. Common causes:</p>
                    <ul>
                        <li>Fatty liver disease</li>
                        <li>Viral hepatitis</li>
                        <li>Certain medications</li>
                        <li>Alcohol-related liver damage</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="test-card tc-red">
                    <div class="test-icon ti-red"><i class="fa-solid fa-heart-pulse"></i></div>
                    <h5>AST</h5>
                    <div class="test-sub">Aspartate Aminotransferase</div>
                    <p>Present in liver cells as well as the heart and muscles. Increased levels may indicate liver inflammation or damage, though they can also rise in certain muscle and heart conditions.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="test-card tc-blue">
                    <div class="test-icon ti-blue"><i class="fa-solid fa-bone"></i></div>
                    <h5>ALP</h5>
                    <div class="test-sub">Alkaline Phosphatase</div>
                    <p>Found in the liver, bile ducts, and bones. Elevated levels may suggest:</p>
                    <ul>
                        <li>Bile duct obstruction</li>
                        <li>Certain liver diseases</li>
                        <li>Bone disorders</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="test-card tc-red">
                    <div class="test-icon ti-red"><i class="fa-solid fa-wine-bottle"></i></div>
                    <h5>GGT</h5>
                    <div class="test-sub">Gamma-Glutamyl Transferase</div>
                    <p>An enzyme that often increases in various liver diseases and fatty liver disease. Elevated levels may also be associated with:</p>
                    <ul>
                        <li>Regular alcohol consumption</li>
                        <li>Bile duct disease</li>
                        <li>Certain medications</li>
                        <li>Excessive artificial sweeteners</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="test-card tc-green">
                    <div class="test-icon ti-green"><i class="fa-solid fa-pills"></i></div>
                    <h5>Albumin</h5>
                    <div class="test-sub">Liver Protein Marker</div>
                    <p>A protein produced by the liver. Low blood albumin levels may indicate that the liver is not producing proteins efficiently. Levels generally stay normal until significant liver damage has occurred.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="test-card tc-blue">
                    <div class="test-icon ti-blue"><i class="fa-solid fa-hourglass-half"></i></div>
                    <h5>Prothrombin Time</h5>
                    <div class="test-sub">PT / INR</div>
                    <p>Often reported with the International Normalized Ratio (INR), PT measures how long it takes blood to clot. Since the liver produces clotting factors, prolonged PT/INR may indicate impaired liver synthetic function.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="test-card tc-green">
                    <div class="test-icon ti-green"><i class="fa-solid fa-circle-dot"></i></div>
                    <h5>Platelet Count</h5>
                    <div class="test-sub">Part of CBC</div>
                    <p>Platelets help with clotting. A low platelet count may be associated with chronic liver disease or cirrhosis. An enlarged spleen, common in advanced liver disease, can also reduce platelet levels.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ ADDITIONAL TESTS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-4">
                <div class="eyebrow">Next Steps</div>
                <h2 class="section-title mt-2 mb-3">Additional Tests for Liver Evaluation</h2>
                <p class="text-secondary mb-4">If liver damage is suspected, your doctor may recommend additional investigations to get a complete picture of your liver health.</p>
                <a href="{{route('pageView','contact-us')}}" class="btn btn-donate">Book a Liver Function Test</a>
            </div>
            <div class="col-lg-8">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="addl-item">
                            <div class="addl-icon"><i class="fa-solid fa-virus-covid"></i></div>
                            <div>
                                <h6>Hepatitis Virus Tests</h6>
                                <p>Hepatitis B, Hepatitis C, and other viral markers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="addl-item">
                            <div class="addl-icon"><i class="fa-solid fa-wave-square"></i></div>
                            <div>
                                <h6>Liver Ultrasound</h6>
                                <p>Imaging to check liver size, shape, and structure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="addl-item">
                            <div class="addl-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                            <div>
                                <h6>FibroScan&reg;</h6>
                                <p>Liver Elastography to measure liver stiffness and fat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="addl-item">
                            <div class="addl-icon"><i class="fa-solid fa-syringe"></i></div>
                            <div>
                                <h6>Liver FNAC</h6>
                                <p>Fine Needle Aspiration Cytology in selected cases.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="addl-item">
                            <div class="addl-icon"><i class="fa-solid fa-stethoscope"></i></div>
                            <div>
                                <h6>Liver Biopsy</h6>
                                <p>Recommended when a detailed tissue diagnosis is necessary.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ KEEP REPORTS SAFE ============ -->
<section class="py-5 bg-nlfb-cream">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-box-archive" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Keep Your Liver Test Reports Safe</h3>
                    <p class="mb-0 mb-lg-0" style="color:rgba(255,255,255,.85);">Always keep copies of your liver test reports. Comparing previous and current results helps your doctor monitor changes in liver function, assess disease progression, and make informed treatment decisions.</p>
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

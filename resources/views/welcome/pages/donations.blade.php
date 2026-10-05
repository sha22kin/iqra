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
    .dn-intro p{font-size:1.04rem;color:var(--nl-text);line-height:1.75;}
    .dn-wha{display:flex;align-items:center;gap:1rem;background:var(--nl-tint-blue-2);border-left:4px solid var(--nlfb-blue);border-radius:var(--radius-md);padding:1rem 1.2rem;margin-top:1.4rem;}
    .dn-wha i{width:44px;height:44px;flex-shrink:0;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);font-size:1.1rem;}
    .dn-wha p{margin:0;font-size:.95rem;color:var(--nl-text);}

    .dn-fund-link{display:flex;align-items:center;gap:1rem;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.1rem 1.2rem;margin-bottom:.85rem;color:var(--nlfb-ink);transition:transform .2s ease,box-shadow .2s ease,border-color .2s ease;}
    .dn-fund-link:last-child{margin-bottom:0;}
    .dn-fund-link:hover{transform:translateX(6px);box-shadow:0 12px 24px rgba(6,38,74,.1);border-color:var(--dn-accent);color:var(--nlfb-ink);}
    .dn-fund-link > i:first-child{width:46px;height:46px;flex-shrink:0;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;background:var(--dn-grad);font-size:1.1rem;}
    .dn-fund-link h6{margin:0 0 .1rem;font-weight:700;font-size:.98rem;}
    .dn-fund-link span{font-size:.8rem;color:var(--nl-muted);}
    .dn-fund-link .dn-go{margin-left:auto;color:var(--dn-accent);}
    .dn-blue{--dn-accent:var(--nlfb-blue);--dn-soft:var(--nl-tint-blue);--dn-grad:linear-gradient(145deg,#0b5fa5,#06264a);}
    .dn-green{--dn-accent:var(--nlfb-green);--dn-soft:var(--nl-tint-green-2);--dn-grad:linear-gradient(145deg,#00693e,#013d24);}
    .dn-red{--dn-accent:var(--nlfb-red);--dn-soft:var(--nl-tint-red);--dn-grad:linear-gradient(145deg,#e4002b,#8f0019);}

    .dn-section{scroll-margin-top:100px;}
    .dn-head{display:flex;align-items:center;gap:1rem;margin-bottom:1.4rem;}
    .dn-head .dn-head-icon{width:56px;height:56px;flex-shrink:0;border-radius:16px;display:flex;align-items:center;justify-content:center;color:#fff;background:var(--dn-grad);font-size:1.4rem;box-shadow:0 12px 24px rgba(6,38,74,.18);}
    .dn-head .eyebrow{color:var(--dn-accent);}
    .dn-head h2{margin:.2rem 0 0;}
    .dn-text p{font-size:1rem;line-height:1.75;color:var(--nl-text);}

    .dn-uses{display:grid;grid-template-columns:repeat(3,1fr);gap:.8rem;margin:1.2rem 0 1.4rem;}
    .dn-use{background:var(--dn-soft);border-radius:var(--radius-md);padding:1rem .8rem;text-align:center;}
    .dn-use i{font-size:1.3rem;color:var(--dn-accent);margin-bottom:.45rem;}
    .dn-use span{display:block;font-size:.82rem;font-weight:700;color:var(--nlfb-ink);line-height:1.35;}

    .dn-bank{position:relative;border-radius:var(--radius-lg);padding:1.6rem 1.6rem 1.4rem;color:#fff;background:var(--dn-grad);overflow:hidden;box-shadow:0 20px 40px rgba(6,38,74,.22);}
    .dn-bank::before{content:"";position:absolute;width:220px;height:220px;border-radius:50%;right:-70px;top:-90px;background:rgba(255,255,255,.08);}
    .dn-bank::after{content:"";position:absolute;width:160px;height:160px;border-radius:50%;right:30px;bottom:-110px;background:rgba(255,255,255,.06);}
    .dn-bank-top{position:relative;display:flex;justify-content:space-between;align-items:center;margin-bottom:1.3rem;}
    .dn-bank-top span{font-size:.72rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:rgba(255,255,255,.75);}
    .dn-bank-top i{font-size:1.6rem;color:rgba(255,255,255,.85);}
    .dn-bank label{position:relative;display:block;font-size:.7rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:rgba(255,255,255,.65);margin-bottom:.15rem;}
    .dn-bank .dn-val{position:relative;font-weight:600;font-size:1rem;margin-bottom:.9rem;}
    .dn-bank .dn-acc{position:relative;display:flex;align-items:center;gap:.7rem;flex-wrap:wrap;margin-bottom:1rem;}
    .dn-bank .dn-acc code{font-family:"Poppins",monospace;font-weight:700;font-size:1.35rem;letter-spacing:.06em;color:#fff;background:none;padding:0;}
    .dn-copy{border:1px solid rgba(255,255,255,.4);background:rgba(255,255,255,.12);color:#fff;border-radius:999px;padding:.3rem .8rem;font-size:.76rem;font-weight:700;display:inline-flex;align-items:center;gap:.35rem;transition:background .2s ease;}
    .dn-copy:hover{background:rgba(255,255,255,.25);}
    .dn-copy.copied{background:#5fd3a3;border-color:#5fd3a3;color:var(--nlfb-heading);}
    .dn-bank .dn-branch{position:relative;display:flex;align-items:center;gap:.6rem;border-top:1px solid rgba(255,255,255,.2);padding-top:.9rem;font-size:.92rem;}
    .dn-bank .dn-branch i{color:rgba(255,255,255,.75);}

    .dn-info{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.3rem 1.3rem;height:100%;}
    .dn-info h6{display:flex;align-items:center;gap:.55rem;font-size:.8rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--dn-accent,var(--nlfb-blue));margin-bottom:.8rem;}
    .dn-info address,.dn-info p{font-style:normal;font-size:.94rem;line-height:1.65;color:var(--nl-text);margin-bottom:.6rem;}
    .dn-info a.dn-tel{display:inline-flex;align-items:center;gap:.4rem;font-weight:700;color:var(--nlfb-blue);margin-right:.8rem;}
    .dn-bkash .dn-bkash-no{display:flex;align-items:center;gap:.7rem;flex-wrap:wrap;}
    .dn-bkash .dn-bkash-no a{font-family:"Poppins",sans-serif;font-weight:700;font-size:1.35rem;color:var(--nlfb-red);letter-spacing:.03em;}
    .dn-bkash .dn-bkash-no .dn-copy{border-color:#f3b6c2;background:var(--nl-tint-red);color:var(--nlfb-red);}
    .dn-bkash .dn-bkash-no .dn-copy.copied{background:#5fd3a3;border-color:#5fd3a3;color:var(--nlfb-heading);}
    .dn-bkash small{display:inline-block;margin-top:.35rem;font-size:.74rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--nl-faint);}

    .dn-link-btn{display:inline-flex;align-items:center;gap:.5rem;font-weight:700;font-size:.9rem;color:#fff;background:var(--dn-grad);border-radius:999px;padding:.6rem 1.2rem;transition:transform .2s ease,box-shadow .2s ease;}
    .dn-link-btn:hover{color:#fff;transform:translateY(-2px);box-shadow:0 10px 22px rgba(6,38,74,.2);}

    .dn-thanks{display:flex;align-items:center;gap:.7rem;font-family:"Poppins",sans-serif;font-weight:700;color:var(--dn-accent);margin-top:1.6rem;font-size:1.05rem;}

    .dn-hosp-facts{display:grid;grid-template-columns:repeat(2,1fr);gap:.8rem;margin-bottom:1.3rem;}
    .dn-hosp-facts > div{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem;display:flex;gap:.75rem;align-items:center;}
    .dn-hosp-facts i{width:40px;height:40px;flex-shrink:0;border-radius:10px;display:flex;align-items:center;justify-content:center;background:var(--nl-tint-red);color:var(--nlfb-red);}
    .dn-hosp-facts strong{display:block;font-family:"Poppins",sans-serif;font-size:1.05rem;line-height:1.2;color:var(--nlfb-ink);}
    .dn-hosp-facts span{font-size:.78rem;color:var(--nl-muted);}
    .dn-stone{background:var(--nl-tint-red-2);border-left:4px solid var(--nlfb-red);border-radius:var(--radius-md);padding:1rem 1.2rem;display:flex;gap:.8rem;align-items:flex-start;margin-bottom:1.2rem;}
    .dn-stone i{color:var(--nlfb-red);margin-top:.25rem;}
    .dn-stone p{margin:0;font-size:.95rem;color:var(--nl-text);line-height:1.65;}

    @media (max-width:575.98px){
        .dn-uses{grid-template-columns:1fr;}
        .dn-hosp-facts{grid-template-columns:1fr;}
        .dn-bank .dn-acc code{font-size:1.15rem;}
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
                <div class="dn-intro">
                    <div class="eyebrow">Support Our Work</div>
                    <h2 class="section-title mt-2 mb-3">Donations</h2>
                    <p>The National Liver Foundation of Bangladesh is a not-for-profit organization, dedicated to Prevention, Treatment, Education and Research on liver diseases in Bangladesh.</p>
                    <p class="mb-0">The Foundation is a charitable organization supported by donations from interested individuals and corporations.</p>
                </div>
                <div class="dn-wha">
                    <i class="fa-solid fa-earth-asia"></i>
                    <p>The foundation is representing Bangladesh as the member of the <strong>World Hepatitis Alliance (WHA), Geneva.</strong></p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="eyebrow mb-3">Choose Where to Give</div>
                <a class="dn-fund-link dn-blue" href="#foundation-activities">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <div><h6>Foundation Activities</h6><span>Awareness, vaccination &amp; patient support</span></div>
                    <i class="fa-solid fa-arrow-down dn-go"></i>
                </a>
                <a class="dn-fund-link dn-green" href="#zakat-fund">
                    <i class="fa-solid fa-hands-praying"></i>
                    <div><h6>Zakat Fund</h6><span>Treatment for underprivileged patients</span></div>
                    <i class="fa-solid fa-arrow-down dn-go"></i>
                </a>
                <a class="dn-fund-link dn-red" href="#hospital-sylhet">
                    <i class="fa-solid fa-hospital"></i>
                    <div><h6>Liver Foundation Hospital Sylhet</h6><span>Specialized liver hospital</span></div>
                    <i class="fa-solid fa-arrow-down dn-go"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============ 1. FOUNDATION ACTIVITIES ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream dn-section dn-blue" id="foundation-activities">
    <div class="container py-2">
        <div class="dn-head">
            <div class="dn-head-icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
            <div>
                <div class="eyebrow">Fund 01</div>
                <h2 class="section-title">Donation for National Liver Foundation Activities</h2>
            </div>
        </div>
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <div class="dn-text">
                    <p class="mb-0">You can support the Foundation in field of awareness, free Hepatitis B vaccination for orphan children and medical support for underprivileged hepatitis patients.</p>
                </div>
                <div class="dn-uses">
                    <div class="dn-use"><i class="fa-solid fa-bullhorn d-block"></i><span>Awareness</span></div>
                    <div class="dn-use"><i class="fa-solid fa-syringe d-block"></i><span>Free Hepatitis B vaccination for orphan children</span></div>
                    <div class="dn-use"><i class="fa-solid fa-kit-medical d-block"></i><span>Medical support for underprivileged hepatitis patients</span></div>
                </div>
                <div class="dn-text">
                    <p class="mb-0">Send a cheque payable to the &lsquo;&lsquo; National Liver Foundation of Bangladesh&rsquo;&rsquo; to the following address:</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dn-bank">
                    <div class="dn-bank-top"><span>Account Details</span><i class="fa-solid fa-building-columns"></i></div>
                    <label>A/C name</label>
                    <div class="dn-val">National Liver Foundation of Bangladesh</div>
                    <label>A/C number</label>
                    <div class="dn-acc">
                        <code>168514100004119</code>
                        <button type="button" class="dn-copy" data-copy="168514100004119"><i class="fa-regular fa-copy"></i> <span>Copy</span></button>
                    </div>
                    <div class="dn-branch"><i class="fa-solid fa-building-columns"></i> Uttara Bank Limited. Panthopath Branch.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ 2. ZAKAT FUND ============ -->
<section class="py-5 py-lg-6 bg-white dn-section dn-green" id="zakat-fund">
    <div class="container py-2">
        <div class="dn-head">
            <div class="dn-head-icon"><i class="fa-solid fa-hands-praying"></i></div>
            <div>
                <div class="eyebrow">Fund 02</div>
                <h2 class="section-title">Donation for Zakat Found of National Liver Foundation of Bangladesh</h2>
            </div>
        </div>
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <div class="dn-text">
                    <p>National Liver Foundation of Bangladesh opened Zakat Fund. National Liver Foundation of Bangladesh have opened account for getting Zakat .The fund will be exclusively used for treatment of underprivileged children and young individuals affected by hepatitis B &amp; C virus. The fund also will be used to provide vaccine and immunoglobulin to new born of hepatitis B affected poor mothers.</p>
                    <p>Contribution in this fund will help greatly to keep surviving those affected by Hepatitis B &amp; C, the silent killers.</p>
                </div>
                <div class="dn-uses">
                    <div class="dn-use"><i class="fa-solid fa-children d-block"></i><span>Treatment of underprivileged children &amp; young individuals</span></div>
                    <div class="dn-use"><i class="fa-solid fa-syringe d-block"></i><span>Vaccine &amp; immunoglobulin for newborns</span></div>
                    <div class="dn-use"><i class="fa-solid fa-person-breastfeeding d-block"></i><span>Support for hepatitis B affected poor mothers</span></div>
                </div>
                <p class="mb-2" style="color:var(--nl-text);">For more information: Click the link:</p>
                <a class="dn-link-btn" href="https://www.liver.org.bd/contribute-your-jakat/" target="_blank" rel="noopener"><i class="fa-solid fa-arrow-up-right-from-square"></i> https://www.liver.org.bd/contribute-your-jakat/</a>
            </div>
            <div class="col-lg-6">
                <div class="dn-bank mb-4">
                    <div class="dn-bank-top"><span>Zakat Account</span><i class="fa-solid fa-building-columns"></i></div>
                    <label>A/C name</label>
                    <div class="dn-val">National Liver Foundation of Bangladesh</div>
                    <label>A/C number</label>
                    <div class="dn-acc">
                        <code>0311123569429</code>
                        <button type="button" class="dn-copy" data-copy="0311123569429"><i class="fa-regular fa-copy"></i> <span>Copy</span></button>
                    </div>
                    <div class="dn-branch"><i class="fa-solid fa-building-columns"></i> Al-Arafah Islami Bank Limited. Dhanmondi Branch.</div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6 col-lg-12 col-xl-6">
                        <div class="dn-info dn-bkash dn-red">
                            <h6><i class="fa-solid fa-mobile-screen-button"></i> bkash payment :</h6>
                            <div class="dn-bkash-no">
                                <a href="tel:01758998833">01758 998833</a>
                                <button type="button" class="dn-copy" data-copy="01758998833"><i class="fa-regular fa-copy"></i> <span>Copy</span></button>
                            </div>
                            <small>bKash &middot; Merchant Account</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">
                        <div class="dn-info">
                            <h6><i class="fa-solid fa-envelope-open-text"></i> You can also send cheque to:</h6>
                            <address>National Liver Foundation of Bangladesh<br>150 (2nd fl), Green road, Panthopath<br>Dhaka-1215, Bangladesh</address>
                            <p class="mb-1" style="font-size:.84rem;">Call :</p>
                            <a class="dn-tel" href="tel:01755528811"><i class="fa-solid fa-phone"></i> 01755528811</a>
                            <a class="dn-tel" href="tel:01732999922"><i class="fa-solid fa-phone"></i> 01732999922</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dn-thanks"><i class="fa-solid fa-heart"></i> Thank you for your generous support.</div>
    </div>
</section>

<!-- ============ 3. HOSPITAL SYLHET ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream dn-section dn-red" id="hospital-sylhet">
    <div class="container py-2">
        <div class="dn-head">
            <div class="dn-head-icon"><i class="fa-solid fa-hospital"></i></div>
            <div>
                <div class="eyebrow">Fund 03</div>
                <h2 class="section-title">Donation for Liver Foundation Hospital Sylhet</h2>
            </div>
        </div>
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <div class="dn-text">
                    <p>We are happy that the Govt. of Bangladesh have donated land to Liver Foundation, near Shahi Idgah , Sylhet. The proposed specialized hospital will be of 200 bed initially, which will be expanded later. All these services will be with minimum cost and free for the poor.</p>
                </div>
                <div class="dn-hosp-facts">
                    <div><i class="fa-solid fa-bed-pulse"></i><div><strong>200 Beds</strong><span>Initially, to be expanded later</span></div></div>
                    <div><i class="fa-solid fa-map-location-dot"></i><div><strong>Sylhet</strong><span>Near Shahi Idgah</span></div></div>
                    <div><i class="fa-solid fa-award"></i><div><strong>First of its Kind</strong><span>In Bangladesh</span></div></div>
                    <div><i class="fa-solid fa-flask"></i><div><strong>Research</strong><span>On liver disease</span></div></div>
                </div>
                <div class="dn-text">
                    <p>This is the first of its kind in Bangladesh. It will also carry out research on liver disease.</p>
                </div>
                <div class="dn-stone">
                    <i class="fa-solid fa-landmark"></i>
                    <p>The foundation stone of the proposed hospital was laid by the Honorable Finance Minister, Mr.Abul Mal Abdul Muhith and Social Welfare Minister, Mr.Enamul Haque Mostafa Shohid.</p>
                </div>
                <div class="dn-text">
                    <p>Liver Foundation needs support and cooperation of fellow citizens and well wishers at home and abroad for establishment of the Specialized Liver Hospital</p>
                    <p class="mb-0">Send a cheque payable to the National Liver Foundation of Bangladesh to the following address:</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dn-bank mb-4">
                    <div class="dn-bank-top"><span>Account Details</span><i class="fa-solid fa-building-columns"></i></div>
                    <label>A/C name</label>
                    <div class="dn-val">Liver Foundation of Bangladesh</div>
                    <label>A/C number</label>
                    <div class="dn-acc">
                        <code>117-13100001219</code>
                        <button type="button" class="dn-copy" data-copy="117-13100001219"><i class="fa-regular fa-copy"></i> <span>Copy</span></button>
                    </div>
                    <div class="dn-branch"><i class="fa-solid fa-building-columns"></i> Premier Bank Ltd. Islamic Banking Branch, Sylhet</div>
                </div>
                <div class="dn-info">
                    <h6><i class="fa-solid fa-envelope-open-text"></i> you can also send cheque to:</h6>
                    <address>National Liver Foundation of Bangladesh<br>150 (2nd fl), Green road, Panthopath<br>Dhaka-1215, Bangladesh</address>
                    <p class="mb-1" style="font-size:.84rem;">Phone :</p>
                    <a class="dn-tel" href="tel:+88029146537"><i class="fa-solid fa-phone"></i> 880-2-9146537</a>
                </div>
            </div>
        </div>
        <div class="dn-thanks"><i class="fa-solid fa-heart"></i> Thank you for your generous support.</div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-circle-question" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Questions About Donating?</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Get in touch with us and we will be happy to help you support the fight against liver disease.</p>
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
<script>
(function () {
    function fallbackCopy(text) {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.setAttribute('readonly', '');
        ta.style.position = 'absolute';
        ta.style.left = '-9999px';
        document.body.appendChild(ta);
        ta.select();
        try { document.execCommand('copy'); } catch (e) {}
        document.body.removeChild(ta);
    }

    document.querySelectorAll('.dn-copy').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var text = btn.getAttribute('data-copy');
            var label = btn.querySelector('span');
            var done = function () {
                btn.classList.add('copied');
                label.textContent = 'Copied';
                setTimeout(function () { btn.classList.remove('copied'); label.textContent = 'Copy'; }, 1800);
            };
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(done, function () { fallbackCopy(text); done(); });
            } else {
                fallbackCopy(text);
                done();
            }
        });
    });
})();
</script>
@endpush

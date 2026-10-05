@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:websiteTitle($page->name)}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{$page->imageFile ? asset($page->image()) : asset('welcome/images/founder-members.png')}}" />
<meta name="url" property="og:url" content="{{route('pageView',$page->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('pageView',$page->slug?:'no-title')}}">
@endsection
@php
    // Founder members — edit names here.
    $founders = [
        'Prof. S. N. Samad Choudhury',
        'Prof. Syed Ershad Ali',
        'Mrs Zeba Rasheed Cowdhury',
        'Prof. Mohammad Ali',
        'Mr. Fahmi Mursaleen',
        'Mr. Firoz Sultan',
        'Mr. Zillur Rahman',
        'Mrs. Anjuman Ara Begum',
        'Mrs. Taslima Kabir',
        'Mrs. Absar Samad Choudhury',
        'Mrs. Monowara Rahman',
        'Mrs. Bilkis Ali',
        'Mrs. Jahanara Rasheed',
        'Mrs. Fateha Akram',
    ];

    // Group photo: the page image from admin, otherwise the default photo.
    $groupPhoto = $page->imageFile ? asset($page->image()) : asset('welcome/images/founder-members.png');

    // Initials from a name, ignoring titles like Prof., Dr., Mr., Mrs.
    $initials = function($name){
        $clean = preg_replace('/\b(Prof|Dr|Mrs|Mr|Md)\b\.?/i', ' ', $name);
        $words = array_values(array_filter(preg_split('/[\s.]+/', trim($clean)), fn($w) => strlen($w) > 1));
        if(!$words){ return '?'; }
        $first = strtoupper($words[0][0]);
        $last = count($words) > 1 ? strtoupper(end($words)[0]) : '';
        return $first.$last;
    };
    $tones = ['blue','green','red'];
@endphp
@push('css')
<style>
    .fm-intro p{font-size:1.04rem;color:var(--nl-text);line-height:1.75;}
    .fm-facts{display:grid;grid-template-columns:repeat(2,1fr);gap:1rem;margin-top:1.6rem;}
    .fm-facts > div{background:var(--nlfb-cream);border-radius:var(--radius-md);padding:1rem 1.1rem;display:flex;align-items:center;gap:.8rem;}
    .fm-facts i{width:42px;height:42px;flex-shrink:0;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .fm-facts > div:nth-child(2) i{background:linear-gradient(145deg,#00693e,#013d24);}
    .fm-facts strong{display:block;font-family:"Poppins",sans-serif;font-size:1.3rem;line-height:1.1;color:var(--nlfb-ink);}
    .fm-facts span{display:block;margin-top:.2rem;font-size:.72rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--nl-faint);}

    .fm-photo{position:relative;border-radius:var(--radius-lg);overflow:hidden;box-shadow:0 24px 50px rgba(6,38,74,.22);background:#06264a;}
    .fm-photo img{width:100%;height:auto;display:block;transition:transform .6s ease;}
    .fm-photo:hover img{transform:scale(1.03);}
    .fm-photo::after{content:"";position:absolute;left:0;right:0;bottom:0;height:5px;background:linear-gradient(90deg,var(--nlfb-green) 0 50%,var(--nlfb-red) 50% 100%);}
    .fm-photo figcaption{position:absolute;left:0;right:0;bottom:0;padding:2.2rem 1.4rem 1.2rem;background:linear-gradient(0deg,rgba(6,38,74,.88),transparent);color:#fff;font-size:.9rem;font-weight:600;display:flex;align-items:center;gap:.5rem;}
    .fm-photo-frame{position:relative;isolation:isolate;}
    .fm-photo-frame::before{content:"";position:absolute;inset:-14px -14px 14px 14px;border:2px dashed #c9d9ea;border-radius:calc(var(--radius-lg) + 6px);z-index:-1;}

    .fm-card{position:relative;display:flex;align-items:center;gap:1rem;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem 1.1rem;height:100%;transition:transform .2s ease,box-shadow .2s ease,border-color .2s ease;}
    .fm-card:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);border-color:var(--fm-accent);}
    .fm-card .fm-avatar{flex-shrink:0;width:54px;height:54px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.05rem;color:#fff;background:var(--fm-grad);}
    .fm-card h5{margin:0;font-family:"Poppins",sans-serif;font-weight:700;font-size:.96rem;line-height:1.35;color:var(--nlfb-ink);}
    .fm-card small{display:block;font-size:.72rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--fm-accent);margin-top:.15rem;}
    .fm-card .fm-no{position:absolute;top:.55rem;right:.8rem;font-family:"Poppins",sans-serif;font-weight:700;font-size:.8rem;color:#c9d9ea;}
    .fm-blue{--fm-accent:var(--nlfb-blue);--fm-grad:linear-gradient(145deg,#0b5fa5,#06264a);}
    .fm-green{--fm-accent:var(--nlfb-green);--fm-grad:linear-gradient(145deg,#00693e,#013d24);}
    .fm-red{--fm-accent:var(--nlfb-red);--fm-grad:linear-gradient(145deg,#e4002b,#8f0019);}

    .fm-quote{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;text-align:center;position:relative;overflow:hidden;}
    .fm-quote i.fa-quote-left{font-size:2rem;color:#5fd3a3;margin-bottom:.8rem;}
    .fm-quote p{font-family:"Poppins",sans-serif;font-weight:600;font-size:1.15rem;line-height:1.6;color:#fff;max-width:760px;margin:0 auto;}

    @media (max-width:991.98px){
        .fm-photo-frame::before{display:none;}
    }
    @media (max-width:575.98px){
        .fm-facts{grid-template-columns:1fr;}
        .fm-quote{padding:1.8rem 1.2rem;}
        .fm-quote p{font-size:1rem;}
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

<!-- ============ INTRO + GROUP PHOTO ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="fm-intro">
                    <div class="eyebrow">Where It All Began</div>
                    <h2 class="section-title mt-2 mb-3">Founder Members</h2>
                    <p class="mb-0">The National Liver Foundation of Bangladesh was established in April, 1999 in Dhaka by a group of dedicated individuals who shared a vision of minimizing viral hepatitis and ensuring treatment facilities of liver diseases for all.</p>
                </div>
                <div class="fm-facts">
                    <div><i class="fa-solid fa-users"></i><div><strong>{{count($founders)}}</strong><span>Founder Members</span></div></div>
                    <div><i class="fa-solid fa-calendar-check"></i><div><strong>1999</strong><span>Established in Dhaka</span></div></div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="fm-photo-frame">
                    <figure class="fm-photo mb-0">
                        <img src="{{$groupPhoto}}" alt="Founder Members of National Liver Foundation of Bangladesh">
                        <figcaption><i class="fa-solid fa-camera"></i> Founder Members of the National Liver Foundation of Bangladesh</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ FOUNDER LIST ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="text-center mb-5">
            <div class="eyebrow">The People Behind NLFB</div>
            <h2 class="section-title mt-2">Our Founder Members</h2>
        </div>
        <div class="row g-3 g-md-4">
            @foreach($founders as $i => $name)
            <div class="col-md-6 col-lg-4">
                <div class="fm-card fm-{{$tones[$i % 3]}}">
                    <span class="fm-no">{{str_pad($i + 1, 2, '0', STR_PAD_LEFT)}}</span>
                    <div class="fm-avatar">{{$initials($name)}}</div>
                    <div>
                        <h5>{{$name}}</h5>
                        <small>Founder Member</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ TRIBUTE ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="fm-quote">
            <i class="fa-solid fa-quote-left"></i>
            <p>With gratitude to our founder members, whose vision laid the foundation for Prevention, Treatment, Education and Research on liver diseases in Bangladesh.</p>
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="pb-5 bg-white">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-hand-holding-heart" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Carry the Vision Forward</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Join hands with the National Liver Foundation of Bangladesh in the fight against liver disease.</p>
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

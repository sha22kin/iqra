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
@php
    // Committee data — edit names here. An empty name shows "To be announced".
    $officeBearers = [
        ['role'=>'President',               'name'=>'',                            'icon'=>'fa-crown',          'tone'=>'red'],
        ['role'=>'Vice President',          'name'=>'Prof. Faruque Ahmed',         'icon'=>'fa-user-tie',       'tone'=>'blue'],
        ['role'=>'Secretary General',       'name'=>'Prof. Mohammad Ali',          'icon'=>'fa-pen-nib',        'tone'=>'green'],
        ['role'=>'Joint Secretary General', 'name'=>'Prof. M Anisur Rahman',       'icon'=>'fa-user-pen',       'tone'=>'blue'],
        ['role'=>'Treasurer',               'name'=>'Dr. Shafiuddin Mahmud',       'icon'=>'fa-wallet',         'tone'=>'green'],
    ];
    $members = [
        'Prof. Dr. Mirza M H Faisal',
        'Prof. Dr. Md. Khaled Mohsin',
        'Prof. Dr. Syed Alamgir Safwath',
    ];
    $advisors = [
        'National Professor Brig. (Rtd.) Abdul Malik',
        'National Professor A K Azad Khan',
        'National Professor Mahmud Hassan',
        'Mrs. Zeba Rasheed Chowdhury',
    ];

    // Initials from a name, ignoring titles like Prof., Dr., National Professor, Brig. (Rtd.), Mrs., Md.
    $initials = function($name){
        $clean = preg_replace('/\b(National|Professor|Prof|Dr|Brig|Rtd|Mrs|Mr|Md)\b\.?|\(|\)/i', ' ', $name);
        $words = array_values(array_filter(preg_split('/\s+/', trim($clean)), fn($w) => strlen($w) > 1));
        if(!$words){ return '?'; }
        $first = strtoupper($words[0][0]);
        $last = count($words) > 1 ? strtoupper(end($words)[0]) : '';
        return $first.$last;
    };
@endphp
@push('css')
<style>
    .ec-intro p{font-size:1.04rem;color:var(--nl-text);line-height:1.75;}
    .ec-count{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;}
    .ec-count div{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.2rem .8rem;text-align:center;}
    .ec-count strong{display:block;font-family:"Poppins",sans-serif;font-size:2rem;line-height:1;color:var(--nlfb-blue);}
    .ec-count div:nth-child(2) strong{color:var(--nlfb-green);}
    .ec-count div:nth-child(3) strong{color:var(--nlfb-red);}
    .ec-count span{display:block;font-size:.78rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--nl-faint);margin-top:.4rem;}

    .ec-group-title{display:flex;align-items:center;gap:.8rem;margin-bottom:1.6rem;}
    .ec-group-title h3{margin:0;font-size:1.35rem;color:var(--nlfb-ink);}
    .ec-group-title i{width:40px;height:40px;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;background:linear-gradient(145deg,#0b5fa5,#06264a);}
    .ec-group-title::after{content:"";flex:1;height:2px;background:linear-gradient(90deg,#c9d9ea,transparent);}

    .ec-card{position:relative;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-lg);padding:2rem 1.4rem 1.6rem;text-align:center;height:100%;overflow:hidden;transition:transform .25s ease,box-shadow .25s ease;}
    .ec-card:hover{transform:translateY(-8px);box-shadow:0 22px 40px rgba(6,38,74,.14);}
    .ec-card::before{content:"";position:absolute;left:0;right:0;top:0;height:74px;background:var(--ec-soft);}
    .ec-avatar{position:relative;width:96px;height:96px;margin:0 auto 1rem;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.9rem;letter-spacing:.02em;color:#fff;background:var(--ec-grad);border:5px solid #fff;box-shadow:0 10px 24px rgba(6,38,74,.18);}
    .ec-avatar .ec-badge{position:absolute;right:-4px;bottom:-2px;width:32px;height:32px;border-radius:50%;background:var(--nl-surface);color:var(--ec-accent);display:flex;align-items:center;justify-content:center;font-size:.8rem;box-shadow:0 4px 10px rgba(6,38,74,.18);}
    .ec-avatar.ec-empty{background:var(--nl-surface-2);color:#a9b7c6;}
    .ec-role{display:inline-block;font-size:.72rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--ec-accent);background:var(--ec-soft);border-radius:999px;padding:.3rem .8rem;margin-bottom:.6rem;}
    .ec-name{font-family:"Poppins",sans-serif;font-weight:700;font-size:1.08rem;line-height:1.35;color:var(--nlfb-ink);margin:0;}
    .ec-name.ec-tba{color:#a9b7c6;font-weight:600;font-style:italic;font-size:.98rem;}
    .ec-red{--ec-accent:var(--nlfb-red);--ec-soft:var(--nl-tint-red);--ec-grad:linear-gradient(145deg,#e4002b,#8f0019);}
    .ec-green{--ec-accent:var(--nlfb-green);--ec-soft:var(--nl-tint-green-2);--ec-grad:linear-gradient(145deg,#00693e,#013d24);}
    .ec-blue{--ec-accent:var(--nlfb-blue);--ec-soft:var(--nl-tint-blue);--ec-grad:linear-gradient(145deg,#0b5fa5,#06264a);}

    .ec-row{display:flex;align-items:center;gap:1rem;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1rem 1.2rem;height:100%;transition:transform .2s ease,box-shadow .2s ease,border-color .2s ease;}
    .ec-row:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(6,38,74,.1);border-color:var(--ec-accent);}
    .ec-row .ec-mini{flex-shrink:0;width:56px;height:56px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.1rem;color:#fff;background:var(--ec-grad);}
    .ec-row .ec-name{font-size:.98rem;}
    .ec-row small{display:block;font-size:.74rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--ec-accent);margin-top:.15rem;}

    .ec-advisor-wrap{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2.4rem 2rem;position:relative;overflow:hidden;}
    .ec-advisor-wrap::after{content:"";position:absolute;left:0;right:0;bottom:0;height:5px;background:linear-gradient(90deg,var(--nlfb-green) 0 50%,var(--nlfb-red) 50% 100%);}
    .ec-advisor-wrap .ec-group-title h3{color:#fff;}
    .ec-advisor-wrap .ec-group-title i{background:rgba(255,255,255,.15);}
    .ec-advisor-wrap .ec-group-title::after{background:linear-gradient(90deg,rgba(255,255,255,.3),transparent);}
    .ec-advisor{display:flex;align-items:center;gap:1rem;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);border-radius:var(--radius-md);padding:1rem 1.2rem;height:100%;transition:background .2s ease;}
    .ec-advisor:hover{background:rgba(255,255,255,.14);}
    .ec-advisor .ec-mini{flex-shrink:0;width:56px;height:56px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;font-size:1.1rem;color:var(--nlfb-heading);background:var(--nl-surface);}
    .ec-advisor .ec-name{color:#fff;font-size:.98rem;}
    .ec-advisor small{display:block;font-size:.74rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:#5fd3a3;margin-top:.15rem;}

    @media (max-width:575.98px){
        .ec-advisor-wrap{padding:1.8rem 1.1rem;}
        .ec-count strong{font-size:1.6rem;}
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
                <div class="ec-intro">
                    <div class="eyebrow">Our Leadership</div>
                    <h2 class="section-title mt-2 mb-3">Executive Committee</h2>
                    <p class="mb-0">The Executive Committee leads the National Liver Foundation of Bangladesh in its work on Prevention, Treatment, Education and Research on liver diseases, guided by a panel of distinguished advisors.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ec-count">
                    <div><strong>{{count($officeBearers)}}</strong><span>Office Bearers</span></div>
                    <div><strong>{{count($members)}}</strong><span>Members</span></div>
                    <div><strong>{{count($advisors)}}</strong><span>Advisors</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ OFFICE BEARERS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="ec-group-title"><i class="fa-solid fa-users-gear"></i><h3>Office Bearers</h3></div>
        <div class="row g-4 justify-content-center">
            @foreach($officeBearers as $person)
            <div class="col-md-6 col-lg-4">
                <div class="ec-card ec-{{$person['tone']}}">
                    <div class="ec-avatar {{$person['name'] ? '' : 'ec-empty'}}">
                        @if($person['name'])
                            {{$initials($person['name'])}}
                        @else
                            <i class="fa-solid fa-user"></i>
                        @endif
                        <span class="ec-badge"><i class="fa-solid {{$person['icon']}}"></i></span>
                    </div>
                    <div class="ec-role">{{$person['role']}}</div>
                    @if($person['name'])
                    <h5 class="ec-name">{{$person['name']}}</h5>
                    @else
                    <h5 class="ec-name ec-tba">To be announced</h5>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ MEMBERS ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="ec-group-title"><i class="fa-solid fa-user-group" style="background:linear-gradient(145deg,#00693e,#013d24);"></i><h3>Member</h3></div>
        <div class="row g-4">
            @foreach($members as $name)
            <div class="col-md-6 col-lg-4">
                <div class="ec-row ec-green">
                    <div class="ec-mini">{{$initials($name)}}</div>
                    <div>
                        <h5 class="ec-name">{{$name}}</h5>
                        <small>Member</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ ADVISORS ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="ec-advisor-wrap">
            <div class="ec-group-title"><i class="fa-solid fa-user-graduate"></i><h3>Advisor</h3></div>
            <div class="row g-3 g-md-4">
                @foreach($advisors as $name)
                <div class="col-md-6">
                    <div class="ec-advisor">
                        <div class="ec-mini">{{$initials($name)}}</div>
                        <div>
                            <h5 class="ec-name">{{$name}}</h5>
                            <small>Advisor</small>
                        </div>
                    </div>
                </div>
                @endforeach
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
                    <i class="fa-solid fa-hand-holding-heart" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Work With Us</h3>
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

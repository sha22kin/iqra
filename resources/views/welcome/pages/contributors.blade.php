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
    /*
     | Personal contributors — one person per block, blocks separated by a blank line.
     | First line = name, following lines = designation / organisation.
     */
    $contributorsText = <<<'TXT'
Mr. Mahbubey Alam
Attorney General
Govt. of the Peoples Republic of Bangladesh.

Mr. M.Kaiser Rahman
Managing Director
FCI (BD) Ltd

Haji.Akaddas Ali
Businessman
United Kingdom

Dr. Mostafizur Rahman
Managing Director
Popular Diagnostic Centre Ltd.
& Popular Pharmaceuticals Ltd.

Md. Masuduzzaman
Managing Director
Baly shoe Industries Ltd.

Mr. Zakaria Taher Sumon
Former Member of Parliament

Mr. Ataur Malik, Engineer
Saudi Arabia

Mrs. Taslima Kabir
Social worker

Dr. Ziauddin Ahmed
Associate Professor
Dept. of Medicine
Draxtel University College of Medicine
Philadelphia, USA

Mrs Shahnaz Ahmed Malik
Social worker

Prof. Shamsun Nahar
Professor & Head (Former)
Dept. of Obstretics & Gynaecology
Chittagong Medical College.

Dr. Chowdhury Hasan Mahmud
Managing Director
Graphic Machinery & Equipment Ltd.

Dr. Md. Khaled Mohsin
Senior Consultant Cardiology
Square Hospital Ltd.

Dr. Toufique Rahman Chowdhury
Director
Mercantile Bank Ltd.

Mr. Mahmud us Samad Chowdhury MP
Member of Parliament, Sylhet-3
Chairman
Samad Group of Industries Ltd
TXT;

    $contributors = [];
    foreach(preg_split('/\R\s*\R/', trim($contributorsText)) as $block){
        $lines = array_values(array_filter(array_map('trim', preg_split('/\R/', $block)), 'strlen'));
        if(!$lines){ continue; }
        $contributors[] = ['name'=>array_shift($lines), 'details'=>$lines];
    }

    // Initials from a name, ignoring honorifics and anything after a comma.
    $initials = function($name){
        $name = explode(',', $name)[0];
        $clean = preg_replace('/\b(Prof|Professor|Dr|Mr|Mrs|Md|Haji|MP)\b\.?/i', ' ', $name);
        $words = array_values(array_filter(preg_split('/[\s.]+/', trim($clean)), 'strlen'));
        if(!$words){ return '?'; }
        $first = strtoupper(mb_substr($words[0], 0, 1));
        $last = count($words) > 1 ? strtoupper(mb_substr(end($words), 0, 1)) : '';
        return $first.$last;
    };
    $tones = ['blue','green','red'];
@endphp
@push('css')
<style>
    .cb-intro p{font-size:1.04rem;color:var(--nl-text);line-height:1.75;}
    .cb-heart{position:relative;width:100%;max-width:300px;aspect-ratio:1;margin:0 auto;}
    .cb-heart .cb-ring{position:absolute;border-radius:50%;}
    .cb-heart .cr-1{inset:0;background:var(--nl-tint-green-2);}
    .cb-heart .cr-2{inset:16%;background:var(--nl-surface);}
    .cb-heart .cr-3{inset:30%;background:linear-gradient(145deg,#e4002b,#8f0019);display:flex;flex-direction:column;align-items:center;justify-content:center;color:#fff;box-shadow:0 14px 30px rgba(143,0,25,.3);}
    .cb-heart .cr-3 strong{font-family:"Poppins",sans-serif;font-size:2.4rem;line-height:1;}
    .cb-heart .cr-3 span{font-size:.7rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;opacity:.85;margin-top:.3rem;}
    .cb-heart .cb-float{position:absolute;width:44px;height:44px;border-radius:50%;background:var(--nl-surface);display:flex;align-items:center;justify-content:center;box-shadow:0 10px 22px rgba(6,38,74,.14);animation:cbFloat 4s ease-in-out infinite;}
    .cb-heart .cf-1{top:4%;right:8%;color:var(--nlfb-red);}
    .cb-heart .cf-2{bottom:10%;left:2%;color:var(--nlfb-green);animation-delay:1.3s;}
    .cb-heart .cf-3{top:42%;left:-4%;color:var(--nlfb-blue);animation-delay:2.6s;}
    @keyframes cbFloat{0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);}}

    .cb-group-title{display:flex;align-items:center;gap:.8rem;margin-bottom:1.6rem;}
    .cb-group-title h3{margin:0;font-size:1.35rem;color:var(--nlfb-ink);}
    .cb-group-title i{width:40px;height:40px;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;background:linear-gradient(145deg,#e4002b,#8f0019);}
    .cb-group-title::after{content:"";flex:1;height:2px;background:linear-gradient(90deg,#c9d9ea,transparent);}

    .cb-card{position:relative;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.2rem 1.2rem 1.1rem;height:100%;display:flex;gap:1rem;align-items:flex-start;overflow:hidden;transition:transform .2s ease,box-shadow .2s ease,border-color .2s ease;}
    .cb-card::before{content:"";position:absolute;left:0;top:0;bottom:0;width:4px;background:var(--cb-accent);}
    .cb-card:hover{transform:translateY(-4px);box-shadow:0 14px 28px rgba(6,38,74,.1);border-color:var(--cb-accent);}
    .cb-avatar{flex-shrink:0;width:52px;height:52px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;font-size:1rem;color:#fff;background:var(--cb-grad);}
    .cb-card h5{margin:0 0 .35rem;font-family:"Poppins",sans-serif;font-weight:700;font-size:.98rem;line-height:1.35;color:var(--nlfb-ink);padding-right:1.6rem;}
    .cb-card ul{list-style:none;padding:0;margin:0;}
    .cb-card li{font-size:.84rem;line-height:1.5;color:var(--nl-muted);}
    .cb-card li:first-child{color:var(--cb-accent);font-weight:600;}
    .cb-card .cb-no{position:absolute;top:.55rem;right:.75rem;font-family:"Poppins",sans-serif;font-weight:700;font-size:.74rem;color:#c9d9ea;}
    .cb-blue{--cb-accent:var(--nlfb-blue);--cb-grad:linear-gradient(145deg,#0b5fa5,#06264a);}
    .cb-green{--cb-accent:var(--nlfb-green);--cb-grad:linear-gradient(145deg,#00693e,#013d24);}
    .cb-red{--cb-accent:var(--nlfb-red);--cb-grad:linear-gradient(145deg,#e4002b,#8f0019);}

    .cb-thanks{background:linear-gradient(160deg,var(--nlfb-blue) 0%,var(--nlfb-blue-dark) 100%);border-radius:var(--radius-lg);padding:2.2rem 2rem;color:#fff;text-align:center;position:relative;overflow:hidden;}
    .cb-thanks::after{content:"";position:absolute;left:0;right:0;bottom:0;height:5px;background:linear-gradient(90deg,var(--nlfb-green) 0 50%,var(--nlfb-red) 50% 100%);}
    .cb-thanks i{font-size:2rem;color:#5fd3a3;margin-bottom:.8rem;}
    .cb-thanks p{font-family:"Poppins",sans-serif;font-weight:600;font-size:1.15rem;line-height:1.6;color:#fff;max-width:760px;margin:0 auto;}

    @media (max-width:575.98px){
        .cb-heart{max-width:230px;}
        .cb-thanks{padding:1.8rem 1.2rem;}
        .cb-thanks p{font-size:1rem;}
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
                <div class="cb-intro">
                    <div class="eyebrow">With Heartfelt Thanks</div>
                    <h2 class="section-title mt-2 mb-3">Contributors</h2>
                    <p class="mb-0">The work of the National Liver Foundation of Bangladesh is made possible by the generosity of individuals who have personally contributed to its mission of Prevention, Treatment, Education and Research on liver diseases in Bangladesh.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cb-heart">
                    <div class="cb-ring cr-1"></div>
                    <div class="cb-ring cr-2"></div>
                    <div class="cb-ring cr-3"><strong>{{count($contributors)}}</strong><span>Contributors</span></div>
                    <div class="cb-float cf-1"><i class="fa-solid fa-heart"></i></div>
                    <div class="cb-float cf-2"><i class="fa-solid fa-hand-holding-heart"></i></div>
                    <div class="cb-float cf-3"><i class="fa-solid fa-handshake"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ PERSONAL CONTRIBUTION ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="cb-group-title"><i class="fa-solid fa-hand-holding-heart"></i><h3>Personal Contribution</h3></div>
        <div class="row g-3 g-md-4">
            @foreach($contributors as $i => $person)
            <div class="col-md-6 col-lg-4">
                <div class="cb-card cb-{{$tones[$i % 3]}}">
                    <span class="cb-no">{{str_pad($i + 1, 2, '0', STR_PAD_LEFT)}}</span>
                    <div class="cb-avatar">{{$initials($person['name'])}}</div>
                    <div>
                        <h5>{{$person['name']}}</h5>
                        @if($person['details'])
                        <ul>
                            @foreach($person['details'] as $line)
                            <li>{{$line}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ THANK YOU ============ -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-2">
        <div class="cb-thanks">
            <i class="fa-solid fa-heart-pulse d-block"></i>
            <p>We are deeply grateful to every contributor whose generosity helps us serve liver disease patients across Bangladesh.</p>
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="pb-5 bg-white">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-hand-holding-dollar" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Become a Contributor</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Your contribution helps create facilities for prevention and treatment of liver diseases with minimum cost.</p>
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

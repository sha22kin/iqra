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
     | Life members — one person per block, blocks separated by a blank line.
     | First line = name, following lines = designation / organisation.
     | "(Deceased)" after the name or on its own line marks the member as deceased.
     */
    $lifeMembersText = <<<'TXT'
Maj Gen Prof. A.R Khan (Retd)
Hon. Chief Consultant
Dept of Medicine
BIRDEM General Hospital

Brig. Prof. Abdul Malik (Retd)
National Professor
Founder and President, National Heart Foundation Hospital & Research Institute & Former Advisor, Ministry of Health & Family planning
Caretaker Government, Peoples Republic of Bangladesh

National Professor A.K. Azad Khan
President, Diabetic Association of Bangladesh (BADAS)
Hon. President, Bangladesh Gastroenterology Society

National Professor Mahmud Hassan
President, Bangladesh Medical Association
President, Bangladesh Gastroenterology Society
President, Bangladesh Medical & Dental Council
Former Vice-Chancellor, BSMMU

Prof. Mirza M. Islam (Deceased)
Hon. Chief Consultant, Dept. of Surgery
BIRDEM General Hospital

Prof. Mohammad Ali
Professor
Dept. of Hepato-Biliary- Pancreatic Surgery & Liver Transplant,
BIRDEM General Hospital

Prof. S. N. Samad Choudhury (Deceased)
Former Dean
Faculty of Medicine
University of Dhaka

Prof. Syed Ershad Ali (Deceased)
Former Professor of Gynae. & Obs.
Bangladesh Medical College & Hospital

Dr. C M Delwar Rana
Former Joint Director, BIRDEM

Mrs. Taslima Kabir
Social worker

Mrs. Zeba Rasheed Chowdhury
Social worker

Prof. Mohammed Hanif
Professor of Paediatrics
Bangladesh Institute of Child Health

Prof. Tareak Al Naser
Professor of Pathology
Apollo Hospital, Dhaka

Halida Hanum Akhter
Former Director General
Family Planning Association of Bangladesh

Mr. Monzoor ul Karim
Former President, Bangladesh Scouts.
Former Secretary,
Ministry of Health & Population Control
Govt. of Bangladesh

Mr. Mahfuzur Rahman
Chairman & MD,
ATN Bangla & ATN News

Prof. M. T. Rahman
Former Prof. of Gastroenterology
BSMMU, Dhaka

Prof. A. Q. M. Mohsin
Former Professor
Dept of GHPD,
BIRDEM General Hospital

Prof . Mohd. Anisur Rahman
Professor of GHPD,
BIRDEM General Hospital

Mr. Hafiz Majumder
Businessman

Prof. M. S. Arfin
Prof. of Gastroenterology.
Bangladesh Specialized Hospital

Dr. Mohsin Kabir (Deceased)
Former Associate. Professor
Dept of GHPD, BIRDEM General Hospital

Mr. Mahbubul Alam
Executive Director
Suvastu Development Limited.

Mr. Golam Murtaza Chowdhury
Managing Director
Friends International

Prof. Khwaza NazimUddin
Former Professor of Medicine
BIRDEM General Hospital

Dr. Abdul Hai
Former Director
Niramoi Clinic, Sylhet

Mr. M. Kaiser Rahman
Managing Director
FCI (BD) Ltd

Mr. M.A. Matin
Chairman
FCI (BD) Ltd

Dr. Mostafizur Rahman
Managing Director
Popular Diagnostic Centre Ltd.
& Popular Pharmaceuticals Ltd.

Advocate Mahbub-e-Alam
(Deceased)
Attorney General
Govt. of the People’s Republic of Bangladesh

Md. Wahiduzzaman
Managing Director
Baly Artificial Leather Industries Ltd

Md. Masuduzzaman
Managing Director
Baly shoe Industries Ltd.

Md. Moniruzzaman
Managing Director
Baly Artificial Leather Ind Ltd

Haji.Akaddas Ali
Businessman
United Kingdom

Mrs. Shahnaz Ahmed Malik
Director Administration
Malik Group of Companies

Dr. Sarder A. Nayeem
Managing Director
Japan-Bangladesh Friendship Hospital, Dhaka

Prof. M. A Salam
Former Chairman
Department of Urology
Bangabandhu Sheikh Mujib Medical University

Engr. Kabir Ahmed Bhuiyan
Chairman
Comfort Diagnostic centre (Pvt.) LTD.

Professor M.A. Khaleque (Deceased)
Former Professor of Medicine & Head
Dept. of Medicine
MAG Osmani Medical College, Sylhet

Nobel Laureate Dr Muhammad Yunus
Founder, Grameen Bank

Prof. Shamsun Nahar
Former Professor & Head
Dept. of Obstretics & Gynaecology
Chittagong Medical College.

Dr. Alamgir Haider
Crescent Gastroliver & General Hospital

Mrs Shajeda Khatoon (Deceased)
Social worker

Advocate A. M. Aminuddin
Attorney General
Govt. of the People’s Republic of Bangladesh

Dr. Md. Golam Azam
Associate Professor, Dept. of GHPD, BIRDEM General Hospital

Justice Nozrul Islam Choudhury
Former Judge, High Court
Division of Supreme Court, Bangladesh

Professor Dr. M. Sawkat Hassan
Professor Dept. of Immunology
BIRDEM General Hospital

Professor Ziauddin Ahmed
Professor
Dept. of Medicine
Draxtel University College of Medicine
Philadelphia, USA

Professor Jamilur R. Choudhury
(Deceased)
Vice Chancellor
University of Asia Pacific & Former Advisor
Ministry of Power, Energy and Mineral Resources
Caretaker Government, People`s Republic of Bangladesh

Professor Ainun Afroze
Former Professor
Dept. of Pediatrics, Gastroenterology & Nutrition
Bangabandhu Sheikh Mujib Medical University (BSMMU)

Dr. Maj. Gen. Md. Rabiul Hossain
Former Director General Armed Forces Medical Services (DGAMS)

Prof. A H M Towhidul Anowar Chowdhury
Professor of Obstetrics & Gynecology
BIRDEM General Hospital

Dr. Md. Khaled Mohsin
Senior Consultant Cardiology
National Heart Foundation Hospital & Research Institute

Dr. Md. Mamunur Rashid
Professor and Head
Dept. of Hepato-Biliary- Pancreatic Surgery & Liver Transplant,
BIRDEM General Hospital

Dr. Hasim Rabbi
Associate Professor
Dept. of Hepato-Biliary- Pancreatic Surgery & Liver Transplant,
BIRDEM General Hospital

Dr. Hafiz Ahmed Nazmul Hakim
Associate Professor, Dept. of Surgery
Dhaka Medical College Hospital

Prof. M. Mahmudur Rahman (Deceased)
Advisor & Chief Co-ordinator
Youth Development Dept.
Modern Herbal Group

Mr. Abul Maal Abdul Muhit (Deceased)
Former Minister
Ministry of Finance
Govt. of the People’s Republic of Bangladesh

National Professor M. R. Khan (Deceased)
Professor of Child Health
Institute of Child Health &
Shishu Sasthya Foundation Hospital

Mr. Miah Abdullah Wazed
Managing Director
Millat Chemical Co. Ltd. &
Millat Pharmaceuticals Ltd.

Dr. Md. Nazmul Hoque
Associate Professor Dept. of GHPD, BIRDEM General Hospital

Mr. Kazi Ershad Ahmed (Deceased)
Managing Director
Agrani Commerce & Finance M.C.S. Ltd.

Prof. A S M Fazlul Karim
President
Chattagram Maa-Shishu O General Hospital

Dr. Muhammad Yousuf
Associate Professor
Chattagram Maa-Shishu O General Hospital

Mr. Golam Mustafa
Businessman
Chittagong

Dr. Humayun Kabir
Former Assistant Professor
Ibrahim Medical College
Former Regional Board Member, South East Asia Region,
World Hepatitis Alliance, Geneva
(Liver Transplant Recipient)

Dr. Toufique Rahman Chowdhury
Chairman, Board of Trustees Metropolitan University.

Md. Abdul Jalil MP (Deceased)
Former Member of Parliament.
Former Commerce Minister
Govt. of The Peoples Republic of Bangladesh
Former Chairman, Mercantile Bank Ltd.

Mrs. Jebun Nessa Hoque MP
Former Member of Parliament

Prof. (Dr.) Md. Abu Sayeed
Former Professor Dept. of Medicine
Chittagong Medical College & Hospital

Md. Reaz Ul Islam
Assistant Professor, Golachipa Degree Mohila College, Patuakhali
(Liver Transplant recipient)

Mr. Mahmud us Samad Chowdhury MP
(Deceased)
Former Member of Parliament, Sylhet-3
Former Chairman
Samad Group of Industries Ltd.

Mrs. Farzana Chowdhury
Managing Director
Kushiara Power Co. Ltd.

Mr. Ahmed us Samad Chowdhury
Director
Kushiara Power Co. Ltd.

Dr. Chowdhury Hasan Mahmud (Deceased)
Managing Director
Graphic Machinery & Equipment Ltd.

Dr. Lopa Sharmin Kabir
Internal Medicine Physician
Marshfield Clinic, Wisconsin, USA
TXT;

    $lifeMembers = [];
    foreach(preg_split('/\R\s*\R/', trim($lifeMembersText)) as $block){
        $lines = array_values(array_filter(array_map('trim', preg_split('/\R/', $block)), 'strlen'));
        if(!$lines){ continue; }
        $name = array_shift($lines);
        $deceased = false;
        if(stripos($name, '(Deceased)') !== false){
            $deceased = true;
            $name = trim(str_ireplace('(Deceased)', '', $name));
        }
        $details = [];
        foreach($lines as $line){
            if(strcasecmp($line, '(Deceased)') === 0){ $deceased = true; continue; }
            $details[] = $line;
        }
        $lifeMembers[] = ['name'=>$name, 'details'=>$details, 'deceased'=>$deceased];
    }
    $deceasedCount = count(array_filter($lifeMembers, fn($m) => $m['deceased']));

    // Initials from a name, ignoring honorifics and titles.
    $initials = function($name){
        $clean = preg_replace('/\((Retd|Dr\.?)\)|\b(Maj|Gen|Brig|Prof|Professor|National|Nobel|Laureate|Dr|Mr|Mrs|Md|Mohd|Engr|Advocate|Justice|Haji|MP|Retd)\b\.?/i', ' ', $name);
        $words = array_values(array_filter(preg_split('/[\s.()]+/', trim($clean)), 'strlen'));
        if(!$words){ return '?'; }
        $first = strtoupper(mb_substr($words[0], 0, 1));
        $last = count($words) > 1 ? strtoupper(mb_substr(end($words), 0, 1)) : '';
        return $first.$last;
    };
    $tones = ['blue','green','red'];
@endphp
@push('css')
<style>
    .lm-intro p{font-size:1.04rem;color:var(--nl-text);line-height:1.75;}
    .lm-stats{display:grid;grid-template-columns:repeat(2,1fr);gap:1rem;}
    .lm-stats > div{background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.2rem 1rem;text-align:center;}
    .lm-stats strong{display:block;font-family:"Poppins",sans-serif;font-size:2.2rem;line-height:1;color:var(--nlfb-blue);}
    .lm-stats > div:nth-child(2) strong{color:#6b7a8c;}
    .lm-stats span{display:block;font-size:.76rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--nl-faint);margin-top:.45rem;}

    .lm-toolbar{position:sticky;top:78px;z-index:5;background:var(--nlfb-cream);padding:.8rem 0 1rem;margin-bottom:1.2rem;}
    .lm-search{position:relative;max-width:560px;margin:0 auto;}
    .lm-search i{position:absolute;left:1.1rem;top:50%;transform:translateY(-50%);color:var(--nl-faint);}
    .lm-search input{width:100%;border:1px solid var(--nl-line-strong);border-radius:999px;padding:.85rem 3.2rem .85rem 2.8rem;font-size:.95rem;background:var(--nl-surface);box-shadow:0 8px 20px rgba(6,38,74,.06);outline:none;transition:border-color .2s ease,box-shadow .2s ease;}
    .lm-search input:focus{border-color:var(--nlfb-blue);box-shadow:0 8px 24px rgba(11,95,165,.15);}
    .lm-search .lm-clear{position:absolute;right:.6rem;top:50%;transform:translateY(-50%);border:none;background:var(--nl-tint-blue);color:var(--nlfb-blue);width:2rem;height:2rem;border-radius:50%;display:none;}
    .lm-result{text-align:center;font-size:.84rem;color:var(--nl-muted);margin-top:.6rem;}

    .lm-card{position:relative;background:var(--nl-surface);border:1px solid var(--nl-line);border-radius:var(--radius-md);padding:1.2rem 1.2rem 1.1rem;height:100%;display:flex;gap:1rem;align-items:flex-start;overflow:hidden;transition:transform .2s ease,box-shadow .2s ease,border-color .2s ease;}
    .lm-card::before{content:"";position:absolute;left:0;top:0;bottom:0;width:4px;background:var(--lm-accent);}
    .lm-card:hover{transform:translateY(-4px);box-shadow:0 14px 28px rgba(6,38,74,.1);border-color:var(--lm-accent);}
    .lm-avatar{flex-shrink:0;width:52px;height:52px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:"Poppins",sans-serif;font-weight:700;font-size:1rem;color:#fff;background:var(--lm-grad);}
    .lm-card h5{margin:0 0 .35rem;font-family:"Poppins",sans-serif;font-weight:700;font-size:.98rem;line-height:1.35;color:var(--nlfb-ink);padding-right:1.6rem;}
    .lm-card ul{list-style:none;padding:0;margin:0;}
    .lm-card li{font-size:.84rem;line-height:1.5;color:var(--nl-muted);}
    .lm-card li:first-child{color:var(--lm-accent);font-weight:600;}
    .lm-card .lm-no{position:absolute;top:.55rem;right:.75rem;font-family:"Poppins",sans-serif;font-weight:700;font-size:.74rem;color:#c9d9ea;}
    .lm-blue{--lm-accent:var(--nlfb-blue);--lm-grad:linear-gradient(145deg,#0b5fa5,#06264a);}
    .lm-green{--lm-accent:var(--nlfb-green);--lm-grad:linear-gradient(145deg,#00693e,#013d24);}
    .lm-red{--lm-accent:var(--nlfb-red);--lm-grad:linear-gradient(145deg,#e4002b,#8f0019);}
    .lm-card.lm-deceased{--lm-accent:#6b7a8c;--lm-grad:linear-gradient(145deg,#8a97a6,#4b5866);background:var(--nl-surface-3);}
    .lm-memoriam{display:inline-flex;align-items:center;gap:.35rem;font-size:.68rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:#6b7a8c;background:var(--nl-surface-2);border-radius:999px;padding:.22rem .65rem;margin-bottom:.45rem;}
    .lm-empty{display:none;text-align:center;padding:3rem 1rem;color:var(--nl-muted);}
    .lm-empty i{font-size:2rem;color:#c9d9ea;margin-bottom:.6rem;}

    @media (max-width:991.98px){
        .lm-toolbar{top:0;}
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
                <div class="lm-intro">
                    <div class="eyebrow">Our Lifelong Supporters</div>
                    <h2 class="section-title mt-2 mb-3">Life Members</h2>
                    <p class="mb-0">Distinguished physicians, academics, public figures, business leaders and social workers who have stood with the National Liver Foundation of Bangladesh as life members, supporting its work on Prevention, Treatment, Education and Research on liver diseases.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="lm-stats">
                    <div><strong>{{count($lifeMembers)}}</strong><span>Life Members</span></div>
                    <div><strong>{{$deceasedCount}}</strong><span>In Memoriam</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ MEMBER DIRECTORY ============ -->
<section class="py-5 py-lg-6 bg-nlfb-cream">
    <div class="container py-2">
        <div class="lm-toolbar">
            <div class="lm-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" id="lmSearch" placeholder="Search by name, designation or organisation..." autocomplete="off" aria-label="Search life members">
                <button type="button" class="lm-clear" id="lmClear" aria-label="Clear search"><i class="fa-solid fa-xmark" style="position:static;transform:none;color:inherit;"></i></button>
            </div>
            <div class="lm-result" id="lmResult">Showing all {{count($lifeMembers)}} life members</div>
        </div>

        <div class="row g-3 g-md-4" id="lmGrid">
            @foreach($lifeMembers as $i => $member)
            <div class="col-md-6 col-lg-4 lm-item" data-search="{{mb_strtolower($member['name'].' '.implode(' ', $member['details']))}}">
                <div class="lm-card lm-{{$tones[$i % 3]}} {{$member['deceased'] ? 'lm-deceased' : ''}}">
                    <span class="lm-no">{{str_pad($i + 1, 2, '0', STR_PAD_LEFT)}}</span>
                    <div class="lm-avatar">{{$initials($member['name'])}}</div>
                    <div>
                        <h5>{{$member['name']}}</h5>
                        @if($member['deceased'])
                        <span class="lm-memoriam"><i class="fa-solid fa-dove"></i> Deceased</span>
                        @endif
                        @if($member['details'])
                        <ul>
                            @foreach($member['details'] as $line)
                            <li>{{$line}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="lm-empty" id="lmEmpty">
            <i class="fa-solid fa-user-slash d-block"></i>
            No life member matches your search.
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="support-banner">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center mb-3 mb-lg-0">
                    <i class="fa-solid fa-id-card" style="font-size:2.6rem;"></i>
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-2">Become a Life Member</h3>
                    <p class="mb-0" style="color:rgba(255,255,255,.85);">Stand with the National Liver Foundation of Bangladesh and support the fight against liver disease for life.</p>
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
    var input = document.getElementById('lmSearch');
    var clear = document.getElementById('lmClear');
    var result = document.getElementById('lmResult');
    var empty = document.getElementById('lmEmpty');
    var items = Array.prototype.slice.call(document.querySelectorAll('#lmGrid .lm-item'));
    var total = items.length;

    function filter() {
        var q = input.value.trim().toLowerCase();
        var shown = 0;
        items.forEach(function (item) {
            var match = !q || item.getAttribute('data-search').indexOf(q) !== -1;
            item.style.display = match ? '' : 'none';
            if (match) shown++;
        });
        clear.style.display = q ? 'block' : 'none';
        empty.style.display = shown ? 'none' : 'block';
        result.textContent = q ? ('Showing ' + shown + ' of ' + total + ' life members') : ('Showing all ' + total + ' life members');
    }

    input.addEventListener('input', filter);
    clear.addEventListener('click', function () { input.value = ''; filter(); input.focus(); });
})();
</script>
@endpush

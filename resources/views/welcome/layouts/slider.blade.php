<div class="flag-bar"></div>

<!-- ============ HERO ============ -->
<section class="hero">
  <div class="container position-relative">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 order-2 order-lg-1">
        <span class="hero-badge mb-3"><i class="fa-solid fa-shield-heart"></i> Since 2005 &middot; Fighting Liver Disease in Bangladesh</span>
        <h1 class="sliderTitle mt-3 mb-2">Protecting <span>Liver Health</span>, <br>One Family at a Time</h1>
        <div class="bn-tagline bn mb-3"><span class="redcolor">লিভার সুস্থ</span>, <span class="greencolor">জীবন সুন্দর</span></div>
        <p class="lead mb-4">National Liver Foundation of Bangladesh works to prevent, diagnose and treat liver disease through free screening camps, public awareness and support for patients and families across the country.</p>
        <div class="d-flex flex-wrap gap-3">
          <a href="{{($dPage = pageTemplate('Donations')) ? route('pageView',$dPage->slug?:'no-title') : '#donate'}}" class="btn-donate btn">Donate Now <i class="fa-solid fa-heart ms-1"></i></a>
          <a href="#about" class="btn btn-outline-light-nlfb">Learn More</a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2">
        <div class="liver-orb">
          <div class="orb-glow"></div>
          <div class="ring r1"></div>
          <div class="ring r2"></div>
          <div class="disc">
            <svg class="liver-illustration" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="liverGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                  <stop offset="0%" stop-color="#e2475c"/>
                  <stop offset="55%" stop-color="#b3172f"/>
                  <stop offset="100%" stop-color="#7d0f22"/>
                </linearGradient>
                <linearGradient id="liverLobeShade" x1="0%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" stop-color="#000" stop-opacity="0"/>
                  <stop offset="100%" stop-color="#000" stop-opacity=".22"/>
                </linearGradient>
                <linearGradient id="gallGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                  <stop offset="0%" stop-color="#2fae74"/>
                  <stop offset="100%" stop-color="#00693e"/>
                </linearGradient>
                <clipPath id="liverClip">
                  <path d="M28,82 C26,60 46,46 76,44 C110,42 150,46 178,58 C190,63 190,74 179,79 C160,88 138,98 118,106 C106,111 98,118 90,126 C78,140 56,148 40,138 C28,130 29,102 28,82 Z"/>
                </clipPath>
              </defs>

              <g class="liver-shape">
                <!-- hepatic vessels & bile duct (porta hepatis) -->
                <path d="M96,112 C95,126 93,138 90,150" fill="none" stroke="#0B5FA5" stroke-width="7" stroke-linecap="round"/>
                <path d="M104,110 C105,124 106,136 108,150" fill="none" stroke="#e4002b" stroke-width="4.5" stroke-linecap="round"/>
                <path d="M84,122 C88,132 94,140 99,152" fill="none" stroke="#00693e" stroke-width="3.5" stroke-linecap="round"/>

                <!-- liver: large right lobe (viewer's left) tapering into the left lobe -->
                <path fill="url(#liverGrad)" d="M28,82
                  C26,60 46,46 76,44
                  C110,42 150,46 178,58
                  C190,63 190,74 179,79
                  C160,88 138,98 118,106
                  C106,111 98,118 90,126
                  C78,140 56,148 40,138
                  C28,130 29,102 28,82 Z"/>

                <!-- lower shading for depth -->
                <rect x="20" y="88" width="175" height="66" fill="url(#liverLobeShade)" clip-path="url(#liverClip)"/>

                <!-- falciform ligament dividing the lobes -->
                <path d="M122,46 C120,66 118,86 114,106" fill="none" stroke="#5c0a19" stroke-opacity=".45" stroke-width="2.2" stroke-linecap="round"/>

                <!-- highlight sheen -->
                <path fill="none" stroke="#ffffff" stroke-opacity=".6" stroke-width="4" stroke-linecap="round"
                  d="M42,70 C54,56 76,51 100,51"/>
                <path fill="none" stroke="#ffffff" stroke-opacity=".35" stroke-width="3" stroke-linecap="round"
                  d="M134,54 C148,56 160,59 170,63"/>

                <!-- gallbladder tucked under the right lobe -->
                <path fill="url(#gallGrad)" d="M72,124 C66,130 64,142 70,148 C76,154 86,150 88,142 C90,134 84,124 78,122 C76,121 74,122 72,124 Z"/>
                <path fill="none" stroke="#ffffff" stroke-opacity=".5" stroke-width="1.8" stroke-linecap="round" d="M70,134 C70,140 72,144 75,146"/>
              </g>
              <!-- pulse / heartbeat line -->
              <polyline class="pulse-line" fill="none" stroke="#0B5FA5" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"
                points="10,186 44,186 54,170 66,200 78,186 112,186 122,174 132,186 190,186"/>
            </svg>
          </div>
          <div class="chip chip-1 text-nlfb-blue">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm-1.2 14.4-4-4 1.4-1.4 2.6 2.6 6-6 1.4 1.4-7.4 7.4Z"/></svg>
            <span class="text-nlfb-blue-dark" style="color:var(--nlfb-heading);">Free Screening</span>
          </div>
          <div class="chip chip-2">
            <svg viewBox="0 0 24 24" fill="var(--nlfb-green)"><path d="M12 21s-6.7-4.3-9.3-8.2C1 10 1.7 6.6 4.6 5.1 6.9 3.9 9.6 4.6 11 6.6l1 1.4 1-1.4c1.4-2 4.1-2.7 6.4-1.5 2.9 1.5 3.6 4.9 1.9 7.7C18.7 16.7 12 21 12 21Z"/></svg>
            <span style="color:var(--nlfb-heading);">Patient Support</span>
          </div>
          <div class="chip chip-3">
            <svg viewBox="0 0 24 24" fill="var(--nlfb-red)"><path d="M3 5c2.5-1 5-1 7 0v14c-2-1-4.5-1-7 0V5Zm18 0c-2.5-1-5-1-7 0v14c2-1 4.5-1 7 0V5Z"/></svg>
            <span style="color:var(--nlfb-heading);">Awareness</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
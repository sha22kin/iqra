<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    @yield('title')
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(general()->favicon())}}" />
    @yield('SEO')
    
    <!-- Google Fonts: Poppins (Full Weights) -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&amp;family=Open+Sans:wght@600;700&amp;display=swap" rel="stylesheet"/>
    <!-- Bootstrap 5.3 CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome 6 Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"/>
    <!-- External Custom CSS -->
    <link href="{{asset('frontend_assets/css/style.css?v=7')}}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet"/>
    @stack('css')
</head>
<body>

    @include(welcomeTheme().'layouts.header')

    <main>
        @yield('contents')
    </main>

    @include(welcomeTheme().'layouts.footer')

    <!-- Bootstrap 5.3 JavaScript Bundle -->
    <script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome 6 Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <!-- Mobile Menu & Dropdown Handlers -->
    <script>
        const mobileToggle = document.getElementById('iqMobileToggle');
        const mobileCloseBtn = document.getElementById('iqMobileCloseBtn');
        const navMenuWrapper = document.getElementById('iqNavMenuWrapper');
        const mobileBackdrop = document.getElementById('iqMobileBackdrop');
        
        function openMenu() {
            if(navMenuWrapper) navMenuWrapper.classList.add('iq-nav-open');
            if(mobileBackdrop) mobileBackdrop.classList.add('iq-backdrop-show');
            document.body.style.overflow = 'hidden';
        }
        
        function closeMenu() {
            if(navMenuWrapper) navMenuWrapper.classList.remove('iq-nav-open');
            if(mobileBackdrop) mobileBackdrop.classList.remove('iq-backdrop-show');
            document.body.style.overflow = '';
        }

        if (mobileToggle) mobileToggle.addEventListener('click', openMenu);
        if (mobileCloseBtn) mobileCloseBtn.addEventListener('click', closeMenu);
        if (mobileBackdrop) mobileBackdrop.addEventListener('click', closeMenu);

        const dropdownTriggers = document.querySelectorAll('.iq-dropdown-trigger');
        dropdownTriggers.forEach(trigger => {
          trigger.addEventListener('click', function(e) {
            if (window.matchMedia('(max-width: 991.98px)').matches) {
              e.preventDefault();
              e.stopPropagation();
              const parent = this.closest('.iq-nav-dropdown');
              if (parent) {
                parent.classList.toggle('iq-dropdown-open');
              }
            }
          });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>AOS.init({duration: 800, once: true, offset: 50});</script>
    <div class="iq-mobile-backdrop" id="iqMobileBackdrop"></div>
    @stack('js')
</body>
</html>
<header class="iq-header">
<div class="container">
<nav class="iq-navbar">
<div class="iq-nav-container">
<!-- Brand Logo -->
<a class="iq-brand-logo" href="{{route('index')}}">
<img alt="Logo" class="iq-logo-img" src="{{asset(general()->logo())}}"/>
</a>
<!-- Mobile Toggle Button -->
<button aria-label="Toggle navigation" class="iq-mobile-toggle" id="iqMobileToggle" type="button">
<i class="fa-solid fa-bars"></i>
</button>
<!-- Navigation Links & Actions -->
<div class="iq-nav-menu-wrapper" id="iqNavMenuWrapper">
<button aria-label="Close navigation" class="iq-mobile-close-btn" id="iqMobileCloseBtn" type="button"><i class="fa-solid fa-xmark"></i></button>
<ul class="iq-nav-menu">
    @if(menu('Header Menus'))
        @foreach(menu('Header Menus')->subMenus as $menu)
            @if($menu->subMenus->count() > 0)
            <li class="iq-nav-item iq-nav-dropdown">
                <a aria-expanded="false" class="iq-nav-link iq-dropdown-trigger" href="javascript:void(0);" role="button">
                    {{$menu->menuName()}} <i class="fa-solid fa-chevron-down iq-dropdown-caret"></i>
                </a>
                <ul class="iq-dropdown-list">
                    @foreach($menu->subMenus as $subMenu)
                    <li><a class="iq-dropdown-link" href="{{asset($subMenu->menuLink())}}">{{$subMenu->menuName()}}</a></li>
                    @endforeach
                </ul>
            </li>
            @else
            <li class="iq-nav-item">
                <a class="iq-nav-link" href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a>
            </li>
            @endif
        @endforeach
    @endif
</ul>
<div class="iq-header-actions">
<!-- Social Icons -->
<div class="iq-social-links">
    @if(general()->facebook_link)
    <a aria-label="Facebook" class="iq-social-link" href="{{general()->facebook_link}}"><i class="fa-brands fa-facebook"></i></a>
    @endif
    @if(general()->twitter_link)
    <a aria-label="Twitter" class="iq-social-link" href="{{general()->twitter_link}}"><i class="fa-brands fa-twitter"></i></a>
    @endif
    @if(general()->instagram_link)
    <a aria-label="Instagram" class="iq-social-link" href="{{general()->instagram_link}}"><i class="fa-brands fa-instagram"></i></a>
    @endif
    @if(general()->linkedin_link)
    <a aria-label="LinkedIn" class="iq-social-link" href="{{general()->linkedin_link}}"><i class="fa-brands fa-linkedin"></i></a>
    @endif
    @if(general()->youtube_link)
    <a aria-label="YouTube" class="iq-social-link" href="{{general()->youtube_link}}"><i class="fa-brands fa-youtube"></i></a>
    @endif
</div>
<!-- Booking CTA Button -->
<a class="iq-btn-booking" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#iqBookingModal">Booking</a>
</div>
</div>
</div>
</nav>
</div>
</header>

<!-- Booking Modal -->
<div class="modal fade iq-booking-modal" id="iqBookingModal" tabindex="-1" aria-labelledby="iqBookingModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="iqBookingModalLabel">Booking</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="iqBookingForm" action="{{route('bookingMail')}}" method="post" novalidate>
@csrf
<div class="modal-body">
<div class="iq-booking-alert" id="iqBookingAlert" role="alert"></div>
<!-- Spam trap -->
<input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" aria-hidden="true">
<div class="row g-3">
<div class="col-md-6">
<label class="form-label" for="bk_shipper">SHIPPER <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="bk_shipper" name="shipper" maxlength="191" required>
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<label class="form-label" for="bk_consignee">CONSIGNEE <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="bk_consignee" name="consignee" maxlength="191" required>
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<label class="form-label" for="bk_commodity">COMMODITY <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="bk_commodity" name="commodity" maxlength="191" required>
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<label class="form-label" for="bk_destination">DESTINATION <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="bk_destination" name="destination" maxlength="191" required>
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<label class="form-label" for="bk_gross_weight">GROSS WEIGHT <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="bk_gross_weight" name="gross_weight" maxlength="100" placeholder="e.g. 1200 KG" required>
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<label class="form-label" for="bk_cubic_volume">CUBIC VOLUME <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="bk_cubic_volume" name="cubic_volume" maxlength="100" placeholder="e.g. 5.5 CBM" required>
<div class="invalid-feedback"></div>
</div>
<div class="col-12">
<label class="form-label" for="bk_email">EMAIL ADDRESS <span class="text-danger">*</span></label>
<input type="email" class="form-control" id="bk_email" name="email" maxlength="150" required>
<div class="invalid-feedback"></div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="iq-btn-booking" id="iqBookingSubmit">Send Booking</button>
</div>
</form>
</div>
</div>
</div>

<style>
.iq-booking-modal .modal-header { background: var(--iq-primary); color: #fff; }
.iq-booking-modal .modal-header .btn-close { filter: invert(1) grayscale(1) brightness(2); }
.iq-booking-modal .modal-title { font-weight: 700; letter-spacing: .5px; }
.iq-booking-modal .form-label { font-size: 13px; font-weight: 600; color: var(--iq-text-dark); margin-bottom: 4px; }
.iq-booking-modal .form-control:focus { border-color: var(--iq-primary-light); box-shadow: 0 0 0 .2rem rgba(5,41,83,.15); }
.iq-booking-modal .iq-btn-booking { padding: 9px 26px; }
.iq-booking-modal .iq-btn-booking:disabled { opacity: .7; cursor: not-allowed; }
.iq-booking-alert { display: none; padding: 10px 14px; border-radius: 4px; margin-bottom: 14px; font-size: 14px; }
.iq-booking-alert.show { display: block; }
.iq-booking-alert.success { background: #e7f6ec; color: #1e6b3a; border: 1px solid #b7e2c4; }
.iq-booking-alert.error { background: #fdecea; color: #8a1f17; border: 1px solid #f5c2bd; }
</style>

@push('js')
<script>
(function(){
    const modal = document.getElementById('iqBookingModal');
    const form = document.getElementById('iqBookingForm');
    const alertBox = document.getElementById('iqBookingAlert');
    const submitBtn = document.getElementById('iqBookingSubmit');
    if(!modal || !form) return;

    // Close the mobile menu when the booking popup opens
    modal.addEventListener('show.bs.modal', function(){
        if(typeof closeMenu === 'function') closeMenu();
    });

    function showAlert(type, msg){
        alertBox.className = 'iq-booking-alert show ' + type;
        alertBox.textContent = msg;
    }

    function clearErrors(){
        alertBox.className = 'iq-booking-alert';
        alertBox.textContent = '';
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    }

    form.addEventListener('submit', function(e){
        e.preventDefault();
        clearErrors();

        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';

        fetch(form.action, {
            method: 'POST',
            headers: {'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest'},
            body: new FormData(form)
        })
        .then(res => res.json().then(data => ({status: res.status, data: data})))
        .then(({status, data}) => {
            if(status === 422 && data.errors){
                Object.keys(data.errors).forEach(function(name){
                    const input = form.querySelector('[name="'+name+'"]');
                    if(input){
                        input.classList.add('is-invalid');
                        const fb = input.parentElement.querySelector('.invalid-feedback');
                        if(fb) fb.textContent = data.errors[name][0];
                    }
                });
                showAlert('error', 'Please fill in all required fields correctly.');
            }else if(status === 429){
                showAlert('error', 'Too many requests. Please wait a minute and try again.');
            }else if(data.success){
                form.reset();
                showAlert('success', data.message);
            }else{
                showAlert('error', data.message || 'Something went wrong. Please try again.');
            }
        })
        .catch(() => showAlert('error', 'Something went wrong. Please try again.'))
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Send Booking';
        });
    });

    // Reset messages when the popup is closed
    modal.addEventListener('hidden.bs.modal', clearErrors);
})();
</script>
@endpush

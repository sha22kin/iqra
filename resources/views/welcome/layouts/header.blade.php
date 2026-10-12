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
<!-- Quotation & Booking CTA Buttons -->
<a class="iq-btn-quotation" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#iqQuotationModal">Need Quotation</a>
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
<label class="form-label" for="bk_consignee">CONSIGNEE</label>
<input type="text" class="form-control" id="bk_consignee" name="consignee" maxlength="191">
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
<label class="form-label" for="bk_cubic_volume">CUBIC VOLUME</label>
<input type="text" class="form-control" id="bk_cubic_volume" name="cubic_volume" maxlength="100" placeholder="e.g. 5.5 CBM">
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

<!-- Quotation Modal -->
<div class="modal fade iq-quotation-modal" id="iqQuotationModal" tabindex="-1" aria-labelledby="iqQuotationModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<form id="iqQuotationForm" action="{{route('quotationMail')}}" method="post" novalidate>
@csrf
<div class="modal-body">
<button type="button" class="btn-close iq-quotation-close" data-bs-dismiss="modal" aria-label="Close"></button>
<h2 class="iq-quotation-title" id="iqQuotationModalLabel">Need a quotation?</h2>
<p class="iq-quotation-intro">Dear Customers, if you wish to receive a quotation, we kindly ask you to fill in below form. Once the form has been duly filled and submitted, the rates will be quoted to you.</p>
<div class="iq-quotation-fields">
<div class="iq-booking-alert" id="iqQuotationAlert" role="alert"></div>
<!-- Spam trap -->
<input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" aria-hidden="true">
<div class="row gx-4 gy-3">
<div class="col-md-6">
<input type="text" class="form-control" name="name" maxlength="191" placeholder="Your Name" aria-label="Your Name">
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="company" maxlength="191" placeholder="Company Name" aria-label="Company Name">
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="phone" maxlength="30" placeholder="Phone Number" aria-label="Phone Number">
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<input type="email" class="form-control" name="email" maxlength="150" placeholder="Email Address" aria-label="Email Address">
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<textarea class="form-control" name="loading_port" rows="4" maxlength="500" placeholder="Loading Port" aria-label="Loading Port"></textarea>
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<textarea class="form-control" name="destination_port" rows="4" maxlength="500" placeholder="Destination Port" aria-label="Destination Port"></textarea>
<div class="invalid-feedback"></div>
</div>
<div class="col-12">
<div class="iq-equipment-label">EQUIPMENT TYPES</div>
<div class="iq-equipment-list">
@foreach(['20 DRY','20 OPEN','20 REEF','20 TANK','40 DRY','40 FLAT','40 HDRY','40 HREF','40 OPEN','40 REEF','40 TANK','45 HDRY','45 HREF'] as $i => $equipment)
<label class="iq-equipment-item" for="qt_eq_{{$i}}"><input type="checkbox" id="qt_eq_{{$i}}" name="equipment_types[]" value="{{$equipment}}">{{$equipment}}</label>
@endforeach
</div>
</div>
<div class="col-md-6">
<input type="text" class="form-control iq-quotation-light" name="commodity" maxlength="191" placeholder="Commodity" aria-label="Commodity">
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<select class="form-select iq-quotation-light" name="dangerous" aria-label="Dangerous">
<option value="">Dangerous</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="imo_code" maxlength="100" placeholder="Imo Code" aria-label="Imo Code">
<div class="invalid-feedback"></div>
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="potential_volume" maxlength="100" placeholder="Potential Volume" aria-label="Potential Volume">
<div class="invalid-feedback"></div>
</div>
<div class="col-12">
<textarea class="form-control" name="comments" rows="4" maxlength="2000" placeholder="Comments" aria-label="Comments"></textarea>
<div class="invalid-feedback"></div>
</div>
<div class="col-12 text-end">
<button type="submit" class="iq-btn-booking" id="iqQuotationSubmit">Send</button>
</div>
</div>
</div>
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
.iq-quotation-modal .modal-content { background: #fafafa; border: none; border-radius: 6px; }
.iq-quotation-modal .modal-body { position: relative; padding: 28px 30px 34px; }
.iq-quotation-close { position: absolute; top: 18px; right: 18px; }
.iq-quotation-title { font-size: 30px; font-weight: 700; color: #4a4a4a; margin: 0 0 6px; padding-right: 30px; }
.iq-quotation-intro { font-size: 14px; color: #4a4a4a; margin: 0 0 36px; }
.iq-quotation-fields { padding: 0 48px; }
.iq-quotation-modal .form-control,
.iq-quotation-modal .form-select { background-color: #fafafa; border: 1px solid #a9a9a9; border-radius: 2px; font-size: 15px; color: #333; padding: 6px 12px; }
.iq-quotation-modal .form-control::placeholder { color: #707070; }
.iq-quotation-modal .iq-quotation-light { background-color: #fff; }
.iq-quotation-modal .form-control:focus,
.iq-quotation-modal .form-select:focus { border-color: var(--iq-primary-light); box-shadow: 0 0 0 .2rem rgba(5,41,83,.12); }
.iq-quotation-modal .iq-btn-booking { padding: 9px 34px; }
.iq-quotation-modal .iq-btn-booking:disabled { opacity: .7; cursor: not-allowed; }
.iq-equipment-label { font-size: 15px; color: #707070; margin-bottom: 8px; }
.iq-equipment-list { display: flex; flex-wrap: wrap; gap: 6px 24px; }
.iq-equipment-item { display: inline-flex; align-items: center; gap: 3px; font-size: 15px; color: #555; cursor: pointer; margin: 0; }
@media (max-width: 767.98px) {
  .iq-quotation-modal .modal-body { padding: 22px 16px 26px; }
  .iq-quotation-title { font-size: 24px; }
  .iq-quotation-intro { margin-bottom: 22px; }
  .iq-quotation-fields { padding: 0; }
}
</style>

@push('js')
<script>
// Booking & Quotation popups share the same AJAX submit flow
function iqAjaxModalForm(modalId, formId, alertId, submitId){
    const modal = document.getElementById(modalId);
    const form = document.getElementById(formId);
    const alertBox = document.getElementById(alertId);
    const submitBtn = document.getElementById(submitId);
    if(!modal || !form) return;
    const submitText = submitBtn.textContent;

    // Close the mobile menu when the popup opens
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
                showAlert('error', 'Please check the highlighted fields and try again.');
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
            submitBtn.textContent = submitText;
        });
    });

    // Reset messages when the popup is closed
    modal.addEventListener('hidden.bs.modal', clearErrors);
}
iqAjaxModalForm('iqBookingModal', 'iqBookingForm', 'iqBookingAlert', 'iqBookingSubmit');
iqAjaxModalForm('iqQuotationModal', 'iqQuotationForm', 'iqQuotationAlert', 'iqQuotationSubmit');
</script>
@endpush

@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{websiteTitle('Need a Quotation')}}</title>
@endsection

@section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{url()->current()}}" />
<link rel="canonical" href="{{url()->current()}}">
@endsection

@push('css')
<style>
.iq-quotation-page { background: #fafafa; padding: 50px 0 70px; }
.iq-quotation-title { font-size: 30px; font-weight: 700; color: #4a4a4a; margin: 0 0 6px; }
.iq-quotation-intro { font-size: 14px; color: #4a4a4a; margin: 0 0 36px; }
.iq-quotation-fields { padding: 0 48px; }
.iq-quotation-page .form-control,
.iq-quotation-page .form-select { background-color: #fafafa; border: 1px solid #a9a9a9; border-radius: 2px; font-size: 15px; color: #333; padding: 6px 12px; }
.iq-quotation-page .form-control::placeholder { color: #707070; }
.iq-quotation-page .iq-quotation-light { background-color: #fff; }
.iq-quotation-page .form-control:focus,
.iq-quotation-page .form-select:focus { border-color: var(--iq-primary-light); box-shadow: 0 0 0 .2rem rgba(5,41,83,.12); }
.iq-quotation-page .iq-btn-booking { padding: 9px 34px; }
.iq-quotation-page .iq-btn-booking:disabled { opacity: .7; cursor: not-allowed; }
.iq-equipment-label { font-size: 15px; color: #707070; margin-bottom: 8px; }
.iq-equipment-list { display: flex; flex-wrap: wrap; gap: 6px 24px; }
.iq-equipment-item { display: inline-flex; align-items: center; gap: 3px; font-size: 15px; color: #555; cursor: pointer; margin: 0; }
@media (max-width: 767.98px) {
  .iq-quotation-title { font-size: 24px; }
  .iq-quotation-intro { margin-bottom: 22px; }
  .iq-quotation-fields { padding: 0; }
}
</style>
@endpush

@section('contents')

<!-- ======================================================================
       Quotation Page
       ====================================================================== -->
<section class="iq-quotation-page">
<div class="container">
<form id="iqQuotationForm" action="{{route('quotationMail')}}" method="post" novalidate>
@csrf
<div class="iq-quotation-page-body">
<h1 class="iq-quotation-title">Need a quotation?</h1>
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
</form></div>
</section>

@endsection

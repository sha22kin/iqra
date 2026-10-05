@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{websiteTitle(isset($page) ? $page->name : '')}}</title>
@endsection

@section('SEO')
<meta name="title" property="og:title" content="{{isset($page) ? $page->seo_title : general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!isset($page) ? $page->seo_desc : general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{isset($page) ? $page->seo_keyword : general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{url()->current()}}" />
<link rel="canonical" href="{{url()->current()}}">
@endsection

@section('contents')

<main class="career-page-main">
<div class="container">
<div class="row">
<!-- Left Column -->
<div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5">
<h1 class="career-title mb-4" data-aos="fade-down">We are hiring</h1>
{!! $page->description !!}
<div class="career-brand-logo mt-5">
<h2 class="fw-bold" style="color: var(--iq-primary); font-size: 2.5rem; letter-spacing: 1px;">IQRA</h2>
</div>
</div>
<!-- Right Column -->
<div class="col-lg-7">
<form class="career-form" action="{{route('careerApply')}}" method="POST" enctype="multipart/form-data">
@csrf
@if(session('success'))
<div class="alert alert-success mb-4">{{session('success')}}</div>
@endif
@if($errors->any())
<div class="alert alert-danger mb-4">
<ul class="mb-0 ps-3">
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
<!-- Name Section -->
<div class="career-form-section mb-4">
<div class="career-form-label">Name</div>
<div class="row g-3">
<div class="col-md-6">
<label class="career-form-sublabel" for="firstName">First Name <span>(required)</span></label>
<input class="career-input" id="firstName" name="first_name" value="{{old('first_name')}}" maxlength="100" required="" type="text"/>
</div>
<div class="col-md-6">
<label class="career-form-sublabel" for="lastName">Last Name <span>(required)</span></label>
<input class="career-input" id="lastName" name="last_name" value="{{old('last_name')}}" maxlength="100" required="" type="text"/>
</div>
</div>
</div>
<!-- Email Section -->
<div class="mb-4">
<label class="career-form-sublabel" for="email">Email <span>(required)</span></label>
<input class="career-input" id="email" name="email" value="{{old('email')}}" maxlength="150" required="" type="email"/>
</div>
<!-- Phone Section -->
<div class="career-form-section mb-4">
<div class="career-form-label">Phone <span>(required)</span></div>
<div class="row g-3">
<div class="col-md-6">
<label class="career-form-sublabel" for="country">Country</label>
<div class="career-select-wrapper">
<select class="career-input career-select" id="country" name="country">
<option selected="" value="Bangladesh">Bangladesh</option>
</select>
<i class="fa-solid fa-chevron-down career-select-icon"></i>
</div>
</div>
<div class="col-md-6">
<label class="career-form-sublabel" for="number">Number</label>
<input class="career-input" id="number" name="phone" maxlength="30" required="" type="text" value="{{old('phone','+880')}}"/>
</div>
</div>
</div>
<!-- Subject Section -->
<div class="mb-4">
<label class="career-form-sublabel" for="subject">Subject</label>
<input class="career-input" id="subject" name="subject" value="{{old('subject')}}" maxlength="191" placeholder="Please mention the position you are applying" type="text"/>
</div>
<!-- Department Section -->
<div class="mb-4">
<label class="career-form-sublabel" for="department">Department <span>(required)</span></label>
<div class="career-select-wrapper">
<select class="career-input career-select" id="department" name="department" required="">
<option disabled="" {{old('department') ? '' : 'selected'}} value="">Select a department</option>
@foreach(\App\Models\CareerApplication::DEPARTMENTS as $department)
<option value="{{$department}}" {{old('department')==$department ? 'selected' : ''}}>{{$department}}</option>
@endforeach
</select>
<i class="fa-solid fa-chevron-down career-select-icon"></i>
</div>
</div>
<!-- Message Section -->
<div class="mb-4">
<label class="career-form-sublabel" for="message">Message</label>
<textarea class="career-input" id="message" name="message" maxlength="2000" rows="4">{{old('message')}}</textarea>
</div>
<!-- Resume Upload Section -->
<div class="mb-4 mt-5">
<label class="career-form-sublabel mb-2">Resume Upload <span>(required)</span></label>
<p class="career-upload-help">Upload your resume in PDF (max 5MB)</p>
<label class="career-upload-box text-center" for="resume">
<input accept=".pdf,application/pdf" class="d-none" id="resume" name="resume" type="file"/>
<i class="fa-solid fa-plus career-upload-icon"></i>
<span class="career-upload-text d-block" id="resumeFileName">Add a File</span>
</label>
</div>
<!-- Submit Button -->
<div class="mt-4">
<button class="career-submit-btn" type="submit">Submit</button>
</div>
</form>
</div>
</div>
</div>
</main>
<!-- ======================================================================
       Footer Section
       ====================================================================== -->

@endsection

@push('js')
<script>
    (function () {
        var input = document.getElementById('resume');
        var label = document.getElementById('resumeFileName');
        if (!input || !label) return;
        input.addEventListener('change', function () {
            var file = this.files && this.files[0];
            if (file && file.size > 5 * 1024 * 1024) {
                alert('Resume must not be larger than 5MB.');
                this.value = '';
                file = null;
            }
            label.textContent = file ? file.name : 'Add a File';
        });
        var form = input.closest('form');
        form.addEventListener('submit', function (e) {
            if (!input.files || !input.files.length) {
                e.preventDefault();
                alert('Please upload your resume (PDF).');
                return;
            }
            var btn = form.querySelector('.career-submit-btn');
            if (btn) { btn.disabled = true; btn.textContent = 'Submitting...'; }
        });
    })();
</script>
@endpush

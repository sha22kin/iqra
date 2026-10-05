
@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <strong>Success! </strong> {{Session::get('success') }}.
</div>
@endif


@if(session('error'))
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <strong>Oops! </strong> {{Session::get('error') }}.
</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <strong>Info! </strong> {{Session::get('info') }}.
</div>
@endif

@if(session('errors'))
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <strong>Oops! </strong> Need to Validation.
    @if(isset($errors) && $errors->any())
    <ul class="mb-0 mt-1 pl-3">
        @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
    @endif
</div>
@endif
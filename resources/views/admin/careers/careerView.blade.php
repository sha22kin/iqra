@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Career Application')}}</title>
@endsection @push('css')
<style type="text/css">
    .career-detail th { width: 170px; background: #f5f7fa; }
    .career-resume-frame { width: 100%; height: 800px; border: 1px solid #e3ebf3; }
</style>
@endpush @section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Career Application</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.careers')}}">Career Applications</a></li>
                    <li class="breadcrumb-item active">{{$application->fullName()}}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group">
            <a class="btn btn-outline-primary" href="{{route('admin.careers')}}">Back To List</a>
            <a class="btn btn-outline-primary" href="{{route('admin.careersAction',['unread',$application->id])}}">Mark As Unread</a>
            @isset(json_decode(Auth::user()->permission->permission, true)['careers']['delete'])
            <a class="btn btn-outline-danger" href="{{route('admin.careersAction',['delete',$application->id])}}" onclick="return confirm('Are You Want To Delete?')"><i class="fa fa-trash"></i></a>
            @endisset
        </div>
    </div>
</div>

<div class="content-body">
    <section class="basic-elements">
        <div class="row">
            <div class="col-lg-5">
                @include(adminTheme().'alerts')
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title">Applicant Details</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-bordered career-detail mb-0">
                                <tr><th>Name</th><td>{{$application->fullName()}}</td></tr>
                                <tr><th>Email</th><td><a href="mailto:{{$application->email}}">{{$application->email}}</a></td></tr>
                                <tr><th>Phone</th><td><a href="tel:{{$application->phone}}">{{$application->phone}}</a></td></tr>
                                <tr><th>Country</th><td>{{$application->country ?: '-'}}</td></tr>
                                <tr><th>Department</th><td>{{$application->department}}</td></tr>
                                <tr><th>Subject / Position</th><td>{{$application->subject ?: '-'}}</td></tr>
                                <tr><th>Message</th><td>{!! nl2br(e($application->message ?: '-')) !!}</td></tr>
                                <tr><th>Submitted</th><td>{{$application->created_at->format('d M Y, h:i A')}}</td></tr>
                                <tr><th>IP Address</th><td>{{$application->ip_address ?: '-'}}</td></tr>
                            </table>
                            <div class="mt-2">
                                <a href="{{route('admin.careersAction',['resume',$application->id])}}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Open Resume</a>
                                <a href="{{route('admin.careersAction',['resume',$application->id,'download'=>1])}}" class="btn btn-success"><i class="fa fa-download"></i> Download Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title">Resume @if($application->resume_name)<small style="color: #999;">({{$application->resume_name}})</small>@endif</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <iframe class="career-resume-frame" src="{{route('admin.careersAction',['resume',$application->id])}}"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection @push('js') @endpush

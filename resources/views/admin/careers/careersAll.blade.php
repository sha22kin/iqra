@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Career Applications')}}</title>
@endsection @push('css')
<style type="text/css">
    .career-unread td { background: #fff8e6 !important; }
    .career-unread .career-name { font-weight: 700; }
</style>
@endpush @section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Career Applications</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item active">Career Applications</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group">
            <a class="btn btn-outline-primary" href="{{route('admin.careers')}}">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

<div class="content-body">
    <section class="basic-elements">
        <div class="row">
            <div class="col-md-12">
                @include(adminTheme().'alerts')
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.careers')}}">
                                <div class="row">
                                    <div class="col-md-5 mb-1">
                                        <input type="text" name="search" value="{{request()->search}}" placeholder="Name, email, phone or subject" class="form-control" />
                                    </div>
                                    <div class="col-md-4 mb-1">
                                        <select name="department" class="form-control">
                                            <option value="">All Departments</option>
                                            @foreach($departments as $department)
                                            <option value="{{$department}}" {{request()->department==$department?'selected':''}}>{{$department}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-1">
                                        <input type="hidden" name="status" value="{{request()->status}}" />
                                        <button type="submit" class="btn btn-success btn-block">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title">Applications List</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.careers')}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-1">
                                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                                <option value="">Select Action</option>
                                                <option value="1">Mark As Read</option>
                                                <option value="2">Mark As Unread</option>
                                                @isset(json_decode(Auth::user()->permission->permission, true)['careers']['delete'])
                                                <option value="3">Delete</option>
                                                @endisset
                                            </select>
                                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <ul class="statuslist">
                                            <li><a href="{{route('admin.careers')}}">All ({{$totals->total}})</a></li>
                                            <li><a href="{{route('admin.careers',['status'=>'unread'])}}">Unread ({{$totals->unread}})</a></li>
                                            <li><a href="{{route('admin.careers',['status'=>'read'])}}">Read ({{$totals->read}})</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 60px;">
                                                    <label style="cursor: pointer; margin-bottom: 0;"> <input class="checkbox" type="checkbox" id="checkall" /> All <span class="checkCounter"></span> </label>
                                                </th>
                                                <th style="min-width: 220px;">Applicant</th>
                                                <th style="min-width: 160px;">Department</th>
                                                <th style="min-width: 200px;">Subject</th>
                                                <th style="min-width: 130px;">Submitted</th>
                                                <th style="min-width: 200px;width: 200px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($applications as $i=>$application)
                                            <tr class="{{$application->read_at ? '' : 'career-unread'}}">
                                                <td>
                                                    <input class="checkbox" type="checkbox" name="checkid[]" value="{{$application->id}}" /><br />
                                                    {{$applications->firstItem()+$i}}
                                                </td>
                                                <td>
                                                    <span class="career-name">{{$application->fullName()}}</span>
                                                    @if(!$application->read_at)
                                                    <span class="badge badge-warning">New</span>
                                                    @endif
                                                    <br />
                                                    <small><i class="fa fa-envelope" style="color: #1ab394;"></i> {{$application->email}}</small><br />
                                                    <small><i class="fa fa-phone" style="color: #1ab394;"></i> {{$application->phone}}</small>
                                                </td>
                                                <td>{{$application->department}}</td>
                                                <td>{{$application->subject ?: '-'}}</td>
                                                <td>
                                                    {{$application->created_at->format('d M Y')}}<br />
                                                    <small style="color: #999;">{{$application->created_at->format('h:i A')}}</small>
                                                </td>
                                                <td class="center">
                                                    <a href="{{route('admin.careersAction',['view',$application->id])}}" class="btn btn-md btn-info">View</a>
                                                    <a href="{{route('admin.careersAction',['resume',$application->id])}}" target="_blank" class="btn btn-md btn-primary" title="Resume"><i class="fa fa-file-pdf"></i></a>
                                                    @isset(json_decode(Auth::user()->permission->permission, true)['careers']['delete'])
                                                    <a href="{{route('admin.careersAction',['delete',$application->id])}}" class="btn btn-md btn-danger" onclick="return confirm('Are You Want To Delete?')"><i class="fa fa-trash"></i></a>
                                                    @endisset
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center" style="padding: 30px;">No applications found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{$applications->links('pagination')}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection @push('js') @endpush

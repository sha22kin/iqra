@php $app = $datas['application']; @endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Career Application {{general()->title}}</title>
        <style>
            body { margin: 0; background: #fff; }
            table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; }
            td, th { border: 1px solid #dddddd; text-align: left; font-size: 14px; padding: 8px; }
        </style>
    </head>
    <body>
        <div style="margin: 25px auto; width: 80%; min-width: 600px; overflow: auto; padding: 15px; background: #fff;">
            <center>
                <img src="{{URL::asset(general()->logo())}}" style="max-width: 200px;" />
                <h2 style="margin: 0;">NEW CAREER APPLICATION</h2>
            </center>
            <div style="background: #f1f1f1; padding: 10px; margin: 10px 0;">
                <table>
                    <tr><th style="width: 150px;">Name</th><td>{{$app->fullName()}}</td></tr>
                    <tr><th>Email</th><td>{{$app->email}}</td></tr>
                    <tr><th>Phone</th><td>{{$app->phone}} @if($app->country)({{$app->country}})@endif</td></tr>
                    <tr><th>Department</th><td>{{$app->department}}</td></tr>
                    <tr><th>Subject</th><td>{{$app->subject ?: '-'}}</td></tr>
                    <tr><th>Message</th><td>{!! nl2br(e($app->message ?: '-')) !!}</td></tr>
                    <tr><th>Submitted</th><td>{{$app->created_at->format('d M Y, h:i A')}}</td></tr>
                </table>
                <p style="font-size: 13px;">The resume is attached. You can also view this application in the admin panel under <b>Career Applications</b>.</p>
            </div>
        </div>
    </body>
</html>

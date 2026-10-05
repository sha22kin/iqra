@php $c = $datas['contact']; @endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Website Contact Message {{general()->title}}</title>
        <style>
            body { margin: 0; background: #fff; }
            table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; }
            td, th { border: 1px solid #dddddd; text-align: left; font-size: 14px; padding: 8px; vertical-align: top; }
        </style>
    </head>
    <body>
        <div style="margin: 25px auto; width: 80%; min-width: 600px; overflow: auto; padding: 15px; background: #fff;">
            <center>
                <img src="{{URL::asset(general()->logo())}}" style="max-width: 200px;" />
                <h2 style="margin: 0;">NEW WEBSITE CONTACT MESSAGE</h2>
            </center>
            <div style="background: #f1f1f1; padding: 10px; margin: 10px 0;">
                <table>
                    <tr><th style="width: 130px;">Name</th><td>{{$c['name']}}</td></tr>
                    <tr><th>Email</th><td><a href="mailto:{{$c['email']}}">{{$c['email']}}</a></td></tr>
                    <tr><th>Form</th><td>{{$c['subject']}}</td></tr>
                    <tr><th>Message</th><td>{!! nl2br(e($c['message'])) !!}</td></tr>
                    <tr><th>Sent</th><td>{{$c['sent_at']}}</td></tr>
                    <tr><th>Page</th><td>{{$c['page']}}</td></tr>
                </table>
                <p style="font-size: 13px;">Reply to this email to answer {{$c['name']}} directly.</p>
            </div>
        </div>
    </body>
</html>

@php $q = $datas['quotation']; @endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Website Quotation Request {{general()->title}}</title>
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
                <h2 style="margin: 0;">NEW QUOTATION REQUEST</h2>
            </center>
            <div style="background: #f1f1f1; padding: 10px; margin: 10px 0;">
                <table>
                    <tr><th style="width: 150px;">Name</th><td>{{$q['name'] ?: '-'}}</td></tr>
                    <tr><th>Company Name</th><td>{{$q['company'] ?: '-'}}</td></tr>
                    <tr><th>Phone Number</th><td>{{$q['phone'] ?: '-'}}</td></tr>
                    <tr><th>Email Address</th><td>@if($q['email'])<a href="mailto:{{$q['email']}}">{{$q['email']}}</a>@else - @endif</td></tr>
                    <tr><th>Loading Port</th><td>{!! $q['loading_port'] ? nl2br(e($q['loading_port'])) : '-' !!}</td></tr>
                    <tr><th>Destination Port</th><td>{!! $q['destination_port'] ? nl2br(e($q['destination_port'])) : '-' !!}</td></tr>
                    <tr><th>Equipment Types</th><td>{{$q['equipment_types'] ?: '-'}}</td></tr>
                    <tr><th>Commodity</th><td>{{$q['commodity'] ?: '-'}}</td></tr>
                    <tr><th>Dangerous</th><td>{{$q['dangerous'] ?: '-'}}</td></tr>
                    <tr><th>IMO Code</th><td>{{$q['imo_code'] ?: '-'}}</td></tr>
                    <tr><th>Potential Volume</th><td>{{$q['potential_volume'] ?: '-'}}</td></tr>
                    <tr><th>Comments</th><td>{!! $q['comments'] ? nl2br(e($q['comments'])) : '-' !!}</td></tr>
                    <tr><th>Sent</th><td>{{$q['sent_at']}}</td></tr>
                    <tr><th>Page</th><td>{{$q['page']}}</td></tr>
                </table>
                <p style="font-size: 13px;">Reply to this email to answer the customer directly.</p>
            </div>
        </div>
    </body>
</html>

@php $b = $datas['booking']; @endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Website Booking Request {{general()->title}}</title>
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
                <h2 style="margin: 0;">NEW BOOKING REQUEST</h2>
            </center>
            <div style="background: #f1f1f1; padding: 10px; margin: 10px 0;">
                <table>
                    <tr><th style="width: 150px;">Shipper</th><td>{{$b['shipper']}}</td></tr>
                    <tr><th>Consignee</th><td>{{$b['consignee']}}</td></tr>
                    <tr><th>Commodity</th><td>{{$b['commodity']}}</td></tr>
                    <tr><th>Gross Weight</th><td>{{$b['gross_weight']}}</td></tr>
                    <tr><th>Cubic Volume</th><td>{{$b['cubic_volume']}}</td></tr>
                    <tr><th>Destination</th><td>{{$b['destination']}}</td></tr>
                    <tr><th>Email Address</th><td><a href="mailto:{{$b['email']}}">{{$b['email']}}</a></td></tr>
                    <tr><th>Sent</th><td>{{$b['sent_at']}}</td></tr>
                    <tr><th>Page</th><td>{{$b['page']}}</td></tr>
                </table>
                <p style="font-size: 13px;">Reply to this email to answer the customer directly.</p>
            </div>
        </div>
    </body>
</html>

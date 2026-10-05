<?php
$f = 'e:/iqragrup/resources/views/welcome/services/latestServices.blade.php';
$c = file_get_contents($f);
$s = '<div class="row g-4">';
$e = '</div>'."\n".'</div>'."\n".'</div>'."\n".'</section>';
$p1 = strpos($c, $s);
$p2 = strpos($c, $e, $p1);
if($p1 !== false && $p2 !== false) {
    $new = substr($c, 0, $p1) . '<div class="row g-4">
@foreach($services as $index => $service)
<div class="col-12 col-md-6 col-lg-4">
<article class="iq-service-card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}">
<div class="iq-service-img-wrap">
<img alt="{{$service->name}}" class="iq-service-img" src="{{asset($service->image())}}"/>
</div>
<div class="iq-service-card-body">
<h2 class="iq-service-card-title" data-aos="fade-down"><a href="{{route(\'serviceView\', $service->slug)}}" class="text-decoration-none text-dark">{{$service->name}}</a></h2>
<p class="iq-service-card-desc">{{ Str::limit(strip_tags($service->short_description), 150) }}</p>
</div>
</article>
</div>
@endforeach
</div>
<div class="mt-4">
    {{ $services->links(\'pagination::bootstrap-5\') }}
</div>
</div>
</section>' . substr($c, $p2 + strlen($e));
    file_put_contents($f, $new);
    echo "latestServices replaced!\n";
} else {
    echo "latestServices markers not found\n";
}

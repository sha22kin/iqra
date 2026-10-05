<?php
$f = 'e:/iqragrup/resources/views/welcome/services/latestServices.blade.php';
$c = file_get_contents($f);
$s = '<div class="row g-4">';
$e = '</div>'."\n".'</div>'."\n".'</section>';
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
' . substr($c, $p2);
    file_put_contents($f, $new);
    echo "latestServices replaced!\n";
} else {
    echo "latestServices markers not found\n";
}

$fb = 'e:/iqragrup/resources/views/welcome/blogs/latestBlogs.blade.php';
$cb = file_get_contents($fb);
$sb = '<div class="row news-item';
$eb = '</main>';
$pb1 = strpos($cb, $sb);
$pb2 = strpos($cb, $eb, $pb1);
if($pb1 !== false && $pb2 !== false) {
    // We want to replace from the first news item down to </main>
    $newb = substr($cb, 0, $pb1) . '
@foreach($posts as $post)
<div class="row news-item align-items-start position-relative" data-aos="fade-up">
<div class="col-md-3 mb-3 mb-md-0">
<div class="news-img-wrapper">
<img alt="{{$post->title}}" class="news-img" src="{{asset($post->image())}}"/>
</div>
</div>
<div class="col-md-9">
<div class="news-content">
<div class="news-date">{{ \Carbon\Carbon::parse($post->created_at)->format(\'d M\') }}</div>
<h3 class="news-title">{{$post->title}}</h3>
<p class="news-excerpt">
    {{ Str::limit(strip_tags($post->description), 150) }}
</p>
<a class="news-read-more stretched-link" href="{{route(\'blogView\', $post->slug)}}">Read More</a>
</div>
</div>
</div>
@endforeach
<div class="mt-4">
    {{ $posts->links(\'pagination::bootstrap-5\') }}
</div>
</main>';
    // We need to also keep the stuff after </main> if any
    $newb .= substr($cb, $pb2 + strlen($eb));
    file_put_contents($fb, $newb);
    echo "latestBlogs replaced!\n";
} else {
    echo "latestBlogs markers not found\n";
}

<article class="iq-service-card" data-aos="fade-up">
<div class="iq-service-img-wrap">
<a href="{{route('serviceView',$service->slug?:'no-title')}}">
<img alt="{{$service->name}}" class="iq-service-img" src="{{asset($service->image())}}"/>
</a>
</div>
<div class="iq-service-card-body">
<h2 class="iq-service-card-title" data-aos="fade-down"><a href="{{route('serviceView',$service->slug?:'no-title')}}" style="color: inherit; text-decoration: none;">{{$service->name}}</a></h2>
<p class="iq-service-card-desc">{!!Str::limit(strip_tags($service->short_description), 100)!!}</p>
</div>
</article>
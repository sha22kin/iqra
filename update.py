import re

def update_services():
    f = 'e:/iqragrup/resources/views/welcome/services/latestServices.blade.php'
    with open(f, 'r', encoding='utf-8') as file:
        c = file.read()
    
    # We want to replace from <div class="row g-4"> to the end of the last article
    # Find <div class="row g-4">
    p1 = c.find('<div class="row g-4">')
    
    # Find the closing tag of the last article
    p2_target = '<!-- Warehousing -->'
    p2_start = c.find(p2_target)
    p2 = c.find('</article>', p2_start)
    p2 = c.find('</div>', p2) + 6 # Include </div>

    if p1 != -1 and p2 != -1:
        new_content = c[:p1] + """<div class="row g-4">
@foreach($services as $index => $service)
<div class="col-12 col-md-6 col-lg-4">
<article class="iq-service-card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}">
<div class="iq-service-img-wrap">
<img alt="{{$service->name}}" class="iq-service-img" src="{{asset($service->image())}}"/>
</div>
<div class="iq-service-card-body">
<h2 class="iq-service-card-title" data-aos="fade-down"><a href="{{route('serviceView', $service->slug)}}" class="text-decoration-none text-dark">{{$service->name}}</a></h2>
<p class="iq-service-card-desc">{{ Str::limit(strip_tags($service->short_description), 150) }}</p>
</div>
</article>
</div>
@endforeach
</div>
<div class="mt-4">
    {{ $services->links('pagination::bootstrap-5') }}
""" + c[p2:]
        with open(f, 'w', encoding='utf-8') as file:
            file.write(new_content)
        print("latestServices updated.")
    else:
        print("latestServices markers not found")

update_services()

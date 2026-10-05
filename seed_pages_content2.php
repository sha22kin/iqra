<?php
use App\Models\Post;

echo "Seeding career & location content...\n";

// Career
$career = Post::where('type', 0)->where('slug', 'career')->first();
if ($career) {
    $career->description = '<p class="career-desc mb-5">We in IQRA believes in nurturing and growing talent. We value team effort and looking for individuals who have leadership skills. If you are ready to take challenges in willing to go extra miles, we are the perfect organization for you.</p>';
    $career->save();
}

// Location
$location = Post::where('type', 0)->where('slug', 'location')->first();
if ($location) {
    $location->description = '<div class="row g-5">
<div class="col-md-6">
<div class="location-card">
<div class="location-map-wrapper">
<iframe allowfullscreen="" class="location-map-iframe" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2038753239846!2d90.37035131536257!3d23.739757695085187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8cbca500001%3A0x1d3780d603e87515!2sJigatola%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd"></iframe>
</div>
<h3 class="location-name">Dhaka Office (Head Office)</h3>
<p class="location-address">
              85 (Ground Floor), Nijhum Residential Area,<br/>
              Jigatola, Dhanmondi,<br/>
              Dhaka-1209, Bangladesh.
            </p>
<h4 class="location-info-subtitle mt-4">General Contact</h4>
<p class="location-info-text mb-4">Telephone: 02226684851</p>
</div>
</div>
<div class="col-md-6">
<div class="location-card">
<div class="location-map-wrapper">
<iframe allowfullscreen="" class="location-map-iframe" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.669527633519!2d91.81577717437021!3d22.328328041869818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8c8b4df5057%3A0x6b80dd85ff67e5bb!2sAgrabad%20C%2FA%2C%20Chattogram!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd"></iframe>
</div>
<h3 class="location-name">Chittagong Office</h3>
<p class="location-address">
              Siraj Monjil (G/F), 3601/5899,<br/>
              Badamtoli, Agrabad-4100,<br/>
              Double Mooring, Chattogram
            </p>
</div>
</div>
</div>';
    $location->save();
}

echo "Content seeded.\n";

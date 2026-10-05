<?php
use App\Models\Post;

// Home
$home = Post::where('type', 0)->where('template', 'Front Page')->first();
if (!$home) {
    $home = new Post();
    $home->type = 0;
    $home->template = 'Front Page';
    $home->name = 'Home';
    $home->slug = 'home';
}
$home->short_description = "Your Logistics Made Easy";
$home->description = '<p class="iq-overview-desc">iqragroup is the leading forwarder and logistics service provider in Bangladesh. With more than 30 years of service experience and more than 250 trusted partners worldwide, iqragroup is always a preferred choice among our partners.</p>';
$home->save();

echo "Content seeded.\n";

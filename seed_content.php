<?php

use App\Models\Post;
use Illuminate\Support\Str;

echo "Seeding Services & News...\n";

// Delete old dummy services
Post::where('type', 3)->delete();
Post::where('type', 1)->delete(); // Delete old dummy blogs

// Seed Services
$services = [
    [
        'name' => 'Ocean Freight',
        'short_description' => 'We have a dedicated team for ocean freight to give you the best service available. Our team ensures seamless co-ordination between off-dock, Port and FDR operators.',
        'image' => 'frontend_assets/images/ocean-freight.jpg'
    ],
    [
        'name' => 'Air Freight',
        'short_description' => 'Our air freight team ensures every shipment is handled with care on a priority basis in Bangladesh with a lot of appreciation from major carriers which made us the pioneer of air freight operation in Bangladesh.',
        'image' => 'frontend_assets/images/air-freight.jpg'
    ],
    [
        'name' => 'Multi-modal',
        'short_description' => 'Our expertise of multi-modal services safeguards you the best mode of transport combination which reduce the transit time through various transport mode to numerous destinations and ensure the best value for money.',
        'image' => 'frontend_assets/images/multi-modal.jpg'
    ],
    [
        'name' => 'Road Freight Forwarding',
        'short_description' => 'Moves goods via trucks or vans. It is common for local, regional, or cross-border deliveries. Our road freight network ensures reliable and timely transportation for shipments of all sizes across cities, towns, and borders.',
        'image' => 'frontend_assets/images/services-import-service.jpg'
    ],
    [
        'name' => 'Rail Freight Forwarding',
        'short_description' => 'Moves heavy cargo using train networks across large landmasses. Rail freight is an efficient, cost-effective, and environmentally friendly option for bulk shipments over long distances.',
        'image' => 'frontend_assets/images/services-customs-brokerage.jpg'
    ],
    [
        'name' => 'Warehousing & Inventory Management',
        'short_description' => 'Our warehousing and inventory management services are designed to streamline operations and enhance productivity. Our proprietary Inventory Control System offers full transparency and control over your stock.',
        'image' => 'frontend_assets/images/services-warehousing.jpg'
    ],
    [
        'name' => 'Supply Chain Solutions',
        'short_description' => 'IQRA Transportation Ltd goes beyond traditional logistics to offer comprehensive supply chain management solutions designed to optimize efficiency and reduce costs.',
        'image' => 'frontend_assets/images/about-office-work.jpg'
    ]
];

foreach ($services as $srv) {
    $post = new Post();
    $post->name = $srv['name'];
    $post->slug = Str::slug($srv['name']);
    $post->type = 3; // Service
    $post->status = 'active';
    $post->short_description = $srv['short_description'];
    // Setting image manually using DB to bypass Media library issues, or just put it in a column?
    // Wait, the CMS usually associates images via the Media model or attributes.
    // The image method in Post model gets the image from Media.
    // Let me check how Post::image() works. If it returns a relation, I'll need to create a Media record.
    $post->save();

    // Create a media record for this post
    $media = new \App\Models\Media();
    $media->src_id = $post->id;
    $media->src_type = 1; 
    $media->use_Of_file = 1;
    $media->file_url = $srv['image'];
    $media->file_path = dirname($srv['image']);
    $media->file_name = basename($srv['image']);
    $media->file_type = 1;
    $media->save();
}

echo "Services seeded.\n";

$blogs = [
    [
        'name' => 'Leading Project Cargo Success at IQRA Limited',
        'short_description' => 'IQRA Limited has successfully completed another major project cargo operation. Our dedicated team ensured smooth delivery under challenging conditions...',
        'image' => 'frontend_assets/images/hero-port.jpg',
        'created_at' => '2024-07-12 10:00:00'
    ],
    [
        'name' => 'Shaping the Future Through Strategic Thinking: IQRA\'s Business Case Competition',
        'short_description' => 'We recently hosted an exciting Business Case Competition aimed at encouraging innovative ideas. Participants showcased brilliant strategies for industry challenges...',
        'image' => 'frontend_assets/images/about-award-trophy.jpg',
        'created_at' => '2024-06-30 10:00:00'
    ],
    [
        'name' => 'IQRA Participates in UniGroup\'s 10th Anniversary Celebration in Chicago',
        'short_description' => 'Our leadership team proudly attended UniGroup\'s 10th Anniversary Celebration in Chicago, networking with global partners and sharing insights on logistics...',
        'image' => 'frontend_assets/images/about-team-group.jpg',
        'created_at' => '2024-06-10 10:00:00'
    ]
];

foreach ($blogs as $blog) {
    $post = new Post();
    $post->name = $blog['name'];
    $post->slug = Str::slug($blog['name']);
    $post->type = 1; // Blog
    $post->status = 'active';
    $post->short_description = $blog['short_description'];
    $post->created_at = $blog['created_at'];
    $post->save();

    $media = new \App\Models\Media();
    $media->src_id = $post->id;
    $media->src_type = 1; 
    $media->use_Of_file = 1;
    $media->file_url = $blog['image'];
    $media->file_path = dirname($blog['image']);
    $media->file_name = basename($blog['image']);
    $media->file_type = 1;
    $media->save();
}

echo "Blogs seeded.\n";


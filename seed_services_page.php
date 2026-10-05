<?php
// Run: php artisan tinker seed_services_page.php
// Syncs the Services page content with desing/services.html.
// Home page keeps its 3 featured services (fetured = 1); the Services page lists fetured = 0.

use App\Models\Post;
use App\Models\Media;
use Illuminate\Support\Str;
use Carbon\Carbon;

echo "Seeding Services page...\n";

// Services page intro
$page = Post::find(11);
$page->short_description = 'Our Services';
$page->description = "IQRA Transportation Ltd offers an extensive range of freight and transportation solutions to meet the diverse needs of our clients. We pride ourselves on our ability to adapt to the specific requirements of different industries, ensuring that each logistics solution is perfectly suited to the client's needs.";
$page->save();

// Home page services stay featured on home only
Post::whereIn('id', [57, 58, 59])->update(['fetured' => 1]);

$li = fn($title, $text) => '<li class="iq-about-item"><strong>' . $title . ':</strong> ' . $text . '</li>';

// Ordered as in the design (first = top)
$services = [
    [
        'id' => null,
        'name' => 'Air Freight Forwarding',
        'card_title' => 'Air Freight',
        'short_description' => 'Moves goods quickly via airplanes. Best for high-value or urgent shipments with delivery in 24–72 hours.',
        'description' => '<p class="iq-about-text">Moves goods quickly via airplanes. It is best for high-value or urgent shipments. Our air freight service ensures rapid transit with delivery within 24–72 hours for most international destinations — critical for businesses relying on just-in-time inventory management.</p>'
            . '<ul class="iq-about-list">'
            . $li('Secure Handling', 'State-of-the-art security protocols guarantee safe handling of all cargo, reducing risk of damage during transit.')
            . $li('Comprehensive Coverage', 'Available to over 150 countries with a strong network of airline partnerships for competitive rates and reliable scheduling.')
            . '</ul>',
        'image' => 'services-air-freight.jpg',
    ],
    [
        'id' => null,
        'name' => 'Sea (Ocean) Freight Forwarding',
        'card_title' => 'Sea (Ocean) Freight',
        'short_description' => 'Moves large and heavy goods via cargo ships. Cost-effective solution for bulk items with FCL & LCL options.',
        'description' => '<p class="iq-about-text">Moves large and heavy goods via cargo ships. It is cost-effective for bulk items with flexible container options tailored to your budget.</p>'
            . '<ul class="iq-about-list">'
            . $li('Cost-Effective', 'Economical solution for transporting large volumes of goods with competitive pricing structures.')
            . $li('Sustainable Shipping', 'Eco-friendly protocols aligned with our commitment to reducing carbon emissions.')
            . $li('Flexible Container Options', 'Full Container Load (FCL) and Less than Container Load (LCL) options to fit varying cargo sizes.')
            . '</ul>',
        'image' => 'services-ocean-freight.jpg',
    ],
    [
        'id' => 60,
        'name' => 'Road Freight Forwarding',
        'card_title' => 'Road Logistics / Over The Road (OTR)',
        'short_description' => 'Moves goods via trucks or vans for local, regional, or cross-border deliveries.',
        'description' => '<p class="iq-about-text">Moves goods via trucks or vans. It is common for local, regional, or cross-border deliveries. Our road freight network ensures reliable and timely transportation for shipments of all sizes across cities, towns, and borders.</p>',
        'image' => 'services-import-service.jpg',
    ],
    [
        'id' => 61,
        'name' => 'Rail Freight Forwarding',
        'card_title' => 'Rail Logistics',
        'short_description' => 'Moves heavy cargo using train networks across large landmasses reliably and efficiently.',
        'description' => '<p class="iq-about-text">Moves heavy cargo using train networks across large landmasses. Rail freight is an efficient, cost-effective, and environmentally friendly option for bulk shipments over long distances, offering reliable schedules and high capacity.</p>',
        'image' => 'services-rail-logistics.jpg',
    ],
    [
        'id' => null,
        'name' => 'Multimodal / Intermodal Forwarding',
        'card_title' => 'Multimodal / Intermodal',
        'short_description' => 'Combines ship, train, and truck under a single plan for maximum efficiency and minimum cost.',
        'description' => '<p class="iq-about-text">Our land transport solutions integrate seamlessly with air and sea freight for end-to-end efficiency. This multi-modal approach allows us to create customized logistics plans that maximize efficiency and minimize costs by combining two or more transport methods (ship, train, and truck) under a single plan. Covering all major cities and towns, our reliable land transportation services ensure goods are delivered on time.</p>',
        'image' => 'services-multi-modal.jpg',
    ],
    [
        'id' => 62,
        'name' => 'Warehousing & Inventory Management',
        'card_title' => 'Warehousing & Inventory',
        'short_description' => 'Comprehensive warehousing with real-time monitoring, automated replenishment, and demand forecasting.',
        'description' => '<p class="iq-about-text">Our warehousing and inventory management services are designed to streamline operations and enhance productivity. Our proprietary Inventory Control System offers full transparency and control over your stock.</p>'
            . '<ul class="iq-about-list">'
            . $li('Real-Time Monitoring', 'Access up-to-the-minute inventory levels and product locations through our user-friendly platform.')
            . $li('Automated Replenishment', 'Automated systems reduce stockouts and maintain optimal inventory levels.')
            . $li('Demand Forecasting', 'Advanced AI algorithms provide accurate demand forecasts to reduce holding costs.')
            . $li('Kitting &amp; Assembly', 'Customize products before shipment for added value and enhanced customer satisfaction.')
            . $li('Quality Inspection', 'Thorough inspections verify all products conform to client specifications.')
            . $li('Packaging &amp; Labeling', 'Tailored solutions to meet specific client requirements and regulatory compliance.')
            . '</ul>',
        'image' => 'services-warehousing.jpg',
    ],
    [
        'id' => 63,
        'name' => 'Supply Chain Solutions',
        'card_title' => null,
        'short_description' => null, // no card in the design, detail section only
        'description' => '<p class="iq-about-text">IQRA Transportation Ltd goes beyond traditional logistics to offer comprehensive supply chain management solutions designed to optimize efficiency and reduce costs.</p>'
            . '<ul class="iq-about-list">'
            . $li('Process Optimization', 'Our experts analyze and optimize every step of the supply chain to reduce waste and improve efficiency. By identifying bottlenecks and implementing best practices, we help clients achieve smoother operations.')
            . $li('Risk Management', "Identifying potential disruptions and developing strategies to mitigate them is crucial in today's unpredictable business environment. Our risk assessment tools help clients proactively address challenges before they escalate.")
            . $li('Cost Analysis', 'Conducting comprehensive cost assessments allows us to find areas for savings without compromising service quality. We work closely with clients to create customized strategies that enhance profitability.')
            . '</ul>',
        'image' => 'about-office-work.jpg',
    ],
];

// Services page orders by created_at desc, so the first item gets the newest date.
$base = Carbon::now()->subDay()->startOfMinute();

foreach ($services as $i => $s) {
    $post = $s['id'] ? Post::find($s['id']) : Post::where('type', 3)->where('name', $s['name'])->first();
    if (!$post) {
        $post = new Post();
        $post->type = 3;
        $post->status = 'active';
        $post->slug = Str::slug($s['name']);
    }
    $post->name = $s['name'];
    $post->seo_title = $s['card_title'];
    $post->short_description = $s['short_description'];
    $post->description = $s['description'];
    $post->fetured = 0;
    $post->created_at = $base->copy()->subMinutes($i);
    $post->save();

    $media = Media::where('src_id', $post->id)->where('src_type', 1)->where('use_Of_file', 1)->first() ?: new Media();
    $media->src_id = $post->id;
    $media->src_type = 1;
    $media->use_Of_file = 1;
    $media->file_type = 1;
    $media->file_name = $s['image'];
    $media->file_path = 'frontend_assets/images';
    $media->file_url = 'frontend_assets/images/' . $s['image'];
    $media->save();

    echo " - {$post->id}: {$post->name}\n";
}

echo "Done.\n";

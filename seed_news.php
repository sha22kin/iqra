<?php
// Run: php artisan tinker --execute="require base_path('seed_news.php');"
// Syncs News (type = 1 posts) with desing/news.html and desing/news-details.html.
// Existing news with the same title are updated, missing ones are created.

use App\Models\Post;
use App\Models\Media;
use Illuminate\Support\Str;
use Carbon\Carbon;

echo "Seeding News...\n";

// News listing page
$page = Post::where('type', 0)->where('template', 'Latest Blog')->first();
if ($page) {
    $page->name = 'News';
    $page->save();
}

$p = fn(...$paras) => implode('', array_map(fn($t) => '<p>' . $t . '</p>', $paras));

// Ordered as in the design (newest first)
$news = [
    [
        'date' => '2024-07-12',
        'name' => 'Leading Project Cargo Success at IQRA Limited',
        'excerpt' => 'IQRA Limited has successfully completed another major project cargo operation. Our dedicated team ensured smooth delivery under challenging conditions',
        'image' => 'hero-port.jpg',
        'body' => $p(
            'IQRA Limited has successfully completed another major <strong>project cargo operation</strong>, moving oversized and heavy-lift equipment from the port of origin all the way to the project site in Bangladesh. The shipment required careful route surveys, special permits and close coordination with port authorities, terminal operators and transport partners.',
            'Despite tight timelines, monsoon weather and narrow access roads, our dedicated project team ensured smooth delivery under challenging conditions. Every stage — from vessel discharge and customs clearance to on-site positioning — was planned in detail and monitored around the clock.',
            'This achievement reflects our commitment to delivering complex logistics solutions safely and on schedule. We thank our client for their trust and our partners for their outstanding support throughout the operation.'
        ),
    ],
    [
        'date' => '2024-06-30',
        'name' => "Shaping the Future Through Strategic Thinking: IQRA's Business Case Competition",
        'excerpt' => 'We recently hosted an exciting Business Case Competition aimed at encouraging innovative ideas. Participants showcased brilliant strategies for industry challenges',
        'image' => 'about-award-trophy.jpg',
        'body' => $p(
            'Strategic thinking and collaboration took center stage as teams at IQRA came together for an impactful Business Case Competition aligned with <strong>IQRA Vision 2030</strong>. Departments presented their vision and actionable strategies, demonstrating how innovative ideas and practical solutions can contribute to achieving long-term sustainable goals. The competition highlighted exceptional talent and forward-thinking leadership, with the <strong>Import Operation Team</strong> securing the Winner position, followed by <strong>Key Account Management (KAM) Team</strong> as 1st Runner-up and the <strong>Commercial Team</strong> as 2nd Runner-up. Management commended the remarkable efforts of all participants and shared valuable insights, making the sessions a true eye-opener. The event concluded with renewed energy, strengthened collaboration, and a shared commitment to move forward together toward a common vision.'
        ),
    ],
    [
        'date' => '2024-06-10',
        'name' => "IQRA Participates in UniGroup's 10th Anniversary Celebration in Chicago",
        'excerpt' => "Our leadership team proudly attended UniGroup's 10th Anniversary Celebration in Chicago, networking with global partners and sharing insights on logistics",
        'image' => 'about-team-group.jpg',
        'body' => $p(
            "Our leadership team proudly attended <strong>UniGroup's 10th Anniversary Celebration</strong> in Chicago, joining partners from across the globe to mark a decade of collaboration in international logistics.",
            'The event brought together industry leaders for networking sessions, panel discussions and partner meetings. Our team shared insights on the growing logistics market in Bangladesh, discussed new trade-lane opportunities and strengthened relationships with long-standing partners.',
            'Being part of this milestone celebration reaffirms our place in a trusted worldwide network and our commitment to delivering seamless, door-to-door solutions for our customers.'
        ),
    ],
    [
        'date' => '2024-05-20',
        'name' => 'IQRA Celebrates Colleague Appreciation Day',
        'excerpt' => 'To honor the hard work and dedication of our team members, IQRA celebrated Colleague Appreciation Day with fun activities and heartfelt recognition',
        'image' => 'about-office-work.jpg',
        'body' => $p(
            'To honor the hard work and dedication of our team members, IQRA celebrated <strong>Colleague Appreciation Day</strong> across all our offices.',
            'The day was filled with fun activities, team games and a shared lunch. Department heads recognised colleagues who went above and beyond during the year, and team members wrote personal notes of thanks to one another.',
            'Our people are the driving force behind every shipment we handle. Days like this remind us how much we value the commitment, energy and spirit of the IQRA family.'
        ),
    ],
    [
        'date' => '2024-05-15',
        'name' => "IQRA Renews Partnership with SOS Children's Villages Bangladesh",
        'excerpt' => "Continuing our commitment to social responsibility, we have renewed our long-standing partnership with SOS Children's Villages to support vulnerable children",
        'image' => 'SOS.webp',
        'body' => $p(
            "Continuing our commitment to social responsibility, IQRA has renewed its long-standing partnership with <strong>SOS Children's Villages Bangladesh</strong>.",
            'Through this partnership we support vulnerable children with access to education, healthcare and a safe, caring home environment. Our team members also volunteer their time for mentoring sessions and special events throughout the year.',
            'We believe every child deserves the opportunity to grow and thrive, and we are proud to continue standing beside SOS Children\'s Villages in this important work.'
        ),
    ],
    [
        'date' => '2024-05-12',
        'name' => 'IQRA Shines at the "ShareTrip-Monitor Airline of the Year 2024" Awards',
        'excerpt' => 'IQRA was honored at the prestigious "ShareTrip-Monitor Airline of the Year 2024" awards for our outstanding contribution to the aviation and freight industry',
        'image' => 'about-hero-building.jpg',
        'body' => $p(
            'IQRA was honored at the prestigious <strong>"ShareTrip-Monitor Airline of the Year 2024"</strong> awards for our outstanding contribution to the aviation and freight industry in Bangladesh.',
            'The recognition celebrates our long-standing work with major airlines, our reliable air cargo handling and the trust we have built with carriers and customers alike.',
            'We dedicate this award to our air freight team and to our airline partners, whose cooperation makes it possible for us to keep raising the standard of service every day.'
        ),
    ],
    [
        'date' => '2024-05-05',
        'name' => 'IQRA Supports Zero Hunger Initiative in Dhaka City!',
        'excerpt' => 'We partnered with local NGOs to distribute nutritious meals across Dhaka city, taking a small step towards the global goal of Zero Hunger',
        'image' => 'vision-passion-feet.jpg',
        'body' => $p(
            'IQRA partnered with local NGOs to distribute nutritious meals to families in need across Dhaka city, taking a small step towards the global goal of <strong>Zero Hunger</strong>.',
            'Volunteers from our offices helped pack and deliver food parcels, while our logistics team supported the distribution so the meals reached each location on time.',
            'We are grateful to everyone who took part and remain committed to supporting our communities through meaningful initiatives like this.'
        ),
    ],
    [
        'date' => '2024-04-25',
        'name' => 'IQRA Facilitates Seamless Logistics for ICC Zimbabwe Tour of Bangladesh',
        'excerpt' => 'We proudly managed the logistics and equipment transportation for the ICC Zimbabwe cricket team during their recent tour of Bangladesh, ensuring timely delivery',
        'image' => 'air-freight.jpg',
        'body' => $p(
            'IQRA proudly managed the logistics and equipment transportation for the <strong>Zimbabwe cricket team</strong> during their recent tour of Bangladesh.',
            'Our team handled air cargo clearance, airport handling and secure transportation of team kit and equipment between venues, ensuring everything arrived on time for every match.',
            'Supporting international sporting events is a great example of how fast, flexible and well-coordinated logistics make a real difference behind the scenes.'
        ),
    ],
    [
        'date' => '2024-04-22',
        'name' => 'Earth Day 2024: OUR POWER, OUR PLANET',
        'excerpt' => 'This Earth Day, IQRA employees participated in a tree-planting drive to promote environmental sustainability and combat climate change in our communities',
        'image' => 'about-port-containers.jpg',
        'body' => $p(
            'This Earth Day, under the theme <strong>"Our Power, Our Planet"</strong>, IQRA employees took part in a tree-planting drive to promote environmental sustainability in our communities.',
            'Alongside the planting, our team ran an internal awareness session on reducing waste, saving energy and choosing greener transport options for our customers\' shipments.',
            'Protecting the planet is a shared responsibility, and we will continue to look for practical ways to reduce the environmental impact of our operations.'
        ),
    ],
    [
        'date' => '2024-04-15',
        'name' => 'Celebrating Bengali New Year at IQRA!',
        'excerpt' => 'Our office was filled with vibrant colors and joy as we celebrated Pohela Boishakh, the Bengali New Year, with traditional food and cultural activities',
        'image' => 'ocean-freight.jpg',
        'body' => $p(
            'Our office was filled with vibrant colors and joy as we celebrated <strong>Pohela Boishakh</strong>, the Bengali New Year.',
            'Colleagues came dressed in traditional red and white, enjoyed panta-ilish and other festive dishes, and took part in music and cultural activities throughout the day.',
            'Shubho Noboborsho to all our colleagues, customers and partners — may the new year bring happiness, success and prosperity.'
        ),
    ],
    [
        'date' => '2024-04-08',
        'name' => 'IQRA Celebrates Ramadan with Cherished Customers!',
        'excerpt' => 'During the holy month of Ramadan, we hosted an exclusive Iftar gathering to express our gratitude and strengthen bonds with our valued customers and partners',
        'image' => 'multi-modal.jpg',
        'body' => $p(
            'During the holy month of Ramadan, IQRA hosted an exclusive <strong>Iftar gathering</strong> to express our gratitude to our valued customers and partners.',
            'The evening brought together guests from across the trade and logistics community, giving us the opportunity to share a meal, reflect on the year and strengthen the relationships that are at the heart of our business.',
            'We thank everyone who joined us and wish all our customers and partners peace and blessings.'
        ),
    ],
    [
        'date' => '2024-03-08',
        'name' => "IQRA Celebrates International Women's Day 2024",
        'excerpt' => "We recognize and celebrate the incredible achievements of the women at IQRA, whose dedication continues to drive our organization's success",
        'image' => 'services-air-freight.jpg',
        'body' => $p(
            "On <strong>International Women's Day 2024</strong>, we recognized and celebrated the incredible achievements of the women at IQRA.",
            'From operations and customer service to finance and leadership, our female colleagues play a vital role in every part of our business. The celebration included a special session where colleagues shared their experiences and ideas for building an even more inclusive workplace.',
            'We remain committed to creating equal opportunities and an environment where everyone can grow and succeed.'
        ),
    ],
    [
        'date' => '2024-03-02',
        'name' => 'IQRA Successfully Delivers Critical Project Cargo for Asia Pharma Expo 2024',
        'excerpt' => 'We efficiently managed the sensitive equipment logistics for the Asia Pharma Expo 2024, proving once again our expertise in specialized pharmaceutical freight',
        'image' => 'about-cargo-plane.jpg',
        'body' => $p(
            'IQRA efficiently managed the logistics of sensitive exhibition equipment for <strong>Asia Pharma Expo 2024</strong>.',
            'The project included temperature-sensitive and high-value machinery that required careful packing, priority customs clearance and secure delivery to the exhibition venue within a tight setup window.',
            'The successful delivery once again demonstrates our expertise in specialized pharmaceutical freight and exhibition logistics.'
        ),
    ],
    [
        'date' => '2024-02-14',
        'name' => "Colours of Spring Shine Bright at IQRA's Falgun Celebration",
        'excerpt' => 'Welcoming the spring season, employees dressed in bright yellow and orange as we celebrated Pohela Falgun with music, laughter, and traditional sweets',
        'image' => 'services-warehousing.jpg',
        'body' => $p(
            'Welcoming the spring season, IQRA colleagues dressed in bright yellow and orange as we celebrated <strong>Pohela Falgun</strong>.',
            'The office was decorated with flowers, and the day was filled with music, laughter and traditional sweets shared among teams.',
            'Celebrations like this bring us closer together and keep our rich cultural traditions alive in the workplace.'
        ),
    ],
    [
        'date' => '2024-02-04',
        'name' => 'IQRA Observes Cancer Awareness Day 2024',
        'excerpt' => 'Standing in solidarity with those affected by cancer, our team organized an awareness session to emphasize the importance of early detection and healthy lifestyles',
        'image' => 'services-customs-brokerage.jpg',
        'body' => $p(
            'Standing in solidarity with those affected by cancer, IQRA observed <strong>World Cancer Day 2024</strong> with an awareness session for our team.',
            'The session highlighted the importance of early detection, regular health check-ups and healthy lifestyle choices, and encouraged colleagues to share the message with their families.',
            'The health and wellbeing of our people will always remain a priority for us.'
        ),
    ],
    [
        'date' => '2024-01-18',
        'name' => "IQRA Sponsors Dutch Club 9's Cricket Tournament 2024",
        'excerpt' => "As part of our community engagement, we proudly sponsored the Dutch Club 9's Cricket Tournament, encouraging sportsmanship and healthy competition",
        'image' => 'services-import-service.jpg',
        'body' => $p(
            "As part of our community engagement, IQRA proudly sponsored the <strong>Dutch Club 9's Cricket Tournament 2024</strong>.",
            'The tournament brought together teams from the business community for a day of fast-paced cricket, sportsmanship and healthy competition.',
            'We congratulate all the participating teams and thank the organisers for a well-run and enjoyable event.'
        ),
    ],
    [
        'date' => '2024-01-12',
        'name' => 'IQRA Partners with CAAB Cricket Championship 2023',
        'excerpt' => 'IQRA was delighted to partner with the Civil Aviation Authority of Bangladesh (CAAB) for their annual cricket championship',
        'image' => 'compliance-hero.webp',
        'body' => $p(
            'IQRA was delighted to partner with the <strong>Civil Aviation Authority of Bangladesh (CAAB)</strong> for their annual Cricket Championship 2023.',
            'The championship brought together teams from across the aviation community, celebrating teamwork and friendship beyond the workplace.',
            'We value our close working relationship with CAAB and were proud to support this event.'
        ),
    ],
    [
        'date' => '2024-01-05',
        'name' => "IQRA's Memorable Annual Outing at DuSai Resort, Sylhet",
        'excerpt' => 'To recharge and celebrate a successful year, the entire IQRA team embarked on an unforgettable annual retreat to the beautiful DuSai Resort',
        'image' => 'vision-stairs-man.jpg',
        'body' => $p(
            'To recharge and celebrate a successful year, the entire IQRA team embarked on an unforgettable annual retreat to the beautiful <strong>DuSai Resort in Sylhet</strong>.',
            'The trip included team-building games, a cultural evening, a raffle draw and plenty of time to relax amid the green hills and tea gardens of Sylhet.',
            'We returned to work refreshed, more connected as a team and ready to take on the new year together.'
        ),
    ],
    [
        'date' => '2024-01-02',
        'name' => 'IQRA Empowers Youth with SOS Villages Bangladesh',
        'excerpt' => 'In collaboration with SOS Villages Bangladesh, we conducted an empowerment workshop designed to provide essential skills and guidance to the youth',
        'image' => 'our-people-hero.webp',
        'body' => $p(
            "In collaboration with <strong>SOS Children's Villages Bangladesh</strong>, IQRA conducted a youth empowerment workshop designed to provide essential skills and career guidance.",
            'Our colleagues led sessions on communication, CV writing, interview preparation and an introduction to careers in logistics and supply chain.',
            'Investing in young people is investing in the future, and we look forward to continuing this programme.'
        ),
    ],
    [
        'date' => '2024-01-01',
        'name' => 'IQRA Honored with Gold Medal at National Export Trophy 2021-22',
        'excerpt' => "We are incredibly proud to receive the Gold Medal at the National Export Trophy 2021-22, recognizing our significant contribution to the nation's export sector",
        'image' => 'about-award-trophy.jpg',
        'body' => $p(
            'IQRA is incredibly proud to receive the <strong>Gold Medal at the National Export Trophy 2021-22</strong>, recognizing our significant contribution to the nation\'s export sector.',
            'This honour reflects years of hard work by our team and the trust placed in us by exporters across Bangladesh to move their goods reliably to markets around the world.',
            'We thank our customers, partners and colleagues for making this achievement possible, and we remain committed to supporting the growth of Bangladesh\'s exports.'
        ),
    ],
];

foreach ($news as $i => $n) {
    $post = Post::where('type', 1)->where('name', $n['name'])->first();
    if (!$post) {
        $post = new Post();
        $post->type = 1;
        $post->slug = Str::slug($n['name']);
        if (Post::where('slug', $post->slug)->exists()) {
            $post->slug .= '-' . Str::random(4);
        }
    }
    $post->name = $n['name'];
    $post->short_description = $n['excerpt'];
    $post->description = $n['body'];
    $post->status = 'active';
    $post->addedby_id = $post->addedby_id ?: 1;
    $post->seo_title = $n['name'];
    $post->seo_description = $n['excerpt'];
    // Same-day items keep design order: earlier in the list = later time
    $post->created_at = Carbon::parse($n['date'] . ' 10:00:00')->subMinutes($i);
    $post->save();

    $media = Media::where('src_id', $post->id)->where('src_type', 1)->where('use_Of_file', 1)->first() ?: new Media();
    $media->src_id = $post->id;
    $media->src_type = 1;
    $media->use_Of_file = 1;
    $media->file_type = 1;
    $media->file_name = $n['image'];
    $media->file_path = 'frontend_assets/images';
    $media->file_url = 'frontend_assets/images/' . $n['image'];
    $media->save();

    echo " - {$post->id}: {$post->name}\n";
}

echo "Done. " . count($news) . " news items.\n";

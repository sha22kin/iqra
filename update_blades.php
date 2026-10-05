<?php

$aboutFile = 'e:\iqragrup\resources\views\welcome\pages\about.blade.php';
$about = file_get_contents($aboutFile);
$about = preg_replace('/<h1 class="iq-about-hero-title" data-aos="fade-down">\s*As a pioneer in the industry, what makes us unique is our option for flexible and customized solutions for our customers.\s*<\/h1>/i', '<h1 class="iq-about-hero-title" data-aos="fade-down">{{ $page->short_description ?? \'About Us\' }}</h1>', $about);
$about = preg_replace('/<p class="iq-about-text"[^>]*>\s*Established in 2026.*?<\/p>/is', '{!! $page->description !!}', $about);
file_put_contents($aboutFile, $about);

$visionFile = 'e:\iqragrup\resources\views\welcome\pages\vision.blade.php';
$vision = file_get_contents($visionFile);
$vision = preg_replace('/<h1 class="iq-about-hero-title" data-aos="fade-down">\s*We envision a future where logistics is seamless, sustainable, and highly efficient, driving global trade forward.\s*<\/h1>/is', '<h1 class="iq-about-hero-title" data-aos="fade-down">{{ $page->short_description ?? \'Our Vision\' }}</h1>', $vision);
$vision = preg_replace('/<p class="iq-about-text"[^>]*>\s*At IQRA Transportation Ltd, our vision is to continuously.*?<\/ul>/is', '{!! $page->description !!}', $vision);
file_put_contents($visionFile, $vision);

$industryFile = 'e:\iqragrup\resources\views\welcome\pages\industryPosition.blade.php';
$industry = file_get_contents($industryFile);
$industry = preg_replace('/<h1 class="iq-about-hero-title" data-aos="fade-down">\s*Our commitment to excellence has positioned us as a trusted leader in the global logistics industry.\s*<\/h1>/is', '<h1 class="iq-about-hero-title" data-aos="fade-down">{{ $page->short_description ?? \'Industry Position\' }}</h1>', $industry);
$industry = preg_replace('/<p class="iq-about-text"[^>]*>\s*Today, IQRA Transportation Ltd stands.*?<\/p>/is', '{!! $page->description !!}', $industry);
file_put_contents($industryFile, $industry);

echo "Blade files updated.\n";

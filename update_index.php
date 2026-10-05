<?php
$indexFile = 'e:\iqragrup\resources\views\welcome\index.blade.php';
$index = file_get_contents($indexFile);
$index = preg_replace('/<h1 class="iq-hero-title" data-aos="fade-down">Your Logistics Made Easy<\/h1>/i', '<h1 class="iq-hero-title" data-aos="fade-down">{{ isset($homePage) ? $homePage->short_description : \'Your Logistics Made Easy\' }}</h1>', $index);
$index = preg_replace('/<p class="iq-overview-desc">\s*iqragroup is the leading forwarder and logistics.*?<\/p>/is', '{!! isset($homePage) ? $homePage->description : \'\' !!}', $index);
file_put_contents($indexFile, $index);
echo "index.blade.php updated.\n";

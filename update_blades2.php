<?php

$careerFile = 'e:\iqragrup\resources\views\welcome\pages\career.blade.php';
$career = file_get_contents($careerFile);
$career = preg_replace('/<p class="career-desc mb-5">\s*We in IQRA believes in nurturing.*?<\/p>/is', '{!! $page->description !!}', $career);
file_put_contents($careerFile, $career);

$locationFile = 'e:\iqragrup\resources\views\welcome\pages\location.blade.php';
$location = file_get_contents($locationFile);
$location = preg_replace('/<div class="row g-5">.*<!-- Location Item 2: Chittagong Office -->.*<\/div>\s*<\/div>/is', '{!! $page->description !!}', $location);
file_put_contents($locationFile, $location);

echo "Blade files updated.\n";

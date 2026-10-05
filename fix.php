<?php
$locationFile = 'e:\iqragrup\resources\views\welcome\pages\location.blade.php';
$location = file_get_contents($locationFile);
$location = str_replace('{!! $page->description !!}', "{!! \$page->description !!}\n</div>", $location);
file_put_contents($locationFile, $location);
echo "Fixed.\n";

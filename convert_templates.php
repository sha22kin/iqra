<?php

$files = [
    'about.html' => 'pages/about.blade.php',
    'contact.html' => 'pages/contact.blade.php',
    'services.html' => 'services/latestServices.blade.php',
    'news.html' => 'blogs/latestBlogs.blade.php',
    'news-details.html' => 'blogs/blogView.blade.php',
    'industry-position.html' => 'pages/industryPosition.blade.php',
    'vision.html' => 'pages/vision.blade.php',
    'location.html' => 'pages/location.blade.php',
    'career.html' => 'pages/career.blade.php',
];

$designDir = 'e:/iqragrup/desing/';
$viewsDir = 'e:/iqragrup/resources/views/welcome/';

foreach ($files as $htmlFile => $bladeFile) {
    if (!file_exists($designDir . $htmlFile)) continue;
    
    $content = file_get_contents($designDir . $htmlFile);
    
    // Extract content between </header> and <footer>
    preg_match('/<\/header>(.*)<footer/is', $content, $matches);
    if (!isset($matches[1])) {
        echo "Could not extract main content for $htmlFile\n";
        continue;
    }
    
    $bodyContent = $matches[1];
    
    // Replace image paths
    $bodyContent = preg_replace('/src="images\//', 'src="{{asset(\'frontend_assets/images/\')}}/', $bodyContent);
    // Replace css paths if any
    $bodyContent = preg_replace('/href="css\//', 'href="{{asset(\'frontend_assets/css/\')}}/', $bodyContent);
    
    // Form action for contact.html
    if ($htmlFile == 'contact.html') {
        $bodyContent = str_replace('<form class="contact-form" data-aos="fade-up">', '<form action="{{route(\'contactMail\')}}" method="POST" class="contact-form" data-aos="fade-up">'. "\n" . '@csrf', $bodyContent);
        // add name tags
        $bodyContent = str_replace('id="firstName"', 'id="firstName" name="first_name"', $bodyContent);
        $bodyContent = str_replace('id="lastName"', 'id="lastName" name="last_name"', $bodyContent);
        $bodyContent = str_replace('id="email"', 'id="email" name="email"', $bodyContent);
        $bodyContent = str_replace('id="message"', 'id="message" name="message"', $bodyContent);
        // add subject
        $bodyContent = str_replace('name="message"', 'name="message"', $bodyContent) . '<input type="hidden" name="subject" value="Contact Us Page">';
    }
    
    $bladeTemplate = <<<BLADE
@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{websiteTitle(isset(\$page) ? \$page->name : '')}}</title>
@endsection

@section('SEO')
<meta name="title" property="og:title" content="{{isset(\$page) ? \$page->seo_title : general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!isset(\$page) ? \$page->seo_desc : general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{isset(\$page) ? \$page->seo_keyword : general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{url()->current()}}" />
<link rel="canonical" href="{{url()->current()}}">
@endsection

@section('contents')
$bodyContent
@endsection
BLADE;
    
    file_put_contents($viewsDir . $bladeFile, $bladeTemplate);
    echo "Generated $bladeFile\n";
}
echo "Done.\n";

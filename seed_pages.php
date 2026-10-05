<?php
use App\Models\Post;
use App\Models\Attribute;
use Illuminate\Support\Str;

// 1. Create the Pages
$pagesToCreate = [
    ['name' => 'About Us', 'template' => 'About Us'],
    ['name' => 'Industry Position', 'template' => 'Industry Position'],
    ['name' => 'Our Vision', 'template' => 'Our Vision'],
    ['name' => 'Location', 'template' => 'Location'],
    ['name' => 'Career', 'template' => 'Career'],
    ['name' => 'Contact Us', 'template' => 'Contact Us'],
];

$pageModels = [];
foreach($pagesToCreate as $pData) {
    $slug = Str::slug($pData['name']);
    $page = Post::where('type', 0)->where('slug', $slug)->first();
    if(!$page) {
        $page = new Post();
        $page->type = 0;
        $page->name = $pData['name'];
        $page->slug = $slug;
        $page->status = 'active';
        $page->template = $pData['template'];
        $page->save();
        echo "Created page: " . $pData['name'] . "\n";
    } else {
        $page->template = $pData['template'];
        $page->save();
        echo "Updated page: " . $pData['name'] . "\n";
    }
    $pageModels[$pData['name']] = $page;
}

// 2. Setup the Header Menu
$headerMenu = Attribute::where('type', 8)->where('name', 'Header Menu')->first();
if($headerMenu) {
    // Clear old submenus
    Attribute::where('type', 8)->where('parent_id', $headerMenu->id)->delete();
    
    // Create new menu structure according to design
    // 1. Home
    $home = new Attribute();
    $home->type = 8;
    $home->parent_id = $headerMenu->id;
    $home->name = 'Home';
    $home->menu_type = 0; // Custom link
    $home->location = '/';
    $home->save();
    
    // 2. iqragroup Dropdown
    $iqra = new Attribute();
    $iqra->type = 8;
    $iqra->parent_id = $headerMenu->id;
    $iqra->name = 'iqragroup';
    $iqra->menu_type = 0;
    $iqra->location = 'javascript:void(0)';
    $iqra->save();
    
        // Dropdown items
        foreach(['About Us', 'Industry Position', 'Our Vision', 'Location'] as $child) {
            $childMenu = new Attribute();
            $childMenu->type = 8;
            $childMenu->parent_id = $iqra->id;
            $childMenu->name = $child;
            $childMenu->menu_type = 1; // Page link
            $childMenu->src_id = $pageModels[$child]->id;
            $childMenu->save();
        }

    // 3. Services Dropdown
    $services = new Attribute();
    $services->type = 8;
    $services->parent_id = $headerMenu->id;
    $services->name = 'Services';
    $services->menu_type = 0;
    $services->location = 'javascript:void(0)';
    $services->save();
    
        // All Services
        $allServices = new Attribute();
        $allServices->type = 8;
        $allServices->parent_id = $services->id;
        $allServices->name = 'All Services';
        $allServices->menu_type = 0;
        $allServices->location = '/services';
        $allServices->save();
        
    // 4. Career
    $career = new Attribute();
    $career->type = 8;
    $career->parent_id = $headerMenu->id;
    $career->name = 'Career';
    $career->menu_type = 1; // Page
    $career->src_id = $pageModels['Career']->id;
    $career->save();
    
    // 5. News
    $news = new Attribute();
    $news->type = 8;
    $news->parent_id = $headerMenu->id;
    $news->name = 'News';
    $news->menu_type = 0; // Custom link
    $news->location = '/blogs';
    $news->save();
    
    // 6. Contact
    $contact = new Attribute();
    $contact->type = 8;
    $contact->parent_id = $headerMenu->id;
    $contact->name = 'Contact';
    $contact->menu_type = 1; // Page
    $contact->src_id = $pageModels['Contact Us']->id;
    $contact->save();
    
    echo "Header Menu updated successfully!\n";
}

// 3. Setup the Footer Menu
$footerMenu = Attribute::where('type', 8)->where('name', 'Quick Link')->first();
if($footerMenu) {
    Attribute::where('type', 8)->where('parent_id', $footerMenu->id)->delete();
    
    $f_links = [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'About', 'url' => '/page/about-us'],
        ['name' => 'Service', 'url' => '/services'],
        ['name' => 'Contact', 'url' => '/page/contact-us']
    ];
    
    foreach($f_links as $link) {
        $f_item = new Attribute();
        $f_item->type = 8;
        $f_item->parent_id = $footerMenu->id;
        $f_item->name = $link['name'];
        $f_item->menu_type = 0;
        $f_item->location = $link['url'];
        $f_item->save();
    }
    echo "Footer Menu updated successfully!\n";
}

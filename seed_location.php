<?php
// Run: php artisan tinker --execute="require base_path('seed_location.php');"
// Syncs the Location page content with desing/location.html
// (office cards, key personnel and follow us).

use App\Models\Post;

$page = Post::where('type', 0)->where('template', 'Location')->first();
if (!$page) {
    echo "Location page not found.
";
    return;
}

$page->description = <<<'HTML'
<div class="row g-5">
<!-- Location Item 1: Dhaka Office -->
<div class="col-md-6">
<div class="location-card">
<div class="location-map-wrapper">
<iframe allowfullscreen="" class="location-map-iframe" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2038753239846!2d90.37035131536257!3d23.739757695085187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8cbca500001%3A0x1d3780d603e87515!2sJigatola%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd"></iframe>
</div>
<h3 class="location-name">Dhaka Office (Head Office)</h3>
<p class="location-address">
              85 (Ground Floor), Nijhum Residential Area,<br/>
              Jigatola, Dhanmondi,<br/>
              Dhaka-1209, Bangladesh.
            </p>
<h4 class="location-info-subtitle mt-4">General Contact</h4>
<p class="location-info-text mb-4">Telephone: 02226684851</p>
</div>
</div>
<!-- Location Item 2: Chittagong Office -->
<div class="col-md-6">
<div class="location-card">
<div class="location-map-wrapper">
<iframe allowfullscreen="" class="location-map-iframe" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.669527633519!2d91.81577717437021!3d22.328328041869818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8c8b4df5057%3A0x6b80dd85ff67e5bb!2sAgrabad%20C%2FA%2C%20Chattogram!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd"></iframe>
</div>
<h3 class="location-name">Chittagong Office</h3>
<p class="location-address">
              Siraj Monjil (G/F), 3601/5899,<br/>
              Badamtoli, Agrabad-4100,<br/>
              Double Mooring, Chattogram
            </p>
<h4 class="location-info-subtitle mt-4">General Contact</h4>
<p class="location-info-text mb-4">Telephone: 02226684851</p>
</div>
</div>
</div>
<!-- Separately: 2 Column Cards for Key Personnel -->
<h2 class="location-page-title mt-5" data-aos="fade-down" style="font-size: 1.5rem; text-align: left; margin-bottom: 2rem;">KEY PERSONNEL</h2>
<div class="row g-4">
<div class="col-md-6">
<div class="card h-100 p-4 border-0 shadow-sm bg-light rounded-4">
<h4 class="location-info-subtitle fs-5 mb-1 text-primary">Md. Israfil Alam Chanchal</h4>
<p class="location-info-text fw-bold text-dark mb-3">Managing Director</p>
<p class="location-info-text mb-2"><i class="fa-solid fa-phone me-2 text-secondary"></i>+8801720518623, +8801924595960</p>
<p class="location-info-text mb-2"><i class="fa-brands fa-whatsapp me-2 text-success"></i>WhatsApp: +8801720518623</p>
<p class="location-info-text mb-0"><i class="fa-solid fa-envelope me-2 text-danger"></i>chanchal@iqragroup.net, info@iqragroup.net</p>
</div>
</div>
<div class="col-md-6">
<div class="card h-100 p-4 border-0 shadow-sm bg-light rounded-4">
<h4 class="location-info-subtitle fs-5 mb-1 text-primary">Md. Mizanur Rahman</h4>
<p class="location-info-text fw-bold text-dark mb-3">Accounts Manager</p>
<p class="location-info-text mb-2"><i class="fa-solid fa-phone me-2 text-secondary"></i>+8801720518622</p>
<p class="location-info-text mb-2"><i class="fa-brands fa-whatsapp me-2 text-success"></i>WhatsApp: +8801720518622</p>
<p class="location-info-text mb-0"><i class="fa-solid fa-envelope me-2 text-danger"></i>mizan@iqragroup.net</p>
</div>
</div>
<div class="col-md-6">
<div class="card h-100 p-4 border-0 shadow-sm bg-light rounded-4">
<h4 class="location-info-subtitle fs-5 mb-1 text-primary">Md. Malakuter Rahman</h4>
<p class="location-info-text fw-bold text-dark mb-3">Marketing Manager</p>
<p class="location-info-text mb-2"><i class="fa-solid fa-phone me-2 text-secondary"></i>+8801720518624</p>
<p class="location-info-text mb-2"><i class="fa-brands fa-whatsapp me-2 text-success"></i>WhatsApp: +8801720518624</p>
<p class="location-info-text mb-0"><i class="fa-solid fa-envelope me-2 text-danger"></i>m.rahman@iqragroup.net, development@iqragroup.net</p>
</div>
</div>
<div class="col-md-6">
<div class="card h-100 p-4 border-0 shadow-sm bg-light rounded-4">
<h4 class="location-info-subtitle fs-5 mb-1 text-primary">Md. Mainul Hasan</h4>
<p class="location-info-text fw-bold text-dark mb-3">Documentation Manager</p>
<p class="location-info-text mb-2"><i class="fa-solid fa-phone me-2 text-secondary"></i>+8801713875824, +8801815-246610</p>
<p class="location-info-text mb-2"><i class="fa-brands fa-whatsapp me-2 text-success"></i>WhatsApp: +8801713875824</p>
<p class="location-info-text mb-0"><i class="fa-solid fa-envelope me-2 text-danger"></i>mainul@iqragroup.net, info@iqragroup.net</p>
</div>
</div>
<div class="col-md-6">
<div class="card h-100 p-4 border-0 shadow-sm bg-light rounded-4">
<h4 class="location-info-subtitle fs-5 mb-1 text-primary">Barahagiri Bhattachargee</h4>
<p class="location-info-text fw-bold text-dark mb-3">Manager (Ctg Office)</p>
<p class="location-info-text mb-2"><i class="fa-solid fa-phone me-2 text-secondary"></i>+8801720518612</p>
<p class="location-info-text mb-2"><i class="fa-brands fa-whatsapp me-2 text-success"></i>WhatsApp: +8801720518612</p>
<p class="location-info-text mb-0"><i class="fa-solid fa-envelope me-2 text-danger"></i>customs@iqragroup.net, import@iqragroup.net, export@iqragroup.net</p>
</div>
</div>
</div>
<!-- Social Media Links -->
<h3 class="location-page-title mt-5" style="font-size: 1.3rem; text-align: left; margin-bottom: 1.5rem;">FOLLOW US</h3>
<div class="location-social-links mb-5">
<a aria-label="Facebook" class="location-social-icon" href="https://www.facebook.com/profile.php?id=61594175524744&amp;sk=followers" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
<a aria-label="LinkedIn" class="location-social-icon" href="https://www.linkedin.com/company/146633035/admin/dashboard/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
</div>
HTML;
$page->save();

echo "Location page updated (id {$page->id}).
";

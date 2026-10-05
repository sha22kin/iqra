<?php
use App\Models\Post;

echo "Seeding page content...\n";

// About Us
$about = Post::where('type', 0)->where('slug', 'about-us')->first();
if ($about) {
    $about->short_description = "As a pioneer in the industry, what makes us unique is our option for flexible and customized solutions for our customers.";
    $about->description = '<p class="iq-about-text" style="font-size: 1.05rem; line-height: 1.8; color: #555555; text-align: justify;">Established in 2026, IQRA Transportation Ltd has rapidly ascended to become a global leader in Forwarding, logistics and supply chain management. With a steadfast commitment to precision, efficiency, and innovation, we are dedicated to providing top-tier logistics solutions that are tailored to meet the dynamic needs of businesses across a wide range of industries. Our advanced technology, environmentally sustainable practices, and customer-centric services position us at the forefront of the logistics industry. We understand that in today’s fast-paced world, the demand for reliable logistics services is greater than ever. Our comprehensive suite of solutions ensures that we can meet and exceed our clients\' expectations.</p>';
    $about->save();
}

// Industry Position
$industry = Post::where('type', 0)->where('slug', 'industry-position')->first();
if ($industry) {
    $industry->short_description = "Our commitment to excellence has positioned us as a trusted leader in the global logistics industry.";
    $industry->description = '<p class="iq-about-text" style="font-size: 1.05rem; line-height: 1.8; color: #555555; text-align: justify;">Today, IQRA Transportation Ltd stands as one of the premier logistics providers globally. Our expansive network, combined with our commitment to operational excellence, has earned us the trust of numerous multinational corporations. We are recognized for our robust infrastructure, which includes state-of-the-art warehouses, a modern transport fleet, and advanced IT systems that provide real-time visibility across the supply chain.</p><p class="iq-about-text mt-3" style="font-size: 1.05rem; line-height: 1.8; color: #555555; text-align: justify;">Our strategic partnerships with major shipping lines, airlines, and local transport authorities enable us to offer highly competitive rates and guarantee priority handling of our clients\' cargo. Furthermore, our dedication to continuous improvement ensures that we consistently adopt the latest industry standards and technologies, maintaining our competitive edge and driving sustainable growth.</p>';
    $industry->save();
}

// Our Vision
$vision = Post::where('type', 0)->where('slug', 'our-vision')->first();
if ($vision) {
    $vision->short_description = "We envision a future where logistics is seamless, sustainable, and highly efficient, driving global trade forward.";
    $vision->description = '<p class="iq-about-text" style="font-size: 1.05rem; line-height: 1.8; color: #555555; text-align: justify;">At IQRA Transportation Ltd, our vision is to continuously innovate and set the benchmark for excellence in the logistics sector. We aim to be the most reliable and forward-thinking logistics partner globally, recognized for our ability to overcome complex supply chain challenges.</p><ul class="iq-about-list"><li class="iq-about-item"><strong>Innovation:</strong> Continuously adopting emerging technologies like AI, IoT, and automation to enhance operational efficiency.</li><li class="iq-about-item"><strong>Sustainability:</strong> Committing to eco-friendly practices that reduce our carbon footprint and promote environmental stewardship.</li><li class="iq-about-item"><strong>Customer Success:</strong> Forging long-term partnerships by consistently delivering value and exceeding expectations.</li><li class="iq-about-item"><strong>Global Expansion:</strong> Broadening our network to connect emerging markets with established economies seamlessly.</li></ul>';
    $vision->save();
}

echo "Page content seeded.\n";

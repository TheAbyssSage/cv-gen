<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// ----- Dompdf options -----
$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);

// ----- Data -----
$name          = 'Sage Stockmans';
$address       = 'Bremstraat 24, 3511 Kuringen';
$phone         = '+32 (0)460 94 85 75';
$email         = 'sage.stockmans@pm.me';
$birthDate     = '11/07/2005';
$nationality   = 'Belg / Amerikaan';
$availability  = 'Vrijdag, weekend en vakantie, vanaf 28 juli 2025';
$roleSeeking   = 'Studentenjob';

// Image (optional)
$photoPath = __DIR__ . '/profile.jpg';
$photoSrc  = 'file://' . $photoPath;

$html = '
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CV - ' . htmlspecialchars($name) . '</title>
    <style>
        :root {
            --ink:   #1a1814;
            --dust:  #c8bfad;
            --clay:  #9c7c5e;
            --moss:  #4a5e45;
            --slate: #6b7f8e;
            --storm: #2e3d4f;
            --ochre: #c4893a;
            --petal: #d4a5a0;
            --stone: #e8e2d9;
            --rain:  #8fafc2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 10.5px;
            line-height: 1.45;
            color: var(--ink);
            margin: 0;
            padding: 0;
            background-color: var(--stone);
        }

        .page {
            padding: 18px 28px;
        }

        h1, h2, h3 {
            margin: 0;
            color: var(--ink);
            font-weight: 600;
        }

        h1 {
            font-size: 20px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        h2 {
            font-size: 11px;
            margin-bottom: 4px;
            letter-spacing: 0.20em;
            text-transform: uppercase;
            color: var(--storm);
        }

        h3 {
            font-size: 11px;
        }

        .muted {
            color: var(--slate);
        }

        .tagline {
            font-size: 10px;
            margin-top: 4px;
            color: var(--storm);
        }

        .divider {
            border-top: 1px solid var(--dust);
            margin: 8px 0 12px;
        }

        .layout {
            width: 100%;
        }

        .col-left {
            float: left;
            width: 32%;
            padding-right: 16px;
            border-right: 1px solid rgba(200,191,173,0.7);
            vertical-align: top;
        }

        .col-right {
            float: left;
            width: 64%;
            padding-left: 16px;
            vertical-align: top;
        }

        .page::after {
            content: "";
            display: block;
            clear: both;
        }

        .section {
            margin-bottom: 10px;
        }

        .section-title {
            margin-bottom: 4px;
        }

        .item {
            margin-bottom: 6px;
        }

        .item-header {
            display: block;
            font-weight: 600;
            color: var(--ink);
        }

        .item-sub {
            display: block;
            font-size: 10px;
            color: var(--slate);
        }

        .item-meta {
            display: block;
            font-size: 9px;
            color: var(--storm);
        }

        .pill-row {
            margin-top: 3px;
        }

        .pill {
            display: inline-block;
            padding: 1px 6px;
            margin: 1px 4px 2px 0;
            border-radius: 999px;
            border: 1px solid rgba(155,124,94,0.6);
            font-size: 9px;
            color: var(--storm);
            background-color: rgba(232,226,217,0.9);
        }

        .pill--soft {
            border-color: var(--ochre);
            background-color: rgba(196,137,58,0.08);
            color: var(--storm);
        }

        .list {
            margin: 0;
            padding-left: 12px;
        }

        .list li {
            margin-bottom: 2px;
        }

        .small {
            font-size: 9px;
        }

        .header-row {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .header-photo {
            display: table-cell;
            width: 60px;
            vertical-align: top;
        }

        .header-photo img {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid var(--clay);
        }

        .header-main {
            display: table-cell;
            vertical-align: top;
            padding-left: 10px;
        }

        .section-label {
            font-size: 8px;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: var(--clay);
            margin-bottom: 6px;
        }

        .bottom-note {
            margin-top: 6px;
            font-size: 7px;
            color: var(--slate);
            text-align: right;
        }
    </style>
</head>
<body>

<div class="page">

    <div class="layout">
        <!-- Left column -->
        <div class="col-left">

            <!-- Header -->
            <div class="section">
                <div class="header-row">
                    <!-- Optional photo; uncomment if you want the picture -->
                    <div class="header-main">
                        <h1>' . htmlspecialchars($name) . '</h1>
                        <div class="tagline">
                            Full-stack development student <br> Customer-focused · Quick learner
                        </div>
                        <div class="small muted" style="margin-top: 6px;">
                            ' . htmlspecialchars($address) . '<br>
                            ' . htmlspecialchars($phone) . '<br>
                            ' . htmlspecialchars($email) . '
                        </div>
                        <div class="small muted">
                            Born ' . htmlspecialchars($birthDate) . ' · ' . htmlspecialchars($nationality) . '
                        </div>
                        <!-- <div class="small" style="margin-top: 6px; color: var(--clay);">
                            <strong>I am looking for an internship in front-end and/or back-end development.<br>
                            Period: March 24 to April 21 (total 160 hours).<br>
                            I would greatly appreciate it if you would consider my application.</strong>
                        </div> -->
                        <br>
                    </div>
                </div>
            </div>

            <!-- Hard skills (technical) -->
            <div class="section">
                <div class="section-title">
                    <h2>Hard Skills</h2>
                </div>
                <div class="pill-row">
                    <span class="pill pill--soft">PHP · Laravel</span>
                    <span class="pill pill--soft">JavaScript · TypeScript</span>
                    <span class="pill pill--soft">Angular</span>
                    <span class="pill pill--soft">HTML · CSS</span>
                    <span class="pill pill--soft">MySQL</span>
                    <span class="pill pill--soft">Git · GitHub</span>
                    <span class="pill pill--soft">Docker</span>
                    <span class="pill pill--soft">Linux · macOS</span>
                </div>
            </div>

            <!-- Soft skills (prominent) -->
            <div class="section">
                <div class="section-title">
                    <h2>Soft Skills</h2>
                </div>
                <div class="pill-row">
                    <span class="pill pill--soft">Hardworking</span>
                    <span class="pill pill--soft">Quick learner</span>
                    <span class="pill pill--soft">Flexible</span>
                    <span class="pill pill--soft">Stress-resistant</span>
                    <span class="pill pill--soft">Team player</span>
                    <span class="pill pill--soft">Punctual</span>
                    <span class="pill pill--soft">Customer-oriented</span>
                    <span class="pill pill--soft">Friendly</span>
                    <span class="pill pill--soft">Sociable</span>
                    <span class="pill pill--soft">Responsible</span>
                </div>
            </div>

            <!-- Languages -->
            <div class="section">
                <div class="section-title">
                    <h2>Languages</h2>
                </div>
                <div class="item">
                    <span class="item-header">Dutch</span>
                    <span class="item-meta">Native</span>
                </div>
                <div class="item">
                    <span class="item-header">English</span>
                    <span class="item-meta">Native</span>
                </div>
                <div class="item">
                    <span class="item-header">French</span>
                    <span class="item-meta">A1</span>
                </div>
            </div>

            <!-- Hobbies -->
            <div class="section">
                <div class="section-title">
                    <h2>Hobbies</h2>
                </div>
                <ul class="list small">
                    <li>Archery, basketball, volleyball</li>
                    <li>Hiking, camping, climbing</li>
                    <li>Weightlifting, snowboarding, skiing</li>
                    <li>Music and gaming</li>
                </ul>
            </div>

            <!-- Extra -->
            <div class="section">
                <div class="section-title">
                    <h2>Additional</h2>
                </div>
                <div class="item small">
                    <span class="item-header">Driver’s license with car available</span>
                </div>
            </div>

        </div>

        <!-- Right column -->
        <div class="col-right">

            <!-- About me -->
            <div class="section">
                <div class="section-title">
                    <h2>About me</h2>
                </div>
                <p>
                    Junior web developer specialised in PHP, Laravel, Angular and MySQL. With my artistic background and American-Belgian roots I combine technical insight with creativity. I run a Proxmox homelab with Linux containers, Docker and self-hosted services to sharpen my DevOps skills.
                </p>
            </div>

            <div class="divider"></div>

            <!-- Projects -->
            <div class="section">
                <div class="section-title">
                    <h2>Projects & Homelab</h2>
                </div>

                <div class="item">
                    <span class="item-header">Personal website — sage-stockmans.com</span>
                    <span class="item-meta">Portfolio introducing my background, featured projects and contact details. Built as a clean, fast landing page.</span>
                </div>

                <div class="item">
                    <span class="item-header">GitHub portfolio — github.com/TheAbyssSage</span>
                    <span class="item-meta">Active profile with personal projects and experiments around Laravel, Angular, AI tooling and DevOps workflows.</span>
                </div>

                <div class="item">
                    <span class="item-header">Proxmox homelab</span>
                    <span class="item-meta">Self-hosted lab running Linux containers, virtual machines, networking and self-hosted services; used to test deployment pipelines, Docker stacks and production-like setups.</span>
                </div>

                <div class="item">
                    <span class="item-header">Hermes — AI agent</span>
                    <span class="item-meta">Personal agent that orchestrates tasks, controls tools and automates repetitive workflows, pragmatically integrated into Laravel/Angular stacks.</span>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Work experience -->
            <div class="section">
                <div class="section-title">
                    <h2>Work Experience</h2>
                </div>

                <div class="item">
                    <span class="item-header">Cashier / Student – Brico, Hasselt</span>
                    <span class="item-sub">Aug 2025 – Sep 2025 · student job</span>
                    <span class="item-meta">
                        Stocking shelves, keeping displays tidy, assisting customers in a friendly manner, and operating the cash register in a busy DIY store.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Bartender & Staff – Versus, Hasselt</span>
                    <span class="item-sub">Apr 2025 – Jun 2025 · student job</span>
                    <span class="item-meta">
                        Preparing drinks, taking orders, and serving customers with a smile in a lively club; always trying to resolve issues quickly and politely.
                    </span>
                </div>

                <!-- <div class="item">
                    <span class="item-header">Production Worker – Studio Pieter Stockmans, Genk</span>
                    <span class="item-sub">Jan 2025 · 2 weeks</span>
                    <span class="item-meta">
                        Assisted in making, decorating, and presenting porcelain products.
                    </span>
                </div> -->

                <div class="item">
                    <span class="item-header">Actor / Technician – Old Tucson Company, Arizona (USA)</span>
                    <span class="item-sub">Oct 2022 – Dec 2024</span>
                    <span class="item-meta">
                        Played characters to give visitors an enjoyable experience and operated lights/sound during shows and events.
                    </span>
                </div>

                <!-- <div class="item">
                    <span class="item-header">Seasonal Moving Assistant – Uyttendaele European Moving, Aarschot</span>
                    <span class="item-sub">Summer 2019 · 4 weeks</span>
                    <span class="item-meta">
                        Helped load/unload trucks and carefully and efficiently moved goods as part of a team.
                    </span>
                </div> -->
            </div>

            <div class="divider"></div>

            <!-- Education -->
            <div class="section">
                <div class="section-title">
                    <h2>Education & Courses</h2>
                </div>

                <div class="item">
                    <span class="item-header">Full Stack Developer (Diploma) – SyntraPXL, Hasselt</span>
                    <span class="item-sub">2026 · Graduated</span>
                    <span class="item-meta">OO programming, REST APIs, PHP/Laravel, Node.js, security, Angular/JS, Agile workflows and modern deployment basics.</span>
                </div>

                <div class="item">
                    <span class="item-header">Dutch – KU Leuven, Institute for Living Languages</span>
                    <span class="item-sub">Feb 2025 – Jun 2025</span>
                    <span class="item-meta">Advanced Dutch course focused on professional communication.</span>
                </div>

                <div class="item">
                    <span class="item-header">Marana High School – Arizona, USA</span>
                    <span class="item-sub">2019 – 2022</span>
                    <span class="item-meta">Completed secondary education.</span>
                </div>
            </div>

            <div class="divider"></div>

            <div class="bottom-note">
                This PDF was automatically generated with PHP (Dompdf & HTML/CSS).
            </div>
        </div>
    </div>

</div>

</body>
</html>
';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$outputFile = __DIR__ . '/sage-stockmans-cv-english.pdf';
file_put_contents($outputFile, $dompdf->output());

echo "PDF saved to: $outputFile\n";

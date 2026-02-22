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
            font-size: 11px;
            line-height: 1.5;
            color: var(--ink);
            margin: 0;
            padding: 0;
            background-color: var(--stone);
        }

        .page {
            padding: 26px 32px;
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
            margin: 8px 0 14px;
        }

        .layout {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .col-left,
        .col-right {
            display: table-cell;
            vertical-align: top;
        }

        .col-left {
            width: 35%;
            padding-right: 16px;
            border-right: 1px solid rgba(200,191,173,0.7);
        }

        .col-right {
            width: 65%;
            padding-left: 16px;
        }

        .section {
            margin-bottom: 12px;
        }

        .section-title {
            margin-bottom: 4px;
        }

        .item {
            margin-bottom: 7px;
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
            margin-top: 10px;
            font-size: 8px;
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
                    <!--
                    <div class="header-photo">
                        <img src="' . htmlspecialchars($photoSrc) . '" alt="Profile photo">
                    </div>
                    -->
                    <div class="header-main">
                        <h1>' . htmlspecialchars($name) . '</h1>
                        <div class="tagline">
                            Full‑stack development student <br> Klantgericht · Snel lerend
                        </div>
                        <div class="small muted" style="margin-top: 6px;">
                            ' . htmlspecialchars($address) . '<br>
                            ' . htmlspecialchars($phone) . '<br>
                            ' . htmlspecialchars($email) . '
                        </div>
                        <div class="small muted">
                            Geboren ' . htmlspecialchars($birthDate) . ' · ' . htmlspecialchars($nationality) . '
                        </div>
                        <div class="small" style="margin-top: 6px; color: var(--clay);">
                            <strong>Ik zoek een stage in front-end en back-end. In de periode van 24 maart t.e.m. 21 april (160 uur in totaal)</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hard skills (technical) -->
            <div class="section">
                <div class="section-title">
                    <h2>Hard skills</h2>
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
                    <h2>Soft skills</h2>
                </div>
                <div class="pill-row">
                    <span class="pill pill--soft">Hardwerkend</span>
                    <span class="pill pill--soft">Snel lerend</span>
                    <span class="pill pill--soft">Flexibel</span>
                    <span class="pill pill--soft">Stressbestendig</span>
                    <span class="pill pill--soft">Samenwerken</span>
                    <span class="pill pill--soft">Punctueel</span>
                    <span class="pill pill--soft">Klantgericht</span>
                    <span class="pill pill--soft">Vriendelijk</span>
                    <span class="pill pill--soft">Sociaal</span>
                    <span class="pill pill--soft">Verantwoordelijk</span>
                </div>
            </div>

            <!-- Languages -->
            <div class="section">
                <div class="section-title">
                    <h2>Talen</h2>
                </div>
                <div class="item">
                    <span class="item-header">Nederlands</span>
                    <span class="item-meta">Moedertaal</span>
                </div>
                <div class="item">
                    <span class="item-header">Engels</span>
                    <span class="item-meta">Moedertaal</span>
                </div>
                <div class="item">
                    <span class="item-header">Frans</span>
                    <span class="item-meta">A1</span>
                </div>
            </div>

            <!-- Hobbies -->
            <div class="section">
                <div class="section-title">
                    <h2>Hobby\'s</h2>
                </div>
                <ul class="list small">
                    <li>Boogschieten, basketbal, volleybal</li>
                    <li>Wandelen, kamperen, klimmen</li>
                    <li>Gewichtheffen, snowboarden, skiën</li>
                    <li>Muziek en games</li>
                </ul>
            </div>

            <!-- Extra -->
            <div class="section">
                <div class="section-title">
                    <h2>Extra</h2>
                </div>
                <div class="item small">
                    <span class="item-header">Rijbewijs met auto beschikbaar</span>
                </div>
            </div>

        </div>

        <!-- Right column -->
        <div class="col-right">

            <!-- About me -->
            <div class="section">
                <div class="section-title">
                    <h2>Over mij</h2>
                </div>
                <p>
                    Gemotiveerde en leergierige student met een passie voor technologie en klantgerichte service.
                    Ervaring in diverse sectoren, van retail tot entertainment, met een focus op teamwork,
                    probleemoplossing en het leveren van een positieve ervaring voor klanten. Op zoek naar een
                    studentenjob waar ik mijn vaardigheden kan inzetten, nieuwe dingen kan leren en een
                    waardevolle bijdrage kan leveren.
                </p>
            </div>

            <div class="divider"></div>

            <!-- Work experience -->
            <div class="section">
                <div class="section-title">
                    <h2>Werkervaring</h2>
                </div>

                <div class="item">
                    <span class="item-header">Kassier / student – Brico, Hasselt</span>
                    <span class="item-sub">Aug 2025 – Sep 2025 · studentenjob</span>
                    <span class="item-meta">
                        Rekken aanvullen, displays onderhouden, transacties verwerken en klanten helpen
                        in een drukke doe‑het‑zelfzaak.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Barman &amp; staff – Versus, Hasselt</span>
                    <span class="item-sub">Apr 2025 – Jun 2025 · studentenjob</span>
                    <span class="item-meta">
                        Dranken maken, bestellingen opnemen en betalingen afhandelen in een drukke club;
                        problemen ter plekke oplossen met vriendelijke, efficiënte service.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Productiemedewerker – Studio Pieter Stockmans, Genk</span>
                    <span class="item-sub">Jan 2025 · 2 weken</span>
                    <span class="item-meta">
                        Meegewerkt aan creatie, decoratie en presentatie van porselein.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Acteur / technicus – Old Tucson Company, Arizona (USA)</span>
                    <span class="item-sub">Oct 2022 – Dec 2024</span>
                    <span class="item-meta">
                        In‑world personages gespeeld om locaties tot leven te brengen en licht en geluid bediend
                        voor shows en events.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Seizoensmedewerker verhuizing – Uyttendaele Europese Verhuizingen, Aarschot</span>
                    <span class="item-sub">Zomer 2019 · 4 weken</span>
                    <span class="item-meta">
                        Vrachtwagens laden en lossen, goederen veilig verplaatsen en efficiënt samenwerken
                        in een logistiek team.
                    </span>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Education -->
            <div class="section">
                <div class="section-title">
                    <h2>Opleiding &amp; cursussen</h2>
                </div>

                <div class="item">
                    <span class="item-header">Full Stack Developer (Diploma) – SyntraPXL, Hasselt</span>
                    <span class="item-sub">2025 – 2026 (lopend)</span>
                    <span class="item-meta">
                        OO‑programmeren, REST API\'s, PHP/Laravel, Node.js, security, frontend (Angular/JS)
                        en Agile workflows.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Nederlands – KU Leuven, Instituut voor Levende Talen</span>
                    <span class="item-sub">Feb 2025 – Jun 2025</span>
                    <span class="item-meta">
                        Hogere taalcursus Nederlands met focus op communicatie in professionele context.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Marana High School – Arizona, USA</span>
                    <span class="item-sub">2019 – 2022</span>
                    <span class="item-meta">
                        Secundair onderwijs afgerond.
                    </span>
                </div>
            </div>

            <div class="divider"></div>

            <!-- AI / Extra learning -->
            <!-- <div class="section">
                <div class="section-title">
                    <h2>AI &amp; extra</h2>
                </div>

                <div class="item">
                    <span class="item-header">AI agents – build your own assistant – SyntraPXL</span>
                    <span class="item-sub">2025 · extra module</span>
                    <span class="item-meta">
                        Praktische cursus over AI/agentic workflows, reliability en failure modes.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Responsible AI usage &amp; prompts – zelfstudie &amp; workshops</span>
                    <span class="item-sub">2024 – nu</span>
                    <span class="item-meta">
                        Verantwoord AI gebruik in development: AI inzetten voor ideeën en refactoring,
                        maar altijd zelf reviewen, testen en verantwoordelijkheid nemen.
                    </span>
                </div>
            </div> -->

            <div class="bottom-note">
                Deze pdf is automatisch gegenereerd met PHP (Dompdf &amp; HTML/CSS).
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
$dompdf->stream('sage-stockmans-cv.pdf', [
    'Attachment' => false
]);

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

// Image: make sure profile.jpg exists next to this PHP file
$photoPath = __DIR__ . '/profile.jpg';
$photoSrc  = 'file://' . $photoPath;

$html = '
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CV - ' . htmlspecialchars($name) . '</title>
    <style>
        /* Palette (from Petrichor theme) */
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
            padding: 32px 40px;
        }

        h1, h2, h3 {
            margin: 0;
            color: var(--ink);
            font-weight: 600;
        }

        h1 {
            font-size: 22px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        h2 {
            font-size: 12px;
            margin-bottom: 4px;
            letter-spacing: 0.22em;
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
            margin: 10px 0 18px;
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
            width: 34%;
            padding-right: 18px;
            border-right: 1px solid rgba(200,191,173,0.7);
        }

        .col-right {
            width: 66%;
            padding-left: 18px;
        }

        .section {
            margin-bottom: 16px;
        }

        .section-title {
            margin-bottom: 6px;
        }

        .item {
            margin-bottom: 8px;
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
            margin-top: 4px;
        }

        .pill {
            display: inline-block;
            padding: 1px 6px;
            margin: 1px 4px 1px 0;
            border-radius: 999px;
            border: 1px solid rgba(155,124,94,0.5);
            font-size: 9px;
            color: var(--storm);
            background-color: rgba(232,226,217,0.7);
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
            width: 68px;
            vertical-align: top;
        }

        .header-photo img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid var(--clay);
        }

        .header-main {
            display: table-cell;
            vertical-align: top;
            padding-left: 10px;
        }

        .page-break {
            page-break-before: always;
        }

        .bottom-note {
            margin-top: 24px;
            font-size: 8px;
            color: var(--slate);
            text-align: right;
        }

        .section-label {
            font-size: 8px;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: var(--clay);
            margin-bottom: 6px;
        }
    </style>
</head>
<body>

<!-- PAGE 1: Portfolio-style overview -->
<div class="page">

    <!-- <div class="section-label">Curriculum Vitae</div>
    <div class="divider" style="margin-top: 4px;"></div> -->

    <div class="layout">

        <!-- Left column -->
        <div class="col-left">

            <!-- Header with photo -->
            <div class="section">
                <div class="header-row">
                    <!-- <div class="header-photo">
                        <img src="' . htmlspecialchars($photoSrc) . '" alt="Profile photo">
                    </div> -->
                    <div class="header-main">
                        <h1>' . htmlspecialchars($name) . '</h1>
                        <div class="tagline">
                            Full‑stack development student <br> Klantgericht · Snel Lerend
                        </div>
                        <div class="small muted" style="margin-top: 6px;">
                            ' . htmlspecialchars($address) . ' <br> ' . htmlspecialchars($phone) . ' <br> ' . htmlspecialchars($email) . '
                        </div>
                        <div class="small muted">
                            Geboren ' . htmlspecialchars($birthDate) . ' · ' . htmlspecialchars($nationality) . '
                        </div>
                        <!-- <div class="small" style="margin-top: 6px; color: var(--clay);">
                            <strong>Ik zoek:</strong> ' . htmlspecialchars($roleSeeking) . ' · ' . htmlspecialchars($availability) . '
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Soft skills -->
            <div class="section">
                <div class="section-title">
                    <h2>Soft skills</h2>
                </div>
                <div class="pill-row">
                    <span class="pill">Hardwerkend</span>
                    <span class="pill">Snel lerend</span>
                    <span class="pill">Flexibel</span>
                    <span class="pill">Stressbestendig</span>
                    <span class="pill">Samenwerken</span>
                    <span class="pill">Punctueel</span>
                    <span class="pill">Klantgericht</span>
                    <span class="pill">Vriendelijk</span>
                    <span class="pill">Sociaal</span>
                    <span class="pill">Verantwoordelijk</span>
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
                    <h2>Hobby&apos;s</h2>
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
                    <span class="item-header">Rijbewijs</span>
                </div>
            </div>
        </div>

        <!-- Right column -->
        <div class="col-right">

            <!-- Work experience -->
            <div class="section">
                <div class="section-title">
                    <h2>Werkervaring</h2>
                </div>

                <div class="item">
                    <span class="item-header">Kassier / student – Brico, Hasselt</span>
                    <span class="item-sub">Aug 2025 – Sep 2025 · studentenjob</span>
                    <span class="item-meta">
                        Rekken aanvullen, displays onderhouden, transacties verwerken en klanten helpen in een drukke doe‑het‑zelfzaak.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Barman &amp; staff – Versus, Hasselt</span>
                    <span class="item-sub">Apr 2025 – Jun 2025 · studentenjob</span>
                    <span class="item-meta">
                        Dranken maken, bestellingen opnemen en betalingen afhandelen in een drukke club; problemen ter plekke oplossen met vriendelijke, efficiënte service.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Productiemedewerker – Studio Pieter Stockmans, Genk</span>
                    <span class="item-sub">Jan 2025 · 2 weken</span>
                    <span class="item-meta">
                        Meegewerkt aan creatie, decoratie en presentatie van porselein, van grondstof tot afgewerkt stuk.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Acteur / technicus – Old Tucson Company, Arizona (USA)</span>
                    <span class="item-sub">Oct 2022 – Dec 2024</span>
                    <span class="item-meta">
                        In‑world personages gespeeld om locaties tot leven te brengen en licht en geluid bediend voor shows en events.
                    </span>
                </div>

                <div class="item">
                    <span class="item-header">Seizoensmedewerker verhuizing – Uyttendaele Europese Verhuizingen, Aarschot</span>
                    <span class="item-sub">Zomer 2019 · 4 weken</span>
                    <span class="item-meta">
                        Vrachtwagens laden en lossen, goederen veilig verplaatsen en efficiënt samenwerken in een logistiek team.
                    </span>
                </div>
            </div>

            <div class="divider" style="margin-top: 4px;"></div>

            <!-- Education -->
            <div class="section">
                <div class="section-title">
                    <h2>Opleiding &amp; cursussen</h2>
                </div>

                <div class="item">
                    <span class="item-header">Full Stack Developer (Diploma) – SyntraPXL, Hasselt</span>
                    <span class="item-sub">2025 – 2026 (lopend)</span>
                    <span class="item-meta">
                        OO‑programmeren, REST API&apos;s, PHP/Laravel, Node.js, security, frontend (Angular/JS) en Agile workflows.
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

            <div class="divider" style="margin-top: 4px;"></div>

            <!-- AI / Extra learning -->
            <div class="section">
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
                        Verantwoord AI gebruik in development: AI inzetten voor ideeën en refactoring, maar altijd zelf reviewen, testen en verantwoordelijkheid nemen.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PAGE 2: Compact Dutch student CV -->
<div class="page page-break">

    <div class="section-label">Overzicht</div>
    <div class="divider" style="margin-top: 4px;"></div>

    <h2>Persoonlijke gegevens</h2>
    <p class="small">
        ' . htmlspecialchars($name) . '<br>
        ' . htmlspecialchars($address) . '<br>
        Gsm: ' . htmlspecialchars($phone) . '<br>
        E‑mail: ' . htmlspecialchars($email) . '<br>
        Geboortedatum: ' . htmlspecialchars($birthDate) . '<br>
        Nationaliteit: ' . htmlspecialchars($nationality) . '
    </p>

    <h2>Ik zoek</h2>
    <p class="small">
        Studentenjob<br>
        Wanneer: vrijdag + weekend + vakantie<br>
        Vanaf: 28 juli 2025<br>
        Bereid om in variabel uurrooster te werken, ook avonden, weekends en feestdagen.
    </p>

    <h2>Ervaring</h2>
    <p class="small">
        Brico student, Hasselt – Aug 2025 – Sep 2025<br>
        Barman/Staff, Versus Hasselt – Apr 2025 – Jun 2025<br>
        All round productie, Studio Pieter Stockmans Porselein, Genk – Jan 2025 (2 weken)<br>
        Acteur/medewerker event park, Arizona (USA) – Sep 2022 – Dec 2024<br>
        Uyttendaele Europese Verhuizingen, Aarschot – Zomer 2019 (4 weken)
    </p>

    <h2>Soft skills</h2>
    <p class="small">
        Hardwerkend, snel lerend, flexibel, stressbestendig, samenwerken, punctueel,
        klantgericht, vriendelijk, sociaal, verantwoordelijk.
    </p>

    <h2>Hobby&apos;s</h2>
    <p class="small">
        Boogschieten, basketbal, volleybal, wandelen, kamperen, gewichtheffen, klimmen,
        snowboarden, skiën.
    </p>

    <h2>Talen</h2>
    <p class="small">
        Nederlands (moedertaal)<br>
        Engels (moedertaal)<br>
        Frans (A1)
    </p>

    <h2>Extra</h2>
    <p class="small">
        Rijbewijs
    </p>

    <br><br><br><br><br><br><br><br><br><br><br>

    <div class="bottom-note">
        Deze pdf is automatisch gegenereerd met PHP code (Dompdf &amp; HTML/CSS).
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

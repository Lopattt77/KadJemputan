<?php
// Vercel static deploy: suppress PHP warnings so they don't appear in generated HTML
error_reporting(0);
ini_set('display_errors', '0');
ini_set('log_errors', '0');
@ini_set('html_errors', '0');
/**
 * Kad Jemputan Majlis Perkahwinan
 * Edit variables below for your event — no database required.
 */

// —— Event meta ——
$page_title      = 'Kad Jemputan Majlis Perkahwinan Afif Tarmizi & Nor Izzati';
$event_title     = 'Walimatul Urus';
$invitation_text = 'Dengan penuh rasa syukur dan kegembiraan, kami menjemput anda ke Majlis Walimatul Urus putera/puteri kami';

// —— Maklumat pasangan ——
$groom_name       = 'AFIF TARMIZI BIN ABU YAZID';
$bride_name       = 'NOR IZZATI BINTI KAMAL';

// —— Ibu bapa pengantin lelaki ——
$groom_father     = 'ABU YAZID BIN ABU HUSIN';
$groom_mother     = 'AYU MARINA BINTI SAMSURI';

// —— Ibu bapa pengantin perempuan ——
$bride_father     = 'KAMAL';
$bride_mother     = 'MIDAH';

// —— Baris pembukaan ——
$invite_opening_line  = 'Dengan penuh rasa syukur dan kegembiraan, kami';
$invite_formal_prefix = 'Menjemput ke Majlis Walimatul Urus putera/puteri kami:';

// —— Imej kalligraf salam (kosong = guna teks Arab) ——
$salam_calligraphy_image = '';

// —— Tarikh & masa (ISO 8601 untuk countdown & kalendar) ——
$event_date       = '2026-08-30';
$event_time_start = '09:00';
$event_time_end   = '14:00';

// Paparan Bahasa Melayu
$event_date_display = 'Ahad, 30 Ogos 2026';
$event_time_display = '9:00 pagi – 2:00 petang';

// —— Lokasi ——
$venue_name      = 'Masjid Khadijah';
$address         = 'Masjid Khadijah';

// Pautan peta
$google_maps_url = 'https://www.google.com/maps/search/?api=1&query=Masjid+Khadijah';
$waze_url        = 'https://waze.com/ul?q=' . rawurlencode($address) . '&navigate=yes';
$apple_maps_url  = 'https://maps.apple.com/?q=' . rawurlencode($address);

// —— RSVP (Google Forms — tukar ke pautan sebenar) ——
$rsvp_form_url = '#'; // Gantikan dengan pautan Google Form anda

// —— Audio latar (kosongkan untuk lumpuhkan) ——
$nasheed_audio_url = 'assets/music/MaherZainmp3.mp3';

// —— Pengiraan automatik ——
$timezone_ical   = 'Asia/Kuala_Lumpur';
$event_start_iso = $event_date . 'T' . $event_time_start . ':00+08:00';
$event_end_iso   = $event_date . 'T' . $event_time_end . ':00+08:00';

$malay_days      = ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'];
$event_dt        = new DateTime($event_date);
$cover_day       = $malay_days[(int) $event_dt->format('w')];
$cover_date_line = strtoupper($cover_day) . ' | ' . $event_dt->format('d.m.Y');
$t_start         = DateTime::createFromFormat('H:i', $event_time_start);
$t_end           = DateTime::createFromFormat('H:i', $event_time_end);
$cover_time_line = $t_start && $t_end
    ? $t_start->format('g:i A') . ' – ' . $t_end->format('g:i A')
    : $event_time_display;
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($page_title); ?>">
    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/wedding.css">
</head>
<body class="invitation-body cover-active">

    <!-- Muka depan jemputan -->
    <div id="coverPage" class="cover-page" role="dialog" aria-modal="true" aria-labelledby="coverTitle" aria-describedby="coverDesc">
        <div class="cover-floral-frame" aria-hidden="true">
            <span class="cover-corner cover-corner--tl"></span>
            <span class="cover-corner cover-corner--tr"></span>
            <span class="cover-corner cover-corner--bl"></span>
            <span class="cover-corner cover-corner--br"></span>
        </div>
        <div class="cover-content">
            <p class="cover-bismillah" lang="ar" dir="rtl">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
            <p class="cover-label" id="coverDesc">Jemputan</p>
            <div class="cover-divider" aria-hidden="true">
                <span class="cover-divider-line"></span>
                <span class="cover-divider-ornament">◇</span>
                <span class="cover-divider-line"></span>
            </div>
            <h1 class="cover-title-script" id="coverTitle"><?php echo htmlspecialchars($event_title); ?></h1>
            <div class="cover-divider mt-2" aria-hidden="true">
                <span class="cover-divider-line"></span>
                <span class="cover-divider-ornament">◇</span>
                <span class="cover-divider-line"></span>
            </div>
            <p class="cover-couple-names mt-2 mb-0"><?php echo htmlspecialchars($groom_name); ?></p>
            <p class="cover-couple-dan mb-0">&amp;</p>
            <p class="cover-couple-names mb-2"><?php echo htmlspecialchars($bride_name); ?></p>
            <div class="cover-divider" aria-hidden="true">
                <span class="cover-divider-line"></span>
                <span class="cover-divider-ornament">◇</span>
                <span class="cover-divider-line"></span>
            </div>
            <p class="cover-dateline"><?php echo htmlspecialchars($cover_date_line); ?></p>
            <p class="cover-timeline"><?php echo htmlspecialchars($cover_time_line); ?></p>
            <button type="button" class="btn btn-cover-open" id="btnOpenInvitation">
                Buka Jemputan
            </button>
        </div>
    </div>

    <!-- Latar animasi -->
    <div class="bg-shapes" aria-hidden="true">
        <span class="shape shape-1"></span>
        <span class="shape shape-2"></span>
        <span class="shape shape-3"></span>
        <span class="shape shape-4"></span>
    </div>

    <main id="mainInvitation" class="main-invitation container py-4 py-md-5 min-vh-100 d-flex align-items-center justify-content-center" tabindex="-1" hidden>
        <div class="row justify-content-center w-100">
            <div class="col-12 col-lg-10 col-xl-8">
                <article class="invitation-card card border-0 shadow-lg reveal-on-scroll" data-reveal>
                    <div class="card-body p-4 p-md-5">

                        <header class="invitation-header-hero text-center mb-4 reveal-on-scroll position-relative mx-auto" data-reveal>
                            <span class="invite-floral-accent invite-floral-accent--tl" aria-hidden="true"></span>
                            <span class="invite-floral-accent invite-floral-accent--tr" aria-hidden="true"></span>
                            <span class="invite-floral-accent invite-floral-accent--bl" aria-hidden="true"></span>
                            <span class="invite-floral-accent invite-floral-accent--br" aria-hidden="true"></span>

                            <?php if ($salam_calligraphy_image !== '') : ?>
                            <img
                                class="invite-salam-img img-fluid mx-auto d-block mb-4"
                                src="<?php echo htmlspecialchars($salam_calligraphy_image, ENT_QUOTES, 'UTF-8'); ?>"
                                alt="Assalamualaikum Warahmatullahi Wabarakatuh"
                                width="420" height="120"
                                loading="eager" decoding="async">
                            <?php else : ?>
                            <p class="invite-salam-arabic mb-4 px-2 fs-4" lang="ar" dir="rtl">
                                السَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ
                            </p>
                            <?php endif; ?>

                            <p class="invite-serif invite-opening mb-3 px-1 fade-in-down">
                                <?php echo htmlspecialchars($invite_opening_line); ?>
                            </p>

                            <!-- Ibu bapa pengantin lelaki -->
                            <div class="invite-parents mb-3 fade-in-down delay-1">
                                <div class="mb-1">
                                    <p class="invite-parent-label mb-1">Pengantin Lelaki</p>
                                    <p class="invite-parent-name mb-0"><?php echo htmlspecialchars($groom_father); ?></p>
                                    <p class="invite-parent-name mb-0">dan</p>
                                    <p class="invite-parent-name mb-0"><?php echo htmlspecialchars($groom_mother); ?></p>
                                </div>

                                <div class="d-flex align-items-center justify-content-center gap-3 my-3">
                                    <span class="cover-divider-line" style="max-width: 2rem;"></span>
                                    <span class="invite-ampersand">&amp;</span>
                                    <span class="cover-divider-line" style="max-width: 2rem;"></span>
                                </div>

                                <!-- Ibu bapa pengantin perempuan -->
                                <div>
                                    <p class="invite-parent-label mb-1">Pengantin Perempuan</p>
                                    <p class="invite-parent-name mb-0"><?php echo htmlspecialchars($bride_father); ?></p>
                                    <p class="invite-parent-name mb-0">dan</p>
                                    <p class="invite-parent-name mb-0"><?php echo htmlspecialchars($bride_mother); ?></p>
                                </div>
                            </div>

                            <p class="invite-serif invite-formal mb-3 px-1 fade-in-down delay-2">
                                <?php echo htmlspecialchars($invite_formal_prefix); ?>
                            </p>

                            <!-- Nama pasangan -->
                            <div class="invite-couple fade-in-down delay-2">
                                <p class="invite-groom-name mb-0"><?php echo htmlspecialchars($groom_name); ?></p>
                                <p class="invite-couple-with my-2">
                                    <span class="cover-divider-line d-inline-block" style="max-width:3rem; vertical-align: middle;"></span>
                                    &nbsp;dengan&nbsp;
                                    <span class="cover-divider-line d-inline-block" style="max-width:3rem; vertical-align: middle;"></span>
                                </p>
                                <p class="invite-bride-name mb-0"><?php echo htmlspecialchars($bride_name); ?></p>
                            </div>
                        </header>

                        <hr class="divider my-4 reveal-on-scroll" data-reveal>

                        <!-- Butiran majlis -->
                        <section class="mb-4 reveal-on-scroll" data-reveal>
                            <h2 class="h5 font-display text-center mb-4 section-title">Butiran Majlis</h2>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="detail-tile h-100 p-3 rounded-4 text-center">
                                        <span class="detail-icon d-inline-flex mb-2" aria-hidden="true">📅</span>
                                        <p class="small text-muted mb-1">Tarikh</p>
                                        <p class="fw-semibold mb-0"><?php echo htmlspecialchars($event_date_display); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-tile h-100 p-3 rounded-4 text-center">
                                        <span class="detail-icon d-inline-flex mb-2" aria-hidden="true">🕐</span>
                                        <p class="small text-muted mb-1">Masa</p>
                                        <p class="fw-semibold mb-0"><?php echo htmlspecialchars($event_time_display); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="button"
                                        class="detail-tile h-100 p-3 rounded-4 text-center w-100 d-flex flex-column align-items-center justify-content-center"
                                        title="Ketik untuk buka peta"
                                        style="cursor: pointer; text-align: center;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#mapSelectionModal">
                                        <span class="detail-icon d-inline-flex mb-2" aria-hidden="true">📍</span>
                                        <p class="small text-muted mb-1">Lokasi</p>
                                        <p class="fw-semibold mb-2"><?php echo htmlspecialchars($venue_name); ?></p>
                                        <p class="small text-body mb-3 lh-sm" id="fullAddress" style="font-size: 0.8rem;"><?php echo htmlspecialchars($address); ?></p>
                                        <span class="badge rounded-pill mt-auto py-2 px-3 w-100" style="background: linear-gradient(135deg, var(--peach) 0%, var(--blush-pink) 100%); color: var(--charcoal); font-weight: 600; box-shadow: 0 4px 10px rgba(255, 203, 164, 0.3); font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.05em;">
                                            BUKA PETA <span aria-hidden="true">↗</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </section>

                        <!-- Kira detik -->
                        <section class="countdown-wrap text-center mb-4 p-4 p-md-5 rounded-4 reveal-on-scroll position-relative overflow-hidden" data-reveal
                            id="countdownSection"
                            data-event-datetime="<?php echo htmlspecialchars($event_start_iso); ?>"
                            style="background: linear-gradient(135deg, rgba(255, 245, 228, 0.8) 0%, rgba(250, 218, 221, 0.4) 100%); border: 1px solid rgba(212, 175, 55, 0.2); box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5);">

                            <span class="position-absolute top-0 start-0 translate-middle opacity-25" style="font-size: 6rem; color: var(--gold);">✧</span>
                            <span class="position-absolute bottom-0 end-0 translate-middle-x opacity-25" style="font-size: 5rem; color: var(--peach);">✧</span>

                            <h2 class="h5 font-display text-center mb-4" style="color: var(--gold); letter-spacing: 0.1em;">Menghitung Hari</h2>

                            <div class="countdown d-flex flex-wrap justify-content-center gap-3 gap-md-4 position-relative z-1" id="countdown" role="timer" aria-live="polite">
                                <div class="cd-unit d-flex flex-column align-items-center justify-content-center shadow-sm">
                                    <span class="cd-num" id="cd-days">00</span>
                                    <span class="cd-label">Hari</span>
                                </div>
                                <div class="cd-unit d-flex flex-column align-items-center justify-content-center shadow-sm">
                                    <span class="cd-num" id="cd-hours">00</span>
                                    <span class="cd-label">Jam</span>
                                </div>
                                <div class="cd-unit d-flex flex-column align-items-center justify-content-center shadow-sm">
                                    <span class="cd-num" id="cd-mins">00</span>
                                    <span class="cd-label">Minit</span>
                                </div>
                                <div class="cd-unit d-flex flex-column align-items-center justify-content-center shadow-sm">
                                    <span class="cd-num" id="cd-secs">00</span>
                                    <span class="cd-label">Saat</span>
                                </div>
                            </div>
                            <p class="small mt-4 mb-0 d-none font-display fst-italic" id="countdownDone" style="color: var(--sage-dark); font-size: 1.1rem;">Alhamdulillah — majlis telah bermula.</p>
                        </section>

                        <!-- RSVP -->
                        <section class="mb-4 reveal-on-scroll" data-reveal aria-label="RSVP">
                            <div class="rounded-4 p-4 text-center shadow-sm border"
                                style="background: rgba(255, 255, 255, 0.92); border-color: rgba(212, 175, 55, 0.25) !important;">
                                <h2 class="h5 font-display mb-2" style="color: var(--gold); letter-spacing: 0.06em;">RSVP</h2>
                                <p class="small text-muted mb-3 mb-md-4">
                                    Sila isi borang untuk mengesahkan kehadiran anda ke majlis ini.
                                </p>
                                <a class="btn btn-primary btn-pill px-4"
                                    href="<?php echo htmlspecialchars($rsvp_form_url, ENT_QUOTES, 'UTF-8'); ?>"
                                    target="_blank"
                                    rel="noopener noreferrer">
                                    Buka borang RSVP (Google Form)
                                </a>
                            </div>
                        </section>

                        <!-- Tambah ke kalendar -->
                        <section class="d-flex flex-column flex-sm-row flex-wrap gap-2 justify-content-center align-items-stretch reveal-on-scroll" data-reveal>
                            <a class="btn btn-accent btn-pill px-4"
                               id="btnAddCalendar"
                               href="#"
                               data-cal-title="<?php echo htmlspecialchars($event_title, ENT_QUOTES, 'UTF-8'); ?>"
                               data-cal-start="<?php echo htmlspecialchars($event_start_iso); ?>"
                               data-cal-end="<?php echo htmlspecialchars($event_end_iso); ?>"
                               data-cal-location="<?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?>"
                               data-cal-details="<?php echo htmlspecialchars($invitation_text, ENT_QUOTES, 'UTF-8'); ?>">
                                Tambah ke Kalendar
                            </a>
                        </section>

                        <?php if (!empty($nasheed_audio_url)) : ?>
                        <div class="text-center mt-4 pt-3 border-top reveal-on-scroll" data-reveal>
                            <p class="small text-muted mb-2">Background Music</p>
                            <button type="button" class="btn btn-sm btn-outline-accent btn-pill" id="btnAudioToggle" aria-pressed="false">
                                <span id="audioIcon">▶</span> Play / Pause
                            </button>
                            <audio id="bgAudio" loop preload="metadata" src="<?php echo htmlspecialchars($nasheed_audio_url); ?>"></audio>
                        </div>
                        <?php endif; ?>

                        <footer class="text-center mt-4 pt-3 small text-muted reveal-on-scroll" data-reveal>
                            <p class="mb-0 font-display fst-italic">Barakallahu lakuma wa baraka 'alaykuma wa jama'a baynakuma fi khair</p>
                        </footer>

                    </div>
                </article>
            </div>
        </div>
    </main>

    <!-- Modal Pilihan Peta -->
    <div class="modal fade" id="mapSelectionModal" tabindex="-1" aria-labelledby="mapSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 rounded-4 shadow-lg" style="background: var(--cream); overflow: hidden;">
                <div class="modal-header border-0 pb-0 position-relative">
                    <h5 class="modal-title font-display fw-bold text-center w-100 mt-2" id="mapSelectionModalLabel" style="color: var(--gold);">Buka Peta</h5>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body p-4 pt-3">
                    <div class="d-grid gap-3">
                        <a href="<?php echo htmlspecialchars($waze_url); ?>" target="_blank" rel="noopener noreferrer"
                            class="btn btn-pill d-flex align-items-center justify-content-center gap-2"
                            style="background: #fff; border: 1px solid rgba(212, 175, 55, 0.3); color: var(--charcoal); box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-weight: 600;">
                            <img src="assets/images/wazeicon.png" alt="Waze" width="22" height="22" style="object-fit: contain;" loading="lazy" decoding="async"> Waze
                        </a>
                        <a href="<?php echo htmlspecialchars($google_maps_url); ?>" target="_blank" rel="noopener noreferrer"
                            class="btn btn-pill d-flex align-items-center justify-content-center gap-2"
                            style="background: #fff; border: 1px solid rgba(212, 175, 55, 0.3); color: var(--charcoal); box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-weight: 600;">
                            <img src="assets/images/gmapicon.png" alt="Google Maps" width="22" height="22" style="object-fit: contain;" loading="lazy" decoding="async"> Google Maps
                        </a>
                        <a href="<?php echo htmlspecialchars($apple_maps_url); ?>" target="_blank" rel="noopener noreferrer"
                            class="btn btn-pill d-flex align-items-center justify-content-center gap-2"
                            style="background: #fff; border: 1px solid rgba(212, 175, 55, 0.3); color: var(--charcoal); box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-weight: 600;">
                            <img src="assets/images/applemapicon.png" alt="Apple Maps" width="22" height="22" style="object-fit: contain;" loading="lazy" decoding="async"> Apple Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer copyright -->
    <footer class="page-footer" aria-label="Copyright">
        © <?php echo htmlspecialchars(date('Y')); ?> Afif Tarmizi & Nor Izzati
    </footer>

    <!-- Data untuk JavaScript -->
    <script>
        window.AQIQA_EVENT = {
            googleMapsUrl: <?php echo json_encode($google_maps_url, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>,
            wazeUrl: <?php echo json_encode($waze_url, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>,
            address: <?php echo json_encode($address, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>,
            hasAudio: <?php echo !empty($nasheed_audio_url) ? 'true' : 'false'; ?>
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <noscript>
        <style>#coverPage{display:none!important}#mainInvitation{display:block!important}[hidden]#mainInvitation{display:block!important}</style>
    </noscript>
</body>
</html>

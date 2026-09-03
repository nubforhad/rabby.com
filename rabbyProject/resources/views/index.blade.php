<!DOCTYPE html>

<html lang="bn">

<head>

 
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Rabby NET — We Believe In Quality</title>

<!-- Bootstrap -->
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
    rel="stylesheet"
>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">

<link
    href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600&family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap"
    rel="stylesheet"
>

<!-- Icons -->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
>

<style>

    :root {
        --bg-0: #080b12;
        --bg-1: #0e131d;
        --card: #121826;
        --card-hover: #171f30;
        --line: rgba(255,255,255,.07);
        --ink: #eef1f7;
        --ink-dim: #8993a8;
        --ink-faint: #5b6478;
        --fiber-red: #ff3b4e;
        --fiber-blue: #2e6bff;
        --fiber-cyan: #28e0d6;
        --glow: 0 0 0 1px rgba(255,59,78,.15),
                0 8px 30px rgba(0,0,0,.45);
        --radius: 16px;
    }

    [data-theme="light"] {
        --bg-0: #f4f6fb;
        --bg-1: #ffffff;
        --card: #ffffff;
        --card-hover: #f7f9ff;
        --line: rgba(20,25,40,.08);
        --ink: #131722;
        --ink-dim: #5a6478;
        --ink-faint: #8a93a8;
        --glow: 0 0 0 1px rgba(20,25,40,.06),
                0 8px 24px rgba(20,25,40,.08);
    }

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        background:
            radial-gradient(
                1100px 500px at 12% -10%,
                rgba(46,107,255,.12),
                transparent 60%
            ),
            radial-gradient(
                900px 500px at 100% 0%,
                rgba(255,59,78,.10),
                transparent 55%
            ),
            var(--bg-0);

        color: var(--ink);

        font-family:
            'Inter',
            'Noto Sans Bengali',
            sans-serif;

        min-height: 100vh;

        transition:
            background .4s ease,
            color .4s ease;
    }

    .bangla {
        font-family:
            'Noto Sans Bengali',
            'Inter',
            sans-serif;
    }

    .display {
        font-family:
            'Sora',
            'Noto Sans Bengali',
            sans-serif;
    }

    /* ========================================
       FIBER LINE
    ======================================== */

    .fiber-line {
        position: relative;

        height: 3px;
        width: 100%;

        border-radius: 99px;

        overflow: hidden;

        background: linear-gradient(
            90deg,
            transparent,
            var(--line),
            transparent
        );
    }

    .fiber-line::after {
        content: "";

        position: absolute;
        inset: 0;

        width: 40%;

        background: linear-gradient(
            90deg,
            transparent,
            var(--fiber-cyan),
            var(--fiber-blue),
            var(--fiber-red),
            transparent
        );

        filter: blur(.4px);

        animation:
            pulse-travel 3.4s linear infinite;
    }

    @keyframes pulse-travel {

        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(350%);
        }

    }

    @media (prefers-reduced-motion: reduce) {

        .fiber-line::after {
            animation: none;

            left: 0;

            width: 100%;
        }

    }

    /* ========================================
       NAVBAR
    ======================================== */

    .navbar-wrap {

        border-bottom:
            1px solid var(--line);

        background:
            color-mix(
                in srgb,
                var(--bg-1) 82%,
                transparent
            );

        backdrop-filter: blur(14px);

        position: sticky;

        top: 0;

        z-index: 50;
    }

    .brand-mark {

        display: flex;

        align-items: center;
    }

    .brand-logo {

        width: 180px;

        height: 60px;

        object-fit: contain;

        display: block;
    }

    @media (max-width: 768px) {

        .brand-mark {

            width: 100%;

            justify-content: center;
        }

        .brand-logo {

            width: 160px;

            height: 55px;
        }

    }

    .brand-badge {

        width: 44px;

        height: 44px;

        border-radius: 12px;

        background:
            linear-gradient(
                145deg,
                var(--fiber-red),
                #9c1729
            );

        display: flex;

        align-items: center;

        justify-content: center;

        font-family:
            'Sora',
            sans-serif;

        font-weight: 800;

        color: #fff;

        font-size: 1.15rem;

        box-shadow:
            0 6px 18px
            rgba(255,59,78,.35);

        position: relative;
    }

    .brand-badge::after {

        content: "";

        position: absolute;

        inset: -1px;

        border-radius: 13px;

        border:
            1px solid
            rgba(255,255,255,.25);
    }

    .brand-name {

        font-family:
            'Sora',
            sans-serif;

        font-weight: 800;

        font-size: 1.28rem;

        letter-spacing: .3px;

        line-height: 1;
    }

    .brand-name span {

        color:
            var(--fiber-red);
    }

    .brand-tag {

        font-size: .65rem;

        letter-spacing: 2.2px;

        color:
            var(--ink-faint);

        text-transform: uppercase;

        font-weight: 600;
    }

    .nav-links a {

        color:
            var(--ink-dim);

        text-decoration: none;

        font-size: .9rem;

        font-weight: 500;

        display: flex;

        align-items: center;

        gap: .45rem;

        padding: .4rem .2rem;

        transition:
            color .2s ease;
    }

    .nav-links a:hover {

        color:
            var(--ink);
    }

    .nav-links i {

        color:
            var(--fiber-red);

        font-size: .95rem;
    }

    @media (max-width: 768px) {

        .nav-links {

            width: 100%;

            justify-content: center;

            gap: 1rem !important;
        }

        .nav-links a {

            font-size: .8rem;
        }

    }

    .theme-toggle {

        width: 38px;

        height: 38px;

        border-radius: 50%;

        border:
            1px solid var(--line);

        background:
            var(--card);

        display: flex;

        align-items: center;

        justify-content: center;

        color:
            var(--ink-dim);

        cursor: pointer;

        transition: all .2s ease;
    }

    .theme-toggle:hover {

        color:
            var(--fiber-red);

        border-color:
            var(--fiber-red);
    }

    /* ========================================
       NOTICE
    ======================================== */

    .notice-bar {

        border-left:
            3px solid var(--fiber-red);

        background:
            linear-gradient(
                90deg,
                rgba(255,59,78,.09),
                rgba(255,59,78,0) 40%
            );

        border-radius:
            0 10px 10px 0;

        overflow: hidden;

        position: relative;
    }

    .marquee-track {

        display: flex;

        gap: 3.5rem;

        white-space: nowrap;

        animation:
            scroll-left 32s linear infinite;

        padding: .85rem 0;
    }

    .notice-bar:hover .marquee-track {

        animation-play-state: paused;
    }

    @keyframes scroll-left {

        0% {

            transform:
                translateX(0);
        }

        100% {

            transform:
                translateX(-50%);
        }

    }

    .notice-bar .lead-tag {

        color:
            var(--fiber-red);

        font-weight: 700;
    }

    .notice-bar .sub-tag {

        color:
            #ffb347;

        font-weight: 700;
    }

    /* ========================================
       SEARCH
    ======================================== */

    .search-shell {

        background:
            var(--card);

        border:
            1px solid var(--line);

        border-radius: 14px;

        padding:
            .2rem .4rem;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .search-shell:focus-within {

        border-color:
            var(--fiber-red);

        box-shadow:
            0 0 0 4px
            rgba(255,59,78,.12);
    }

    .search-shell input {

        background:
            transparent;

        border: none;

        color:
            var(--ink);

        font-size: .95rem;

        padding:
            .7rem .5rem;

        width: 100%;
    }

    .search-shell input:focus {

        outline: none;

        box-shadow: none;
    }

    .search-shell input::placeholder {

        color:
            var(--ink-faint);
    }

    .search-shell i {

        color:
            var(--ink-faint);

        padding-left: .6rem;
    }

    /* ========================================
       SECTION HEAD
    ======================================== */

    .service-section {

        margin-top: 2.6rem;
    }

    .sec-head {

        display: flex;

        align-items: center;

        gap: .85rem;

        margin:
            0 0 1.3rem;
    }

    .sec-tick {

        width: 22px;

        height: 4px;

        border-radius: 99px;

        background:
            linear-gradient(
                90deg,
                var(--fiber-red),
                var(--fiber-blue)
            );

        flex-shrink: 0;
    }

    .sec-title {

        font-family:
            'Sora',
            sans-serif;

        font-weight: 700;

        font-size: 1.15rem;

        letter-spacing: .5px;

        text-transform: uppercase;

        margin: 0;
    }

    .badge-new {

        font-size: .6rem;

        font-weight: 800;

        letter-spacing: .5px;

        background:
            linear-gradient(
                120deg,
                var(--fiber-red),
                #ff7a4d
            );

        color: #fff;

        padding:
            .22rem .55rem;

        border-radius: 99px;
    }

    .sec-count {

        margin-left: auto;

        color:
            var(--ink-faint);

        font-size: .8rem;

        font-weight: 600;

        background:
            var(--card);

        border:
            1px solid var(--line);

        padding:
            .15rem .65rem;

        border-radius: 99px;
    }

    /* ========================================
       LINK CARDS
    ======================================== */

    .link-card {

        background:
            var(--card);

        border:
            1px solid var(--line);

        border-radius:
            var(--radius);

        padding:
            1.5rem 1.1rem;

        text-align: center;

        text-decoration: none;

        color:
            var(--ink);

        display: flex;

        align-items: center;

        justify-content: center;

        flex-direction: column;

        width: 100%;

        height: 100%;

        min-height: 125px;

        position: relative;

        overflow: hidden;

        transition:
            transform .28s
            cubic-bezier(.2,.8,.2,1),
            border-color .28s ease,
            box-shadow .28s ease,
            background .28s ease;
    }

    .link-card::before {

        content: "";

        position: absolute;

        inset: 0;

        background:
            radial-gradient(
                120px 80px at 50% 0%,
                rgba(255,59,78,.12),
                transparent 70%
            );

        opacity: 0;

        transition:
            opacity .3s ease;
    }

    .link-card:hover {

        transform:
            translateY(-5px);

        border-color:
            rgba(255,59,78,.4);

        box-shadow:
            var(--glow);

        background:
            var(--card-hover);

        color:
            var(--ink);
    }

    .link-card:hover::before {

        opacity: 1;
    }

    .link-card:hover .card-icon {

        transform:
            scale(1.08)
            rotate(-4deg);

        box-shadow:
            0 8px 22px
            rgba(255,59,78,.32);
    }

    .card-icon {

        width: 52px;

        height: 52px;

        border-radius: 13px;

        margin:
            0 auto .9rem;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 1.25rem;

        background:
            linear-gradient(
                155deg,
                rgba(255,59,78,.16),
                rgba(46,107,255,.10)
            );

        border:
            1px solid
            rgba(255,59,78,.18);

        color:
            var(--fiber-red);

        transition:
            transform .28s ease,
            box-shadow .28s ease;
    }

    .card-title {

        font-weight: 600;

        font-size: .95rem;

        letter-spacing: .2px;

        position: relative;

        z-index: 1;
    }

    .card-pill {

        position: absolute;

        top: .6rem;

        right: .6rem;

        font-size: .55rem;

        font-weight: 800;

        letter-spacing: .4px;

        padding:
            .15rem .45rem;

        border-radius: 99px;

        background:
            linear-gradient(
                120deg,
                var(--fiber-red),
                #ff7a4d
            );

        color: #fff;
    }

    /* ========================================
       CARD ANIMATION
    ======================================== */

    .link-card {

        opacity: 0;

        animation:
            rise .5s ease forwards;
    }

    @keyframes rise {

        from {

            opacity: 0;

            transform:
                translateY(10px);
        }

        to {

            opacity: 1;

            transform:
                translateY(0);
        }

    }

    /* ========================================
       FLOATING WHATSAPP
    ======================================== */

    .float-call {

        position: fixed;

        right: 1.6rem;

        bottom: 1.8rem;

        z-index: 60;

        width: 58px;

        height: 58px;

        border-radius: 50%;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #fff;

        font-size: 1.5rem;

        text-decoration: none;

        transition:
            transform .25s ease,
            box-shadow .25s ease;

        background:
            linear-gradient(
                150deg,
                #25D366,
                #128C7E
            );

        box-shadow:
            0 10px 30px
            rgba(37,211,102,.40);
    }

    .float-call::after {

        content: "";

        position: absolute;

        inset: 0;

        border-radius: 50%;

        border:
            2px solid #25D366;

        animation:
            whatsapp-ring 2.2s ease-out infinite;
    }

    .float-call:hover {

        color: #fff;

        transform:
            scale(1.08);

        box-shadow:
            0 12px 35px
            rgba(37,211,102,.55);
    }

    @keyframes whatsapp-ring {

        0% {

            transform:
                scale(1);

            opacity: .7;
        }

        100% {

            transform:
                scale(1.9);

            opacity: 0;
        }

    }

    /* ========================================
       NO RESULTS
    ======================================== */

    .no-results {

        display: none;

        text-align: center;

        color:
            var(--ink-faint);

        padding:
            2.5rem 0;
    }

    /* ========================================
       FOOTER
    ======================================== */

    footer {

        border-top:
            1px solid var(--line);

        margin-top:
            4rem;

        padding:
            3rem 0 2rem;

        text-align: center;
    }

    footer .foot-brand {

        width: 100%;

        display: flex;

        justify-content: center;

        align-items: center;

        text-align: center;
    }

    footer .foot-brand .brand-logo {

        width: 180px;

        height: 60px;

        object-fit: contain;

        display: block;

        margin: 0 auto;
    }

    footer .foot-line {

        color:
            var(--ink-dim);

        font-size: .9rem;

        margin-top: .3rem;
    }

    footer .foot-phone {

        display: inline-flex;

        align-items: center;

        gap: .5rem;

        color:
            var(--ink);

        font-weight: 600;

        margin-top: .9rem;

        font-size: .95rem;
    }

    footer .foot-phone i {

        color:
            var(--fiber-red);
    }

    footer .copyright {

        color:
            var(--ink-faint);

        font-size: .75rem;

        margin-top: 1.6rem;

        letter-spacing: .3px;
    }

</style>

</head>

<body>

<!-- ==========================================
     NAVBAR
========================================== -->

<div class="navbar-wrap">

<div class="container py-3 d-flex align-items-center justify-content-between flex-wrap gap-3">


    <!-- LOGO -->

    <div class="brand-mark">

        @if($settings?->logo)

            <img
                src="{{ asset('storage/' . $settings->logo) }}"
                alt="Logo"
                class="brand-logo mx-auto"
            >

        @endif

    </div>


    <!-- NAV LINKS -->

    <div class="d-flex align-items-center gap-4 nav-links">


        <!-- FACEBOOK -->

        @if($settings?->fb_link)

            <a
                href="{{ $settings->fb_link }}"
                target="_blank"
                rel="noopener noreferrer"
            >

                <i class="fa-brands fa-facebook"></i>

                Facebook

            </a>

        @endif


        <!-- EMAIL -->

        @if($settings?->email)

            <a
                href="mailto:{{ $settings->email }}"
            >

                <i class="fa-solid fa-envelope"></i>

                Email

            </a>

        @endif


        <!-- WEBSITE -->

        @if($settings?->website_link)

            <a
                href="{{ $settings->website_link }}"
                target="_blank"
                rel="noopener noreferrer"
            >

                <i class="fa-solid fa-globe"></i>

                Website

            </a>

        @endif


    </div>


    <!-- THEME -->

    <button
        class="theme-toggle"
        id="themeToggle"
        aria-label="Toggle theme"
        type="button"
    >

        <i
            class="fa-solid fa-moon"
            id="themeIcon"
        ></i>

    </button>


</div>


<div class="fiber-line"></div>
 

</div>

<!-- ==========================================
     MAIN
========================================== -->

<div class="container pb-5">

 
<!-- ======================================
     NOTICE
======================================= -->

<div class="notice-bar mt-4 mb-4">

    <div class="marquee-track bangla px-3">


        <span>

            <span class="lead-tag">

                {{ $settings?->headline }}

            </span>

        </span>


        <span aria-hidden="true">

            <span class="lead-tag">

                {{ $settings?->headline }}

            </span>

        </span>


    </div>

</div>


<!-- ======================================
     SEARCH
======================================= -->

<div class="search-shell d-flex align-items-center mb-2">

    <i class="fa-solid fa-magnifying-glass"></i>

    <input
        type="text"
        id="linkSearch"
        placeholder="Search links..."
        autocomplete="off"
    >

</div>


<!-- ======================================
     DYNAMIC CATEGORIES + SERVICES
======================================= -->

<div id="serviceSections">


    @foreach($categories as $category)


        @if($category->services->count() > 0)


            <section
                class="service-section"
                data-category="{{ strtolower($category->title) }}"
            >


                <!-- SECTION HEADER -->

                <div class="sec-head">


                    <span class="sec-tick"></span>


                    <h2 class="sec-title">

                        {{ $category->title }}

                    </h2>


                    {{-- NEW badge --}}

                    @if($loop->first)

                        <span class="badge-new">

                            NEW

                        </span>

                    @endif


                    <span class="sec-count">

                        {{ $category->services->count() }}

                    </span>


                </div>


                <!-- SERVICES -->

                <div
                    class="row service-grid"
                    style="display:flex; flex-wrap:wrap; margin:-7px;"
                >


                    @foreach($category->services as $service)


                        <div
                            class="col-6 col-md-4 col-lg-2 service-item"
                            style="padding:7px;"
                        >


                            <a
                                class="link-card"
                                data-name="{{ strtolower($service->title) }}"
                                href="{{ $service->link }}"
                                @if($service->link)
                                    target="_blank"
                                    rel="noopener noreferrer"
                                @endif
                            >


                                <!-- SERVICE ICON -->

                               <div class="card-icon">
                                    @if($service->icon)
                                        @php
                                            $iconValue = $service->icon;

                                            $isImage = preg_match(
                                                '/\.(jpg|jpeg|png|webp|gif)$/i',
                                                $iconValue
                                            );
                                        @endphp

                                        @if($isImage)
                                            <img
                                                src="{{ asset('storage/' . $iconValue) }}"
                                                alt="{{ $service->title }}"
                                                style="width:100%; height:100%; object-fit:contain; border-radius:12px;"
                                            >
                                        @else
                                            <i class="{{ $iconValue }}"></i>
                                        @endif

                                    @else
                                        <i class="fa-solid fa-link"></i>
                                    @endif

                                </div>


                                <!-- SERVICE TITLE -->

                                <div class="card-title">

                                    {{ $service->title }}

                                </div>


                            </a>


                        </div>


                    @endforeach


                </div>


            </section>


        @endif


    @endforeach


</div>


<!-- ======================================
     NO RESULTS
======================================= -->

<div
    class="no-results"
    id="noResults"
>

    <i
        class="fa-solid fa-magnifying-glass mb-2 d-block fs-3"
    ></i>

    Not Found

</div>


</div>

<!-- ==========================================
     FLOATING WHATSAPP
========================================== -->

@if($settings?->mobile)


@php

    /*
     * Remove spaces, +, -, brackets etc.
     */

    $whatsappNumber = preg_replace(
        '/[^0-9]/',
        '',
        $settings->mobile
    );


    /*
     * Bangladesh number:
     *
     * 01712345678
     *
     * becomes:
     *
     * 8801712345678
     */

    if (str_starts_with($whatsappNumber, '0')) {

        $whatsappNumber =
            '88' . $whatsappNumber;

    }

@endphp


<a
    href="https://wa.me/8801518418005"
    class="float-call"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="WhatsApp"
    title="Chat on WhatsApp"
>

    <i
        class="fa-brands fa-whatsapp"
    ></i>

</a>


@endif

<!-- ==========================================
     FOOTER
========================================== -->

<footer>

<span class="sec-tick d-inline-block mb-3"></span>


<!-- FOOTER LOGO -->

<div class="foot-brand">


    @if($settings?->logo)

        <img
            src="{{ asset('storage/' . $settings->logo) }}"
            alt="Logo"
            class="brand-logo"
        >

    @endif


</div>


<!-- ADDRESS -->

@if($settings?->address)

    <div class="foot-line bangla">

        {{ $settings->address }}

    </div>

@endif


<!-- MOBILE -->

@if($settings?->mobile)

    <div class="foot-phone">

        <i
            class="fa-solid fa-phone"
        ></i>

        {{ $settings->mobile }}

    </div>

@endif


<!-- COPYRIGHT -->

@if($settings?->footer_text)

    <div class="copyright">

        {{ $settings->footer_text }}

    </div>

@endif


</footer>

<style>
    /* =========================================================
   WELCOME WEBSITE POPUP
========================================================= */

.welcome-popup {
    position: fixed;
    inset: 0;
    z-index: 999999;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 20px;

    background: rgba(0, 0, 0, 0.72);
    backdrop-filter: blur(6px);

    opacity: 1;
    visibility: visible;

    transition: all 0.3s ease;
}

.welcome-popup.hide {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

.welcome-popup-box {
    position: relative;

    width: 100%;
    max-width: 480px;

    background: #ffffff;

    border-radius: 20px;

    padding: 35px 30px 30px;

    text-align: center;

    box-shadow:
        0 25px 70px rgba(0, 0, 0, 0.30);

    animation: popupShow 0.35s ease;
}

@keyframes popupShow {

    from {
        opacity: 0;
        transform: translateY(30px) scale(0.92);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

}


/* Close X */

.welcome-popup-close {

    position: absolute;

    top: 12px;
    right: 12px;

    width: 38px;
    height: 38px;

    border: none;

    border-radius: 50%;

    background: #f1f5f9;

    color: #475569;

    font-size: 17px;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: all 0.2s ease;
}

.welcome-popup-close:hover {

    background: #fee2e2;

    color: #dc2626;

    transform: rotate(90deg);
}


/* Icon */

.welcome-popup-icon {

    width: 70px;
    height: 70px;

    margin: 0 auto 20px;

    border-radius: 50%;

    background: #eff6ff;

    color: #2563eb;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 30px;
}


/* Title */

.welcome-popup-title {

    margin: 0 0 12px;

    font-size: 23px;

    font-weight: 700;

    color: #0f172a;
}


/* Message */

.welcome-popup-message {

    margin: 0 auto 25px;

    max-width: 390px;

    font-size: 15px;

    line-height: 1.7;

    color: #64748b;
}


/* Buttons */

.welcome-popup-buttons {

    display: flex;

    justify-content: center;

    gap: 12px;
}


/* Cancel */

.welcome-popup-cancel {

    min-width: 125px;

    padding: 11px 20px;

    border: none;

    border-radius: 10px;

    background: #f1f5f9;

    color: #334155;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: all 0.2s ease;
}

.welcome-popup-cancel:hover {

    background: #e2e8f0;

}


/* Website */

.welcome-popup-website {

    min-width: 150px;

    padding: 11px 20px;

    border: none;

    border-radius: 10px;

    background: #2563eb;

    color: #ffffff;

    font-size: 14px;

    font-weight: 600;

    text-decoration: none;

    cursor: pointer;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    transition: all 0.2s ease;
}

.welcome-popup-website:hover {

    background: #1d4ed8;

    color: #ffffff;

    transform: translateY(-1px);

}


/* Mobile */

@media (max-width: 480px) {

    .welcome-popup-box {

        padding: 32px 20px 24px;

        border-radius: 17px;
    }

    .welcome-popup-title {

        font-size: 20px;
    }

    .welcome-popup-message {

        font-size: 14px;
    }

    .welcome-popup-buttons {

        flex-direction: column;
    }

    .welcome-popup-cancel,
    .welcome-popup-website {

        width: 100%;
    }

}
</style>

<!-- =========================================================
     WELCOME POPUP
========================================================= -->

<div id="welcomePopup" class="welcome-popup">

    <div class="welcome-popup-box">

        <!-- X Button -->
        <button
            type="button"
            class="welcome-popup-close"
            id="welcomePopupClose"
            aria-label="Close"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>


        <!-- Icon -->
        <div class="welcome-popup-icon">
            <i class="fa-solid fa-globe"></i>
        </div>
        <!-- Title -->
        <h2 class="welcome-popup-title">
          {{ $notic->title }}
        </h2>


        <!-- Message -->
        {{-- <p class="welcome-popup-message">
            Welcome to our website.
            Please visit our official website for more
            information about our services.
        </p> --}}


        <!-- Buttons -->
        <div class="welcome-popup-buttons">

            <!-- Cancel -->
            <button
                type="button"
                class="welcome-popup-cancel"
                id="welcomePopupCancel"
            >
                Cancel
            </button>


            <!-- Website -->
            <a
                href="{{ $settings?->website_link ?: '#' }}"
                target="_blank"
                rel="noopener noreferrer"
                class="welcome-popup-website"
            >
                Visit Website
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>

        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const popup = document.getElementById('welcomePopup');

    const closeButton = document.getElementById('welcomePopupClose');

    const cancelButton = document.getElementById('welcomePopupCancel');


    /*
    |--------------------------------------------------------------------------
    | Close Popup
    |--------------------------------------------------------------------------
    */

    function closeWelcomePopup() {

        popup.classList.add('hide');

    }


    /*
    |--------------------------------------------------------------------------
    | X Button
    |--------------------------------------------------------------------------
    */

    closeButton.addEventListener('click', function () {

        closeWelcomePopup();

    });


    /*
    |--------------------------------------------------------------------------
    | Cancel Button
    |--------------------------------------------------------------------------
    */

    cancelButton.addEventListener('click', function () {

        closeWelcomePopup();

    });


    /*
    |--------------------------------------------------------------------------
    | Click Outside Popup
    |--------------------------------------------------------------------------
    */

    popup.addEventListener('click', function (event) {

        if (event.target === popup) {

            closeWelcomePopup();

        }

    });


    /*
    |--------------------------------------------------------------------------
    | ESC Button
    |--------------------------------------------------------------------------
    */

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeWelcomePopup();
        }
    });

});
</script>


<!-- ==========================================
     JAVASCRIPT
========================================== -->

<script>


    /* =========================================
       THEME TOGGLE
    ========================================= */


    const themeToggle =
        document.getElementById(
            'themeToggle'
        );


    const themeIcon =
        document.getElementById(
            'themeIcon'
        );


    const root =
        document.documentElement;


    function applyTheme(theme) {


        if (theme === 'light') {


            root.setAttribute(
                'data-theme',
                'light'
            );


            themeIcon.className =
                'fa-solid fa-sun';


        } else {


            root.removeAttribute(
                'data-theme'
            );


            themeIcon.className =
                'fa-solid fa-moon';


        }

    }


    let currentTheme = 'dark';


    applyTheme(currentTheme);


    themeToggle.addEventListener(
        'click',
        function () {


            currentTheme =
                currentTheme === 'dark'
                    ? 'light'
                    : 'dark';


            applyTheme(
                currentTheme
            );


        }
    );


    /* =========================================
       DYNAMIC SEARCH
    ========================================= */


    const searchInput =
        document.getElementById(
            'linkSearch'
        );


    const serviceSections =
        Array.from(
            document.querySelectorAll(
                '.service-section'
            )
        );


    const noResults =
        document.getElementById(
            'noResults'
        );


    searchInput.addEventListener(
        'input',
        function () {


            const query =
                this.value
                    .trim()
                    .toLowerCase();


            let totalVisible = 0;


            serviceSections.forEach(
                function (section) {


                    const items =
                        Array.from(
                            section.querySelectorAll(
                                '.service-item'
                            )
                        );


                    let visibleInSection = 0;


                    items.forEach(
                        function (item) {


                            const card =
                                item.querySelector(
                                    '.link-card'
                                );


                            const name =
                                card?.dataset.name
                                || '';


                            const match =
                                name.includes(
                                    query
                                );


                            if (match) {


                                item.style.display =
                                    '';


                                visibleInSection++;


                            } else {


                                item.style.display =
                                    'none';


                            }


                        }
                    );


                    /*
                     * Hide category when
                     * no service matches.
                     */

                    if (
                        query !== '' &&
                        visibleInSection === 0
                    ) {


                        section.style.display =
                            'none';


                    } else {


                        section.style.display =
                            '';


                    }


                    totalVisible +=
                        visibleInSection;


                }
            );


            /*
             * Show Not Found.
             */

            if (
                query !== '' &&
                totalVisible === 0
            ) {


                noResults.style.display =
                    'block';


            } else {


                noResults.style.display =
                    'none';


            }


        }
    );


</script>

</body>

</html>

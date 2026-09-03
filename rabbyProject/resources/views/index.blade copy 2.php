<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rabby NET — We Believe In Quality</title>

<!-- Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600&family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
  :root{
    --bg-0:#080b12;
    --bg-1:#0e131d;
    --card:#121826;
    --card-hover:#171f30;
    --line: rgba(255,255,255,.07);
    --ink:#eef1f7;
    --ink-dim:#8993a8;
    --ink-faint:#5b6478;
    --fiber-red:#ff3b4e;
    --fiber-blue:#2e6bff;
    --fiber-cyan:#28e0d6;
    --glow: 0 0 0 1px rgba(255,59,78,.15), 0 8px 30px rgba(0,0,0,.45);
    --radius: 16px;
  }
  [data-theme="light"]{
    --bg-0:#f4f6fb;
    --bg-1:#ffffff;
    --card:#ffffff;
    --card-hover:#f7f9ff;
    --line: rgba(20,25,40,.08);
    --ink:#131722;
    --ink-dim:#5a6478;
    --ink-faint:#8a93a8;
    --glow: 0 0 0 1px rgba(20,25,40,.06), 0 8px 24px rgba(20,25,40,.08);
  }

  *{box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{
    background:
      radial-gradient(1100px 500px at 12% -10%, rgba(46,107,255,.12), transparent 60%),
      radial-gradient(900px 500px at 100% 0%, rgba(255,59,78,.10), transparent 55%),
      var(--bg-0);
    color:var(--ink);
    font-family:'Inter','Noto Sans Bengali',sans-serif;
    min-height:100vh;
    transition:background .4s ease,color .4s ease;
  }
  .bangla{font-family:'Noto Sans Bengali','Inter',sans-serif;}
  .display{font-family:'Sora','Noto Sans Bengali',sans-serif;}

  /* ===== Fiber signature line ===== */
  .fiber-line{
    position:relative;
    height:3px;
    width:100%;
    border-radius:99px;
    overflow:hidden;
    background:linear-gradient(90deg, transparent, var(--line), transparent);
  }
  .fiber-line::after{
    content:"";
    position:absolute; inset:0;
    width:40%;
    background:linear-gradient(90deg, transparent, var(--fiber-cyan), var(--fiber-blue), var(--fiber-red), transparent);
    filter:blur(.4px);
    animation: pulse-travel 3.4s linear infinite;
  }
  @keyframes pulse-travel{
    0%{ transform:translateX(-100%); }
    100%{ transform:translateX(350%); }
  }
  @media (prefers-reduced-motion: reduce){
    .fiber-line::after{ animation:none; left:0; width:100%; }
  }

  /* ===== Navbar ===== */
  .navbar-wrap{
    border-bottom:1px solid var(--line);
    background:color-mix(in srgb, var(--bg-1) 82%, transparent);
    backdrop-filter: blur(14px);
    position:sticky; top:0; z-index:50;
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


/* Mobile */
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
  .brand-badge{
    width:44px;height:44px;border-radius:12px;
    background:linear-gradient(145deg, var(--fiber-red), #9c1729);
    display:flex;align-items:center;justify-content:center;
    font-family:'Sora',sans-serif; font-weight:800; color:#fff; font-size:1.15rem;
    box-shadow: 0 6px 18px rgba(255,59,78,.35);
    position:relative;
  }
  .brand-badge::after{
    content:""; position:absolute; inset:-1px; border-radius:13px;
    border:1px solid rgba(255,255,255,.25);
  }
  .brand-name{font-family:'Sora',sans-serif; font-weight:800; font-size:1.28rem; letter-spacing:.3px; line-height:1;}
  .brand-name span{color:var(--fiber-red);}
  .brand-tag{font-size:.65rem; letter-spacing:2.2px; color:var(--ink-faint); text-transform:uppercase; font-weight:600;}

  .nav-links a{
    color:var(--ink-dim); text-decoration:none; font-size:.9rem; font-weight:500;
    display:flex; align-items:center; gap:.45rem;
    padding:.4rem .2rem; transition:color .2s ease;
  }
  .nav-links a:hover{color:var(--ink);}
  .nav-links i{color:var(--fiber-red); font-size:.95rem;}

  .theme-toggle{
    width:38px;height:38px;border-radius:50%;
    border:1px solid var(--line); background:var(--card);
    display:flex;align-items:center;justify-content:center;
    color:var(--ink-dim); cursor:pointer; transition:all .2s ease;
  }
  .theme-toggle:hover{ color:var(--fiber-red); border-color:var(--fiber-red); }

  /* ===== Notice marquee ===== */
  .notice-bar{
    border-left:3px solid var(--fiber-red);
    background: linear-gradient(90deg, rgba(255,59,78,.09), rgba(255,59,78,0) 40%);
    border-radius:0 10px 10px 0;
    overflow:hidden;
    position:relative;
  }
  .marquee-track{
    display:flex; gap:3.5rem; white-space:nowrap;
    animation: scroll-left 32s linear infinite;
    padding:.85rem 0;
  }
  .notice-bar:hover .marquee-track{ animation-play-state: paused; }
  @keyframes scroll-left{
    0%{ transform:translateX(0); }
    100%{ transform:translateX(-50%); }
  }
  .notice-bar .lead-tag{ color:var(--fiber-red); font-weight:700; }
  .notice-bar .sub-tag{ color:#ffb347; font-weight:700; }

  /* ===== Search ===== */
  .search-shell{
    background:var(--card);
    border:1px solid var(--line);
    border-radius:14px;
    padding:.2rem .4rem;
    transition:border-color .2s ease, box-shadow .2s ease;
  }
  .search-shell:focus-within{
    border-color: var(--fiber-red);
    box-shadow: 0 0 0 4px rgba(255,59,78,.12);
  }
  .search-shell input{
    background:transparent; border:none; color:var(--ink);
    font-size:.95rem; padding:.7rem .5rem; width:100%;
  }
  .search-shell input:focus{ outline:none; box-shadow:none; }
  .search-shell input::placeholder{ color:var(--ink-faint); }
  .search-shell i{ color:var(--ink-faint); padding-left:.6rem; }

  /* ===== Section headers ===== */
  .sec-head{
    display:flex; align-items:center; gap:.85rem; margin:2.6rem 0 1.3rem;
  }
  .sec-tick{
    width:22px; height:4px; border-radius:99px;
    background:linear-gradient(90deg, var(--fiber-red), var(--fiber-blue));
    flex-shrink:0;
  }
  .sec-title{
    font-family:'Sora',sans-serif; font-weight:700; font-size:1.15rem;
    letter-spacing:.5px; text-transform:uppercase; margin:0;
  }
  .badge-new{
    font-size:.6rem; font-weight:800; letter-spacing:.5px;
    background:linear-gradient(120deg, var(--fiber-red), #ff7a4d);
    color:#fff; padding:.22rem .55rem; border-radius:99px;
  }
  .sec-count{
    margin-left:auto; color:var(--ink-faint); font-size:.8rem; font-weight:600;
    background:var(--card); border:1px solid var(--line); padding:.15rem .65rem; border-radius:99px;
  }

  /* ===== Link cards ===== */
  .link-card{
    background:var(--card);
    border:1px solid var(--line);
    border-radius:var(--radius);
    padding:1.5rem 1.1rem;
    text-align:center;
    text-decoration:none;
    color:var(--ink);
    display:block;
    height:100%;
    position:relative;
    overflow:hidden;
    transition: transform .28s cubic-bezier(.2,.8,.2,1), border-color .28s ease, box-shadow .28s ease, background .28s ease;
  }
  .link-card::before{
    content:"";
    position:absolute; inset:0;
    background:radial-gradient(120px 80px at 50% 0%, rgba(255,59,78,.12), transparent 70%);
    opacity:0; transition:opacity .3s ease;
  }
  .link-card:hover{
    transform:translateY(-5px);
    border-color: rgba(255,59,78,.4);
    box-shadow: var(--glow);
    background:var(--card-hover);
    color:var(--ink);
  }
  .link-card:hover::before{ opacity:1; }
  .link-card:hover .card-icon{
    transform:scale(1.08) rotate(-4deg);
    box-shadow:0 8px 22px rgba(255,59,78,.32);
  }
  .card-icon{
    width:52px;height:52px;border-radius:13px;
    margin:0 auto .9rem;
    display:flex;align-items:center;justify-content:center;
    font-size:1.25rem;
    background:linear-gradient(155deg, rgba(255,59,78,.16), rgba(46,107,255,.10));
    border:1px solid rgba(255,59,78,.18);
    color:var(--fiber-red);
    transition:transform .28s ease, box-shadow .28s ease;
  }
  .card-title{
    font-weight:600; font-size:.95rem; letter-spacing:.2px;
  }
  .card-pill{
    position:absolute; top:.6rem; right:.6rem;
    font-size:.55rem; font-weight:800; letter-spacing:.4px;
    padding:.15rem .45rem; border-radius:99px;
    background:linear-gradient(120deg, var(--fiber-red), #ff7a4d); color:#fff;
  }

  /* fade-in on load */
  .link-card{ opacity:0; animation: rise .5s ease forwards; }
  @keyframes rise{ from{opacity:0; transform:translateY(10px);} to{opacity:1; transform:translateY(0);} }

  /* ===== Floating call button ===== */
  .float-call{
    position:fixed; right:1.6rem; bottom:1.8rem; z-index:60;
    width:58px;height:58px;border-radius:50%;
    background:linear-gradient(150deg, var(--fiber-red), #b31228);
    display:flex;align-items:center;justify-content:center;
    color:#fff; font-size:1.3rem; text-decoration:none;
    box-shadow:0 10px 30px rgba(255,59,78,.4);
  }
  .float-call::after{
    content:""; position:absolute; inset:0; border-radius:50%;
    border:2px solid var(--fiber-red); animation: ring 2.2s ease-out infinite;
  }
  @keyframes ring{
    0%{ transform:scale(1); opacity:.7; }
    100%{ transform:scale(1.9); opacity:0; }
  }

  /* ===== Footer ===== */
  footer{
    border-top:1px solid var(--line);
    margin-top:4rem;
    padding:3rem 0 2rem;
    text-align:center;
  }
  footer .foot-brand{ font-family:'Sora',sans-serif; font-weight:800; letter-spacing:.5px; }
  footer .foot-line{ color:var(--ink-dim); font-size:.9rem; margin-top:.3rem; }
  footer .foot-phone{
    display:inline-flex; align-items:center; gap:.5rem;
    color:var(--ink); font-weight:600; margin-top:.9rem; font-size:.95rem;
  }
  footer .foot-phone i{ color:var(--fiber-red); }
  footer .copyright{ color:var(--ink-faint); font-size:.75rem; margin-top:1.6rem; letter-spacing:.3px; }

  .no-results{ display:none; text-align:center; color:var(--ink-faint); padding:2.5rem 0; }
</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar-wrap">
  <div class="container py-3 d-flex align-items-center justify-content-between flex-wrap gap-3">
    {{-- <div class="brand-mark">
      <div class="brand-badge">K</div>
      <div>
        <div class="brand-name">Rabby<span>NET</span></div>
        <div class="brand-tag">We Believe In Quality</div>
      </div>
    </div> --}}
    <div class="brand-mark">
    @if($settings?->logo)
        <img
            src="{{ asset('storage/' . $settings->logo) }}"
            alt="Logo"
            class="brand-logo mx-auto"
        >
    @endif
</div>

    <div class="d-flex align-items-center gap-4 nav-links">
      <a href="#"><i class="fa-brands fa-facebook"></i> Facebook</a>
      <a href="#"><i class="fa-solid fa-envelope"></i> Email</a>
      <a href="index.html"><i class="fa-solid fa-globe"></i> Website</a>
    </div>

    <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
      <i class="fa-solid fa-moon" id="themeIcon"></i>
    </button>
  </div>
  <div class="fiber-line"></div>
</div>

<div class="container pb-5">

  <!-- NOTICE -->
  <div class="notice-bar mt-4 mb-4">
    <div class="marquee-track bangla px-3">
      <span>
        <span class="lead-tag"> {{ $settings->headline }} </span> 
        
      </span>
      {{-- <span aria-hidden="true">
        <span class="lead-tag">প্রিয় গ্রাহক:</span> Rabby NET-এ আপনাকে স্বাগতম। পুরো কামরাঙ্গিরচর-এ আমরা দিচ্ছি সরকার নির্ধারিত মূল্যে নিরবিচ্ছিন্ন অপটিক্যাল ফাইবার ইন্টারনেট সংযোগ। &nbsp;•&nbsp;
        <span class="sub-tag">বিঃ দ্রঃ:</span> দয়া করে প্রতারক চক্র থেকে সতর্ক থাকুন এবং সরাসরি আমাদের অফিসে যোগাযোগ করুন।
      </span> --}}
    </div>
  </div>

  <!-- SEARCH -->
  <div class="search-shell d-flex align-items-center mb-2">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" id="linkSearch" placeholder="Search links...">
  </div>

  <!-- MOVIE & FTP SERVERS -->
  <div class="sec-head">
    <span class="sec-tick"></span>
    <h2 class="sec-title"> {{ $category1->title }} </h2>
    <span class="sec-count" data-count-for="movies"> {{ $services1->count() }}</span>
  </div>


<div class="row" id="movies"
     style="display:flex; flex-wrap:wrap; margin:-7px;">

    @foreach ($services1 as $ftpm)

        <div class="col-6 col-md-4 col-lg-2"
             style="padding:7px;">

            <a class="link-card"
               data-name="{{ $ftpm->title }}"
               href="{{ $ftpm->link }}"
               style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%; text-decoration:none;">

                <div class="card-icon">
                    <i class="{{ $ftpm->icon }}"></i>
                </div>

                <div class="card-title">
                    {{ $ftpm->title }}
                </div>

            </a>

        </div>

    @endforeach

</div>


  <!-- LIVE TV -->
  <div class="sec-head">
    <span class="sec-tick"></span>
    <h2 class="sec-title"> {{ $category2->title }}</h2>
    <span class="badge-new">NEW</span>
    <span class="sec-count" data-count-for="livetv">  {{ $services2->count() }} </span>
     
  </div>

<div class="row" id="livetv"
     style="display:flex; flex-wrap:wrap; margin:-7px;">

    @foreach ($services2 as $item)

        <div class="col-6 col-md-4 col-lg-2"
             style="padding:7px;">

            <a class="link-card"
               data-name="{{ $item->title }}"
               href="{{ $item->link }}"
               style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%; text-decoration:none;">

                <div class="card-icon">
                    <i class="{{ $item->icon }}"></i>
                </div>

                <div class="card-title">
                    {{ $item->title }}
                </div>

            </a>

        </div>

    @endforeach

</div>

  <!-- KSB NET APP -->
  <div class="sec-head">
    <span class="sec-tick"></span>
    <h2 class="sec-title"> {{ $category3->title }}</h2>
    {{-- <span class="sec-count" data-count-for="ksbapp">1</span> --}}
    <span class="sec-count" data-count-for="movies">
      {{ $services3->count() }}
  </span>
  </div>

  <div class="row" id="ksbapp"
     style="display:flex; flex-wrap:wrap; margin:-7px;">

    @foreach($services3 as $net)

        <div class="col-6 col-md-4 col-lg-2"
             style="padding:7px;">

            <a class="link-card"
               data-name="{{ $net->title }}"
               href="{{ $net->sub_title }}"
               target="_blank"
               style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%; text-decoration:none;">

                <div class="card-icon">
                    <i class="{{ $net->icon }}"></i>
                </div>

                <div class="card-title">
                    {{ $net->title }}
                </div>

            </a>

        </div>

    @endforeach

</div>

  <div class="no-results" id="noResults">
    <i class="fa-solid fa-magnifying-glass mb-2 d-block fs-3"></i>
    Not Found
  </div>
</div>

<!-- FLOATING CALL -->
<a href="tel:09666738500" class="float-call"><i class="fa-solid fa-phone"></i></a>

<style>
  .foot-brand {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
  }

  .foot-brand .brand-logo {
      width: 180px;
      height: 60px;
      object-fit: contain;
      display: block;
      margin: 0 auto;
  }
</style>

<!-- FOOTER -->
<footer>
  <span class="sec-tick d-inline-block mb-3"></span>
  {{-- <div class="foot-brand">{{ $settings->logo }}</div> --}}
  <div class="foot-brand">
    @if($settings?->logo)
        <img
            src="{{ asset('storage/' . $settings->logo) }}"
            alt="Logo"
            class="brand-logo"
        >
    @endif
</div>
  <div class="foot-line bangla"> {{ $settings->address }} </div>
  <div class="foot-phone"><i class="fa-solid fa-phone"></i> {{ $settings->mobile }} </div>
  <div class="copyright"> {{ $settings->footer_text }}</div>
</footer>

<script>
  // Theme toggle
  const themeToggle = document.getElementById('themeToggle');
  const themeIcon = document.getElementById('themeIcon');
  const root = document.documentElement;
  function applyTheme(t){
    if(t === 'light'){ root.setAttribute('data-theme','light'); themeIcon.className='fa-solid fa-sun'; }
    else { root.removeAttribute('data-theme'); themeIcon.className='fa-solid fa-moon'; }
  }
  let current = 'dark';
  applyTheme(current);
  themeToggle.addEventListener('click', ()=>{
    current = current === 'dark' ? 'light' : 'dark';
    applyTheme(current);
  });

  // Search filter across all cards
  const searchInput = document.getElementById('linkSearch');
  const allCards = Array.from(document.querySelectorAll('.link-card'));
  const sections = ['movies','livetv','ksbapp'].map(id => document.getElementById(id));
  const noResults = document.getElementById('noResults');

  searchInput.addEventListener('input', () => {
    const q = searchInput.value.trim().toLowerCase();
    let visibleTotal = 0;
    sections.forEach(sec => {
      let visibleInSection = 0;
      sec.querySelectorAll('.link-card').forEach(card => {
        const match = card.dataset.name.includes(q);
        card.closest('.col-6').style.display = match ? '' : 'none';
        if(match) visibleInSection++;
      });
      sec.closest('.container') ; // no-op, keep structure
      sec.previousElementSibling ? null : null;
      // toggle whole section head + grid visibility
      const head = sec.previousElementSibling && sec.previousElementSibling.classList.contains('sec-head') ? sec.previousElementSibling : null;
      if(head){ head.style.display = visibleInSection === 0 && q !== '' ? 'none' : 'flex'; }
      sec.style.display = visibleInSection === 0 && q !== '' ? 'none' : '';
      visibleTotal += visibleInSection;
    });
    noResults.style.display = (q !== '' && visibleTotal === 0) ? 'block' : 'none';
  });
</script>

</body>
</html>
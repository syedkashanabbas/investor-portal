<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Investor Dashboard')</title>

    {{-- Fonts and CSS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    @stack('styles')
</head>

<body>
    <style>
.kpi-card {
  border-radius: 1rem;
  transition: transform .15s ease, box-shadow .15s ease;
  min-height: 180px;
}
.kpi-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(0,0,0,.08);
}
.sparkline {
  width: 100% !important;
  height: 60px !important;
}
</style>

    <article>
        {{-- Sidebar --}}
        @include('partials.sidebar')

        <section id="wrapper">
            {{-- Navbar --}}
            @include('partials.navbar')

            <div id="content" class="pt-2">
                <div class="contentBody">
                    @yield('content')
                </div>
            </div>
        </section>
    </article>

    {{-- Core Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    {{-- AOS Init --}}
    <script>
      // Run after everything (fonts/images) is ready
      window.addEventListener('load', function () {
        AOS.init({
          once: true,               // animate once
          duration: 200,            // smooth but quick
          easing: 'ease-out',       // looks nicer
          offset: 80,               // start a bit before
          anchorPlacement: 'top-bottom'
        });
        // First refresh to lock positions
        AOS.refreshHard();
      });

      // If content changes (tabs, collapses, modals, ajax), refresh AOS
      document.addEventListener('shown.bs.tab',      () => AOS.refresh());
      document.addEventListener('shown.bs.collapse', () => AOS.refresh());
      document.addEventListener('shown.bs.modal',    () => AOS.refresh());
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
  const opts = {
    responsive:true,
    maintainAspectRatio:false,
    elements:{ line:{ tension:.3, borderWidth:2 }, point:{ radius:0 }},
    plugins:{ legend:{ display:false }, tooltip:{ enabled:false }},
    scales:{ x:{ display:false }, y:{ display:false } }
  };

  function makeSpark(id, data, color){
    new Chart(document.getElementById(id).getContext('2d'), {
      type:'line',
      data:{ labels:data.map((_,i)=>i), datasets:[{ data, borderColor:color, fill:true, backgroundColor:color+'20' }]},
      options:opts
    });
  }

  makeSpark('sparkRev',[10,12,14,13,15,18,20],'#0d6efd');     // Revenue
  makeSpark('sparkEbitda',[2,3,3.5,3,4,4.5,5],'#198754');     // EBITDA
  makeSpark('sparkGM',[30,32,31,33,34,36,35],'#ffc107');      // GM
  makeSpark('sparkNM',[10,11,12,11,12,13,14],'#dc3545');      // NM
});
</script>

    <!-- Optional: if JS fails, don't leave stuff invisible -->
    <noscript>
      <style>[data-aos]{opacity:1 !important; transform:none !important;}</style>
    </noscript>

    @stack('scripts')
</body>
</html>

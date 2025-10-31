<aside id="sidebar" class="border-end">
  <section id="sidebar_header">
    <div class="d-flex align-items-center justify-content-between">
      <img src="{{ asset('assets/img/logo.png') }}" width="50" alt="logo">
      <button class="btn_transparent d-inline-flex align-items-center" id="closeSidebar">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24" width="24" fill="white">
          <path d="M21,15.61L19.59,17L14.58,12L19.59,7L21,8.39L17.44,12L21,15.61M3,6H16V8H3V6M3,13V11H13V13H3M3,18V16H16V18H3Z"/>
        </svg>
      </button>
    </div>
  </section>

  <section id="sidebar_body">
    <ul class="sidebar_list list-unstyled">

      <li class="sidebar_item">
        <a href="{{ route('dashboard') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-gem"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Pannello VIP</span>
        </a>
      </li>
    <li class="sidebar_item">
      <a href="{{ route('investor.deposits.index') }}"
        class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.deposits.*') ? 'active' : '' }}">
        <span class="sidebar_link_icon"><i class="fas fa-wallet"></i></span>
        <span class="sidebar_link_text fs_7 fw-medium">Depositi</span>
      </a>
    </li>
    


      {{-- <li class="sidebar_item">
        <a href="{{ route('investor.projects.status') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.projects.status') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-project-diagram"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Stato Progetti</span>
        </a>
      </li> --}}

      {{-- <li class="sidebar_item">
        <a href="{{ route('investor.reports') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.reports') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-chart-line"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Report Finanziari</span>
        </a>
      </li> --}}

      {{-- <li class="sidebar_item">
        <a href="{{ route('investor.strategy.access') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.strategy.access') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-lightbulb"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Accesso Strategie</span>
        </a>
      </li> --}}

      <li class="sidebar_item">
        <a href="{{ route('investor.education') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.education') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-graduation-cap"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Formazione Investitori</span>
        </a>
      </li>

      {{-- <li class="sidebar_item">
        <a href="{{ route('investor.live') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.live') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-bolt"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Feed Aggiornamenti Live</span>
        </a>
      </li> --}}

      <li class="sidebar_item">
        <a href="{{ route('investor.support') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.support') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-headset"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Q&amp;A Diretto / Supporto</span>
        </a>
      </li>

      <li class="sidebar_item">
        <a href="{{ route('investor.future') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.future') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-seedling"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Anteprima Progetti Futuri</span>
        </a>
      </li>

      <li class="sidebar_item">
        <a href="{{ route('investor.docs') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.docs*') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-file-alt"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Documenti Privati</span>
        </a>
      </li>

      <li class="sidebar_item">
        <a href="{{ route('investor.feedback') }}"
           class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.feedback') ? 'active' : '' }}">
          <span class="sidebar_link_icon"><i class="fas fa-comment-dots"></i></span>
          <span class="sidebar_link_text fs_7 fw-medium">Feedback e Sondaggi</span>
        </a>
      </li>
       <li class="sidebar_item">
      <a href="{{ route('investor.support-help') }}"
        class="sidebar_link d-flex align-items-center text-decoration-none {{ request()->routeIs('investor.support-help*') ? 'active' : '' }}">
        <span class="sidebar_link_icon"><i class="fas fa-wallet"></i></span>
        <span class="sidebar_link_text fs_7 fw-medium">Supporto e Centro assistenza</span>
      </a>
    </li>

    </ul>
  </section>

  <section id="sidebar_footer">
    <form action="{{ route('logout') }}" method="POST" class="w-100">
      @csrf
      <button type="submit" id="logout" class="my-2 rounded btn_primary d-flex align-items-center justify-content-center w-100">
        <span class="fs_7">Disconnetti</span>
      </button>
    </form>
  </section>
</aside>

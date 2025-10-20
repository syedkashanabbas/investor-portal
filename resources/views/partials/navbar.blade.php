    @php
    $avatar = \Laravolt\Avatar\Facade::create(Auth::user()->name)->toBase64();
    @endphp

        <div id="navbar" class="gap-3 sticky-top border-bottom d-flex align-items-center justify-content-between"  style="z-index: 1030;">
                <div class="gap-3 d-none align-items-center" id="navbarLogo">
                    <button class="btn_transparent d-md-inline-flex d-none align-items-center" id="openSidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24" width="24" fill="var(--black)"><path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg>
                    </button>
                    <button class="btn_transparent d-md-none d-inline-flex align-items-center" data-bs-toggle="offcanvas" data-bs-target="#smallSidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24" width="24" fill="var(--black)"><path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg>
                    </button>
                    <img src="{{ asset('assets/img/logo.png') }}" width="35" style="height:auto;" alt="logo">

                </div>
                <div class="d-md-inline-flex d-none me-auto">
                    <p class="m-0 fw-semibold fs_5">Pannello Investitore</p>
                </div>
                <div class="gap-2 d-inline-flex align-items-center ms-auto">
                    <button class="btn_transparent d-inline-flex align-items-center newNotification" data-bs-toggle="offcanvas" data-bs-target="#notificationCentre">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="22" width="22"><path d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z" /></svg>
                    </button>    
                    {{-- <div class="dropdown d-inline-flex align-items-center">
                        <button class="rounded btn_transparent_gray d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fs_7">Add</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="16" width="16"><path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg>
                        </button>
                        <ul class="border-0 shadow dropdown-menu dropdownMenu">
                            <li>
                                <a class="gap-2 py-2 dropdown-item fs_7 d-flex align-items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="17" width="17"><path d="M11 15H17V17H11V15M9 7H7V9H9V7M11 13H17V11H11V13M11 9H17V7H11V9M9 11H7V13H9V11M21 5V19C21 20.1 20.1 21 19 21H5C3.9 21 3 20.1 3 19V5C3 3.9 3.9 3 5 3H19C20.1 3 21 3.9 21 5M19 5H5V19H19V5M9 15H7V17H9V15Z"></path></svg>
                                    <span class="fs_7">Add Quotation</span>
                                </a>
                            </li>
                            <li>
                                <a class="gap-2 py-2 dropdown-item fs_7 d-flex align-items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="17" width="17"><path d="M20.56 3.91C21.15 4.5 21.15 5.45 20.56 6.03L16.67 9.92L18.79 19.11L17.38 20.53L13.5 13.1L9.6 17L9.96 19.47L8.89 20.53L7.13 17.35L3.94 15.58L5 14.5L7.5 14.87L11.37 11L3.94 7.09L5.36 5.68L14.55 7.8L18.44 3.91C19 3.33 20 3.33 20.56 3.91Z"></path></svg>
                                    <span class="fs_7">Add Booking</span>
                                </a>
                            </li>
                            <li>
                                <a class="gap-2 py-2 dropdown-item fs_7 d-flex align-items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="17" width="17"><path d="M17 7V9H15V7H17M13 7V9H7V7H13M13 11H7V13H13V11M15 11V13H17V11H15M21 22L18 20L15 22L12 20L9 22L6 20L3 22V3H21V22M19 18.26V5H5V18.26L6 17.6L9 19.6L12 17.6L15 19.6L18 17.6L19 18.26Z"></path></svg>
                                    <span class="fs_7">Add Invoice</span>
                                </a>
                            </li>
                            <li>
                                <a class="gap-2 py-2 dropdown-item fs_7 d-flex align-items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="17" width="17"><path d="M3 3V21H21V3H3M18 18H6V17H18V18M18 16H6V15H18V16M18 12H6V6H18V12Z"></path></svg>
                                    <span class="fs_7">Add Blog</span>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="dropdown d-inline-flex align-items-center">
                       <button class="rounded btn_transparent d-inline-flex align-items-center profileBtn" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ $avatar }}" class="rounded-circle" width="32" height="32" alt="{{ Auth::user()->name }}">
                    </button>
                        <ul class="border-0 shadow dropdown-menu dropdownMenu">
                            <li>
                                <a class="py-2 dropdown-item d-flex flex-column fs_7" >
                                <span class="fw-medium fs_7">{{ Auth::user()->name }}</span>
                                {{-- <span class="fw-medium text-secondary small">View Profile</span> --}}
                            </a>

                            </li>
                            <li>
                                <a class="py-2 dropdown-item fs_7" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18" fill="var(--dark)"><path d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z" /></svg>
                                    <span>Impostazioni</span>
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-block">
                                    @csrf
                                    <button type="submit" class="gap-2 py-2 dropdown-item fs_7 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18" fill="var(--dark)">
                                            <path d="M17 7L15.59 8.41L18.17 11H8V13H18.17L15.59 15.58L17 17L22 12M4 5H12V3H4C2.9 3 2 3.9 2 5V19C2 20.1 2.9 21 4 21H12V19H4V5Z"/>
                                        </svg>
                                        <span>Disconnetti</span>
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
<aside id="sidebar" class="border-end">
    <section id="sidebar_header">
        <div class="d-flex align-items-center justify-content-between">
            <img src="assets/img/abdul_ahad_logo.png" width="35" alt="abdul ahad logo">
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
                <a href="#" class="sidebar_link active d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-gem"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">VIP Dashboard</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-project-diagram"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Project Status</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-chart-line"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Financial Reports</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-lightbulb"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Strategy Access</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-graduation-cap"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Investor Education</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-bolt"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Live Updates Feed</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-headset"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Direct Q&A / Support</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-seedling"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Future Projects Preview</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-file-alt"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Private Documents</span>
                </a>
            </li>

            <li class="sidebar_item">
                <a href="#" class="sidebar_link d-flex align-items-center text-decoration-none">
                    <span class="sidebar_link_icon"><i class="fas fa-comment-dots"></i></span>
                    <span class="sidebar_link_text fs_7 fw-medium">Feedback & Surveys</span>
                </a>
            </li>

        </ul>
    </section>

    <section id="sidebar_footer">
        <form action="{{ route('logout') }}" method="POST" class="w-100">
            @csrf
            <button type="submit" id="logout" class="my-2 rounded btn_primary d-flex align-items-center justify-content-center w-100">
                <span class="fs_7">Signout</span>
            </button>
        </form>
    </section>
</aside>

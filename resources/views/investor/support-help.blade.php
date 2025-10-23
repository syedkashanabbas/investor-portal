@extends('layouts.layout1')

@section('title','Support & Help Center')

@section('content')
<div class="py-5 container-fluid">

    <!-- Heading -->
    <div class="mb-5">
        <h1 class="mb-2 fw-bold display-5">Support & Help Center</h1>
        <p class="lead text-muted">Need assistance? Get help via live chat, submit tickets, or browse guides.</p>
    </div>

    <!-- Quick Actions -->
    <section class="mb-5">
        <div class="text-center row g-4">
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100">
                    <i class="mb-3 fas fa-comments fa-2x text-primary"></i>
                    <h4 class="mb-2 fw-bold">Live Chat</h4>
                    <p class="text-muted">Talk to our support team instantly.</p>
                    <button class="px-4 btn btn-primary btn-lg">Start Chat</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100">
                    <i class="mb-3 fas fa-ticket-alt fa-2x text-success"></i>
                    <h4 class="mb-2 fw-bold">Tickets</h4>
                    <p class="text-muted">Track, manage and submit support requests.</p>
                    <button class="px-4 btn btn-success btn-lg">New Ticket</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100">
                    <i class="mb-3 fas fa-book fa-2x text-warning"></i>
                    <h4 class="mb-2 fw-bold">Guides</h4>
                    <p class="text-muted">Step-by-step tutorials to get you started.</p>
                    <button class="px-4 text-white btn btn-warning btn-lg">Browse Guides</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Tickets Section -->
    <section class="mb-5">
        <h2 class="pb-2 mb-3 fw-bold border-bottom">Your Support Tickets</h2>
        <table class="table align-middle table-borderless fs-5">
            <thead class="border-bottom">
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Last Update</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1024</td>
                    <td>Unable to reset password</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td>2 hrs ago</td>
                </tr>
                <tr>
                    <td>#1023</td>
                    <td>Billing issue on invoice</td>
                    <td><span class="badge bg-success">Resolved</span></td>
                    <td>Yesterday</td>
                </tr>
                <tr>
                    <td>#1022</td>
                    <td>KYC Verification delay</td>
                    <td><span class="badge bg-info">In Progress</span></td>
                    <td>2 days ago</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Guides / Knowledge Base -->
    <section class="mb-5">
        <h2 class="pb-2 mb-3 fw-bold border-bottom">Popular Guides</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100">
                    <h5 class="fw-bold">Getting Started</h5>
                    <p class="text-muted">Learn the basics of setting up your account and first steps.</p>
                    <a href="#" class="fw-semibold">Read More →</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100">
                    <h5 class="fw-bold">Security & 2FA</h5>
                    <p class="text-muted">Protect your account with advanced authentication methods.</p>
                    <a href="#" class="fw-semibold">Read More →</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100">
                    <h5 class="fw-bold">Deposits & Withdrawals</h5>
                    <p class="text-muted">Step-by-step instructions for managing funds safely.</p>
                    <a href="#" class="fw-semibold">Read More →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section>
        <h2 class="pb-2 mb-3 fw-bold border-bottom">Frequently Asked Questions</h2>
        <div class="accordion fs-5" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq1">
                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                        How do I reset my password?
                    </button>
                </h2>
                <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Go to account settings, click "Change Password" and follow the steps. You’ll get a confirmation email.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq2">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                        Where can I track my support tickets?
                    </button>
                </h2>
                <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        All your tickets are listed above in the "Your Support Tickets" section. You’ll also receive email updates.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq3">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                        How do I contact live chat?
                    </button>
                </h2>
                <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Click the "Start Chat" button above, available 24/7 for premium members.
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

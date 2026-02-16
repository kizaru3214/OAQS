<?php
session_start();
$pageTitle = "Terms of Service - AquaQueue";
include('../includes/header.php');
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap');

body  { font-family: 'DM Sans', sans-serif; background: #f0fdfd; }
h1, h2, h3, h4 { font-family: 'Sora', sans-serif; }

.doc-card {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 8px 40px rgba(113,201,206,0.10);
    overflow: hidden;
    max-width: 820px;
    margin: 0 auto;
}

/* Header banner */
.doc-banner {
    background: linear-gradient(135deg, #71C9CE 0%, #4db8be 100%);
    padding: 2.5rem 2.5rem 2rem;
    position: relative;
    overflow: hidden;
}
.doc-banner::before {
    content: '';
    position: absolute;
    width: 300px; height: 300px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    top: -80px; right: -60px;
}
.doc-banner::after {
    content: '';
    position: absolute;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,0.06);
    bottom: -50px; left: 40px;
}

/* TOC */
.toc {
    background: #f0fdfd;
    border: 1px solid #A6E3E9;
    border-radius: 1rem;
    padding: 1.25rem 1.5rem;
    margin-bottom: 2.5rem;
}
.toc-item {
    display: flex; align-items: center; gap: 10px;
    padding: 6px 0;
    color: #3aabb1;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s;
    border-bottom: 1px solid rgba(166,227,233,0.3);
}
.toc-item:last-child { border-bottom: none; }
.toc-item:hover { color: #0d1117; }
.toc-num {
    width: 22px; height: 22px;
    border-radius: 6px;
    background: linear-gradient(135deg,#71C9CE,#4db8be);
    color: white;
    font-size: 0.7rem; font-weight: 700;
    display: inline-flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}

/* Sections */
.doc-section { margin-bottom: 2.5rem; scroll-margin-top: 80px; }
.doc-section h2 {
    font-size: 1.15rem; font-weight: 700;
    color: #0d1117;
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 0.875rem;
    padding-bottom: 0.625rem;
    border-bottom: 2px solid #E3FDFD;
}
.doc-section p {
    font-size: 0.9rem; color: #4b5563;
    line-height: 1.8; margin-bottom: 0.75rem;
}
.doc-section ul {
    padding-left: 0; list-style: none;
    margin-bottom: 0.75rem;
}
.doc-section ul li {
    font-size: 0.9rem; color: #4b5563;
    line-height: 1.8; padding: 3px 0 3px 1.5rem;
    position: relative;
}
.doc-section ul li::before {
    content: '';
    position: absolute; left: 0; top: 12px;
    width: 7px; height: 7px;
    border-radius: 50%;
    background: #71C9CE;
}

.highlight-box {
    background: #f0fdfd;
    border-left: 3px solid #71C9CE;
    border-radius: 0 10px 10px 0;
    padding: 12px 16px;
    font-size: 0.875rem;
    color: #3aabb1;
    font-weight: 500;
    margin: 1rem 0;
    line-height: 1.6;
}

.warning-box {
    background: #fff7ed;
    border-left: 3px solid #f59e0b;
    border-radius: 0 10px 10px 0;
    padding: 12px 16px;
    font-size: 0.875rem;
    color: #92400e;
    margin: 1rem 0;
    line-height: 1.6;
}

/* Back button */
.back-btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 20px;
    border-radius: 10px;
    border: 1.5px solid #A6E3E9;
    color: #3aabb1;
    font-weight: 600; font-size: 0.875rem;
    font-family: 'Sora', sans-serif;
    text-decoration: none;
    background: white;
    transition: all 0.2s;
    margin-bottom: 1.5rem;
    display: inline-flex;
}
.back-btn:hover { background: #f0fdfd; border-color: #71C9CE; }

/* Accept banner at bottom */
.accept-banner {
    background: linear-gradient(135deg,#E3FDFD,#cbf5f7);
    border-top: 1px solid #A6E3E9;
    padding: 1.5rem 2.5rem;
    display: flex; flex-wrap: wrap;
    align-items: center; justify-content: space-between; gap: 1rem;
}
.btn-accept {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 11px 28px;
    background: linear-gradient(135deg,#71C9CE,#4db8be);
    color: white; border: none; border-radius: 10px;
    font-family: 'Sora', sans-serif; font-weight: 600; font-size: 0.875rem;
    cursor: pointer; text-decoration: none;
    box-shadow: 0 4px 16px rgba(113,201,206,0.35);
    transition: all 0.2s;
}
.btn-accept:hover { transform: translateY(-1px); box-shadow: 0 8px 22px rgba(113,201,206,0.4); }
</style>

<div class="py-10 px-4" style="background:linear-gradient(135deg,#f0fdfd 0%,#f8fffe 100%); min-height:100vh;">
    <div class="max-w-4xl mx-auto">

        <a href="register.php" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Register
        </a>

        <div class="doc-card">

            <!-- Banner -->
            <div class="doc-banner">
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                            <i class="fas fa-file-contract text-white text-lg"></i>
                        </div>
                        <span class="text-white/80 text-sm font-semibold uppercase tracking-widest">Legal</span>
                    </div>
                    <h1 class="text-3xl font-extrabold text-white mb-2">Terms of Service</h1>
                    <div class="flex flex-wrap gap-4 text-white/75 text-sm">
                        <span><i class="fas fa-calendar-alt mr-1.5"></i>Effective: February 16, 2026</span>
                        <span><i class="fas fa-sync-alt mr-1.5"></i>Last Updated: February 16, 2026</span>
                        <span><i class="fas fa-map-marker-alt mr-1.5"></i>Quezon City, Philippines</span>
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="p-8 md:p-10">

                <div class="highlight-box mb-6">
                    <i class="fas fa-info-circle mr-2"></i>
                    Please read these Terms of Service carefully before using AquaQueue. By accessing or using our platform, you agree to be bound by these terms.
                </div>

                <!-- Table of Contents -->
                <div class="toc mb-8">
                    <div class="font-bold text-[#0d1117] text-sm mb-3 font-['Sora']">
                        <i class="fas fa-list mr-2 text-[#71C9CE]"></i>Table of Contents
                    </div>
                    <?php
                    $sections = [
                        'Acceptance of Terms',
                        'Description of Service',
                        'User Accounts & Registration',
                        'Acceptable Use Policy',
                        'Booking & Appointments',
                        'Privacy & Data Protection',
                        'Intellectual Property',
                        'Limitation of Liability',
                        'Termination',
                        'Changes to Terms',
                        'Contact Information',
                    ];
                    foreach ($sections as $i => $s):
                    ?>
                    <a href="#section-<?= $i+1 ?>" class="toc-item">
                        <span class="toc-num"><?= $i+1 ?></span>
                        <?= $s ?>
                    </a>
                    <?php endforeach; ?>
                </div>

                <!-- Section 1 -->
                <div class="doc-section" id="section-1">
                    <h2>
                        <span class="toc-num">1</span>
                        Acceptance of Terms
                    </h2>
                    <p>By accessing, registering for, or using the AquaQueue platform ("Service"), you confirm that you are at least 18 years of age, have read and understood these Terms of Service, and agree to be legally bound by them.</p>
                    <p>If you are using AquaQueue on behalf of an organization, you represent that you have the authority to bind that organization to these terms.</p>
                </div>

                <!-- Section 2 -->
                <div class="doc-section" id="section-2">
                    <h2><span class="toc-num">2</span> Description of Service</h2>
                    <p>AquaQueue is an online appointment and queue management platform that enables users to book, track, and manage appointments across a variety of service providers including but not limited to:</p>
                    <ul>
                        <li>Medical and dental clinics</li>
                        <li>Hair salons and personal care services</li>
                        <li>Legal consultation offices</li>
                        <li>Vehicle service and repair centers</li>
                        <li>Business meeting and coworking spaces</li>
                    </ul>
                    <p>We reserve the right to modify, suspend, or discontinue any part of the Service at any time with reasonable notice.</p>
                </div>

                <!-- Section 3 -->
                <div class="doc-section" id="section-3">
                    <h2><span class="toc-num">3</span> User Accounts & Registration</h2>
                    <p>To access certain features of AquaQueue, you must create an account. You agree to:</p>
                    <ul>
                        <li>Provide accurate, current, and complete information during registration</li>
                        <li>Maintain the security and confidentiality of your password</li>
                        <li>Notify us immediately of any unauthorized account access</li>
                        <li>Accept responsibility for all activities that occur under your account</li>
                    </ul>
                    <div class="warning-box">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        You may not create accounts using false identities or for the purpose of impersonating another person or entity.
                    </div>
                </div>

                <!-- Section 4 -->
                <div class="doc-section" id="section-4">
                    <h2><span class="toc-num">4</span> Acceptable Use Policy</h2>
                    <p>You agree not to use the AquaQueue platform to:</p>
                    <ul>
                        <li>Violate any applicable Philippine or international law or regulation</li>
                        <li>Book appointments with no intent to attend (ghost bookings)</li>
                        <li>Harass, threaten, or harm other users or service providers</li>
                        <li>Attempt to gain unauthorized access to our systems</li>
                        <li>Transmit spam, malware, or any harmful content</li>
                        <li>Scrape, crawl, or harvest data without written permission</li>
                    </ul>
                </div>

                <!-- Section 5 -->
                <div class="doc-section" id="section-5">
                    <h2><span class="toc-num">5</span> Booking & Appointments</h2>
                    <p>When you book an appointment through AquaQueue:</p>
                    <ul>
                        <li>You commit to attending at the scheduled date and time</li>
                        <li>Cancellations must be made at least 2 hours before the appointment</li>
                        <li>Repeated no-shows may result in temporary suspension of booking privileges</li>
                        <li>Service providers retain the right to refuse service at their discretion</li>
                    </ul>
                    <div class="highlight-box">
                        <i class="fas fa-clock mr-2"></i>
                        AquaQueue acts as a scheduling intermediary only. We are not responsible for the quality of services provided by third-party providers listed on our platform.
                    </div>
                </div>

                <!-- Section 6 -->
                <div class="doc-section" id="section-6">
                    <h2><span class="toc-num">6</span> Privacy & Data Protection</h2>
                    <p>Your use of AquaQueue is also governed by our <a href="privacy.php" class="text-[#71C9CE] font-semibold hover:underline">Privacy Policy</a>, which is incorporated into these Terms by reference. By using our Service, you consent to the collection and use of your information as described in the Privacy Policy.</p>
                    <p>We comply with the Data Privacy Act of 2012 (Republic Act No. 10173) of the Philippines.</p>
                </div>

                <!-- Section 7 -->
                <div class="doc-section" id="section-7">
                    <h2><span class="toc-num">7</span> Intellectual Property</h2>
                    <p>All content, features, and functionality of AquaQueue — including but not limited to text, graphics, logos, icons, and software — are the exclusive property of AquaQueue and its developers and are protected by Philippine and international intellectual property laws.</p>
                    <p>You may not reproduce, distribute, modify, or create derivative works without our express written consent.</p>
                </div>

                <!-- Section 8 -->
                <div class="doc-section" id="section-8">
                    <h2><span class="toc-num">8</span> Limitation of Liability</h2>
                    <p>To the maximum extent permitted by applicable law, AquaQueue and its developers shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including loss of data, revenue, or goodwill arising from:</p>
                    <ul>
                        <li>Your use or inability to use the Service</li>
                        <li>Any conduct or content of third-party service providers</li>
                        <li>Unauthorized access to or alteration of your data</li>
                        <li>Any other matter relating to the Service</li>
                    </ul>
                </div>

                <!-- Section 9 -->
                <div class="doc-section" id="section-9">
                    <h2><span class="toc-num">9</span> Termination</h2>
                    <p>We reserve the right to suspend or permanently terminate your account at our discretion, without prior notice, if you violate these Terms of Service or engage in conduct that we determine to be harmful to other users, service providers, or the platform itself.</p>
                    <p>You may delete your account at any time by contacting us at <a href="mailto:t.gil0409@gmail.com" class="text-[#71C9CE] font-semibold">t.gil0409@gmail.com</a>.</p>
                </div>

                <!-- Section 10 -->
                <div class="doc-section" id="section-10">
                    <h2><span class="toc-num">10</span> Changes to Terms</h2>
                    <p>We may update these Terms of Service from time to time. When we do, we will revise the "Last Updated" date at the top of this page. Your continued use of the Service after any changes constitutes your acceptance of the new terms.</p>
                    <p>We encourage you to review these terms periodically to stay informed of any updates.</p>
                </div>

                <!-- Section 11 -->
                <div class="doc-section" id="section-11">
                    <h2><span class="toc-num">11</span> Contact Information</h2>
                    <p>If you have any questions about these Terms of Service, please contact us:</p>
                    <ul>
                        <li><strong>Email:</strong> <a href="mailto:t.gil0409@gmail.com" class="text-[#71C9CE] font-semibold">t.gil0409@gmail.com</a></li>
                        <li><strong>Developers:</strong> Gil A. Tabanag & Carl David L. Binghay</li>
                        <li><strong>Location:</strong> Quezon City, Metro Manila, Philippines</li>
                    </ul>
                </div>

            </div>

            <!-- Accept banner -->
            <div class="accept-banner">
                <div>
                    <div class="font-bold text-[#0d1117] text-sm font-['Sora']">Ready to get started?</div>
                    <div class="text-xs text-[#6b7a8d] mt-0.5">By registering, you confirm you have read and agree to these terms.</div>
                </div>
                <a href="register.php" class="btn-accept">
                    <i class="fas fa-check-circle"></i> I Agree — Go to Register
                </a>
            </div>

        </div>

        <p class="text-center text-xs text-[#9ca3af] mt-6">
            Also read our <a href="privacy.php" class="text-[#71C9CE] font-semibold hover:underline">Privacy Policy</a>
            &nbsp;·&nbsp;
            <a href="index.php" class="text-[#71C9CE] font-semibold hover:underline">Back to Home</a>
        </p>

    </div>
</div>

<?php include('../includes/footer.php'); ?>
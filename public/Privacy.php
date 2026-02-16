<?php
session_start();
$pageTitle = "Privacy Policy - AquaQueue";
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

.doc-banner {
    background: linear-gradient(135deg, #4db8be 0%, #3aabb1 100%);
    padding: 2.5rem 2.5rem 2rem;
    position: relative; overflow: hidden;
}
.doc-banner::before {
    content:''; position:absolute;
    width:300px; height:300px; border-radius:50%;
    background:rgba(255,255,255,0.07);
    top:-80px; right:-60px;
}
.doc-banner::after {
    content:''; position:absolute;
    width:180px; height:180px; border-radius:50%;
    background:rgba(255,255,255,0.05);
    bottom:-50px; left:40px;
}

.toc {
    background:#f0fdfd; border:1px solid #A6E3E9;
    border-radius:1rem; padding:1.25rem 1.5rem; margin-bottom:2.5rem;
}
.toc-item {
    display:flex; align-items:center; gap:10px;
    padding:6px 0; color:#3aabb1;
    font-size:0.875rem; font-weight:500;
    text-decoration:none; transition:color 0.2s;
    border-bottom:1px solid rgba(166,227,233,0.3);
}
.toc-item:last-child { border-bottom:none; }
.toc-item:hover { color:#0d1117; }
.toc-num {
    width:22px; height:22px; border-radius:6px;
    background:linear-gradient(135deg,#71C9CE,#4db8be);
    color:white; font-size:0.7rem; font-weight:700;
    display:inline-flex; align-items:center; justify-content:center; flex-shrink:0;
}

.doc-section { margin-bottom:2.5rem; scroll-margin-top:80px; }
.doc-section h2 {
    font-size:1.15rem; font-weight:700; color:#0d1117;
    display:flex; align-items:center; gap:10px;
    margin-bottom:0.875rem;
    padding-bottom:0.625rem;
    border-bottom:2px solid #E3FDFD;
}
.doc-section p  { font-size:0.9rem; color:#4b5563; line-height:1.8; margin-bottom:0.75rem; }
.doc-section ul { padding-left:0; list-style:none; margin-bottom:0.75rem; }
.doc-section ul li {
    font-size:0.9rem; color:#4b5563;
    line-height:1.8; padding:3px 0 3px 1.5rem; position:relative;
}
.doc-section ul li::before {
    content:''; position:absolute; left:0; top:12px;
    width:7px; height:7px; border-radius:50%; background:#71C9CE;
}

.highlight-box {
    background:#f0fdfd; border-left:3px solid #71C9CE;
    border-radius:0 10px 10px 0; padding:12px 16px;
    font-size:0.875rem; color:#3aabb1; font-weight:500;
    margin:1rem 0; line-height:1.6;
}
.info-box {
    background:#f0f9ff; border-left:3px solid #3b82f6;
    border-radius:0 10px 10px 0; padding:12px 16px;
    font-size:0.875rem; color:#1e40af;
    margin:1rem 0; line-height:1.6;
}

/* Data table */
.data-table { width:100%; border-collapse:collapse; margin:1rem 0; font-size:0.875rem; }
.data-table th {
    background:#f0fdfd; color:#3aabb1;
    font-family:'Sora',sans-serif; font-weight:700;
    padding:10px 14px; text-align:left;
    border-bottom:2px solid #A6E3E9;
}
.data-table td { padding:10px 14px; border-bottom:1px solid #f3f4f6; color:#4b5563; }
.data-table tr:hover td { background:#fafffe; }

.back-btn {
    display:inline-flex; align-items:center; gap:8px;
    padding:10px 20px; border-radius:10px;
    border:1.5px solid #A6E3E9; color:#3aabb1;
    font-weight:600; font-size:0.875rem;
    font-family:'Sora',sans-serif;
    text-decoration:none; background:white;
    transition:all 0.2s; margin-bottom:1.5rem;
}
.back-btn:hover { background:#f0fdfd; border-color:#71C9CE; }

.accept-banner {
    background:linear-gradient(135deg,#E3FDFD,#cbf5f7);
    border-top:1px solid #A6E3E9;
    padding:1.5rem 2.5rem;
    display:flex; flex-wrap:wrap;
    align-items:center; justify-content:space-between; gap:1rem;
}
.btn-accept {
    display:inline-flex; align-items:center; gap:8px;
    padding:11px 28px;
    background:linear-gradient(135deg,#71C9CE,#4db8be);
    color:white; border:none; border-radius:10px;
    font-family:'Sora',sans-serif; font-weight:600; font-size:0.875rem;
    cursor:pointer; text-decoration:none;
    box-shadow:0 4px 16px rgba(113,201,206,0.35);
    transition:all 0.2s;
}
.btn-accept:hover { transform:translateY(-1px); box-shadow:0 8px 22px rgba(113,201,206,0.4); }
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
                            <i class="fas fa-shield-alt text-white text-lg"></i>
                        </div>
                        <span class="text-white/80 text-sm font-semibold uppercase tracking-widest">Legal</span>
                    </div>
                    <a href="Privacy.php" class="text-3xl font-extrabold text-white mb-2">Privacy Policy</a>
                    <div class="flex flex-wrap gap-4 text-white/75 text-sm">
                        <span><i class="fas fa-calendar-alt mr-1.5"></i>Effective: February 16, 2026</span>
                        <span><i class="fas fa-sync-alt mr-1.5"></i>Last Updated: February 16, 2026</span>
                        <span><i class="fas fa-balance-scale mr-1.5"></i>RA 10173 Compliant</span>
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="p-8 md:p-10">

                <div class="highlight-box mb-6">
                    <i class="fas fa-lock mr-2"></i>
                    AquaQueue is committed to protecting your personal data. This Privacy Policy explains what we collect, why we collect it, and how we keep it safe — in plain language.
                </div>

                <!-- TOC -->
                <div class="toc mb-8">
                    <div class="font-bold text-[#0d1117] text-sm mb-3 font-['Sora']">
                        <i class="fas fa-list mr-2 text-[#71C9CE]"></i>Table of Contents
                    </div>
                    <?php
                    $sections = [
                        'Who We Are',
                        'What Data We Collect',
                        'How We Use Your Data',
                        'Legal Basis for Processing',
                        'Data Sharing & Third Parties',
                        'Data Retention',
                        'Your Rights Under RA 10173',
                        'Cookies & Tracking',
                        'Data Security',
                        'Children\'s Privacy',
                        'Changes to This Policy',
                        'Contact Us',
                    ];
                    foreach ($sections as $i => $s):
                    ?>
                    <a href="#priv-<?= $i+1 ?>" class="toc-item">
                        <span class="toc-num"><?= $i+1 ?></span><?= $s ?>
                    </a>
                    <?php endforeach; ?>
                </div>

                <!-- 1 -->
                <div class="doc-section" id="priv-1">
                    <h2><span class="toc-num">1</span> Who We Are</h2>
                    <p>AquaQueue ("we", "us", "our") is an appointment and queue management platform developed by <strong>Gil A. Tabanag</strong> and <strong>Carl David L. Binghay</strong>, based in Quezon City, Metro Manila, Philippines.</p>
                    <p>For any privacy-related concerns, you may contact us at <a href="mailto:t.gil0409@gmail.com" class="text-[#71C9CE] font-semibold">t.gil0409@gmail.com</a>.</p>
                </div>

                <!-- 2 -->
                <div class="doc-section" id="priv-2">
                    <h2><span class="toc-num">2</span> What Data We Collect</h2>
                    <p>We collect the following categories of personal data when you use AquaQueue:</p>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Examples</th>
                                <th>When Collected</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Account Information</td><td>Name, email address, password (hashed)</td><td>Registration</td></tr>
                            <tr><td>Booking Data</td><td>Service type, location, date, time, priority</td><td>When booking</td></tr>
                            <tr><td>Usage Data</td><td>Pages visited, clicks, session duration</td><td>Automatically</td></tr>
                            <tr><td>Device Data</td><td>Browser type, IP address, OS</td><td>Automatically</td></tr>
                            <tr><td>Communications</td><td>Messages sent via contact form</td><td>When you contact us</td></tr>
                        </tbody>
                    </table>
                    <p>We do <strong>not</strong> collect sensitive personal information such as government IDs, financial data, or health records unless explicitly required and consented to.</p>
                </div>

                <!-- 3 -->
                <div class="doc-section" id="priv-3">
                    <h2><span class="toc-num">3</span> How We Use Your Data</h2>
                    <p>We use your personal data strictly for the following purposes:</p>
                    <ul>
                        <li>Creating and managing your AquaQueue account</li>
                        <li>Processing and confirming your appointment bookings</li>
                        <li>Sending booking confirmations and reminders via email</li>
                        <li>Improving the performance and features of our platform</li>
                        <li>Responding to your support inquiries</li>
                        <li>Ensuring compliance with legal obligations</li>
                    </ul>
                    <div class="highlight-box">
                        <i class="fas fa-ban mr-2"></i>
                        We will <strong>never</strong> sell, rent, or trade your personal data to third parties for marketing purposes.
                    </div>
                </div>

                <!-- 4 -->
                <div class="doc-section" id="priv-4">
                    <h2><span class="toc-num">4</span> Legal Basis for Processing</h2>
                    <p>Under the Data Privacy Act of 2012 (Republic Act No. 10173), we process your personal data based on the following legal grounds:</p>
                    <ul>
                        <li><strong>Consent</strong> — when you register an account or agree to these policies</li>
                        <li><strong>Contractual necessity</strong> — to fulfill your appointment bookings</li>
                        <li><strong>Legitimate interests</strong> — to improve our platform and prevent fraud</li>
                        <li><strong>Legal obligation</strong> — when required by applicable Philippine law</li>
                    </ul>
                </div>

                <!-- 5 -->
                <div class="doc-section" id="priv-5">
                    <h2><span class="toc-num">5</span> Data Sharing & Third Parties</h2>
                    <p>We may share limited data with trusted third parties only as necessary:</p>
                    <ul>
                        <li><strong>Service Providers</strong> — businesses listed on AquaQueue receive only the booking details needed to serve you</li>
                        <li><strong>Email Services</strong> — to deliver booking confirmations and notifications</li>
                        <li><strong>Hosting Providers</strong> — to maintain platform infrastructure securely</li>
                    </ul>
                    <div class="info-box">
                        <i class="fas fa-info-circle mr-2"></i>
                        All third-party partners are contractually required to protect your data and may not use it for their own purposes.
                    </div>
                </div>

                <!-- 6 -->
                <div class="doc-section" id="priv-6">
                    <h2><span class="toc-num">6</span> Data Retention</h2>
                    <p>We retain your personal data only for as long as necessary to fulfill the purposes outlined in this policy:</p>
                    <ul>
                        <li>Account data is retained for the duration of your account plus 1 year</li>
                        <li>Booking records are retained for 2 years for dispute resolution purposes</li>
                        <li>Usage logs are retained for up to 90 days</li>
                    </ul>
                    <p>You may request deletion of your account and associated data at any time by contacting us.</p>
                </div>

                <!-- 7 -->
                <div class="doc-section" id="priv-7">
                    <h2><span class="toc-num">7</span> Your Rights Under RA 10173</h2>
                    <p>As a data subject under the Data Privacy Act of 2012, you have the following rights:</p>
                    <ul>
                        <li><strong>Right to be Informed</strong> — to know how your data is collected and used</li>
                        <li><strong>Right to Access</strong> — to request a copy of the personal data we hold about you</li>
                        <li><strong>Right to Correction</strong> — to have inaccurate data corrected</li>
                        <li><strong>Right to Erasure</strong> — to request deletion of your data under certain conditions</li>
                        <li><strong>Right to Object</strong> — to object to processing based on legitimate interests</li>
                        <li><strong>Right to Data Portability</strong> — to receive your data in a usable format</li>
                    </ul>
                    <p>To exercise any of these rights, contact us at <a href="mailto:t.gil0409@gmail.com" class="text-[#71C9CE] font-semibold">t.gil0409@gmail.com</a>. We will respond within 15 business days.</p>
                </div>

                <!-- 8 -->
                <div class="doc-section" id="priv-8">
                    <h2><span class="toc-num">8</span> Cookies & Tracking</h2>
                    <p>AquaQueue uses PHP sessions and minimal cookies to:</p>
                    <ul>
                        <li>Keep you logged in during your session</li>
                        <li>Remember your preferences</li>
                        <li>Ensure platform security</li>
                    </ul>
                    <p>We do not use third-party advertising cookies or behavioral tracking. You may disable cookies in your browser settings, though this may affect platform functionality.</p>
                </div>

                <!-- 9 -->
                <div class="doc-section" id="priv-9">
                    <h2><span class="toc-num">9</span> Data Security</h2>
                    <p>We implement appropriate technical and organizational measures to protect your personal data, including:</p>
                    <ul>
                        <li>Password hashing using industry-standard algorithms</li>
                        <li>HTTPS encryption for all data in transit</li>
                        <li>Regular security reviews of our codebase</li>
                        <li>Restricted access to personal data on a need-to-know basis</li>
                    </ul>
                    <div class="highlight-box">
                        <i class="fas fa-shield-alt mr-2"></i>
                        While we take every precaution, no system is 100% secure. Please use a strong, unique password for your AquaQueue account.
                    </div>
                </div>

                <!-- 10 -->
                <div class="doc-section" id="priv-10">
                    <h2><span class="toc-num">10</span> Children's Privacy</h2>
                    <p>AquaQueue is not directed to children under the age of 18. We do not knowingly collect personal data from minors. If you believe a minor has created an account, please contact us immediately and we will delete the account and associated data.</p>
                </div>

                <!-- 11 -->
                <div class="doc-section" id="priv-11">
                    <h2><span class="toc-num">11</span> Changes to This Policy</h2>
                    <p>We may update this Privacy Policy from time to time. The "Last Updated" date at the top will reflect any changes. We encourage you to review this policy periodically. Continued use of AquaQueue after changes constitutes acceptance of the updated policy.</p>
                </div>

                <!-- 12 -->
                <div class="doc-section" id="priv-12">
                    <h2><span class="toc-num">12</span> Contact Us</h2>
                    <p>For privacy-related questions, data requests, or concerns, please reach out to us:</p>
                    <ul>
                        <li><strong>Email:</strong> <a href="mailto:t.gil0409@gmail.com" class="text-[#71C9CE] font-semibold">t.gil0409@gmail.com</a></li>
                        <li><strong>Data Controllers:</strong> Gil A. Tabanag & Carl David L. Binghay</li>
                        <li><strong>Location:</strong> Quezon City, Metro Manila, Philippines</li>
                    </ul>
                    <p>You also have the right to lodge a complaint with the <strong>National Privacy Commission (NPC)</strong> of the Philippines if you believe your data privacy rights have been violated.</p>
                </div>

            </div>

            <!-- Accept banner -->
            <div class="accept-banner">
                <div>
                    <div class="font-bold text-[#0d1117] text-sm font-['Sora']">Your privacy is our priority.</div>
                    <div class="text-xs text-[#6b7a8d] mt-0.5">By registering, you acknowledge you've read and understood this policy.</div>
                </div>
                <a href="register.php" class="btn-accept">
                    <i class="fas fa-check-circle"></i> I Understand — Go to Register
                </a>
            </div>

        </div>

        <p class="text-center text-xs text-[#9ca3af] mt-6">
            Also read our <a href="terms.php" class="text-[#71C9CE] font-semibold hover:underline">Terms of Service</a>
            &nbsp;·&nbsp;
            <a href="index.php" class="text-[#71C9CE] font-semibold hover:underline">Back to Home</a>
        </p>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
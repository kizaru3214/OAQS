<?php
session_start();
$pageTitle = "Forgot Password - AquaQueue";
include('../includes/header.php');
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap');

body { font-family: 'DM Sans', sans-serif; }
h1, h2, h3 { font-family: 'Sora', sans-serif; }

/* ── Card wrapper ───────────────────────────────────────────── */
.auth-card {
    background: #ffffff;
    border-radius: 1.5rem;
    box-shadow: 0 8px 40px rgba(113,201,206,0.13), 0 1px 0 rgba(255,255,255,0.9) inset;
    padding: 2.5rem 2rem;
    width: 100%;
    max-width: 480px;
    margin: 0 auto;
}

/* ── Icon badge ─────────────────────────────────────────────── */
.icon-badge {
    width: 64px; height: 64px;
    border-radius: 16px;
    background: linear-gradient(135deg, #E3FDFD 0%, #A6E3E9 100%);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.6rem;
    color: #4db8be;
}

/* ── Input ──────────────────────────────────────────────────── */
.auth-input {
    width: 100%;
    padding: 13px 16px;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    font-size: 0.95rem;
    font-family: 'DM Sans', sans-serif;
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
    color: #0d1117;
}
.auth-input:focus {
    border-color: #71C9CE;
    box-shadow: 0 0 0 3px rgba(113,201,206,0.15);
}
.auth-input::placeholder { color: #9ca3af; }

/* ── Submit button ──────────────────────────────────────────── */
.btn-submit {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #71C9CE 0%, #4db8be 100%);
    color: white;
    font-family: 'Sora', sans-serif;
    font-weight: 600;
    font-size: 0.95rem;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    box-shadow: 0 6px 20px rgba(113,201,206,0.4);
    transition: all 0.25s ease;
}
.btn-submit:hover { transform: translateY(-1px); box-shadow: 0 10px 28px rgba(113,201,206,0.45); }
.btn-submit:active { transform: translateY(0); }

/* ── Step views ─────────────────────────────────────────────── */
.step { display: none; }
.step.active { display: block; }

/* ── Progress dots ──────────────────────────────────────────── */
.progress-dots { display: flex; gap: 6px; justify-content: center; margin-bottom: 1.5rem; }
.dot {
    width: 8px; height: 8px; border-radius: 50%;
    background: #e5e7eb;
    transition: all 0.3s ease;
}
.dot.active { background: #71C9CE; width: 24px; border-radius: 4px; }
.dot.done   { background: #A6E3E9; }

/* ── Success checkmark ──────────────────────────────────────── */
@keyframes checkPop {
    0%   { transform: scale(0) rotate(-10deg); opacity: 0; }
    70%  { transform: scale(1.15) rotate(3deg); }
    100% { transform: scale(1) rotate(0); opacity: 1; }
}
.check-icon { animation: checkPop 0.5s cubic-bezier(.22,.68,0,1.2) forwards; }

/* ── OTP inputs ─────────────────────────────────────────────── */
.otp-grid { display: flex; gap: 10px; justify-content: center; }
.otp-input {
    width: 52px; height: 58px;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1.4rem;
    font-weight: 700;
    font-family: 'Sora', sans-serif;
    text-align: center;
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
    color: #0d1117;
}
.otp-input:focus {
    border-color: #71C9CE;
    box-shadow: 0 0 0 3px rgba(113,201,206,0.15);
}

/* ── Password strength bar ──────────────────────────────────── */
.strength-bar { height: 4px; border-radius: 2px; background: #f3f4f6; overflow: hidden; margin-top: 8px; }
.strength-fill { height: 100%; border-radius: 2px; transition: width 0.3s ease, background 0.3s ease; width: 0%; }

/* ── Divider ────────────────────────────────────────────────── */
.divider {
    display: flex; align-items: center; gap: 12px;
    color: #9ca3af; font-size: 0.8rem; margin: 1.25rem 0;
}
.divider::before, .divider::after {
    content: ''; flex: 1; height: 1px; background: #f3f4f6;
}
</style>

<div class="min-h-screen flex items-center justify-center py-12 px-4"
     style="background: linear-gradient(135deg,#f0fdfd 0%,#e8f9f9 50%,#f5fffe 100%)">

    <div class="auth-card">

        <!-- Progress dots -->
        <div class="progress-dots">
            <div class="dot active" id="dot-1"></div>
            <div class="dot"       id="dot-2"></div>
            <div class="dot"       id="dot-3"></div>
        </div>

        <!-- ── STEP 1: Enter Email ──────────────────────────── -->
        <div class="step active" id="step-1">
            <div class="icon-badge">
                <i class="fas fa-lock-open"></i>
            </div>

            <h1 class="text-2xl font-bold text-[#0d1117] text-center mb-1">Forgot your password?</h1>
            <p class="text-sm text-[#6b7a8d] text-center mb-6">
                No worries. Enter your email and we'll send you a reset code.
            </p>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-[#374151] mb-1.5">Email address</label>
                <input id="reset-email" type="email" class="auth-input" placeholder="Enter your email address">
                <p id="email-error" class="text-xs text-red-500 mt-1.5 hidden">Please enter a valid email address.</p>
            </div>

            <button class="btn-submit" onclick="goToStep2()">
                <i class="fas fa-paper-plane"></i> Send Reset Code
            </button>

            <p class="text-center text-sm text-[#6b7a8d] mt-5">
                Remembered it?
                <a href="login.php" class="text-[#71C9CE] font-semibold hover:underline">Back to Sign in</a>
            </p>
        </div>

        <!-- ── STEP 2: Enter OTP ────────────────────────────── -->
        <div class="step" id="step-2">
            <div class="icon-badge">
                <i class="fas fa-shield-alt"></i>
            </div>

            <h1 class="text-2xl font-bold text-[#0d1117] text-center mb-1">Check your email</h1>
            <p class="text-sm text-[#6b7a8d] text-center mb-1">
                We sent a 6-digit code to
            </p>
            <p id="display-email" class="text-sm font-semibold text-[#71C9CE] text-center mb-6"></p>

            <div class="otp-grid mb-2" id="otp-grid">
                <?php for ($i = 1; $i <= 6; $i++): ?>
                <input type="text" maxlength="1" class="otp-input" id="otp-<?= $i ?>"
                       oninput="otpInput(this, <?= $i ?>)"
                       onkeydown="otpKeydown(event, <?= $i ?>)">
                <?php endfor; ?>
            </div>
            <p id="otp-error" class="text-xs text-red-500 text-center mt-1.5 mb-4 hidden">Incorrect code. Please try again.</p>

            <button class="btn-submit mb-4" onclick="verifyOTP()">
                <i class="fas fa-check-circle"></i> Verify Code
            </button>

            <p class="text-center text-xs text-[#9ca3af]">
                Didn't receive it?
                <button onclick="resendCode()" class="text-[#71C9CE] font-semibold hover:underline" id="resend-btn">
                    Resend code
                </button>
                <span id="resend-timer" class="hidden text-[#9ca3af]">in <span id="timer-count">30</span>s</span>
            </p>

            <p class="text-center text-sm text-[#6b7a8d] mt-4">
                <button onclick="goToStep(1)" class="text-[#71C9CE] font-semibold hover:underline">
                    ← Change email
                </button>
            </p>
        </div>

        <!-- ── STEP 3: New Password ─────────────────────────── -->
        <div class="step" id="step-3">
            <div class="icon-badge">
                <i class="fas fa-key"></i>
            </div>

            <h1 class="text-2xl font-bold text-[#0d1117] text-center mb-1">Set new password</h1>
            <p class="text-sm text-[#6b7a8d] text-center mb-6">
                Choose a strong password you haven't used before.
            </p>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-[#374151] mb-1.5">New Password</label>
                <div class="relative">
                    <input id="new-password" type="password" class="auth-input pr-10"
                           placeholder="Enter new password" oninput="checkStrength()">
                    <button type="button" onclick="togglePass('new-password', 'eye-1')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#71C9CE]">
                        <i class="fas fa-eye text-sm" id="eye-1"></i>
                    </button>
                </div>
                <!-- Strength bar -->
                <div class="strength-bar mt-2">
                    <div class="strength-fill" id="strength-fill"></div>
                </div>
                <p id="strength-label" class="text-xs mt-1 text-[#9ca3af]">Enter a password</p>
            </div>

            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#374151] mb-1.5">Confirm Password</label>
                <div class="relative">
                    <input id="confirm-password" type="password" class="auth-input pr-10"
                           placeholder="Re-enter new password">
                    <button type="button" onclick="togglePass('confirm-password', 'eye-2')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#71C9CE]">
                        <i class="fas fa-eye text-sm" id="eye-2"></i>
                    </button>
                </div>
                <p id="match-error" class="text-xs text-red-500 mt-1.5 hidden">Passwords do not match.</p>
            </div>

            <button class="btn-submit" onclick="resetPassword()">
                <i class="fas fa-lock"></i> Reset Password
            </button>
        </div>

        <!-- ── STEP 4: Success ──────────────────────────────── -->
        <div class="step" id="step-4">
            <div class="check-icon w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-5"
                 style="background:linear-gradient(135deg,#E3FDFD,#A6E3E9); display:none;">
                <i class="fas fa-check text-3xl text-[#4db8be]"></i>
            </div>

            <h1 class="text-2xl font-bold text-[#0d1117] text-center mb-2">Password reset!</h1>
            <p class="text-sm text-[#6b7a8d] text-center mb-8">
                Your password has been successfully updated. You can now sign in with your new password.
            </p>

            <a href="login.php" class="btn-submit" style="text-decoration:none;">
                <i class="fas fa-sign-in-alt"></i> Back to Sign In
            </a>
        </div>

    </div>
</div>

<script>
let currentStep = 1;
let correctOTP  = '';
let resendInterval;

// ── Step navigation ───────────────────────────────────────────
function goToStep(n) {
    document.getElementById('step-' + currentStep).classList.remove('active');
    document.getElementById('step-' + n).classList.add('active');

    // Update dots (max 3 shown)
    for (let i = 1; i <= 3; i++) {
        const dot = document.getElementById('dot-' + i);
        if (!dot) continue;
        dot.className = 'dot';
        if (i < n)  dot.classList.add('done');
        if (i === Math.min(n, 3)) dot.classList.add('active');
    }
    currentStep = n;
}

// ── Step 1 → 2 ───────────────────────────────────────────────
function goToStep2() {
    const email = document.getElementById('reset-email').value.trim();
    const err   = document.getElementById('email-error');
    const re    = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!re.test(email)) {
        err.classList.remove('hidden');
        document.getElementById('reset-email').focus();
        return;
    }
    err.classList.add('hidden');
    document.getElementById('display-email').textContent = email;

    // Simulate sending OTP (replace with real AJAX call)
    correctOTP = Math.floor(100000 + Math.random() * 900000).toString();
    console.log('OTP (dev only):', correctOTP); // remove in production!

    goToStep(2);
    startResendTimer();
    document.getElementById('otp-1').focus();
}

// ── OTP input helpers ─────────────────────────────────────────
function otpInput(el, idx) {
    el.value = el.value.replace(/\D/g, '').slice(-1);
    if (el.value && idx < 6) document.getElementById('otp-' + (idx + 1)).focus();
}

function otpKeydown(e, idx) {
    if (e.key === 'Backspace' && !document.getElementById('otp-' + idx).value && idx > 1) {
        document.getElementById('otp-' + (idx - 1)).focus();
    }
}

// ── Verify OTP ────────────────────────────────────────────────
function verifyOTP() {
    let code = '';
    for (let i = 1; i <= 6; i++) code += document.getElementById('otp-' + i).value;

    if (code.length < 6) {
        document.getElementById('otp-error').textContent = 'Please enter all 6 digits.';
        document.getElementById('otp-error').classList.remove('hidden');
        return;
    }
    if (code !== correctOTP) {
        document.getElementById('otp-error').textContent = 'Incorrect code. Please try again.';
        document.getElementById('otp-error').classList.remove('hidden');
        document.querySelectorAll('.otp-input').forEach(i => {
            i.style.borderColor = '#ef4444';
            setTimeout(() => i.style.borderColor = '', 1200);
        });
        return;
    }
    document.getElementById('otp-error').classList.add('hidden');
    goToStep(3);
}

// ── Resend timer ──────────────────────────────────────────────
function startResendTimer() {
    let count = 30;
    document.getElementById('resend-btn').classList.add('hidden');
    document.getElementById('resend-timer').classList.remove('hidden');
    document.getElementById('timer-count').textContent = count;

    clearInterval(resendInterval);
    resendInterval = setInterval(() => {
        count--;
        document.getElementById('timer-count').textContent = count;
        if (count <= 0) {
            clearInterval(resendInterval);
            document.getElementById('resend-timer').classList.add('hidden');
            document.getElementById('resend-btn').classList.remove('hidden');
        }
    }, 1000);
}

function resendCode() {
    correctOTP = Math.floor(100000 + Math.random() * 900000).toString();
    console.log('New OTP (dev only):', correctOTP);
    for (let i = 1; i <= 6; i++) document.getElementById('otp-' + i).value = '';
    document.getElementById('otp-error').classList.add('hidden');
    document.getElementById('otp-1').focus();
    startResendTimer();
}

// ── Password strength ─────────────────────────────────────────
function checkStrength() {
    const pw  = document.getElementById('new-password').value;
    const bar = document.getElementById('strength-fill');
    const lbl = document.getElementById('strength-label');

    let score = 0;
    if (pw.length >= 8)         score++;
    if (/[A-Z]/.test(pw))       score++;
    if (/[0-9]/.test(pw))       score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;

    const levels = [
        { w: '0%',   c: '#e5e7eb', t: 'Enter a password',  tc: '#9ca3af' },
        { w: '25%',  c: '#ef4444', t: 'Weak',               tc: '#ef4444' },
        { w: '50%',  c: '#f59e0b', t: 'Fair',               tc: '#f59e0b' },
        { w: '75%',  c: '#3b82f6', t: 'Good',               tc: '#3b82f6' },
        { w: '100%', c: '#22c55e', t: 'Strong ✓',           tc: '#22c55e' },
    ];

    const lvl = pw.length === 0 ? levels[0] : levels[score];
    bar.style.width      = lvl.w;
    bar.style.background = lvl.c;
    lbl.textContent      = lvl.t;
    lbl.style.color      = lvl.tc;
}

// ── Toggle password visibility ────────────────────────────────
function togglePass(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'fas fa-eye-slash text-sm';
    } else {
        input.type = 'password';
        icon.className = 'fas fa-eye text-sm';
    }
}

// ── Step 3 → 4 ───────────────────────────────────────────────
function resetPassword() {
    const pw  = document.getElementById('new-password').value;
    const cpw = document.getElementById('confirm-password').value;
    const err = document.getElementById('match-error');

    if (pw.length < 8) {
        document.getElementById('strength-label').textContent = 'Password must be at least 8 characters.';
        document.getElementById('strength-label').style.color = '#ef4444';
        return;
    }
    if (pw !== cpw) {
        err.classList.remove('hidden');
        return;
    }
    err.classList.add('hidden');

    // Show step 4 success
    document.getElementById('step-' + currentStep).classList.remove('active');
    currentStep = 4;
    document.getElementById('step-4').classList.add('active');

    // Animate the check icon
    const check = document.querySelector('#step-4 .check-icon');
    check.style.display = 'flex';

    // Hide progress dots on success
    document.querySelector('.progress-dots').style.display = 'none';
}
</script>

<?php include('../includes/footer.php'); ?>
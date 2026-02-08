<?php
session_start();
$pageTitle = "Page Title";
include('../includes/header.php');
?>

<div class="py-12">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">Smart Appointment & Queue Management</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-10">Streamline your appointments, reduce waiting times, and manage queues efficiently with our modern solution.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="../public/book.php" class="inline-flex items-center justify-center px-8 py-4 bg-[#71C9CE] text-white font-semibold rounded-xl hover:bg-[#5ab4b9] transition-all shadow-lg hover:shadow-xl">
                <i class="fas fa-calendar-plus mr-2"></i> Book Appointment Now
            </a>
            <a href="../public/queue.php" class="inline-flex items-center justify-center px-8 py-4 bg-white text-gray-800 font-semibold rounded-xl border-2 border-gray-200 hover:border-[#71C9CE] hover:text-[#71C9CE] transition-all">
                <i class="fas fa-list-ol mr-2"></i> Check My Queue
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="grid md:grid-cols-3 gap-8 mb-20">
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#A6E3E9] rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-clock text-[#71C9CE] text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-gray-900">Real-time Queue</h3>
            <p class="text-gray-600 leading-relaxed">Live updates on your queue position and estimated waiting time.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#A6E3E9] rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-mobile-alt text-[#71C9CE] text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-gray-900">Mobile Friendly</h3>
            <p class="text-gray-600 leading-relaxed">Access and manage your appointments from any device.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#A6E3E9] rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-bell text-[#71C9CE] text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-gray-900">Smart Notifications</h3>
            <p class="text-gray-600 leading-relaxed">Get notified when your turn is approaching.</p>
        </div>
    </div>

    <!-- Stats -->
    <div class="bg-white rounded-3xl p-10 mb-20 shadow-sm border border-gray-100">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-[#71C9CE] mb-2">1,500+</div>
                <div class="text-gray-600 font-medium">Appointments Today</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-[#71C9CE] mb-2">98%</div>
                <div class="text-gray-600 font-medium">Satisfaction Rate</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-[#71C9CE] mb-2">15 min</div>
                <div class="text-gray-600 font-medium">Avg. Wait Time</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-[#71C9CE] mb-2">24/7</div>
                <div class="text-gray-600 font-medium">Online Booking</div>
            </div>
        </div>
    </div>

    <!-- How it Works -->
    <div class="mb-16">
        <h2 class="text-4xl font-bold text-center mb-12 text-gray-900">How It Works</h2>
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-[#71C9CE] rounded-2xl flex items-center justify-center text-white text-3xl font-bold mx-auto mb-5 shadow-md">1</div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Book Appointment</h3>
                <p class="text-gray-600">Select your preferred service and time slot</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-[#71C9CE] rounded-2xl flex items-center justify-center text-white text-3xl font-bold mx-auto mb-5 shadow-md">2</div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Get Queue Number</h3>
                <p class="text-gray-600">Receive your position in the queue</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-[#71C9CE] rounded-2xl flex items-center justify-center text-white text-3xl font-bold mx-auto mb-5 shadow-md">3</div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Track & Notify</h3>
                <p class="text-gray-600">Monitor your progress in real-time</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-[#71C9CE] rounded-2xl flex items-center justify-center text-white text-3xl font-bold mx-auto mb-5 shadow-md">4</div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Get Served</h3>
                <p class="text-gray-600">Your turn arrives, get notified</p>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
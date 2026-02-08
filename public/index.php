<?php
session_start();
$pageTitle = "Page Title";
include('../includes/header.php');
?>

<div class="py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Smart Appointment & Queue Management</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Streamline your appointments, reduce waiting times, and manage queues efficiently with our modern solution.</p>
        <div class="mt-8">
            <a href="/queue-system/public/book.php" class="inline-flex items-center px-6 py-3 gradient-bg text-white font-semibold rounded-lg hover:opacity-90">
                <i class="fas fa-calendar-plus mr-2"></i> Book Appointment Now
            </a>
            <a href="/queue-system/public/queue.php" class="ml-4 inline-flex items-center px-6 py-3 bg-white text-purple-600 font-semibold rounded-lg border border-purple-200 hover:bg-purple-50">
                <i class="fas fa-list-ol mr-2"></i> Check My Queue
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="grid md:grid-cols-3 gap-8 mb-16">
        <div class="bg-white p-6 rounded-xl shadow-md card-hover">
            <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-clock text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Real-time Queue</h3>
            <p class="text-gray-600">Live updates on your queue position and estimated waiting time.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md card-hover">
            <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-mobile-alt text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Mobile Friendly</h3>
            <p class="text-gray-600">Access and manage your appointments from any device.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md card-hover">
            <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-bell text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Smart Notifications</h3>
            <p class="text-gray-600">Get notified when your turn is approaching.</p>
        </div>
    </div>

    <!-- Stats -->
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-8 mb-16">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600">1,500+</div>
                <div class="text-gray-600">Appointments Today</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600">98%</div>
                <div class="text-gray-600">Satisfaction Rate</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600">15 min</div>
                <div class="text-gray-600">Avg. Wait Time</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600">24/7</div>
                <div class="text-gray-600">Online Booking</div>
            </div>
        </div>
    </div>

    <!-- How it Works -->
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-center mb-8">How It Works</h2>
        <div class="flex flex-col md:flex-row items-center justify-between space-y-8 md:space-y-0">
            <div class="text-center">
                <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">1</div>
                <h3 class="text-xl font-semibold mb-2">Book Appointment</h3>
                <p class="text-gray-600">Select service and time slot</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-arrow-right text-gray-300 text-2xl"></i>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">2</div>
                <h3 class="text-xl font-semibold mb-2">Get Queue Number</h3>
                <p class="text-gray-600">Receive your position</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-arrow-right text-gray-300 text-2xl"></i>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">3</div>
                <h3 class="text-xl font-semibold mb-2">Track & Notify</h3>
                <p class="text-gray-600">Monitor progress live</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-arrow-right text-gray-300 text-2xl"></i>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">4</div>
                <h3 class="text-xl font-semibold mb-2">Get Served</h3>
                <p class="text-gray-600">Your turn arrives</p>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
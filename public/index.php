<?php
session_start();
$pageTitle = "Home - AquaQueue";
include('../includes/header.php');
?>

<style>
/* Slide-in animations */
@keyframes slideInFromTop {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInFromLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInFromRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInFromBottom {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Apply animations with delays */
.animate-slide-top {
    animation: slideInFromTop 0.8s ease-out forwards;
}

.animate-slide-left {
    animation: slideInFromLeft 0.8s ease-out forwards;
}

.animate-slide-right {
    animation: slideInFromRight 0.8s ease-out forwards;
}

.animate-slide-bottom {
    animation: slideInFromBottom 0.8s ease-out forwards;
}

.animate-fade {
    animation: fadeIn 1s ease-out forwards;
}

/* Delay classes */
.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
.delay-400 { animation-delay: 0.4s; }
.delay-500 { animation-delay: 0.5s; }
.delay-600 { animation-delay: 0.6s; }
.delay-700 { animation-delay: 0.7s; }
.delay-800 { animation-delay: 0.8s; }

/* Initial state - hidden */
.animate-slide-top,
.animate-slide-left,
.animate-slide-right,
.animate-slide-bottom,
.animate-fade {
    opacity: 0;
}
</style>

<div class="py-12">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 animate-slide-top">
            Smart Appointment & Queue Management
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-10 animate-slide-top delay-200">
            Streamline your appointments, reduce waiting times, and manage queues efficiently with our modern solution.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-top delay-400">
            <a href="book.php" class="inline-flex items-center justify-center px-8 py-4 bg-[#71C9CE] text-white font-semibold rounded-xl hover:bg-[#5ab4b9] transition-all shadow-lg hover:shadow-xl">
                <i class="fas fa-calendar-plus mr-2"></i> Book Appointment Now
            </a>
            <a href="queue.php" class="inline-flex items-center justify-center px-8 py-4 bg-white text-gray-800 font-semibold rounded-xl border-2 border-gray-200 hover:border-[#71C9CE] hover:text-[#71C9CE] transition-all">
                <i class="fas fa-list-ol mr-2"></i> Check My Queue
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="grid md:grid-cols-3 gap-8 mb-20">
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 animate-slide-left delay-200">
            <div class="w-14 h-14 bg-[#A6E3E9] rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-clock text-[#71C9CE] text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-gray-900">Real-time Queue</h3>
            <p class="text-gray-600 leading-relaxed">Live updates on your queue position and estimated waiting time.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 animate-slide-bottom delay-400">
            <div class="w-14 h-14 bg-[#A6E3E9] rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-mobile-alt text-[#71C9CE] text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-gray-900">Mobile Friendly</h3>
            <p class="text-gray-600 leading-relaxed">Access and manage your appointments from any device.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 animate-slide-right delay-600">
            <div class="w-14 h-14 bg-[#A6E3E9] rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-bell text-[#71C9CE] text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-gray-900">Smart Notifications</h3>
            <p class="text-gray-600 leading-relaxed">Get notified when your turn is approaching.</p>
        </div>
    </div>

    <!-- Stats -->
    <div class="bg-white rounded-3xl p-10 mb-20 shadow-sm border border-gray-100 animate-slide-bottom delay-300">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center animate-fade delay-500">
                <div class="text-4xl font-bold text-[#71C9CE] mb-2">1,500+</div>
                <div class="text-gray-600 font-medium">Appointments Today</div>
            </div>
            <div class="text-center animate-fade delay-600">
                <div class="text-4xl font-bold text-[#71C9CE] mb-2">98%</div>
                <div class="text-gray-600 font-medium">Satisfaction Rate</div>
            </div>
            <div class="text-center animate-fade delay-700">
                <div class="text-4xl font-bold text-[#71C9CE] mb-2">15 min</div>
                <div class="text-gray-600 font-medium">Avg. Wait Time</div>
            </div>
            <div class="text-center animate-fade delay-800">
                <div class="text-4xl font-bold text-[#71C9CE] mb-2">24/7</div>
                <div class="text-gray-600 font-medium">Online Booking</div>
            </div>
        </div>
    </div>

    <!-- How it Works -->
    <div class="mb-16">
        <h2 class="text-4xl font-bold text-center mb-12 text-gray-900 animate-slide-top delay-200">How It Works</h2>
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center animate-slide-bottom delay-300">
                <div class="w-20 h-20 bg-[#71C9CE] rounded-2xl flex items-center justify-center text-white text-3xl font-bold mx-auto mb-5 shadow-md">1</div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Book Appointment</h3>
                <p class="text-gray-600">Select your preferred service and time slot</p>
            </div>
            <div class="text-center animate-slide-bottom delay-400">
                <div class="w-20 h-20 bg-[#71C9CE] rounded-2xl flex items-center justify-center text-white text-3xl font-bold mx-auto mb-5 shadow-md">2</div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Get Queue Number</h3>
                <p class="text-gray-600">Receive your position in the queue</p>
            </div>
            <div class="text-center animate-slide-bottom delay-500">
                <div class="w-20 h-20 bg-[#71C9CE] rounded-2xl flex items-center justify-center text-white text-3xl font-bold mx-auto mb-5 shadow-md">3</div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Track & Notify</h3>
                <p class="text-gray-600">Monitor your progress in real-time</p>
            </div>
            <div class="text-center animate-slide-bottom delay-600">
                <div class="w-20 h-20 bg-[#71C9CE] rounded-2xl flex items-center justify-center text-white text-3xl font-bold mx-auto mb-5 shadow-md">4</div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Get Served</h3>
                <p class="text-gray-600">Your turn arrives, get notified</p>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
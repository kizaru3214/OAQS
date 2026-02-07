<?php
session_start();
$pageTitle = "Page Title";
include('../includes/header.php');
?>

<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Book New Appointment</h1>
        <p class="text-gray-600 mt-2">Select your service, date, and time slot</p>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Service Selection -->
            <div class="md:col-span-2">
                <h2 class="text-xl font-semibold mb-4">Select Service</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 hover:bg-purple-50 cursor-pointer transition-colors">
                        <div class="text-purple-600 mb-2">
                            <i class="fas fa-stethoscope text-2xl"></i>
                        </div>
                        <h3 class="font-medium">Medical Consultation</h3>
                        <p class="text-sm text-gray-500">30 min • $50</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 hover:bg-purple-50 cursor-pointer transition-colors">
                        <div class="text-purple-600 mb-2">
                            <i class="fas fa-cut text-2xl"></i>
                        </div>
                        <h3 class="font-medium">Hair Salon</h3>
                        <p class="text-sm text-gray-500">60 min • $35</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 hover:bg-purple-50 cursor-pointer transition-colors">
                        <div class="text-purple-600 mb-2">
                            <i class="fas fa-tooth text-2xl"></i>
                        </div>
                        <h3 class="font-medium">Dental Checkup</h3>
                        <p class="text-sm text-gray-500">45 min • $75</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 hover:bg-purple-50 cursor-pointer transition-colors">
                        <div class="text-purple-600 mb-2">
                            <i class="fas fa-legal text-2xl"></i>
                        </div>
                        <h3 class="font-medium">Legal Consultation</h3>
                        <p class="text-sm text-gray-500">60 min • $150</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 hover:bg-purple-50 cursor-pointer transition-colors">
                        <div class="text-purple-600 mb-2">
                            <i class="fas fa-car text-2xl"></i>
                        </div>
                        <h3 class="font-medium">Vehicle Service</h3>
                        <p class="text-sm text-gray-500">90 min • $120</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 hover:bg-purple-50 cursor-pointer transition-colors">
                        <div class="text-purple-600 mb-2">
                            <i class="fas fa-briefcase text-2xl"></i>
                        </div>
                        <h3 class="font-medium">Business Meeting</h3>
                        <p class="text-sm text-gray-500">45 min • $60</p>
                    </div>
                </div>
            </div>

            <!-- Date Selection -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Select Date</h2>
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="text-center mb-4">
                        <div class="text-2xl font-bold text-gray-800">December 2024</div>
                    </div>
                    <div class="grid grid-cols-7 gap-2 text-center">
                        <div class="text-sm text-gray-500 py-2">Sun</div>
                        <div class="text-sm text-gray-500 py-2">Mon</div>
                        <div class="text-sm text-gray-500 py-2">Tue</div>
                        <div class="text-sm text-gray-500 py-2">Wed</div>
                        <div class="text-sm text-gray-500 py-2">Thu</div>
                        <div class="text-sm text-gray-500 py-2">Fri</div>
                        <div class="text-sm text-gray-500 py-2">Sat</div>
                        
                        <?php
                        // Simple calendar days (for demo)
                        for ($i = 1; $i <= 31; $i++) {
                            $class = "py-2 rounded cursor-pointer hover:bg-gray-100";
                            if ($i == date('j')) {
                                $class .= " gradient-bg text-white";
                            } else {
                                $class .= " text-gray-700";
                            }
                            echo "<div class='{$class}'>{$i}</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Time Slots -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Select Time Slot</h2>
            <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-3">
                <?php
                $timeSlots = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'];
                foreach ($timeSlots as $time) {
                    $available = rand(0, 1);
                    $class = $available 
                        ? "border border-purple-500 text-purple-600 hover:bg-purple-50 cursor-pointer"
                        : "border border-gray-200 text-gray-400 cursor-not-allowed bg-gray-50";
                    
                    echo "<div class='text-center py-3 rounded-lg {$class}'>";
                    echo "<span class='font-medium'>{$time}</span>";
                    if (!$available) {
                        echo "<div class='text-xs mt-1'>Booked</div>";
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Additional Information</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
                    <textarea class="w-full border border-gray-300 rounded-lg p-3 focus:ring-purple-500 focus:border-purple-500" rows="3" placeholder="Any special requests or notes..."></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Priority Level</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="priority" class="text-purple-600 focus:ring-purple-500" checked>
                            <span class="ml-2">Standard</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="priority" class="text-purple-600 focus:ring-purple-500">
                            <span class="ml-2">Express</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="priority" class="text-purple-600 focus:ring-purple-500">
                            <span class="ml-2">VIP</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary & Book Button -->
        <div class="mt-8 p-4 bg-gradient-to-r from-purple-50 to-blue-50 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-lg font-semibold">Appointment Summary</div>
                    <div class="text-gray-600">Medical Consultation • Dec 15, 2024 • 10:00 AM</div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-purple-600">$50.00</div>
                    <button class="mt-2 px-6 py-3 gradient-bg text-white font-semibold rounded-lg hover:opacity-90">
                        <i class="fas fa-calendar-check mr-2"></i> Confirm Booking
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Current Queue Status -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Current Queue Status</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Current No.</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Wait Time</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-3">Medical Consultation</td>
                        <td class="px-4 py-3 font-semibold">A-042</td>
                        <td class="px-4 py-3">~15 minutes</td>
                        <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3">Hair Salon</td>
                        <td class="px-4 py-3 font-semibold">B-018</td>
                        <td class="px-4 py-3">~25 minutes</td>
                        <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Medium</span></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3">Dental Checkup</td>
                        <td class="px-4 py-3 font-semibold">C-009</td>
                        <td class="px-4 py-3">~5 minutes</td>
                        <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
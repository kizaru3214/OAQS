<?php
session_start();
$pageTitle = "Page Title";
include('../includes/header.php');
?>

<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">My Queue Status</h1>
        <p class="text-gray-600 mt-2">Track your appointments and queue positions</p>
    </div>

    <!-- Current Queue Card -->
    <div class="bg-gradient-to-r from-purple-600 to-blue-500 rounded-2xl p-8 text-white mb-8">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div>
                <div class="text-lg mb-2">Currently Serving</div>
                <div class="text-5xl font-bold mb-2">A-045</div>
                <div class="flex items-center">
                    <i class="fas fa-user-md mr-2"></i>
                    <span>Medical Consultation</span>
                </div>
            </div>
            <div class="text-center mt-6 md:mt-0">
                <div class="text-2xl font-bold mb-2">Your Position</div>
                <div class="text-6xl font-bold">#3</div>
                <div class="mt-2">Next in approximately 15 minutes</div>
            </div>
            <div class="text-center mt-6 md:mt-0">
                <div class="text-2xl font-bold mb-2">Queue Number</div>
                <div class="text-5xl font-bold mb-4">A-048</div>
                <button class="bg-white text-purple-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100">
                    <i class="fas fa-qrcode mr-2"></i> Show QR Code
                </button>
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div class="mt-8">
            <div class="flex justify-between text-sm mb-2">
                <span>Queue Progress</span>
                <span>75% complete</span>
            </div>
            <div class="w-full bg-white bg-opacity-30 rounded-full h-3">
                <div class="bg-white h-3 rounded-full" style="width: 75%"></div>
            </div>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Upcoming Appointments -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold mb-6">Upcoming Appointments</h2>
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 transition-colors">
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-stethoscope text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold">Medical Consultation</div>
                                        <div class="text-sm text-gray-600">Dr. Smith • Room 302</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-bold text-purple-600">A-048</div>
                                <div class="text-sm text-gray-600">Today, 10:30 AM</div>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full mr-3">In Queue</span>
                            <span class="text-gray-600"><i class="fas fa-clock mr-1"></i> Est. wait: 15 min</span>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-tooth text-gray-500"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold">Dental Checkup</div>
                                        <div class="text-sm text-gray-600">Dr. Johnson • Clinic B</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-bold text-gray-600">C-012</div>
                                <div class="text-sm text-gray-600">Tomorrow, 2:00 PM</div>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full mr-3">Scheduled</span>
                            <button class="text-red-600 hover:text-red-800 ml-auto">
                                <i class="fas fa-times mr-1"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Queue History -->
            <div class="bg-white rounded-xl shadow-md p-6 mt-8">
                <h2 class="text-xl font-semibold mb-6">Recent Queue History</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Queue No.</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Wait Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            $history = [
                                ['2024-12-10', 'Medical Consultation', 'A-039', 'Completed', '12 min'],
                                ['2024-12-08', 'Hair Salon', 'B-022', 'Completed', '18 min'],
                                ['2024-12-05', 'Dental Checkup', 'C-007', 'Completed', '8 min'],
                                ['2024-12-01', 'Legal Consultation', 'D-015', 'Completed', '25 min'],
                                ['2024-11-28', 'Vehicle Service', 'E-031', 'Completed', '45 min'],
                            ];
                            
                            foreach ($history as $item) {
                                echo "<tr>";
                                echo "<td class='px-4 py-3'>{$item[0]}</td>";
                                echo "<td class='px-4 py-3'>{$item[1]}</td>";
                                echo "<td class='px-4 py-3 font-semibold'>{$item[2]}</td>";
                                echo "<td class='px-4 py-3'><span class='px-2 py-1 text-xs rounded-full bg-green-100 text-green-800'>{$item[3]}</span></td>";
                                echo "<td class='px-4 py-3'>{$item[4]}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div>
            <!-- Notification Panel -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Notifications</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-bell text-blue-600"></i>
                        </div>
                        <div>
                            <div class="font-medium">Your turn is next</div>
                            <div class="text-sm text-gray-600">Queue A-047 is being served</div>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <div class="font-medium">Appointment confirmed</div>
                            <div class="text-sm text-gray-600">Dental checkup tomorrow</div>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-clock text-yellow-600"></i>
                        </div>
                        <div>
                            <div class="font-medium">Reminder</div>
                            <div class="text-sm text-gray-600">Arrive 10 mins early</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <a href="/queue-system/public/book.php" class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-colors">
                        <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-calendar-plus text-white"></i>
                        </div>
                        <span class="font-medium">Book New Appointment</span>
                    </a>
                    <button class="w-full flex items-center p-3 border border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-colors">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-print text-blue-600"></i>
                        </div>
                        <span class="font-medium">Print Queue Ticket</span>
                    </button>
                    <button class="w-full flex items-center p-3 border border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-colors">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-share-alt text-green-600"></i>
                        </div>
                        <span class="font-medium">Share Status</span>
                    </button>
                    <button class="w-full flex items-center p-3 border border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-colors">
                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-times text-red-600"></i>
                        </div>
                        <span class="font-medium">Cancel Appointment</span>
                    </button>
                </div>
            </div>

            <!-- Estimated Wait Times -->
            <div class="bg-white rounded-xl shadow-md p-6 mt-6">
                <h2 class="text-xl font-semibold mb-4">Service Wait Times</h2>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Medical Consultation</span>
                            <span class="text-sm font-semibold">15 min</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-600 h-2 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Hair Salon</span>
                            <span class="text-sm font-semibold">25 min</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 80%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Dental Checkup</span>
                            <span class="text-sm font-semibold">5 min</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
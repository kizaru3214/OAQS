<?php
session_start();

// Redirect to login if not admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../public/login.php');
    exit();
}

$pageTitle = "Admin Dashboard";
include('../includes/header.php');
?>

<div class="max-w-7xl mx-auto">
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Queue Management</h1>
            <p class="text-gray-600 mt-2">Manage all queues and appointments in real-time</p>
        </div>
        <button class="px-6 py-3 gradient-bg text-white font-semibold rounded-lg hover:opacity-90">
            <i class="fas fa-sync-alt mr-2"></i> Refresh All
        </button>
    </div>

    <!-- Queue Control Panels -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <?php
        $queues = [
            [
                'title' => 'Medical Consultation',
                'current' => 'A-045',
                'next' => 'A-046',
                'waiting' => 8,
                'avg_time' => '15 min',
                'status' => 'Active',
                'color' => 'from-purple-600 to-blue-500',
                'icon' => 'fa-stethoscope'
            ],
            [
                'title' => 'Hair Salon',
                'current' => 'B-018',
                'next' => 'B-019',
                'waiting' => 12,
                'avg_time' => '25 min',
                'status' => 'Busy',
                'color' => 'from-pink-500 to-red-400',
                'icon' => 'fa-cut'
            ],
            [
                'title' => 'Dental Checkup',
                'current' => 'C-009',
                'next' => 'C-010',
                'waiting' => 3,
                'avg_time' => '8 min',
                'status' => 'Active',
                'color' => 'from-teal-500 to-green-400',
                'icon' => 'fa-tooth'
            ]
        ];
        
        foreach ($queues as $queue) {
            echo "<div class='bg-white rounded-xl shadow-md overflow-hidden'>";
            echo "<div class='bg-gradient-to-r {$queue['color']} p-6 text-white'>";
            echo "<div class='flex justify-between items-center mb-4'>";
            echo "<h3 class='text-xl font-bold'>{$queue['title']}</h3>";
            echo "<div class='w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center'>";
            echo "<i class='fas {$queue['icon']}'></i>";
            echo "</div>";
            echo "</div>";
            echo "<div class='grid grid-cols-2 gap-4'>";
            echo "<div>";
            echo "<div class='text-sm opacity-90'>Current</div>";
            echo "<div class='text-3xl font-bold'>{$queue['current']}</div>";
            echo "</div>";
            echo "<div>";
            echo "<div class='text-sm opacity-90'>Next</div>";
            echo "<div class='text-3xl font-bold'>{$queue['next']}</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='p-6'>";
            echo "<div class='grid grid-cols-2 gap-4 mb-4'>";
            echo "<div>";
            echo "<div class='text-sm text-gray-600'>Waiting</div>";
            echo "<div class='text-lg font-semibold'>{$queue['waiting']} people</div>";
            echo "</div>";
            echo "<div>";
            echo "<div class='text-sm text-gray-600'>Avg. Time</div>";
            echo "<div class='text-lg font-semibold'>{$queue['avg_time']}</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='flex space-x-2'>";
            echo "<button class='flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded-lg font-medium'>";
            echo "<i class='fas fa-pause mr-2'></i>Pause";
            echo "</button>";
            echo "<button class='flex-1 bg-green-100 hover:bg-green-200 text-green-800 py-2 rounded-lg font-medium'>";
            echo "<i class='fas fa-forward mr-2'></i>Next";
            echo "</button>";
            echo "<button class='flex-1 bg-red-100 hover:bg-red-200 text-red-800 py-2 rounded-lg font-medium'>";
            echo "<i class='fas fa-stop mr-2'></i>Stop";
            echo "</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

    <!-- Detailed Queue Management -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold mb-6">Detailed Queue Management</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Queue No.</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check-in Time</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Wait Time</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    $queueDetails = [
                        ['A-046', 'John Smith', 'Medical Consultation', '09:45 AM', '25 min', 'Waiting', ''],
                        ['A-047', 'Emma Wilson', 'Medical Consultation', '10:00 AM', '10 min', 'Next', 'active'],
                        ['A-048', 'Michael Brown', 'Medical Consultation', '10:15 AM', '0 min', 'Current', 'serving'],
                        ['B-019', 'Sarah Johnson', 'Hair Salon', '10:30 AM', '35 min', 'Waiting', ''],
                        ['B-020', 'David Lee', 'Hair Salon', '10:45 AM', '20 min', 'Waiting', ''],
                        ['C-010', 'Robert Chen', 'Dental Checkup', '11:00 AM', '5 min', 'Next', ''],
                        ['C-011', 'Lisa Wang', 'Dental Checkup', '11:15 AM', '0 min', 'Current', 'serving'],
                    ];
                    
                    foreach ($queueDetails as $detail) {
                        $statusColor = match($detail[5]) {
                            'Current' => 'bg-green-100 text-green-800',
                            'Next' => 'bg-blue-100 text-blue-800',
                            'Waiting' => 'bg-yellow-100 text-yellow-800',
                            default => 'bg-gray-100 text-gray-800'
                        };
                        
                        $isServing = $detail[6] === 'serving';
                        
                        echo "<tr class='".($isServing ? 'bg-purple-50' : '')."'>";
                        echo "<td class='px-4 py-3 font-bold text-lg'>{$detail[0]}</td>";
                        echo "<td class='px-4 py-3'>{$detail[1]}</td>";
                        echo "<td class='px-4 py-3'>{$detail[2]}</td>";
                        echo "<td class='px-4 py-3'>{$detail[3]}</td>";
                        echo "<td class='px-4 py-3'>{$detail[4]}</td>";
                        echo "<td class='px-4 py-3'>";
                        echo "<span class='px-3 py-1 rounded-full text-sm {$statusColor}'>{$detail[5]}</span>";
                        echo "</td>";
                        echo "<td class='px-4 py-3'>";
                        echo "<div class='flex space-x-2'>";
                        echo "<button class='text-blue-600 hover:text-blue-800' title='Call'>";
                        echo "<i class='fas fa-phone-alt'></i>";
                        echo "</button>";
                        echo "<button class='text-green-600 hover:text-green-800' title='Start Service'>";
                        echo "<i class='fas fa-play-circle'></i>";
                        echo "</button>";
                        echo "<button class='text-yellow-600 hover:text-yellow-800' title='Delay'>";
                        echo "<i class='fas fa-clock'></i>";
                        echo "</button>";
                        echo "<button class='text-red-600 hover:text-red-800' title='Cancel'>";
                        echo "<i class='fas fa-times'></i>";
                        echo "</button>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Queue Controls -->
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Add to Queue -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-semibold mb-6">Add to Queue</h2>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Service</label>
                    <select class="w-full border border-gray-300 rounded-lg p-3 focus:ring-purple-500 focus:border-purple-500">
                        <option>Medical Consultation</option>
                        <option>Hair Salon</option>
                        <option>Dental Checkup</option>
                        <option>Legal Consultation</option>
                        <option>Vehicle Service</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Customer Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-purple-500 focus:border-purple-500" placeholder="Enter customer name">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-purple-500 focus:border-purple-500" placeholder="Enter phone number">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Priority</label>
                        <select class="w-full border border-gray-300 rounded-lg p-3 focus:ring-purple-500 focus:border-purple-500">
                            <option>Standard</option>
                            <option>Express</option>
                            <option>VIP</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Queue Type</label>
                        <select class="w-full border border-gray-300 rounded-lg p-3 focus:ring-purple-500 focus:border-purple-500">
                            <option>Walk-in</option>
                            <option>Appointment</option>
                            <option>Online Booking</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="w-full py-3 gradient-bg text-white font-semibold rounded-lg hover:opacity-90">
                    <i class="fas fa-plus-circle mr-2"></i> Add to Queue
                </button>
            </form>
        </div>

        <!-- Bulk Actions -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-semibold mb-6">Bulk Queue Actions</h2>
            <div class="space-y-4">
                <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <div class="flex items-center">
                        <i class="fas fa-forward text-blue-600 text-xl mr-4"></i>
                        <div class="flex-1">
                            <div class="font-medium">Advance All Queues</div>
                            <div class="text-sm text-gray-600">Move all queues to next customer</div>
                        </div>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Run</button>
                    </div>
                </div>
                <div class="p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                    <div class="flex items-center">
                        <i class="fas fa-pause text-yellow-600 text-xl mr-4"></i>
                        <div class="flex-1">
                            <div class="font-medium">Pause All Queues</div>
                            <div class="text-sm text-gray-600">Temporarily pause all services</div>
                        </div>
                        <button class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">Pause</button>
                    </div>
                </div>
                <div class="p-4 bg-green-50 rounded-lg border border-green-200">
                    <div class="flex items-center">
                        <i class="fas fa-redo text-green-600 text-xl mr-4"></i>
                        <div class="flex-1">
                            <div class="font-medium">Reset Daily Counters</div>
                            <div class="text-sm text-gray-600">Reset queue numbers for new day</div>
                        </div>
                        <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Reset</button>
                    </div>
                </div>
                <div class="p-4 bg-red-50 rounded-lg border border-red-200">
                    <div class="flex items-center">
                        <i class="fas fa-times-circle text-red-600 text-xl mr-4"></i>
                        <div class="flex-1">
                            <div class="font-medium">Clear All Queues</div>
                            <div class="text-sm text-gray-600">Remove all pending customers</div>
                        </div>
                        <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Clear</button>
                    </div>
                </div>
            </div>
            
            <!-- Queue Settings -->
            <div class="mt-8 pt-6 border-t">
                <h3 class="text-lg font-semibold mb-4">Queue Settings</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700">Auto-advance queue</span>
                        <div class="relative inline-block w-12 h-6">
                            <input type="checkbox" class="sr-only peer" id="auto-advance" checked>
                            <label for="auto-advance" class="block w-12 h-6 bg-gray-300 rounded-full cursor-pointer peer-checked:bg-purple-600"></label>
                            <span class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-6"></span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700">Send notifications</span>
                        <div class="relative inline-block w-12 h-6">
                            <input type="checkbox" class="sr-only peer" id="send-notifications" checked>
                            <label for="send-notifications" class="block w-12 h-6 bg-gray-300 rounded-full cursor-pointer peer-checked:bg-purple-600"></label>
                            <span class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-6"></span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700">Allow walk-ins</span>
                        <div class="relative inline-block w-12 h-6">
                            <input type="checkbox" class="sr-only peer" id="allow-walkins" checked>
                            <label for="allow-walkins" class="block w-12 h-6 bg-gray-300 rounded-full cursor-pointer peer-checked:bg-purple-600"></label>
                            <span class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-6"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
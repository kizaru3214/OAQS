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
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
        <p class="text-gray-600 mt-2">Manage appointments, queues, and system settings</p>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-users text-white"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold">1,248</div>
                    <div class="text-gray-600">Today's Visitors</div>
                </div>
            </div>
            <div class="mt-4 text-sm text-green-600">
                <i class="fas fa-arrow-up mr-1"></i> 12% from yesterday
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-clock text-blue-600"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold">18.5 min</div>
                    <div class="text-gray-600">Avg. Wait Time</div>
                </div>
            </div>
            <div class="mt-4 text-sm text-red-600">
                <i class="fas fa-arrow-down mr-1"></i> 2.3 min from yesterday
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold">94%</div>
                    <div class="text-gray-600">Satisfaction Rate</div>
                </div>
            </div>
            <div class="mt-4 text-sm text-green-600">
                <i class="fas fa-arrow-up mr-1"></i> 3% from last week
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-calendar-alt text-purple-600"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold">327</div>
                    <div class="text-gray-600">Pending Appointments</div>
                </div>
            </div>
            <div class="mt-4 text-sm text-yellow-600">
                <i class="fas fa-minus mr-1"></i> No change
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Active Queues -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">Active Queues</h2>
                    <a href="/queue-system/admin/manage-queue.php" class="text-purple-600 hover:text-purple-800 font-medium">Manage All →</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Current</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waiting</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Avg. Time</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-stethoscope text-white text-sm"></i>
                                        </div>
                                        Medical Consultation
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-bold text-lg">A-045</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">8 people</span>
                                </td>
                                <td class="px-4 py-3">15 min</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-purple-600 hover:text-purple-800">
                                        <i class="fas fa-forward"></i> Next
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-cut text-pink-600 text-sm"></i>
                                        </div>
                                        Hair Salon
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-bold text-lg">B-018</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">12 people</span>
                                </td>
                                <td class="px-4 py-3">25 min</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Busy</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-purple-600 hover:text-purple-800">
                                        <i class="fas fa-forward"></i> Next
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-tooth text-teal-600 text-sm"></i>
                                        </div>
                                        Dental Checkup
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-bold text-lg">C-009</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">3 people</span>
                                </td>
                                <td class="px-4 py-3">8 min</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-purple-600 hover:text-purple-800">
                                        <i class="fas fa-forward"></i> Next
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Today's Appointments -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold mb-6">Today's Appointments</h2>
                <div class="space-y-4">
                    <?php
                    $appointments = [
                        ['John Smith', 'Medical Consultation', '10:30 AM', 'A-048', 'In Queue'],
                        ['Emma Wilson', 'Hair Salon', '11:15 AM', 'B-019', 'Waiting'],
                        ['Robert Chen', 'Dental Checkup', '2:00 PM', 'C-010', 'Scheduled'],
                        ['Sarah Johnson', 'Legal Consultation', '3:30 PM', 'D-016', 'Confirmed'],
                    ];
                    
                    foreach ($appointments as $apt) {
                        $statusColor = [
                            'In Queue' => 'bg-blue-100 text-blue-800',
                            'Waiting' => 'bg-yellow-100 text-yellow-800',
                            'Scheduled' => 'bg-purple-100 text-purple-800',
                            'Confirmed' => 'bg-green-100 text-green-800',
                        ][$apt[4]];
                        
                        echo "<div class='flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50'>";
                        echo "<div class='flex items-center'>";
                        echo "<div class='w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-4'>";
                        echo "<i class='fas fa-user text-gray-600'></i>";
                        echo "</div>";
                        echo "<div>";
                        echo "<div class='font-semibold'>{$apt[0]}</div>";
                        echo "<div class='text-sm text-gray-600'>{$apt[1]}</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='text-right'>";
                        echo "<div class='font-medium'>{$apt[2]}</div>";
                        echo "<div class='text-sm text-gray-600'>{$apt[3]}</div>";
                        echo "</div>";
                        echo "<div>";
                        echo "<span class='px-3 py-1 rounded-full text-sm {$statusColor}'>{$apt[4]}</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div>
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <button class="w-full flex items-center p-3 border border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-colors">
                        <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                        <span class="font-medium">Add New Service</span>
                    </button>
                    <button class="w-full flex items-center p-3 border border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-colors">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-user-md text-blue-600"></i>
                        </div>
                        <span class="font-medium">Manage Staff</span>
                    </button>
                    <button class="w-full flex items-center p-3 border border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition-colors">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-chart-line text-green-600"></i>
                        </div>
                        <span class="font-medium">Generate Reports</span>
                    </button>
                    <button class="w-full flex items-center p-3 border border-gray-200 rounded-lg hover:border-red-500 hover:bg-red-50 transition-colors">
                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-cog text-red-600"></i>
                        </div>
                        <span class="font-medium">System Settings</span>
                    </button>
                </div>
            </div>

            <!-- Queue Statistics -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Queue Statistics</h2>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Medical Queue</span>
                            <span class="text-sm font-semibold">65% capacity</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="gradient-bg h-2 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Salon Queue</span>
                            <span class="text-sm font-semibold">85% capacity</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-pink-500 h-2 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Dental Queue</span>
                            <span class="text-sm font-semibold">30% capacity</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-teal-500 h-2 rounded-full" style="width: 30%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Alerts -->
            <div class="bg-white rounded-xl shadow-md p-6 mt-8">
                <h2 class="text-xl font-semibold mb-4">Recent Alerts</h2>
                <div class="space-y-3">
                    <div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                        <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                        <div>
                            <div class="font-medium">High wait time alert</div>
                            <div class="text-sm text-gray-600">Hair salon queue exceeding 30 min</div>
                        </div>
                    </div>
                    <div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200">
                        <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                        <div>
                            <div class="font-medium">Staff shortage</div>
                            <div class="text-sm text-gray-600">Medical wing requires additional staff</div>
                        </div>
                    </div>
                    <div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200">
                        <i class="fas fa-check-circle text-green-600 mt-1 mr-3"></i>
                        <div>
                            <div class="font-medium">System updated</div>
                            <div class="text-sm text-gray-600">Queue system v2.1 installed</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
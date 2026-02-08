<?php
session_start();
$pageTitle = "Book Appointment";
include('../includes/header.php');
?>

<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Book New Appointment</h1>
        <p class="text-gray-600 mt-2">Select your service, location, date, and time slot</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
        <!-- Step 1: Service Selection -->
        <div id="step1">
            <h2 class="text-2xl font-semibold mb-6">Step 1: Select Service</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div onclick="showLocations('medical')" class="service-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                    <div class="text-[#71C9CE] mb-3">
                        <i class="fas fa-stethoscope text-3xl"></i>
                    </div>
                    <h3 class="font-semibold text-lg">Medical Consultation</h3>
                    <p class="text-sm text-gray-500 mt-1">30-45 min</p>
                </div>
                <div onclick="showLocations('salon')" class="service-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                    <div class="text-[#71C9CE] mb-3">
                        <i class="fas fa-cut text-3xl"></i>
                    </div>
                    <h3 class="font-semibold text-lg">Hair Salon</h3>
                    <p class="text-sm text-gray-500 mt-1">60-90 min</p>
                </div>
                <div onclick="showLocations('dental')" class="service-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                    <div class="text-[#71C9CE] mb-3">
                        <i class="fas fa-tooth text-3xl"></i>
                    </div>
                    <h3 class="font-semibold text-lg">Dental Checkup</h3>
                    <p class="text-sm text-gray-500 mt-1">45-60 min</p>
                </div>
                <div onclick="showLocations('legal')" class="service-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                    <div class="text-[#71C9CE] mb-3">
                        <i class="fas fa-gavel text-3xl"></i>
                    </div>
                    <h3 class="font-semibold text-lg">Legal Consultation</h3>
                    <p class="text-sm text-gray-500 mt-1">60 min</p>
                </div>
                <div onclick="showLocations('vehicle')" class="service-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                    <div class="text-[#71C9CE] mb-3">
                        <i class="fas fa-car text-3xl"></i>
                    </div>
                    <h3 class="font-semibold text-lg">Vehicle Service</h3>
                    <p class="text-sm text-gray-500 mt-1">90-120 min</p>
                </div>
                <div onclick="showLocations('business')" class="service-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                    <div class="text-[#71C9CE] mb-3">
                        <i class="fas fa-briefcase text-3xl"></i>
                    </div>
                    <h3 class="font-semibold text-lg">Business Meeting</h3>
                    <p class="text-sm text-gray-500 mt-1">45-60 min</p>
                </div>
            </div>
        </div>

        <!-- Step 2: Location/Office Selection (Hidden by default) -->
        <div id="step2" class="hidden">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold">Step 2: Select Location</h2>
                <button onclick="backToServices()" class="text-[#71C9CE] hover:text-[#5ab4b9] font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Services
                </button>
            </div>

            <!-- Medical Locations -->
            <div id="medical-locations" class="locations-container hidden">
                <div class="grid md:grid-cols-2 gap-4">
                    <div onclick="selectLocation('medical', 'City Medical Center', 1500, 30)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">City Medical Center</h3>
                                <p class="text-sm text-gray-500">123 Main St, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱1,500</div>
                                <div class="text-xs text-gray-500">30 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.8</span>
                            <span class="mx-2">•</span>
                            <span>General Practitioner</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('medical', 'HealthPlus Clinic', 2000, 45)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">HealthPlus Clinic</h3>
                                <p class="text-sm text-gray-500">456 Quezon Ave, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱2,000</div>
                                <div class="text-xs text-gray-500">45 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.9</span>
                            <span class="mx-2">•</span>
                            <span>Specialist Available</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('medical', 'Prime Medical Hub', 1200, 30)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Prime Medical Hub</h3>
                                <p class="text-sm text-gray-500">789 Commonwealth Ave, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱1,200</div>
                                <div class="text-xs text-gray-500">30 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.7</span>
                            <span class="mx-2">•</span>
                            <span>Budget-Friendly</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('medical', 'Elite Health Center', 2500, 45)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Elite Health Center</h3>
                                <p class="text-sm text-gray-500">321 EDSA, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱2,500</div>
                                <div class="text-xs text-gray-500">45 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">5.0</span>
                            <span class="mx-2">•</span>
                            <span>Premium Service</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salon Locations -->
            <div id="salon-locations" class="locations-container hidden">
                <div class="grid md:grid-cols-2 gap-4">
                    <div onclick="selectLocation('salon', 'StyleCut Salon', 500, 60)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">StyleCut Salon</h3>
                                <p class="text-sm text-gray-500">SM North EDSA, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱500</div>
                                <div class="text-xs text-gray-500">60 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.6</span>
                            <span class="mx-2">•</span>
                            <span>Basic Cut & Style</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('salon', 'Glamour Studio', 800, 90)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Glamour Studio</h3>
                                <p class="text-sm text-gray-500">Trinoma Mall, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱800</div>
                                <div class="text-xs text-gray-500">90 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.8</span>
                            <span class="mx-2">•</span>
                            <span>Premium Styling</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('salon', 'Trendy Cuts', 400, 45)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Trendy Cuts</h3>
                                <p class="text-sm text-gray-500">Cubao, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱400</div>
                                <div class="text-xs text-gray-500">45 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.5</span>
                            <span class="mx-2">•</span>
                            <span>Walk-ins Welcome</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dental Locations -->
            <div id="dental-locations" class="locations-container hidden">
                <div class="grid md:grid-cols-2 gap-4">
                    <div onclick="selectLocation('dental', 'Smile Dental Clinic', 1800, 45)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Smile Dental Clinic</h3>
                                <p class="text-sm text-gray-500">Katipunan Ave, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱1,800</div>
                                <div class="text-xs text-gray-500">45 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.9</span>
                            <span class="mx-2">•</span>
                            <span>General Dentistry</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('dental', 'Perfect Teeth Center', 2200, 60)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Perfect Teeth Center</h3>
                                <p class="text-sm text-gray-500">Timog Ave, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱2,200</div>
                                <div class="text-xs text-gray-500">60 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">5.0</span>
                            <span class="mx-2">•</span>
                            <span>Cosmetic Dentistry</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('dental', 'Bright Smile Dental', 1500, 45)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Bright Smile Dental</h3>
                                <p class="text-sm text-gray-500">España Blvd, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱1,500</div>
                                <div class="text-xs text-gray-500">45 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.7</span>
                            <span class="mx-2">•</span>
                            <span>Family Dentistry</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Legal Locations -->
            <div id="legal-locations" class="locations-container hidden">
                <div class="grid md:grid-cols-2 gap-4">
                    <div onclick="selectLocation('legal', 'Santos Law Office', 3000, 60)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Santos Law Office</h3>
                                <p class="text-sm text-gray-500">Ortigas Center, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱3,000</div>
                                <div class="text-xs text-gray-500">60 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.8</span>
                            <span class="mx-2">•</span>
                            <span>Corporate Law</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('legal', 'Reyes & Associates', 4500, 60)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Reyes & Associates</h3>
                                <p class="text-sm text-gray-500">Makati Ave, Makati City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱4,500</div>
                                <div class="text-xs text-gray-500">60 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">5.0</span>
                            <span class="mx-2">•</span>
                            <span>Full Legal Services</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('legal', 'Cruz Legal Services', 2500, 60)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Cruz Legal Services</h3>
                                <p class="text-sm text-gray-500">West Ave, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱2,500</div>
                                <div class="text-xs text-gray-500">60 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.7</span>
                            <span class="mx-2">•</span>
                            <span>General Practice</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vehicle Locations -->
            <div id="vehicle-locations" class="locations-container hidden">
                <div class="grid md:grid-cols-2 gap-4">
                    <div onclick="selectLocation('vehicle', 'AutoCare Service Center', 2500, 90)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">AutoCare Service Center</h3>
                                <p class="text-sm text-gray-500">Commonwealth Ave, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱2,500</div>
                                <div class="text-xs text-gray-500">90 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.6</span>
                            <span class="mx-2">•</span>
                            <span>General Service</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('vehicle', 'Premium Auto Shop', 3500, 120)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Premium Auto Shop</h3>
                                <p class="text-sm text-gray-500">EDSA, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱3,500</div>
                                <div class="text-xs text-gray-500">120 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.9</span>
                            <span class="mx-2">•</span>
                            <span>Full Diagnostics</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('vehicle', 'QuickFix Garage', 1800, 60)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">QuickFix Garage</h3>
                                <p class="text-sm text-gray-500">Fairview, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱1,800</div>
                                <div class="text-xs text-gray-500">60 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.5</span>
                            <span class="mx-2">•</span>
                            <span>Basic Maintenance</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Locations -->
            <div id="business-locations" class="locations-container hidden">
                <div class="grid md:grid-cols-2 gap-4">
                    <div onclick="selectLocation('business', 'CoWork Space QC', 1000, 45)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">CoWork Space QC</h3>
                                <p class="text-sm text-gray-500">Eastwood City, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱1,000</div>
                                <div class="text-xs text-gray-500">45 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.7</span>
                            <span class="mx-2">•</span>
                            <span>Meeting Room</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('business', 'Executive Hub', 1500, 60)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Executive Hub</h3>
                                <p class="text-sm text-gray-500">BGC, Taguig City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱1,500</div>
                                <div class="text-xs text-gray-500">60 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.9</span>
                            <span class="mx-2">•</span>
                            <span>Premium Facilities</span>
                        </div>
                    </div>

                    <div onclick="selectLocation('business', 'The Business Center', 800, 45)" class="location-card border-2 border-gray-200 rounded-xl p-6 hover:border-[#71C9CE] hover:bg-[#E3FDFD] cursor-pointer transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">The Business Center</h3>
                                <p class="text-sm text-gray-500">Cubao, Quezon City</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-[#71C9CE]">₱800</div>
                                <div class="text-xs text-gray-500">45 min</div>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">4.5</span>
                            <span class="mx-2">•</span>
                            <span>Basic Setup</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3: Date & Time (Hidden until location is selected) -->
        <div id="step3" class="hidden mt-8">
            <hr class="my-8 border-gray-200">
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Date Selection -->
                <div class="md:col-span-1">
                    <h2 class="text-xl font-semibold mb-4">Select Date</h2>
                    <div class="border border-gray-200 rounded-xl p-4">
                        <div class="text-center mb-4">
                            <div class="text-lg font-bold text-gray-800">February 2026</div>
                        </div>
                        <div class="grid grid-cols-7 gap-1 text-center text-sm">
                            <div class="text-gray-500 py-2 font-medium">S</div>
                            <div class="text-gray-500 py-2 font-medium">M</div>
                            <div class="text-gray-500 py-2 font-medium">T</div>
                            <div class="text-gray-500 py-2 font-medium">W</div>
                            <div class="text-gray-500 py-2 font-medium">T</div>
                            <div class="text-gray-500 py-2 font-medium">F</div>
                            <div class="text-gray-500 py-2 font-medium">S</div>

                            <?php
                            // Simple calendar days
                            for ($i = 1; $i <= 28; $i++) {
                                $class = "py-2 rounded-lg cursor-pointer hover:bg-[#A6E3E9]";
                                if ($i == 8) {
                                    $class .= " bg-[#71C9CE] text-white font-semibold";
                                } else {
                                    $class .= " text-gray-700";
                                }
                                echo "<div class='{$class}'>{$i}</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Time Slots -->
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold mb-4">Select Time Slot</h2>
                    <div class="grid grid-cols-3 md:grid-cols-4 gap-3">
                        <?php
                        $timeSlots = ['09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM', '06:00 PM', '07:00 PM', '08:00 PM'];
                        foreach ($timeSlots as $time) {
                            $available = rand(0, 1);
                            if ($available) {
                                echo "<div class='text-center py-3 rounded-xl border-2 border-[#71C9CE] text-[#71C9CE] hover:bg-[#71C9CE] hover:text-white cursor-pointer transition-all font-medium'>{$time}</div>";
                            } else {
                                echo "<div class='text-center py-3 rounded-xl border border-gray-200 text-gray-400 cursor-not-allowed bg-gray-50'><div>{$time}</div><div class='text-xs mt-1'>Booked</div></div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Additional Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                        <textarea class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-[#71C9CE] focus:border-transparent" rows="3" placeholder="Any special requests or notes..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Priority Level</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="priority" class="text-[#71C9CE] focus:ring-[#71C9CE]" checked>
                                <span class="ml-2">Standard</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="priority" class="text-[#71C9CE] focus:ring-[#71C9CE]">
                                <span class="ml-2">Express (+₱200)</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="priority" class="text-[#71C9CE] focus:ring-[#71C9CE]">
                                <span class="ml-2">VIP (+₱500)</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary & Book Button -->
            <div class="mt-8 p-6 bg-[#E3FDFD] border border-[#A6E3E9] rounded-xl">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <div class="text-lg font-semibold text-gray-900 mb-1">Appointment Summary</div>
                        <div id="summary-text" class="text-gray-600">Select a service and location to continue</div>
                    </div>
                    <div class="text-right">
                        <div id="summary-price" class="text-3xl font-bold text-[#71C9CE] mb-3">₱0</div>
                        <button class="px-8 py-3 bg-[#71C9CE] text-white font-semibold rounded-xl hover:bg-[#5ab4b9] transition-all shadow-md hover:shadow-lg">
                            <i class="fas fa-calendar-check mr-2"></i> Confirm Booking
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Current Queue Status -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-2xl font-semibold mb-6">Current Queue Status</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Service</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Current No.</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Wait Time</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm">Medical Consultation</td>
                        <td class="px-6 py-4 text-sm font-bold text-[#71C9CE]">A-042</td>
                        <td class="px-6 py-4 text-sm text-gray-600">~15 minutes</td>
                        <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm">Hair Salon</td>
                        <td class="px-6 py-4 text-sm font-bold text-[#71C9CE]">B-018</td>
                        <td class="px-6 py-4 text-sm text-gray-600">~25 minutes</td>
                        <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Medium</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm">Dental Checkup</td>
                        <td class="px-6 py-4 text-sm font-bold text-[#71C9CE]">C-009</td>
                        <td class="px-6 py-4 text-sm text-gray-600">~5 minutes</td>
                        <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    let selectedService = '';
    let selectedLocation = '';
    let selectedPrice = 0;
    let selectedDuration = 0;

    function showLocations(serviceType) {
        // Hide step 1, show step 2
        document.getElementById('step1').classList.add('hidden');
        document.getElementById('step2').classList.remove('hidden');

        // Hide all location containers
        document.querySelectorAll('.locations-container').forEach(el => {
            el.classList.add('hidden');
        });

        // Show selected service locations
        document.getElementById(serviceType + '-locations').classList.remove('hidden');
        selectedService = serviceType;
    }

    function selectLocation(service, locationName, price, duration) {
        selectedLocation = locationName;
        selectedPrice = price;
        selectedDuration = duration;

        // Show step 3
        document.getElementById('step3').classList.remove('hidden');

        // Update summary
        const serviceName = service.charAt(0).toUpperCase() + service.slice(1);
        document.getElementById('summary-text').textContent = `${serviceName} • ${locationName} • Feb 8, 2026 • 10:00 AM`;
        document.getElementById('summary-price').textContent = `₱${price.toLocaleString()}`;

        // Scroll to date/time selection
        document.getElementById('step3').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    function backToServices() {
        document.getElementById('step1').classList.remove('hidden');
        document.getElementById('step2').classList.add('hidden');
        document.getElementById('step3').classList.add('hidden');

        // Reset selections
        selectedService = '';
        selectedLocation = '';
        selectedPrice = 0;
        selectedDuration = 0;
    }
</script>

<?php include('../includes/footer.php'); ?>
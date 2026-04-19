@include('frontend.header')

<!-- Include Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom Styles -->
<style>
    :root {
        --primary: #3b82f6;
        --primary-dark: #1d4ed8;
        --secondary: #6b7280;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --light: #f9fafb;
        --dark: #1f2937;
    }

    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .social-icon {
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        transform: scale(1.1) translateY(-3px);
    }

    .input-focus:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .loader {
        border-top-color: #3498db;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Hero Section -->


<!-- Contact Section -->
<section class="py-16 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Left Column - Contact Form -->
            <div class="fade-in">
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-3">Send a Message</h2>
                        <p class="text-gray-600">Fill out the form below and we'll respond as soon as possible</p>

                        <!-- Progress Steps -->
                        <div class="flex items-center justify-center mt-6 mb-2">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">
                                    1
                                </div>
                                <div class="h-1 w-16 bg-blue-600"></div>
                                <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center font-bold">
                                    2
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">Step 1 of 2: Personal Information</p>
                    </div>

                    <form id="contactForm" action="{{ route('user.message.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Step 1: Personal Info -->
                        <div id="step1" class="space-y-6">
                            <div class="relative">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" id="name" name="name"
                                           class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           placeholder="John Doe" required>
                                </div>
                                <div class="text-sm text-red-500 mt-1" id="name-error"></div>
                            </div>

                            <div class="relative">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                    </div>
                                    <input type="email" id="email" name="email"
                                           class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           placeholder="john@example.com" required>
                                </div>
                                <div class="text-sm text-red-500 mt-1" id="email-error"></div>
                            </div>

                            <div class="relative">
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subject <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-tag text-gray-400"></i>
                                    </div>
                                    <input type="text" id="subject" name="subject"
                                           class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           placeholder="What is this regarding?" required>
                                </div>
                                <div class="text-sm text-red-500 mt-1" id="subject-error"></div>
                            </div>

                            <button type="button" onclick="nextStep()"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-[1.02]">
                                Next: Write Your Message <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>

                        <!-- Step 2: Message -->
                        <div id="step2" class="space-y-6 hidden">
                            <div class="relative">
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                    Your Message <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3 left-3">
                                        <i class="fas fa-comment-alt text-gray-400"></i>
                                    </div>
                                    <textarea id="message" name="message" rows="6"
                                              class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                              placeholder="Please describe your inquiry in detail..." required></textarea>
                                </div>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="text-sm text-red-500" id="message-error"></div>
                                    <div class="text-sm text-gray-500">
                                        <span id="charCount">0</span>/500 characters
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <button type="button" onclick="prevStep()"
                                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i> Back
                                </button>
                                <button type="submit" id="submitBtn"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-[1.02] relative">
                                    <span class="flex items-center justify-center">
                                        <i class="fas fa-paper-plane mr-2"></i> Send Message
                                    </span>
                                    <div id="loader" class="hidden absolute inset-0 bg-blue-600 rounded-lg flex items-center justify-center">
                                        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-6 w-6"></div>
                                    </div>
                                </button>
                            </div>
                        </div>

                        <div id="successMessage" class="hidden p-4 bg-green-50 border border-green-200 rounded-lg text-green-700"></div>

                        <p class="text-sm text-gray-500 text-center mt-6">
                            <i class="fas fa-lock mr-2"></i>
                            Your information is secure. By submitting, you agree to our
                            <a href="#" class="text-blue-600 hover:underline font-medium">Privacy Policy</a>.
                        </p>
                    </form>
                </div>
            </div>

            <!-- Right Column - Contact Info & Social -->
            <div class="space-y-8 fade-in">
                <!-- Contact Information -->
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-address-card text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Contact Information</h3>
                    </div>

                    <div class="space-y-6">


                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Phone Number</h4>
                                <p class="text-gray-600 mb-1">+92 314 0699386</p>

                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope-open-text text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Email Address</h4>
                                <p class="text-gray-600 mb-1">service@techblogs.site</p>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-share-alt text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Connect With Us</h3>
                    </div>

                    <p class="text-gray-600 mb-6">Follow us on social media for updates, tips, and community discussions.</p>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
<a href="{{ $data->facebook ?? '#' }}" target="_blank"
   class="social-icon bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-4 flex flex-col items-center justify-center transition-all duration-300">
    <i class="fab fa-facebook-f text-2xl mb-2"></i>
    <span class="text-sm font-medium">Facebook</span>
</a>

<a href="{{ $data->twitter ?? '#' }}" target="_blank"
   class="social-icon bg-blue-400 hover:bg-blue-500 text-white rounded-lg p-4 flex flex-col items-center justify-center transition-all duration-300">
    <i class="fab fa-twitter text-2xl mb-2"></i>
    <span class="text-sm font-medium">Twitter</span>
</a>

<a href="{{ $data->instagram ?? '#' }}" target="_blank"
   class="social-icon bg-gradient-to-r from-purple-600 to-pink-600 hover:opacity-90 text-white rounded-lg p-4 flex flex-col items-center justify-center transition-all duration-300">
    <i class="fab fa-instagram text-2xl mb-2"></i>
    <span class="text-sm font-medium">Instagram</span>
</a>



<a href="{{ $data->medium ?? '#' }}" target="_blank"
   class="social-icon bg-gray-800 hover:bg-gray-900 text-white rounded-lg p-4 flex flex-col items-center justify-center transition-all duration-300">
    <i class="fab fa-medium-m text-2xl mb-2"></i>
    <span class="text-sm font-medium">Medium</span>
</a>


<a href="{{ $data->youtube ?? '#' }}" target="_blank"
   class="social-icon bg-red-600 hover:bg-red-700 text-white rounded-lg p-4 flex flex-col items-center justify-center transition-all duration-300">
    <i class="fab fa-youtube text-2xl mb-2"></i>
    <span class="text-sm font-medium">YouTube</span>
</a>

                    </div>
                </div>

                <!-- FAQ Preview -->

        </div>
    </div>
</section>

<script>
// Form Steps Management
let currentStep = 1;

function nextStep() {
    if (validateStep1()) {
        document.getElementById('step1').classList.add('hidden');
        document.getElementById('step2').classList.remove('hidden');
        currentStep = 2;
    }
}

function prevStep() {
    document.getElementById('step2').classList.add('hidden');
    document.getElementById('step1').classList.remove('hidden');
    currentStep = 1;
}

// Character Counter
const messageTextarea = document.getElementById('message');
const charCount = document.getElementById('charCount');

if (messageTextarea) {
    messageTextarea.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = length;

        if (length > 500) {
            charCount.classList.add('text-red-500');
            this.value = this.value.substring(0, 500);
        } else if (length > 400) {
            charCount.classList.add('text-yellow-500');
        } else {
            charCount.classList.remove('text-red-500', 'text-yellow-500');
        }
    });
}

// Validation Functions
function validateStep1() {
    let isValid = true;

    // Clear previous errors
    document.querySelectorAll('[id$="-error"]').forEach(el => el.textContent = '');

    // Validate name
    const name = document.getElementById('name');
    if (!name.value.trim()) {
        document.getElementById('name-error').textContent = 'Please enter your name';
        name.classList.add('border-red-500');
        isValid = false;
    } else {
        name.classList.remove('border-red-500');
    }

    // Validate email
    const email = document.getElementById('email');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim() || !emailRegex.test(email.value)) {
        document.getElementById('email-error').textContent = 'Please enter a valid email address';
        email.classList.add('border-red-500');
        isValid = false;
    } else {
        email.classList.remove('border-red-500');
    }

    // Validate subject
    const subject = document.getElementById('subject');
    if (!subject.value.trim()) {
        document.getElementById('subject-error').textContent = 'Please enter a subject';
        subject.classList.add('border-red-500');
        isValid = false;
    } else {
        subject.classList.remove('border-red-500');
    }

    return isValid;
}

function validateStep2() {
    let isValid = true;

    // Clear previous error
    document.getElementById('message-error').textContent = '';

    // Validate message
    const message = document.getElementById('message');
    if (!message.value.trim()) {
        document.getElementById('messaage-error').textContent = 'Please enter your message';
        message.classList.add('border-red-500');
        isValid = false;
    } else if (message.value.length < 10) {
        document.getElementById('message-error').textContent = 'Message should be at least 10 characters';
        message.classList.add('border-red-500');
        isValid = false;
    } else {
        message.classList.remove('border-red-500');
    }

    return isValid;
}

// Form Submission
document.getElementById('contactForm').addEventListener('submit', function (e) {
    // Step 2 validation
    if (!validateStep2()) {
        e.preventDefault();
        return;
    }

    // Loader show
    document.getElementById('loader').classList.remove('hidden');
    document.getElementById('submitBtn').disabled = true;
});
</script>

@include('frontend.footer')

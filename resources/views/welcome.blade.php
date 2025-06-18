<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KonseLink - Modern Counseling Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a202c; /* Dark background for better contrast */
        }

        /* Custom animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        #mobile-menu.expanded {
            max-height: 100vh;
        }

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-effect-dark {
            backdrop-filter: blur(20px);
            background: rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden">
    <!-- Navigation -->
    <div id="sticky-container" class="sticky top-0 z-50">
        <nav class="glass-effect backdrop-blur-md shadow-lg">
            <div class="container mx-auto flex items-center justify-between p-5">
                <div class="text-gradient text-2xl font-bold">
                    <a href="#" id="home-link">KonseLink</a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <ul class="flex space-x-6 font-semibold text-white">
                        <li><a href="#parallax-section" class="hover:text-purple-300 transition-colors duration-300 scroll-link">Home</a></li>
                        <li><a href="#about" class="hover:text-purple-300 transition-colors duration-300 scroll-link">About</a></li>
                        <li><a href="#contact" class="hover:text-purple-300 transition-colors duration-300 scroll-link">Contact</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="hover:text-purple-300 transition-colors duration-300">Dashboard</a></li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}" id="login-link"
                                        class="px-6 py-2 glass-effect rounded-full hover:bg-white hover:bg-opacity-20 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                                        Log in
                                    </a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </div>
                
                <!-- Mobile Menu Toggle -->
                <button id="nav-toggle" class="md:hidden focus:outline-none text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="glass-effect w-full">
                <ul class="flex flex-col space-y-4 p-4 text-white font-semibold">
                    <li><a href="#parallax-section" class="hover:text-purple-300 transition-colors duration-300 scroll-link">Home</a></li>
                    <li><a href="#about" class="hover:text-purple-300 transition-colors duration-300 scroll-link">About</a></li>
                    <li><a href="#contact" class="hover:text-purple-300 transition-colors duration-300 scroll-link">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}" class="hover:text-purple-300 transition-colors duration-300">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="hover:text-purple-300 transition-colors duration-300">Log in</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <!-- Hero Section with Enhanced Design -->
    <section id="parallax-section" class="h-screen flex items-center relative overflow-hidden bg-slate-900">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-72 h-72 bg-white bg-opacity-10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-400 bg-opacity-20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-400 bg-opacity-10 rounded-full blur-3xl animate-float" style="animation-delay: 4s;"></div>
        </div>

        <!-- Dark overlay for better text readability -->
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>

        <div class="container mx-auto px-5 md:px-12 relative z-10 text-center md:text-right">
            <div class="animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Merasa <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-400">Tertekan?</span><br>
                    <span class="text-3xl md:text-5xl lg:text-6xl">Yuk, Ngobrol!</span>
                </h1>
                <p class="mt-6 text-xl md:text-2xl text-gray-100 mb-8 font-light">
                    Ruang untuk Menjadi Diri Sendiri..
                </p>
                <div class="mt-8">
                    <a href="#about" class="scroll-link inline-flex items-center px-8 py-4 glass-effect text-white font-semibold rounded-full hover:bg-white hover:bg-opacity-20 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl group">
                        <span class="mr-2">GET STARTED</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section with Modern Design -->
    <section id="about" class="py-24 min-h-screen flex items-center relative overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-slate-800">
        <!-- Background Effects -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white bg-opacity-5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-400 bg-opacity-10 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="glass-effect-dark rounded-3xl p-8 md:p-12 transform hover:-translate-y-2 transition-all duration-500 hover:shadow-2xl">
                    <div class="animate-fade-in-up">
                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-8 text-white leading-tight">
                            Solusi Tepat untuk<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-400">Teman Curhat</span>
                        </h2>
                        
                        <blockquote class="text-xl md:text-2xl text-gray-300 mb-8 italic font-light relative pl-8">
                            <div class="absolute left-0 top-0 text-6xl text-purple-400 opacity-50">"</div>
                            "The only person you are destined to become is the person you decide to be."
                            <footer class="text-lg text-purple-300 font-normal mt-2">- Albert Ellis</footer>
                        </blockquote>
                        
                        <div class="prose prose-lg text-gray-200 leading-relaxed">
                            <p class="text-lg md:text-xl">
                                Kami hadir untuk memberikan dukungan dan bimbingan yang lebih modern bagi murid di sekolah Anda. 
                                Melalui platform konseling online yang mudah diakses, kami membantu siswa mengatasi berbagai tantangan 
                                serta masalah yang mereka hadapi, juga meningkatkan kesejahteraan mental, yang bertujuan untuk mencapai 
                                potensi terbaik mereka.
                            </p>
                            <p class="text-lg md:text-xl mt-6">
                                Dengan melalui pendekatan yang personal dan profesional, kami berkomitmen untuk menciptakan 
                                lingkungan belajar yang positif dan kondusif.
                            </p>
                        </div>

                        <!-- Feature Cards -->
                        <div class="grid md:grid-cols-3 gap-6 mt-12">
                            <div class="glass-effect rounded-2xl p-6 text-center hover:bg-white hover:bg-opacity-10 transition-all duration-300 group">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-2">Professional</h3>
                                <p class="text-gray-300">Konselor berpengalaman dan tersertifikasi</p>
                            </div>

                            <div class="glass-effect rounded-2xl p-6 text-center hover:bg-white hover:bg-opacity-10 transition-all duration-300 group">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-2">Confidential</h3>
                                <p class="text-gray-300">Privasi dan kerahasiaan terjamin</p>
                            </div>

                            <div class="glass-effect rounded-2xl p-6 text-center hover:bg-white hover:bg-opacity-10 transition-all duration-300 group">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-2">24/7 Access</h3>
                                <p class="text-gray-300">Akses kapan saja, dimana saja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact"
        class="relative py-24 bg-gradient-to-br bg-slate-900 overflow-hidden"
        aria-label="Contact Information">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute top-10 left-10 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-400/10 rounded-full blur-3xl"></div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-400/5 rounded-full blur-3xl">
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Header -->
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-4 tracking-tight">
                    Let's <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-400">Connect</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed">
                    Ready to start something amazing? Choose your preferred way to reach out.
                </p>
            </div>

            <address class="not-italic">
                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto" itemscope itemtype="https://schema.org/Person">
                    <!-- Email Card -->
                    <div
                        class="group relative bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 text-center transition-all duration-300 hover:bg-white/15 hover:border-white/30 hover:transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-purple-500/25">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>

                            <h3 class="text-2xl font-semibold text-white mb-3">Email</h3>
                            <p class="text-gray-300 mb-6 leading-relaxed">
                                Drop me a line anytime. I'll get back to you as soon as possible.
                            </p>

                            <a href="mailto:your-email@example.com"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/30 hover:scale-105"
                                title="Send Email" itemprop="email">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Send Message
                            </a>
                        </div>
                    </div>

                    <!-- WhatsApp Card -->
                    <div
                        class="group relative bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 text-center transition-all duration-300 hover:bg-white/15 hover:border-white/30 hover:transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-green-500/25">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.700" />
                                </svg>
                            </div>

                            <h3 class="text-2xl font-semibold text-white mb-3">WhatsApp</h3>
                            <p class="text-gray-300 mb-6 leading-relaxed">
                                Need a quick response? Let's chat instantly on WhatsApp.
                            </p>

                            <a href="https://wa.me/your-phone-number"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-medium rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-green-500/30 hover:scale-105"
                                title="Chat on WhatsApp" rel="noopener noreferrer" target="_blank">
                                <svg width="35px" height="30px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)">
                                    <g id="SVGRepo_bgCarrier" stroke-width="2"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15.5 11.5H15.51M11.5 11.5H11.51M7.5 11.5H7.51M15.6953 19.2318L19.1027 20.3676C19.8845 20.6282 20.6282 19.8844 20.3676 19.1027L19.2318 15.6953M15.3 19.1C15.3 19.1 14.0847 20 11.5 20C6.80558 20 3 16.1944 3 11.5C3 6.80558 6.80558 3 11.5 3C16.1944 3 20 6.80558 20 11.5C20 14 19.1 15.3 19.1 15.3"
                                            stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                Start Chat
                            </a>
                        </div>
                    </div>

                    <!-- Instagram Card -->
                    <div
                        class="group relative bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 text-center transition-all duration-300 hover:bg-white/15 hover:border-white/30 hover:transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-pink-500/25">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-pink-400 via-purple-500 to-indigo-500 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg width="35px" height="35px" viewBox="0 0 20 20" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>instagram [#ffffff]</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs> </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Dribbble-Light-Preview"
                                                transform="translate(-340.000000, -7439.000000)" fill="#ffffff">
                                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                                    <path
                                                        d="M289.869652,7279.12273 C288.241769,7279.19618 286.830805,7279.5942 285.691486,7280.72871 C284.548187,7281.86918 284.155147,7283.28558 284.081514,7284.89653 C284.035742,7285.90201 283.768077,7293.49818 284.544207,7295.49028 C285.067597,7296.83422 286.098457,7297.86749 287.454694,7298.39256 C288.087538,7298.63872 288.809936,7298.80547 289.869652,7298.85411 C298.730467,7299.25511 302.015089,7299.03674 303.400182,7295.49028 C303.645956,7294.859 303.815113,7294.1374 303.86188,7293.08031 C304.26686,7284.19677 303.796207,7282.27117 302.251908,7280.72871 C301.027016,7279.50685 299.5862,7278.67508 289.869652,7279.12273 M289.951245,7297.06748 C288.981083,7297.0238 288.454707,7296.86201 288.103459,7296.72603 C287.219865,7296.3826 286.556174,7295.72155 286.214876,7294.84312 C285.623823,7293.32944 285.819846,7286.14023 285.872583,7284.97693 C285.924325,7283.83745 286.155174,7282.79624 286.959165,7281.99226 C287.954203,7280.99968 289.239792,7280.51332 297.993144,7280.90837 C299.135448,7280.95998 300.179243,7281.19026 300.985224,7281.99226 C301.980262,7282.98483 302.473801,7284.28014 302.071806,7292.99991 C302.028024,7293.96767 301.865833,7294.49274 301.729513,7294.84312 C300.829003,7297.15085 298.757333,7297.47145 289.951245,7297.06748 M298.089663,7283.68956 C298.089663,7284.34665 298.623998,7284.88065 299.283709,7284.88065 C299.943419,7284.88065 300.47875,7284.34665 300.47875,7283.68956 C300.47875,7283.03248 299.943419,7282.49847 299.283709,7282.49847 C298.623998,7282.49847 298.089663,7283.03248 298.089663,7283.68956 M288.862673,7288.98792 C288.862673,7291.80286 291.150266,7294.08479 293.972194,7294.08479 C296.794123,7294.08479 299.081716,7291.80286 299.081716,7288.98792 C299.081716,7286.17298 296.794123,7283.89205 293.972194,7283.89205 C291.150266,7283.89205 288.862673,7286.17298 288.862673,7288.98792 M290.655732,7288.98792 C290.655732,7287.16159 292.140329,7285.67967 293.972194,7285.67967 C295.80406,7285.67967 297.288657,7287.16159 297.288657,7288.98792 C297.288657,7290.81525 295.80406,7292.29716 293.972194,7292.29716 C292.140329,7292.29716 290.655732,7290.81525 290.655732,7288.98792"
                                                        id="instagram-[#ffffff]"> </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>

                            <h3 class="text-2xl font-semibold text-white mb-3">Instagram</h3>
                            <p class="text-gray-300 mb-6 leading-relaxed">
                                Follow my journey and connect with me on Instagram.
                            </p>

                            <a href="https://www.instagram.com/your-instagram"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-medium rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-pink-500/30 hover:scale-105"
                                title="Visit Instagram Profile" rel="noopener noreferrer" target="_blank"
                                itemprop="sameAs">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                                Follow Me
                            </a>
                        </div>
                    </div>
                </div>
            </address>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300">
        <div class="container mx-auto px-4 py-8 grid md:grid-cols-4 gap-8">
            <!-- Kolom 1 -->
            <div>
                <h2 class="text-white text-lg font-bold mb-4">SEAL.</h2>
                <p>Financial Solutions at Your Fingertips.</p>
                <form class="mt-4">
                    <input type="email" placeholder="Enter your email"
                        class="w-full p-2 mb-2 border border-gray-700 bg-gray-800 rounded">
                    <button type="submit"
                        class="w-full p-2 bg-gray-700 hover:bg-gray-600 text-white rounded">Submit</button>
                </form>
                <p class="text-xs mt-2">By submitting this form you agree that we may collect and process your data.
                </p>
            </div>

            <!-- Kolom 2 -->
            <div>
                <h3 class="text-white text-lg font-semibold mb-4">Products</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Overview</a></li>
                    <li><a href="#" class="hover:text-white">Instant Funding</a></li>
                    <li><a href="#" class="hover:text-white">Instant Disbursements</a></li>
                    <li><a href="#" class="hover:text-white">Accelerated Transfers</a></li>
                </ul>
            </div>

            <!-- Kolom 3 -->
            <div>
                <h3 class="text-white text-lg font-semibold mb-4">Use Cases</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Banking</a></li>
                    <li><a href="#" class="hover:text-white">Transport</a></li>
                    <li><a href="#" class="hover:text-white">BaaS and SaaS</a></li>
                    <li><a href="#" class="hover:text-white">Payroll and Lending</a></li>
                </ul>
            </div>

            <!-- Kolom 4 -->
            <div>
                <h3 class="text-white text-lg font-semibold mb-4">Company</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">About Company</a></li>
                    <li><a href="#" class="hover:text-white">Opportunity</a></li>
                    <li><a href="#" class="hover:text-white">Contact & Location</a></li>
                    <li><a href="#" class="hover:text-white">Request Features</a></li>
                </ul>
                <!-- Ikon Sosial Media -->
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-300 hover:text-white">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>


    <!-- JavaScript -->
    <script>
        // Smooth Scroll
        document.querySelectorAll('.scroll-link').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const targetId = e.target.getAttribute('href').substring(1);
                document.getElementById(targetId).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });

        // Toggle Mobile Menu
        document.getElementById('nav-toggle').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('expanded');
        });
    </script>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>

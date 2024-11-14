<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         @vite(['resources/css/app.css', 'resources/css/welcome.css'])
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
        <link rel="icon" href="{{ asset('images/AVcar.ico') }}">
        <title>Auto Vista</title>
        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <!-- CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
            
            </style>
        @endif
    </head>

    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <header id="home"  class="bg-black shadow-lg">
            <nav class="flex items-center justify-between px-8 py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-lg px-2 py-1"><img src="{{ asset('images/av.png') }}" width="200" alt="AV Logo" /></a>
                </div>
                <div class="flex-grow flex items-center justify-center space-x-6 -ml-4">
                    <a href="{{ route('home') }}" class="text-white text-lg px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                        Home
                    </a>
                    <a href="#car" class="text-white text-lg px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                        Cars
                    </a>
                    <a href="#aboutus" class="text-white text-lg px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                        About Us
                    </a>
                    <a href="#contactus" class="text-white text-lg px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                        Contact Us
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-white text-lg px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-white text-lg px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                                Log in
                                </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-white text-lg px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </header>

        
      
       <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        
        <div class="carousel">
            <div class="carousel-item">
                <div class="carousel-image-wrapper">
                    <img src="{{ asset('images/pic-carousel/C1.jpg') }}" alt="Image 1" class="carousel-image">
                    <div class="carousel-text">
                        <h5>Be the King of the Road</h5>
                        <p>Our collection of high-performance vehicles will take your driving experience to the next level.</p>
                        <a href="#car" class="btn btn-sm btn-outline-none position-relative top-1 bottom-1">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="carousel-image-wrapper">
                    <img src="{{ asset('images/pic-carousel/C2.jpg') }}" alt="Image 2" class="carousel-image">
                    <div class="carousel-text">
                        <h5>Toyota Fortuner</h5>
                        <p>Experience the power and comfort of the Fortuner with its advanced safety features and spacious interior.</p>
                        <a href="#car" class="btn btn-sm btn-outline-none position-relative top-1 bottom-1">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="carousel-image-wrapper">
                    <img src="{{ asset('images/pic-carousel/C3.jpg') }}" alt="Image 3" class="carousel-image">
                    <div class="carousel-text">
                        <h5>Jaguar XJ</h5>
                        <p>Experience a luxurious and stylish journey with our fleet of high-end vehicles designed for the ultimate driving experience.</p>
                        <a href="#car" class="btn btn-sm btn-outline-none position-relative top-1 bottom-1">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
                        
                    <div id="car" class="items-center justify-center text-center" style="display: flex; align-items: center; justify-content: center;">
                        <h1 style="color: white; font-size: 2.5em; font-family: 'Quicksand', sans-serif;">We offer a wide range of rental cars to suit every lifestyle</h1>
                    </div>

                
        <div class="relative flex flex-col items-center justify-center mt-4 mb-4 selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <div id="cards-container" class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 lg:gap-6">
                    </div>

                    <div class="mt-6 flex justify-between w-full max-w-md mx-auto">
                        <button id="prev-btn" class="boton-elegante flex items-center" disabled>
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5l-7 7 7 7" />
                        </svg>
                        Previous
                    </button>
                    <button id="next-btn" class="boton-elegante flex items-center">
                    Next
                    <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5l7 7-7 7" />
                    </svg>
                    </button>

                    </div>
                </main>
            </div>
        </div>

            <div id="aboutus" class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <h1  style="color: white; font-size: 2.5em; font-family: 'Quicksand', sans-serif;">About Us</h1>
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <main class="mt-6">
                        <div  class="grid gap-4 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 lg:gap-6">
                            <a
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-center text-xl font-semibold text-black dark:text-white">Mission</h2>
                                            <p class="text-justify mt-4 text-sm/relaxed">
                                            At Auto Vista, we are committed to providing our customers with 
                                            affordable and dependable rental cars. Our mission is to deliver a 
                                            hassle-free car rental experience that prioritizes customer satisfaction 
                                            and safety. We go above and beyond to exceed customer expectations by offering 
                                            top-quality rental vehicles, exceptional customer service, and competitive pricing.
                                            Our aim is to make the process of renting a car easy and enjoyable for everyone.                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-center text-xl font-semibold text-black dark:text-white">Vision</h2>
                                            <p class="text-justify mt-4 text-sm/relaxed">
                                            Our vision is to empower people to explore the world on their terms by providing 
                                            accessible and reliable transportation at affordable prices. We strive to be the 
                                            go-to destination for anyone seeking a stress-free and enjoyable car rental experience, 
                                            offering a wide range of vehicles to suit any need or budget. Our commitment to excellence 
                                            in customer service and safety will set us apart as a trusted and respected leader in the 
                                            industry, making travel more accessible and enjoyable for everyone.                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-center text-xl font-semibold text-black dark:text-white">Our Story</h2>
                                            <p class="text-justify mt-4 text-sm/relaxed">
                                            Our story is one of passion and dedication to providing exceptional 
                                            car rental services to our customers. From humble beginnings, we have 
                                            grown to become a leading car rental company in the Davao City, Philippines. We started
                                            with a simple idea  to provide affordable and reliable rental cars  and have 
                                            since expanded our fleet and services to meet the diverse needs of our customers. 
                                            Our commitment to customer satisfaction, safety, and excellence is at the heart of
                                            everything we do. We are proud of our journey so far and look forward to continuing
                                            to serve our customers with the same level of dedication and passion that got us started.          
                                          </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-center text-xl font-semibold text-black dark:text-white">Why Choose Us</h2>
                                            <p class="text-justify mt-4 text-sm/relaxed">
                                            We understand that choosing a car rental company can be a
                                            daunting task. That's why we strive to make the decision easy 
                                            for our customers by offering reliable, affordable, and hassle-free 
                                            car rental services. We prioritize customer satisfaction and safety, 
                                            and our experienced team is dedicated to providing top-quality rental 
                                            vehicles and excellent customer service. Additionally, we offer competitive 
                                            pricing and a wide selection of vehicles to meet the needs and preferences of 
                                            every customer. Choosing Auto Vista means choosing a worry-free and enjoyable car 
                                            rental experience.                                            
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>    
                    </main>
                </div>
            </div>
        </div>
        
        <div id="contactus" class="items-center justify-center text-center" style="display: flex; align-items: center; justify-content: center;">
            <h1 style="color: white; font-size: 2.5em; font-family: 'Quicksand', sans-serif;">Contact Us</h1>
        </div>

        <footer style="background-color: black; color: white; padding: 20px; text-align: center;">
            <div style="max-width: 1200px; margin: 0 auto;">
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; text-align: center;">

                    <div style="flex: 1 1 100%; text-align: center;">
                        <h5 class="mb-1 text-dark">Opening Hours:</h5>
                        <table class="table" style="border-color: #666; margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td>Mon - Fri:</td>
                                    <td>8am - 9pm</td>
                                </tr>
                                <tr>
                                    <td>Sat - Sun:</td>
                                    <td>8am - 1am</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style="flex: 1 1 100%; text-align: center;">
                        <h5 class="mb-3 text-dark">We are Happy to Serve You!</h5>
                    </div>
                    
                    <div style="flex: 1 1 200px; text-align: center;">
                        <h3>Email</h3>
                        <p><a href="mailto:autovistarentals@gmail.com" style="color: white; text-decoration: none;">autovistarentals@gmail.com</a></p>
                    </div>

                    <div style="flex: 1 1 200px; text-align: center;">
                        <h3>Phone</h3>
                        <p><a href="tel:+639288265266" style="color: white; text-decoration: none;">+639288265266</a></p>
                    </div>

                    <div style="flex: 1 1 200px; text-align: center;">
                        <h3>Follow Us</h3>
                        <p>
                            <a href="https://facebook.com" target="_blank" style="color: white; margin-right: 10px; display: inline-flex; align-items: center;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3.5l.5-4H14V7a1 1 0 011-1h3V2z" stroke="white" stroke-width="1.5" fill="none"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com" target="_blank" style="color: white; margin-right: 10px; display: inline-flex; align-items: center;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0012.32 8v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" stroke="white" stroke-width="1.5" fill="none"/>
                                </svg>
                            </a>
                            <a href="https://instagram.com" target="_blank" style="color: white; display: inline-flex; align-items: center;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke="white" stroke-width="2" fill="none"/>
                                    <path d="M12 7a5 5 0 105 5 5 5 0 00-5-5zm0 7a2 2 0 11 2-2 2 2 0 01-2 2zm4-7.5h.01" stroke="white" stroke-width="1" fill="none"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                </div>
                <div style="margin-top: 30px; font-size: 0.8em;">
                    <p>&copy; 2024 AutoVista. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
        <!-- back to top button -->
        <div  id="car" class="items-center justify-center text-center" style="display: flex; align-items: center; justify-content: center;">
        <a href="#home"><button class="button">
        <svg class="svgIcon" viewBox="0 0 384 512">
            <path
            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
            ></path>
        </svg>
        </button></a>
        </div>

    </body>
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.1/dist/cdn.min.js" defer></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
            
            <!-- Carousel Script -->
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.carousel').slick({
                        autoplay: true, 
                        autoplaySpeed: 2000,     
                        dots: true,          
                        arrows: true,            
                        infinite: true,
                        speed: 1000,      
                    });
                });
            </script>

            <!-- Cards Script -->
             <script>
                const cards = [
                    { title: "Economy", imgSrc: "card1.jpg", description: "The Economy category is ideal for budget-conscious renters who prioritize fuel efficiency and affordability." },
                    { title: "Compact", imgSrc: "card2.webp", description: "The Compact category offers affordable and practical vehicles with comfortable interiors, excellent fuel economy." },
                    { title: "Full-Size", imgSrc: "card3.jpg", description: "Full-size cars are popular for business travelers and longer trips, offering luxurious features and comfortable interiors." },
                    { title: "Luxury", imgSrc: "card4.jpg", description: "Luxury vehicles offer unparalleled luxury and performance, ideal for executives, VIPs, and anyone who wants to travel in style." },
                    { title: "SUV", imgSrc: "card5.jpg", description: "SUVs offer versatility and practicality, making them ideal for families, outdoor enthusiasts, and anyone looking for a reliable and comfortable ride." },
                    { title: "Van", imgSrc: "card6.jpg", description: "Van category is ideal for larger groups and families with flexible seating configurations and ample storage space." },
                    { title: "Sports", imgSrc: "card7.jpg", description: "Sports cars offer thrilling and exhilarating driving experiences for car enthusiasts, adrenaline junkies, and anyone looking for a fun and exciting driving experience." },
                    { title: "Truck", imgSrc: "card8.jpg", description: "The Truck category offers a range of vehicles with larger cargo capacity and hauling abilities for business or personal purposes." },
                    { title: "E-Cars", imgSrc: "card9.jpg", description: "Explore our eco-friendly and sustainable electric cars, perfect for those who want to reduce their carbon footprint while enjoying a smooth and quiet ride." }
                ];

                let currentPage = 1;
                const cardsPerPage = 3;

                function renderCards(page) {
                    const start = (page - 1) * cardsPerPage;
                    const end = page * cardsPerPage;
                    const cardsToDisplay = cards.slice(start, end);

                    const cardsContainer = document.getElementById('cards-container');
                    cardsContainer.innerHTML = '';

                    cardsToDisplay.forEach(card => {
                        const cardHTML = `
                            <a href="#" id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div id="screenshot-container" class="relative flex w-full flex-5 items-stretch">
                                    <img src="{{ asset('images/pic-cards/${card.imgSrc}') }}" width="500" alt="AV Logo" />
                                </div>
                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-xl font-semibold text-black dark:text-white">${card.title}</h2>
                                            <p class="mt-4 text-sm/relaxed">${card.description}</p>
                                        </div>
                                    </div>
                                    <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                                </div>
                            </a>
                        `;
                        cardsContainer.innerHTML += cardHTML;
                    });

                    document.getElementById('prev-btn').disabled = page === 1;
                    document.getElementById('next-btn').disabled = page * cardsPerPage >= cards.length;
                }

                document.getElementById('prev-btn').addEventListener('click', () => {
                    if (currentPage > 1) {
                        currentPage--;
                        renderCards(currentPage);
                    }
                });

                document.getElementById('next-btn').addEventListener('click', () => {
                    if (currentPage * cardsPerPage < cards.length) {
                        currentPage++;
                        renderCards(currentPage);
                    }
                });

                renderCards(currentPage);
            </script>
</html>

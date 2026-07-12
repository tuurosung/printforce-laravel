<!DOCTYPE html>
<html data-hs-theme-switch lang="en" dir="ltr" data-color-theme="Blue_Theme" class="light selected"
    data-layout="horizontal" data-boxed-layout="boxed" data-card="shadow">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css"> -->
    <!-- Core Css -->
    <link rel="stylesheet" href="../assets/css/theme.css" />
    <title>PrintForce - Workflow Manager For Print Businesses</title>
    <!-- <link rel="stylesheet" href="../assets/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/libs/aos/dist/aos.css" /> -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="DEFAULT_THEME bg-white dark:bg-dark">

    <main>
        <!--start the project-->
        <div id="main-wrapper" class="flex frontend-page">

            <div class="w-full" role="main">
                <!-- Announcement Bar Start -->
                <div id="announcement-bar"
                    class="hidden flex items-center justify-center py-1 cursor-pointer relative before:absolute before:h-full before:w-[200px] before:bg-no-repeat before:bg-cover before:bg-[url('/assets/images/frontend-pages/background/transparent-elilpse.png')] lg:before:block before:hidden before:top-0 before:right-0 after:absolute after:bg-[url('/src/assets/images/frontend-pages/background/right-ellipse.png')] lg:after:block after:hidden after:h-full after:w-[325px] after:right-[21%] after:1top-1 after:end-1/2 overflow-hidden gap-4 bg-primary">
                    <button
                        class="text-xs font-semibold py-1.5 px-2.5 rounded-lg bg-white/15 text-white hover:bg-white hover:text-primary">New</button>
                    <p class="text-13 text-white font-medium">
                        Frontend Pages Added
                    </p>
                    <div class="absolute top-0 start-0 lg:block hidden">
                        <img src="../assets/images/frontend-pages/background/left-ellipse.png" alt="ellipse" class="" />
                    </div>
                    <div id="close-btn"
                        class="h-6 w-6 rounded-full bg-secondary absolute top-1/2 -translate-y-1/2 end-3 text-white flex items-center justify-center hover:bg-secondaryemphasis">
                        <i class="ti ti-x  shrink-0 text-lg text-white"></i>
                    </div>
                </div>
                <!-- Announcement Bar End -->
                <!--  Header Start -->
                <header id='main-header'
                    class="sticky top-header top-0 inset-x-0 z-5 flex flex-wrap md:justify-start md:flex-nowrap text-sm px-0 sm:py-6 py-3  bg-white custom-shadow sticky:bg-white dark:bg-darkprimary ">
                    <div class="container flex items-center justify-between">

                        <div class="order-2">
                            <div class="brand-logo flex  items-center ">
                                <a href="../main/index.html" class="text-nowrap logo-img">
                                    <img src="{{ asset('/images/logo.png') }}"
                                        class="dark:hidden block rtl:hidden w-[70px]" alt="Logo-Dark" />
                                </a>
                            </div>

                        </div>
                        <!---Lp Mobile Toggle Icons--->
                        <div class="xl:hidden order-1">
                            <a class="rounded-full icon-hover h-10 w-10 flex justify-center text-link dark:text-darklink items-center hover:text-primary  relative hover:bg-lightprimary dark:hover:bg-darkprimary "
                                data-hs-overlay="#application-sidebar-lp">
                                <i class="ti ti-menu-2 text-xl relative "></i>
                            </a>
                        </div>

                        <!-- Menu-->
                        <ul class="xl:flex hidden items-center gap-2 order-3">
                            <li>
                                <a href="../main/frontend-aboutpage.html"
                                    class='text-[15px] py-[6px] px-4 text-link dark:text-darklink hover:text-primary font-medium'>About
                                    Us</a>
                            </li>
                            <li>
                                <a href="../main/frontend-blogpage.html"
                                    class='text-[15px] py-[6px] px-4 text-link dark:text-darklink hover:text-primary font-medium'>Blog</a>
                            </li>
                            <li>
                                <a href="../main/frontend-portfoliopage.html"
                                    class='text-[15px] py-[6px] px-4 flex items-center text-link dark:text-darklink gap-2 hover:text-primary font-medium'>
                                    Portfolio
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lightprimary dark:bg-darkprimary text-primary dark:text-primary">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="../main/index.html"
                                    class='text-[15px] py-[6px] px-4 text-link dark:text-darklink hover:text-primary font-medium'>Dashboard</a>
                            </li>
                            <li>
                                <a href="../main/frontend-pricingpage.html"
                                    class='text-[15px] py-[6px] px-4 text-link dark:text-darklink hover:text-primary font-medium'>Pricing</a>
                            </li>
                            <li>
                                <a href="../main/frontend-contactpage.html"
                                    class='text-[15px] py-[6px] px-4 text-link dark:text-darklink hover:text-primary font-medium'>Contact</a>
                            </li>

                        </ul>
                        <a href="{{ route('login') }}" class="btn order-4">Login</a>
                    </div>
                </header>

                <!-- Main Content -->
                <div class="max-w-full">

                    <!-- Herosection start -->
                    <div class="py-[80px] h-30vh bg-gray-900 custom-shadow  bg-[url('/public/images/hero-cover.png')]">
                        <div class="container py-6 pb-0 px-4">
                            <div class="flex w-full justify-center">
                                <div class="md:w-8/12 w-full pt-8">
                                    <h1
                                        class="lg:text-[4.5rem] text-[4.5rem] lh-1.25 text-white text-center text-link dark:text-white">
                                        Workflow Manager For
                                    </h1>
                                    <h1
                                        class="lg:text-[4.5rem] text-[4.5rem] lh-1.25 text-white text-center text-link dark:text-white">
                                        <span class="text-primary">Digital Print</span> Businesses
                                    </h1>
                                </div>
                            </div>
                            <div class="w-full pt-5 pb-5">
                                <div class="flex flex-wrap gap-6 items-center justify-center mx-auto mb-3">
                                    <div class="text-lg text-white dark:text-darklink font-medium text-center">
                                        18 Companies & Designers Use Our Software.</div>
                                </div>
                                <div class="w-full relative p-3 img-wrapper">
                                    <div class="flex items-center justify-center gap-5 mx-auto">
                                        <a href="../main/authentication-login.html" target="_blank"
                                            class="btn">

                                            Create
                                        </a>
                                        <a href="../main/authentication-login.html" target="_blank"
                                            class="btn btn-md">
                                            <i class="fi fi-sr-lock"></i>
                                            Sign Into Your Account
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Herosection end -->

                    <!-- Demos Section Start -->
                    <div class="container-md lg:py-24 py-12 px-4">
                        <div class="flex justify-center w-full mb-12">
                            <div class="lg:w-6/12 w-full">
                                <p class="text-base text-lightmuted dark:text-darklink text-center">
                                    PrintForce is a high-performance workflow manager for
                                    creatives, designers and print studios, automating their operations and keeping records whilst they unleash thier
                                    creativity.
                                </p>
                            </div>
                        </div>
                        <div class="flex w-full lg:flex-nowrap flex-wrap gap-6">
                            <div class="lg:w-[28%] w-full">
                                <div
                                    class=" py-12 px-6 justify-center rounded-base bg-lightwarning dark:bg-darkwarning mb-6">
                                    <!-- <img src='../assets/images/svgs/icon-briefcase.svg' alt="image" class="mx-auto" /> -->
                                    <h1 class="py-4 text-center font-bold text-link dark:text-white text-lg">Light &
                                        Dark Color Schemes</h1>
                                    <p class="text-lightmuted dark:text-darklink text-base font-normal text-center">
                                        Choose your preferred visual style effortlessly.</p>
                                </div>
                                <div
                                    class=" pt-12 px-6 justify-center rounded-base bg-lightsuccess dark:bg-darksuccess">
                                    <h1 class="pb-4 text-center font-bold text-link dark:text-white text-lg px-3">12+
                                        Ready to Use Application Designs</h1>
                                    <p
                                        class="text-lightmuted mb-5 dark:text-darklink text-base font-normal text-center">
                                        Instantly deployable designs for your applications.</p>
                                    <!-- <img src="../assets/images/frontend-pages/background/app-widget.png" alt="image"
                                        class="mx-auto px-6" /> -->
                                </div>
                            </div>
                            <div class="lg:w-5/12 w-full">
                                <div
                                    class=" py-12 px-6 justify-center rounded-base bg-lightprimary dark:bg-darkprimary">
                                    <!-- <img src='../assets/images/logos/favicon.png' alt="image" class="mx-auto"
                                        width='52' /> -->
                                    <h1
                                        class="py-4 pb-7 font-bold text-link dark:text-white text-center md:text-[40px] text-[32px] leading-normal">
                                        New Demos</h1>
                                    <p
                                        class="text-lightmuted dark:text-darklink text-base font-normal text-center pb-6">
                                        Brand new demos to help you build the perfect dashboard: <span
                                            class="font-semibold">Dark</span> and <span
                                            class="font-semibold">Right-to-Left</span>.</p>
                                    <!-- <img src='../assets/images/frontend-pages/background/Scene.png'
                                        class="xl:mt-4 lg:mt-20 mt-4 lg:px-6 px-0" alt="image" /> -->
                                </div>
                            </div>
                            <div class="lg:w-[28%] w-full">
                                <div
                                    class=" py-12 px-6 justify-center rounded-base bg-lightsuccess dark:bg-darksuccess mb-6">
                                    <!-- <img src='../assets/images/svgs/icon-speech-bubble.svg' alt="image"
                                        class="mx-auto" /> -->
                                    <h1 class="py-4 text-center font-bold text-link dark:text-white text-lg">Code
                                        Improvements</h1>
                                    <p class="text-lightmuted dark:text-darklink text-base font-normal text-center">
                                        Benefit from continuous improvements and optimizations.</p>
                                </div>
                                <div class=" py-12 px-6 justify-center rounded-base bg-lighterror dark:bg-darkerror">
                                    <!-- <img src='../assets/images/svgs/icon-favorites.svg' alt="image" class="mx-auto" /> -->
                                    <h1 class="py-4 text-center font-bold text-link dark:text-white text-lg">50+ UI
                                        Components</h1>
                                    <p class="text-lightmuted dark:text-darklink text-base font-normal text-center">A
                                        rich collection for seamless user experiences.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Demos Section End -->




                    <!-- Features Start -->
                    <div
                        class="container lg:py-24 py-12 bg-lightprimary dark:bg-lightprimary rounded-base overflow-hidden hidden">
                        <div class="flex justify-center w-full mb-16">
                            <div class="lg:w-6/12 w-full">
                                <h2
                                    class="md:text-40 text-32 font-bold text-link dark:text-white leading-tight text-center">
                                    Enjoy unparalleled features & exceptional flexibility.
                                </h2>
                            </div>
                        </div>
                        <div class="marquee1-group flex gap-6">
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-wand text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        6 Theme Colors</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brightness text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Dark & Light Sidebar</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brand-firebase text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        425+ Page Templates</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-archive text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        150+ UI Components</p>
                                </div>

                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brand-tailwind text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Tailwindcss 4x</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-overline text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Preline UI</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-diamond text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        3400+ Font Icons</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-wand text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        6 Theme Colors</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brightness text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Dark & Light Sidebar</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brand-firebase text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        425+ Page Templates</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-archive text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        150+ UI Components</p>
                                </div>

                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brand-tailwind text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Tailwindcss 4x</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-overline text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Preline UI</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-diamond text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        3400+ Font Icons</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-wand text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        6 Theme Colors</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brightness text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Dark & Light Sidebar</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brand-firebase text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        425+ Page Templates</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-archive text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        150+ UI Components</p>
                                </div>

                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brand-tailwind text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Tailwindcss 4x</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-overline text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Preline UI</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-diamond text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        3400+ Font Icons</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-wand text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        6 Theme Colors</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brightness text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Dark & Light Sidebar</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brand-firebase text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        425+ Page Templates</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-archive text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        150+ UI Components</p>
                                </div>

                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-brand-tailwind text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Tailwindcss 4x</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-overline text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Preline UI</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-diamond text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        3400+ Font Icons</p>
                                </div>
                            </div>
                        </div>
                        <div class="marquee2-group flex gap-6">
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-device-desktop text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Fully Responsive</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-arrows-shuffle text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Easy to Customize</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Tables</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-device-desktop text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Fully Responsive</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-arrows-shuffle text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Easy to Customize</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Tables</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-device-desktop text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Fully Responsive</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-arrows-shuffle text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Easy to Customize</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Tables</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-device-desktop text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Fully Responsive</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-arrows-shuffle text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Easy to Customize</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Tables</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-device-desktop text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Fully Responsive</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-arrows-shuffle text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Easy to Customize</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Tables</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6">
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-device-desktop text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Fully Responsive</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-arrows-shuffle text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Easy to Customize</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Tables</p>
                                </div>
                            </div>

                        </div>
                        <div class="marquee1-group flex gap-6">

                            <div class="flex gap-6 mb-6" key={index}>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Table Examples</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-refresh text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Regular Updates</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-book text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Detailed Documentation</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-calendar text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Calendar Design</p>
                                </div>

                            </div>
                            <div class="flex gap-6 mb-6" key={index}>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Table Examples</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-refresh text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Regular Updates</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-book text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Detailed Documentation</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-calendar text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Calendar Design</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-user-screen text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Dedicated Support</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6" key={index}>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Table Examples</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-refresh text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Regular Updates</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-book text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Detailed Documentation</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-calendar text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Calendar Design</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-user-screen text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Dedicated Support</p>
                                </div>
                            </div>
                            <div class="flex gap-6 mb-6" key={index}>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-chart-pie text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Chart Options</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-layers-intersect text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Lots of Table Examples</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-refresh text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Regular Updates</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-book text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Detailed Documentation</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-calendar text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Calendar Design</p>
                                </div>
                                <div
                                    class="py-6 px-8 rounded-base elevation-1 flex gap-3 items-center bg-white dark:bg-dark ">
                                    <i class="ti ti-user-screen text-primary text-2xl shrink-0"></i>
                                    <p class="text-[15px] font-semibold whitespace-nowrap text-link dark:text-darklink">
                                        Dedicated Support</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Features End -->

                    <!-- License Pricing Start -->
                    <div class="container-md px-4 lg:py-24 py-12">
                        <div class="flex w-full justify-center mb-12">
                            <div class="lg:w-6/12 w-full">
                                <div
                                    class="md:text-40 text-32 font-bold leading-tight text-center text-link dark:text-white">
                                    111,476+ Trusted developers & many tech giants as well
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6">
                            <div class="xl:col-span-3 md:col-span-6 col-span-12">
                                <div class="p-7 rounded-base border border-border dark:border-darkborder">
                                    <div class="pb-8 border-b border-border dark:border-darkborder">
                                        <h6
                                            class="text-xl font-bold text-link dark:text-white mb-4 flex items-center gap-2">
                                            Single Use
                                        </h6>
                                        <p class="text-lightmuted text-[13px] font-medium dark:text-darklink">Use for
                                            single end product which end users can’t be charged for.</p>
                                    </div>
                                    <div class="flex gap-2 pt-8 ">
                                        <div
                                            class="md:text-40 text-32 leading-tight font-bold text-link dark:text-white">
                                            $49</div>
                                        <p
                                            class="text-base self-end text-lightmuted dark:text-darklink font-normal relative -top-1">
                                            /one time pay</p>
                                    </div>
                                    <div class="mt-8 flex flex-col gap-3.5">
                                        <div class="flex items-center gap-2">
                                            <Icon icon="tabler:circle-check" class="text-xl text-secondary" />
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Full source code</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <Icon icon="tabler:circle-check" class="text-xl text-secondary" />
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Documentation</p>
                                        </div>
                                        <div class="flex items-center flex-nowrap gap-2">
                                            <i
                                                class="ti ti-circle-x text-xl text-link dark:text-darklink opacity-50"></i>
                                            <p
                                                class="text-sm text-link dark:text-darklink font-medium tracking-wide opacity-50">
                                                Use in SaaS app</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                One Project</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Technical Support
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Free Updates
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <button
                                            class="btn bg-primary hover:bg-primaryemphasis text-base text-white btn-md py-2.5 px-4 w-full block">Purchase
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="xl:col-span-3 md:col-span-6 col-span-12">
                                <div class="p-7 rounded-base border border-border dark:border-darkborder">
                                    <div class="pb-8 border-b border-border dark:border-darkborder">
                                        <h6
                                            class="text-xl font-bold text-link dark:text-white mb-4 flex items-center gap-2">
                                            Multiple Use
                                        </h6>
                                        <p class="text-lightmuted text-[13px] font-medium dark:text-darklink">Use for
                                            unlimited end products end users can’t be charged for.</p>
                                    </div>
                                    <div class="flex gap-2 pt-8 ">
                                        <div
                                            class="md:text-40 text-32 leading-tight font-bold text-link dark:text-white">
                                            $89</div>
                                        <p
                                            class="text-base self-end text-lightmuted dark:text-darklink font-normal relative -top-1">
                                            /one time pay</p>
                                    </div>
                                    <div class="mt-8 flex flex-col gap-3.5">
                                        <div class="flex items-center gap-2">
                                            <Icon icon="tabler:circle-check" class="text-xl text-secondary" />
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Full source code</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <Icon icon="tabler:circle-check" class="text-xl text-secondary" />
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Documentation</p>
                                        </div>
                                        <div class="flex items-center flex-nowrap gap-2">
                                            <i
                                                class="ti ti-circle-x text-xl text-link dark:text-darklink opacity-50"></i>
                                            <p
                                                class="text-sm text-link dark:text-darklink font-medium tracking-wide opacity-50">
                                                Use in SaaS app</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                One Project</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Technical Support
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Free Updates
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <button
                                            class="btn bg-primary hover:bg-primaryemphasis text-base text-white btn-md py-2.5 px-4 w-full block">Purchase
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="xl:col-span-3 md:col-span-6 col-span-12">
                                <div class="p-7 rounded-base border border-border dark:border-darkborder">
                                    <div class="pb-8 border-b border-border dark:border-darkborder">
                                        <h6
                                            class="text-xl font-bold text-link dark:text-white mb-4 flex items-center gap-2">
                                            Extended Use
                                            <span
                                                class="py-2 px-[10px] text-xs font-semibold text-primary bg-lightprimary rounded-md">Popular</span>
                                        </h6>
                                        <p class="text-lightmuted text-[13px] font-medium dark:text-darklink">Use for
                                            unlimited end products end users can’t be charged for.</p>
                                    </div>
                                    <div class="flex gap-2 pt-8 ">
                                        <div
                                            class="md:text-40 text-32 leading-tight font-bold text-link dark:text-white">
                                            $299</div>
                                        <p
                                            class="text-base self-end text-lightmuted dark:text-darklink font-normal relative -top-1">
                                            /one time pay</p>
                                    </div>
                                    <div class="mt-8 flex flex-col gap-3.5">
                                        <div class="flex items-center gap-2">
                                            <Icon icon="tabler:circle-check" class="text-xl text-secondary" />
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Full source code</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <Icon icon="tabler:circle-check" class="text-xl text-secondary" />
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Documentation</p>
                                        </div>
                                        <div class="flex items-center flex-nowrap gap-2">
                                            <i
                                                class="ti ti-circle-check text-xl text-secondary dark:text-secondary"></i>
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Use in SaaS app</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                One Project</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Technical Support
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Free Updates
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <button
                                            class="btn bg-primary hover:bg-primaryemphasis text-base text-white btn-md py-2.5 px-4 w-full block">Purchase
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="xl:col-span-3 md:col-span-6 col-span-12">
                                <div class="p-7 rounded-base border border-border dark:border-darkborder">
                                    <div class="pb-8 border-b border-border dark:border-darkborder">
                                        <h6
                                            class="text-xl font-bold text-link dark:text-white mb-4 flex items-center gap-2">
                                            Unlimited Use
                                            <span
                                                class="py-2 px-[10px] text-xs font-semibold text-primary bg-lightprimary rounded-md">Popular</span>
                                        </h6>
                                        <p class="text-lightmuted text-[13px] font-medium dark:text-darklink">Use in
                                            unlimited end products end users can be charged for.</p>
                                    </div>
                                    <div class="flex gap-2 pt-8 ">
                                        <div
                                            class="md:text-40 text-32 leading-tight font-bold text-link dark:text-white">
                                            $499</div>
                                        <p
                                            class="text-base self-end text-lightmuted dark:text-darklink font-normal relative -top-1">
                                            /one time pay</p>
                                    </div>
                                    <div class="mt-8 flex flex-col gap-3.5">
                                        <div class="flex items-center gap-2">
                                            <Icon icon="tabler:circle-check" class="text-xl text-secondary" />
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Full source code</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <Icon icon="tabler:circle-check" class="text-xl text-secondary" />
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Documentation</p>
                                        </div>
                                        <div class="flex items-center flex-nowrap gap-2">
                                            <i
                                                class="ti ti-circle-check text-xl text-secondary dark:text-secondary"></i>
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                Use in SaaS app</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                One Project</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Technical Support
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Free Updates
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <button
                                            class="btn bg-primary hover:bg-primaryemphasis text-base text-white btn-md py-2.5 px-4 w-full block">Purchase
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pt-12">
                            <p class="text-base font-medium text-lightmuted dark:text-darklink text-center mb-8">Secured
                                payment with PayPal & Razorpay</p>
                            <div class="flex items-center flex-wrap justify-center gap-12">
                                <!-- <img src='../assets/images/frontend-pages/payments/visa.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/master.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/american-exp.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/discover.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/paypal.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/maesro.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/jcb.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/dinners-clb.svg' alt="payment" /> -->
                            </div>
                        </div>
                    </div>
                    <!-- License Pricing End -->

                    <!-- FAQ start -->
                    <section class="max-w-[800px] mx-auto px-4 lg:pb-24 pb-20 pt-0">
                        <h3
                            class="md:text-40 text-32 font-bold text-link dark:text-white leading-tight text-center mb-14">
                            Frequently asked questions</h3>
                        <div class="hs-accordion-group">
                            <div class="hs-accordion active border-border border  -mt-px first:rounded-t-md last:rounded-b-md rounded-t-md dark:border-darkborder"
                                id="hs-bordered-heading-one">
                                <button
                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex items-center justify-between gap-x-3 w-full font-semibold text-start text-dark py-5 px-6 hover:text-primary dark:text-white text-lg dark:hover:text-primary"
                                    aria-controls="hs-basic-bordered-collapse-one">
                                    What is included with my purchase?
                                    <svg class="hs-accordion-active:hidden block w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    <svg class="hs-accordion-active:block hidden w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                    </svg>

                                </button>
                                <div id="hs-basic-bordered-collapse-one"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                    aria-labelledby="hs-bordered-heading-one">
                                    <div class="pb-4 px-5">
                                        <p class="text-base">
                                            Tailor the dashboard to your exact needs. Customize layouts, color schemes,
                                            and widgets effortlessly for a personalized user experience.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="hs-accordion border-border border -mt-px first:rounded-t-md last:rounded-b-md dark:border-darkborder"
                                id="hs-bordered-heading-two">
                                <button
                                    class="hs-accordion-toggle hs-accordion-active:text-primary justify-between inline-flex items-center gap-x-3 w-full font-semibold text-start text-dark py-5 px-6 hover:text-primary dark:text-white text-lg dark:hover:text-primary"
                                    aria-controls="hs-basic-bordered-collapse-two">
                                    Are there any recurring fees?
                                    <svg class="hs-accordion-active:hidden block w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    <svg class="hs-accordion-active:block hidden w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                    </svg>

                                </button>
                                <div id="hs-basic-bordered-collapse-two"
                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                    aria-labelledby="hs-bordered-heading-two">
                                    <div class="pb-4 px-5">
                                        <p class="text-base">
                                            Unlock the true potential of your data with our advanced analytics tools.
                                            Gain valuable insights and make data-driven decisions with ease.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="hs-accordion border-border border -mt-px first:rounded-t-md last:rounded-b-md dark:border-darkborder"
                                id="hs-bordered-heading-three">
                                <button
                                    class="hs-accordion-toggle hs-accordion-active:text-primary justify-between inline-flex items-center gap-x-3 w-full font-semibold text-start text-dark py-5 px-6 hover:text-primary dark:text-white text-lg dark:hover:text-primary"
                                    aria-controls="hs-basic-bordered-collapse-three">
                                    Can I use the template on multiple projects?
                                    <svg class="hs-accordion-active:hidden block w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    <svg class="hs-accordion-active:block hidden w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                    </svg>

                                </button>
                                <div id="hs-basic-bordered-collapse-three"
                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                    aria-labelledby="hs-bordered-heading-three">
                                    <div class="pb-4 px-5">
                                        <p class="text-base">
                                            Visualize complex data sets beautifully with our interactive graphs and
                                            charts. Quickly grasp trends and patterns for smarter analysis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="hs-accordion border-border border -mt-px first:rounded-t-md last:rounded-b-md dark:border-darkborder"
                                id="hs-bordered-heading-four">
                                <button
                                    class="hs-accordion-toggle hs-accordion-active:text-primary justify-between inline-flex items-center gap-x-3 w-full font-semibold text-start text-dark py-5 px-6 hover:text-primary dark:text-white text-lg dark:hover:text-primary"
                                    aria-controls="hs-basic-bordered-collapse-three">
                                    Can I customize the admin dashboard template to match my brand?
                                    <svg class="hs-accordion-active:hidden block w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    <svg class="hs-accordion-active:block hidden w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                    </svg>

                                </button>
                                <div id="hs-basic-bordered-collapse-three"
                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                    aria-labelledby="hs-bordered-heading-four">
                                    <div class="pb-4 px-5">
                                        <p class="text-base">
                                            Visualize complex data sets beautifully with our interactive graphs and
                                            charts. Quickly grasp trends and patterns for smarter analysis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="hs-accordion border-border border -mt-px first:rounded-t-md last:rounded-b-md dark:border-darkborder"
                                id="hs-bordered-heading-five">
                                <button
                                    class="hs-accordion-toggle hs-accordion-active:text-primary justify-between inline-flex items-center gap-x-3 w-full font-semibold text-start text-dark py-5 px-6 hover:text-primary dark:text-white text-lg dark:hover:text-primary"
                                    aria-controls="hs-basic-bordered-collapse-three">
                                    Are there any restrictions on using the template?
                                    <svg class="hs-accordion-active:hidden block w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    <svg class="hs-accordion-active:block hidden w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                    </svg>

                                </button>
                                <div id="hs-basic-bordered-collapse-three"
                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                    aria-labelledby="hs-bordered-heading-five">
                                    <div class="pb-4 px-5">
                                        <p class="text-base">
                                            Visualize complex data sets beautifully with our interactive graphs and
                                            charts. Quickly grasp trends and patterns for smarter analysis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="hs-accordion border-border border -mt-px first:rounded-t-md last:rounded-b-md dark:border-darkborder"
                                id="hs-bordered-heading-six">
                                <button
                                    class="hs-accordion-toggle hs-accordion-active:text-primary justify-between inline-flex items-center gap-x-3 w-full font-semibold text-start text-dark py-5 px-6 hover:text-primary dark:text-white text-lg dark:hover:text-primary"
                                    aria-controls="hs-basic-bordered-collapse-three">
                                    How can I get support after purchase?
                                    <svg class="hs-accordion-active:hidden block w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    <svg class="hs-accordion-active:block hidden w-5 h-5 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                    </svg>

                                </button>
                                <div id="hs-basic-bordered-collapse-three"
                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                    aria-labelledby="hs-bordered-heading-six">
                                    <div class="pb-4 px-5">
                                        <p class="text-base">
                                            Visualize complex data sets beautifully with our interactive graphs and
                                            charts. Quickly grasp trends and patterns for smarter analysis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p
                            class="mt-14 w-fit mx-auto py-1 px-2 rounded-md border-2 border-dashed border-border dark:border-darkborder text-sm font-medium justify-center text-lightmuted dark:text-darklink flex items-center flex-wrap gap-1">
                            Still have a question?
                            <Link href="https://discord.com/invite/XujgB8ww4n" class="underline hover:text-primary">Ask
                            On Discord</Link> <span>or</span>
                            <a href="https://adminmart.com/support/" class="underline hover:text-primary">Submit A
                                Ticket</a>
                        </p>
                    </section>
                    <!-- FAQ end -->

                    <!-- Feature Banner Start -->
                    <div class="px-4 container">
                        <div class=" bg-lightprimary rounded-base relative overflow-hidden">
                            <div class="flex w-full">
                                <div class="lg:w-6/12 w-full lg:p-24 py-12 px-4 lg:pe-10 pe-4">
                                    <h3 class="md:text-40 text-32 font-bold leading-tight text-link dark:text-white">
                                        Develop with feature-rich
                                        Tailwind Dashboard</h3>
                                    <div class="my-6 flex items-center gap-4">
                                        <a href="../main/authentication-login.html" target="_blank"
                                            class="btn bg-primary hover:bg-primaryemphasis text-white btn-md py-2.5 px-4 w-fit block">Login</a>
                                        <a href="../main/authentication-register.html" target="_blank"
                                            class="btn border border-primary bg-transparent text-primary hover:bg-primary dark:hover:bg-primary hover:text-white rounded-md btn-md py-2.5 px-4 w-fit block">Register</a>
                                    </div>
                                    <p class="text-base font-medium text-link dark:text-white">
                                        <span class="font-semibold">One-time purchase</span> - no recurring fees.
                                    </p>
                                </div>
                            </div>
                            <Image src='../assets/images/frontend-pages/background/design-collection.png' alt="banner"
                                class="absolute top-0 -end-[300px] rtl:-scale-x-100 lg:block hidden" />
                        </div>
                    </div>
                    <!-- Feature Banner End -->

                    <!-- Footer Section -->
                    <footer>
                        <div class="container-md px-4 lg:py-24 md:py-20 py-12">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="lg:col-span-3 sm:col-span-6 col-span-12">
                                    <h4 class="text-lg text-link dark:text-white font-semibold mb-8">Company and team
                                    </h4>
                                    <div class="flex flex-col gap-4">
                                        <a href='../main/ui-cards.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Cards</a>
                                        <a href='../main/page-pricing.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Pricing</a>
                                        <a href='../main/page-account-settings.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Account
                                            Settings</a>
                                        <a href='../main/page-faq.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">FAQ</a>
                                        <a href='../main/page-user-profile.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">User
                                            Profile</a>
                                    </div>
                                </div>
                                <div class="lg:col-span-3 sm:col-span-6 col-span-12">
                                    <h4 class="text-lg text-link dark:text-white font-semibold mb-8">Features</h4>
                                    <div class="flex flex-col gap-4">
                                        <a href='../main/widgets-banners.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Banners</a>
                                        <a href='../main/widgets-charts.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Charts</a>
                                        <a href='../main/widgets-data.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Data</a>
                                        <a href='../main/widgets-feeds.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Feeds</a>
                                        <a href='../main/ui-button.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Buttons</a>
                                    </div>
                                </div>
                                <div class="lg:col-span-3 sm:col-span-6 col-span-12">
                                    <h4 class="text-lg text-link dark:text-white font-semibold mb-8">Resources</h4>
                                    <div class="flex flex-col gap-4">
                                        <a href='../main/form-inputs.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Form
                                            Input</a>
                                        <a href='../main/table-basic.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Tables</a>
                                        <a href='../main/table-miscellaneous.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Miscellaneous</a>
                                        <a href='../main/form-input-grid.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Form
                                            Grid</a>
                                        <a href='../main/app-invoice.html'
                                            class="text-sm font-medium text-lightmuted hover:text-primary dark:text-darklink block">Invoice
                                            App</a>
                                    </div>
                                </div>
                                <div class="lg:col-span-3 sm:col-span-6 col-span-12">
                                    <h4 class="text-lg text-link dark:text-white font-semibold mb-8">Followers</h4>
                                    <div class="flex items-center gap-5">
                                        <div class="hs-tooltip inline-block">
                                            <div class="hs-tooltip-toggle">
                                                <img src='../assets/images/frontend-pages/svgs/facebook.svg'
                                                    class="w-[22px] h-[22px]" alt="tech-icon" width="30" height="30" />
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                    role="tooltip">
                                                    Facebook
                                                </span>
                                            </div>
                                        </div>
                                        <div class="hs-tooltip inline-block">
                                            <div class="hs-tooltip-toggle">
                                                <img src='../assets/images/frontend-pages/svgs/twitter.svg'
                                                    class="w-[22px] h-[22px]" alt="tech-icon" width="30" height="30" />
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                    role="tooltip">
                                                    Twitter
                                                </span>
                                            </div>
                                        </div>
                                        <div class="hs-tooltip inline-block">
                                            <div class="hs-tooltip-toggle">
                                                <img src='../assets/images/frontend-pages/svgs/instagram.svg'
                                                    class="w-[22px] h-[22px]" alt="tech-icon" width="30" height="30" />
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                    role="tooltip">
                                                    Instagram
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-md px-4 py-10 border-t border-border dark:border-darkborder">
                            <div class="flex justify-between items-center flex-wrap">
                                <div class="flex items-center gap-4">
                                    <img src='{{ asset('/images/logo.png') }}' class="h-6" alt="logo" height="24" />
                                    <p class="text-base text-lightmuted dark:text-darklink">All rights reserved
                                        </p>
                                </div>
                                <p class="text-base text-lightmuted dark:text-darklink flex items-center gap-1">Produced
                                    by

                                </p>
                            </div>
                        </div>
                    </footer>



                </div>
                <!-- Main Content End -->
            </div>
        </div>
        <!--end of project-->
    </main>


</html>

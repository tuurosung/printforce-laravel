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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="../assets/css/theme.css" />
    <link rel="stylesheet" href="../assets/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/libs/aos/dist/aos.css" />
</head>

<body class="DEFAULT_THEME bg-white dark:bg-dark">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class="flex frontend-page">

            <div class="w-full" role="main">
                <!-- Announcement Bar Start -->
                <div id="announcement-bar"
                    class="flex items-center justify-center py-1 cursor-pointer relative before:absolute before:h-full before:w-[200px] before:bg-no-repeat before:bg-cover before:bg-[url('/assets/images/frontend-pages/background/transparent-elilpse.png')] lg:before:block before:hidden before:top-0 before:right-0 after:absolute after:bg-[url('/src/assets/images/frontend-pages/background/right-ellipse.png')] lg:after:block after:hidden after:h-full after:w-[325px] after:right-[21%] after:1top-1 after:end-1/2 overflow-hidden gap-4 bg-primary">
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
                    class="sticky top-header top-0 inset-x-0 z-[5] flex flex-wrap md:justify-start md:flex-nowrap text-sm px-0 sm:py-6 py-3  bg-lightprimary dark:bg-darkprimary ">
                    <div class="container flex items-center justify-between">

                        <div class="order-2">
                            <div class="brand-logo flex  items-center ">
                                <a href="../main/index.html" class="text-nowrap logo-img">
                                    <img src="../assets/images/logos/dark-logo.svg"
                                        class="dark:hidden block rtl:hidden !w-fit" alt="Logo-Dark" />
                                    <img src="../assets/images/logos/light-logo.svg"
                                        class="dark:block hidden rtl:hidden rtl:dark:hidden !w-fit" alt="Logo-light" />

                                    <img src="../assets/images/logos/dark-logo-rtl.svg"
                                        class="dark:hidden hidden rtl:block rtl:dark:hidden !w-fit" alt="Logo-Dark" />
                                    <img src="../assets/images/logos/light-logo-rtl.svg"
                                        class="dark:hidden hidden rtl:hidden rtl:dark:block !w-fit" alt="Logo-light" />
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
                        <a href="../main/authentication-login.html" class="btn order-4">Login</a>
                    </div>
                </header>

                <!-- Main Content -->
                <div class="max-w-full">

                    <!-- Herosection start -->
                    <div class="lg:pt-6 pt-0 bg-lightprimary">
                        <div class="container py-4 pb-0 px-4">
                            <div class="flex w-full justify-center">
                                <div class="md:w-8/12 w-full pt-8">
                                    <h1
                                        class="lg:text-[56px] text-4xl leading-tight text-center font-bold text-link dark:text-white">
                                        Most powerful & <span class="text-primary">Developer friendly</span> dashboard
                                    </h1>
                                </div>
                            </div>
                            <div class="w-full pt-5">
                                <div class="flex flex-wrap gap-6 items-center justify-center mx-auto mb-3">
                                    <div class="flex">
                                        <img src='../assets/images/profile/user-1.jpg' alt="user-image"
                                            class="!w-10 !h-10  rounded-full border-2 border-white relative -mr-2.5 z-[2]" />
                                        <img src='../assets/images/profile/user-2.jpg' alt="user-image"
                                            class="!w-10 !h-10  rounded-full border-2 border-white relative -mr-2.5 z-[1]" />
                                        <img src='../assets/images/profile/user-3.jpg' alt="user-image"
                                            class="!w-10 !h-10  rounded-full border-2 border-white" />
                                    </div>
                                    <div class="text-lg text-bodytext dark:text-darklink font-medium text-center">
                                        52,589+
                                        developers & agencies using our templates</div>
                                </div>
                                <div class="w-full relative p-3 img-wrapper">
                                    <div class="flex items-center justify-center gap-5 mx-auto">
                                        <a href="../main/authentication-login.html" target="_blank"
                                            class="btn">Login</a>
                                        <button type="button" aria-haspopup="dialog" aria-expanded="false"
                                            aria-controls="hs-vertically-centered-modal"
                                            data-hs-overlay="#hs-vertically-centered-modal"
                                            class="flex items-center gap-3 group cursor-pointer">
                                            <div
                                                class="w-10 h-10 rounded-full flex items-center text-primary group-hover:bg-primary group-hover:text-white justify-center border-2 border-primary">
                                                <i class="ti ti-player-play-filled" class=" text-base"></i>
                                            </div>
                                            <p
                                                class="text-link group-hover:text-primary dark:text-darklink font-medium text-[15px]">
                                                See how it works
                                            </p>
                                        </button>

                                    </div>
                                    <div class="py-9 flex justify-center item-center lg:gap-6 gap-3 flex-nowrap">
                                        <div class="hs-tooltip inline-block">
                                            <div
                                                class="hs-tooltip-toggle h-14 w-14 rounded-[16px] custom-shadow bg-white dark:bg-darkgray flex items-center justify-center cursor-pointer">
                                                <img src='../assets/images/frontend-pages/technology/Preline.svg'
                                                    class="w-[30px] h-[30px]" alt="tech-icon" width="30" height="30" />
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-dark"
                                                    role="tooltip">
                                                    Preline
                                                </span>
                                            </div>
                                        </div>
                                        <div class="hs-tooltip inline-block">
                                            <div
                                                class="hs-tooltip-toggle h-14 w-14 rounded-[16px] custom-shadow bg-white dark:bg-darkgray flex items-center justify-center cursor-pointer">
                                                <img src='../assets/images/frontend-pages/technology/devicon--html5.svg'
                                                    class="w-[30px] h-[30px]" alt="tech-icon" width="30" height="30" />
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-dark"
                                                    role="tooltip">
                                                    HTML
                                                </span>
                                            </div>
                                        </div>
                                        <div class="hs-tooltip inline-block">
                                            <div
                                                class="hs-tooltip-toggle h-14 w-14 rounded-[16px] custom-shadow bg-white dark:bg-darkgray flex items-center justify-center cursor-pointer">
                                                <img src='../assets/images/frontend-pages/technology/logos--javascript.svg'
                                                    class="w-[30px] h-[30px]" alt="tech-icon" width="30" height="30" />
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                    role="tooltip">
                                                    Javascript
                                            </div>
                                        </div>
                                        <div class="hs-tooltip inline-block">
                                            <div
                                                class="hs-tooltip-toggle h-14 w-14 rounded-[16px] custom-shadow bg-white dark:bg-darkgray flex items-center justify-center cursor-pointer">
                                                <img src='../assets/images/frontend-pages/technology/devicon--tailwindcss.svg'
                                                    class="w-[30px] h-[30px]" alt="tech-icon" width="30" height="30" />
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                    role="tooltip">
                                                    Tailwind
                                            </div>
                                        </div>
                                        <div class="hs-tooltip inline-block">
                                            <div
                                                class="hs-tooltip-toggle h-14 w-14 rounded-[16px] custom-shadow bg-white dark:bg-darkgray flex items-center justify-center cursor-pointer">
                                                <img src='../assets/images/frontend-pages/technology/devicon--jquery.svg'
                                                    class="w-[30px] h-[30px]" alt="tech-icon" width="30" height="30" />
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                    role="tooltip">
                                                    Jquery
                                            </div>
                                        </div>
                                    </div>
                                    <img src='../assets/images/frontend-pages/background/banner-left-widget.jpg'
                                        alt="widget"
                                        class="absolute top-0 start-0 rounded-base custom-shadow animated-img xl:block hidden" />
                                    <img src='../assets/images/frontend-pages/background/banner-right-widget.jpg'
                                        alt="widget"
                                        class="absolute -top-7 end-0 rounded-base custom-shadow animated-img xl:block hidden" />
                                </div>
                                <div class="mt-4">
                                    <img src='../assets/images/frontend-pages/background/banner-bottom.png'
                                        alt="banner-img" class="rounded-base" />
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
                                    Introducing Modernize's Light & Dark Skins, <span
                                        class="font-semibold text-lightmuted dark:text-darklink">Exceptional
                                        Dashboards</span>, and Dynamic Pages - Stay Updated on What's New!
                                </p>
                            </div>
                        </div>
                        <div class="flex w-full lg:flex-nowrap flex-wrap gap-6">
                            <div class="lg:w-[28%] w-full">
                                <div
                                    class=" py-12 px-6 justify-center rounded-base bg-lightwarning dark:bg-darkwarning mb-6">
                                    <img src='../assets/images/svgs/icon-briefcase.svg' alt="image" class="mx-auto" />
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
                                    <img src="../assets/images/frontend-pages/background/app-widget.png" alt="image"
                                        class="mx-auto px-6" />
                                </div>
                            </div>
                            <div class="lg:w-5/12 w-full">
                                <div
                                    class=" py-12 px-6 justify-center rounded-base bg-lightprimary dark:bg-darkprimary">
                                    <img src='../assets/images/logos/favicon.png' alt="image" class="mx-auto"
                                        width='52' />
                                    <h1
                                        class="py-4 pb-7 font-bold text-link dark:text-white text-center md:text-[40px] text-[32px] leading-normal">
                                        New Demos</h1>
                                    <p
                                        class="text-lightmuted dark:text-darklink text-base font-normal text-center pb-6">
                                        Brand new demos to help you build the perfect dashboard: <span
                                            class="font-semibold">Dark</span> and <span
                                            class="font-semibold">Right-to-Left</span>.</p>
                                    <img src='../assets/images/frontend-pages/background/Scene.png'
                                        class="xl:mt-4 lg:mt-20 mt-4 lg:px-6 px-0" alt="image" />
                                </div>
                            </div>
                            <div class="lg:w-[28%] w-full">
                                <div
                                    class=" py-12 px-6 justify-center rounded-base bg-lightsuccess dark:bg-darksuccess mb-6">
                                    <img src='../assets/images/svgs/icon-speech-bubble.svg' alt="image"
                                        class="mx-auto" />
                                    <h1 class="py-4 text-center font-bold text-link dark:text-white text-lg">Code
                                        Improvements</h1>
                                    <p class="text-lightmuted dark:text-darklink text-base font-normal text-center">
                                        Benefit from continuous improvements and optimizations.</p>
                                </div>
                                <div class=" py-12 px-6 justify-center rounded-base bg-lighterror dark:bg-darkerror">
                                    <img src='../assets/images/svgs/icon-favorites.svg' alt="image" class="mx-auto" />
                                    <h1 class="py-4 text-center font-bold text-link dark:text-white text-lg">50+ UI
                                        Components</h1>
                                    <p class="text-lightmuted dark:text-darklink text-base font-normal text-center">A
                                        rich collection for seamless user experiences.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Demos Section End -->

                    <!-- Team Works Start -->
                    <div
                        class="w-full border-t border-border dark:border-darkborder mb-16 custom-shadow overflow-x-auto">
                        <div class="min-w-[900px]  container-md mx-auto w-full">
                            <nav class="relative z-0 flex rounded-none overflow-hidden" aria-label="Tabs" role="tablist"
                                aria-orientation="horizontal">
                                <button type="button"
                                    class="hs-tab-active:border-primary hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-primary min-w-0 flex-1 bg-white dark:bg-dark border-t-2 border-t-transparent py-7 px-4 text-gray-500 hover:text-gray-700 font-medium text-center overflow-hidden hover:bg-gray-50 text-lg focus:z-10 focus:outline-none focus:text-primary disabled:opacity-50  active"
                                    id="bar-with-underline-item-1" aria-selected="true"
                                    data-hs-tab="#bar-with-underline-1" aria-controls="bar-with-underline-1" role="tab">
                                    <div class="flex justify-center">
                                        <div class="flex gap-2 items-center">
                                            <i
                                                class="ti ti-user-circle shrink-0 text-2xl hs-tab-active:text-primary"></i>
                                            <h2 class="text-lg font-semibold hs-tab-active:text-primary">Team Scheduling
                                            </h2>
                                        </div>
                                    </div>
                                </button>
                                <button type="button"
                                    class="hs-tab-active:border-primary hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-primary min-w-0 flex-1 bg-white dark:bg-dark border-t-2 border-t-transparent py-7 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-primary disabled:opacity-50 "
                                    id="bar-with-underline-item-2" aria-selected="false"
                                    data-hs-tab="#bar-with-underline-2" aria-controls="bar-with-underline-2" role="tab">
                                    <div class="flex justify-center">
                                        <div class="flex gap-2 items-center">
                                            <i
                                                class="ti ti-credit-card-pay shrink-0 text-2xl hs-tab-active:text-primary"></i>
                                            <h2 class="text-lg font-semibold hs-tab-active:text-primary">Payments</h2>
                                        </div>
                                    </div>
                                </button>
                                <button type="button"
                                    class="hs-tab-active:border-primary hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-primary min-w-0 flex-1 bg-white dark:bg-dark border-t-2 border-t-transparent py-7 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-primary disabled:opacity-50 "
                                    id="bar-with-underline-item-3" aria-selected="false"
                                    data-hs-tab="#bar-with-underline-3" aria-controls="bar-with-underline-3" role="tab">
                                    <div class="flex justify-center">
                                        <div class="flex gap-2 items-center">
                                            <i
                                                class="ti ti-layout-sidebar-right shrink-0 text-2xl hs-tab-active:text-primary"></i>
                                            <h2 class="text-lg font-semibold hs-tab-active:text-primary">Embedding</h2>
                                        </div>
                                    </div>
                                </button>
                                <button type="button"
                                    class="hs-tab-active:border-primary hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-primary min-w-0 flex-1 bg-white dark:bg-dark border-t-2 border-t-transparent py-7 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-primary disabled:opacity-50 "
                                    id="bar-with-underline-item-3" aria-selected="false"
                                    data-hs-tab="#bar-with-underline-4" aria-controls="bar-with-underline-4" role="tab">
                                    <div class="flex justify-center">
                                        <div class="flex gap-2 items-center">
                                            <i
                                                class="ti ti-layout-sidebar-right shrink-0 text-2xl hs-tab-active:text-primary"></i>
                                            <h2 class="text-lg font-semibold hs-tab-active:text-primary">Workflows</h2>
                                        </div>
                                    </div>
                                </button>
                            </nav>
                        </div>
                    </div>
                    <div class="container-md px-4">
                        <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="lg:col-span-6 col-span-12">
                                    <img src='../assets/images/frontend-pages/background/feature-bg.jpg'
                                        alt="feature-img" />
                                </div>
                                <div class="lg:col-span-6 col-span-12 flex items-center">
                                    <div class="flex flex-col md:ps-10 ps-0 items-start w-full">
                                        <h1
                                            class="mb-6 md:text-40 text-32 leading-normal text-link dark:text-white font-bold">
                                            Defend your focus</h1>
                                        <div class="hs-accordion-group">
                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-one">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="false" aria-controls="hs-destroy-collapse-one">
                                                    Combine teammate schedules 1
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-one"
                                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-one">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border active bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder  dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-two">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="true" aria-controls="hs-destroy-collapse-two">
                                                    Factor in outside colleagues
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-two"
                                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-two">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-three">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="false" aria-controls="hs-destroy-collapse-three">
                                                    Round robin pooling
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-three"
                                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-three">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bar-with-underline-2" class="hidden" role="tabpanel"
                            aria-labelledby="bar-with-underline-item-2">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="lg:col-span-6 col-span-12">
                                    <img src='../assets/images/frontend-pages/background/feature-bg.jpg'
                                        alt="feature-img" />
                                </div>
                                <div class="lg:col-span-6 col-span-12 flex items-center">
                                    <div class="flex flex-col md:ps-10 ps-0 items-start w-full">
                                        <h1
                                            class="mb-6 md:text-40 text-32 leading-normal text-link dark:text-white font-bold">
                                            Tailwind Templates</h1>
                                        <div class="hs-accordion-group">
                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-one">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="false" aria-controls="hs-destroy-collapse-one">
                                                    Combine teammate schedules 1
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-one"
                                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-one">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border active bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder  dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-two">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="true" aria-controls="hs-destroy-collapse-two">
                                                    Factor in outside colleagues
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-two"
                                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-two">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-three">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="false" aria-controls="hs-destroy-collapse-three">
                                                    Round robin pooling
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-three"
                                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-three">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bar-with-underline-3" class="hidden" role="tabpanel"
                            aria-labelledby="bar-with-underline-item-3">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="lg:col-span-6 col-span-12">
                                    <img src='../assets/images/frontend-pages/background/feature-bg.jpg'
                                        alt="feature-img" />
                                </div>
                                <div class="lg:col-span-6 col-span-12 flex items-center">
                                    <div class="flex flex-col md:ps-10 ps-0 items-start w-full">
                                        <h1
                                            class="mb-6 md:text-40 text-32 leading-normal text-link dark:text-white font-bold">
                                            Modernize Templates</h1>
                                        <div class="hs-accordion-group">
                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-one">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="false" aria-controls="hs-destroy-collapse-one">
                                                    Combine teammate schedules 1
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-one"
                                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-one">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border active bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder  dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-two">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="true" aria-controls="hs-destroy-collapse-two">
                                                    Factor in outside colleagues
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-two"
                                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-two">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-three">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="false" aria-controls="hs-destroy-collapse-three">
                                                    Round robin pooling
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-three"
                                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-three">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bar-with-underline-4" class="hidden" role="tabpanel"
                            aria-labelledby="bar-with-underline-item-3">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="lg:col-span-6 col-span-12">
                                    <img src='../assets/images/frontend-pages/background/feature-bg.jpg'
                                        alt="feature-img" />
                                </div>
                                <div class="lg:col-span-6 col-span-12 flex items-center">
                                    <div class="flex flex-col md:ps-10 ps-0 items-start w-full">
                                        <h1
                                            class="mb-6 md:text-40 text-32 leading-normal text-link dark:text-white font-bold">
                                            Adminmart Templates</h1>
                                        <div class="hs-accordion-group">
                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-one">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="false" aria-controls="hs-destroy-collapse-one">
                                                    Combine teammate schedules 1
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-one"
                                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-one">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border active bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder  dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-two">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="true" aria-controls="hs-destroy-collapse-two">
                                                    Factor in outside colleagues
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-two"
                                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-two">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hs-accordion-to-destroy hs-accordion hs-accordion-active:border-border bg-white border border-transparent rounded-xl dark:hs-accordion-active:border-darkborder dark:bg-dark dark:border-transparent"
                                                id="hs-destroy-heading-three">
                                                <button
                                                    class="hs-accordion-toggle hs-accordion-active:text-primary inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start  py-4 px-5 text-dark dark:text-white text-lg dark:hs-accordion-active:text-primary"
                                                    aria-expanded="false" aria-controls="hs-destroy-collapse-three">
                                                    Round robin pooling
                                                    <svg class="hs-accordion-active:hidden block size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <div id="hs-destroy-collapse-three"
                                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-destroy-heading-three">
                                                    <div class="pb-4 px-5">
                                                        <p class="text-base">
                                                            Factor in availability for required attendees, and skip
                                                            checking for conflicts for optional attendees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team Works End -->

                    <!-- Leadership start -->
                    <div class="lg:pt-24 lg:pb-[66px] pb-[18px] container-md px-4 pt-12">
                        <div class="flex justify-between items-center flex-wrap md:gap-0 gap-2">
                            <div class="flex flex-col gap-4">
                                <h1 class="leading-tight text-link dark:text-white font-bold md:text-40 text-32 ">Our
                                    leadership</h1>
                                <p class="max-w-96 text-lightmuted dark:text-darklink text-base">
                                    Our robust analytics offer rich insights into the information buyers want, informing
                                    where teams
                                </p>
                            </div>
                            <div class="flex items-center gap-2 custom-nav">
                                <div
                                    class='h-12 w-12 custom-prev rounded-full cursor-pointer flex items-center justify-center bg-lightprimary hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white text-link dark:text-darklink dark:bg-lightprimary'>
                                    <i class="ti ti-arrow-left shrink-0 text-2xl"></i>
                                </div>
                                <div
                                    class='h-12 w-12 rounded-full custom-next cursor-pointer hover:bg-primary hover:text-white flex items-center justify-center bg-lightprimary text-link dark:text-darklink dark:bg-lightprimary dark:hover:bg-primary dark:hover:text-white'>
                                    <i class="ti ti-arrow-right shrink-0 text-2xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <div class="review-slider">
                                <div class="owl-carousel owl-theme">
                                    <div class="item my-3">
                                        <div class="img-wrapper">
                                            <Image src='../assets/images/frontend-pages/leaders/leader1.jpg'
                                                alt="leader-image" class="rounded-base" />
                                            <div class="px-6">
                                                <div
                                                    class="rounded-[10px] z-20 relative bg-white dark:bg-dark text-center custom-shadow2 -mt-10 py-4 px-3">
                                                    <h1 class="text-lg text-link dark:text-white font-semibold">Alex
                                                        Martinez</h1>
                                                    <div class="text-sm text-lightmuted dark:text-darklink">CEO &
                                                        Co-Founder</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item my-3">
                                        <div class="img-wrapper">
                                            <Image src='../assets/images/frontend-pages/leaders/leader2.jpg'
                                                alt="leader-image" class="rounded-base" />
                                            <div class="px-6">
                                                <div
                                                    class="rounded-[10px] z-20 relative bg-white dark:bg-dark text-center custom-shadow2 -mt-10 py-4 px-3">
                                                    <h1 class="text-lg text-link dark:text-white font-semibold">Jordan
                                                        Nguyen</h1>
                                                    <div class="text-sm text-lightmuted dark:text-darklink">CTO &
                                                        Co-Founder</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item my-3">
                                        <div class="img-wrapper">
                                            <Image src='../assets/images/frontend-pages/leaders/leader3.jpg'
                                                alt="leader-image" class="rounded-base" />
                                            <div class="px-6">
                                                <div
                                                    class="rounded-[10px] z-20 relative bg-white dark:bg-dark text-center custom-shadow2 -mt-10 py-4 px-3">
                                                    <h1 class="text-lg text-link dark:text-white font-semibold">Taylor
                                                        Roberts</h1>
                                                    <div class="text-sm text-lightmuted dark:text-darklink">Product
                                                        Manager</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item my-3">
                                        <div class="img-wrapper">
                                            <Image src='../assets/images/frontend-pages/leaders/leader4.jpg'
                                                alt="leader-image" class="rounded-base" />
                                            <div class="px-6">
                                                <div
                                                    class="rounded-[10px] z-20 relative bg-white dark:bg-dark text-center custom-shadow2 -mt-10 py-4 px-3">
                                                    <h1 class="text-lg text-link dark:text-white font-semibold">
                                                        Katherine lily</h1>
                                                    <div class="text-sm text-lightmuted dark:text-darklink">Lead
                                                        Developer</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Leadership end -->

                    <!-- Info strip start -->
                    <div class="w-full py-4 bg-primary">
                        <div class="flex items-center justify-center md:gap-4 gap-2 flex-wrap">
                            <div class="flex items-center">
                                <img src="../assets/images/profile/user-5.jpg" alt="user-image"
                                    class="opacity-40 relative -end-2.5 rounded-full !w-10" />
                                <img src="../assets/images/profile/user-2.jpg" alt="user-image"
                                    class="opacity-100 rounded-full !w-11 z-2" />
                            </div>
                            <p class="text-base text-white font-normal text-center">
                                Save valuable time and effort spent searching for a solution.
                            </p>
                            <a href="../main/frontend-contactpage.html"
                                class="text-base font-semibold text-white underline">Contact us now</a>
                        </div>
                    </div>
                    <!-- Info strip end -->

                    <!-- Powerful template start -->
                    <div class="container px-4 pb-0 lg:pt-24 pt-12">
                        <div class="wrapper lg:py-[72px] py-12 bg-lightprimary dark:bg-lightprimary rounded-xl">
                            <div class="grid grid-cols-12 mb-14">
                                <div class="lg:col-span-6 col-span-12">
                                    <h1
                                        class="md:ps-16 ps-8 sm:pe-0 pe-8 font-bold text-link dark:text-white leading-tight md:text-40 text-32">
                                        Discover Powerful Dozens of
                                        Purpose-Fit Templates</h1>
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="template-slider">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item my-3">
                                            <div class="px-3 pb-10 focus:outline-0">
                                                <img src='../assets/images/demos/demo-dark.jpg' alt="demos"
                                                    class="max-w-full w-full rounded-md custom-shadow" />
                                            </div>
                                        </div>
                                        <div class="item my-3">
                                            <div class="px-3 pb-10 focus:outline-0">
                                                <img src='../assets/images/demos/demo-horizontal.jpg' alt="demos"
                                                    class="max-w-full w-full rounded-md custom-shadow" />
                                            </div>
                                        </div>
                                        <div class="item my-3">
                                            <div class="px-3 pb-10 focus:outline-0">
                                                <img src='../assets/images/demos/demo-main.jpg' alt="demos"
                                                    class="max-w-full w-full rounded-md custom-shadow" />
                                            </div>
                                        </div>
                                        <div class="item my-3">
                                            <div class="px-3 pb-10 focus:outline-0">
                                                <img src='../assets/images/demos/demo-minisidebar.jpg' alt="demos"
                                                    class="max-w-full w-full rounded-md custom-shadow" />
                                            </div>
                                        </div>
                                        <div class="item my-3">
                                            <div class="px-3 pb-10 focus:outline-0">
                                                <img src='../assets/images/demos/demo-rtl.jpg' alt="demos"
                                                    class="max-w-full w-full rounded-md custom-shadow" />
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="container-md">
                                    <div class="grid grid-cols-12 gap-6 text-center">
                                        <div class="lg:col-span-4 col-span-12">
                                            <h4 class="text-lg text-link dark:text-white font-bold mb-4">High
                                                Customizability</h4>
                                            <p class="text-sm text-lightmuted dark:text-darklink leading-loose px-4">
                                                Tailor the dashboard to your exact needs. Customize layouts, color
                                                schemes, and widgets effortlessly for a personalized user experience.
                                            </p>
                                        </div>
                                        <div class="lg:col-span-4 col-span-12">
                                            <h4 class="text-lg text-link dark:text-white font-bold mb-4">Powerful Data
                                                Analytics</h4>
                                            <p class="text-sm text-lightmuted dark:text-darklink leading-loose px-4">
                                                Unlock the true potential of your data with our advanced analytics
                                                tools. Gain valuable insights and make data-driven decisions with ease.
                                            </p>
                                        </div>
                                        <div class="lg:col-span-4 col-span-12">
                                            <h4 class="text-lg text-link dark:text-white font-bold mb-4">Interactive
                                                Graphs & Charts</h4>
                                            <p class="text-sm text-lightmuted dark:text-darklink leading-loose px-4">
                                                Visualize complex data sets beautifully with our interactive graphs and
                                                charts. Quickly grasp trends and patterns for smarter analysis.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Powerful template end -->

                    <!-- Testimonial start -->
                    <div class="container-md lg:py-24 py-12 px-4">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="lg:col-span-6 col-span-12 flex items-center">
                                <div class="flex w-full">
                                    <div class="lg:w-9/12 w-full">
                                        <h4
                                            class="md:text-40 text-32 leading-tight text-link font-bold dark:text-white mb-4 pe-10">
                                            What our clients think <img src='../assets/images/logos/favicon.png'
                                                alt="logo" height={24} class="inline-block mx-2" /> about us?
                                        </h4>
                                        <p class="text-base text-lightmutes dark:text-darklink leading-relaxed">Our
                                            users' feedback is a testament to our commitment to quality and user
                                            satisfaction. Read what they have to say about their journey with us.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-6 col-span-12">
                                <div class="rounded-base border border-border dark:border-darkborder md:p-12 p-8">
                                    <h6 class="text-2xl font-semibold text-link dark:text-white mb-8">Features
                                        availability</h6>
                                    <div>
                                        <div class="testimonial-slider">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item my-3">
                                                    <div
                                                        class="img-wrapper pb-6 border-b border-border dark:border-darkborder">
                                                        <div class="flex items-center gap-4 mb-6">
                                                            <Image src='../assets/images/profile/user-1.jpg'
                                                                alt="leader-image" class="!h-14 !w-14 rounded-full" />
                                                            <h6 class="text-base font-bold text-link dark:text-white">
                                                                Alex Martinez</h6>
                                                        </div>
                                                        <p class="text-lg text-lightmuted dark:text-darklink">The
                                                            dashboard template from adminmart has helped me provide a
                                                            clean and sleek look to my dashboard and made it look
                                                            exactly the way I wanted it to, mainly without having.</p>
                                                    </div>
                                                </div>
                                                <div class="item my-3">
                                                    <div
                                                        class="img-wrapper pb-6 border-b border-border dark:border-darkborder">
                                                        <div class="flex items-center gap-4 mb-6">
                                                            <Image src='../assets/images/profile/user-2.jpg'
                                                                alt="leader-image" class="!h-14 !w-14 rounded-full" />
                                                            <h6 class="text-base font-bold text-link dark:text-white">
                                                                Minshan Cui</h6>
                                                        </div>
                                                        <p class="text-lg text-lightmuted dark:text-darklink">The
                                                            quality of design is excellent, customizability and
                                                            flexibility much better than the other products available in
                                                            the market.I strongly recommend the AdminMart to other.</p>
                                                    </div>
                                                </div>
                                                <div class="item my-3">
                                                    <div
                                                        class="img-wrapper pb-6 border-b border-border dark:border-darkborder">
                                                        <div class="flex items-center gap-4 mb-6">
                                                            <Image src='../assets/images/profile/user-3.jpg'
                                                                alt="leader-image" class="!h-14 !w-14 rounded-full" />
                                                            <h6 class="text-base font-bold text-link dark:text-white">
                                                                Eminson Mendoza</h6>
                                                        </div>
                                                        <p class="text-lg text-lightmuted dark:text-darklink">This
                                                            template is great, UI-rich and up-to-date. Although it is
                                                            pretty much complete, I suggest to improve a bit of
                                                            documentation. Thanks & Highly recomended!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2 mt-6">
                                            <div
                                                class='h-8 w-8 rounded-full cursor-pointer flex items-center custom-prev2 justify-center bg-lightprimary dark:hover:bg-primary hover:bg-primary hover:text-white dark:hover:text-white text-link dark:text-darklink dark:bg-dark $'>
                                                <i class="ti ti-chevron-left text-xl"></i>
                                            </div>
                                            <p class="text-base text-lightmuted dark:text-darklink"><span
                                                    id="current-slide">1</span>/<span>4</span></p>
                                            <div
                                                class='h-8 w-8 rounded-full cursor-pointer flex items-center custom-next2 justify-center bg-lightprimary dark:hover:bg-primary hover:bg-primary hover:text-white dark:hover:text-white text-link dark:text-darklink dark:bg-dark'>
                                                <i class="ti ti-chevron-right text-xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial end -->

                    <!-- Features Start -->
                    <div
                        class="container lg:py-24 py-12 bg-lightprimary dark:bg-lightprimary rounded-base overflow-hidden">
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
                                                <span class="font-bold">One Year</span> Technical Support</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Free Updates</p>
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
                                                <span class="font-bold">One Year</span> Technical Support</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Free Updates</p>
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
                                                <span class="font-bold">One Year</span> Technical Support</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Free Updates</p>
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
                                                <span class="font-bold">One Year</span> Technical Support</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm text-link dark:text-darklink font-medium tracking-wide">
                                                <span class="font-bold">One Year</span> Free Updates</p>
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
                                <img src='../assets/images/frontend-pages/payments/visa.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/master.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/american-exp.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/discover.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/paypal.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/maesro.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/jcb.svg' alt="payment" />
                                <img src='../assets/images/frontend-pages/payments/dinners-clb.svg' alt="payment" />
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
                                    <img src='../assets/images/logos/favicon.png' class="h-6" alt="logo" height="24" />
                                    <p class="text-base text-lightmuted dark:text-darklink">All rights reserved by
                                        Modernize.</p>
                                </div>
                                <p class="text-base text-lightmuted dark:text-darklink flex items-center gap-1">Produced
                                    by
                                    <Link class="text-primary" href="https://adminmart.com/">Adminmart</Link>
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

    <!--Offcanvas lp menu---->
    <div id="application-sidebar-lp"
        class="hs-overlay hs-overlay-open:translate-x-0 hidden -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-72  w-full z-[80] bg-white dark:bg-dark"
        tabindex="-1">
        <div class="py-6 px-5">
            <div class="brand-logo flex  items-center ">
                <a href="../main/index.html" class="text-nowrap logo-img">
                    <img src="../assets/images/logos/dark-logo.svg" class="dark:hidden block rtl:hidden !w-fit"
                        alt="Logo-Dark" />
                    <img src="../assets/images/logos/light-logo.svg"
                        class="dark:block hidden rtl:hidden rtl:dark:hidden !w-fit" alt="Logo-light" />

                    <img src="../assets/images/logos/dark-logo-rtl.svg"
                        class="dark:hidden hidden rtl:block rtl:dark:hidden !w-fit" alt="Logo-Dark" />
                    <img src="../assets/images/logos/light-logo-rtl.svg"
                        class="dark:hidden hidden rtl:hidden rtl:dark:block !w-fit" alt="Logo-light" />
                </a>
            </div>
        </div>
        <div style="max-height: calc(100vh - 100px);" data-simplebar>
            <ul class="flex flex-col gap-4 mt-4 px-5">
                <li class="py-2.5 px-4">
                    <a href="../main/frontend-aboutpage.html"
                        class="hover:text-primary text-link dark:text-darklink text-base">About Us</a>
                </li>
                <li class="py-2.5 px-4">
                    <a href="../main/frontend-blogpage.html"
                        class="hover:text-primary text-link dark:text-darklink text-base">Blog</a>
                </li>
                <li class="py-2.5 px-4">
                    <a href="../main/frontend-portfoliopage.html"
                        class='text-[15px] flex items-center text-link dark:text-darklink gap-2 hover:text-primary font-medium'>
                        Portfolio
                        <span
                            class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lightprimary dark:bg-darkprimary text-primary dark:text-primary">New</span>
                    </a>
                </li>
                <li class="py-2.5 px-4">
                    <a href="../main/index.html"
                        class='text-[15px] text-link dark:text-darklink hover:text-primary font-medium'>Dashboard</a>
                </li>
                <li class="py-2.5 px-4">
                    <a href="../main/frontend-pricingpage.html"
                        class='text-[15px] text-link dark:text-darklink hover:text-primary font-medium'>Pricing</a>
                </li>
                <li class="py-2.5 px-4">
                    <a href="../main/frontend-contactpage.html"
                        class='text-[15px] text-link dark:text-darklink hover:text-primary font-medium'>Contact</a>
                </li>
                <li class="py-3 mt-2">
                    <a href="../main/authentication-login.html" target="_blank"
                        class="btn bg-primary hover:bg-primaryemphasis text-white btn-md py-2.5 px-4 w-full block">Login</a>
                </li>
            </ul>
        </div>
    </div>
    <!--Offcanvas lp menu End---->
    <!-- Modal Start -->
    <div id="hs-vertically-centered-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-label">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-dark dark:border-darkborder dark:shadow-md">
                <div class="flex justify-end items-center py-3 px-4 border-b dark:border-darkborder">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-dark dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-vertically-centered-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <iframe class="!w-full h-96" src="https://www.youtube.com/embed/57QrNWhnbxg"
                        title="How to Get Started withTailwind Dashboard Template? | AdminMart&#39;s TailwindTemplate"
                        frameBorder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerPolicy="strict-origin-when-cross-origin" allowFullScreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <script src="../assets/js/vendor.min.js"></script>

    <script src="../assets/js/theme/app.init.js"></script>
    <script src="../assets/js/theme/app.min.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../assets/libs/preline/dist/preline.js"></script>
    <script src="../assets/libs/@preline/input-number/index.js"></script>
    <script src="../assets/libs/@preline/tooltip/index.js"></script>
    <script src="../assets/libs/@preline/stepper/index.js"></script>



    <script src="../assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../assets/libs/aos/dist/aos.js"></script>
    <script src="../assets/js/frontendpage/frontendpage.js"></script>
    <div class="hidden">
        <!------- Customizer button--------->
        <button type="button"
            class="btn overflow-hidden  sm:h-14 sm:w-14 h-10 w-10 rounded-full fixed sm:bottom-8 bottom-5 right-8 flex justify-center items-center rtl:left-8 rtl:right-auto z-10"
            data-hs-overlay="#hs-overlay-right">
            <i class="ti ti-settings sm:text-2xl text-lg text-white"></i>
        </button>

        <!------- Customizer Options--------->
        <div id="hs-overlay-right"
            class="customizer  rounded-none hs-overlay bg-white dark:bg-dark hs-overlay-open:translate-x-0  translate-x-full rtl:hs-overlay-open:translate-x-0  rtl:-translate-x-full  fixed top-0 right-0 rtl:left-0 rtl:right-auto transition-all duration-300 transform h-full max-w-xs  w-full z-[60] hidden "
            tabindex="-1">
            <div class="flex justify-between items-center  border-border dark:border-darkborder  border-b py-3 px-6 ">
                <h3 class="font-semibold text-lg text-dark dark:text-white">
                    Settings
                </h3>
                <button type="button"
                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white text-sm "
                    data-hs-overlay="#hs-overlay-right">
                    <span class="sr-only">Close modal</span>
                    <i class="ti ti-x text-xl text-dark dark:text-white"></i>
                </button>
            </div>

            <!-------Light/Dark Theme--------->
            <div class="px-6 py-6" data-simplebar="" style="height: calc(100vh - 80px)">
                <h6 class="font-semibold text-dark dark:text-white mb-2">Theme</h6>
                <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
                    <input type="radio" class=" btn-check" name="theme-layout" autocomplete="off" />
                    <label
                        class="btn btn-outline border border-border dark:border-darkborder text-primary h-full py-3 px-5 hs-dark-mode-active:text-darklink cursor-pointer"
                        for="light-layout" data-hs-theme-click-value="light"><i
                            class="icon ti ti-sun text-2xl me-2 "></i> Light</label>
                    <input type="radio" class="btn-check" name="theme-layout" autocomplete="off" />
                    <label
                        class="btn btn-outline border border-border dark:border-darkborder text-link  h-full py-3 px-5 cursor-pointer hs-dark-mode-active:text-primary"
                        for="dark-layout" data-hs-theme-click-value="dark"><i
                            class="icon ti ti-moon text-2xl me-2 "></i> Dark</label>
                </div>

                <!-------Theme Direction--------->
                <h6 class="font-semibold mb-2 text-dark dark:text-white">Theme Direction</h6>
                <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
                    <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
                    <label
                        class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                        for="ltr-layout"><i class="icon ti ti-text-direction-ltr text-2xl me-2"></i>LTR</label>
                    <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
                    <label
                        class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                        for="rtl-layout">
                        <i class="icon ti ti-text-direction-rtl text-2xl me-2"></i>RTL</label>
                </div>

                <!-------Theme Colors--------->
                <h6 class="font-semibold mb-2 text-dark dark:text-white">Theme Colors</h6>
                <div class="flex flex-row flex-wrap gap-3 customizer-box color-pallete mb-8" role="group">
                    <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme"
                        autocomplete="off" />
                    <label
                        class="hs-tooltip btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center hs-tooltip-toggle cursor-pointer"
                        onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-title="BLUE_THEME">
                        <div class="color-box rounded-full flex items-center justify-center skin-1">
                            <i class="ti ti-check  flex icon text-white fs-5"></i>
                        </div>
                        <span
                            class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-xs py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                            role="tooltip">
                            Blue_Theme
                        </span>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme"
                        autocomplete="off" />
                    <label
                        class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                        onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-title="AQUA_THEME">
                        <div class="color-box rounded-full flex items-center justify-center skin-2">
                            <i class="ti ti-check text-white flex icon fs-5"></i>
                        </div>
                        <span
                            class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-xs py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                            role="tooltip">
                            Aqua_Theme
                        </span>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme"
                        autocomplete="off" />
                    <label
                        class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                        onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-title="PURPLE_THEME">
                        <div class="color-box rounded-full flex items-center justify-center skin-3">
                            <i class="ti ti-check text-white flex icon fs-5"></i>
                        </div>
                        <span
                            class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-xs py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                            role="tooltip">
                            Purple_Theme
                        </span>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout"
                        autocomplete="off" />
                    <label
                        class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                        onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-title="GREEN_THEME">
                        <div class="color-box rounded-full flex items-center justify-center skin-4">
                            <i class="ti ti-check text-white flex icon fs-5"></i>
                        </div>
                        <span
                            class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-xs py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                            role="tooltip">
                            Green_Theme
                        </span>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout"
                        autocomplete="off" />
                    <label
                        class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                        onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-title="CYAN_THEME">
                        <div class="color-box rounded-full flex items-center justify-center skin-5">
                            <i class="ti ti-check text-white flex icon fs-5"></i>
                        </div>
                        <span
                            class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-xs py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                            role="tooltip">
                            Cyan_Theme
                        </span>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout"
                        autocomplete="off" />
                    <label
                        class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                        onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout"
                        data-bs-title="ORANGE_THEME">
                        <div class="color-box rounded-full flex items-center justify-center skin-6">
                            <i class="ti ti-check text-white flex icon fs-5"></i>
                        </div>
                        <span
                            class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-xs py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                            role="tooltip">
                            Orange_Theme
                        </span>
                    </label>
                </div>

                <!-- Layput Options  -->
                <h6 class="font-semibold mb-2 text-dark dark:text-white">Layout Type</h6>
                <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
                    <div>
                        <input type="radio" class="btn-check" name="page-layout" id="vertical-layout"
                            autocomplete="off" />
                        <label
                            class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                            for="vertical-layout">
                            <i class="icon ti ti-layout-sidebar-right text-2xl me-2"></i> Vertical</label>
                    </div>
                    <div>
                        <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout"
                            autocomplete="off" />
                        <label
                            class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                            for="horizontal-layout">
                            <i class=" icon ti ti-layout-navbar text-2xl me-2"></i> Horizontal</label>
                    </div>
                </div>

                <!-- Container Options  -->
                <h6 class="font-semibold mb-2 text-dark dark:text-white">Container Option</h6>
                <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
                    <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
                    <label
                        class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                        for="boxed-layout">
                        <i class="icon ti ti-layout-distribute-vertical text-2xl me-2"></i>
                        Boxed</label>

                    <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
                    <label
                        class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                        for="full-layout">
                        <i class="icon ti ti-layout-distribute-horizontal text-2xl me-2"></i> Full</label>
                </div>

                <!-- Sidebar Type Options  -->
                <h6 class="font-semibold mb-2 text-dark dark:text-white">Sidebar Type</h6>
                <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
                    <a href="javascript:void(0)" class="fullsidebar">
                        <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar"
                            autocomplete="off" />
                        <label
                            class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                            for="full-sidebar"><i class="icon ti ti-layout-sidebar-right text-2xl me-2"></i>
                            Full</label>
                    </a>
                    <div>
                        <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar"
                            autocomplete="off" />
                        <label
                            class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                            for="mini-sidebar">
                            <iconify-icon icon="solar:siderbar-outline" class="icon fs-7 me-2"></iconify-icon>Collapse
                        </label>
                    </div>
                </div>

                <!-- Border-sahdow Card Options  -->
                <h6 class="font-semibold mb-2 text-dark dark:text-white">Card With</h6>
                <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
                    <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off" />
                    <label
                        class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                        for="card-with-border"><i class="icon ti ti-border-outer text-2xl me-2"></i>Border</label>

                    <input type="radio" class="btn-check" name="card-layout" id="card-without-border"
                        autocomplete="off" />
                    <label
                        class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                        for="card-without-border">
                        <i class="icon ti ti-border-none text-2xl me-2"></i>Shadow</label>
                </div>

            </div>
        </div>

        <script>
        function handleColorTheme(e) {
            document.documentElement.setAttribute("data-color-theme", e);
        }
        </script>
    </div>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v833ccba57c9e4d2798f2e76cebdd09a11778172276447"
        integrity="sha512-57MDmcccJXYtNnH+ZiBwzC4jb2rvgVCEokYN+L/nLlmO8rfYT/gIpW2A569iJ/3b+0UEasghjuZH/ma3wIs/EQ=="
        data-cf-beacon='{"version":"2024.11.0","token":"3be9301eaa1743d584a13be558225a58","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
        crossorigin="anonymous"></script>
</body>

</html>

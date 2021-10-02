<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" />
    <style>
        #slider {
            /* height: 700px !important; */
            overflow: hidden !important;
        }

        #slider img {
            object-fit: cover !important;
            object-position: 50% 50% !important;
            width: 100% !important;
            /* height: 700px !important; */
        }
    </style>
</head>

<body class="bg-gray-50">
    <header class="text-gray-600 body-font shadow-md bg-white">
        <div class="container mx-auto flex flex-wrap flex-col px-2 md:flex-row items-center">
            <div class="flex flex-row justify-between w-full md:w-auto px-3 py-3 md:py-0 items-center mb-0">
                <a class="flex title-font font-medium items-center text-gray-900">
                    <img src="{{ asset('img/logo.png') }}" class="w-10 h-10" alt="">
                    <span class="ml-3 text-xl">Dijaya Computer</span>
                </a>
                <div class="md:hidden flex items-center">
                    @if (auth()->check())
                        <a href="#" class="bg-blue-100 text-blue-600 rounded-full h-8 w-8 flex items-center justify-center mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                        </a>
                        <a href="#" class="flex items-center">
                            <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y" class="rounded-full h-10 w-10">
                        </a>
                    @else
                    <a href="login"
                        class="hidden md:inline-flex items-center bg-blue-500 text-white border-0 py-3 px-6 focus:outline-none hover:bg-blue-600 rounded text-base mt-4 md:mt-0">Login
                    </a>
                    @endif
                </div>
            </div>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a href="#" class="mx-2 px-2 md:px-3 transition-all duration-500 py-3 md:py-5 text-center font-medium hover:font-bold border-b-4 border-transparent hover:border-blue-500 hover:text-gray-900
                    {{ Request::route()->getName() == 'home' ? ' border-blue-500 text-gray-900' :
                    'border-transparent' }} ">Beranda</a>
                <a href="#" class="mx-2 px-2 md:px-3 transition-all duration-500 py-3 md:py-5 text-center font-medium hover:font-bold border-b-4 border-transparent hover:border-blue-500 hover:text-gray-900
                    {{ (Request::route()->getName() == 'products.index' ? ' border-blue-500 text-gray-900' :
                    'border-transparent') }} ">Produk</a>
                <a href="#" class="mx-2 px-2 md:px-3 transition-all duration-500 py-3 md:py-5 text-center font-medium hover:font-bold border-b-4 border-transparent hover:border-blue-500 hover:text-gray-900
                    {{ (Request::route()->getName() == 'service' ? ' border-blue-500 text-gray-900' :
                    'border-transparent') }} ">Servis</a>
                <a href="#" class="mx-2 px-2 md:px-3 transition-all duration-500 py-3 md:py-5 text-center font-medium hover:font-bold border-b-4 border-transparent hover:border-blue-500 hover:text-gray-900
                    {{ (Request::route()->getName() == 'contact' ? ' border-blue-500 text-gray-900' :
                    'border-transparent') }} ">Kontak</a>
            </nav>
            <div class="hidden md:inline-flex items-center">
                @if (auth()->check())
                    <a href="#" class="bg-blue-100 text-blue-600 rounded-full h-8 w-8 flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                    </a>
                    <a href="#" class="flex items-center">
                        <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y" class="rounded-full h-10 w-10">
                        <span class="ml-2">{{ auth()->user()->name }}</span>
                    </a>
                @else
                <a href="login"
                    class="hidden md:inline-flex items-center bg-blue-500 text-white border-0 py-3 px-6 focus:outline-none hover:bg-blue-600 rounded text-base mt-4 md:mt-0">Login
                </a>
                @endif
            </div>
        </div>
    </header>
    @yield('content')
    <section class="text-gray-600 body-font bg-white">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">Testimonials</h1>
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/3 lg:mb-0 mb-6 p-4">
                    <div class="h-full text-center">
                        <img alt="testimonial"
                            class="w-20 h-20 mb-8 object-cover object-center rounded-full inline-block border-2 border-gray-200 bg-gray-100"
                            src="https://dummyimage.com/302x302">
                        <p class="leading-relaxed">Produknya ori... mantabb. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum praesentium error suscipit ipsa dolorem sapiente modi pariatur illo, quisquam eligendi necessitatibus magni quae in placeat vel harum nisi corrupti ad?</p>
                        <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-6 mb-4"></span>
                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">JOKO</h2>
                        <p class="text-gray-500">Mahasiswa</p>
                    </div>
                </div>
                <div class="lg:w-1/3 lg:mb-0 mb-6 p-4">
                    <div class="h-full text-center">
                        <img alt="testimonial"
                            class="w-20 h-20 mb-8 object-cover object-center rounded-full inline-block border-2 border-gray-200 bg-gray-100"
                            src="https://dummyimage.com/300x300">
                        <p class="leading-relaxed">Barangnya awet, rekomended banget beli disini. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur nostrum sequi optio harum nesciunt quos tempore, illum porro, esse a molestias magnam aspernatur quam facere laudantium officia quo dicta eveniet?</p>
                        <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-6 mb-4"></span>
                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">Ibu Susi</h2>
                        <p class="text-gray-500">Pegawai Swasta</p>
                    </div>
                </div>
                <div class="lg:w-1/3 lg:mb-0 p-4">
                    <div class="h-full text-center">
                        <img alt="testimonial"
                            class="w-20 h-20 mb-8 object-cover object-center rounded-full inline-block border-2 border-gray-200 bg-gray-100"
                            src="https://dummyimage.com/305x305">
                        <p class="leading-relaxed">Servisnya bagus banget. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima dolor doloremque ex eum. Laudantium possimus culpa impedit nobis quos dolore suscipit quas, modi ex aspernatur aut, in quo veniam alias.</p>
                        <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-6 mb-4"></span>
                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">Puan</h2>
                        <p class="text-gray-500">PNS</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <img src="{{ asset('img/logo.png') }}" class="w-10 h-10" alt="">
                <span class="ml-3 text-xl">Dijaya Computer</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                {{ date('Y') }} Dijaya Computer
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    @yield('script')
</body>

</html>

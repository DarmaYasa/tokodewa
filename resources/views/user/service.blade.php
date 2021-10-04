@extends('layouts.user-master')

@section('title')
Service
@endsection

@section('content')
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-blue-500 tracking-widest font-medium title-font mb-1 uppercase">Service</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Melayani berbagai macam service
                komputer
            </h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Possimus incidunt, illo aperiam sequi explicabo eum? Laborum veritatis debitis adipisci eligendi
                commodi delectus facere blanditiis, excepturi repellendus, enim quae aperiam alias.</p>
        </div>
        <div class="flex flex-wrap">
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Install Ulang</h2>
                <p class="leading-relaxed text-base mb-4">Melayani install ulang OS dan berbagai software</p>
            </div>
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Service Hardware</h2>
                <p class="leading-relaxed text-base mb-4">Melayani berbagai service hardware</p>
            </div>
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Maintanance</h2>
                <p class="leading-relaxed text-base mb-4">Melayanni maintanance pc atau laptop</p>
            </div>
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Maintanance</h2>
                <p class="leading-relaxed text-base mb-4">Melayanni maintanance pc atau laptop</p>
            </div>
        </div>
        <a href="https://wa.me/621345678"
            class="flex items-center justify-center mx-auto mt-16 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg w-48 text-center"><svg
                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg> Chat Admin</a>
    </div>
</section>
@endsection

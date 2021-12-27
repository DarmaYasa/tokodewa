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
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Toko ini melayani berbagai macam pelayan seperti Jaringan,
        Service Hardware (Motherboard), Service Handphone, Aksesoris, Perakitan PC, Maintenance, etc.</p>
        </div>
        <table class="w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider">
                Melayani
              </th>
              <th scope="col" class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider">
                Keterangan
              </th>
              <th scope="col" class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider">
                Biaya
              </th>
              <th scope="col" class="px-6 py-3 text-left text-s font-medium text-gray-500 uppercase tracking-wider">
                Estimasi
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                Service Hardware
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Service hardware disini dimana kami melayani seperti service, Motherboard, pergantian LCD, Baterai, Keyboard, etc.
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                Sesuai Kerusakan
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Sesuai Kerusakan
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                Install Ulang OS
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Menerima install ulang Windows, Mac Os, Linux.
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                Mulai dari Rp.75.000
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                1 - 3 Hari
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                Install Ulang Aplikasi
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Menerima install ulang aplikasi,Windows, Mac Os, Linux (Office, Adobe, Etc)
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                Mulai dari Rp.25.000
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                1 - 3 Hari
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                Install Game
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Menerima install game terbaru maupun game lama pada PC dan Laptop
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                Mulai dari Rp.50.000
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                1 - 3 Hari
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                Maintenance
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Menerima maintenance Hardware dan Software seperti Cleaning, Delete Virus, Cache, Etc.
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                Mulai dari Rp.50.000
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                1 - 2 Hari
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                Instalasi Jaringan
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Menerima pemasangan jaringan (Access Point, Hub, Etc)
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                Mulai dari Rp.75.000
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                1 - 7 Hari
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                Service Smartphone
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Menerima service HP, Hardware Maupun Software, Unlock, Sinyal Hilang, IMEI ke Blokir, Etc.
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                Mulai dari Rp.100.000
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Sesuai Kerusakan
              </td>
            </tr>
            <!-- More people... -->
          </tbody>
        </table>
        <div class="flex flex-wrap">
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Alamat</h2>
                <p class="leading-relaxed text-base mb-4">Jalan Akasia XVI A No 40 Gang Melati Denpasar Timur</p>
            </div>
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">No Telp/Whatsapp</h2>
                <p class="leading-relaxed text-base mb-4">082247248902</p>
            </div>
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Sosial Media</h2>
                <p class="leading-relaxed text-base mb-4">Facebook : Dijaya Computer</p>
                <p class="leading-relaxed text-base mb-4">Instagram : Dijaya Computer</p>
            </div>
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Email</h2>
                <p class="leading-relaxed text-base mb-4">dwlaksana12@gmail.com</p>
                <p class="leading-relaxed text-base mb-4">dwlaksana11@gmail.com</p>
            </div>
        </div>
        <a href="https://wa.me/6282247248902"
            class="flex items-center justify-center mx-auto mt-16 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg w-48 text-center"><svg
                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg> Chat Admin</a>
    </div>
</section>
@endsection

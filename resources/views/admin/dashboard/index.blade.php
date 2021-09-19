@extends('layouts.admin-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12 mb-4 h-100">
        <div class="hero hero-bg-image hero-bg-parallax text-white" style="height: 50vh; background-image: url('https://images.unsplash.com/photo-1547394765-185e1e68f34e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80');">
          <div class="hero-inner">
            <h2>Selamat Datang Di Dashboard Toko Komputer</h2>
            <p class="lead">Toko ini menjual alat-alat komputer</p>
          </div>
        </div>
        <table style="font-size: 13pt">
          <tr>
            <td>Tugas UAS</td>
            <td>:</td>
            <td>I Dewa Kadek Laksana Digita</td>
          </tr>
          <tr>
            <td>Mata Kuliah</td>
            <td>:</td>
            <td>Pemrograman Berbasis Objek</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection

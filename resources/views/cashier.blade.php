<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-blue-600 min-h-screen">
<section class="flex min-h-screen">
  <!-- SIDEBAR -->
  <aside class="w-64 bg-white shadow-lg p-5 flex flex-col">
    <div class="flex items-center gap-3 mb-10">
      <i class="fa-solid fa-staff-snake text-3xl text-blue-600"></i>
      <h2 class="text-2xl font-bold">Apotek</h2>
    </div>
    @php
        $currentRoute = request()->route()->getName();
    @endphp
    <ul class="space-y-3 flex-1">
      <li class="flex items-center gap-3 p-2 rounded hover:bg-blue-100 cursor-pointer {{ $currentRoute === 'dashboard' ? 'bg-blue-600 text-white' : '' }}">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 w-full">
          <i class="fa-solid fa-house"></i> Dashboard
        </a>
      </li>
      <li class="flex items-center gap-3 p-2 rounded hover:bg-blue-100 cursor-pointer {{ $currentRoute === 'cashier' ? 'bg-blue-600 text-white' : '' }}">
        <a href="{{ route('cashier') }}" class="flex items-center gap-3 w-full">
          <i class="fa-solid fa-cash-register"></i> Cashier
        </a>
      </li>
      <li class="flex items-center gap-3 p-2 rounded hover:bg-blue-100 cursor-pointer {{ $currentRoute === 'log-transaksi' ? 'bg-blue-600 text-white' : '' }}">
        <a href="{{ route('log-transaksi') }}" class="flex items-center gap-3 w-full">
          <i class="fa-solid fa-receipt"></i> Log Transaksi
        </a>
      </li>
    </ul>
  </aside>

  <!-- MAIN -->
  <main class="flex-1 p-6 bg-blue-600 flex flex-col gap-6">
    <!-- TOPBAR -->
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-bold text-white">Cashier</h1>
      <div class="flex items-center gap-2 text-white">
        <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
        <span>Admin</span>
      </div>
    </div>

    <!-- SEARCH + CATEGORY -->
    <div class="flex gap-3 flex-wrap items-center">
      <input id="search" type="text" placeholder="Search in here" class="px-3 py-2 rounded-lg w-64 text-sm outline-none bg-amber-50">
      <button class="kategori-btn px-3 py-1 bg-blue-600 text-white rounded font-semibold" data-kategori="all">All</button>
      <button class="kategori-btn px-3 py-1 bg-white text-blue-600 rounded font-semibold" data-kategori="demam">Demam</button>
      <button class="kategori-btn px-3 py-1 bg-white text-blue-600 rounded font-semibold" data-kategori="batuk">Batuk</button>
      <button class="kategori-btn px-3 py-1 bg-white text-blue-600 rounded font-semibold" data-kategori="vitamin">Vitamin</button>
      <button class="kategori-btn px-3 py-1 bg-white text-blue-600 rounded font-semibold" data-kategori="pencernaan">Pencernaan</button>
    </div>

    <!-- ITEM + ORDER PANEL -->
    <div class="flex gap-6 mt-4 flex-1">
      <!-- ITEM GRID -->
      <div class="grid grid-cols-3 gap-6 flex-1" id="item-grid">
        <!-- Item contoh dengan data-kategori -->
        <div class="obat bg-white p-3 rounded-xl shadow flex flex-col cursor-pointer hover:scale-105 transition"
             data-nama="Paracetamol"
             data-harga="7000"
             data-kategori="demam">
          <img src="img/obh-contoh.jpg" class="w-full h-32 object-cover rounded-lg mb-2">
          <p class="font-semibold text-gray-800">Paracetamol</p>
          <p class="text-sm text-gray-600">Rp 7.000</p>
          <button class="add-cart mt-auto bg-blue-600 text-white py-1 rounded hover:bg-blue-700 transition">Add to cart</button>
        </div>
        <!-- Item dummy tambahan untuk demonstrasi -->
        <div class="obat bg-white p-3 rounded-xl shadow flex flex-col cursor-pointer hover:scale-105 transition"
             data-nama="Vitamin C"
             data-harga="15000"
             data-kategori="vitamin">
          <img src="https://via.placeholder.com/150" class="w-full h-32 object-cover rounded-lg mb-2">
          <p class="font-semibold text-gray-800">Vitamin C</p>
          <p class="text-sm text-gray-600">Rp 15.000</p>
          <button class="add-cart mt-auto bg-blue-600 text-white py-1 rounded hover:bg-blue-700 transition">Add to cart</button>
        </div>
        <div class="obat bg-white p-3 rounded-xl shadow flex flex-col cursor-pointer hover:scale-105 transition"
             data-nama="Obat Batuk"
             data-harga="10000"
             data-kategori="batuk">
          <img src="https://via.placeholder.com/150" class="w-full h-32 object-cover rounded-lg mb-2">
          <p class="font-semibold text-gray-800">Obat Batuk</p>
          <p class="text-sm text-gray-600">Rp 10.000</p>
          <button class="add-cart mt-auto bg-blue-600 text-white py-1 rounded hover:bg-blue-700 transition">Add to cart</button>
        </div>
        <div class="obat bg-white p-3 rounded-xl shadow flex flex-col cursor-pointer hover:scale-105 transition"
             data-nama="Antasida"
             data-harga="8000"
             data-kategori="pencernaan">
          <img src="https://via.placeholder.com/150" class="w-full h-32 object-cover rounded-lg mb-2">
          <p class="font-semibold text-gray-800">Antasida</p>
          <p class="text-sm text-gray-600">Rp 8.000</p>
          <button class="add-cart mt-auto bg-blue-600 text-white py-1 rounded hover:bg-blue-700 transition">Add to cart</button>
        </div>
      </div>

      <!-- ORDER PANEL -->
      <div id="order-panel" class="w-80 bg-blue-100 rounded-xl p-4 flex flex-col opacity-0 translate-x-10 pointer-events-none transition-all duration-300 shadow-lg">
        <h3 class="font-bold text-xl mb-4">My Order</h3>
        <div id="order-list" class="space-y-3 flex-1"></div>
        <!-- Total Harga -->
        <div class="mt-4">
          <p class="font-semibold text-gray-800">Total: Rp <span id="total-harga">0</span></p>
        </div>
        <!-- Payment Section -->
        <div id="payment-section" class="mt-4 hidden">
          <div class="mb-2 font-semibold text-gray-800">Payment</div>
          <div class="flex gap-2 mb-2">
            <button class="payment-btn flex-1 py-1 rounded bg-white hover:bg-gray-200">Cash</button>
            <button class="payment-btn flex-1 py-1 rounded bg-white hover:bg-gray-200">Debit</button>
            <button class="payment-btn flex-1 py-1 rounded bg-white hover:bg-gray-200">E-wallet</button>
          </div>
          <button id="checkout-btn" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Checkout
          </button>
        </div>
      </div>
    </div>
  </main>
</section>
<script src="{{ asset('js/cashier.js') }}"></script>
</body>
</html>
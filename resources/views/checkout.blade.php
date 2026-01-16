<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
    <ul class="space-y-3 flex-1">
      <li class="flex items-center gap-3 p-2 rounded hover:bg-blue-100 cursor-pointer">
        <i class="fa-solid fa-house"></i> Dashboard
      </li>
      <li class="flex items-center gap-3 p-2 rounded hover:bg-blue-100 cursor-pointer">
        <i class="fa-solid fa-cash-register"></i> Cashier
      </li>
      <li class="flex items-center gap-3 p-2 rounded hover:bg-blue-100 cursor-pointer">
        <i class="fa-solid fa-receipt"></i> Log Transaksi
      </li>
    </ul>
  </aside>

  <!-- MAIN -->
  <main class="flex-1 p-6 bg-blue-600 flex flex-col gap-6">
    <!-- TOPBAR -->
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-bold text-white">Checkout</h1>
      <div class="flex items-center gap-2 text-white">
        <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
        <span>Admin</span>
      </div>
    </div>

    <!-- CHECKOUT CONTENT -->
    <div class="flex gap-6 flex-1">
      <!-- ORDER SUMMARY -->
      <div class="flex-1 bg-white rounded-xl p-6 shadow-lg">
        <h3 class="text-xl font-bold mb-4">Order Summary</h3>
        <div id="order-summary" class="space-y-3"></div>
        <div class="mt-4 border-t pt-4">
          <p class="text-lg font-semibold">Total: Rp <span id="total-amount">0</span></p>
        </div>
      </div>

      <!-- PAYMENT FORM -->
      <div class="w-80 bg-white rounded-xl p-6 shadow-lg">
        <h3 class="text-xl font-bold mb-4">Payment Method</h3>
        <form id="payment-form">
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Select Payment</label>
            <div class="space-y-2">
              <label class="flex items-center">
                <input type="radio" name="payment" value="cash" class="mr-2" checked>
                Cash
              </label>
              <label class="flex items-center">
                <input type="radio" name="payment" value="debit" class="mr-2">
                Debit Card
              </label>
              <label class="flex items-center">
                <input type="radio" name="payment" value="ewallet" class="mr-2">
                E-wallet
              </label>
            </div>
          </div>
          <div id="cash-amount" class="mb-4">
            <label class="block text-sm font-medium mb-2">Cash Amount (Rp)</label>
            <input type="number" id="cash-input" class="w-full px-3 py-2 border rounded" placeholder="Enter cash amount">
            <p class="text-sm text-gray-600 mt-1">Change: Rp <span id="change-amount">0</span></p>
          </div>
          <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Confirm Payment
          </button>
        </form>
      </div>
    </div>
  </main>
</section>
<script src="{{ asset('js/checkout.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Log Transaksi</title>
</head>
<body class="bg-blue-600 min-h-screen">
    <section class="flex min-h-screen">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-lg p-5 flex flex-col">
            <div class="flex items-center gap-3 mb-10">
                <i class="fa-solid fa-staff-snake text-3xl text-blue-600"></i>
                <h2 class="text-2xl font-bold">Apotek Sehat</h2>
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
                <h1 class="text-2xl font-bold text-white">Log Transaksi</h1>
                <div class="flex items-center gap-2 text-white">
                    <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                    <span>Admin</span>
                </div>
            </div>

            <!-- TRANSAKSI FIELD -->
            <div class="flex-1">
                <div class="bg-white rounded-xl p-6 shadow-lg flex flex-col gap-4">
                    <!-- SEARCH BAR -->
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold text-gray-800">History Penjualan Bulan Ini</h3>
                        <input id="search-transaksi" type="text" placeholder="Search by Medicine Name"
                               class="px-3 py-2 rounded-lg w-64 text-sm outline-none border border-gray-300">
                    </div>

                    <!-- TABLE -->
                    <div class="overflow-y-auto max-h-96">
                        <table class="w-full text-center border-collapse">
                            <thead class="bg-blue-100">
                                <tr>
                                    <th class="p-3 font-semibold text-gray-800">Date</th>
                                    <th class="p-3 font-semibold text-gray-800">Medicine Name</th>
                                    <th class="p-3 font-semibold text-gray-800">Quantity Sold</th>
                                    <th class="p-3 font-semibold text-gray-800">Price</th>
                                </tr>
                            </thead>
                            <tbody id="transaksi-tbody">
                                <!-- Data dummy untuk bulan ini (Desember 2023, asumsikan bulan sekarang) -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">1 Dec 2023</td>
                                    <td class="p-3">Paracetamol</td>
                                    <td class="p-3">1</td>
                                    <td class="p-3">Rp.50.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">2 Dec 2023</td>
                                    <td class="p-3">Amoxilin</td>
                                    <td class="p-3">1</td>
                                    <td class="p-3">Rp.10.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">3 Dec 2023</td>
                                    <td class="p-3">Promag Cair</td>
                                    <td class="p-3">2</td>
                                    <td class="p-3">Rp.10.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">5 Dec 2023</td>
                                    <td class="p-3">Ampicilin</td>
                                    <td class="p-3">2</td>
                                    <td class="p-3">Rp.20.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">7 Dec 2023</td>
                                    <td class="p-3">Ampicilin</td>
                                    <td class="p-3">2</td>
                                    <td class="p-3">Rp.20.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">10 Dec 2023</td>
                                    <td class="p-3">Paramex</td>
                                    <td class="p-3">2</td>
                                    <td class="p-3">Rp.4.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">12 Dec 2023</td>
                                    <td class="p-3">Bodrex</td>
                                    <td class="p-3">2</td>
                                    <td class="p-3">Rp.4.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">15 Dec 2023</td>
                                    <td class="p-3">Bodrex</td>
                                    <td class="p-3">2</td>
                                    <td class="p-3">Rp.4.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">18 Dec 2023</td>
                                    <td class="p-3">Antasida</td>
                                    <td class="p-3">1</td>
                                    <td class="p-3">Rp.10.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">20 Dec 2023</td>
                                    <td class="p-3">Ranitidine</td>
                                    <td class="p-3">1</td>
                                    <td class="p-3">Rp.4.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">22 Dec 2023</td>
                                    <td class="p-3">Become Z</td>
                                    <td class="p-3">1</td>
                                    <td class="p-3">Rp.20.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">25 Dec 2023</td>
                                    <td class="p-3">Paracetamol</td>
                                    <td class="p-3">3</td>
                                    <td class="p-3">Rp.150.000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">28 Dec 2023</td>
                                    <td class="p-3">Amoxilin</td>
                                    <td class="p-3">2</td>
                                    <td class="p-3">Rp.20.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src="{{ asset('js/log.js') }}"></script>
</body>
</html>
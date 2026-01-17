<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Dashboard</title>
</head>

<body class="bg-blue-600 min-h-screen">
    <section class="flex min-h-screen">
        <aside class="w-64 bg-white shadow-lg p-5 flex flex-col">
            <div class="flex items-center gap-3 mb-10">
                <i class="fa-solid fa-staff-snake text-3xl text-blue-600"></i>
                <h2 class="text-2xl font-bold">Apotek Sehat</h2>
            </div>
            @php $currentRoute = request()->route()->getName(); @endphp
            <ul class="space-y-3 flex-1">
                <li
                    class="p-2 rounded hover:bg-blue-100 {{ $currentRoute === 'dashboard' ? 'bg-blue-600 text-white' : '' }}">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 w-full">
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                </li>

                <li
                    class="p-2 rounded hover:bg-blue-100 {{ $currentRoute === 'cashier' ? 'bg-blue-600 text-white' : '' }}">
                    <a href="{{ route('cashier') }}" class="flex items-center gap-3 w-full">
                        <i class="fa-solid fa-cash-register"></i> Cashier
                    </a>
                </li>

                <li
                    class="p-2 rounded hover:bg-blue-100 {{ $currentRoute === 'log-transaksi' ? 'bg-blue-600 text-white' : '' }}">
                    <a href="{{ route('log-transaksi') }}" class="flex items-center gap-3 w-full">
                        <i class="fa-solid fa-receipt"></i> Log Transaksi
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 p-6 bg-blue-600 flex flex-col gap-6">
            <div class="flex justify-between items-center text-white">
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                    <span>Admin</span>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-lg flex flex-col gap-4 flex-1">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-gray-800">Recent Transactions</h3>
                    <input type="text" placeholder="Search by Medicine Name"
                        class="px-3 py-2 rounded-lg w-64 text-sm border">
                </div>

                <div class="overflow-y-auto max-h-96">
                    <table class="w-full text-center border-collapse">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="p-3 font-semibold text-gray-800">Date</th>
                                <th class="p-3 font-semibold text-gray-800">Medicine Name</th>
                                <th class="p-3 font-semibold text-gray-800">Category</th>
                                <th class="p-3 font-semibold text-gray-800">Stock</th>
                                <th class="p-3 font-semibold text-gray-800">Price</th>
                            </tr>
                        </thead>
                        <tbody id="transaksi-tbody">
                            @foreach ($history as $item)
                                <tr>
                                    <td>{{ $item->transaksi->created_at->format('d M Y') }}</td>
                                    <td class="font-bold">{{ $item->obat->nama }}</td>
                                    <td>{{ $item->obat->kategori->nama_kategori ?? 'Umum' }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td class="text-blue-600">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>
</body>

</html>

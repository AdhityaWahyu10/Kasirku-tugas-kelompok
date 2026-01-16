<aside class="w-64 bg-white shadow-lg p-5 flex flex-col">
    <div class="flex items-center gap-3 mb-10">
        <i class="fa-solid fa-staff-snake text-3xl text-blue-600"></i>
        <h2 class="text-2xl font-bold">Apotek Sehat</h2>
    </div>
    <ul class="space-y-3 flex-1">
        <li>
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 p-2 rounded cursor-pointer {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-blue-100' }}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('cashier') }}" 
               class="flex items-center gap-3 p-2 rounded cursor-pointer {{ request()->routeIs('cashier') ? 'bg-blue-600 text-white' : 'hover:bg-blue-100' }}">
                <i class="fa-solid fa-cash-register"></i> Cashier
            </a>
        </li>
        <li>
            <a href="{{ route('log-transaksi') }}" 
               class="flex items-center gap-3 p-2 rounded cursor-pointer {{ request()->routeIs('log-transaksi') ? 'bg-blue-600 text-white' : 'hover:bg-blue-100' }}">
                <i class="fa-solid fa-receipt"></i> Log Transaksi
            </a>
        </li>
    </ul>
</aside>

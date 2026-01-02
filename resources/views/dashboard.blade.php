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
<body>
    <section>
        <div class="container p-3 flex gap-30">
            {{-- Navbar Menu Start --}}
            <div class="menu-navbar w-64 h-screen rounded-lg ">
                <div class="logo-container flex items-center gap-4 mb-6">
                    <i class="fa-solid fa-staff-snake text-4xl"></i>
                    <h3 class="text-4xl font-bold">Apotek Sehat</h3>
                </div>
                <div class="menu-dashboard">
                    <div class="dashboard-menu flex items-center gap-2 mb-4 cursor-pointer">
                        <i class="fa-solid fa-house text-xl"></i>
                        <h3 class="text-xl font-bold">Dashboard</h3>
                    </div>
                    <div class="cashier-menu flex items-center gap-3 mb-4 cursor-pointer">
                        <i class="fa-solid fa-bell text-xl"></i>
                        <h3 class="text-xl font-bold">Cashier</h3>
                    </div>
                    <div class="log-transaksi-menu flex items-center gap-2 cursor-pointer">
                        <i class="fa-solid fa-cart-shopping text-xl"></i>
                        <h3 class="text-xl font-bold">Log Transaksi</h3>
                    </div>
                </div>
            </div>
            {{-- Navbar Menu End --}}

            {{-- Transaksi-Field Start --}}
            <div class="transaksi-field w-full">
                <div class="menu-dashbord-transaksi flex justify-between items-center  p-4 rounded-lg">
                    <div class="nama-dashboard">
                        <h3 class="text-3xl font-bold">Dashboard</h3>
                    </div>
                    <div class="profile-menu flex items-center">
                        <div class="picture bg-gray-500 w-15 h-15 rounded-4xl"></div>
                        <h3 class="text-2xl font-bold">Admin</h3>
                    </div>
                </div>
                <div class="kolom-transaksi">
                    <div class="container-transaksi bg-blue-800 w-260 h-screen p-6">
                        <div class="search-kolom flex justify-between p-4 bg-fuchsia-50 rounded-2xl">
                            <div class="recent">
                                <h3 class="text-2xl text-black">Recent Transactions</h3>
                            </div>
                            <input type="text" class="w-100 h-15 bg-gray-500 rounded-2xl" placeholder="Search in Here">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Transaksi-Field End --}}
        </div>
    </section>
</body>
</html>
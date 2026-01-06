<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Cashier</title>
</head>
<body>
    <section>
        <div class="container p-3 flex gap-30">
            {{-- Navbar Start --}}
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
            {{-- Navbar End --}}
            {{-- Item Menu Start --}}
            <div class="container-item w-full">
                {{-- Menu Atas Start --}}
                <div class="menu-dashbord-transaksi flex justify-between items-center  p-4 rounded-lg">
                    <div class="nama-dashboard">
                        <h3 class="text-3xl font-bold">Cashier</h3>
                    </div>
                    <div class="profile-menu flex items-center">
                        <div class="picture bg-gray-500 w-15 h-15 rounded-4xl"></div>
                        <h3 class="text-2xl font-bold">Admin</h3>
                    </div>
                </div>
                {{-- Menu Atas End --}}
                {{-- Item Start --}}
                <div class="container-item bg-blue-800 w-full h-screen p-6">
                    <div class="searching-kolom flex justify-between">
                        <h4 class="text-white text-xl font-extralight">Find Your Medicine</h4>
                        <input type="text" class="w-80 h-10 rounded-xl bg-white p-2" placeholder="Search in here">
                    </div>
                    <div class="item-kategori">
                        <ul class="flex justify-between py-8">
                            <li class="text-black px-6 py-2 bg-amber-50 rounded-xl font-bold cursor-pointer">Demam</li>
                            <li class="text-black px-8 py-2 bg-amber-50 rounded-xl font-bold cursor-pointer">Batuk</li>
                            <li class="text-black px-8 py-2 bg-amber-50 rounded-xl font-bold cursor-pointer">Vitamin</li>
                            <li class="text-black px-4 py-2 bg-amber-50 rounded-xl font-bold cursor-pointer">Pencernaan</li>
                        </ul>
                    </div>
                    <div class="item-shop">
                        <div class="card-container grid-cols-4 grid gap-8">
                            <div class="card w-40 h-42 bg-gray-600 items-center cursor-pointer">
                                <div class="img">
                                    <img src="img/obh-contoh.jpg" alt="" class="w-40 h-30">
                                </div>
                                <p class="text-white text-center">Obh Combi</p>
                                <p class="text-white text-center">Rp.20.000</p>
                            </div>
                            <div class="card w-40 h-42 bg-gray-600 items-center cursor-pointer">
                                <div class="img">
                                    <img src="img/obh-contoh.jpg" alt="" class="w-40 h-30">
                                </div>
                                <p class="text-white text-center">Obh Combi</p>
                                <p class="text-white text-center">Rp.20.000</p>
                            </div>
                            <div class="card w-40 h-42 bg-gray-600 items-center cursor-pointer">
                                <div class="img">
                                    <img src="img/obh-contoh.jpg" alt="" class="w-40 h-30">
                                </div>
                                <p class="text-white text-center">Obh Combi</p>
                                <p class="text-white text-center">Rp.20.000</p>
                            </div>
                            <div class="card w-40 h-42 bg-gray-600 items-center cursor-pointer">
                                <div class="img">
                                    <img src="img/obh-contoh.jpg" alt="" class="w-40 h-30">
                                </div>
                                <p class="text-white text-center">Obh Combi</p>
                                <p class="text-white text-center">Rp.20.000</p>
                            </div>
                            <div class="card w-40 h-42 bg-gray-600 items-center cursor-pointer">
                                <div class="img">
                                    <img src="img/obh-contoh.jpg" alt="" class="w-40 h-30">
                                </div>
                                <p class="text-white text-center">Obh Combi</p>
                                <p class="text-white text-center">Rp.20.000</p>
                            </div>
                            <div class="card w-40 h-42 bg-gray-600 items-center cursor-pointer">
                                <div class="img">
                                    <img src="img/obh-contoh.jpg" alt="" class="w-40 h-30">
                                </div>
                                <p class="text-white text-center">Obh Combi</p>
                                <p class="text-white text-center">Rp.20.000</p>
                            </div>
                            <div class="card w-40 h-42 bg-gray-600 items-center cursor-pointer">
                                <div class="img">
                                    <img src="img/obh-contoh.jpg" alt="" class="w-40 h-30">
                                </div>
                                <p class="text-white text-center">Obh Combi</p>
                                <p class="text-white text-center">Rp.20.000</p>
                            </div>
                            <div class="card w-40 h-42 bg-gray-600 items-center cursor-pointer">
                                <div class="img">
                                    <img src="img/obh-contoh.jpg" alt="" class="w-40 h-30">
                                </div>
                                <p class="text-white text-center">Obh Combi</p>
                                <p class="text-white text-center">Rp.20.000</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Item End --}}
            </div>
            {{-- Item Menu End --}}
        </div>
    </section>
</body>
</html>
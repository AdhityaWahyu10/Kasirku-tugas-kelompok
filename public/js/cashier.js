document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.obat');
    const orderPanel = document.getElementById('order-panel');
    const orderList = document.getElementById('order-list');
    const totalHargaEl = document.getElementById('total-harga');
    const paymentSection = document.getElementById('payment-section'); // Diubah dari checkoutSection untuk match HTML
    const kategoriButtons = document.querySelectorAll('.kategori-btn');
    const searchInput = document.getElementById('search');
    const checkoutBtn = document.getElementById('checkout-btn'); // Tambahkan referensi ke tombol checkout

    let cart = {};
    let currentKategori = 'all'; // Track kategori aktif

    const formatRupiah = (num) => new Intl.NumberFormat('id-ID').format(num);

    // ADD TO CART (via button click)
    cards.forEach(card => {
        const addBtn = card.querySelector('.add-cart');
        addBtn.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent card click
            const nama = card.dataset.nama;
            const harga = parseInt(card.dataset.harga);

            cart[nama] ? cart[nama].qty++ : cart[nama] = { nama, harga, qty: 1 };
            renderCart();
        });
    });

    // RENDER CART
    function renderCart() {
        orderList.innerHTML = '';
        let total = 0;

        const items = Object.values(cart);
        if (items.length === 0) {
            hidePanel();
            return;
        }

        showPanel();

        items.forEach(item => {
            total += item.harga * item.qty;
            orderList.innerHTML += `
                <div class="bg-white rounded-lg p-3 flex justify-between items-center shadow">
                    <div>
                        <p class="font-semibold">${item.nama}</p>
                        <p class="text-sm text-gray-600">Rp ${formatRupiah(item.harga)}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button data-nama="${item.nama}" data-act="minus" class="w-7 h-7 bg-red-500 text-white rounded">−</button>
                        <span>${item.qty}</span>
                        <button data-nama="${item.nama}" data-act="plus" class="w-7 h-7 bg-green-500 text-white rounded">+</button>
                    </div>
                </div>
            `;
        });

        totalHargaEl.innerText = formatRupiah(total);
        paymentSection.classList.remove('hidden'); // Show payment section
    }

    // Handle quantity changes in cart
    orderList.addEventListener('click', e => {
        const btn = e.target;
        if (!btn.dataset.act) return;

        const nama = btn.dataset.nama;
        if (btn.dataset.act === 'plus') {
            cart[nama].qty++;
        } else {
            cart[nama].qty--;
            if (cart[nama].qty <= 0) delete cart[nama];
        }
        renderCart();
    });

    // PANEL VISIBILITY
    function showPanel() {
        orderPanel.classList.remove('opacity-0', 'translate-x-10', 'pointer-events-none');
    }

    function hidePanel() {
        orderPanel.classList.add('opacity-0', 'translate-x-10', 'pointer-events-none');
        paymentSection.classList.add('hidden');
    }

    // FILTER CATEGORY
    kategoriButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            kategoriButtons.forEach(b => b.classList.remove('bg-blue-600', 'text-white'));
            btn.classList.add('bg-blue-600', 'text-white');

            currentKategori = btn.dataset.kategori;
            applyFilters();
        });
    });

    // SEARCH
    searchInput.addEventListener('input', () => {
        applyFilters();
    });

    // APPLY FILTERS (kombinasi kategori dan search)
    function applyFilters() {
        const keyword = searchInput.value.toLowerCase();

        cards.forEach(card => {
            const nama = card.dataset.nama.toLowerCase();
            const kategori = card.dataset.kategori || 'all'; // Default jika tidak ada
            const matchesKategori = currentKategori === 'all' || kategori === currentKategori;
            const matchesSearch = nama.includes(keyword);

            card.classList.toggle('hidden', !(matchesKategori && matchesSearch));
        });
    }

    // TAMBAHKAN EVENT LISTENER UNTUK CHECKOUT BUTTON
    checkoutBtn.addEventListener('click', () => {
        // Simpan cart ke localStorage sebelum redirect
        localStorage.setItem('cart', JSON.stringify(cart));
        // Redirect ke halaman checkout
        window.location.href = '/checkout'; // Ganti dengan {{ route('checkout') }} jika menggunakan Laravel route
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const orderSummary = document.getElementById('order-summary');
    const totalAmountEl = document.getElementById('total-amount');
    const paymentForm = document.getElementById('payment-form');
    const cashAmountDiv = document.getElementById('cash-amount');
    const cashInput = document.getElementById('cash-input');
    const changeAmountEl = document.getElementById('change-amount');

    let cart = {};
    let total = 0;

    const formatRupiah = (num) => new Intl.NumberFormat('id-ID').format(num);

    // Load cart from localStorage
    function loadCart() {
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            cart = JSON.parse(savedCart);
            renderOrderSummary();
        } else {
            alert('No items in cart. Redirecting to Cashier.');
            window.location.href = '/cashier'; // Ganti dengan route Cashier
        }
    }

    // Render order summary
    function renderOrderSummary() {
        orderSummary.innerHTML = '';
        total = 0;

        Object.values(cart).forEach(item => {
            total += item.harga * item.qty;
            orderSummary.innerHTML += `
                <div class="flex justify-between items-center border-b pb-2">
                    <div>
                        <p class="font-semibold">${item.nama}</p>
                        <p class="text-sm text-gray-600">Qty: ${item.qty} x Rp ${formatRupiah(item.harga)}</p>
                    </div>
                    <p class="font-semibold">Rp ${formatRupiah(item.harga * item.qty)}</p>
                </div>
            `;
        });

        totalAmountEl.textContent = formatRupiah(total);
    }

    // Handle payment method change
    document.querySelectorAll('input[name="payment"]').forEach(radio => {
        radio.addEventListener('change', () => {
            cashAmountDiv.style.display = radio.value === 'cash' ? 'block' : 'none';
        });
    });

    // Handle cash input for change calculation
    cashInput.addEventListener('input', () => {
        const cash = parseInt(cashInput.value) || 0;
        const change = cash - total;
        changeAmountEl.textContent = formatRupiah(Math.max(change, 0));
    });

    // Handle form submit
    paymentForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const paymentMethod = document.querySelector('input[name="payment"]:checked').value;

        if (paymentMethod === 'cash') {
            const cash = parseInt(cashInput.value) || 0;
            if (cash < total) {
                alert('Insufficient cash amount!');
                return;
            }
        }

        // Simulate payment success
        alert(`Payment successful via ${paymentMethod}! Total: Rp ${formatRupiah(total)}`);
        
        // Clear cart and redirect
        localStorage.removeItem('cart');
        window.location.href = '/dashboard'; // Ganti dengan route Dashboard
    });

    // Initialize
    loadCart();
});
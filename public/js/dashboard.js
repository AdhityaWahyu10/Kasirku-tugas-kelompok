document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-transaksi');
    const tbody = document.getElementById('transaksi-tbody');

    // Fungsi untuk filter transaksi berdasarkan Medicine Name
    function filterTransactions() {
        const keyword = searchInput.value.toLowerCase().trim();
        const rows = tbody.querySelectorAll('tr');

        rows.forEach(row => {
            const medicineName = row.cells[1].textContent.toLowerCase(); // Kolom kedua: Medicine Name
            const matches = medicineName.includes(keyword);
            row.style.display = matches ? '' : 'none';
        });
    }

    // Event listener untuk input search
    searchInput.addEventListener('input', filterTransactions);
});
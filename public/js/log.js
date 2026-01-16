// log-transaksi.js
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-transaksi');
    const tbody = document.getElementById('transaksi-tbody');
    const rows = tbody.getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();
        for (let i = 0; i < rows.length; i++) {
            const medicineName = rows[i].getElementsByTagName('td')[1]; // Kolom Medicine Name
            if (medicineName) {
                const textValue = medicineName.textContent || medicineName.innerText;
                if (textValue.toLowerCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    });
});
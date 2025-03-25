// modal absen
function showModal(tanggal) {
    // Isi modal dengan data dinamis
    document.getElementById("modal-tanggal").innerHTML =
        "Anda mengklik tanggal: " + tanggal;
    var dayModal = new bootstrap.Modal(document.getElementById("dayModal"));
    dayModal.show();
}

// detail absen
    document.addEventListener('DOMContentLoaded', function() {
        var detailAbsenModal = document.getElementById('detailAbsenModal');
        detailAbsenModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var guruName = button.getAttribute('data-guru-name');
            var tanggal = button.getAttribute('data-tanggal');
            var jamMasuk = button.getAttribute('data-jam-masuk');
            var jamKeluar = button.getAttribute('data-jam-keluar');
            var status = button.getAttribute('data-status');

            document.getElementById('detailGuruName').textContent = guruName;
            document.getElementById('detailTanggal').textContent = tanggal;
            document.getElementById('detailJamMasuk').textContent = jamMasuk;
            document.getElementById('detailJamKeluar').textContent = jamKeluar;
            document.getElementById('detailStatus').textContent = status;
        });
    });

  // Fungsi untuk menampilkan dropdown bulan jika opsi "Per Bulan" dipilih
function showMonthComboBox(select) {
    const id = select.id.split('_').pop();
    const monthCombo = document.getElementById('month_combo_' + id);
    monthCombo.style.display = select.value === 'bulan' ? 'block' : 'none';
}

// Fungsi untuk menampilkan tabel rekap absen
function generateRekapTable(id) {
    const rekapType = document.getElementById('rekap_per_' + id).value;
    const selectedMonthElement = document.getElementById('bulan_' + id);
    const selectedMonth = selectedMonthElement ? selectedMonthElement.value : '';

    const semesterTable = document.getElementById('rekap_semester_table_' + id);
    const bulanTable = document.getElementById('rekap_bulan_table_' + id);

    // Sembunyikan tabel di awal
    semesterTable.style.display = 'none';
    bulanTable.style.display = 'none';

    // Tampilkan tabel sesuai pilihan pengguna
    if (rekapType === 'semester') {
        semesterTable.style.display = 'block';
    } else if (rekapType === 'bulan') {
        if (selectedMonth) {
            bulanTable.style.display = 'block';
        } else {
            alert('Pilih bulan terlebih dahulu.');
        }
    } else {
        alert('Pilih tipe rekap yang valid.');
    }
}


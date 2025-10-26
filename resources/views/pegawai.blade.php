<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Data Pegawai</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    /* ====== BACKGROUND GELAP + RIPPLE ====== */
    body {
      font-family: 'SF Pro Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: #0a0a0a;
      color: white;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    /* ====== LIQUID GLASS BACKGROUND ====== */
    body::before {
      content: '';
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: 
        radial-gradient(circle at 20% 30%, rgba(0, 122, 255, 0.1) 0%, transparent 40%),
        radial-gradient(circle at 80% 70%, rgba(255, 45, 85, 0.1) 0%, transparent 40%),
        radial-gradient(circle at 50% 10%, rgba(52, 199, 89, 0.1) 0%, transparent 40%);
      pointer-events: none;
      z-index: -1;
    }

    /* ====== NAVBAR KIRI ====== */
    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      width: 80px;
      height: 100vh;
      background: rgba(15, 15, 15, 0.8);
      backdrop-filter: blur(20px);
      border-right: 1px solid rgba(255, 255, 255, 0.1);
      z-index: 100;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 2rem 0;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .sidebar a.active {
  background: rgba(79, 195, 247, 0.3);
  color: #4fc3f7;
  opacity: 1;
  font-weight: 600;
  border-radius: 16px;
  box-shadow: 0 0 15px rgba(79, 195, 247, 0.3);
  transform: translateY(-2px);
  backdrop-filter: blur(4px);
  border: 1px solid rgba(79, 195, 247, 0.4);
}

.sidebar a.active i {
  color: #4fc3f7;
}

    .sidebar:hover {
      width: 200px;
    }

    .logo {
      font-size: 1.5rem;
      margin-bottom: 2rem;
      color: #4fc3f7;
      transition: all 0.3s ease;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
      width: 100%;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 1rem 1.5rem;
      color: white;
      text-decoration: none;
      margin: 0.5rem 0;
      border-radius: 16px;
      transition: all 0.3s ease;
      opacity: 0.8;
      gap: 1rem;
    }

    

    .sidebar a:hover {
      background: rgba(79, 195, 247, 0.2);
      opacity: 1;
      transform: translateY(-2px);
    }

    .sidebar a i {
      font-size: 1.2rem;
      min-width: 24px;
      text-align: center;
    }

    .sidebar span {
      opacity: 0;
      white-space: nowrap;
      transition: opacity 0.3s ease;
    }

    .sidebar:hover span {
      opacity: 1;
    }

    /* ====== HEADER DI TENGAH ====== */
    .header {
      text-align: center;
      padding: 2rem 0;
      margin-left: 80px;
      transition: margin-left 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .header h1 {
      color: #4fc3f7;
      font-weight: 700;
      font-size: 2.5rem;
      letter-spacing: -0.5px;
      background: linear-gradient(45deg, #4fc3f7, #66bb6a);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      position: relative;
    }

    .header h1::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background: linear-gradient(90deg, transparent, #4fc3f7, transparent);
      border-radius: 2px;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { opacity: 0.5; }
      50% { opacity: 1; }
      100% { opacity: 0.5; }
    }

    /* ====== MAIN CONTENT ====== */
    .main-content {
      margin-left: 80px;
      padding: 0 20px 40px;
      min-height: calc(100vh - 150px);
      transition: margin-left 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
    }

    /* ====== TABLE LIQUID GLASS ====== */
    .table-container {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      border: 1px solid rgba(79, 195, 247, 0.2);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin: 2rem 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 0;
    }

    th, td {
      padding: 16px 20px;
      text-align: left;
    }

    th {
      background: rgba(79, 195, 247, 0.15);
      backdrop-filter: blur(4px);
      color: #4fc3f7;
      font-weight: 600;
      border-bottom: 1px solid rgba(79, 195, 247, 0.3);
    }

    tr:nth-child(even) {
      background: rgba(255, 255, 255, 0.03);
    }

    tr:hover {
      background: rgba(79, 195, 247, 0.15);
      transform: translateY(-2px);
      transition: all 0.3s ease;
    }

    /* ====== BUTTON ====== */
    .btn-tambah {
      background: linear-gradient(135deg, #4fc3f7, #66bb6a);
      color: #0a2540;
      padding: 12px 24px;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(79, 195, 247, 0.3);
      border: none;
      font-size: 1rem;
      position: relative;
      overflow: hidden;
    }

    .btn-tambah::before {
      content: '';
      position: absolute;
      top: 0; left: -100%;
      width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.8s;
    }

    .btn-tambah:hover::before {
      left: 100%;
    }

    .btn-tambah:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(79, 195, 247, 0.4);
    }

/* ====== MODAL LIQUID GLASS ====== */
.modal {
  display: none; /* Sembunyiin awal */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(10px);
  z-index: 1000;
  justify-content: center;
  align-items: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.modal.show {
  display: flex; /* ✅ WAJIB! */
  opacity: 1;
}

    .modal-content {
      background: rgba(15, 15, 15, 0.9);
      backdrop-filter: blur(20px);
      width: 90%;
      max-width: 600px;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(79, 195, 247, 0.2);
      transform: translateY(-20px);
      animation: fadeInUp 0.4s ease forwards;
    }

    @keyframes fadeInUp {
      to { transform: translateY(0); }
    }

    .modal-header {
      background: rgba(79, 195, 247, 0.15);
      backdrop-filter: blur(4px);
      color: #4fc3f7;
      padding: 1.5rem 1.5rem;
      font-weight: 600;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid rgba(79, 195, 247, 0.3);
    }

    .close {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .close:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: rotate(90deg);
    }

    .modal-body {
      padding: 1.5rem;
    }

    .modal-body label {
      display: block;
      margin: 1rem 0 0.5rem;
      font-weight: 500;
      color: #ccc;
    }

    .modal-body input {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid rgba(79, 195, 247, 0.3);
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      font-size: 1rem;
      backdrop-filter: blur(4px);
    }

    .modal-body input:focus {
      outline: none;
      border-color: #4fc3f7;
      box-shadow: 0 0 10px rgba(79, 195, 247, 0.5);
    }

    .modal-footer {
      padding: 1rem 1.5rem;
      text-align: right;
      border-top: 1px solid rgba(79, 195, 247, 0.2);
      background: rgba(0, 0, 0, 0.2);
    }

    .btn-simpan, .btn-batal, .btn-hapus {
      padding: 10px 20px;
      border: none;
      border-radius: 12px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 0.95rem;
    }

    .btn-simpan {
      background: linear-gradient(135deg, #4fc3f7, #66bb6a);
      color: #0a2540;
    }

    .btn-simpan:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(79, 195, 247, 0.4);
    }

    .btn-batal {
      background: rgba(108, 117, 125, 0.3);
      color: white;
      margin-left: 8px;
    }

    .btn-batal:hover {
      background: rgba(108, 117, 125, 0.5);
    }

    .btn-hapus {
      background: linear-gradient(135deg, #dc3545, #c82333);
      color: white;
    }

    .btn-hapus:hover {
      transform: translateY(-2px);
    }

    /* ====== TOMBOL EDIT & HAPUS ====== */
.edit, .hapus {
  padding: 6px 12px;
  border-radius: 8px;
  font-size: 0.9rem;
  font-weight: 500;
  text-decoration: none;
  color: white;
  display: inline-block;
  transition: all 0.3s ease;
  backdrop-filter: blur(4px);
  border: 1px solid transparent;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
  position: relative;
  overflow: hidden;
}

.edit {
  background: rgba(40, 167, 69, 0.3);
  border-color: rgba(40, 167, 69, 0.4);
}

.edit:hover {
  background: rgba(40, 167, 69, 0.6);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
}

.hapus {
  background: rgba(220, 53, 69, 0.3);
  border-color: rgba(220, 53, 69, 0.4);
}

.hapus:hover {
  background: rgba(220, 53, 69, 0.6);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
}

.edit::before, .hapus::before {
  content: '';
  position: absolute;
  top: 0; left: -100%;
  width: 100%; height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.8s;
}

.edit:hover::before, .hapus:hover::before {
  left: 100%;
}

td .edit {
  margin-right: 8px;
}

    /* ====== FOOTER ====== */
    .footer {
      text-align: center;
      margin-top: 3rem;
      color: #999;
      font-size: 0.9rem;
      padding: 2rem 0;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      margin-left: 80px;
      transition: margin-left 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 768px) {
      .sidebar {
        width: 60px !important;
      }
      .sidebar:hover {
        width: 60px !important;
      }
      .main-content, .footer, .header {
        margin-left: 60px !important;
      }
      .header h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

  <!-- NAVBAR KIRI -->
  <div class="sidebar">
    <div class="logo">🏢</div>
    <ul>
      <li><a href="/"><i class="fas fa-home"></i> <span>Home</span></a></li>
      <li><a href="#" class="active"><i class="fas fa-users"></i> <span>Pegawai</span></a></li>
      <li><a href="/golongan"><i class="fas fa-star"></i> <span>Golongan</span></a></li>
      <li><a href="/gaji"><i class="fas fa-money-bill-wave"></i> <span>Gaji</span></a></li>
      <li><a href="/lembur"><i class="fas fa-clock"></i> <span>Lembur</span></a></li>
    </ul>
  </div>

  <!-- HEADER DI TENGAH -->
  <div class="header">
    <h1>Data Pegawai</h1>
  </div>

  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container">
      
      <!-- Header + Button -->
      <div class="table-header">
        <div></div> <!-- biar tetap sejajar -->
        <a href="#" class="btn-tambah" onclick="openAddModal()">
          <i class="fas fa-plus"></i> Tambah Pegawai
        </a>
      </div>

      <!-- Modal tambah pegaqai -->
      <div id="addModal" class="modal">
        <div class="modal-content">
          <div class="modal-header">
            <span>Tambah Pegawai Baru</span>
            <button class="close" onclick="closeAddModal()">&times;</button>
          </div>
          <form method="POST" action="/pegawai/storetambah">
            @csrf
            <div class="modal-body">
              <label>Nama:</label>
              <input type="text" name="nama" placeholder="Masukkan nama" required>
              <label>Jabatan:</label>
              <input type="text" name="jabatan" placeholder="Contoh: Guru, Staf" required>
              <label>Umur:</label>
              <input type="number" name="umur" placeholder="Contoh: 30" required>
              <label>Alamat:</label>
              <input type="text" name="alamat" placeholder="Contoh: Jl. Mawar No. 5" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-batal" onclick="closeAddModal()">Batal</button>
              <button type="submit" class="btn-simpan">Simpan Data</button>
            </div>
          </form>
        </div>
      </div>

      <!-- TABLE -->
      <div class="table-container">
        <table>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Opsi</th>
          </tr>
          @foreach ($pegawai as $p)
            <tr>
              <td>{{ $p->id }}</td>
              <td>{{ $p->pegawai_nama }}</td>
              <td>{{ $p->pegawai_jabatan }}</td>
              <td>{{ $p->pegawai_umur }}</td>
              <td>{{ $p->pegawai_alamat }}</td>
              <td>
                <a href="#" class="edit" onclick="openEditModal(
                  {{ $p->id }},
                  '{{ $p->pegawai_nama }}',
                  '{{ $p->pegawai_jabatan }}',
                  {{ $p->pegawai_umur }},
                  '{{ $p->pegawai_alamat }}'
                )">Edit</a>
                <a href="#" class="hapus" onclick="openHapusModal(
                  {{ $p->id }}, 
                  '/pegawai/delete/{{ $p->id }}'
                )">Hapus</a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    </div>
  </div>

  <!-- FOOTER -->
  <div class="footer">
    &copy; 2025 Sistem Pegawai SMK Poncol Jakarta
  </div>

  <!-- MODAL EDIT -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span>Edit Pegawai</span>
        <button class="close" onclick="closeEditModal()">&times;</button>
      </div>
      <form id="editForm" method="POST">
        @csrf
        @method('POST')
        <div class="modal-body">
          <input type="hidden" name="id" id="edit-id">
          <label>Nama:</label>
          <input type="text" name="nama" id="edit-nama" required>
          <label>Jabatan:</label>
          <input type="text" name="jabatan" id="edit-jabatan" required>
          <label>Umur:</label>
          <input type="number" name="umur" id="edit-umur" required>
          <label>Alamat:</label>
          <input type="text" name="alamat" id="edit-alamat" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-batal" onclick="closeEditModal()">Batal</button>
          <button type="submit" class="btn-simpan">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL KONFIRMASI HAPUS -->
  <div id="hapusModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span>Konfirmasi Hapus</span>
        <button class="close" onclick="closeHapusModal()">&times;</button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus data pegawai ini? Tindakan ini tidak bisa dibatalkan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-batal" onclick="closeHapusModal()">Batal</button>
        <form id="hapusForm" method="POST" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-hapus">Hapus</button>
        </form>
      </div>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <script>
    function openAddModal() {
      document.getElementById('addModal').classList.add('show');
    }
    function closeAddModal() {
      document.getElementById('addModal').classList.remove('show');
    }
    function openEditModal(id, nama, jabatan, umur, alamat) {
      document.getElementById('edit-id').value = id;
      document.getElementById('edit-nama').value = nama;
      document.getElementById('edit-jabatan').value = jabatan;
      document.getElementById('edit-umur').value = umur;
      document.getElementById('edit-alamat').value = alamat;
      document.getElementById('editForm').action = `/pegawai/update/${id}`;
      document.getElementById('editModal').classList.add('show');
    }
    function closeEditModal() {
      document.getElementById('editModal').classList.remove('show');
    }
    function openHapusModal(id, action) {
      document.getElementById('hapusForm').action = action;
      document.getElementById('hapusModal').classList.add('show');
    }
    function closeHapusModal() {
      document.getElementById('hapusModal').classList.remove('show');
    }
    window.onclick = function(e) {
      const add = document.getElementById('addModal');
      const edit = document.getElementById('editModal');
      const hapus = document.getElementById('hapusModal');
      if (e.target === add) closeAddModal();
      if (e.target === edit) closeEditModal();
      if (e.target === hapus) closeHapusModal();
    }
  </script>

</body>
</html>
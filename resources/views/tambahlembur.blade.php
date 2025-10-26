<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Tambah Lembur</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: linear-gradient(135deg, #0a2540 0%, #1a3b5d 100%);
      color: white;
      margin: 0;
      padding: 40px 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background: rgba(255, 255, 255, 0.1);
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }
    h2 {
      text-align: center;
      color: #ff9800;
      margin-bottom: 1.5rem;
    }
    label {
      display: block;
      margin: 1rem 0 0.5rem;
      font-weight: 500;
    }
    select, input[type="text"], input[type="number"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 6px;
      background: rgba(255, 255, 255, 0.2);
      color: white;
      font-size: 1rem;
    }
    button {
      margin-top: 2rem;
      padding: 12px 24px;
      background: #ff9800;
      color: #1a1a1a;
      border: none;
      border-radius: 50px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    button:hover {
      background: #f57c00;
      transform: translateY(-2px);
    }
    .back-link {
      display: inline-block;
      margin-top: 1rem;
      color: #ff9800;
      text-decoration: none;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Tambah Lembur</h2>
    <form method="POST" action="/lembur/storetambah">
      @csrf
      <label>Pegawai:
        <select name="pegawai_id" required>
          <option value="">Pilih Pegawai</option>
          @foreach ($pegawai as $p)
            <option value="{{ $p->id }}">{{ $p->pegawai_nama }}</option>
          @endforeach
        </select>
      </label>
      <label>Bulan Lembur:
        <input type="text" name="bulan_lembur" placeholder="Contoh: April 2025" required>
      </label>
      <label>Jumlah Jam Lembur:
        <input type="number" name="jumlah_lembur" placeholder="Contoh: 5" required>
      </label>
      <label>Total Uang Lembur (Rp):
        <input type="number" name="total_uang_lembur" placeholder="Contoh: 200000" required>
      </label>
      <button type="submit">Simpan Lembur</button>
    </form>
    <a href="/lembur" class="back-link">← Kembali ke Daftar Lembur</a>
  </div>
</body>
</html>
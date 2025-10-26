<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Tambah Gaji</title>
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
      color: #4fc3f7;
      margin-bottom: 1.5rem;
    }
    label {
      display: block;
      margin: 1rem 0 0.5rem;
      font-weight: 500;
    }
    select, input[type="number"], input[type="date"] {
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
      background: #4fc3f7;
      color: #0a2540;
      border: none;
      border-radius: 50px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    button:hover {
      background: #03a9f4;
      transform: translateY(-2px);
    }
    .back-link {
      display: inline-block;
      margin-top: 1rem;
      color: #4fc3f7;
      text-decoration: none;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Tambah Gaji</h2>
    <form method="POST" action="/gaji/storetambah">
      @csrf
      <label>Pegawai:
        <select name="pegawai_id" required>
          <option value="">Pilih Pegawai</option>
          @foreach ($pegawai as $p)
            <option value="{{ $p->id }}">{{ $p->pegawai_nama }}</option>
          @endforeach
        </select>
      </label>
      <label>Jumlah Gaji:
        <input type="number" name="jumlah_gaji" placeholder="Contoh: 5000000" required>
      </label>
      <label>Lembur (Rp):
        <input type="number" name="jumlah_lembur" placeholder="Contoh: 200000">
      </label>
      <label>Potongan (Rp):
        <input type="number" name="potongan" placeholder="Contoh: 50000">
      </label>
      <label>Gaji Diterima:
        <input type="number" name="gaji_diterima" placeholder="Hitung otomatis (opsional)" required>
      </label>
      <label>Tanggal Gaji:
        <input type="date" name="tanggal_gaji" required>
      </label>
      <button type="submit">Simpan Gaji</button>
    </form>
    <a href="/gaji" class="back-link">← Kembali ke Daftar Gaji</a>
  </div>
</body>
</html>
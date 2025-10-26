<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Edit Pegawai</title>
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
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 6px;
      background: rgba(255, 255, 255, 0.2);
      color: white;
      font-size: 1rem;
    }
    input::placeholder {
      color: rgba(255, 255, 255, 0.6);
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
    <h2>Edit Golongan</h2>
    <form method="POST" action="/golongan/update/{{ $golongan->id }}">
      @csrf
      <label>Nama:
        <input type="text" name="nama" value="{{ $golongan->golongan_nama }}" required>
      </label>
      <label>Gaji Pokok:
        <input type="number" name="gaji_pokok" value="{{ $golongan->gaji_pokok }}" required>
      </label>
      <label>Tunjangan Keluarga:
        <input type="number" name="tunjangan_keluarga" value="{{ $golongan->gaji_pokok }}" required>
      </label>
      <label>Tunjangan Transport:
        <input type="number" name="tunjangan_transport" value="{{ $golongan->tunjangan_transport }}" required>
      </label>
      <label>Tunjangan Makan:
        <input type="number" name="tunjangan_makan" value="{{ $golongan->tunjangan_makan }}" required>
      </label>
      <button type="submit">Update Golongan</button>
    </form>
    <a href="/golongan" class="back-link">← Kembali ke Daftar Golongan</a>
  </div>
</body>
</html>
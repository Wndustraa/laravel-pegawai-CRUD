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
    <h2>Edit Pegawai</h2>
    <form method="POST" action="/pegawai/update/{{ $pegawai->id }}">
      @csrf
      <label>Nama:
        <input type="text" name="nama" value="{{ $pegawai->pegawai_nama }}" required>
      </label>
      <label>Jabatan:
        <input type="text" name="jabatan" value="{{ $pegawai->pegawai_jabatan }}" required>
      </label>
      <label>Umur:
        <input type="number" name="umur" value="{{ $pegawai->pegawai_umur }}" required>
      </label>
      <label>Alamat:
        <input type="text" name="alamat" value="{{ $pegawai->pegawai_alamat }}" required>
      </label>
      <button type="submit">Update Pegawai</button>
    </form>
    <a href="/pegawai" class="back-link">← Kembali ke Daftar Pegawai</a>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Sistem Pegawai</title>
  <!-- Font Awesome untuk ikon -->
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
      padding: 3rem 20px;
      min-height: calc(100vh - 150px);
      transition: margin-left 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    /* ====== HERO SECTION ====== */
    .hero {
      text-align: center;
      max-width: 800px;
      margin: 0 auto;
      padding: 3rem 2rem;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      border: 1px solid rgba(79, 195, 247, 0.2);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .hero h2 {
      color: #4fc3f7;
      font-size: 2.5rem;
      margin-bottom: 1.2rem;
      font-weight: 600;
    }

    .hero p {
      font-size: 1.1rem;
      line-height: 1.8;
      opacity: 0.9;
      margin-bottom: 1.5rem;
    }

    .btn-primary {
      display: inline-block;
      padding: 14px 32px;
      background: linear-gradient(135deg, #4fc3f7, #66bb6a);
      color: #0a2540;
      font-weight: 600;
      border-radius: 50px;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(79, 195, 247, 0.3);
      font-size: 1.1rem;
      position: relative;
      overflow: hidden;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0; left: -100%;
      width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.8s;
    }

    .btn-primary:hover::before {
      left: 100%;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(79, 195, 247, 0.4);
    }

    /* ====== FOOTER ====== */
    footer {
      background: rgba(10, 37, 64, 0.3);
      backdrop-filter: blur(10px);
      color: #ccc;
      text-align: center;
      padding: 2rem 0;
      margin-top: 3rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      margin-left: 80px;
      transition: margin-left 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    footer p {
      font-size: 0.95rem;
      opacity: 0.8;
    }

    .social-links a {
      color: #4fc3f7;
      font-size: 1.2rem;
      margin: 0 10px;
      transition: color 0.3s ease;
    }

    .social-links a:hover {
      color: white;
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 768px) {
      .sidebar {
        width: 60px !important;
      }
      .sidebar:hover {
        width: 60px !important;
      }
      .main-content, footer, .header {
        margin-left: 60px !important;
      }
      .header h1 {
        font-size: 2rem;
      }
      .hero h2 {
        font-size: 2rem;
      }
      .btn-primary {
        padding: 12px 28px;
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <!-- navbar -->
  <div class="sidebar">
    <div class="logo">🏢</div>
    <ul>
      <li><a href="#" class="active"><i class="fas fa-home"></i> <span>Home</span></a></li>
      <li><a href="/pegawai"><i class="fas fa-users"></i> <span>Pegawai</span></a></li>
      <li><a href="/golongan"><i class="fas fa-star"></i> <span>Golongan</span></a></li>
      <li><a href="/gaji"><i class="fas fa-money-bill-wave"></i> <span>Gaji</span></a></li>
      <li><a href="/lembur"><i class="fas fa-clock"></i> <span>Lembur</span></a></li>
    </ul>
  </div>

  <!-- header di tengah -->
  <div class="header">
    <h1>Dashboard</h1>
  </div>

  <!-- main konten -->
  <div class="main-content">
    <div class="container">
      <div class="hero">
        <h2>Selamat Datang di Dashboard</h2>
        <p>Sistem ini digunakan untuk mengelola data pegawai, golongan, gaji, dan lembur secara terintegrasi. Semua data tersimpan dalam database yang aman dan mudah diakses.</p>
        <a href="/pegawai" class="btn-primary">Lihat Data Pegawai</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; 2025 Sistem Pegawai - Dibuat oleh Windu | RPL SMK Poncol Jakarta</p>
      <div class="social-links">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-github"></i></a>
      </div>
    </div>
  </footer>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - MauriCraft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
      
            background: linear-gradient(135deg, #fce4ec 0%, #e3f2fd 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
        }
        
        .card-login {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .logo-container {
            text-align: center;
            margin-top: -60px; 
        }

        .logo-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            background-color: white;
        }

        .btn-custom {
            background: linear-gradient(to right, #ffb6c1, #81d4fa);
            color: white;
            border: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-custom:hover {
            opacity: 0.9;
            transform: scale(1.02);
            color: white;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #eee;
            padding: 12px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 182, 193, 0.25);
            border-color: #ffb6c1;
        }
    </style>
</head>
<body>

    <div class="card card-login shadow-lg p-4">
        <div class="logo-container mb-4">
            <img src="logo mauricraft.jpeg" alt="Logo Mauricraft" class="logo-img">
        </div>

        <div class="card-body pt-0">
            <div class="text-center mb-4">
                <h3 class="fw-bold" style="color: #d17586;">Welcome to MauriCraft</h3>
                <p class="text-muted small">Handmade with Love ✨</p>
            </div>
            
            <form method="post" action="loginsubmit.php">
                <div class="mb-3">
                    <label class="form-label text-muted small fw-bold">USERNAME</label>
                    <input name="username" type="text" class="form-control shadow-sm" placeholder="Username admin" required>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">PASSWORD</label>
                    <input name="pass" type="password" class="form-control shadow-sm" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-custom w-100 py-2 shadow-sm rounded-pill">MASUK SEKARANG</button>
            </form>
            
            <div class="text-center mt-4">
                <a href="index.php" class="text-decoration-none text-muted small">← Kembali ke Katalog</a>
            </div>
        </div>
    </div>

</body>
</html>
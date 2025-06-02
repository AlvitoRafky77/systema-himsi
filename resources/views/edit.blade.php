<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="profile-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Edit Profile</h1>
            <div class="hero-line"></div>
        </div>
        <div class="hero-overlay"></div>
    </div>

    <div class="container main-content">
        <div class="navigation-wrapper">
            <a href="{{ route('dashboard') }}" class="back-button">
                <i class="fas fa-home"></i>
                <span>Kembali ke Dashboard</span>
            </a>
        </div>

        @if(session('success'))
            <div class="alert-wrapper">
                <div class="custom-alert success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                    <button type="button" class="close-btn" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-card">
                    <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
                        @csrf

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                <label for="name">Nama</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" id="password" name="password">
                                <label for="password">Password Baru (opsional)</label>
                            </div>
                        </div>

                        <button type="submit" class="submit-btn">
                            <span>Simpan Perubahan</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Base Styles */
        .profile-page {
            background: #f8f9fa;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
            padding: 60px 0;
            margin-bottom: 40px;
            overflow: hidden;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.05)"/></svg>');
            background-size: 20px 20px;
            opacity: 0.5;
            animation: moveBackground 20s linear infinite;
        }

        @keyframes moveBackground {
            from { background-position: 0 0; }
            to { background-position: 40px 40px; }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.8s ease forwards;
        }

        .hero-line {
            width: 80px;
            height: 4px;
            background: #ffc107;
            margin: 20px auto;
            transform: scaleX(0);
            animation: expandLine 0.8s ease forwards 0.4s;
        }

        /* Navigation */
        .navigation-wrapper {
            margin-bottom: 30px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background: white;
            border-radius: 50px;
            color: #002fff;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .back-button:hover {
            transform: translateX(-5px);
            background: #002fff;
            color: white;
        }

        .back-button i {
            margin-right: 8px;
        }

        /* Alert */
        .alert-wrapper {
            margin-bottom: 30px;
        }

        .custom-alert {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            animation: slideIn 0.5s ease forwards;
        }

        .custom-alert.success {
            border-left: 4px solid #28a745;
        }

        .custom-alert i {
            font-size: 1.2rem;
            margin-right: 10px;
            color: #28a745;
        }

        .close-btn {
            margin-left: auto;
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .close-btn:hover {
            color: #333;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards 0.2s;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 25px;
        }

        .input-wrapper {
            position: relative;
            margin-top: 25px;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #002fff;
            font-size: 1.1rem;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .input-wrapper label {
            position: absolute;
            left: 45px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            color: #666;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .input-wrapper input:focus,
        .input-wrapper input:not(:placeholder-shown) {
            border-color: #002fff;
            box-shadow: 0 0 0 4px rgba(0,47,255,0.1);
        }

        .input-wrapper input:focus + label,
        .input-wrapper input:not(:placeholder-shown) + label {
            top: 0;
            left: 15px;
            font-size: 0.85rem;
            padding: 0 5px;
            background: white;
            color: #002fff;
        }

        .input-wrapper input:focus ~ .input-icon {
            color: #002fff;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 15px 25px;
            background: linear-gradient(135deg, #002fff 0%, #0072FF 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,47,255,0.3);
        }

        .submit-btn i {
            transition: transform 0.3s ease;
        }

        .submit-btn:hover i {
            transform: translateX(5px);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes expandLine {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 0;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .profile-card {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 30px 0;
            }

            .hero-title {
                font-size: 1.5rem;
            }

            .back-button span {
                display: none;
            }

            .profile-card {
                padding: 20px;
            }

            .input-wrapper input {
                font-size: 0.95rem;
            }

            .submit-btn {
                padding: 12px 20px;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

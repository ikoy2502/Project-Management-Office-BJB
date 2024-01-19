<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <style>
        /* CSS untuk animasi lingkaran yang berputar */
        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0; /* Ganti warna background sesuai keinginan */
        }

        .loading-circle {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Tambahan: Teks loading */
        .loading-text {
            font-size: 24px;
            margin-top: 20px;
            text-align: center;
            color: #333; /* Ganti warna teks sesuai keinginan */
        }
    </style>
</head>
<body>
    <div class="loading-container">
        <div class="loading-circle"></div>
        <div class="loading-text">Loading...</div>
    </div>
</body>
</html>

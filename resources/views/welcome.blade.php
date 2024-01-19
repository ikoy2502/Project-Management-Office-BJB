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
    </style>
    <script>
        // Sembunyikan halaman loading setelah seluruh halaman selesai dimuat
        window.addEventListener("load", function () {
            document.getElementById("loading-page").style.display = "none";
        });
    </script>
</head>
<body>
    <div id="loading-page" class="loading-container">
        <div class="loading-circle"></div>
    </div>
</body>
</html>

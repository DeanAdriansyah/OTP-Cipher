<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Time Pad</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #212529;
            color: #ffffff;
        }
        .container {
            background-color: #343a40;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin-top: 50px;
        }
        h2, h3 {
            color: #007bff;
        }
        .form-label, .form-control {
            color: #ffffff;
        }
        .btn-primary, .btn-secondary {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 text-center"> <!-- Reduced the column width to 6 -->
                <h2 class="mb-4">One-Time Pad (OTP)</h2>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan/Teks:</label>
                        <input type="text" id="message" name="message" class="form-control" required>
                </div>
                    <div class="mb-3">
                        <label for="key" class="form-label">Kunci (Sepanjang Teks):</label>
                        <input type="text" id="key" name="key" class="form-control" required>
                    </div>
                    <button type="submit" name="encrypt" class="btn btn-primary">Encrypt</button>
                    <button type="submit" name="decrypt" class="btn btn-secondary">Decrypt</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    require_once("functions_xor.php");

                    $message = $_POST["message"];
                    $key = $_POST["key"];

                    if (isset($_POST["encrypt"])) {
                        $encryptedText = encryptXOR($message, $key);
                        echo "<p class='mt-3 alert alert-success'>$encryptedText</p>";
                    }

                    if (isset($_POST["decrypt"])) {
                        $decryptedText = decryptXOR($message, $key);
                        echo "<p class='mt-3 alert alert-success'>$decryptedText</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js (for Bootstrap functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

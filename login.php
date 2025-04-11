<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ensure full viewport height */
            background-image: url('https://wallpapercave.com/wp/wp2544022.jpg');
            background-size: cover;
            background-position: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #333;
        }

        /* Style for the "Log In as Admin" button */
        .login-as-admin {
            margin-top: 20px;
        }

        .login-as-admin button {
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color black;
        }

        .login-as-admin button:hover {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="userloginconnection.php" method="POST">
            <h2>Log-In</h2>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="gmail">Email:</label>
                <input type="text" id="gmail" name="gmail" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submitdata">Log In</button>
        </form>

        <!-- "Log In as Admin" button -->
        <div class="login-as-admin">
            <a href="adminlogin.php">
                <button>Log In as Admin</button>
            </a>
        </div>
        <div class="login-as-admin">
            <a href="signin.php">
                <p>Dont have an account?</p>
            </a>
        </div>
    </div>
</body>
</html>
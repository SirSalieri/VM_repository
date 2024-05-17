<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="api.js"></script>
    <style>
        .logout-btn {
            background-color: #FF6347; /* Tomato color */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1rem;
            margin-top: 10px;
        }

        .logout-btn:hover {
            background-color: #FF4500; /* Darker tomato color */
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-group {
            display: flex;
            align-items: center;
        }

        .form-group input[type='text'] {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div id="main-container">
        <header>
            <form>
                <div class="form-group">
                    <button class="submit-btn">
                        <i class="fas fa-search"></i>
                    </button>
                    <input type="text" placeholder="Search city" />
                    <br />
                    <span class="error-msg">No matching location found!</span>
                </div>
            </form>
            <form method="post" action="logout.php">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </header>
        <div class="main-weather-display info">
            <div class="general-info">
                <p class="condition">MOSTLY SUNNY</p>
                <h1 class="location">Lagos, Nigeria</h1>
                <span class="degrees">62</span>
            </div>
            <div class="weather-details info">
                <p class="feels-like">FEELS LIKE: 69</p>
                <p class="wind-mph">WIND: 5 MPH</p>
                <p class="humidity">HUMIDITY: 69</p>
            </div>
        </div>
    </div>
</body>
</html>

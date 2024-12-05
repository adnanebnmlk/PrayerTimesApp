<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="StylC.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prayer Timer</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light  shadow-sm">
    <div class="container m-3">
        <h3><a class="navbar-brand" href="index.php">Prayer Times</a></h3>
        
    </div>
</nav>

<div class="container text-center mt-5">
    <h1 class="mb-4">Prayer Time</h1>
    <p id="date" class="lead"></p>
    
    <div class="clock display-4 mb-3" id="clock">00:00:00</div>

    <button id="startButton" class="btn btn-primary mb-4" onclick="initializeAudio()">Activate Adhan</button>

    <select id="citySelector" class="form-select mb-4" onchange="fetchPrayerTimes()">
    <option disabled selected>Select a city</option>
    <option value="Rabat">Rabat</option>
    <option value="Casablanca">Casablanca</option>
    <option value="Marrakech">Marrakech</option>
    <option value="Tangier">Tangier</option>
    <option value="Agadir">Agadir</option>
    <option value="Fes">Fes</option>
    <option value="Meknes">Meknes</option>
    <option value="Oujda">Oujda</option>
    <option value="Tetouan">Tetouan</option>
    <option value="Kenitra">Kenitra</option>
</select>

<!-- Prayer Times -->
<div id="prayerTimesContainer" class="row justify-content-center mt-4">
    <div id="prayerTimes" class="row justify-content-center mt-4"></div>
</div>
</div>
<footer>
    <p>&copy; 2024 Adnane Benmalek. All rights reserved.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

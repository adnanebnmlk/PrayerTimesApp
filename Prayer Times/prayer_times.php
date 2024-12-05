<?php
header('Content-Type: application/json');

$cities = ["Rabat", "Casablanca", "Marrakech", "Tangier", "Agadir", "Fes", "Meknes", "Oujda", "Tetouan", "Kenitra"];
$country = "Morocco";
$prayerTimesByCity = [];

foreach ($cities as $city) {
    $apiURL = "https://api.aladhan.com/v1/timingsByCity?city=$city&country=$country";
    $response = file_get_contents($apiURL);

    if ($response !== false) {
        $data = json_decode($response, false);

        // Parse prayer times for each city
        $prayerTimesByCity[$city] = [
            'fajr' => $data->data->timings->Fajr,
            'dhuhr' => $data->data->timings->Dhuhr,
            'asr' => $data->data->timings->Asr,
            'maghrib' => $data->data->timings->Maghrib,
            'isha' => $data->data->timings->Isha,
        ];
    }
}

echo json_encode($prayerTimesByCity);
?>
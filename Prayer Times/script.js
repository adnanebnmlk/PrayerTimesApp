let prayerTimes = {};
const adan = new Audio("Adan.mp3");

function initializeAudio() {
    adan.play().then(() => {
        adan.pause();
        document.getElementById("startButton").style.display = "none";
    }).catch(error => {
        console.log("Audio initialization failed:", error);
    });
}

function updateClock() {
    const now = new Date();
    const options = { year: 'numeric', month: 'long', weekday: 'long', day: 'numeric' };
    document.getElementById('date').textContent = now.toLocaleDateString('en-EN', options);
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    document.getElementById("clock").textContent = `${hours}:${minutes}:${seconds}`;

    if (Object.keys(prayerTimes).length > 0) {
        const currentTime = `${hours}:${minutes}`;
        if (Object.values(prayerTimes).includes(currentTime)) {
            adan.play().catch(error => console.log("Audio playback failed:", error));
        }
    }
}

async function fetchPrayerTimes() {
    const selectedCity = document.getElementById("citySelector").value;
    const response = await fetch('prayer_times.php');
    const data = await response.json();

    if (selectedCity && data[selectedCity]) {
        prayerTimes = data[selectedCity];
        document.getElementById("prayerTimes").innerHTML = `
        <div class="col-6 col-md-2 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Fajr</h5>
                <p class="card-text">${prayerTimes.fajr}</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-2 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Dhuhr</h5>
                <p class="card-text">${prayerTimes.dhuhr}</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-2 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Asr</h5>
                <p class="card-text">${prayerTimes.asr}</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-2 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Maghrib</h5>
                <p class="card-text">${prayerTimes.maghrib}</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-2 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Isha</h5>
                <p class="card-text">${prayerTimes.isha}</p>
            </div>
        </div>
    </div>
       
        `;
    }
}

setInterval(updateClock, 1000);
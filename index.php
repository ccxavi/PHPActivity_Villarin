<?php
// Handle Album Duration Calculation
$num_songs = isset($_POST["num_songs"]) ? $_POST["num_songs"] : null;
$avg_duration = isset($_POST["avg_duration"]) ? $_POST["avg_duration"] : null;
$total_duration = null;

function calculate_album_duration($num_songs, $avg_duration) {
    return number_format($num_songs * $avg_duration, 2);
}

if ($num_songs !== null && $avg_duration !== null && $num_songs > 0 && $avg_duration > 0) {
    $total_duration = calculate_album_duration($num_songs, $avg_duration);
}

// Handle Fuel Efficiency Calculation
$distance = isset($_POST["distance"]) ? $_POST["distance"] : null;
$fuel_consumed = isset($_POST["fuel_consumed"]) ? $_POST["fuel_consumed"] : null;
$fuel_efficiency = null;

function calculate_fuel_efficiency($distance, $fuel_consumed) {
    return ($fuel_consumed > 0) ? number_format($distance / $fuel_consumed, 2) : null;
}

if ($distance !== null && $fuel_consumed !== null && $distance > 0 && $fuel_consumed > 0) {
    $fuel_efficiency = calculate_fuel_efficiency($distance, $fuel_consumed);
}

// Handle Calories Burned Calculation
$weight = isset($_POST["weight"]) ? $_POST["weight"] : null;
$duration = isset($_POST["duration"]) ? $_POST["duration"] : null;
$calories_burned = null;

function calculate_calories_burned($weight, $duration) {
    $met = 8;
    return number_format($weight * $duration * 0.0175 * $met, 2);
}

if ($weight !== null && $duration !== null && $weight > 0 && $duration > 0) {
    $calories_burned = calculate_calories_burned($weight, $duration);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP Activity | Villarin</title>
    <link rel="stylesheet" href="./styles/global.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
</head>
<body>
    <main class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card w-100 p-4 card-color shadow-lg" style="max-width: 1250px">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div class="pic"></div>
                        <div>
                            <h3 class="mb-1">Czachary Xavier Villarin</h3>
                            <p class="mb-0 text-muted">CIS 1202 - <i>Web Development I</i> | BSCS 1</p>
                        </div>
                    </div>
                    <h3 class="mb-0">PHP Activity 1</h3>
                </div>
                <hr class="mt-3 mb-0" />
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="d-flex gap-4">
                <div class="card card-color p-4 shadow-sm flex-fill d-flex flex-column" style="max-width: 33%">
                  <div class="card-header card-color border-bottom-0 p-0">
                    <h4 class="mb-0"><i class="bi bi-music-note-list"></i> | Album Duration Calculator</h4>
                  </div>
                  <hr />
                  <div class="card-body">
                    <form method="post" class="w-100">
                      <div class="mb-3">
                        <label for="num_songs" class="form-label">Number of Songs:</label>
                        <input type="number" name="num_songs" id="num_songs" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="avg_duration" class="form-label">Average Song Duration (minutes):</label>
                        <input type="number" step="0.01" name="avg_duration" id="avg_duration" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Calculate</button>
                    </form>
                  </div>
                </div>

                <div class="card card-color p-4 shadow-sm flex-fill d-flex flex-column" style="max-width: 33%">
                  <div class="card-header card-color border-bottom-0 p-0">
                    <h4 class="mb-0"><i class="bi bi-airplane"></i> | Fuel Efficiency Calculator</h4>
                  </div>
                  <hr />
                  <div class="card-body">
                    <form method="post" class="w-100">
                      <div class="mb-3">
                        <label for="distance" class="form-label">Flight Distance (km):</label>
                        <input type="number" name="distance" id="distance" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="fuel_consumed" class="form-label">Fuel Consumed (liters):</label>
                        <input type="number" step="0.01" name="fuel_consumed" id="fuel_consumed" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Calculate</button>
                    </form>
                  </div>
                </div>

                <div class="card card-color p-4 shadow-sm flex-fill d-flex flex-column" style="max-width: 33%">
                  <div class="card-header card-color border-bottom-0 p-0">
                    <h4 class="mb-0"><i class="bi bi-fire"></i> | Calorie Burn Calculator</h4>
                  </div>
                  <hr />
                  <div class="card-body">
                    <form method="post" class="w-100">
                      <div class="mb-3">
                        <label for="weight" class="form-label">Weight (kg):</label>
                        <input type="number" step="0.1" name="weight" id="weight" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="duration" class="form-label">Exercise Duration (minutes):</label>
                        <input type="number" name="duration" id="duration" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Calculate</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="mt-4">
                <?php if ($total_duration !== null): ?>
                  <div class="alert alert-info text-center m-0">
                  <i class="bi bi-music-note-list"></i> | <strong>Total Album Duration:</strong> <?php echo $total_duration ?> minutes
                  </div>
                <?php endif; ?>
                
                <?php if ($fuel_efficiency !== null): ?>
                  <div class="alert alert-info text-center m-0">
                  <i class="bi bi-airplane"></i> | <strong>Fuel Efficiency:</strong> <?php echo $fuel_efficiency ?> km/l
                  </div>
                <?php endif; ?>
                
                <?php if ($calories_burned !== null): ?>
                  <div class="alert alert-info text-center m-0">
                  <i class="bi bi-fire"></i> | <strong>Estimated Calories Burned:</strong> <?php echo $calories_burned ?> kcal
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="card-footer text-center">
              <hr class="m-0" />
              <p class="text-muted mt-3">
                  © 2025, Czach Villarin. All Rights Reserved.
              </p>
            </div>
        </div>
    </main>
</body>
</html>
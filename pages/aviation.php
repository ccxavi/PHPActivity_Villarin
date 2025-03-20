<?php
$distance = isset($_POST["distance"]) ? $_POST["distance"] : null;
$fuel_consumed = isset($_POST["fuel_consumed"]) ? $_POST["fuel_consumed"] : null;
$fuel_efficiency = null;

function calculate_fuel_efficiency($distance, $fuel_consumed) {
    return $fuel_consumed > 0 ? number_format($distance / $fuel_consumed, 2) : null;
}

if ($distance !== null && $fuel_consumed !== null) {
    $fuel_efficiency = calculate_fuel_efficiency($distance, $fuel_consumed);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Efficiency Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/global.css">
</head>
<body>
    <main
        class="container-fluid d-flex flex-column justify-content-center align-items-center vh-100 vw-100"
        >
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <i class="bi bi-speedometer2 fs-1"></i>
            <h3>Fuel Efficiency Calculator</h3>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="distance" class="form-label">Flight Distance (km):</label>
                    <input type="number" step="0.1" name="distance" id="distance" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="fuel_consumed" class="form-label">Fuel Consumed (liters):</label>
                    <input type="number" step="0.1" name="fuel_consumed" id="fuel_consumed" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Calculate</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <?php if ($fuel_efficiency !== null): ?>
                <div class="alert alert-info mt-3">
                    <strong><i class="bi bi-fuel-pump"></i> Fuel Efficiency:</strong> <?php echo $fuel_efficiency ?> km/l
                </div>
            <?php endif; ?>
        </div>
    </div>
    </main>
</body>
</html>
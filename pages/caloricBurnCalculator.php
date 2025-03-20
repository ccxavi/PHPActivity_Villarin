<?php
$weight = isset($_POST["weight"]) ? $_POST["weight"] : null;
$duration = isset($_POST["duration"]) ? $_POST["duration"] : null;
$calories_burned = null;

function calculate_calories_burned($weight, $duration) {
    $met = 8;
    return number_format($weight * $duration * 0.0175 * $met, 2);
}

if ($weight !== null && $duration !== null) {
    $calories_burned = calculate_calories_burned($weight, $duration);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Burn Calculator</title>
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
            <i class="bi bi-fire fs-1"></i>
            <h3>Calorie Burn Calculator</h3>
        </div>
        <div class="card-body">
            <form method="post">
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
        <div class="card-footer text-center">
            <?php if ($calories_burned !== null): ?>
                <div class="alert alert-info mt-3">
                    <strong><i class="bi bi-lightning-fill"></i> Estimated Calories Burned:</strong> <?php echo $calories_burned ?> kcal
                </div>
            <?php endif; ?>
        </div>
    </div>
    </main>
</body>
</html>
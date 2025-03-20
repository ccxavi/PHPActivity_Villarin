<?php
$num_songs = isset($_POST["num_songs"]) ? $_POST["num_songs"] : null;
$avg_duration = isset($_POST["avg_duration"]) ? $_POST["avg_duration"] : null;
$total_duration = null;

function calculate_album_duration($num_songs, $avg_duration) {
    return number_format($num_songs * $avg_duration, 2);
}

if ($num_songs !== null && $avg_duration !== null) {
    $total_duration = calculate_album_duration($num_songs, $avg_duration);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Duration Calculator</title>
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
            <i class="bi bi-music-note-list fs-1"></i>            
            <h3>Album Duration Calculator</h3>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="num_songs" class="form-label">Number of Songs:</label>
                    <input type="number" name="num_songs" id="num_songs" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="avg_duration" class="form-label">Average Song Duration (in minutes):</label>
                    <input type="number" step="0.01" name="avg_duration" id="avg_duration" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Calculate</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <?php if ($total_duration !== null): ?>
                <div class="alert alert-info mt-3">
                    <strong>Total Album Duration:</strong> <?php echo $total_duration ?> minutes
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
</body>
</html>
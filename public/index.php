<?php
require_once __DIR__ . '/../includes/db.php';

try {
    $stmt = $pdo->query("SELECT * FROM cars ORDER BY created_at DESC");
    $cars = $stmt->fetchAll();
} catch (\Exception $e) {
    $cars = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabata Motors Kenya | Vehicle Inventory</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Kabata Motors Kenya</h1>
            <p>Your Trusted Partner for Quality Vehicles</p>
        </div>
    </header>
    
    <main class="container">
        <h2>Available Vehicle Inventory</h2>
        <?php if (empty($cars)): ?>
            <p>No vehicles listed in the database yet.</p>
        <?php else: ?>
            <div class="car-grid">
                <?php foreach ($cars as $car): ?>
                    <div class="car-card">
                        <h3><?= htmlspecialchars($car['make'] . ' ' . $car['model']) ?> (<?= htmlspecialchars($car['year']) ?>)</h3>
                        <p class="price">KES <?= number_format($car['price']) ?></p>
                        <p><strong>Engine:</strong> <?= htmlspecialchars($car['engine_cc']) ?> CC</p>
                        <p><strong>Transmission:</strong> <?= htmlspecialchars($car['transmission']) ?></p>
                        <p><strong>Location:</strong> <?= htmlspecialchars($car['location']) ?></p>
                        <p class="desc"><?= htmlspecialchars($car['description']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>

<?php
    $ping_grezzi = [45, 120, -1, 32, 210, 85, -1, 18, 95, 310, 45, 60, -1, 150, 28, 240,18, 72];
    $ping_validi = [];
    $contatori_persi = 0;
    array_push($ping_grezzi, 55, 190, 12);

    foreach ($ping_grezzi as $ping) {
    if ($ping == -1) {
        $pacchetti_persi++;
    } elseif ($ping > 0) {
        $ping_validi[] = $ping;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione Telemetrica</title>
</head>
<body>
    <ul>
        <?php foreach ($ping_validi as $ping): ?>
            <li>Ping: <?php echo $ping; ?> ms</li>
        <?php endforeach; ?>
    </ul>

    <p>Pacchetti persi (-1): <?php echo $pacchetti_persi; ?></p>
</body>
</html>
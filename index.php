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

    $somma = 0;
    $ping_min = $ping_validi[0];
    $ping_max = $ping_validi[0];
    $ping_critici = [];

    foreach ($ping_validi as $ping) {
        $somma += $ping;

        if ($ping < $ping_min) {
        $ping_min = $ping;
    }
        if ($ping > $ping_max) {
        $ping_max = $ping;
    }
        if ($ping > 150) {
        $ping_critici[] = $ping;
    }
    $media = round($somma / count($ping_validi), 2);
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
        <p><strong>Pacchetti persi (-1):</strong> <? $pacchetti_persi ?></p>
        <p><strong>Tempo medio di risposta:</strong> <? $media ?></p>
        <p><strong>Ping minimo:</strong> <?= $ping_min ?> </p>
        <p><strong>Ping massimo (Picco):</strong> <? $ping_max ?></p>
        <?php foreach ($ping_validi as $ping): ?>
            <li>Ping: <?php echo $ping; ?> </li>
        <?php endforeach; ?>
    </ul>
    <p>Pacchetti persi (-1): <?php echo $pacchetti_persi; ?></p>
    <ul>
        <?php foreach ($ping_critici as $critico): ?>
            <li>Ping critico: <?= $critico ?> </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
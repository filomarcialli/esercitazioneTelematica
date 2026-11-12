<?php
    $ping_grezzi = [45, 120, -1, 32, 210, 85, -1, 18, 95, 310, 45, 60, -1, 150, 28, 240, 18, 72];
    $ping_grezzi[] = 55;
    $ping_grezzi[] = 190;
    $ping_grezzi[] = 12;

    $ping_validi = [];

    $pacchetti_persi = 0;


    foreach($ping_grezzi as $ping) {
        if($ping == -1) {
            $pacchetti_persi ++;
        } elseif($ping > 0) {
            $ping_validi = $ping;
        }
    }

    $somma_ping = 0;
    $conta_ping = 0;

    foreach($ping_validi as $ping) {
        $somma_ping = $ping;
        $conta_ping ++;
    }

    $media_ping = $somma_ping / $conta_ping;
    $media_arrotondata = round($media_ping, 2);

    $ping_massimo = $ping_validi[0];
    $ping_minimo = $ping_validi[0];

    foreach($ping_validi as $ping) {
        if($ping > $ping_massimo) {
            $ping_massimo = $ping;
        }
        if($ping < $ping_minimo) {
            $ping_minimo = $ping;
        }
    }

    $ping_critici = [];
    foreach($ping_validi as $ping) {
        if($ping > 150) {
            $ping_critici[]= $ping;
        }
    }

    $ping_unici = array_values(array_unique($ping_validi));

    $ping_ordinati = $ping_validi;

    sort($ping_ordinati);

    $top_3_veloci = array_slice($ping_ordinati, 0, 3);

    $esiste_100ms = in_array(100, $ping_validi);

    if($esiste_100ms) {
        $controllo_100ms = "Si";
    } else {
        $controllo_100ms = "No";
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione Telematica</title>
</head>
<body>

    <ul>
        <li>TOTALE RILEVAZIONI INIZIALI: <?= count($ping_grezzi) ?></li>
        <li>PACCHETTI VALIDI: <?= count($ping_validi) ?> </li>
        <li>PACCHETTI PERSI: <?= $pacchetti_persi ?> </li>
        <li>MEDIA: <?= $media_arrotondata ?> </li>
        <li>MASSIMO: <?= $ping_massimo ?> </li>
        <li>MINIMO: <?= $ping_minimo ?> </li>
        <li>PING DI ESATTAMENTE 100ms? <?= $controllo_100ms ?> </li>
    </ul>

    <h2>TOP 3 MIGLIORI TEMPI</h2>
    <p>
        <?= implode(" ms - ", $top_3_veloci) . " ms" ?>
    </p>

    <table>
        <thead>
            <tr>
                <th>N. Rilevazione</th>
                <th>Valore</th>
                <th>Stato</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ping_validi as $indice => $valore): ?>
                <tr>
                    <td><?= $indice + 1 ?></td>
                    <td><?= $valore ?></td>
                    <td>
                        <?php if ($valore > 150): ?>
                            <strong>CRITICO</strong>
                        <?php else: ?>
                            NORMALE
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
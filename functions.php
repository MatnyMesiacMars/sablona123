<?php
function   pridajPozdrav()
{
    $hour = date('H');

    if ($hour < 12) {
        echo "<h1>Dobré ráno</h1>";
    } elseif ($hour < 18) {
        echo "<h1>Dobrý deň</h1>";
    } else {
        echo "<h1>Dobrý večer</h1>";
    }
}
function generateSlides($dir) {
    $files = glob($dir . "/*.jpg");
    $json = file_get_contents("datas.json");
    $data = json_decode($json, true);
    $text = $data["text_banner"];

    foreach ($files as $file) {
        echo '<div class="slide fade">';
        echo '<img src="' . $file . '">';
        echo '<div class="slide-text">';
        echo ($text[basename($file)]);
        echo '</div>';
        echo '</div>';
    }
}
function generatePortfolio($dir) {
    $files = glob($dir . "/*.jpg");

    $json = file_get_contents("data/datas.json");
    $data = json_decode($json, true);
    $text = $data["portfolio"];

    $count = 0;

    foreach ($files as $file) {
        if ($count % 4 == 0) {
            echo '<div class="row">';
        }

        $fileName = basename($file);

        echo '<div class="col-25 portfolio text-white text-center" id="portfolio-' . ($count + 1) . '">';
        echo '<img src="' . $file . '">';
        echo '<div class="portfolio-text">';
        echo $text[$fileName];
        echo '</div>';
        echo '</div>';

        $count++;

        if ($count % 4 == 0) {
            echo '</div>';
        }
    }

    if ($count % 4 != 0) {
        echo '</div>';
    }
}

            ?>


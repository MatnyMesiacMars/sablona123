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
    $json = file_get_contents("data/datas.json");
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

            ?>


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
        $fileName = basename($file);

        if (isset($text[$fileName])) {
            $slideText = $text[$fileName];
        } else {
            $slideText = "";
        }

        echo '<div class="slide fade">';
        echo '<img src="' . $file . '">';
        echo '<div class="slide-text">';
        echo $slideText;
        echo '</div>';
        echo '</div>';
    }
}
function generatePortfolio($dir) {
    $files = glob($dir . "/*.jpg");

    $json = file_get_contents("datas.json");
    $data = json_decode($json, true);
    $text = $data["portfolio"];

    $count = 0;

    foreach ($files as $file) {
        if ($count % 4 == 0) {
            echo '<div class="row">';
        }

        $fileName = basename($file);

        // ✅ Check if key exists before using it
        if (isset($text[$fileName])) {
            $portfolioText = $text[$fileName];
        } else {
            $portfolioText = "Web stránka " . ($count + 1);
        }

        echo '<div class="col-25 portfolio text-white text-center" id="portfolio-' . ($count + 1) . '" 
              style="background-image:url(' . $file . '); background-size:cover; background-position:center; height:200px; display:flex; align-items:flex-end;">';

        echo '<div style="width:100%; background:rgba(0,0,0,0.6); padding:10px;">';
        echo $portfolioText;
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


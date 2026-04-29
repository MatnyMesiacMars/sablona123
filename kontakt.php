
<?php
// Show errors (VERY IMPORTANT for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>

    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php
// SAFE include (no duplicate, no path issues)
require __DIR__ . "/parts/header.php";
?>

<main>

    <section class="banner">
        <div class="container text-white">
            <h1>Kontakt</h1>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="col-100 text-center">
                <p>
                    <strong><em>
                            Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui.
                        </em></strong>
                </p>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">

            <div class="col-50">
                <h3>Máte otázky?</h3>
                <p>Incididunt mollit quis eiusmod tempor voluptate duis eu enim amet.</p>
                <p>Velit id ad laborum velit commodo.</p>
                <p>Consectetur laborum aliqua nulla anim cupidatat.</p>
            </div>

            <div class="col-50 text-right">
                <h3>Napíšte nám</h3>

                <form id="contact" method="post" action="db/spracovanieFormulara.php">

                    <input type="text" name="meno" placeholder="Vaše meno" required>
                    <br>

                    <input type="email" name="email" placeholder="Váš email" required>
                    <br>

                    <textarea name="sprava" placeholder="Vaša správa" required></textarea>
                    <br>

                    <input type="checkbox" name="gdpr" required>
                    <label>Súhlasím so spracovaním osobných údajov.</label>
                    <br>

                    <input type="submit" value="Odoslať">

                </form>
            </div>

        </div>
    </section>

</main>

<?php
// SAFE footer include
require __DIR__ . "/parts/footer.php";
?>

<script src="js/menu.js"></script>

</body>
</html>
<?php
require_once __DIR__ . '/classes/QnA.php';

$qna = new QnA();
$data = $qna->getQnA();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Q&A</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/accordion.css">
    <link rel="stylesheet" href="css/banner.css">
</head>

<body>

<?php include "parts/header.php"; ?>

<main>

    <section class="banner">
        <div class="container text-white">
            <h1>Q&A</h1>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <p><strong><em>
                            Elit culpa id mollit irure sit.
                        </em></strong></p>
            </div>
        </div>
    </section>

    <section class="container">

        <?php foreach ($data as $item) { ?>
            <div class="accordion">
                <div class="question">
                    <?php echo htmlspecialchars($item['otazka']); ?>
                </div>
                <div class="answer">
                    <?php echo htmlspecialchars($item['odpoved']); ?>
                </div>
            </div>
        <?php } ?>

    </section>

</main>

<?php include "parts/footer.php"; ?>

</body>
</html>
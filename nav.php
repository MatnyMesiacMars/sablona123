
<?php
include "classes/Menu.php";

$menuManager = new Menu();
$theme = $_GET["theme"] ?? "light";

$menuData = $menuManager->getMenuData("header");
$homePath = $menuData['home']['path'] ?? '';
?>

<header style="background-color: <?php echo $theme === 'dark' ? 'grey' : 'white'; ?>">
    <div class="container main-header">
        <div class="logo-holder">
            <a href="<?php echo $homePath; ?>">
                <img alt="img" src="img/logo.png" height="40">
            </a>
        </div>
    </div>
    <ul class="main-menu" id="main-menu container">

        <li>
            <a href="<?php echo $theme === 'dark' ? '?theme=light' : '?theme=dark'; ?>">
                Zmena témy
            </a>
        </li>

        <?php
        if ($menuManager->isValidMenuType("header")) {
            $menuData = $menuManager->getMenuData("header");
            $menuManager->printMenu($menuData);
        } else {
            echo "<li>Neplatný typ menu</li>";
        }
        ?>

    </ul>
</header>
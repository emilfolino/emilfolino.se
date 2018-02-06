<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= isset($title) ? print $title . " - " : print "" ?>emilfolino.com</title>

    <link rel="stylesheet" href="style.min.css" />
</head>
<body>
    <section class="left-menu">
        <h1 class="main-title">emilfolino.com</h1>
        <?php
            $menu_items = [
                "" => "Home",
                "about.php" => "About",
                "tech.php" => "Technical"
            ];

            foreach ($menu_items as $url => $text) {
                $active = isset($menu) && $menu === $url ? " active" : "";
                print "<a class='menu-item$active' href='$url'>$text</a>";
            }
        ?>
    </section>
    <main class="container">
        <h1 class="main-title-mobile">emilfolino.com</h1>

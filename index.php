<?php
$title = "Home";
$menu = "";

$filename = "content/articles.html";
$html_content = "<article><h2>Ooops! Something went wrong!</h2></article>";

if (file_exists($filename)) {
    $html_content = file_get_contents($filename);
}
?>

<?php include_once 'includes/header.php' ?>
<?= $html_content ?>
<?php include_once 'includes/footer.php' ?>

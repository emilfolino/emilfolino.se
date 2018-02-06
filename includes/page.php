<?php

require 'vendor/autoload.php';
use Michelf\Markdown;

$filename = "pages/$menu.md";
$html_content = "<h2>$title</h2>";

if (file_exists($filename)) {
    $html_content = Markdown::defaultTransform(file_get_contents($filename));
}
?>

<?php include_once 'header.php' ?>
<article>
    <?= $html_content ?>
</article>
<?php include_once 'footer.php' ?>

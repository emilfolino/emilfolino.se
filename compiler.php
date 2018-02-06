<?php
require 'vendor/autoload.php';
use Michelf\Markdown;

print("HEJ");

$output_file = "articles.html";
$input_dir = "content";
$number_of_files = 2; //10;

$html_content = "";

$files = glob("$input_dir/*.md");
usort($files, function($a, $b) {
    return filemtime($a) < filemtime($b);
});

$files_to_be_parsed = array_slice($files, 0, $number_of_files);

foreach ($files_to_be_parsed as $key => $filename) {
    $html_content.= "<article>\n";
    $html_content.= "<time datetime='" . date("Y-m-d\TH:i", filemtime($filename)) . "' class='article-date'>" . date("Y-m-d", filemtime($filename)) . "</time>";
    $html_content.= Markdown::defaultTransform(file_get_contents($filename));
    $html_content.= "</article>\n\n";
}

file_put_contents($input_dir."/".$output_file, $html_content);

print("<br>DONE");

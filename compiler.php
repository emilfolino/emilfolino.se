<?php
require 'vendor/autoload.php';
use Michelf\Markdown;
use Sunra\PhpSimple\HtmlDomParser;

function make_index($output_file, $number_of_files=-1) {
    $input_dir = "content";
    $output_dir = "output";

    $html_content = make_head("Home");
    $html_content.= make_meny();

    $html_content.= '<main class="container">';
    $html_content.= '<h1 class="main-title-mobile">emilfolino.se</h1>';

    $files = glob("$input_dir/*.md");
    usort($files, function($a, $b) {
        return filemtime($a) < filemtime($b);
    });

    if (isset($number_of_files) && $number_of_files > 0) {
        $files = array_slice($files, 0, $number_of_files);
    }

    foreach ($files as $key => $filename) {
        $html_content.= "<article>\n";
        $html_content.= "<time datetime='" . date("Y-m-d\TH:i", filemtime($filename)) . "' class='article-date'>" . date("Y-m-d", filemtime($filename)) . "</time>";
        $html_content.= Markdown::defaultTransform(file_get_contents($filename));
        $html_content.= "</article>\n";
    }

    $html_content.= "</main>";

    $html_content.= make_foot();

    file_put_contents($output_dir."/".$output_file, $html_content);
}



function make_pages() {
    $output_dir = "output";
    $pages_dir = "pages";

    $files = glob("$pages_dir/*.md");
    foreach ($files as $key => $filename) {
        $html = Markdown::defaultTransform(file_get_contents($filename));
        $dom = HtmlDomParser::str_get_html($html);
        $title = $dom->find("h2",0)->plaintext;
        $output_file = slugify($title) . ".html";

        $html_content = make_head($title);
        $html_content.= make_meny();

        $html_content.= '<main class="container">';
        $html_content.= '<h1 class="main-title-mobile">emilfolino.se</h1>';

        $html_content.= "<article>\n";
        $html_content.= $html;
        $html_content.= "</article>\n";
        $html_content.= "</main>";
        $html_content.= make_foot();

        file_put_contents($output_dir."/".$output_file, $html_content);
    }
}



function make_head($title) {
    $str = "<!doctype html>";
    $str.= "<html>";
    $str.= "<head>";
        $str.= "<meta charset='utf-8'>";
        $str.= "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
        $str.= "<title>";
        $str.= isset($title) ? $title . " - " : "";
        $str.= "emilfolino.se</title>";

        $str.= "<link rel='stylesheet' href='style.min.css' />";
    $str.= "</head>";
    $str.= "<body>";

    return $str;
}



function make_meny() {
    $pages_dir = "pages";

    $str = "<section class='left-menu'>";
    $str.= "<h1 class='main-title'><a href='/'>emilfolino.se</a></h1>";

    $menu_items = [
        "/" => "Home",
        "archive.html" => "Archive"
    ];

    $files = glob("$pages_dir/*.md");
    foreach ($files as $key => $filename) {
        $dom = HtmlDomParser::str_get_html(Markdown::defaultTransform(file_get_contents($filename)));
        $title = $dom->find("h2",0)->plaintext;
        $slug = slugify($title) . ".html";
        $menu_items[$slug] = $title;
    }

    foreach ($menu_items as $url => $text) {
        $str.= "<a class='menu-item' href='$url'>$text</a>";
    }

    $str.= "</section>";

    return $str;
}



function make_foot() {
    $str = "</body>";
    $str.= "</html>";

    return $str;
}



function slugify($str)
{
    $str = mb_strtolower(trim($str));
    $str = str_replace(array('å','ä','ö'), array('a','a','o'), $str);
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = trim(preg_replace('/-+/', '-', $str), '-');
    return $str;
}



make_index("index.html", 10);
make_index("archive.html");
make_pages();

print("<br>DONE");

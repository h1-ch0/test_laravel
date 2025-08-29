<?php
// public/crawler.php

// $url = 'https://news.naver.com/';
$url = 'https://www.mlb.com/schedule/2025-08-31';
// $url = 'https://www.nfl.com/schedules/';    

$html = file_get_contents($url);
// $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');


libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($html);

$xpath = new DOMXPath($doc);
$doc->loadHTML('<?xml encoding="utf-8" ?>' . $html);
libxml_clear_errors();


// $headlines = $xpath->query('//a[contains(@class, "cluster_text_headline")]');
// $headlines = $xpath->query('//a[contains(@class, "cnf_news")]');
// $headlines = $xpath->query('//a[contains(@class, "gameinfo-gamedaylink")]');
$headlines = $xpath->query('//div[contains(@class, "ScheduleGamestyle")]');
// $headlines = $xpath->query('//span[contains(@class, "nfl-c-matchup-strip__date-time")]');
// <span class="nfl-c-matchup-strip__date-time"> 2:00 AM </span>

$result = [];
foreach ($headlines as $node) {
    $result[] = trim($node->nodeValue);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($result, JSON_UNESCAPED_UNICODE);

// libxml_use_internal_errors(true);

// $html = file_get_contents($url);
// $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

// $doc = new DOMDocument();


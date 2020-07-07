<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__ . '/../vendor/autoload.php';

// Assign directory locations
$dir_offenders = __DIR__ . '/../../database/offenders/';
$dir_generated = __DIR__ . '/../../database/generated/';

// Get list of filenames in `database/offenders` and remove "." and ".." files.
$filenames = scandir($dir_offenders);

if (($key = array_search(".", $filenames)) !== false) {
  unset($filenames[$key]);
}
if (($key = array_search("..", $filenames)) !== false) {
  unset($filenames[$key]);
}

// Initialize associative array to store results of json files.
$twitter_user_ids = [];
$twitter_handles = [];
$websites = [];

foreach ($filenames as $filename) {
  $url_text = file_get_contents($dir_offenders . $filename);
  $offender = Yaml::parse($url_text);
  foreach ($offender['social_media']['twitter'] as $twitter_info) {
    // user_id: handle, in `twitter_handles.json`
    $twitter_user_ids[$twitter_info['user_id']] = $twitter_info['handle'];
    // handle: uuid, in `twitter_handles.json`
    $twitter_handles[$twitter_info['handle']] = $offender['uuid'];
  }
  foreach ($offender['social_media']['websites'] as $website_info) {
    // url: uuid, in `websites.json`
    $websites[$website_info] = $offender['uuid'];
  }
}

// Write associative arrays to files as json.
$fp = fopen($dir_generated . 'twitter_user_ids.json', 'w');
fwrite($fp, json_encode($twitter_user_ids));
fclose($fp);
$fp = fopen($dir_generated . 'twitter_handles.json', 'w');
fwrite($fp, json_encode($twitter_handles));
fclose($fp);
$fp = fopen($dir_generated . 'websites.json', 'w');
fwrite($fp, json_encode($websites));
fclose($fp);

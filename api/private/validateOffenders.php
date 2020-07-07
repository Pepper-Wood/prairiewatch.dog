<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__ . '/../vendor/autoload.php';

// Assign directory locations
$dir_offenders = __DIR__ . '/../../database/offenders/';

// Get list of filenames in `database/offenders` and remove "." and ".." files.
$filenames = scandir($dir_offenders);

if (($key = array_search(".", $filenames)) !== false) {
  unset($filenames[$key]);
}
if (($key = array_search("..", $filenames)) !== false) {
  unset($filenames[$key]);
}

/*
---
uuid: 4ed9aad9-a070-4fc4-9f9c-cfd87756e72d
name: Noah Bradley
social_media:
  twitter:
    - user_id: 14428486
      handle: noahbradley
  websites:
    - noahbradley.com
counts:
  - category: rapist
    type: x
    subtype: x
    source:
      url: https://twitter.com/DaniHartel/status/1275441880868634630
      incident_time: "10:53 AM · Jun 23, 2020"
      reported_time: "before that"
      type: first-hand account
    body: Victim came forward with an accusation against Noah Bradley's predatory behavior.
*/


foreach ($filenames as $filename) {
  $url_text = file_get_contents($dir_offenders . $filename);
  $offender = Yaml::parse($url_text);

  if (!array_key_exists("uuid", $offender)) {
    echo "UUID is missing.";
  }
}

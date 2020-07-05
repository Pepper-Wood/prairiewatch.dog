<?php

use SleekDB\SleekDB;

require __DIR__ . '/vendor/autoload.php';

$dataDir =  __DIR__ . "/database";
$newsStore = SleekDB::store('offenders', $dataDir);
// An array that we want to insert.
$newsInsertable = [
  "name" => "multi-level-marketing",
  "type" => "x",
  "source" => [
    "url" => "https://s3-us-west-2.amazonaws.com/llrprod/exigo/llrAdmin/documents/LLR_Ldr_Bonus_Plan.pdf",
    "archive_url" => "https://www.google.com",
    "date" => 123,
    "type" => "company internal documentation"
  ],
  "body" => "<p>LuLaRoe utilizes a rank-based distributor bonus compensation plan. The business plan also details requirements for each rank based on the profit totals and number of LuLaRoe clothing articles sold. </p><p>The ranks also require the following distributor recruitments (For all the numbers listed below, these goals are to be met at minimum, i.e. Sponsor requires to recruit <em>at least</em> 1 new distributor and not <em>exactly</em>):</p><p>Sponsor</p><ul><li>Recruit 1 new distributor each month</li></ul><p>Trainer</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 10 distributors in your downline</li></ul><p>Coach</p><ul><li>Recruit new distributors each month</li><li>Maintain 10 distributors in your downline, where 3 are rank Trainer or above</li></ul><p>Mentor</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 6 distributors in your immediate downline, where 3 are rank Coach and the rest are rank Trainer or above.</li></ul><p>Ambassador</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 15 distributors in your immediate downline, where 10 are rank Mentor and the rest are rank Coach or above.</li></ul>"
];
$results = $newsStore->insert( $newsInsertable );
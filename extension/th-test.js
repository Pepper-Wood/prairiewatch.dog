function extractToyhouseHandle(url) {
  handleMatch = url.match(/toyhou.se\/(?:@){0,1}([a-zA-Z0-9.-]*)/);
  if (handleMatch == null) {
    return null;
  }
  if (handleMatch[1] == '') {
    return null;
  }
  return handleMatch[1];
}

var tests = [
  {
    "input"   : "https://toyhou.se/Pepper-Wood",
    "expected": "Pepper-Wood",
  },
  {
    "input"   : "https://toyhou.se/~browse/popular",
    "expected": null,
  },
  {
    "input"   : "https://toyhou.se/~forums/5867.service-reviews/109282.-psa-scammer-drawinglywillingly-drheartlock#",
    "expected": null,
  },
  {
    "input"   : "https://www.patreon.com/artbyheartlock",
    "expected": null,
  },
  {
    "input"   : "https://toyhou.se/KilljoyLights",
    "expected": "KilljoyLights",
  },
  {
    "input"   : "https://toyhou.se/KilljoyLights/stats",
    "expected": "KilljoyLights",
  },
  {
    "input"   : "https://toyhou.se/Pepper-Wood/stats",
    "expected": "Pepper-Wood",
  }
];

for (var i = 0; i < tests.length; i++) {
  result = extractToyhouseHandle(tests[i]["input"]);
  if (result != tests[i]["expected"]) {
    console.log("❌ : " + tests[i]["input"]);
    console.log("  Expected : " + tests[i]["expected"]);
    console.log("  Received : " + result);
  } else {
    console.log("✅ : " + tests[i]["input"]);
  }
  console.log("");
}

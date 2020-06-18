// API call to GET JSON from url.
function getJSONP(url, success) {
  var ud = '_' + +new Date,
    script = document.createElement('script'),
    head = document.getElementsByTagName('head')[0] || document.documentElement;

    window[ud] = function(data) {
    head.removeChild(script);
    success && success(data);
  };

  script.src = url.replace('callback=?', 'callback=' + ud);
  head.appendChild(script);
}

// Main
console.log("Inside websites.js");
baseUrl = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/api/";
if (window.location.hostname == "twitter.com") {
  getJSONP(baseURL + "twitter.json", function(data) {
    console.log(data);
    document.body.style.border = "5px solid blue";
  });
} else {
  getJSONP(baseURL + "websites.json", function(data) {
    console.log(data);
    document.body.style.border = "5px solid red";
  });
}
console.log("End of websites.js");


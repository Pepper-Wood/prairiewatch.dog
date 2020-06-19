function httpGetAsync(theUrl, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", theUrl, true); // true for asynchronous 
    xmlHttp.send(null);
}

// Main
/*
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
*/


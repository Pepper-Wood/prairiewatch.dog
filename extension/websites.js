baseUrl = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/api/";
if (window.location.hostname == "twitter.com") {
  fetch(baseUrl + "twitter.json")
    .then(response => response.json())
    .then(json => console.log(json));
} else {
  fetch(baseUrl + "websites.json")
    .then(response => console.log(response))
    .then(json => console.log(json));
}

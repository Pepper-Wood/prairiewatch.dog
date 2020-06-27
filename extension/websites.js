if (window.location.hostname == "twitter.com") {
  var links = [];
  $('article a').each(function() {
    links.push(this.href);
  });
  console.log(links);
  fetch("http://localhost:9090/v0/offenders/twitter", {
    // mode: 'no-cors',
    method: 'GET',
    headers: {
      Accept: 'application/json',
    },
  },
  ).then(response => {
    if (response.ok) {
      response.json().then(json => {
        console.log(json);
      });
    }
  });
} else {
  fetch("http://localhost:9090/v0/offenders/websites", {
    // mode: 'no-cors',
    method: 'GET',
    headers: {
      Accept: 'application/json',
    },
  },
  ).then(response => {
    if (response.ok) {
      response.json().then(json => {
        console.log(json);
      });
    }
  });
}

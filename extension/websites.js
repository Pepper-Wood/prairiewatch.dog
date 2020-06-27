if (window.location.hostname == "twitter.com") {
  fetch("http://localhost:9090/offenders/twitter", {
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
  fetch()
    .then(response => response.json())
    .then(json => console.log(json));
} else {
  fetch("http://localhost:9090/offenders/websites", {
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

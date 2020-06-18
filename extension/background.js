if (typeof chrome !== 'undefined') { browser = chrome}

function fetchDict() {
    let req = new Request( "https://www.remote-dictionary.com/dict.json", {
        method: 'GET',
        headers: { 'Accept': 'application/json' },
        redirect: 'follow',
        referrer: 'client'
    });

    fetch(req).then(function(response) {
        // .json returns another promise
        return response.json();
    }).then(function(data) {
        browser.storage.local.set({data: data}); // set storage for content-script
  }).catch(error => { console.log(error); });
}

fetchDict();
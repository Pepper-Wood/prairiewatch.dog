// TODO - rename to tagTwitterHandles()
// TODO - replace references of "username" to "handle"
function extractTwitterUsernames() {
  $("a").each(function() {
    // Extract username from a link
    // ex: https://twitter.com/prairiewatchdog -> prairiewatchdog
    var usernameMatch = this.href.match(/twitter.com\/(?:@){0,1}(\w*)/);
    if (usernameMatch == null) {
      return;
    }

    if (usernameMatch[1].toLowerCase() !== "lularoe") { // TODO - expand to check against the full list
      return;
    }

    // To prevent tagging unrelated elements of the Twitter page, styling is only applied
    // to elements where the innerText contains the @username returned from the parsed link.
    if (this.innerText.includes("@" + usernameMatch[1])) {
      if (!$(this).next().hasClass("twitter-card")) {
        // TODO this is based on what the details return + the forgiveness algorithm
        let counts = 14;
        let primaryOffense = "MLM";
        let pwdLink = "https://prairiewatch.dog/";
        $(this).after(`
          <div class='twitter-card'>
            <p>This account is tagged with ${counts} count(s) of ${primaryOffense}.</p>
            <p><a target='_blank' href='${pwdLink}'>Learn more.</a></p>
          </div>
        `);
      }
    }
  });
}

window.setInterval(extractTwitterUsernames, 3000);
console.log("PWD: TWITTER.JS");

function extractTwitterHandle(url) {
  let handleMatch = url.match(/twitter.com\/(?:@){0,1}(\w*)/);
  if (handleMatch == null) {
    return null;
  }
  if (handleMatch[1] == '') {
    return null;
  }
  return handleMatch[1].toLowerCase();
}

function tagTwitterHandles(twitter_offenders) {
  $("a").each(function() {
    let handle = extractTwitterHandle(this.href);
    if (handle == null) {
      return;
    }

    if (!twitter_offenders.hasOwnProperty(handle)) {
      return;
    }

    // To prevent tagging unrelated elements of the Twitter page, styling is only applied
    //   to elements where the innerText contains the @username returned from the parsed link.
    if (this.innerText.toLowerCase().includes("@" + handle)) {
      if (!$(this).next().hasClass("pwd-pulse")) {
        let offender_slug = twitter_offenders[handle];
        $(this).after(`<a target='_blank' href='https://prairiewatch.dog/${offender_slug}' class="pwd-pulse">!</a>`);
      }
    }
  });
}

// Retrieve twitter offenders JSON.
$.getJSON( "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/main/data/twitter.json", function(twitter_offenders) {
  // Repeat tagging every 3 seconds.
  window.setInterval(function(){ tagTwitterHandles(twitter_offenders); }, 3000);
});

console.log("PWD: TOYHOUSE.JS");

function extractToyhouseHandle(url) {
  let handleMatch = url.match(/toyhou.se\/(?:@){0,1}([a-zA-Z0-9.-]*)/);
  if (handleMatch == null) {
    return null;
  }
  if (handleMatch[1] == '') {
    return null;
  }
  return handleMatch[1].toLowerCase();
}

function tagToyhouseHandles(toyhouse_offenders) {
  $("a").each(function() {
    let handle = extractToyhouseHandle(this.href);
    if (handle == null) {
      return;
    }

    if (!toyhouse_offenders.hasOwnProperty(handle)) {
      return;
    }

    let offender_slug = toyhouse_offenders[handle];
    $(this).after(`<a target='_blank' href='https://prairiewatch.dog/${offender_slug}' class="pwd-pulse">!</a>`);
  });
}

// Retrieve toyhouse offenders JSON.
$.getJSON( "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/data/toyhouse.json", function(toyhouse_offenders) {
  // Toyhou.se loads everything at once, so no need for repeated checking.
  tagToyhouseHandles(toyhouse_offenders);
});

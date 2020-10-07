console.log("PWD: WEBSITES.JS");

function tagWebsiteWithHeader(offenders_urls) {
  let current_url = window.location.href.toLowerCase();
  // Iterate over attributes in JSON object.
  for (const [offender_url, offender_slug] of Object.entries(offenders_urls)) {
    if ((current_url.includes(offender_url)) || (current_url === offender_url)) {
      $(`
        <div class="pwd-header">
          <span class="pwd-pulse">!</span>
          This page is flagged. Check out <a target='_blank' href='https://prairiewatch.dog/${offender_slug}'>prairiewatch.dog/${offender_slug}</a> for more info.
          <span class="pwd-header-close" aria-label="Close" aria-hidden="true">&times;</span>
        </div>
      `).appendTo("body");

      // Set click functionality after element is added to the page.
      $(".pwd-header-close").click(function() {
        $(".pwd-header").hide();
      });

      // Return early; only one flagged url is needed for creating a tagged header.
      return;
    }
  }
}

$.getJSON( "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/data/websites.json", function(offenders_urls) {
  tagWebsiteWithHeader(offenders_urls);
});

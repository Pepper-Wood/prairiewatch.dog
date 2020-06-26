I'm going to use this post as my devlog that I update every day with the time spent each day + my tasks and TODO.

## Day 1 - June 10th, 2020
#### Time: 1 hour 12 min. Roughly timed using 2 Pomodoros.
- Initialize the API data with a couple of MLMs
  - 1 JSON for connecting twitter to listing results
  - 1 JSON for connecting websites to listing results
  - 1 JSON for listing results
  - (I also added `blanket-categories.json` for linking between "category" and general information pages)
- Created initial json files `blanket-categories.json`, `listings.json`, `twitter.json`, and `websites.json`. The first entry I've started adding to them is LuLaRoe. I also made `category-is-mlm.md` to serve as a blanket post for information about MLMs in general, containing text from r/antiMLM. Other MLMs added to these listings should also link back to this page. I also want to flesh out the information about LuLaRoe with greater specifics as to their issues, i.e. earnings reports links.
- I started looking into web frameworks. My initial idea was to use Angular for familiarity reasons, but the MLM listing site is written in nuxt.js and wanted to check it out. I will make the start to setting up the website another day and will spend the rest of my time generating the Twitter mockup.
- Added rough mock for the alert on Twitter feed. It's not perfect. I should use "User Crowd" for feedback!

# Day 2 - June 11th, 2020
#### Time: 3 hours. Roughly timed using 2 Pomodoro but was unfocussed.
- Adjusted Figma mocks and included super rough top tag for website.
- Generated Angular website skeleton with 2 components: HomeComponent for the front page and EntryComponent for the company / user felon listing.
- I'm not sure how to handle the URLs. Slugs seems like the best plan so that there's identifying info in the URL. Maybe instead of UUIDs it should be shorter alphanumeric, like:
  - https://prairiewatch.dog/entry/aB12Cd
  - https://prairiewatch.dog/entry/aB12Cd/lularoe
    - Both of these should work

An aside: I realized after yesterday's session, when looking up LuLaRoe information, that libel and defamation lawsuits could be possible based on the text provided here. https://blog.lulu.com/2018/07/05/the-dos-and-donts-of-how-to-avoid-a-defamation-lawsuit-as-an-author/ Reading this, the key takeaway is that the claims need to be properly sourced. Referring to LuLaRoe as a pyramid scheme is inaccurate. The page about MLMs should explain the correllation between the two and let the reader come to the conclusion. I wonder if there's a text linter for sourcing facts?

- Spent over an hour troubleshooting the angular static site in docs. It's due to an issue with the custom domain name conflicting with the base href tag. Possible tutorial: https://shermandigital.com/blog/deploy-an-angular-cli-application-to-github-pages-with-a-custom-domain/

# Day 3 - June 12th, 2020
#### Time: 1h 30m hours, ~2 pomodoros
- Fixed angular build command to work with the custom domain. Followed: https://medium.com/@ole.ersoy/deploying-your-angular-application-to-github-pages-3781727779e1 and updated the README in the website folder
- Fixed another issue with the GH angular pages. The solution was to duplicate index.html and rename as 404.html. This will have to be added as part of the manual build process.
- Updated the splash page. Not really in a UI mood since there's not much in the way of solid prototypes. I'd love to do something jazzier, but this will do for now.

# Day 4 - June 13th, 2020
### Time: 3 hours
- Added Google Analytics tag
- Added 'make web-build' command for updating the Angular build from the root directory
- Makefile also now creates the CNAME file if it's missing, to finally resolve the issues with that getting wiped out for GitHub pages.
- Added ngx-markdown following https://medium.com/@david.dalbusco/add-a-blog-to-your-angular-website-using-markdown-files-31cdb0627bdd and the install instructions at https://jfcere.github.io/ngx-markdown/get-started. This also required updating the angular and typescript dependencies
- Created CategoryComponent that will navigate to a markdown file, which will be used for showing the category information pages. For now, i.e., the MLM category info can be viewed at https://prairiewatch.dog/c/12345, where 12345.md is the markdown file.

# Day 5 - June 14th, 2020
### Time: 2 hours
- Updated `category` component to `offense`. I'll need to still refactor it so that there's a way to see the full list of offenses on the left hand-menu and selecting a sub-category will give the information. Maybe like the search bar that appears on the Bootstrap documentation?
- Tweaked the front page of the website. Mostly just thinking about laying it out. There's still other stuff that needs to be done that I need to set up before linking it to this page.
- Enabled dependabot and configured a `dependabot.yml` to check for dependencies in both `/website` and `/extension`.
- Reverted changes in `extension/` since re-running `yarn` resulted in build failures.
- Added note for tomorrow about replacing the `extension/` boilerplate with work based on what the Mozilla examples show. Hopefully this will allow for it to become cross-browser compatible.

# Day 6 - June 15th, 2020
### Time: 2 hours programming, 2 hours creating tweet personas in the Figma mocks
- Updated the text of the `multi-level-marketing.md` category page so that it has the start of a template and a list of offenses that can be directly tied to the category.
- Added a complete count against LuLaRoe based on its internal ranking structure depending on recruitment numbers. Parsing that is crazy, and I'm not sure if it's totally accurate. It certainly gets the point across. I'm wondering how I can find someone to cross-reference these findings and help to grok the language.
- Added 2 entries for Cameron Stewart, based on a tweet that came across my feed.

It's only the morning so far, and this has already raised questions about some things I still need to figure out how to handle that aren't technical.
- Thinking on this more, maybe it's a matter of setting a points scale? How does the weight of anonymous reports come in affect the result?
  - Assume John is a predator, and 10 women have come forward with accounts of sexual assault. 1 woman has DNA proof, 3 have digital proof (i.e. text message screenshots), 6 have first-hand accounts. What a depressing math problem.
  - The point value ascribed to each count is based on the severity of the crime and the source provided.
  - I just realized this is like a sales health score but with crime.

I'm definitely rusty with researching, or maybe that's just the LuLaRoe lingo getting to me. Also, the more I think about it, I guess this will be writing my own legislature. I established that court rulings may not be the moral end. Does this open up a can of worms?
- I will think on this more, but I feel more confident about it. 

Ended up spending yesterday evening playing around in Figma trying to replicate Twitter for mocks.

# Day 7 - June 16th, 2020
### Time: 1 hr 40 min, 3 full pomodoros
Resuming work on this at 10:20pm lol. Much later start than the other days. Also, nice! 1st week in the bag.

Copying from commits:
- Added `annotate-page` from `https://github.com/mdn/webextensions-examples`
- Switched from `annotate-page` example to `borderify`
- Super simple prototype set up 🙌
- Initial (failing) implementation to make GET requests to the JSON files I have stored in the `api/` master branch folder.
- Fixed the Karma/Jasmine angular tests in `website/` after running `ng test`. They were all failing due to needing RouterTestingModule to be imported into each component test spec, i.e. `home.component.spec.ts`. Tests passing will allow me to continue going through Dependabot's PR updates.

Helpful list of references:
- Where it all started: https://dev.to/vinceumo/cross-browser-extensions-with-webextensions-api---101-40hj
  - Link at the top of the page is broken and should be https://vinceumo.github.io/devNotes/Javascript/webextensionapi/
- I downloaded web-ext too. I did it globally, then deleted to install locally, then deleted and reinstalled globally (there's a ridiculous number of npm packages used): https://extensionworkshop.com/documentation/develop/getting-started-with-web-ext/
  - https://github.com/mozilla/web-ext
- https://developer.mozilla.org/en-US/docs/Mozilla/Add-ons/WebExtensions/Examples
- https://stackoverflow.com/questions/2499567/how-to-make-a-json-call-to-a-url/2499647#2499647
- https://towardsdatascience.com/using-github-pages-for-creating-global-api-76b296c4b3b5

Stopping for now at 11:42pm. Next step is to try out the answer proposed in this stack-overflow: https://stackoverflow.com/questions/57410668/webextension-access-json-dictionary-from-external-url-how
This would use background.js to cache the results of the API in the browser and then use content.js to use that as the reference.
I also still need to ensure that this extension is cross-browser compatible. Luckily, it's super small at the moment and entirely vanilla.

# Day 8 - June 17th, 2020
### Time: 40m, 1.5 pomodoros

- Bump @types/jasmine from 3.3.16 to 3.5.10 in /website #16
- Bump @angular/cli from 10.0.0-rc.3 to 10.0.0-rc.5 in /website #22
- Very briefly started up again updating the vanilla js in the chrome extension. Seeing https://stackoverflow.com/questions/247483/http-get-request-in-javascript for setting up proper API calls (using a test API before making that full implementation committment), it just feels... wrong. Like there's gotta be easier ways. Started looking into webpack; not sure how that fits in.

URL for testing API call handling: https://jsonplaceholder.typicode.com/

# Day 9 - June 18th, 2020
### Time: 3h, used 1 pomodoro

Writing this summary 2 days later. I went down a rabbit hole to try again with setting up an angualr-based framework for the chrome extension. But after working with it for a while, I realize it'll be total overkill for what's needed. The angular part would make more sense if the UI the user navigates to is a browser-stored webpage. But since I'm using prairiewatch.dog instead, then it's not necessary. Totally basic, vanilla browser extension it is.

I added jQuery too and tried to set up an API call to GET https://jsonplaceholder.typicode.com/todos/1, but it fails with no error message printed.

- https://developer.mozilla.org/en-US/docs/Mozilla/Add-ons/WebExtensions/Build_a_cross_browser_extension
- Downloaded https://www.npmjs.com/package/chrome-ext-downloader to view similar chrome extensions

# Day 10 - June 20th, 2020
### Time: 2 hours

Took yesterday as a day off. I'm and fully motivated today. Twitter has had a sudden trend of sexual assault victims coming forward. It's helped to push me to keep moving forward.

- I have a working demo for the chrome extension that fetches from a URL!! I realize now I need to build up an API more so that it could be more like:
GET https://prairiewatch.dog/api/v1/search?type=twitter&q=LuLaRoe
GET https://prairiewatch.dog/api/v1/search?type=url&q=lularoe.com

# Day 12 - June 22nd, 2020
### Time: 4 hours

I didn't get to add a Devlog yesterday, and I'm blanking on what I did. I think I was spending yesterday researching into working on the API and how to construct it. I've decided to utilize the free website I have with Acquia as the backbone. I still want the front-end to be GitHub pages so that as much of it can be open source as possible. I'm unsure and confused about how to manage the back and forth of these three platforms, and how to better coordinate with this monorepo.

In the meantime, for today:
- Mulled over how to go about storing the public, open-source database and how to migrate what I can to an API. The decision is to have merges to master fire off a call on the PHP-side to pull in the changes and update the databases necessary. Not sure how that's gonna work out; how to figure out parsing the diff for changes.
- Spent some time side-tracked with Twitter IDs. Twitter associates accounts with a user_id that's a long integer. i.e., Pepper__Wood the username correlates to 777173630316785664 the user_id. I started writing a script for parsing the user_id out of it when Tyler reminded me I could use the API. I'm holding off, since the purpose of this would be to capture users who change their usernames without needing to manually retag them. I'll need to move this to the later TODO, as it is much nicher use cases vs. still needing to tackle the beast.
- http://api.prairiewatch.dog is on the Acquia prod site, while https://prairiewatch.dog is still on GitHub pages.
- Started an OpenAPI specification for the to-be-implemented GET endpoints. These will be implemented on the PHP website.

# Day 13 - June 23rd, 2020
### Time: 1 hour
- Added Swagger UI documentation page to the angular website following this stack-overflow: https://stackoverflow.com/questions/44894013/adding-swagger-ui-to-angular-app
  - Use this gist to point me in the direction to use Swagger UI: https://gist.github.com/oseiskar/dbd51a3727fc96dcf5ed189fca491fb3

# Day 14 - June 25th, 2020
### Time: 3 hours
- Taking a break from other implementations to work on the API. The spec is now out-of-date as I realized:
  - resorting to UUIDs seems to be the best modern method. The UUIDs don't need to be exposed for page views or in the URLs and will be used for just associating between social media profiles and offender information
  - GET /offenders/twitter is the new pattern instead of GET /offenders?site=twitter
- I haven't added the startup command, but the path is:
```
cd api/phptesting
php -S localhost:8080 -t public public/index.php
```

The URL is not secure, so API tests are against http://localhost:8080/offenders/twitter

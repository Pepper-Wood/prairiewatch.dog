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

# Day 15 - June 26th, 2020
### Time: 1.5 hours
- Updated API error handling
- Updated OpenAPI spec to match the refactored results
- Added Makefile build shortcut
- fetch() was returning `Unexpected end of JSON input`, and I falsely assumed that's because I needed to wrap the results like:
```
{
  "offenders": [
    {
      "lularoe": "12345-12-12-123456"
    }
  ]
}
```
(The spec has not been updated for this change)
- The actual root cause is that CORS needs to be set up for these localhost calls: https://stackoverflow.com/questions/49974346/error-syntaxerror-unexpected-end-of-json-input-when-using-fetch
  - I started following http://www.slimframework.com/docs/v4/cookbook/enable-cors.html but didn't get the initial attempt to work and will need greater brain power tomorrow

Tomorrow, I should get CORS set up and then read up on better API design. I've changed the version of the API to 0.1.0 and v0 in the base URLs for the time being, even though this isn't live anyway. Starter reading: https://swagger.io/blog/api-design/api-design-best-practices/

# Day 16 - June 27th, 2020
### Time: 6.5 hours
- Updated the API php file with CORS so the fetches now work as expected.
  - I got thrown for a loop just because I had added `/v0/` in front of the domains but didn't follow up with updating other references to these URLs in the extension and in my Postman.
- Originally looked into BotSentinel's `background.js` for insight but instead downloaded https://github.com/jakubgarfield/extract-twitter-username-chrome to investigate possible solutions for detecting offenders on Twitter.
- Still not sure how to go about tagging them. Twitter does not use IDs for identifying sections, so detecting which tweet belongs to a user and then appending the label after is still a mystery.
  - The `extract-twitter-username-chrome-master` will return the list of usernames, but maybe that same function should use the JavaScript elements they're already pointing to and make the tag there?
- I did the above bullet point, and that was exactly it! I have it hard-coded to tag LuLaRoe, and the username shows with a red background both on tweets and also in user mentions (i.e. @lularoesupport tagged @lularoe in their profile, and it showed red there too).

Next steps are to put two and two together: the API results should first be what's informing what gets tagged, and then it's onto figuring out what these tags should say. Additionally, I'll have to look into caching strategies for these API results so I'm not fetching LuLaRoe's information every single time (along with caching the initial results of which users to tag).

Or should this go the route of a generic tag like how Bot Sentinel has it, and the user has to click for it to load with the information? Read in the Bot Sentinel code that chrome's cache doesn't have a lot of available memory. I'm wondering how that'll play out.

- Updated styling of how the tag shows up on Twitter. Still some styling tweaks I'd want to do to it. The banner with the full text gets the point across but is more appropriate when tagged to tweets vs. tagged to mentions in bios. I'm thinking of a little red icon that gives off signal waves for abbreviated use and also to add to the longer tag.

# Day 17 - June 28th, 2020; Day 18 - June 30th, 2020
### Time: 6+ hours for the 17th, 8+ hours for the 18th
PR encompasing both of these days: https://github.com/Pepper-Wood/prairiewatch.dog/pull/29

Lost track of time, so I'm combining the two days. I took yesterday off because I ended up burning out from the work done over the weekend. I had a good time doing it; just got overloaded and needed to vibe.

Because one of the Dependabot PRs merged in caused the tests to fail, I decided to expedite getting GitHub Actions set to up to automatically test the PRs. Encountered these problems and solutions:
- **Problem:** ERROR in TypeError: tooling_1.constructorParametersDownlevelTransform is not a function (this is what the original `ng test` error was). **Solution**: https://stackoverflow.com/questions/62586650/constructorparametersdownleveltransform-is-not-a-function-in-angular
- Used this repo as a reference for how I needed to update `npm test` and `npm e2e` setup to fix the other results: https://github.com/filipesilva/ng-github-actions
- **Problem**: Module not found: Error: Can't resolve 'path' in '/project-name/node_modules/swagger-ui-dist'. **Solution**: https://github.com/swagger-api/swagger-ui/issues/4719

There was also a whole rigamarole getting the GitHub Actions to only perform based on the files changed. There's a lot of actions available for tagging based on files changed paths (I'm using https://github.com/actions/labeler) but none that obviously pointed to setting up separate workflows for each of the repos. `push` events do not contain any information about the current PR, meaning that steps to:
- get the PR number
- make an API call to GitHub to get the labels attached
- save this result as an artifact
- in subsequent jobs, pull down this artifact
- set up separate `if:` for all of the jobs based on this variable
would all have to be put into one entire workflow file.

The actual answer is that the `push` and `pull_request` actions (the latter of which is for PR related events like editting the description and adding labels, not commits in a PR) can be filtered on paths:
```
on:
  push:
    paths:
    - 'api/**'
```
So now there's a separate workflow for each section. I'll definitely add more labels and actions for when Offenses' and Offenders' markdown files get added/updated.

# Day 19 - July 1st, 2020
### Time: 30min
Shorter day today again, given work done yesterday and then over the weekend.
- Renamed flows such that each repo has a `test.yml` file and eventually a `deploy.yml` file for these two build scenarios. Only `website-deploy.yml` exists at the moment.
- Investigated what `website-deploy.yml` needs in order to run. Looking at these pages as a reference to check back on tomorrow:
  - https://github.com/JamesIves/github-pages-deploy-action
  - https://github.com/MichaelCurrin/code-cookbook/blob/20a73856cb3618b3f7ef166063745484313e1d74/recipes/ci-cd/github-actions/workflows/deploy-gh-pages/github-pages-deploy.md

# Day 20 - July 2nd, 2020
### Time: 6 hours
Made up for lost time with more debugging the workflow for Angular website deployments.
- Spent most of it trying to get https://github.com/AhsanAyaz/angular-deploy-gh-pages-actions to cooperate but kept running into separate issues (most of which were filed as issues). Abandoned when I was getting repeated 'rsync' failures without seeing an indication as to why I was running into it.
- `wesite-deploy.yml` instead has steps that run the npm build command, replicated shell commands to copy index.html -> 404.html and to re-add the CNAME (there's definitely a way to store that in assets and pull that out instead, but for now it's going to echo "https://prairiewatch.dog" into a new file).

# Day 21 - July 3rd, 2020
### Time: 2.5 hour
Migrated notes from TODO:
- UUID generator: https://www.uuidgenerator.net/
- Figma mockup edit link: https://www.figma.com/file/K3bzNxMlhj7dKZos7wS6m3/prairiewatch.dog?node-id=0%3A1
- UserCrowd: https://usabilityhub.com/

- Made a Trello board: https://trello.com/b/FqAaWnbE/prairiewatchdog
  - Eventually, I'll migrate to using GitHub's project board. For now, I want something that doesn't eat up the issue numbers and messes me up with lots of tasks that are more set in stone.
  - I made this due to feeling... a bit aimless after finally getting the website part of the GitHub Actions set up. I'm not sure where I should focus the next steps.
- Migrated the listing in TODO to there.
- Tried figuring out how to structure the data in this database. I think next steps should be that I start to populate more of it so I get a better grasp of scaling and connecting all the parts.

# Day 22 - July 4th, 2020
### Time: 2 hours
Spent time on-and-off rearranging the API folder and trying to add in https://sleekdb.github.io/:

> SleekDB - A NoSQL Database made using PHP

I'm writing this devlog the next day, and I've come to the conclusion it's not necessarily suited for what I'm thinking of setting up. I was hoping that the structure that the SleekDB results in would be easy for transferring between a `database/` folder to the JSON database structure. However, realizing that the resulting JSON is flattened and hidden as `1.json` and also has other structures that get generated, I don't think it's possible to edit those files directly in a way that's user-friendly for now.

Re-looked at up-for-grabs.net's database - my initial inspiration - where each offender would be stored as a separate yaml file. My plan would be something like:
- `database/offenders/` contains separate yml files for each culprit. Maybe they have to be named with the UUID? Maybe the filename is a slug that gets ignored or just used for URL purposes?
- The yaml files are somehow transformed into the needed database store for the PHP API.
- `database/offenses/` contains markdown files pertaining to the offenses that can be listed. Maybe they should be yaml just for consistency, but I'm not sure.

# Day 23 - July 5th, 2020
### Time: 3 hours
Another scattered day. Tomorrow, I'm going to try to have the time spaced out and follow pomodoros again so that I'm getting accurate hours instead of on-again-off-again working on this.

Read these pages and refactored the API Spec to follow these guidelines:
- https://swagger.io/blog/api-design/api-design-best-practices/
- https://www.vinaysahni.com/best-practices-for-a-pragmatic-restful-api
- https://stackoverflow.blog/2020/03/02/best-practices-for-rest-api-design/
- https://www.merixstudio.com/blog/best-practices-rest-api-development/

Result:
- GET /offenders with provided twitter and url parameters will return offender entries that match the criteria, empty array if there are no matches
  - GET https://api.prairiewatch.dog/v0/offenders?twitter=pepper__wood,lularoe
  - GET https://api.prairiewatch.dog/v0/offenders?url=https%3A%2F%2Fwww.redbubble.com%2Fi%2Ft-shirt%2FQuarantine-Frog-6-feet-apart-or-6-feet-under-this-is-a-threat-by-ReBoxxen%2F49299215.IJ6L0.XYZ
- GET /offenders/{uuid} returns the offender information
  - GET https://api.prairiewatch.dog/v0/offenders/4ed9aad9-a070-4fc4-9f9c-cfd87756e72d
- I added but then removed this spec: GET /offenders/{uuid}/counts would only return the counts, but this should be how the GET /offenders result is returned.

Errors should be restructured as:
{
  "error": {
    "status": 404,
    "message": "heyo"
  }
}

These calls are making file_get_contents() to the hosted GitHub yml files. For now, when an entry is added, a row for the websites and social media listings will need to be manually updated and tagged with the UUID for the offender.

The API needs to be refactored to make use of classes. There's a good amount of repeat code that should be simplified where the `index.php` has the list of API calls made and that fetches from some other class. We also need a folder for cron and a way to update the twitter handle listing based on user_id.

# Day 24 - July 6th, 2020
### Time: 1.5 hours
- Set up potential PHP cron files for assembling the other JSON data structures:
  - `api/private/regenerateDatabase.php`
  - `api/private/validateOffenders.php`

https://json-schema-everywhere.github.io/yaml recommended to use http://rx.codesimply.com/ for YAML validation, but the PHP repo hasn't been updated in 8 years.

# Day 25 - July 7th, 2020
### Time: 1 hour
Wow, 25% of the way there 🎉 Don't know if this is cause to celebrate; I don't have a timeline for expected features coming out, so this doesn't necessarily mean I'm 25% of the way done with setting up the functionality.

Tried using https://github.com/23andMe/Yamale to get that set up. There doesn't seem to be a way for array results. I have the regexes set up for the UUID v4 and the atomic date string format.

# Day 26 - July 8th, 2020
### Time: 4 hours 15 minutes
- Done: (1.5 hours) Based on yesterday's notes, I sat down and figured out roughly what steps will be needed to complete "Phase 1" in my mind, which should set up the basic parts of the monorepo in order for the chrome extension to tag users on Websites and Twitter.
- Done: Create label filtering for "database"
- Done: (1 pomodoro + 15min) Research standardized way to archive links and add that to the structure
- (1 pomodoro) Meandered with trying to update the PHP part of https://github.com/rjbs/Rx before realizing that there's more work for revitalizing this than I will dedicate. The PHP work is from 2012, and I'm not confident enough in my own PHP skills to modernize it and remove the deprecated calls. Because the YAML validator is a part of the GitHub Actions process and not bound to a framework, I will find whatever is most complete and run it in the GHA container.
- IN PROGRESS: (4 pomodoros) Add GitHub Action for validating the schema for offender files
  - Spent over an hour getting https://hitchdev.com/strictyaml, but it's not satisfactory due to yaml validating failing at the first error and stopping (vs. checking the whole file and reporting back)
  - Found 2 github actions in the marketplace as alternatives:
    - `yaml-lint`: https://github.com/marketplace/actions/yaml-lint
    - `yaml-validate`: https://github.com/JKarwatka/validate-yaml-schema-action
      - This uses https://github.com/ketanTechracers/schema-validator under the hood, which uses https://github.com/eivindfjeldstad/validate under the hood
      - `schema-validator` is not up to the level of detail I need. I can only specify really if fields are strings and required, but I want to also ensure that regex validation is also checked
      - `validate` does have the option for regex validation, but I've continuously run into `ERROR : RangeError: Maximum call stack size exceeded` errors without line numbers. This might be a result of trying to run the below (validateSchema is from `schema-validator` and is checking a yml file against a Schema() obj), and the file/object types are clashing:
```js
validateSchema('small-test.yml', {
  schemaObj: user
})
```

# Day 27 - July 9th, 2020
### Time: 2.5 hours
- Done: Add GitHub Action for validating the schema for offender files
  - I conceded to https://github.com/ketanTechracers/schema-validator as the most complete validator for linting all issues with a file. It does not do regex validations (yet, maybe). I created another meta ticket based on an open issue that will allow parent fields to be marked optional but then allow their children to be required if the parent exists.
- The 2 existing offenders had their listings updated to remove placeholder text, and I continued to update the text in the offenses listings. Despite seeing multiple tweets stating that a number of women came forward against Noah Bradley, I was not able to find any of their accounts from searching today. I have his own confession logged as a count, at the least.
- Nice. This also closed out: "Standardize offender yaml structure. Touch up existing offenders."

# Day 28 - July 10th, 2020
### Time: 2.5 hours

Took some trial and error, but the @eekdipippo.dev site was able to run the current API code! No changes were made to this repo, but I'm planning for tomorrow to set up the automated process for /api deployment.


# Day 29 - July 11th, 2020
### Time: ???

- Reference for pulling the API folder into the `acquia-api` branch https://stackoverflow.com/questions/17999851/git-copy-a-folder-from-master-branch-to-another-branch
- Reference for pushing from origin:acquia-api to acquia:master https://stackoverflow.com/questions/5423517/how-do-i-push-a-local-git-branch-to-master-branch-in-the-remote

- Ran `git remote add kathryntest git@github.com:Pepper-Wood/TestRemote.git` for testing with pushing to a remote without messing up the acquia remote history.


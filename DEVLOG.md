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
### Time: 2 hours
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

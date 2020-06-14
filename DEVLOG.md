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
#### Time: X hours, ~X pomodoros


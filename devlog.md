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

## TODO
UUID generator: https://www.uuidgenerator.net/
Figma mockup edit link: https://www.figma.com/file/K3bzNxMlhj7dKZos7wS6m3/prairiewatch.dog?node-id=0%3A1

- Tweak mockups.
- Send okayish initial drafts to UserCrowd after the splash page on the website is complete.
- Initialize the PWD website using angular. The website needs to have the following:
  - The front page is a mock of what the tool does
  - It should allow for email submissions to keep updated on progress
    - https://mailchimp.com/help/add-a-signup-form-to-your-website/
  - A test page for a form submission similar to what a user might type in
  - A test page for connecting a result from the extension to the API

- Update LuLaRoe `listings.json` entry with specifics like the earnings report.
- Create `facebook.json` for facebook pages later on when the proof-of-concept is better in place
- Add more MLMs

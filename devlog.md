I'm going to use this post as my devlog that I update every day with the time spent each day + my tasks and TODO.

## Day 1 - June 10th, 2020
#### Time: 1 hour
- Initialize the API data with a couple of MLMs
  - 1 JSON for connecting twitter to listing results
  - 1 JSON for connecting websites to listing results
  - 1 JSON for listing results
  - (I also added `blanket-categories.json` for linking between "category" and general information pages)
- Created initial json files `blanket-categories.json`, `listings.json`, `twitter.json`, and `websites.json`. The first entry I've started adding to them is LuLaRoe. I also made `category-is-mlm.md` to serve as a blanket post for information about MLMs in general, containing text from r/antiMLM. Other MLMs added to these listings should also link back to this page. I also want to flesh out the information about LuLaRoe with greater specifics as to their issues, i.e. earnings reports links.

## TODO
- Initialize the PWD website using angular. The website needs to have the following:
  - The front page is a mock of what the tool does
  - It should allow for email submissions to keep updated on progress
  - A test page for a form submission similar to what a user might type in
  - A test page for connecting a result from the extension to the API

- Update LuLaRoe `listings.json` entry with specifics like the earnings report.
- Create `facebook.json` for facebook pages later on when the proof-of-concept is better in place
- Add more MLMs

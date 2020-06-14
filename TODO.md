## TODO
UUID generator: https://www.uuidgenerator.net/
Figma mockup edit link: https://www.figma.com/file/K3bzNxMlhj7dKZos7wS6m3/prairiewatch.dog?node-id=0%3A1
- https://usabilityhub.com/

- Tweak mockups.
- Send okayish initial drafts to UserCrowd after the splash page on the website is complete.
- PWD website also needs a blog component! Or the general pages component for blanket information.
- Initialize the PWD website using angular. The website needs to have the following:
  - The front page is a mock of what the tool does
  - It should allow for email submissions to keep updated on progress
    - https://mailchimp.com/help/add-a-signup-form-to-your-website/
  - A test page for a form submission similar to what a user might type in
  - A test page for connecting a result from the extension to the API

- Update LuLaRoe `listings.json` entry with specifics like the earnings report.
- Create `facebook.json` for facebook pages later on when the proof-of-concept is better in place
- Add more MLMs
- Migrate documentation for working in this repo to the wiki

## Other thoughts
I don't want to do automation at this stage of the game. It's also a bit trickier with the fact this is a monorepo for now. In the future, when PRs are more focussed on individual features instead of touching everything at once, being able to label the PR with what aspect is being modified and then having that affect the build steps...??

Just thinking about how the Angular website build folder needs to be run on merges to master.

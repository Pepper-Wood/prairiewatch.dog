import { AppPage } from './app.po';
import { browser, logging } from 'protractor';

describe('workspace-project App', () => {
  let page: AppPage;

  beforeEach(() => {
    page = new AppPage();
  });

  /*
  Page layout has changed. Checking for similar results like these will be a TODO.
  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getTitleText()).toEqual('PrairieWatchDog app is running!');
  });
  */

  afterEach(async () => {
    // Assert that there are no errors emitted from the browser
    const logs = await browser.manage().logs().get(logging.Type.BROWSER);
    expect(logs).not.toContain(jasmine.objectContaining({
      level: logging.Level.SEVERE,
    } as logging.Entry));
  });
});

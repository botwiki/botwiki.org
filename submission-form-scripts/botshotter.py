#!/usr/bin/env python
"""
Take a screenshot of a bot's profile.
Removes some clutter and crops before saving.

Requirements:
 * Python 2 (tested on 2.7)
 * pip install pillow selenium
 * ChromeDriver https://code.google.com/p/selenium/wiki/ChromeDriver
 * Or PhantomJS http://phantomjs.org/
"""
from __future__ import print_function, unicode_literals
import argparse
from PIL import Image  # pip install pillow
from selenium import webdriver, common  # pip install selenium
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as ec
import StringIO
import os
import time
from colorama import init, Fore, Style


def clean_path(path):
    return path.replace('..', '')


def do_one_account(driver, url_or_username, outdir, headless):
    """ Process a single bot account """
    url = get_url(url_or_username)

    outfile = username_from_url(url) + ".png"
    if outdir:
        outfile = os.path.join(outdir, outfile)
    if os.path.isfile(outfile):
        print(Fore.RED + clean_path(outfile) +
              " already exists, skipping" +
              Style.RESET_ALL)
        return  # Don't overwrite existing

    im = take_shot(driver, url, headless)
    im = crop_image(im, headless, url_or_username)
    im.save(outfile)

    # For Windows, need correct directory slashes for os.system calls
    abs_outfile = os.path.abspath(outfile)

    # Optimise with optipng (if binary in path)
    cmd = "optipng -force -o7 {0}".format(abs_outfile)
    print(cmd)
    os.system(cmd)

    # Optimise with pngcrush (if binary in path)
    cmd = ("pngcrush -ow -rem gAMA -rem alla -rem cHRM -rem iCCP -rem sRGB "
           "-rem time {0}").format(abs_outfile)
    print(cmd)
    os.system(cmd)


def get_url(url_or_username):
    """
    Given https://twitter.com/gutendelight, @gutendelight or gutendelight,
    return https://twitter.com/gutendelight
    """
    if url_or_username.startswith("http"):
        return url_or_username
    else:
        return "https://twitter.com/" + url_or_username.lstrip("@")


def username_from_url(url, at_sign=False):
    """ Get the bot's username from its location """
    if "tumblr.com" in url:
        username = url.rsplit('.')[0]
        username = username.rsplit('//')[1]
    else:
        username = url.rsplit('/', 1)[-1]
    if at_sign:
        username = "@" + username
    return username


def delete_element_by_class_name(driver, class_name):
    """ Delete an element from the page """
    try:
        element = driver.find_element_by_class_name(class_name)
        driver.execute_script("""
            var element = arguments[0];
            element.parentNode.removeChild(element);
            """, element)
    except common.exceptions.NoSuchElementException:
        pass


def take_shot(driver, url, headless):
    """
    Load the page, remove some clutter and
    return a screenshot as a Pillow image
    """

    # Load the webpage
    driver.get(url)

    # Make sure the page is loaded
    wait = WebDriverWait(driver, 10)

    if "twitter.com" in url:
        wait.until(ec.visibility_of_element_located((
            By.CSS_SELECTOR, 'img.ProfileAvatar-image')))

        # Remove some clutter
        delete_element_by_class_name(driver, 'BannersContainer')
        delete_element_by_class_name(driver, 'topbar')
        delete_element_by_class_name(driver, 'SignupCallOut')
        delete_element_by_class_name(driver, 'trends')
        delete_element_by_class_name(driver, 'user-actions-follow-button')
#    elif "tumblr.com" in url:
#        wait.until(ec.visibility_of_element_located(
#                   (By.CSS_SELECTOR, 'img.ProfileAvatar-image')))

    if not headless:
        if "twitter.com" in url:
            # Scroll to the profile image
            element = driver.find_element_by_class_name('ProfileCanopy-avatar')
            driver.execute_script("return arguments[0].scrollIntoView();",
                                  element)
            # ... and back a bit
            driver.execute_script("window.scrollBy(0, -10);")

    # Bit of extra time to let it finish loading/removing
    time.sleep(0.8)

    # Save the image immediately to disk
    # driver.save_screenshot(outfile)

    # Get the image as binary data without saving to disk (yet)
    # and return it as a Pillow image
    png = driver.get_screenshot_as_png()
    im = Image.open(StringIO.StringIO(png))
    return im


def crop_image(im, headless, url_or_username):
    """ Crop and return the image """
    # Crop:
    #  * 20px from right for scrollbars
    left = 0
    top = 0
    right = im.width - 20
    bottom = im.height
    if headless:
        if 'twitter.com' in url_or_username:
            top = 90
            left = 20
        bottom = 900

    # Now centre in 900px
    width = right - left
    if width > 900:
        gap = (width - 900)/2
        left += gap
        right -= gap

    im = im.crop((left, top, right, bottom))
    return im


def bot_directory(url):
    """ First, attempt to get the bot's category from its location, """
    """ fall back on user submitted data. """
    if "twitter.com" in url:
        return "../content/bots/twitterbots/images/"
    elif "youtube.com" in url:
        return "../content/bots/youtube-bots/images/"
    elif "reddit.com" in url:
        return "../content/bots/redditbots/images/"
    elif "tumblr.com" in url:
        return "../content/bots/tumblr-bots/images/"
    return None


def botshotter(url, outdir, headless=False):
    """ Main bit """
    if headless:
        import os.path
        driver = webdriver.PhantomJS(service_log_path=os.path.devnull,
                                     service_args=['--ignore-ssl-errors=true',
                                                   '--ssl-protocol=any'])
    else:
        options = webdriver.ChromeOptions()
        options.add_argument("--start-maximized")
        driver = webdriver.Chrome(chrome_options=options)
    driver.maximize_window()
    driver.set_window_size(1000, 750)

    if "," in url:
        urls = url.split(",")
    else:
        urls = [url]

    for url in urls:
        if not outdir:
            outdir = bot_directory(url)
        print('Creating thumbnail from ' + url + ', saving to ' +
              clean_path(outdir) + ' ...')
        do_one_account(driver, url, outdir, headless)

    driver.quit()


if __name__ == "__main__":
    init()  # Initialise Colorama for Windows
    parser = argparse.ArgumentParser(
        description="Take a screenshot of a bot's profile page.",
        formatter_class=argparse.ArgumentDefaultsHelpFormatter)
    parser.add_argument('url', help="Username or URL to screenshot. "
                                    "Or a comma-separated list.")
    parser.add_argument('-o', '--outdir', help="Output directory.")
    parser.add_argument('--headless', action='store_true',
                        help="Run in headless browser.")
    args = parser.parse_args()

    botshotter(args.url, args.outdir, args.headless)

# End of file

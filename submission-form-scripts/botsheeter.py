#!/usr/bin/env python
"""
Create markdown entries and screenshots from submissions to:
https://botwiki.org/submit-your-bot
So far only Twitter bots are supported.
"""
from __future__ import print_function, unicode_literals
import argparse
import datetime
import gspread  # pip install gspread
import json
import os
from oauth2client.client import SignedJwtAssertionCredentials
from colorama import init, Fore, Back, Style

# from pprint import pprint

init()  # Initialise Colorama for Windows
print()
print(Fore.BLUE)
print("   ;")
print('  ["]')
print(" /[_]\ " + Style.RESET_ALL + "botwiki.org")
print(Fore.BLUE + "  ] [")
print(Style.RESET_ALL)
print()

print("Starting botsheeter.py, a Botwiki.org script by " + Fore.BLUE + "twitter.com/hugovk" + Style.RESET_ALL + "...")

def clean_path(path):
    return path.replace('..', '')

def make_twitter_url(text, force_it=False):
    """ Do the best to turn it into a Twitter URL """
    if text.startswith("twitter.com"):
        return "https://" + text.replace(" ", "")
    if text.startswith("https://twitter.com"):
        return text.replace(" ", "")
    if text.startswith("@"):
        return "https://twitter.com/" + text[1:].replace(" ", "")
    if force_it:
        return "https://twitter.com/" + text.replace(" ", "")
    return text


def validate_creator_twitter_url(url):
    """ Validate url to return a Twitter URL """
    return make_twitter_url(url, force_it=True)


def validate_location(location):
    """ Validate location to return a URL """
    return make_twitter_url(location)


def bot_category(bot):
    """ First, attempt to get the bot's category from its location,
    fall back on user-submitted data.
    """
    if "twitter.com" in bot['location']:
        return "twitterbots"
    elif "youtube.com" in bot['location']:
        return "youtube-bots"
    elif "reddit.com" in bot['location']:
        return "redditbots"
    elif "tumblr.com" in bot['location']:
        return "tumblr-bots"
    elif bot['network'] == 'Slack':
        return "slackbots"
    elif bot['network'] == 'Kik':
        return "kik-bots"
    elif bot['network'] == 'Snapchat':
        return "snapchat-bots"
    return None


def bot_network(bot):
    """ First, attempt to get the bot's betwork name from its location,
    fall back on user-submitted data.
    """
    if "twitter.com" in bot['location']:
        return "Twitter"
    elif "youtube.com" in bot['location']:
        return "Youtube"
    elif "reddit.com" in bot['location']:
        return "Reddit"
    elif "tumblr.com" in bot['location']:
        return "Tumblr"
    elif bot['network'] == 'Slack':
        return "Slack"
    elif bot['network'] == 'Kik':
        return "Kik"
    elif bot['network'] == 'Snapchat':
        return "Snapchat"
    return None


def dedupe(seq):
    """ Dedupe a list, preserving order """
    seen = set()
    seen_add = seen.add
    return [x for x in seq if not (x in seen or seen_add(x))]


def bot_tags(bot):
    """ Add network-specific tags, remove duplicates """
    tags_to_add = []
    if "twitter.com" in bot['location']:
        tags_to_add = ["twitter", "twitterbot"]
    elif "youtube.com" in bot['location']:
        tags_to_add = ["youtube", "youtubebot"]
    elif "reddit.com" in bot['location']:
        tags_to_add = ["reddit", "redditbot"]
    elif "tumblr.com" in bot['location']:
        tags_to_add = ["tumblr", "tumblrbot"]
    elif bot['network'] == 'Slack':
        tags_to_add = ["slack", "slackbot"]
    elif bot['network'] == 'Kik':
        tags_to_add = ["kik", "kikbot"]
    elif bot['network'] == 'Snapchat':
        tags_to_add = ["snapchat", "snapchatbot"]

    # Remove spaces after commas, but not from tags, and convert into a list
    user_tags = bot['tags'].replace(", ", ",").lower().split(",")

    if 'active' in bot and bot['active'] == 'Active':
        tags_to_add.extend(['active'])
    else:
        tags_to_add.extend(['inactive'])

    # Add user tags
    tags_to_add.extend(user_tags)

    # Add open-source tags
    if 'is_open_source' in bot and bot['is_open_source']:
        tags_to_add.extend(["open source", "opensource"])
        if 'open_source_language' in bot and bot['open_source_language']:
            tags_to_add.append(bot['open_source_language'])
        # Add node tags
        if ("nodejs" in tags_to_add or
                "node.js" in tags_to_add or
                "node" in tags_to_add):
            tags_to_add.extend(["nodejs", "node.js", "node"])

    # Add author's Twitter username
    if 'creator_twitter_url' in bot and bot['creator_twitter_url']:
        tags_to_add.append(
            username_from_url(bot['creator_twitter_url']))

    # Remove duplicates
    tags_to_add = dedupe(tags_to_add)

    # And back to a lowercase string
    return ",".join(tags_to_add).lower()


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


def format_md(bot):
    """
    bot.network will be deduced based on the URL, eg
    bot.url contains youtube.com => bot.network = 'YouTube'
    and bot.category = 'youtube-bots'
    and bot.type = 'youtubebot'
    etc.
    """

    date = datetime.datetime.today()
    date = date.strftime("%B %d, %Y")

    bot['network'] = bot_network(bot)
    bot['category'] = bot_category(bot)

    bot['tags'] = bot_tags(bot)
    bot['type'] = bot_category(bot)
    if bot['type'] == 'twitterbots':
        bot['username'] = username_from_url(bot['location'], at_sign=True)
    else:
        bot['username'] = username_from_url(bot['location'], at_sign=False)

    if bot['is_open_source']:
        open_source_text = 'n [open source](' + bot['source_url'] + ') '
    else:
        open_source_text = ' '

    if 'creator_twitter_url' in bot:
        creator_text = ('[' + bot['creator'] + '](' +
                        bot['creator_twitter_url'] + ')')
    else:
        creator_text = bot['creator']

    md_file_text = (
        '/*\n' +
        'Title: ' + bot['username'] + '\n' +
        'Description: ' + bot['short_description'] + '\n' +
        'Author: botsheeter.py' + '\n' +
        'Date: ' + date + '\n' +
        'Tags: ' + bot['tags'] + '\n' +
        'Nav: hidden' + '\n' +
        'Robots: index,follow' + '\n' +
        '*/' + '\n\n' +
        '[![](' + bot_png_filename(bot) + ')](' +
        bot['location'] + ')\n\n' +
        '[' + bot['username'] + '](' + bot['location'] + ') is a' +
        open_source_text +
        bot['network'] + ' bot created by ' + creator_text + '. \n\n' +
        bot['description'] + '\n\n')
    return md_file_text


def bot_png_filename(bot):
    """ Return a filename where this bot's png file will be """
    return ("/content/bots/" + bot_category(bot) + "/images/" +
            username_from_url(bot['location']) + ".png")


def bot_md_filename(bot):
    """ Return a filename for saving this bot's md file """
    return ("../content/bots/" + bot_category(bot) + "/" +
            username_from_url(bot['location']) + ".md")


def create_dirs(dir):
    """ Makes all intermediate-level directories if needed """
    if not os.path.isdir(dir):
        os.makedirs(dir)


def save_md(md_file_text, filename):
    """ Save the md_file_text into filename """
    create_dirs(os.path.dirname(filename))
    print("Saving to", clean_path(filename))
    with open(filename, "w") as f:
        f.write(md_file_text.encode('utf-8'))


if __name__ == "__main__":
    parser = argparse.ArgumentParser(
        description="Create markdown and screenshots from botwiki submissions",
        formatter_class=argparse.ArgumentDefaultsHelpFormatter)
    parser.add_argument(
        '-j', '--json',
        default='botsheeter.json',
        help="JSON file location containing Google OAuth credentials from: "
             "https://gspread.readthedocs.org/en/latest/oauth2.html")
    parser.add_argument(
        '-x', '--test', action='store_true',
        help="Test mode: create local files but don't update the spreadsheet")
    args = parser.parse_args()

    json_key = json.load(open(args.json))
    scope = ['https://spreadsheets.google.com/feeds']
    credentials = SignedJwtAssertionCredentials(
        json_key['client_email'], json_key['private_key'].encode(), scope)

    gc = gspread.authorize(credentials)

    wks = gc.open("Botwiki.org (Responses)").sheet1

    list_of_rows = wks.get_all_values()
    list_of_rows.pop(0)  # ditch header

    skipped_bots = []
    created_bots = []

    # Getting stuff to build .md -- only Twitter bots for now
    bot_page_urls = []  # for screenshots
    for i, row in enumerate(list_of_rows):
        # row is a list of columns
        bot = {}
        bot['location'] = validate_location(row[1])
        bot['username'] = username_from_url(row[1])

        if (row[11] == "TRUE" or row[11] == "DECLINED" or row[11]):
            skipped_bots.append(username_from_url(row[1]))
            continue

        print("Processing " + bot['username'] + "...")

        if ("twitter.com" in bot['location']) or ("tumblr.com" in bot['location']):
            bot_page_urls.append(bot['location'])
        else:
            print(Fore.RED + "Unable to make screenshot for " + bot['username'] + ", please do it manually")
            print("ERROR: Unsuported network")
            print(Fore.RESET)


        bot['description'] = row[2]
        bot['tags'] = row[3]
        bot['active'] = row[4]
        if row[5]:
            bot['is_open_source'] = True
            bot['source_url'] = row[5]
        else:
            bot['is_open_source'] = False
        bot['creator'] = row[6]
        bot['short_description'] = row[7]
        bot['creator_twitter_url'] = validate_creator_twitter_url(row[8])
        bot['network'] = row[9]
        bot['open_source_language'] = row[10]

        outfile = bot_md_filename(bot)

        if os.path.isfile(outfile):
            print(Fore.RED + clean_path(outfile) + " already exists, skipping" + Style.RESET_ALL)
            continue  # Don't overwrite existing
        else:
            created_bots.append(clean_path(outfile))

        #print(bot)
        md_file_text = format_md(bot)
        # print()
        # print(md_file_text)
        # print()
        save_md(md_file_text, outfile)

        if not args.test:
            # Update the worksheet
            # * First value is row number but take care!
            #   - Rows begin at 1, not 0.
            #   - Don't forget we ditched the header, so i==0 is row 2.
            added_row = i + 2
            # * Second value is column (A=1, B=2, ..., L=12, etc.)
            added_col = 12
            wks.update_cell(added_row, added_col, "true")

    print(Fore.GREEN + "Finished processing, skipped " + str(len(skipped_bots)) + " bots:")
    print(Fore.RESET + Style.DIM)
    print(', '.join(skipped_bots))
    print(Style.RESET_ALL)


    if bot_page_urls:
        # Prep botshotter.py call
        print("Loading botshotter.py...")
        bot_page_urls = ",".join(bot_page_urls)
        import botshotter

#        outdir = "../content/bots/" + bot_category(bot) + "/images/"
#        create_dirs(outdir)
        botshotter.botshotter(bot_page_urls, None, headless=True)

        print(Fore.GREEN + "Finished!")

        if (len(created_bots)):
            print("New bots:")
            for path in created_bots:
                print(path)
        else:
            print(Fore.RESET + Style.DIM + "No new bots")

    print(Style.RESET_ALL)

# End of file

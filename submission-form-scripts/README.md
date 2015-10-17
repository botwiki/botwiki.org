# Submission Form Scripts

*Created by Hugo van Kemenade ([@hugo](https://twitter.com/hugovk))*

## About

The easiest way to submit a bot to Botwiki.org is using the [Submit Your Bot](http://botwiki.org/submit-your-bot) submission form. Hugo created a Python script that hooks into the spreadsheet with submitted data, parses it, creates an image thumbnail from the URL associated with the bot and saves both the image and the information provided by the bot into a properly formatted `.md` file.

This significantly speeds up adding new bots, because the only things that need to be done manually are

 - running the script
 - compressing the image(s), ideally using [Trimage](http://trimage.org/) (Windows, OSX, Linux) - this will be also be automated
 - clean up the bot description, if necessary

## Installation

You will need to download and install [Python](https://www.python.org/), if necessary (the script was tested with Python 2.7). Open your terminal inside the folder with the scripts and install the dependencies:

```
pip install -r requirements.txt
```

Next, install [ChromeDriver](https://code.google.com/p/selenium/wiki/ChromeDriver) or [PhantomJS](http://phantomjs.org/).

***Note:** On Linux, you will need to build PhantomJS from source, which...takes a while (30 minutes or more).*

Lastly, you will also need to obtain API keys:

 1. Head to [Google Developers Console](https://console.developers.google.com/project) and create a new project.
 2. Under "API & auth", in the API enable "Drive API".
 3. Go to "Credentials" and select "Add credentials -> Service account".
  3.b You might have to set a name for your app; can be anything, really.
 4. For key type, choose "JSON".
 5. A download will start, save the file as "botsheeter.json" in the folder with scripts.
 6. Copy the `client_email` value and send it to one of the core members of the Botwiki.org/Botmakers.org team so they can whitelist this email.

## Usage

Simply run `python botsheeter.py` (or `python botsheeter.py -h` for help). The generated content will be saved inside the `content` folder.

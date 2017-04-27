/*
Title: Importing a Python Slack bot from GitHub to Glitch
Description: A quick guide on importing an open source Python project to Glitch
Thumbnail: /content/tutorials/importing-github-glitch-slackbot-python/images/thumbnail.png/?
Has code: yes
Show donation link: yes
Date: April 26, 2017
Tags: tutorial,guide,import,python,github,glitch,hyperdev,fourtonfish,botwiki-original
*/

<div class="note" markdown="1">
  Need help with this tutorial? [Join the Botmakers community!](https://botmakers.org/)
</div>


Hey there, Stefan here, with a quick guide that will show you how to import an open source Slack bot as a new [Glitch](https://glitch.com) project and add it to your Slack group.

(I also wrote a similar guide that shows you [how to import a node.js Twitter bot](/tutorials/importing-github-glitch/), so feel free to check that out as well.)


There's a [bunch of open source Slack bots here on Botwiki](/tag/bot+slack+opensource), and for this tutorial I am going to use [this meme-generating Slack bot](/bots/slackbots/slack-meme/).

![Memes in Slack!](/content/bots/slackbots/images/slack-meme.png){.centered}

First, [let's go to the bot's GitHub page](https://github.com/nicolewhite/slack-meme/). We are going to need to copy the part of the URL that has the author's username and the name of the project, in this case `nicolewhite/slack-meme`.

Now in Glitch, create a new project, then click the name of your project in the top left corner. This will bring up a menu.


![Glitch project: Advanced Options](/content/tutorials/importing-github-glitch-slackbot-python/images/import-step-1.png){.centered}

Click the **Advanced Options** button at the bottom. Now you can click the **Import from GitHub** button that was revealed.

![Advanced options](/content/tutorials/importing-github-glitch-slackbot-python/images/import-step-2.png){.centered}

You can now paste the text you copied earlier into the popup prompt, in this case `nicolewhite/slack-meme`.

![Import from GitHub](/content/tutorials/importing-github-glitch-slackbot-python/images/import-step-3.png){.centered}


Glitch officially only supports node.js, but it is possible to also run Python apps. I used [this Python starter project](https://glitch.com/edit/#!/python-sample) to modify the imported project to get it to run.

![Python in Glitch](/content/tutorials/importing-github-glitch-slackbot-python/images/python-in-glitch.png){.centered}


The main change I had to do was to create a new file called `start.sh` and add this:

```
#!/bin/sh
python server.py
```

Next few steps will depend on the bot project you are importing (here is the [Setup section for the meme bot project](https://github.com/nicolewhite/slack-meme/#setup)), but generally you will need to create a Slack app or [set up an API token](https://api.slack.com/custom-integrations/legacy-tokens), add a slash command, or set up an incoming webhook.

Note that Glitch uses a `.env` file to manage private data, like API keys, so you will have to save them into this file.


```
SLACK_API_TOKEN='abcd-1234-56789-1234567-89abcdefg'
SLACK_WEBHOOK_URL='https://hooks.slack.com/services/ABCDE/FGH1234/56789abcdefg'
SLACK_SLASH_COMMAND_TOKEN='abcd1234efghij'
```

This is actually enough for this particular project, because the values are being read directly from the environment, but in most cases you will have to update the actual project code. [Here's how you use environmental variables with Python](http://stackoverflow.com/questions/4906977/access-environment-variables-from-python):

```
import os
print os.environ['SLACK_API_TOKEN']
```

If you're importing a node.js-based bot, you can access your variables like this:

```
process.env.SLACK_API_TOKEN
```

And finally, [here's the imported project on Glitch](https://glitch.com/edit/#!/botmakers-slack-meme). 

Thanks for following along! If you have any questions, be sure to [stop by the Botmakers community](https://botmakers.org/), or you can just join to play with our meme bot :-)

# Botwiki.org

<img style="max-width:100%;" src="content/images/botwiki.png">

***Note: All members of the Botwiki.org team and contributors must read, understand and follow our official [Code of Conduct](https://github.com/botwiki/botmakers.org/blob/master/Code%20of%20Conduct.md).***

***Note: If you want to join the official Botwiki.org and/or Botmakers.org team, [read this](https://github.com/botwiki/botwiki.org/blob/master/HELP-WANTED.md).***

## About

[Botwiki.org](https://botwiki.org/) is an open-source collection of tutorials, articles, datasets and other resources for creating useful, interesting, artistic and friendly online bots -- _smart software agents that do fun or useful stuff_ -- for [Twitter](https://twitter.com/), [Slack](https://slack.com/), [IRC](https://en.wikipedia.org/wiki/Internet_Relay_Chat) and other online networks.

[Botwiki.org](https://botwiki.org/) also lets you browse these bots by various categories, such as:

- [Twitter bots](https://botwiki.org/bots/twitterbots)
- [game bots](https://botwiki.org/tag/game)
- [open source bots for Slack written with node.js](https://botwiki.org/tag/opensource+nodejs+slack)

and [more](https://botwiki.org/bots/).


## Contributing to Botwiki

Botwiki is powered by [Pico](http://picocms.org/), which is a very simple CMS running on PHP. It uses the [Twig](http://twig.sensiolabs.org/) templating language. The content of the site is created with [Markdown](http://daringfireball.net/projects/markdown/basics).

There is a few ways you can contribute to Botwiki. 

If you see an error on any of the pages, you can [open a new issue](https://github.com/botwiki/botwiki.org/issues) where you describe the problem and if you know, you can also suggest a solution.


If you want to add a bot by yourself, you should be familiar with git, GitHub and the command line.

If you're just learning about git, it's very easy [to set it up](https://help.github.com/articles/set-up-git/) and you can look at [some of these resources](https://help.github.com/articles/good-resources-for-learning-git-and-github/) for learning how to use it together with the GitHub site.

You will really only need to know the basics to be able to contribute to this project.

Once you're all set with git, it's time to fork this project and clone the new repo to your computer.

Once you install [PHP](http://php.net/manual/en/install.php) and [Composer](https://getcomposer.org/), go to the website's main folder and run

```
composer install
```

Make sure everything installs correctly, otherwise you will see an error that looks like this:

```
Class 'ParsedownExtra' not found in /home/stefan/Desktop/Untitled Folder/botwiki.org/lib/pico.php on line 152
```

If you want to learn more about Pico, you can check out [the official documentation](http://picocms.org/docs.html), but you are now ready to add content to the site.

All the content is inside the  `content` folder. Let's see how we'd go about adding a new Twitter bot called "_my_new_bot_"

First, we need to run the site on our local machine.

```
php -S localhost:5000
```

(The port number, which is `5000` here, can be pretty much any number.)

Then, we will go to the `content/bots/twitterbots` folder. We can make a copy of one of the files and rename it to `my_new_bot.md`.



The structure of the file is very simple, here's an example from the Twitter bot that posts about holidays for each day.

```
/*
Title: @holidaybot4000
Description: Every day IS a holiday
Author: Stefan Bohacek
Date: July 21, 2015
Tags: twitter,twitterbot,active,node.js,nodejs,node,holidays,images,flags,useful,fourtonfish

Nav: hidden
Robots: index,follow
*/

[![](/content/bots/twitterbots/images/holidaybot4000.png)](https://twitter.com/holidaybot4000)

[@holidaybot4000](https://twitter.com/holidaybot4000) is a Twitter bot that tweets holidays around the world for the given day, typically together with an image of the country's flag. It was created by [@fourtonfish](https://twitter.com/fourtonfish).
```

The title should be the name of the bot. I include the "@" for bots on Twitter. The description should be short and it shows up on the search page or when you browse the content of the site by tags.

The `Author` should be your name (or Twitter handle, or your _stage name_), as the author of the page. (Although, I don't think this shows up anywhere right now.)

`Date` will be today's date. It should also be updated in case you're doing a major change to an existing page.

I recommend as many useful tags as possible. You can browse the website or open some of the files to see what some common tags are, but be sure to include whether the bot is `active` or `inactive`, some basic keywords, for example `images` if the bot posts or handles images in any way, and if the bot has publicly available source code, be sure to include the `open source` and `opensource` tags. (This is necessary due to the [limitations of the search feature](https://github.com/botwiki/botwiki.org/issues/19).)

You can keep the `Nav` and `Robots` values as they are. `Nav: hidden` just means that the bot won't show up in the main navigation, like the _About_, _Bots_, _Tutorials_, etc pages.

Now, you will also need to go to your bot's page and take a screenshot that shows how the bot works. There is no set requirement for the height, since every bot may need different amount of space to show what it does, but the width should be **900px**.

The screenshot can be any format, really, just make sure you change the path to the file to match it. The screenshot itself should be in the `images` folder inside the folder where you added your bot. I also recommend downloading a program like [ImageOptim](https://imageoptim.com/) (OSX) or [Trimage](http://trimage.org/) (Linux, Windows, OSX) to optimize the size of the image.

Once you're done, you will be able to go to `localhost:5000/bots/twitterbots/my_new_bot` and see your newly added bot.

Pretty easy!

If everything looks good, go ahead and open a pull request so that your updates can be reviewed and merged.

## Updating the website's style

If you want to mess with the look of the site, you will need to also install [node](https://nodejs.org/) (which comes with [npm](https://docs.npmjs.com/)).

Then, from the root directory, you can run:

```
sudo npm install
```


First run the site as above:

```
php -S localhost:5000
```

And then (in a new terminal window) run the gulp tasks, simply with:

```
gulp
```

The site will be available with live-reloading at `http://localhost:3000`.

If you for some reason get an error about a node package missing, just install it with

```
sudo npm install NAME_OF_THE_PACKAGE --save-dev
```

## Contributing without GitHub

If you'd like to contribute outside of GitHub, you can send an email to <a href="mailto:stefan@fourtonfish.com">stefan@fourtonfish.com</a>. Simply copy the content of [this file](https://raw.githubusercontent.com/botwiki/botwiki.org/master/content/bots/twitterbots/holidaybot4000.md) and replace it with relevant information.

If you have any questions, feel free to reach out to me using the email above or [on Twitter](https://twitter.com/fourtonfish).
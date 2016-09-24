/*
Title: @belongbot4000
Description: An unofficial belong.io bot.
Thumbnail: /content/bots/twitterbots/images/belongbot4000.png
Link: https://twitter.com/belongbot4000
Author: Stefan Bohacek
Date: September 15, 2015
Tags: twitter,bot,twitterbot,belong,belong.io,collections,active,open source,opensource,node.js,nodejs,node,web scraping,belong.io,fourtonfish

Nav: hidden
Robots: index,follow
*/

[@belongbot4000](https://twitter.com/belongbot4000) is a simple Twitter bot that scrapes [belong.io](http://belong.io/) (here's [a bit about the site](https://www.wired.com/2015/04/curation-code-powerful-combo-finding-webs-best-stuff/), credits go to [Andy Baio](https://twitter.com/waxpancake)) every 45 minutes (with the site's creator's [approval](https://twitter.com/waxpancake/status/649582755777417216)) and looks for new tweets to post.

![Featured!](/content/images/belongio.png)

Originally, the bot would simply retweet every tweet on [belong.io](http://belong.io/). This made the bot very nice to use, but at least one person openly complained about the notifications the bot was causing to them.

Rather than risking getting the bot shut down, it was rewritten to only post the links found on belong.io. Eventually, the bot was shut down.

Resurrected in September 2016, the bot now adds the tweets it finds into a [Collection](https://blog.twitter.com/2015/tell-compelling-stories-with-twitter-on-mobile-or-web) and posts a link to it.

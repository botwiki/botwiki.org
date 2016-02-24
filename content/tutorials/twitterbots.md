/*
Title: Tutorials for Twitter Bots
Description: Learn how to make your own Twitter bot!
Nav: hidden
*/


> Twitter (/ˈtwɪtər/) is an online social networking service that enables users to send and read short 140-character messages called "tweets".

-- [Wikipedia](https://en.wikipedia.org/wiki/Twitter)

Learn how to make bots for [Twitter](https://twitter.com/) below -- or [look at some Twitter bots](/tag/twitterbot) for inspiration.

And you're more then welcome to join us at [**Botmakers.org**](https://botmakers.org/) to share what you're working on, ask for advice or just chat with fellow [#botmakers](https://twitter.com/search?q=%23botmakers) and bot enthusiasts.

#### [¶](#note-phone-number){.pilcrow} Note on needing a phone number {#note-phone-number}

One tricky part of making a bot for Twitter is that if you want your bot to be able to actually post on Twitter, rather than just read from it, you will need to add a phone number to your account. 

There is a few ways to solve this:

- see [Molly White's tutorial](http://blog.mollywhite.net/twitter-bots-pt2/#createthetwitterapp) that explains how to transfer your Twitter app to another account
- you can remove the phone number from your account and associate it with a new one
- you can sign up for [Google Voice](https://www.google.com/voice) ([Skype](http://www.skype.com/) number won't work, because Skype doesn't let you receive text messages, which you will need to verify your phone number)

And once you have one account verified, you can also host all your bots under the same account.


### [¶](#beginner-tutorials){.pilcrow} Beginner tutorials {#beginner-tutorials}


#### [¶](#tutorials-nodejs){.pilcrow} node.js {#tutorials-nodejs}

- A [six-part video tutorial](https://www.youtube.com/playlist?list=PLRqwX-V7Uu6atTSxoRiVnSuOn6JHnq2yV) by [Daniel Shiffman](https://twitter.com/shiffman) with node.js and [Processing](http://learningprocessing.com/)
 - See also [Daniel's notes](http://shiffman.github.io/A2Z-F15/week9/notes.html) and a [small wiki](https://github.com/shiffman/A2Z-F15/wiki/Twitter-Bots)
- [Making @what_capital](/tutorials/making-what_capital/): introduction to using [Cloud9](https://c9.io/) for making Twitter bots
- A three-part in-depth tutorial by [@ursooperduper](https://twitter.com/ursooperduper)
 - Part 1: [Prerequisites](https://ursooperduper.github.io/2014/10/27/twitter-bot-with-node-js-part-1.html)
 - Part 2: [Code](https://ursooperduper.github.io/2014/10/28/twitter-bot-with-node-js-part-2.html)
 - Part 3: [Deployment](https://ursooperduper.github.io/2014/11/03/twitter-bot-with-node-js-part-3.html)
- [A Twitter Bot In 20 Minutes With Node.js](http://www.apcoder.com/2013/10/03/twitter-bot-20-minutes-node-js/) (using [ttezel/twit](https://github.com/ttezel/twit))
- [How to make simple bots with the twitter stream API](http://thealphanerd.io/blog/what-exactly-is-talkpaybot-how-to-make-simple-bots-with-the-twitter-stream-api/) (with node.js and [ttezel/twit](https://github.com/ttezel/twit), covers processing of Direct Messages on Twitter)
- [Making a RapBot with JavaScript](https://bocoup.com/weblog/making-a-rapbot/)
- [dariusk/examplebot](https://github.com/dariusk/examplebot) -- a super simple tutorial with node.js source code

#### [¶](#tutorials-python){.pilcrow} Python {#tutorials-python}

- [Molly White](https://twitter.com/molly0x57)'s *[What is a Twitter bot?](http://blog.mollywhite.net/twitter-bots-pt1/)* and *[How to create a Twitter bot](http://blog.mollywhite.net/twitter-bots-pt2/)* (in Python); this tutorial also shows how to [handle the need for multiple phone numbers](http://blog.mollywhite.net/twitter-bots-pt2/#createthetwitterapp)
- [Build A Bot Workshop](https://www.youtube.com/watch?v=77DjocIDqWs) -- video from a workshop at the [PyDX 2015](/events/#pydx2015) Python conference, presented by [Terian Koscik](https://twitter.com/spine_cone), slides available [here](https://tpinecone.gitbooks.io/build-a-bot-workshop/content/index.html) 
- [Making a Twitter bot in Python](http://emerging.commons.gc.cuny.edu/2013/10/making-twitter-bot-python-tutorial/)
- [Creating a Twitterbot in Python](http://verythorough.tumblr.com/post/101348170234/creating-a-twitterbot-in-python)
- [Five Steps To Build Your Own Random Non-Sequitur Twitter Bot](http://readwrite.com/2014/06/20/random-non-sequitur-twitter-bot-instructions?_escaped_fragment_=) -- with Python and [Heroku](https://www.heroku.com/)
- [How To Write a Twitter Bot with Python and tweepy](http://www.dototot.com/how-to-write-a-twitter-bot-with-python-and-tweepy/)
- [How to Code a Simple Twitter Bot for Complete Beginners](https://medium.com/@sarahnadia/how-to-code-a-simple-twitter-bot-for-complete-beginners-36e37231e67d)
- [Python + BeautifulSoup + Twitter + Raspberry Pi](http://emerging.commons.gc.cuny.edu/2013/06/python-beautifulsoup-twitter-raspberry-pi/) *(note: this tutorial is from 2013)*

#### [¶](#tutorials-ruby){.pilcrow} Ruby {#tutorials-ruby}

- [Civ V Random Game Generator Twitterbot](http://www.katelyndinkgrave.com/ruby/2016/01/31/civ-game-generator-twitterbot.html)


#### [¶](#cheap-bots-done-quick){.pilcrow} Cheap Bots Done Quick {#cheap-bots-done-quick}

Tutorials for [Cheap Bots Done Quick](http://cheapbotsdonequick.com/). For example bots, see the [#cheapbotsdonequick](/tag/cheapbotsdonequick) tag.

- [Tracery & Twitterbots](http://cmuems.com/2015b/tracery-twitterbots/) -- tutorial with [Cheap Bots Done Quick](http://cheapbotsdonequick.com/) and [Tracery](http://www.brightspiral.com/)
- [Make your own @hydratebot: a tutorial for non-coders](http://barrl.net/2767)


#### [¶](#tutorials-other){.pilcrow} Other {#tutorials-other}
- [Polyglot Twitter Bot](http://joelgrus.com/2015/12/29/polyglot-twitter-bot-part-1-nodejs/) -- a six-part series on making Twitter bots with node.js, Python, Purescript and Amazon AWS by [Joel Grus](https://twitter.com/joelgrus)
- [Fake It ‘Til You Make It: A Basic Bot Primer For The Aprogrammatic](http://blog.tullyhansen.com/post/62774813528/fake-it-til-you-make-it-a-basic-bot-primer-for) -- a tutorial by [Tully Hansen](https://twitter.com/tullyhansen) for non-programmers, using [twittbot.net](http://twittbot.net/) and [RoundTeam](https://roundteam.co/)
- [Build Your Own Topic Bot](http://blog.hatnote.com/post/124917412833/build-your-own-topic-bot) -- a tutorial with [IFTTT](https://ifttt.com/) and [Wikipedia](https://www.wikipedia.org/)
- [How to Write a Twitter Bot in 5 Minutes](http://www.labnol.org/internet/write-twitter-bot/27902/) with [Wolfram Alpha](http://products.wolframalpha.com/api/) and [Google Drive](https://www.google.com/drive/)
- [How to make a Twitter Bot with Google Spreadsheets](http://www.zachwhalen.net/posts/how-to-make-a-twitter-bot-with-google-spreadsheets-version-04/) by [Zach Whalen](http://www.twitter.com/zachwhalen)
- [Tutorial on Python Twitter Bots](https://github.com/DSSatPitt/python-twitter-bots) -- a tutorial in [Jupyter Notebooks](http://jupyter.org/)
- [How to program a Twitter bot](https://weatherlisa.wordpress.com/2015/11/26/how-to-program-a-twitter-bot/) using the [R language](https://www.r-project.org/)


### [¶](#intermediate-tutorials){.pilcrow} Intermediate tutorials {#intermediate-tutorials}

- [Raspberry Pi Twitterbot](http://www.instructables.com/id/Raspberry-Pi-Twitterbot/) -- an IoT tutorial with a [Raspberry Pi](https://www.raspberrypi.org/) and Python
- Building a twitter bot using node, [feedparser](https://www.npmjs.com/package/feedparser) and [simple-twitter](https://www.npmjs.com/package/simple-twitter): [Part 1](https://www.hughrundle.net/2015/07/16/building-a-twitter-bot-using-node-feedparser-and-simple-twitter-part-1/) and [Part 2](https://www.hughrundle.net/2015/07/18/building-a-twitter-bot-part-2-its-aliiiive/)
- [A video tutorial](https://vimeo.com/139794441) where [Cole Willsea](https://twitter.com/colewillsea) shows how he built [@_WE_GET_IT_BRO_](https://twitter.com/_WE_GET_IT_BRO_), a Twitter bot about weed, [source code](https://github.com/coleww/we-get-it-you-smoke-weed)
- [Share personality insights with a cognitive Twitter bot](http://www.ibm.com/developerworks/library/cc-twitter-bot-personality-insights-nodered-bluemix-trs/index.html)


### [¶](#unsorted-notes){.pilcrow} Unsorted and notes {#unsorted-notes}

- [Twitter's missing manual](https://eev.ee/blog/2016/02/20/twitters-missing-manual/)
- ["These emojis will work in your Twitter name and bio"](https://www.emojibase.com/emojis-on-twitter)
- [Friendly Twitter Bots and Write Access](http://dghubble.com/blog/posts/twitter-app-write-access-and-bots/)

### [¶](#tools-and-twitter-specific-resources){.pilcrow} Tools and Twitter-specific resources {#tools-and-twitter-specific-resources}
See [Resources for Twitter bots](/resources/twitterbots) and [open source code for Twitter bots](/tag/twitter+opensource).

Also be sure to read the [Twitter Rules](https://support.twitter.com/articles/18311-the-twitter-rules#), the [Twitter developer policy](https://dev.twitter.com/overview/terms/policy), the [automation rules and best practices](https://support.twitter.com/articles/76915-automation-rules-and-best-practices) and learn about the [API Rate Limits](https://dev.twitter.com/rest/public/rate-limits).
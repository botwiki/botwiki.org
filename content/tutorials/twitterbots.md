/*
Title: Tutorials for Twitter Bots
Description: Learn how to make your own Twitter bot!
Tags: tutorials,twitter
Thumbnail: /content/images/illustrations/brambling-greenfinch-large.png
Show donation link: yes
Nav: hidden
*/

<div class="note">
  <p>
    Before you start making bots, consider reading <a href="/articles/bot-ethics">these essays and articles</a>. Also worth browsing: <a href="/resources/libraries-frameworks/#language">resources for cleaning up your bot's language</a>.
  </p>
</div>

Learn how to make bots for [Twitter](https://twitter.com/) ([What is Twitter?](https://en.wikipedia.org/wiki/Twitter)) below -- or [look at some Twitter bots](/tag/twitterbot) for inspiration.

[![XKCD: Twitter Bot](/content/tutorials/images/twitter_bot_xkcd.png "PYTHON FLAG ENABLE THREE LAWS")](https://xkcd.com/1646/) {.centered .centered-text}

**And you're more then welcome to join us in the public [Botmakers Slack group](https://botmakers.org/) to share what you're working on, ask for advice, or just chat with fellow artists, journalists, educators, tinkerers, and bot enthusiasts!**

(Here's our [Code of Conduct](https://botwiki.org/coc/).)

Can't wait to see you there!


<div class="row">
  <div class="col-sm-12 col-md-6 no-pad" markdown=1>
### Page content [¶](#page-content){.pilcrow} {#page-content}

- [Beginner tutorials](#beginner-tutorials)
  - [node.js](#tutorials-nodejs)
  - [Python](#tutorials-python)
  - [Ruby](#tutorials-ruby)
  - [Cheap Bots Done Quick](#cheap-bots-done-quick)
  - [SSBot (Google Spreadsheets)](#ssbot)
  - [AWS](#tutorials-aws)
  - [Other](#tutorials-other)
- [Intermediate tutorials](#intermediate-tutorials)
  - [Raspberry Pi](#raspberry-pi)
- [Twitter API](#twitter-api)
- [Notes](#unsorted-notes)
  </div>
  <div class="col-sm-12 col-md-6">
    <p>
      <a href="/bot-workshops/botmaking-from-the-ground-up">
        <img class="screenshot" src="/content/bot-workshops/images/bots-are-cool.png">
      </a>
    </p>
    <div markdown=1>
*[Botmaking from the Ground Up](/bot-workshops/botmaking-from-the-ground-up) is a fun and informative [workshop](/bot-workshops/) on how to get started writing Twitter bots.*
    </div>
  </div>
</div>



### Beginner tutorials [¶](#beginner-tutorials){.pilcrow} {#beginner-tutorials}


**So you want to make a Twitter bot? Check out [How to Make a Twitter Bot: The Definitive Guide](/tutorials/how-to-make-a-twitter-bot-definitive-guide)!**


#### node.js [¶](#tutorials-nodejs){.pilcrow} {#tutorials-nodejs}

<!--
- [How to make a retweet-via-DM Twitter bot using Glitch and node.js](https://botwiki.org/tutorials/how-to-make-a-twitter-bot-dm-retweet-glitch/)
-->
- [A quick template/mini-tutorial for making Twitter bots with Glitch](https://glitch.com/edit/#!/project/twitterbot) (glitch.com)
  - See [Botwiki on Glitch](https://glitch.com/botwiki) for more bot template projects
- A [six-part video tutorial](https://www.youtube.com/playlist?list=PLRqwX-V7Uu6atTSxoRiVnSuOn6JHnq2yV) by [Daniel Shiffman](https://twitter.com/shiffman) with node.js and [Processing](http://learningprocessing.com/) (youtube.com)
 - See also [Daniel's notes](http://shiffman.net/a2z/twitter-bots/) and a [small wiki](https://github.com/shiffman/A2Z-F15/wiki/Twitter-Bots) (github.com)
- [Create a generative Twitter bot using Tracery](https://glitch.com/~tracery-twitter-bot) ([Byron Hulcher](http://twitter.com/hypirlink) via glitch.com)
- [Make a Twitter bot that tweets random images](/tutorials/random-image-tweet/)
  - [Import this bot project to Glitch](/tutorials/importing-github-glitch/)
  - [Original version of the tutorial with OpenShift](/tutorials/make-an-image-posting-twitter-bot/)
- [Making @what_capital](/tutorials/making-what_capital/): introduction to using [Cloud9](https://c9.io/) for making Twitter bots
- A three-part in-depth tutorial by [@ursooperduper](https://twitter.com/ursooperduper) (ursooperduper.github.io)
 - Part 1: [Prerequisites](https://ursooperduper.github.io/2014/10/27/twitter-bot-with-node-js-part-1.html)
 - Part 2: [Code](https://ursooperduper.github.io/2014/10/28/twitter-bot-with-node-js-part-2.html)
 - Part 3: [Deployment](https://ursooperduper.github.io/2014/11/03/twitter-bot-with-node-js-part-3.html)
- [Smarter & Cuter Bots](https://www.youtube.com/watch?v=oLYcx8C6I18): a video tutorial using [GraphicsMagick](http://www.graphicsmagick.org/) and Microsoft's Cognitive Services (Rachel White via youtube.com)
  - [Slides](https://docs.google.com/presentation/d/1N_28LFIzHjrNF6mE5yBGUBXkNH6n1mKqMcmDu9veuYk/edit#slide=id.p4) (docs.google.com)


<!--
- [Why you should have your own Twitter bot, and how to build one in less than 30 minutes](https://medium.freecodecamp.com/easily-set-up-your-own-twitter-bot-4aeed5e61f7f) (medium.freecodecamp.com) (uses Cloud9 and Heroku)
 - [github.com/spences10/twitter-bot-bootstrap](https://github.com/spences10/twitter-bot-bootstrap)
- [Creating a basic Twitter Bot in Node.js](http://techknights.org/workshops/nodejs-twitterbot/) (techknights.org)
- [How to make simple bots with the twitter stream API](http://thealphanerd.io/blog/what-exactly-is-talkpaybot-how-to-make-simple-bots-with-the-twitter-stream-api/) (with node.js and [ttezel/twit](https://github.com/ttezel/twit), covers processing of Direct Messages on Twitter)
- [twitterdev/twitter-webhook-boilerplate-node](https://github.com/twitterdev/twitter-webhook-boilerplate-node): node.js app using Express 4 for Twitter DMs and webhooks (github.com)
- [Making a RapBot with JavaScript](https://bocoup.com/weblog/making-a-rapbot/)
- [How to build and deploy a multifunctional Twitter bot](https://medium.freecodecamp.com/how-to-build-and-deploy-a-multifunctional-twitter-bot-49e941bb3092) (Scott Spence via medium.com)
- [dariusk/examplebot](https://github.com/dariusk/examplebot): a super simple tutorial with node.js source code
-->

#### Python [¶](#tutorials-python){.pilcrow} {#tutorials-python}

- [Molly White](https://twitter.com/molly0x57)'s *[What is a Twitter bot?](http://blog.mollywhite.net/twitter-bots-pt1/)* and *[How to create a Twitter bot](http://blog.mollywhite.net/twitter-bots-pt2/)* (in Python); this tutorial also shows how to [handle the need for multiple phone numbers](http://blog.mollywhite.net/twitter-bots-pt2/#createthetwitterapp) (blog.mollywhite.net)
- [Build A Bot Workshop](https://www.youtube.com/watch?v=77DjocIDqWs): video from a workshop at the [PyDX 2015](/events/#pydx2015) Python conference, presented by [Terian Koscik](https://twitter.com/spine_cone), slides available [here](https://tpinecone.gitbooks.io/build-a-bot-workshop/content/index.html) (youtube.com)
- [How To Create a Twitterbot with Python 3 and the Tweepy Library](https://www.digitalocean.com/community/tutorials/how-to-create-a-twitterbot-with-python-3-and-the-tweepy-library) (Lisa Tagliaferri via digitalocean.com)
- [Five Steps To Build Your Own Random Non-Sequitur Twitter Bot](http://readwrite.com/2014/06/20/random-non-sequitur-twitter-bot-instructions?_escaped_fragment_=): with Python and [Heroku](https://www.heroku.com/) (readwrite.com)
- [How To Write a Twitter Bot with Python and tweepy](http://www.dototot.com/how-to-write-a-twitter-bot-with-python-and-tweepy/) (dototot.com)
- [How to Code a Simple Twitter Bot for Complete Beginners](https://medium.com/@sarahnadia/how-to-code-a-simple-twitter-bot-for-complete-beginners-36e37231e67d) (@sarahnadia via medium.com)
- [Coding a simple Twitter bot](https://medium.com/@agladman/coding-a-simple-twitter-bot-66041d1d2b83): a tutorial from the creator of the [@futuremash](https://twitter.com/futuremash) Markov chain bot (Anthony Gladman via medium.com)

<!--
- [Build A Twitter Bot With Python](http://marydickson.com/build-a-twitter-bot-with-python/)
- [Making a Twitter bot in Python](http://emerging.commons.gc.cuny.edu/2013/10/making-twitter-bot-python-tutorial/)
- [Creating a Twitterbot in Python](http://verythorough.tumblr.com/post/101348170234/creating-a-twitterbot-in-python)
- [A Total Beginner’s Guide to (Literary) Twitter Bots](http://www.adamhammond.com/botguide/) (adamhammond.com)
- [How to Make a Twitter Bot in Under an Hour](https://medium.com/science-friday-footnotes/how-to-make-a-twitter-bot-in-under-an-hour-259597558acf)
-->

#### Ruby [¶](#tutorials-ruby){.pilcrow} {#tutorials-ruby}

- [Civ V Random Game Generator Twitterbot](http://www.katelyndinkgrave.com/ruby/2016/01/31/civ-game-generator-twitterbot.html)
- [Your Own @Horse_ebooks](https://medium.com/@nulljosh/your-own-horse-ebooks-84e9b87c5af6) (hosted on Heroku)


#### Cheap Bots Done Quick [¶](#cheap-bots-done-quick){.pilcrow} {#cheap-bots-done-quick}

Tutorials for [Cheap Bots Done Quick](http://cheapbotsdonequick.com/). For example bots, see the [#cheapbotsdonequick](/tag/cheapbotsdonequick) tag.

- [Making twitter bots using Cheap Bots, Done Quick!](https://github.com/derekahmedzai/cheapbotsdonequick): tutorials by [Derek Ahmedzai](https://twitter.com/derekahmedzai) (github.com)
  - [Make your own New Yorker cartoon Twitter bot](https://github.com/derekahmedzai/cheapbotsdonequick/blob/master/new-yorker.md) (github.com)
  - [Creating image bots using SVG and Tracery](https://github.com/derekahmedzai/cheapbotsdonequick/blob/master/svg-tracery-image-bots.md) (github.com)
- [An Introduction to Twitterbots with Tracery](https://programminghistorian.github.io/ph-submissions/lessons/intro-to-twitterbots) (programminghistorian.github.io)
- [Tracery & Twitterbots](http://cmuems.com/2015b/tracery-twitterbots/): tutorial with [Cheap Bots Done Quick](http://cheapbotsdonequick.com/) and [Tracery](http://www.brightspiral.com/) (cmuems.com)
- [Making twitter bots with Tracery and CheapBotsDoneQuick](https://github.com/codekitchensd/2016-03-24-twitterbots) (Code Kitchen via github.com)
- [Make your own @hydratebot: a tutorial for non-coders](http://barrl.net/2767) (barrl.net)
- [Your First Twitter Bot, in 20 minutes](https://porganized.com/2015/10/27/your-first-twitter-bot-in-20-minutes/) (porganized.com)
- [Design an Ideation Twitter Bot](https://medium.com/@Species.agency/design-an-ideation-twitter-bot-58fe73c3510b) (Species.agency via medium.com)


##### Tools and other resources [¶](#cbdq-tools){.pilcrow} {#cbdq-tools}

- [Mark's MetaArtbot](http://artbot.combinatorium.com/#!/tracery) (artbot.combinatorium.com)
- [Visual Tracery editor](http://www.brightspiral.com/tracery/)

##### See also [¶](#cbdq-more){.pilcrow} {#cbdq-more}

- [Botmaking from the Ground Up](https://botwiki.org/bot-workshops/botmaking-from-the-ground-up/)
- [Open source bots made with CBDQ](/tag/bot+opensource+cheapbotsdonequick)

#### SSBot (Google Spreadsheets) [¶](#ssbot){.pilcrow} {#ssbot}

Tutorials that use [Zach Whalen](http://www.twitter.com/zachwhalen)'s Google Spreadsheets-to-Twitterbot tool.

- [Tiny Flashing Thumbs: How to Bot your way to Fake News Success](https://medium.com/the-fake-news-reader/tiny-flashing-thumbs-how-to-bot-your-way-to-fake-news-success-f834bf44c4b4) (Zach Whalen via medium.com)
- [Hook, bait and camouflage: making a honeybot](https://medium.com/@NoraReed/hook-bait-and-camouflage-making-a-honeybot-28a9ccfe0bed) (Nora Reed via medium.com)
- [How to make a Twitter Bot with Google Spreadsheets](http://www.zachwhalen.net/posts/how-to-make-a-twitter-bot-with-google-spreadsheets-version-04/) (SSBot 0.4) (zachwhalen.net)

See also: [Botmaking from the Ground Up](https://botwiki.org/bot-workshops/botmaking-from-the-ground-up/)

#### AWS [¶](#tutorials-aws){.pilcrow} {#tutorials-aws}

- [Create a simple, free, text-driven Twitterbot with AWS Lambda & Node.js](https://medium.com/@emckean/create-a-simple-free-text-driven-twitterbot-with-aws-lambda-node-js-b80e26209f5) (Erin McKean via medium.com)
- [Polyglot Twitter Bot](http://joelgrus.com/2015/12/29/polyglot-twitter-bot-part-1-nodejs/): a six-part series on making Twitter bots with node.js, Python, Purescript and Amazon AWS (joelgrus.com)


#### Other [¶](#tutorials-other){.pilcrow} {#tutorials-other}
- [Fake It ‘Til You Make It: A Basic Bot Primer For The Aprogrammatic](http://blog.tullyhansen.com/post/62774813528/fake-it-til-you-make-it-a-basic-bot-primer-for): a tutorial for non-programmers, using [twittbot.net](http://twittbot.net/) and [RoundTeam](https://roundteam.co/) (blog.tullyhansen.com)
- [Build Your Own Topic Bot](http://blog.hatnote.com/post/124917412833/build-your-own-topic-bot): a tutorial with [IFTTT](https://ifttt.com/) and [Wikipedia](https://www.wikipedia.org/) (blog.hatnote.com)
- [How to Write a Twitter Bot in 5 Minutes](http://www.labnol.org/internet/write-twitter-bot/27902/) with [Wolfram Alpha](http://products.wolframalpha.com/api/) and [Google Drive](https://www.google.com/drive/) (labnol.org)
- [How to program a Twitter bot](https://weatherlisa.wordpress.com/2015/11/26/how-to-program-a-twitter-bot/) using the [R language](https://www.r-project.org/) (weatherlisa.wordpress.com)
- [Tutorial on Python Twitter Bots](https://github.com/DSSatPitt/python-twitter-bots): a tutorial in [Jupyter Notebooks](http://jupyter.org/) (Digital Scholarship Services at the Pitt University Library System via github.com)
- [How to Build a Law Bot](https://lawyerist.com/127093/how-build-law-bot/) with [Jupyter Notebooks](http://jupyter.org/) (lawyerist.com)
- [Tutorial on Creative Twitterbots](https://www.slideshare.net/kimveale/tutorial-on-creative-twitterbots) (Tony Veale via slideshare.net)
- [How I Built a Twitter Bot Using Auth0 Webtasks and Data.gov](https://auth0.com/blog/how-i-built-a-twitter-bot-using-webtask-and-data-gov/) (auth0.com)
- [Notes on building a cron-powered Twitter countdown bot](http://benlk.com/2017-07-31-looming-midterms-a-twitter-cron-bot) (benlk.com)

### Intermediate tutorials [¶](#intermediate-tutorials){.pilcrow} {#intermediate-tutorials}

#### Raspberry Pi [¶](#raspberry-pi){.pilcrow} {#raspberry-pi}

- [Raspberry Pi Twitterbot](http://www.instructables.com/id/Raspberry-Pi-Twitterbot/): an IoT tutorial with a [Raspberry Pi](https://www.raspberrypi.org/) and Python (instructables.com)
- [Use your Raspberry Pi (and Python) to make a Twitter Bot](http://blog.bandwidth.com/actually-using-your-raspberry-pi-part-4-twitter-bot/) (blog.bandwidth.com)
- [How to build a nonsensical Twitterbot on the Raspberry Pi](https://radix-communications.com/how-to-build-a-nonsensical-twitterbot-on-the-raspberry-pi/) (radix-communications.com) (radix-communications.com)
- [Python + BeautifulSoup + Twitter + Raspberry Pi](http://emerging.commons.gc.cuny.edu/2013/06/python-beautifulsoup-twitter-raspberry-pi/) (emerging.commons.gc.cuny.edu)

#### Other [¶](#intermediate-other){.pilcrow} {#intermediate-other}

- Building a twitter bot using node, [feedparser](https://www.npmjs.com/package/feedparser) and [simple-twitter](https://www.npmjs.com/package/simple-twitter): [Part 1](https://www.hughrundle.net/2015/07/16/building-a-twitter-bot-using-node-feedparser-and-simple-twitter-part-1/) and [Part 2](https://www.hughrundle.net/2015/07/18/building-a-twitter-bot-part-2-its-aliiiive/) (hughrundle.net)
- [Share personality insights with a cognitive Twitter bot](http://www.ibm.com/developerworks/library/cc-twitter-bot-personality-insights-nodered-bluemix-trs/index.html) (ibm.com)

### Twitter API [¶](#twitter-api){.pilcrow} {#twitter-api}

- [Alt text support for Twitter Cards and the REST API](https://blog.twitter.com/2016/alt-text-support-for-twitter-cards-and-the-rest-api) (blog.twitter.com)
- [API support for 140 second video](https://twittercommunity.com/t/api-support-for-140-second-video/69153) (twittercommunity.com)
- [Twitter's missing manual](https://eev.ee/blog/2016/02/20/twitters-missing-manual/) (eev.ee)
- [Twitter API Platform Roadmap](https://trello.com/b/myf7rKwV/twitter-api-platform-roadmap) (trello.com)
- [Tweet Metadata Timeline](http://support.gnip.com/articles/tweet-timeline.html) (support.gnip.com)
- [More updates to our Direct Message APIs to help you build better bots](https://blog.twitter.com/developer/en_us/topics/tools/2017/More-updates-to-our-Direct-Message-APIs-to-help-you-build-better-bots.html) (blog.twitter.com)

See also [@twitterapi](https://twitter.com/twitterapi) for updates on the Twitter API.

### Unsorted and notes [¶](#unsorted-notes){.pilcrow} {#unsorted-notes}

- ["These emojis will work in your Twitter name and bio"](https://www.emojibase.com/emojis-on-twitter) (emojibase.com)

#### Note on needing a phone number [¶](#note-phone-number){.pilcrow} {#note-phone-number}

One tricky part of making a bot for Twitter is that if you want your bot to be able to actually post on Twitter, rather than just read from it, you will need to add a phone number to your account.

There is a few ways to solve this:

- see [Molly White's tutorial](http://blog.mollywhite.net/twitter-bots-pt2/#createthetwitterapp) that explains how to transfer your Twitter app to another account
- you can remove the phone number from your account and associate it with a new one
- you can sign up for [Google Voice](https://www.google.com/voice) ([Skype](http://www.skype.com/) number won't work, because Skype doesn't let you receive text messages, which you will need to verify your phone number)
- see also: [Friendly Twitter Bots and Write Access](http://dghubble.com/blog/posts/twitter-app-write-access-and-bots/)


And once you have one account verified, you can also host all your bots under the same account.


### Tools and Twitter-specific resources [¶](#tools-and-twitter-specific-resources){.pilcrow} {#tools-and-twitter-specific-resources}
See [Resources for Twitter bots](/resources/twitterbots) and [open source code for Twitter bots](/tag/twitter+opensource).

Also be sure to read the [Twitter Rules](https://support.twitter.com/articles/18311-the-twitter-rules#), the [Twitter developer policy](https://dev.twitter.com/overview/terms/policy), the [automation rules and best practices](https://support.twitter.com/articles/76915-automation-rules-and-best-practices) and learn about the [API Rate Limits](https://dev.twitter.com/rest/public/rate-limits).


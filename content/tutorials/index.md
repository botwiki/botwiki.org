/*
Title: Tutorials
Description: Learn how to make your own bot!
Date: July 24, 2015
Tags: machine learning,nlp,language,processing,opencv
Weight: 2
*/

[![Making Bots with Dexter](/content/tutorials/images/making-bots-dexter.png)](https://twitter.com/fourtonfish/status/664130256266264576){.float-right}


There is a variety of tools that make creating bots very easy. From [Cheap Bots Done Quick](http://cheapbotsdonequick.com/) (specifically for Twitter bots) and [Dexter](https://rundexter.com/), which is still in beta, but aims to make creating bots as easy as [dragging and dropping](https://twitter.com/fourtonfish/status/664130256266264576), to browser-based development environments, like [Cloud9](https://c9.io/). You can also find many [opensourced bots](/tag/opensource) that you can reuse and build on top of.

Botmaking has never been easier!

If you have any questions, try asking in our [community for botmakers and bot enthusiasts](https://botmakers.org/). 

### [¶](#network-specific-tutorials){.pilcrow} Network-specific tutorials {#network-specific-tutorials}

![Man, presumably reading a Twitterbot tutorial](/content/images/illustrations/man-reading-mail-768.jpg){.float-right}

- [Tutorials for Twitter bots](/tutorials/twitterbots)
- [Tutorials for Slack bots](/tutorials/slackbots)
- [Tutorials for YouTube bots](/tutorials/youtube-bots)
- [Tutorials for Reddit bots](/tutorials/redditbots)
- [Tutorials for IRC bots](/tutorials/irc-bots)
- [Tutorials for Telegram bots](/tutorials/telegram-bots)

### [¶](#bot-hosting){.pilcrow} Bot hosting {#bot-hosting}

You have quite a few options when it comes to hosting your bots.

- [DigitalOcean](https://digitalocean.com/) -- a popular VPS (Virtual Private Server), starts at $5/month (it's also used to host this site; our [referral link](https://www.digitalocean.com/?refcode=9e279abc3337) gets you $10 starter credit)
- [OpenShift](https://www.openshift.com/) -- a [PaaS](https://en.wikipedia.org/wiki/Platform_as_a_service), comes with a free plan
- [Cloud9](https://c9.io/) -- browser-based IDE (integrated development environment) that vastly simplifies the development process; offers a free plan that works well with OpenShift for hosting
- [Heroku](https://www.heroku.com) -- similar to OpenShift, but your app needs to "sleep" for six hours each day (see details on the [pricing page](https://www.heroku.com/pricing)) 
- [Linode](https://www.linode.com/) -- another VPS, starts at $10/mo
- [dreamhost](https://www.dreamhost.com/) -- web hosting and domain name registrar, their VPS starts at $15/month
- [Google Apps Script](https://script.google.com/d/11dB74uW9VLpgvy1Ax3eBZ8J7as0ZrGtx4BPw7RKK-JQXyAJHBx98pY-7/edit?usp=sharing) -- see [Bradley Momberger](https://twitter.com/air_hadoken)'s [blog](http://airhadoken.github.io/2015/06/29/twitter-lib-explained.html) for more details
- [PythonAnywhere](https://www.pythonanywhere.com/) -- "Host, run, and code Python in the cloud!" -- see also slides from the [Build A Bot](https://tpinecone.gitbooks.io/build-a-bot-workshop/content/index.html) workshop
- you can even use your [Raspberry Pi](http://www.instructables.com/id/Raspberry-Pi-Twitterbot/)

Specifically for Twitter bots, you can try:
- [Cheap Bots, Done Quick!](http://cheapbotsdonequick.com/) -- see [tutorials](/tutorials/twitterbots/#cheap-bots-done-quick) and [examples](/tag/cheapbotsdonequick) of bots created with CBDQ
- [tilde.town](http://tilde.town/) (Twitter and IRC bots)

**Note: ** [@beaugunderson](https://twitter.com/beaugunderson) is offering to let people host bots on his [Linode](https://www.linode.com/) account.

Common ways to manage multiple bots on the same network are:

- running each bot as a separate app/process with its own API keys
- running all of your bots in one app, using the same set of API keys
- or as a variation, you can create multiple apps, but still use the same API keys

For more general tutorials on hosting bots, see articles below. (Some [network specific tutorials](#network-specific-tutorials) include a step explaining how to host your bot.)

- [Automating bots with cron on DigitalOcean](http://www.colewillsea.com/blog/do-cron)

### [¶](#web-apis){.pilcrow} Learn to work with web APIs {#web-apis}
- [Codecademy](https://www.codecademy.com/apis) -- "learn how to use popular APIs to make your own applications"
- [Make Your Own Web Mashup: Introduction to Web APIs](https://fourtonfish.makes.org/thimble/make-your-own-web-mashup-introduction-to-web-apis) -- by [Stefan](https://twitter.com/fourtonfish)

### [¶](#other){.pilcrow} Other {#other}
- [Machine learning cheat sheet map](http://scikit-learn.org/stable/tutorial/machine_learning_map/index.html) -- "choosing the right estimator"
- [OpenCV tutorials](http://docs.opencv.org/doc/tutorials/tutorials.html)
- [Intro to NLP with spaCy](http://nicschrading.com/project/Intro-to-NLP-with-spaCy/) -- "an introduction to spaCy for natural language processing and machine learning with special help from Scikit-learn"
- [Finding Rhymes with Python](https://docs.google.com/presentation/d/1SxfHEdN8DGliH-Qa4zVsWtCcx5BZAQITXcd1OuDBz_U/edit?pli=1#slide=id.p) by [@nate_smith](https://twitter.com/nate_smith)
- [How to query Wikipedia like a database](http://tinysubversions.com/notes/how-to-query-wikipedia/)
- Video introduction of RiveScript by its author, Noah Petherbridge: [Part 1](https://www.youtube.com/watch?v=Vkd4chh0ewU), [part 2](https://www.youtube.com/watch?v=sRdm2OkZaGk), also see [rivescript.com](http://www.rivescript.com/)
- [Troubleshooting cron jobs for bot makers](http://lizmrush.com/cron-jobs-for-bot-makers/)
- [SMS for Humans: Using NLP and Python To Build Text Interfaces](https://www.youtube.com/watch?v=3o5awRDS0oI), with [Twilio.com](https://www.twilio.com/)

### [¶](#general-essays){.pilcrow} General, essays {#general-essays}
- [Basic Twitter bot etiquette](basic-twitter-bot-etiquette-tiny-subversions) -- by [Darius Kazemi](https://twitter.com/tinysubversions), applies to *all* bots
- [Bots Should Punch Up](bots-should-punch-up) -- by [Leonard Richardson](http://www.crummy.com/)
- [The Bot Stack](https://medium.com/why-not/the-bot-stack-a44bca123ce6) -- by [Ben Brown](https://twitter.com/benbrown)
- [Bots, bespoke code, and the materiality of software platforms](http://stuartgeiger.com/bespoke-code-ics.pdf)

Also check out [the opensourced bots](/tag/opensource).
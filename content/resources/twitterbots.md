/*
Title: Resources for Twitter bots
Description: Libraries and other resources specifically for Twitter bots.
Thumbnail: /content/images/illustrations/brambling-greenfinch-large.png
Show donation link: yes
Nav: hidden
*/

This is a suplementary page to the [general **Resources** section](/resources). Also check out [the Twitter bot tutorials](/tutorials/twitterbots) and [open source code for Twitter bots](/tag/twitter+opensource).


### [¶](#page-content){.pilcrow} Page content {#page-content}

- [Twitterbot frameworks](#twitterbot-frameworks)
  - [node.js](#twitterbot-frameworks-nodejs)
  - [Python](#twitterbot-frameworks-python)
  - [Ruby](#twitterbot-frameworks-ruby)
  - [Java](#twitterbot-frameworks-java)
  - [Other languages](#twitterbot-frameworks-other)
- [Language](#language)
- [Working with images](#images)
- [Other](#other) and [Unsorted](#other-unsorted)


<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">I threw together a quick template/mini-tutorial for making Twitter bots with <a href="https://twitter.com/gomixme">@gomixme</a>: <a href="https://t.co/YOz0Vt2g9a">https://t.co/YOz0Vt2g9a</a> <a href="https://t.co/XWcNnaNYFt">pic.twitter.com/XWcNnaNYFt</a></p>&mdash; Stefan Bohacek (@fourtonfish) <a href="https://twitter.com/fourtonfish/status/806537666443546624">December 7, 2016</a></blockquote>


### [¶](#twitterbot-frameworks){.pilcrow} Twitterbot frameworks {#twitterbot-frameworks}

#### [¶](#twitterbot-frameworks-nodejs){.pilcrow} node.js {#twitterbot-frameworks-nodejs}

- [ttezel/twit](https://github.com/ttezel/twit): a very good and simple node.js twitterbot module

#### [¶](#twitterbot-frameworks-python){.pilcrow} Python {#twitterbot-frameworks-python}

- [tweepy/tweepy](https://github.com/tweepy/tweepy): "Twitter for Python!" (see also [tweepy.github.com](http://www.tweepy.org/))
- [ryanmcgrath/twython](https://github.com/ryanmcgrath/twython): Python wrapper for the Twitter API
- [sixohsix/twitter](https://github.com/sixohsix/twitter): Python Twitter API
- [bear/python-twitter](https://github.com/bear/python-twitter): a Python wrapper around the Twitter API
- [thricedotted/twitterbot](https://github.com/thricedotted/twitterbot): a Python framework for creating interactive Twitter bots
- [hmason/botomatic](https://github.com/hmason/botomatic): easily create twitter bots in Python
- [swizzard/botmaster](https://github.com/swizzard/botmaster): making Twitter bots easier
- [bgporter/nanobot](https://github.com/bgporter/nanobot): a tiny little Python twitterbot framework (see [related blog post](https://artandlogic.com/2016/06/nanobot-tiny-little-twitterbot-framework/))
- [kootenpv/twitterqa](https://github.com/kootenpv/twitterqa): a Deep learning-based chatbot


#### [¶](#twitterbot-frameworks-ruby){.pilcrow} Ruby {#twitterbot-frameworks-ruby}

- [muffinista/chatterbot](https://github.com/muffinista/chatterbot): Ruby-based Twitter Bot Framework, using OAuth to authenticate
- [mispy/twitter_ebooks](https://github.com/mispy/twitter_ebooks): a framework for building interactive twitterbots which respond to mentions/DMs
- [negatendo/rubybottools](https://github.com/negatendo/rubybottools): a collection of tools for writing Twitter bots with Ruby


#### [¶](#twitterbot-frameworks-java){.pilcrow} Java {#twitterbot-frameworks-java}

- [joesondow/markov](https://github.com/joesondow/markov): a template for [Markov chain](https://simple.wikipedia.org/wiki/Markov_chain) Twitter bots
- [joesondow/lambda-twitter-base](https://github.com/joesondow/lambda-twitter-base: template project for building Twitter bots with Java and [AWS Lambda](https://aws.amazon.com/lambda/)

#### [¶](#twitterbot-frameworks-other){.pilcrow} Other languages {#twitterbot-frameworks-other}

- [zhaytee/botville](https://github.com/zhaytee/botville): a simple package for bootstrapping a Twitter bot in Go
- [matteoredaelli/twitterBot](https://github.com/matteoredaelli/twitterBot): a simple Twitter bot written in Elixir
- [Literal Twitter Bot Kit](https://www.adafruit.com/product/3281) (adafruit.com)

For more frameworks and libraries built for the Twitter platform, check out [Twitter Libraries](https://dev.twitter.com/resources/twitter-libraries) at dev.twitter.com.

### [¶](#language){.pilcrow} Language {#language}

See also the [Language section](/resources/libraries-frameworks#language) of ***Libraries and frameworks***.

#### [¶](#language-nodejs){.pilcrow} node.js {#language-nodejs}

- [twitter-fanfiction-botnet](https://www.npmjs.com/package/twitter-fanfic-botnet): tool for setting up groups of ebooks bots that talk to one another
- [tweet-packer](https://www.npmjs.com/package/tweet-packer): accepts an array of strings and appends them together into < 140 character tweets
- [clean-this-tweet-up](https://www.npmjs.com/package/clean-this-tweet-up): removes all #s, usernames, phone numbers, addresses, emails, and urls from a given tweet

#### [¶](#language-python){.pilcrow} Python {#language-python}

- [hugovk/word-tools](https://github.com/hugovk/word-tools): a collection of tools/mini-bots that do various language-related things, used by [@favibot](https://twitter.com/favibot), [@lovihatibot](https://twitter.com/lovihatibot) and [@nixibot](https://twitter.com/nixibot)
- [fitnr/twitter_markov](https://github.com/fitnr/twitter_markov): create [Markov chain](https://simple.wikipedia.org/wiki/Markov_chain) ("_ebooks") accounts


### [¶](#images){.pilcrow} Working with images {#images}

#### [¶](#images-python){.pilcrow} Python {#images-python}

- [hugovk/randimgbot](https://github.com/hugovk/randimgbot): an example of a bot that picks a random image and posts it, used by [@FlagFacts](https://twitter.com/FlagFacts)
- [bobpoekert/spatchwork](https://github.com/bobpoekert/spatchwork): segmentation-based image filter ("patchwork" effect)

### [¶](#other){.pilcrow} Tools, other {#other}

- [twitter/twitter-text](https://github.com/twitter/twitter-text/):  a collection of libraries and conformance tests to standardize parsing of tweet text


#### [¶](#other-nodejs){.pilcrow} node.js {#other-nodejs}

- [mkproj](https://www.npmjs.com/package/mkproj): tool for scaffolding node.js projects, includes an option for generating twitter bot boilerplate using the [ttezel/twit](https://github.com/ttezel/twit) module. 
- [filtered-followback](https://www.npmjs.com/package/filtered-followback): make your bot automatically follow people back, as long as they don't appear to be a malicious spam bot.


#### [¶](#other-python){.pilcrow} Python {#other-python}

- [OpenFuego](http://niemanlab.github.io/openfuego/): "watching Twitter all day—so you don’t have to"
- [araile/python-botutil](https://github.com/araile/python-botutil): small libraries for Python botmakers
- [leonardr/sycorax](https://github.com/leonardr/sycorax): "a Twitter client that choreographs the online behavior of fictional characters", read more on [crummy.com](http://www.crummy.com/software/sycorax/)
- [tdhopper/tau](https://github.com/tdhopper/tau): a template for creating a Twitter bot with [AWS Lambda](https://aws.amazon.com/lambda/)



#### [¶](#other-unsorted){.pilcrow} Unsorted {#other-unsorted}

- [cheapbotsdonequick.com](http://cheapbotsdonequick.com/): *"This site will help you make a Twitterbot!"* (see [examples](/tag/cheapbotsdonequick) of bots created with CBDQ)
- [Tracery Writer](https://beaugunderson.com/tracery-writer/): a tool that lets you write bots for CBDQ
- [Twitter key formatter](http://coleww.github.io/tweet-key-formatter/): a tool by [@colewillsea](https://twitter.com/colewillsea), see the [GitHub repo](https://github.com/coleww/tweet-key-formatter) for instructions
- [I Will Dance The OAuth Dance For You](http://v21.io/iwilldancetheoauthdanceforyou/): a tool to help obtain oauth credentials for an account
- [MikeNGarrett/twitter-blacklist](https://github.com/MikeNGarrett/twitter-blacklist): "100,000+ twitter account ids that are total crap, spam, or bots"
- [a Perl command line client](http://www.floodgap.com/software/ttytter/) 
- [Twitter Natural Language Processing](http://www.ark.cs.cmu.edu/TweetNLP/): tokenizer, a part-of-speech tagger, hierarchical word clusters, and a dependency parser for tweets, along with annotated corpora and web-based annotation tools
- [dariusk/grunt-init-twitter-bot](https://github.com/dariusk/grunt-init-twitter-bot): a [grunt init](http://gruntjs.com/project-scaffolding) template for making Twitter bots


<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">Never ceases to amaze, stun me that a significant number of the &quot;people&quot; on Twitter are programs.</p>&mdash; Josh Marshall (@joshtpm) <a href="https://twitter.com/joshtpm/status/840019038185103360">March 10, 2017</a></blockquote>


See also:

- [@tullyhansen](https://twitter.com/tullyhansen)'s collection of links on [bots](https://pinboard.in/u:tullyhansen/t:bots/) and [bot making](https://pinboard.in/u:tullyhansen/t:botmaking/)
- [bothub.org](http://bothub.org/): various links for Twitter bot makers
- [botpad.org](http://botpad.org/p/bot_resources): same as above, but the site is often inaccessible

[Back to all resources.](/resources)


<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
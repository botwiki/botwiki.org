/*
Title: How to Make a Twitter Bot: The Definitive Guide
Description: So you want to make a Twitter bot, now what?
Thumbnail: /content/tutorials/how-to-make-a-twitter-bot-definitive-guide/images/twitter-bots.png
Has code: yes
Show donation link: yes
Date: July 3, 2017
Tags: tutorial,guide,twitter,twitterbots,tweet frequency,api limit,api rate limit,how often should bot tweet,hyperdev,glitch,cheapbotsdonequick,cbdq,hosting,keywords,hashtags,phone number,fourtonfish,botwiki-original
*/

<div class="note">
  <p>
    This article is a draft, <a href="mailto:stefan@botwiki.org">feedback and suggestions</a> are very welcome!
  </p>
</div>


Hey there, [Stefan](/about/team/#stefan) here!

So you want to make a friendly/useful/artistic Twitter bot and probably have a bunch of questions, like *How often should my bot tweet?* or *Why am I getting this weird error message?* and *How do I even make a Twitter bot?*

Hopefully this ambitiously titled guide will answer your questions -- and you are always free to ask for more help [in the Botmakers community](https://botmakers.org/). 


<div class="row">
  <div class="col-sm-12 col-md-6 no-pad" markdown=1>
### Page content [¶](#page-content){.pilcrow} {#page-content}
- [Note on needing a phone number](#note-phone-number)
- [What kind of a bot should I make?](#what)
- [Can I make a bot that tracks keywords or hashtags?](#hashtags-keywords)
- [How often should my Twitter bot tweet?](#tweet-frequency)
- [Do I need to attribute content tweeted by my bot?](#bot-attribution)
- [How do I make a Twitter bot?](#bot-tutorials)
- [Where should I host my bot?](#bot-hosting)
- [Why is my bot not working?](#bot-not-working)
- [Wrap up](#wrap-up)
  </div>
  <div class="col-sm-12 col-md-6 no-pad">
    <blockquote class="twitter-tweet" data-lang="en"><p lang="und" dir="ltr"><a href="https://t.co/BIN3DTa7z0">pic.twitter.com/BIN3DTa7z0</a></p>&mdash; vennsplain (@vennsplain) <a href="https://twitter.com/vennsplain/status/925888068208521222?ref_src=twsrc%5Etfw">November 2, 2017</a></blockquote>
  </div>
</div>



### Note on needing a phone number [¶](#note-phone-number){.pilcrow} {#note-phone-number}

Quick note before we begin. One important requirement for making a bot on Twitter is [attaching a phone number](https://support.twitter.com/articles/110250-adding-your-mobile-number-to-your-account-via-web) to your bot's account. While this is more of a technical aspect of botmaking, it can be a real pain to deal with, so it's best to get over with it early.

For more information on this, check out the [Twitterbot tutorials page here on Botwiki](/tutorials/twitterbots/#note-phone-number).


### What kind of a bot should I make? [¶](#what){.pilcrow} {#what}

Let's first talk about the kinds of bots you absolutely should **not** make. Start by reviewing Twitter's [Rules and best practices](https://support.twitter.com/articles/69214) and their [Automation rules](https://support.twitter.com/articles/76915). There are also API rate limits, but we will [get into that shortly](#tweet-frequency).

The bottom line is this: **don't let your bot annoy people**. Try to avoid interacting with people who don't follow your bot or knowingly initiate the conversation either through a tweet with your bot's handle, a direct message, or a unique dedicated hashtag (see [@NixieBot](/bots/twitterbots/NixieBot/) for an example of such approach).

There certainly are [clever examples](https://botwiki.org/bots/twitterbots/wdywam/) of [bots who do interact with random Twitter users](http://www.shardcore.org/shardpress/2014/10/27/algobola/) who didn't explicitly opt-in, but this is a bit of a gray area and you should use your best judgement here.

And it hopefully doesn't even need to be said that you **shouldn't make bots that harass people**, post spam, or do any other malicious activity. Remember, [bots should always punch up, never punch down](/articles/bots-should-punch-up/).

As for *what* your bot should do, well, here are a few tips:

- [browse Botwiki](/bots/twitterbots/#browse-twitter-bots-by-category) and get inspired by what others made
- check out various [APIs, images, and public data sets](/resources/) you can use
- [learn more about the Twitter API](/tutorials/twitterbots/#twitter-api) and maybe even ["exploit" some of the quirks of the Twitter platform](/bots/twitterbots/pngbot/)
- the [Botmakers](https://botmakers.org/) Slack group has channels where people share their ideas and look for collaborators

For even more inspiration, check out [these essays and articles](/articles/essays/).

Making a (Twitter) bot is not always a straightforward process, with steps to go through. Sometimes the decisions you make affect each other, for example, you can start with an idea and then decide what language and hosting platform you'll use. But you can also first look at the various platforms you can use to host your bot and play with their strengths and limitations. More on that in an [upcoming section](#bot-hosting).

### Can I make a bot that tracks keywords or hashtags? [¶](#hashtags-keywords){.pilcrow} {#hashtags-keywords}

From Twitter's [Automation rules](https://support.twitter.com/articles/76915):

> Automated Retweets: Provided you comply with all other rules, **you may Retweet or Quote Tweet in an automated manner for entertainment, informational, or novelty purposes**. Automated Retweets often lead to negative user experiences, and bulk, aggressive, or spammy Retweeting is a violation of the Twitter Rules.

As explained above, there are some gray areas when it comes to automating certain actions on Twitter, including automated retweets.

One way around getting your retweet bot suspended is to make your bot private. This way you can follow the topics you're interested in without bothering anyone since notifications from private accounts don't show up to people your bot is not following.

The biggest drawback here is that it will be harder for others to discover your bot, and as of [February 2017](https://twittercommunity.com/t/how-do-i-use-the-twitter-api-to-approve-a-follower-request-for-a-protected-account/82579), there is no way to approve follower requests for a protected account via the Twitter API, so you will have to handle follower requests manually.


### How often should my Twitter bot tweet? [¶](#tweet-frequency){.pilcrow} {#tweet-frequency}

Alright, you might have a rough idea what your bot is going to be posting about now, great! How often should it post though?

As I mentioned earlier, Twitter has [limits on how often you can call their API](https://support.twitter.com/articles/15364), so you should keep those in mind.

Other than that, it's all about striking the right balance. If your bot tweets every time a certain event happens, it's okay if your bot posts more frequently, as long as it stays under the [API rate limit](https://developer.twitter.com/en/docs/ads/general/guides/rate-limiting).

But also consider that some people don't want their home timeline cluttered with just one account, so for bots that don't work with real-time data, spacing the tweets out makes a lot of sense. As I said above, one good rule to follow is to make sure your bot doesn't annoy people.

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">How often should a Twitter bot tweet?</p>&mdash; Ian Brown (@igb) <a href="https://twitter.com/igb/status/877731018538573824">June 22, 2017</a></blockquote>

There are bots that post every hour, once or twice a day, or even just once throughout the whole year.

Here are some thoughts from a member of [Botmakers](https://botmakers.org/):


> Hard question.  I look at it as a logarithmic-scale line starting at once a minute and ending somewhere around once a week or month.
>
> There is a hard upper bound of 25 tweets per 15 minutes per account.
> 
> There are multiple approaches you can take to figure this out, and they're mostly situational:
>
> The easiest approach is to have your bot post as often as it can, like if you're running [@congressedits](/bots/twitterbots/congressedits/), you want to catch *all* edits.
>
> If you have too much information for this and need to attenuate the flow, or if your corpus is fixed or precomputed, then it comes down to questions like, do I want to follow this bot myself?  How often would I like to hear from it if so?  Is there prior art that I am mimicking?  If it's a fixed corpus, how long should it run before it ends?   How often would others like to hear from it?  should it be annoying/how much so?
> 
> If you're unsure, post every 30 or 60 minutes, tweak it later if you don't like it.
>
> **-- @air_hadoken**

<br/>

### Do I need to attribute content tweeted by my bot? [¶](#bot-attribution){.pilcrow} {#bot-attribution}

[Absolutely!](https://twitter.com/i/moments/901869159931187200)



### How do I make a Twitter bot? [¶](#bot-tutorials){.pilcrow} {#bot-tutorials}

With most of the non-technical questions out of the way, it's time to actually build your Twitter bot.

Botwiki has [a lot of tutorials](/tutorials/twitterbots/) and there are many [open-source Twitter bots](/tag/bot+twitter+opensource/) and [Twitter bot project templates on Glitch](/tutorials/hosting-bots-glitch/#project-templates-twitter) that you can use.

Just find one that's close to your own bot idea and take it from there.

### Where should I host my bot? [¶](#bot-hosting){.pilcrow} {#bot-hosting}

There is a number of platforms you can use depending on how much you're willing to spend (no worries, free options exist) and how comfortable you are dealing with web servers.

Also, when coming up with ideas for a new bot, it might actually be helpful to start here. For example, [Cheap Bots, Done Quick!](/tag/cheapbotsdonequick/) is a site that lets you make bots using Tracery and hosts them for free. It doesn't require advanced programming skills, but is flexible enough so that you can get really creative.

[Glitch](/tutorials/hosting-bots-glitch/) gives you more freedom while taking care of most of the technical challenges for you (and comes with some [cool libraries pre-installed](https://support.glitch.com/t/does-glitch-have-imagemagick/1423)). And it's also free to use.

For a comprehensive list of available hosting platforms, [see the **Bot hosting** page on Botwiki](/tutorials/bot-hosting/).

### Why is my bot not working? [¶](#bot-not-working){.pilcrow} {#bot-not-working}


Twitter will [send you an error message](https://developer.twitter.com/en/docs/basics/response-codes) that should help you understand why your bot stopped working.

For example, if you're using [the Twit library](https://github.com/ttezel/twit), here's how you can see the error message:

```
T.post('statuses/update', { status: 'hello world!' }, function(err, data, response) {
  if (err){
    console.log(err);
  }
})
```

It's possible that your bot tweets or reads the data from Twitter too often, then you just need to adjust the frequency. It's also possible that your bot was suspended, in which case you will also get an email notification and instructions on what to do next.

If you're not getting any error messages from Twitter, and the bot doesn't seem to be suspended, the problem might be with your code. It's perfectly fine to ask for help, in fact, that's why [the Botmakers community](https://botmakers.org/) exists. Glitch even has an ["ask for help"](https://medium.com/glitch/just-raise-your-hand-how-glitch-helps-aa6564cb1685) feature built right into it.


### Wrap up [¶](#wrap-up){.pilcrow} {#wrap-up}

I hope this guide will help you deal with some of the biggest questions and challenges of making friendly Twitter bots. Be sure to [join us in the Botmakers community](https://botmakers.org/). We are artists, journalists, educators, tinkerers, bot enthusiasts, seasoned developers, and always happy to help a fellow botmaker out :-)

If you'd like to leave me feedback and suggestions for this guide, feel free to [send me an email](mailto:stefan@botwiki.org)!

PS: See more of my tutorials [here](/tag/tutorial+fourtonfish/).


### Special thanks [¶](#special-thanks){.pilcrow} {#special-thanks}

- [Eric](http://www.shardcore.org/) (shardcore.org)

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

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

Hopefully this ambitiously titled guide will answer most of your questions -- and you are always free to ask for more help [in the Botmakers community](https://botmakers.org/). 

### Page content [¶](#page-content){.pilcrow} {#page-content}

- [Note on needing a phone number](#note-phone-number)
- [What kind of a bot should I make?](#what)
- [Can I make a bot that tracks keywords or hashtags?](#hashtags-keywords)
- [How often should my Twitter bot tweet?](#tweet-frequency)
- [How do I make a Twitter bot?](#bot-tutorials)
- [Where should I host my bot?](#bot-hosting)
- [Why is my bot not working?](#bot-not-working)
- [Wrap up](#wrap-up)


### Note on needing a phone number [¶](#note-phone-number){.pilcrow} {#note-phone-number}

Quick note before we begin. One important requirement for making a bot on Twitter is [attaching a phone number](https://support.twitter.com/articles/110250-adding-your-mobile-number-to-your-account-via-web) to your bot's account. While this is more of a technical aspect of botmaking, it can be a real pain to deal with, so it's best to get over with it early.

For more information on this, check out the [Twitterbot tutorials page here on Botwiki](/tutorials/twitterbots/#note-phone-number).


### What kind of a bot should I make? [¶](#what){.pilcrow} {#what}

Let's first talk about the kind of bots you absolutely should *not* make. Start by reviewing Twitter's [Rules and best practices](https://support.twitter.com/articles/69214) and their [Automation rules](https://support.twitter.com/articles/76915). There are also the API limits, but we will get into that shortly.

The bottom line is this: **don't let your bot annoy people**. That means, don't let it interact with people who don't follow your bot or knowingly initiate the conversation either through a tweet with your bot's handle, a unique dedicated hashtag (see [@NixieBot](/bots/twitterbots/NixieBot/) for an example), or a direct message.

While there certainly are clever examples of [bots who do interact to random strangers](http://www.shardcore.org/shardpress/2014/10/27/algobola/), understand that this absolutely goes against Twitter's policy and you have a decent chance of getting your bot suspended, even if you believe the bot's behavior is innocent.

And it hopefully doesn't even need to be said that you **shouldn't make bots that harass people**, post spam, or do any other malicious activity. Remember, [bots should always punch up, never punch down](/articles/bots-should-punch-up/).

As for *what* your bot should do, well, you can always [browse Botwiki](/bots/twitterbots/#browse-twitter-bots-by-category) and get inspired by what others made. Or check out the various [APIs, images, and public data sets](/resources/) you can use. You can also [learn more about the actual Twitter API](/tutorials/twitterbots/#twitter-api) and maybe even ["exploit" some of the quirks of the Twitter platform](/bots/twitterbots/pngbot/).

For even more inspiration, check out [essays for botmakers](/articles/essays/), and more specifically, [these essays on ethical botmaking](/articles/bot-ethics/).

Making a (Twitter) bot is not always a straightforward process, with steps to go through. Sometimes the decisions you make affect each other, for example, you can start with an idea and then decide what language and hosting platform you'll use. But you can also first look at the various platforms you can use to host your bot and play with their strengths and limitations. More on that in an [upcoming section](#bot-hosting).

### Can I make a bot that tracks keywords or hashtags? [¶](#hashtags-keywords){.pilcrow} {#hashtags-keywords}

As explained above, bots that retweet people who didn't opt into interacting with your bot are likely to get suspended. One way around this is to make your bot private and have it follow your main account. This way you can follow the topics you're interested in without disturbing anyone, since notifications from private accounts don't show up to people your bot is not following.

### How often should my Twitter bot tweet? [¶](#tweet-frequency){.pilcrow} {#tweet-frequency}

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">How often should a Twitter bot tweet?</p>&mdash; Ian Brown (@igb) <a href="https://twitter.com/igb/status/877731018538573824">June 22, 2017</a></blockquote>

Alright, you might have a rough idea what your bot is going to be posting about now, great! How often should it post though?

As I mentioned earlier, Twitter has [limits on how often you can call their API](https://support.twitter.com/articles/15364), so you should keep those in mind.

Other than that, it's all about striking the right balance. If your bot tweets every time a certain event happens, it's okay if your bot posts more frequently, as long as it stays under the API rate limit.

But also consider that some people don't want their home timeline cluttered with just one account, so for bots that don't work with real-time data, spacing the tweets out makes a lot of sense. As I said above, one good rule to follow is to make sure your bot doesn't annoy people.

There are bots that post every hour, once or twice a day, or even just once throughout the whole year.

Here are some thoughts from one of the Botmakers community members:


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


Twitter will [send you an error message](https://dev.twitter.com/overview/api/response-codes) that should help you understand why your bot stopped working.

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

I hope this guide will help you deal with some of the biggest questions and challenges of making friendly Twitter bots. Be sure to [join us in the Botmakers community](https://botmakers.org/). We are artists, journalists, educators, tinkerers, bot enthusiasts, seasoned developers, and always happy to help a fellow botmaker out!

If you'd like to leave me feedback and suggestions for this guide, feel free to [send me an email](mailto:stefan@botwiki.org)!


<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

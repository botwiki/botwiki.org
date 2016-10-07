/*
Title: Bots Should Punch Up
Author: Leonard Richardson
Description: "Always punch up, never punch down!"
Nav: hidden
*/

*Originally posted on [crummy.com](http://www.crummy.com/2013/11/27/0) by [Leonard Richardson](https://twitter.com/leonardr). See also: [Bot Ethics](/bot-ethics/).*

Over the weekend I went up to Boston for Darius Kazemi's ["bot summit"](http://tinysubversions.com/2013/11/bot-summit/). You can see the four-hour video if you're inclined. I talked about [@RealHumanPraise](https://twitter.com/realhumanpraise) with Rob, and I also went on a long-winded rant that suggested a model of extreme bot self-reliance. If you take your bots seriously as works of art, you should be prepared to continue or at least preserve them once you're inevitably shut off from your data sources and your platform.

We spent a fair amount of time discussing the ethical issues surrounding bot construction, but there was quite a bit of conflation of what's "ethical" with what's allowed by the Twitter platform in particular, and website Terms of Service in general. I agree you shouldn't needlessly antagonize your data sources or your platform, but what's "ethical" and what's "allowed" can be very different things. However, I do have one big piece of ethical guidance that I had to learn gradually and through osmosis. Since bots are many hackers' first foray into the creative arts, it might help if I spell it out explicitly.

Here's an illustrative example, a tale of two bots. Bot #1 is [@CancelThatCard](https://twitter.com/cancelthatcard). It finds people who have posted pictures of their credit or debit card to Twitter, and lets them know that they really ought to cancel the card and get a new one.

![@cancelthatcard](/content/tutorials/images/cancelthatcard.png)

Bot #2 is [@NeedADebitCard](https://twitter.com/needadebitcard). It finds the same tweets as @CancelThatCard, but it retweets the pictures, collecting them in one place for all to see.

![@NeedADebitCard](/content/tutorials/images/needadebitcard.png)

Now, technically speaking, @CancelThatCard is a spammer. It does nothing but find people who mentioned a certain phrase on Twitter and sends them a boilerplate message saying "Hey, look at my website!" For this reason, @CancelThatCard is constantly getting in trouble with Twitter.

As far as the Twitter TOS are concerned, @NeedADebitCard is the Gallant to @CancelThatCard's Goofus. It's retweeting things! Spreading the love! Extending the reach of your personal brand! But in real life, @CancelThatCard is providing a public service, and @NeedADebitCard is inviting you to steal money from teenagers. (Or, if you believe its bio instead of its name, @NeedADebitCard is a pathetic attempt to approximate what @CancelThatCard does without violating the Twitter TOS.)

At the bot summit I compared the author of a bot to a ventriloquist. Society allows a ventriloquist a certain amount of license to say things via the dummy that they wouldn't say as themselves. I know ventriloquism isn't exactly a thriving art, but the same goes for puppets, which are a little more popular. If you're an MST3K fan, imagine Kevin Murphy saying Tom Servo's lines without Tom Servo. It's pretty creepy.

We give a similar license to comedians and artists. Comedians insult audience members, and we laugh. Artists do strange things like exhibit a urinal as sculpture, and we at least try to take them seriously and figure out what they're saying.

But you can't say absolutely anything and expect "That wasn't me, it was the dummy!" to get you out of trouble. There is a general rule for comedy and art: **always punch up, never punch down**. We let comedians and artists and miscellaneous jesters do outrageous things *as long as they obey this rule*. You can poke fun at yourself (Stephen Colbert famously said "There's no status I would not surrender for a joke"), you can make a joke at the expense of someone with higher social status than you, but if you mock someone with lower status, it's not cool.

If you make a joke, and people get really offended, it's almost certainly because you violated this rule. People don't get offended randomly. Explaining that "it was just a joke" doesn't help; everyone knows what a joke is. The problem is that you used a joke as a means of being an asshole. Hiding behind a dummy or a stage persona or a bot won't help you.

@NeedADebitCard feels icky because it's punching down. It's saying "hey, these idiots posted pictures of their debit cards, go take advantage of them." Is there a joke there? Sure. Is it ethical to tell that joke? Not when you can make exactly the same point without punching down, as @CancelThatCard does.

The rules are looser when you're in the company of other craftspeople. If you know about the "Aristocrats" joke, you'll know that comedians tell each other jokes they'd never tell on the stage. All the rules go out the window and the only thing that matters is triggering the primal laughter response. But also note that *the must-have guaranteed punchline* of the "Aristocrats" joke ensures that it always ends by punching upwards.

You're already looking for loopholes in this rule. That's okay. Hackers and comedians and artists are always attracted to the grey areas. But your bot is an extension of your will, and if you're a white guy like me, *most of the grey areas are not grey in your favor*.

This is why I went through thousands of movie review blurbs for @RealHumanPraise in an attempt to get rid of the really sexist ones. It's an unfortunate fact that Michelle Malkin has more influence over world affairs than I will ever have. So I have no problem mocking her via bot. But it's really easy to make an *incredibly sexist* joke about Michelle Malkin as a way of trying to put her below me, and that breaks the rule.

There was a lot of talk at the bot summit about what we can do to avoid accidentally offending people, and I think the key word is 'accidentally.' The bots we've created so far aren't terribly political. Hell, Ed Henry, chief White House correspondent for FOX News, follows @RealHumanPraise on Twitter. If he enjoys it, it's not the most savage indictment.

In comedy terms, we botmakers are on the nightclub stage in the 1950s. We're creating a lot of safe nerdy Steve Allen comedy and we're terrified that our bot is going to accidentally go off and become Andrew Dice Clay for a second. There's nothing wrong with Steve Allen comedy, but I'd also like to see some George Carlin type bots; bots that will, by design, offend some people. (Darius's [@AmIRiteBot](https://twitter.com/AmIRiteBot) is the only example I know of.)

Artists are, socially if not legally, given a certain amount of license to do things like infringe on copyright and violate Terms of Service agreements. If you get in trouble, the public will be on your side, unless you betrayed their trust by breaking the fundamental ethical rule of comedy. So do it right. Design bots that punch up.


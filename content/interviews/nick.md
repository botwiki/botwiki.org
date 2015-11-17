/*
Title: Nick Harasym 
Description: Nick Harasym, a Platform Support Specialist at DigitalOcean.
Nav: hidden
Author: Stefan Bohacek
Date: November 3, 2015
Tags: interview,digitalocean
*/

![](/content/interviews/images/nick.png)


Nick Harasym is a Platform Support Specialist at [DigitalOcean](https://www.digitalocean.com/). He also works on a bot for the [DigitalOcean](https://www.digitalocean.com/)'s support team.


**Stefan:** Hi Nick, thanks a lot finding time for me today!

**Stefan:** So you're an engineer at [DigitalOcean](https://www.digitalocean.com/), a company I'm using myself to host all of my projects, including [Botwiki.org](https://botwiki.org/). Do you use [DigitalOcean](https://www.digitalocean.com/) yourself?

![Nick Harasym](/content/interviews/images/nick-photo.png){.float-right .add-padding}


**Nick:** Yes, I do use [DigitalOcean](https://www.digitalocean.com/) for some personal projects I have running
 
**Stefan:** Nice, well I'm sure you're going to say you're very happy with it -- not just because you work there, they provide a great service!
 
**Stefan:** So what exactly do you do at [DigitalOcean](https://www.digitalocean.com/)?

**Nick:** Currently I work as a platform support specialist. This role involves handling customer support and billing requests. I also maintain one of the bots that the support team uses on a daily basis.
 
**Stefan:** Hmm, customer support. It must be much better, though, than the average tech support experience, right? I mean, are your customers mostly nerds?
 
**Stefan:** You probably do get a lot of emails about coupons, haha.


**Nick:** I do enjoy [DigitalOcean](https://www.digitalocean.com/) much more than my past jobs. Our customer base is a lot of developers, ranging from those working on hobby projects to full production websites. It is a great mix of different kinds of users. The amount of questions about coupons come and go depending on kind of events are running.
 
**Stefan:** Right. Going back to you mentioning personal projects, what are some you'd like to share? 

**Nick:** For personal projects I used [DigitalOcean](https://www.digitalocean.com/) to build a game server control panel a year or so ago. I also built a website to track a minecraft server's player count over a period of time.

**Nick:** I did have a small personal bot for the game server control panel that enabled the ability to start and stop services
 
**Stefan:** Yeah, you mentioned working on a bot for [DigitalOcean](https://www.digitalocean.com/)'s support team. I assume this is in [Slack](https://slack.com/)?

**Nick:** Yes, it is a [Slack](https://slack.com/) bot.
 
**Stefan:** I think [Slack](https://slack.com/) is really taking bots mainstream. I mean I only know of Twitter -- and perhaps IRC -- having any sort of ecosystem or even communities around bots. And those are mostly small, disjointed communities.
 
**Stefan:** But "everybody" uses [Slack](https://slack.com/), including non-technical people, it's just such a great tool. And these bots really take it a few steps further. One of the reason I enjoy working on bots -- I will be focusing more on our very own @botwikibot more in the coming weeks, well one thing I like is making something for people who are not necessarily technical, you know? My other bigger project, simplesharingbuttons.com, it has a lot of users who send me questions and I can see they're not very technical. So it's nice to be able to create something that's, hmm, for a more general audience to enjoy?

 
**Stefan:** There are some good articles on [botwiki.org](https://botwiki.org/articles/), if you have time later, about "chat UI" and similar topics -- and [Slack](https://slack.com/) is definitely behind what's making these things go mainstream, really.

**Stefan:** What would you say you like about making bots the most?


**Nick:** Well in my mind bots make it easier to do things especially in the work flow of a task. I really like it when an idea for a bot turns into a bot and makes lives easier. The feedback from users of bots is also amazing.

 
**Stefan:** Oh definitely. The way I actually got into web development at all, I was working at a more senior position at IBM and our tools -- well, it was just a mess. You had to do a lot of copy/pasting.

 
**Stefan:** And I had some background in programming, so I thought -- hey, let me automate this stuff! So I did, with [Greasemonkey](https://addons.mozilla.org/en-us/firefox/addon/greasemonkey/) and some very basic JavaScript. And what do you know, it worked, and a lot of people were happy.

 
**Stefan:** I made these various automation tools -- and this really is what many bots are -- that just made everyone's life much easier. And I also enjoyed hearing from colleagues: Man, this is good! Thanks a lot for putting your time into this!

 
**Stefan:** What are some of the features of your bot, what does it do, more specifically? Do you get to put in any "easter eggs", or just some friendly, non-essential stuff?


**Nick:** So currently the bot has three core features and an easter egg. The first feature allow us to schedule tasks that need to happen at a specific time, like following up on a ticket and it can also allow us to delete tasks that might not be needed anymore. The second feature notifies us of upcoming events. This works great when a task is created during one shift however the time for the task falls within another. The third feature allows us to pull some data from PassiveTotal


**Nick:** As for an easter egg, there is a function to pull images from xkcd

 
**Stefan:** Ah, yes, the mandatory "relevant XKCD". Makes sense!


**Nick:** Yup, turns out they have [an API](https://xkcd.com/json.html).

 
**Stefan:** Really? I had no idea. I think there's going to be a bunch of new bots once the next issue of Bot! zine goes out.


**Nick:** Currently I am working on expanding the notification system. It only posts the notification once. Sometimes if there is a lot of chat going on in the channel that notifications go to, they can be lost. To resolve that I am adding a requirement of anyone in the channel adding an :ack: reaction to the message to silence it. If no one adds the reaction then it will post it again five or so minutes later.


**Nick:** I am working with our Trust and Safety team to add some features that they are interested in having as well. One non-essential feature that should make its way into the bot at some point would be a better way of alerting all of the people in the channel that are on shift. @here and @channel can sometimes notify people who are not on shift at the time

 
**Stefan:** That sounds pretty good. What are some of the other bots [DigitalOcean](https://www.digitalocean.com/) uses, any particularly clever/funny ones?


**Nick:** We do have a bot that posts in information about tickets from the last hour. Specifically how many we handled and average response time. We have bots that alert us to issues that might happening within the network. There are a few bots that help with workflow on resolving droplet issues.


**Nick:** The bot that I worked on did randomly post quotes from 343 from the Halo series but I turned that off as it could be a little annoying


**Nick:** Some other bots did also post random quotes as well and sometimes post things related to chat going on in a channel but I haven't seen that for a bit now.

 
**Stefan:** Haha, yeah, you have to be careful when making these bots. They can be fun to most people, but still, you have to take everyone into account.

**Stefan:** So I was wondering --

**Stefan:** The folks at [DigitalOcean](https://www.digitalocean.com/) were super nice, setting our chat up -- and I must say, you all seem like very nice people, from my brief interactions with whoever is managing your official Twitter account. How did the whole thing go, did you know about [Botwiki.org](https://botwiki.org/) before you were asked about this interview, were you "assigned" to speak with me or were there other people who were maybe interested? Just curious.


**Nick:** I did not know about [Botwiki.org](https://botwiki.org/) before. When we received the message on Twitter, the person monitoring Twitter knew that I had being working on bots for support so they recommended me. Though I am not sure if other people were interested in doing the interview.

**Stefan:** Well I'm happy to hear that bots get you excited! Yeah, you mentioned a few personal bots, the bot you're working on at your job. Do you see yourself working on more personal bot projects?


**Nick:** I do see my self working on more bots for personal projects. Once I had an understanding of how bots work and how they plug in to systems. It isn't that hard to start expanding them to other projects.

 
**Stefan:** Yeah, that's one other thing I like about making bots. You really just need to pull together a few APIs, and you can really focus mostly on how your bot interacts with its user or users.
I mean you still need some technical knowledge, although there are tools that make particularly making bots much more accessible to non-coders, but yeah, most of the work necessary is pretty straightforward.
Did you have a chance to check out any of the bots on [Botwiki.org](https://botwiki.org/)? Or maybe you already know some public bots that you would count as your favorite?


 

**Nick:** Yeah I did look at the site yesterday. I find it interesting that games have been made into bots. I never really thought about doing that however I could see that being very interesting

 
**Stefan:** Yeah, I mean there are really many different kinds of bots, from simple image bots, to all kinds of interactive bot-powered games. One of the projects we actually discussed on Botmakers.org was a Slack-powered MMORPG. 
When you think about it, the non-playable characters in games are pretty much just bots, you know.



**Nick:** To be honest I really haven't thought much about making a bot outside of what I have done so far. However contributing to a public bot would be nice.

 
**Stefan:** Well, as I mentioned, we are talking about a few projects in our Slack group, so you're more than welcome to hang around and join in!

**Stefan:** It was really nice talking to you and getting to know you a bit, thanks, again for finding the time!

**Nick:** Sure, I would be more then happy to check those out. It was great talking to. Thank you for your time as well!

 

 

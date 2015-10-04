/*
Title: Botmaking with OpenShift: Lesson One
Description: OpenShift, terminal and the API keys stuff
Nav: hidden
*/


Hey there, welcome to the *Botmaking with OpenShift* series, originally to be named *Botmaking for fun, bringing down oppressive structures through the means of political commentary via automated online bots, and potentially a little bit of profit*. I decided against the original name mainly due to the idea of actually making a profit with non-malicious, non-spam bots is *pretty* ridiculous.

Also, I am hoping to get some kind of a sponsorhip deal with [OpenShift](https://www.openshift.com/), now how about that, that would be pretty cool, eh?!

My name is Stefan *[stefn]* (or [@fourtonfish](https://twitter.com/fourtonfish)) on Twitter -- *Feel free to follow me, but don't expect me to "follow back" just because you did. Look, I can't just follow *everybody*, alright?* -- and this series will take you from a bot enthusiast to an expert [botmaker](https://botmakers.org/) in -- well, I guess that really depends on many factors, like your style of learning, how much fun you're going to have, etc, etc.

But don't worry, *I'll get you there, alright*? We're in this together now, alright?

Oh, one more thing. This tutorial is for people who want to make "useful, interesting, artistic and friendly online bots", just like the tagline of this website says. (Hey, did I mention I made this website? Yep, that's me! 👋 Hi, what's up?)

With that being said, don't be a jerk and use my site to make spam bots, okay? Me and other folks are putting a lot of effort into making all these tutorials, libraries, APIs and what not, and we'd really hate to see someone use all that to do harm, abuse or just create something uninspiring. Alright? So if you're _that person_, just leave, this site and this tutorial are not for you.

Still with me?

Cool, let's do this, then.

![OpenShift by Red Hat](/content/tutorials/botmaking-with-openshift/images/openshift-logo.png)


## [¶](#what-is-openshift){.pilcrow} What Is OpenShift? {#what-is-openshift}

According to [Wikipedia](https://en.wikipedia.org/wiki/OpenShift):

> OpenShift is a platform as a service product from Red Hat.

Great. But what is *platform as a service*?

*[Click.](https://en.wikipedia.org/wiki/Platform_as_a_service)*

> [It] provides a platform allowing customers to develop, run, and manage Web applications without the complexity of building and maintaining the infrastructure

Right. That makes sense. So OpenShift really is just some kind of a web hosting service. *Neat.*

OpenShift is actually a pretty good hosting solution, I used it myself before moving all of my projects to [Digital Ocean](https://www.digitalocean.com/). It lets you create three apps for free and unlike [Heroku](https://dashboard.heroku.com/), it doesn't force you to shut down your app for several hours a day. What's up with that, Heroku?

So let's start by signing up for an account on the [openshift.com](https://www.openshift.com/) website.

/*
Title: Botmaking with OpenShift: Lesson One
Description: Welcome to Openshift
Nav: hidden
*/


Hey there, welcome to the *Botmaking with OpenShift* series!

My name is Stefan *[stefn]* (or [@fourtonfish](https://twitter.com/fourtonfish)) on Twitter, and this series will take you from a bot enthusiast to an expert [botmaker](https://botmakers.org/) in less than -- well, I guess that really depends on many factors, like your style of learning, how much fun you're going to have, and so on.

But don't worry, *I'll get you there, alright*? We're in this together now, *alright*?

Oh, one more thing. This tutorial is for people who want to make "useful, interesting, artistic and friendly online bots", just like the tagline of this website says. (Hey, did I mention I [made this website](/about)? Yep, that's me! 👋 Hi, what's up?)

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

## [¶](#openshift-getting-started){.pilcrow} Getting started with OpenShift? {#openshift-getting-started}

Anyway. Let's start by signing up for an account on the [openshift.com](https://www.openshift.com/) website.

![Signing up for an account](/content/tutorials/botmaking-with-openshift/images/lesson-1-img-01-signup.png)

After you fill out the signup form, you will be asked to verify your email and after that, you will also have to accept the terms of service. Once all that is taken care of, you'll see the welcome page.

![Welcome](/content/tutorials/botmaking-with-openshift/images/lesson-1-img-02-welcome.png)

Now, it might be tempting to click *Create your first application now*, but we're not quite ready for that yet. We need to first install a few things that we'll be using to create our bots. And this will vary depending on what operating system (OS) you happen to be using. There is no right or wrong answer here, but most common options are:

 - Windows
 - Mac/OS X
 - some Linux distribution, for example Ubuntu, Fedora or Mint

***Note:*** If you're on Windows and want to get more geeky about this whole thing, check out [this article](http://daverupert.com/2015/10/windows-editors-and-shells/) showing some useful tools for developers using Windows. Bottom line: [*cmder*](http://cmder.net/) looks very nice.

OpenShift's [Getting Started](https://developers.openshift.com/en/getting-started-overview.html) page provides pretty comprehensive tutorials for all major operating systems, so you should be fine just following the one for your OS.

At the end, you should have installed the following

 - **git** -- a version control system, which will be also used for pushing your bot app to your OpenShift server
 - **Ruby** -- a popular programming language; you won't really need to learn this, it's just required by OpenShift
 - **rhc** -- command line interface for OpenShift (a little program that will let you control your OpenShift apps)

Awesome, we did most of the hard work already! You can pick [any of the following tutorials](/tutorials/botmaking-with-openshift/) based on the kind of a bot you want to create.

Thanks -- and good luck with your new bot!

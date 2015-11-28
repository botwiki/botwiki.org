/*
Title: Making a Twitter bot with node.js, OpenShift, and Cloud9
Description: Learn to make a simple Twitter-based game.
Date: November 25, 2015
Tags: tutorial,twitter,cloud9,openshift,node,nodejs,node.js,fourtonfish
*/

Hey there, this is Stefan, the creator of **Botwiki.org**.

In this tutorial, I'm going to guide you through the creation of a simple Twitter bot that will randomly select and post a country flag and wait for someone to respond with the correct name of the matching country. (It's a bit of a twist on a [game I made a while ago](http://blog.fourtonfish.com/post/75785207705/object-recognition-powered-games-demo-2).)

I'm also going to show you how you can easily save the score in a [Google Sheets](https://www.google.com/sheets/about/) spreadsheet.

We are going to use the following tools:

- [OpenShift](https://www.openshift.com/), an awesome [Platform as a Service](https://en.wikipedia.org/wiki/Platform_as_a_service), or very simply put -- "advanced web hosting",
- [Cloud9](https://c9.io/fourtonfish), a browser-based [Integrated Development Environment](https://en.wikipedia.org/wiki/Integrated_development_environment), or in other words, a web app where you will write your code,
- and [node.js](https://nodejs.org/), a way of running [JavaScript](https://en.wikipedia.org/wiki/JavaScript) on the server

***Quick note: You might need to disable your adblocking addon/plugin for the [Cloud9](https://c9.io/) website. At least I had a small problem when the site wouldn't allow me to continue when adding a new project.***

### [¶](#step-1){.pilcrow} Creating a Twitter app {#step-1}

The way you make bots on Twitter is that you first create a new account, which is going to be the actual bot, and a Twitter app, through which you will control this bot.

So let's start by [creating a new Twitter account](https://twitter.com/signup). This is relatively straightforward. Now, the tricky part is that if you want your app to be able to post to Twitter, rather than just read from it, you will need to add a phone number to your account. See the [**Note on needing a phone number**](/tutorials/twitterbots#note-phone-number) section of the Twitter bot tutorials page for possible solutions.

After you create your account, go to [apps.twitter.com](https://apps.twitter.com/) and create a new app. 

![Creating new Twitter app](/content/tutorials/images/making-what_capital/new-twitter-app.png)

The information here won't really show up anywhere that's relevant for us. Once you're done here and on the next page, switch to the **Keys and Access Tokens** tab. Under **Application Settings**, make sure that it says *Read and write* for your app's **Access level**.

In a moment, we are going to need four things from this page:

- Consumer Key
- Consumer Secret
- Access Token
- Access Token Secret

You need to click the button in the **Your Access Token** section to generate the last two. Done? Perfect, let's keep this page open for now.


### [¶](#step-2){.pilcrow} Signing up for Cloud9 {#step-2}

![Cloud9](/content/tutorials/images/making-what_capital/cloud9-logo.png){.float-right}


As explained earlier, Cloud9 is a browser-based IDE, or [Integrated Development Environment](https://en.wikipedia.org/wiki/Integrated_development_environment). All this means is just that you can use it to write code, and most of the other things, like setting up your working environment and deploying your app to a server will be taken care of for you.

Cloud9 offers a [free plan](https://c9.io/pricing/public), which offers more than enough for our simple Twitter bot.

So let's [sign up for our free account](https://c9.io/web/sign-up/free). After we fill out all the necessary information, we should land in our Workspaces view. 

We're mostly done here for now, but let's head to our [account page](https://c9.io/account/ssh) and copy our *SSH key*. You can think of an SSH key as a sort of password. (Feel free to [read more about SSH on Wikipedia](https://en.wikipedia.org/wiki/Secure_Shell).) We will use this key on OpenShift so that we can host our bot there.

You can either copy your key now and close the site, or just keep it open as we move on to signing up for an OpenShift account.

***Note: We could easily use Cloud9 to host our code, the only problem is that the free plan doesn't allow you to make your code private. I'll explain why that could be a problem later.***


### [¶](#step-3){.pilcrow} Signing up for OpenShift {#step-3}

![OpenShift](/content/tutorials/images/making-what_capital/openshift-logo.png){.float-right}


According to [Wikipedia](https://en.wikipedia.org/wiki/OpenShift):

> OpenShift is a platform as a service product from Red Hat.

Great. But what is *platform as a service*?


> [It] provides a platform allowing customers to develop, run, and manage Web applications without the complexity of building and maintaining the infrastructure

*[Click.](https://en.wikipedia.org/wiki/Platform_as_a_service)*

Right. That makes sense. So OpenShift really is just some kind of a web hosting service. *Neat.*

Let's start by signing up for an account on the [openshift.com](https://www.openshift.com/) website.


![Signing up for an OpenShift account](/content/tutorials/images/making-what_capital/openshift-signup.png)

After you fill out the signup form, you will be asked to verify your email and after that, you will also have to accept the terms of service. Once all that is taken care of, you'll see the welcome page.

![Welcome to OpenShift](/content/tutorials/images/making-what_capital/openshift-welcome.png)

Great, we're nearly done with setting things up. Open your [settings page](https://openshift.redhat.com/app/console/keys/new) in a new window or a tab. Here, you can add that SSH key you copied over from Cloud9 (or you can [go back and copy it now](https://c9.io/account/ssh)). As a name, you can just use *Cloud9*.


Now you can go ahead and click [*Create your first application now*](https://openshift.redhat.com/app/console/application_types). Under **Choose a type of application**, type *nodejs* in the search bar and hit *Enter*. **Node.js 0.10** should be the first result, so click that. On the next page, type the name of your bot into the **Public URL** field ("Only letters and numbers are allowed"), scroll all the way down and click **Create Application**.


### [¶](#step-4){.pilcrow} Creating a Cloud9 project {#step-4}

Let's go back to [Cloud9](https://c9.io/). Click [Create a new workspace](https://c9.io/new) and fill out your app's information.

![Creating new Cloud9 app](/content/tutorials/images/making-what_capital/new-cloud9-app.png)

Under **Choose a template** click **Node.js**. When all of this is done, hit the **Create workspace** button. As a reminder, if the site takes a while to create your project, make sure your adblocker is disabled and try again.

After a few seconds, your IDE should load and you should see something like this:

![IDE](/content/tutorials/images/making-what_capital/ide.png)

I will add links that explain everything in more detail, but for now, I'm just going you quickly run you through the basics so you can get an idea what making bots is all about.

The most important things to know are: you can see your files and folders on the left. `server.js` is where you will write your Twitter bot code. The tab at the bottom where it says "bash" is the *command line*, where you will type a few commands.

Alright, so, right-click into the area with files and folders on the left and click *New file*. Name it `config.js`. This will be your *configuration* file and we'll put your Twitter API keys here. Copy and past this into this file:

```
var config = {
  consumer_key:         'XXXXX',
  consumer_secret:      'XXXXX',
  access_token:         'XXXXX',
  access_token_secret:  'XXXXX'
}

module.exports = config;
``` 

Remember the Twitter tab we left open? Go back to it and copy the *Consumer Key*, *Consumer Secret*, *Access Token* and *Access Token Secret* and match them up with the code above, for example, replace the `XXXXX` after `consumer_key` with the value for *Consumer Key*, and so on.

If you closed the tab in the meantime, you can go to your [Twitter apps](https://apps.twitter.com/) page, open your app and switch to the **Keys and Access Tokens** tab.

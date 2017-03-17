/*
Title: Importing a bot project from GitHub to Glitch
Description: A quick guide on importing a GitHub project to Glitch
Thumbnail: /content/tutorials/importing-github-glitch/images/import-from-github.png
Has code: yes
Show donation link: yes
Date: March 16, 2017
Tags: tutorial,guide,import,github,glitch,gomix,hyperdev,fourtonfish,botwiki-original
*/

<div class="note">
  <p>Need help with this tutorial? Join <a href="https://botmakers.org/">the Botmakers community</a>!</p>
</div>


### [¶](#what-is-glitch){.pilcrow} Artist formerly known as Gomix. And HyperDev. {#what-is-glitch}


[Glitch](https://glitch.com) is a really awesome and free app/website that lets you [create and remix all kinds of fun apps](https://glitch.com/about/), including [bots](https://glitch.com/handy-bots).

I already wrote one tutorial that shows you [how to start a new bot project on Glitch](/tutorials/how-to-make-a-twitter-bot-dm-retweet-glitch/). But what if you want to take one of the [open source node.js bots](/tag/bot+opensource+nodejs/) and import it from GitHub to Glitch?

My friend, did you open just the right tutorial.

### [¶](#step-1){.pilcrow} Step 1: Sign in {#step-1}

Let's start by [opening up Glitch](https://glitch.com/).

![Sign in](/content/tutorials/importing-github-glitch/images/sign-in.png){.centered}

You have two options here: use your GitHub account, or Facebook.


### [¶](#step-2){.pilcrow} Step 2: Create a new project {#step-2}

![New Glitch project](/content/tutorials/importing-github-glitch/images/new-project.png){.centered}

If you already have a few projects, create a new one. If this is your first time signing in, you can use the one that was just created for you.


### [¶](#step-3){.pilcrow} Step 3: Import a project from GitHub {#step-3}


Click the name of your project in the top left corner. This will bring up a menu. Click the **Advanced Options** button at the bottom.

![Advanced options](/content/tutorials/importing-github-glitch/images/advanced-options.png){.centered}

Copy this right here: `fourtonfish/random-image-twitterbot`. You will use it in a moment.

Now, back on Glitch, click **Import from GitHub**. Use the text you copied above in the popup prompt.

![Import from GitHub](/content/tutorials/importing-github-glitch/images/import-from-github.png){.centered}



### [¶](#step-4){.pilcrow} Step 4: API keys {#step-4}


Great, we have a copy of the [random-image-tweet](https://github.com/fourtonfish/random-image-twitterbot) bot ([find a tutorial for it here](/tutorials/random-image-tweet/)). Go ahead and elete the `config-example.js` file.


![Delete config-example.js](/content/tutorials/importing-github-glitch/images/delete-config-example.png){.centered}

Click the `.env` file in the sidebar on the left side.

![Default .env](/content/tutorials/importing-github-glitch/images/env-default.png){.centered}

[Follow this tutorial](/tutorials/how-to-create-a-twitter-app/) to create a new Twitter app. At the end, you should have the following information:

- **Consumer Key**
- **Consumer Secret**
- **Access Token**
- **Access Token Secret**

Go back to your `.env` file and update it with the following code:


```
CONSUMER_KEY='123456789'
CONSUMER_SECRET='123456789'
ACCESS_TOKEN='123456789'
ACCESS_TOKEN_SECRET='123456789'

```

(Naturally, use your own API keys/secrets instead of `123456789`.)

Back in our `server.js` file, let's change how the API keys are loaded:

```
config = {
    consumer_key: process.env.CONSUMER_KEY,
    consumer_secret: process.env.CONSUMER_SECRET,
    access_token: process.env.ACCESS_TOKEN,
    access_token_secret: process.env.ACCESS_TOKEN_SECRET
};

```

Now, update the `package.json` file to look like this:


```
{
  "name": "random-image-twitterbot",
  "version": "0.0.1",
  "description": "Tweet a random image from a folder.",
  "main": "server.js",
  "scripts": {
    "start": "node server.js"
  },
  "dependencies": {
    "twit": "^2.1.0",
    "express": "^4.14.0"
  },
  "engines": {
    "node": "6.9.1"
  },
  "repository": {
    "url": ""
  },
  "keywords": [
    "node",
    "gomix",
    "twitter",
    "twitterbot",
    "bot"
  ]
}
```

(Feel free to change the `name` and `description`.)

Your bot will start tweeting at this point, and while it would be nice to say we're done, hold your proverbial horses. Glitch has a few limitations we need to talk about here.

First, the folder with images is there in your project, and your bot is posting them as we speak, unless anything changed since I wrote this guide, you can't actually see those files, and what's worse, you can't upload your own images.

Don't fret, there's always a solution.

We can upload the images to the `assets` folder and update our bot to use that one instead.

Whenever you're ready!

### [¶](#step-5){.pilcrow} Step 5: Oh {#step-5}

Welcome back!

Alright, so as I was writing what was supposed to be a short guide where we mainly rename files and move some code around, I run into a few roadbloacks.

First of all, it turns out Glitch doesn't actually store the files you upload to the `assets` folder. Instead, it uploads them to a CDN and keeps the list of uploaded files inside a file called `.glitch-assets`. While interesting, this makes adapting some open source bots a bit tricky.

I would like to write more about what I learned on the way, but until then, check out the refactored code [here on Glitch](https://glitch.com/edit/#!/random-image-twitterbot), mainly the updated `server.js`.

The main difference is that we're now using `upload_random_image_remote()` to load the images from CDN into memory, and sending them directly to Twitter for upload. And to get the list of uploaded images we read the `.glitch-assets` file.

Thanks for following along, stay tuned for updates to this guide -- and be sure to [say hi in the Botmakers community](https://botmakers.org/) :-)

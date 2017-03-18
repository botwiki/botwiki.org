/*
Title: Importing a node.js bot from GitHub to Glitch
Description: A quick guide on importing a GitHub project to Glitch
Thumbnail: /content/tutorials/importing-github-glitch/images/import-from-github.png
Has code: yes
Show donation link: yes
Date: March 16, 2017
Tags: tutorial,guide,import,github,glitch,hyperdev,fourtonfish,botwiki-original
*/

<div class="note" markdown="1">
  Need help with this tutorial? [Ask in the Botmakers community!](https://botmakers.org/)
</div>


### [¶](#glitch){.pilcrow} Artist formerly known as HyperDev {#glitch}


[Glitch](https://glitch.com) is a really awesome and free app/website that lets you [create and remix all kinds of fun apps](https://glitch.com/about/), including [bots](https://glitch.com/handy-bots).

I already wrote one tutorial that shows you [how to start a new bot project on Glitch](/tutorials/how-to-make-a-twitter-bot-dm-retweet-glitch/), and I put together a [Glitch Twitter bot template](https://glitch.com/edit/#!/twitterbot). But what if you want to take one of the [open source node.js bots](/tag/bot+opensource+nodejs/) and import it from GitHub to Glitch?

My friend, did you open just the right tutorial.

We are going to use my [random-image-twitterbot](https://github.com/fourtonfish/random-image-twitterbot) template ([find a tutorial for it here](/tutorials/random-image-tweet/)). 
Note that this tutorial may be a bit more advanced due to how certain things in Glitch work. For example, the `random-image-twitterbot` source code contains an `images` folder that will become invisible after you import it from GitHub, and while the bot will happily tweet the images from it, you will not be able to add or remove them.

Yes, you can upload your images to the `assets` folder, but it turns out that Glitch doesn't actually store the files in that folder. Instead, it uploads the images to a CDN and only keeps a list with URLs inside a file called `.glitch-assets`.

Oh, and your bot will go to sleep after running for five minutes.

Don't fret, there's a solution for all of this.

Before we embark on this journey together, [feel free to check out the refactored code here](https://glitch.com/edit/#!/random-image-twitterbot).


This guide will be specific to this one bot, but you will learn quite a bit about how Glitch works, and hopefully be able to apply this knowledge when importing other open source bots, or open source projects in general into Glitch.


Yep, there's quite a bit of work ahead of us. We'll start whenever you're ready!


### [¶](#step-1){.pilcrow} Step 1: Importing a project {#step-1}


Welcome back!

Alright, let's [open up Glitch](https://glitch.com/) and create a new project.


![New Glitch project](/content/tutorials/importing-github-glitch/images/new-project.png){.centered}


Click the name of your project in the top left corner. This will bring up a menu. Click the **Advanced Options** button at the bottom.

![Advanced options](/content/tutorials/importing-github-glitch/images/advanced-options.png){.centered}

Copy this right here: `fourtonfish/random-image-twitterbot`. You will use it in a moment.

Now, back on Glitch, click **Import from GitHub**. Use the text you copied above in the popup prompt.

![Import from GitHub](/content/tutorials/importing-github-glitch/images/import-from-github.png){.centered}



### [¶](#step-2){.pilcrow} Step 2: API keys {#step-2}


Go ahead and delete the `config-example.js` file.


![Delete config-example.js](/content/tutorials/importing-github-glitch/images/delete-config-example.png){.centered}

[You can follow this tutorial](/tutorials/how-to-create-a-twitter-app/) to create a new Twitter app. At the end, you should have the following information:

- **Consumer Key**
- **Consumer Secret**
- **Access Token**
- **Access Token Secret**


Switch to your `.env` file, -- 


![Default .env](/content/tutorials/importing-github-glitch/images/env-default.png){.centered}


-- and update it with the following code:


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

This part may differ slightly across various codebases, but the bottom line is that you have to save your API keys into the `.env` file (the actual API keys will be hidden when another user looks at your source code).


Next, update the `package.json` file to look like this:


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
    "glitch",
    "hyperdev",
    "twitter",
    "twitterbot",
    "bot"
  ]
}
```

You can add more modules/libraries under `dependencies`, change the `name` and `description`, but the important part is that you include this:

```
  "main": "server.js",
  "scripts": {
    "start": "node server.js"
  }
```

And, of course, your main script file should be called `server.js`.

(I *think* you just need to match the name of the file with the `node ***` command, but I'm just sticking to the default `server.js` name here.)

If you did everything correctly, your bot will start tweeting at this point.


### [¶](#step-3){.pilcrow} Step 3: Images {#step-3}

As mentioned earlier, the original source code comes with a folder called `images`. But after you import the project into Glitch, it appears to have disappeared.

This folder is still present, but we need to download the images separately [from the GitHub repo](https://github.com/fourtonfish/random-image-twitterbot) and upload them into the `assets` folder.


### [¶](#step-4){.pilcrow} Step 4: The big refactor {#step-4}

This part might differ with other bots, but in our case, we just need to load the images from CDN instead of the `images` folder.

Here, again, [is the refactored code](https://glitch.com/edit/#!/random-image-twitterbot) (see the `server.js` file).

Notice the `upload_random_image_remote` function. I am using the [`request`](http://stackabuse.com/the-node-js-request-module/) module to fetch an image from the CDN.

The part where we upload the image and post it to Twitter is essentially the same. ([Read here](https://dev.twitter.com/rest/reference/post/media/upload), in case you're wondering about the `base64` thing.)

I also added the `extension_check` function, which filters out any non-image uploads.

We're kicking it all off by reading the `.glitch-assets` file, which, like I said, has references to all the uploaded files.

Now, if you're working with a bot that uses other types of files, it might be a bit tricky. Let's say your bot works with text files, for example.

All the files and folders will be imported from the original repo, and the bot should work without any updates to the actual source code (just follow the steps one and two above). The only problem will be if you want to add, remove, or update some of the files.


Also, note that apparently you can create folders by creating new files with names like `folder/folder/filename.txt`, which creates the folders, but you will not be able to easily browse them or add easily add more files -- only using this "trick".

Hey, you can't complain, cause it's all free.

### [¶](#step-5){.pilcrow} Step 5: Staying awake {#step-5}

Now for the final step.

Glitch will automatically put your app to sleep after five minutes of not getting any traffic.

What this means, your app needs to be getting actual http requests in order to stay awake, otherwise it will sleep, and only wake up once it receives traffic.

One of the Glitch engineers (do they call themselves *glitchers*?) [confirmed](https://support.glitch.com/t/a-simple-twitter-bot-template/747/16) that it's okay to use a web service to regularly ping your app every 25 minutes to wake it up.

It would be better if you could directly use [cron](https://code.tutsplus.com/tutorials/scheduling-tasks-with-cron-jobs--net-8800), but hey, we'll take whatever we can.

There seems to be several [`free web cron`](https://www.google.com/search?q=free+web+cron) services. I am going to go with [cron-job.org](https://cron-job.org/en/), because they're free and open souce. And they're the first result.


![cron-job.org](/content/tutorials/importing-github-glitch/images/cron-job-org.png){.centered}

Be sure to use the URL for your app here, in my case that would be `https://random-image-twitterbot.glitch.me`.

![Basic info](/content/tutorials/importing-github-glitch/images/cron-basics.png){.centered}

On this particular site, the basic scheduling only goes up to every 30 minutes, so I have to go with the custom setup.

![Cron it up](/content/tutorials/importing-github-glitch/images/cron-it-up.png){.centered}

Here I'm just going to select everything under **Days**, **Months**, **Hours**, and 0 under **Minutes** so that my bot tweets once every hour.

Notice that back in the `server.js` file I commented out the timer I used to trigger the image upload every 10 seconds. Since our bot will go to sleep after five minutes, the function will only run a few times before the bot stops posting.

Instead we can just run the function once, and it will be executed every time cron-job.org pings our app and wakes up the bot.

And there you go, this is how you import a project from GitHub to Glitch.


### [¶](#conclusion){.pilcrow} In conclusion {#conclusion}


I'd be happy to add more steps here, if anyone wants to share their experience importing open source code from GitHub; you can email me at [stefan@fourtonfish.com](mailto:stefan@fourtonfish.com), or [stop by in the Botmakers community](https://botmakers.org/) :-)


Thanks for following along, and keep making cool stuff!

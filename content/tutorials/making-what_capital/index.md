/*
Title: Making a Twitter bot with node.js and Cloud9
Description: Learn to make a simple Twitter-based game.
Thumbnail: /content/tutorials/making-what_capital/images/finished-bot.png
Has code: yes
Show donation link: yes
Date: November 25, 2015
Tags: tutorial,twitter,cloud9,openshift,node,nodejs,node.js,fourtonfish,botwiki-original
*/

<div class="note">
  <p>Need help with this tutorial? Join <a href="https://botmakers.org/">the Botmakers community</a>!</p>
</div>

Hey there, this is [Stefan](/about/team/#stefan), the creator of **Botwiki.org**!

In this tutorial, I'm going to guide you through the creation of a simple Twitter bot that will randomly select and post a country flag and wait for someone to respond with the correct name of the matching country. You can [check out the finished bot on Twitter](https://twitter.com/what_capital).

We are going to use the following tools:

- [Cloud9](https://c9.io/), a browser-based [Integrated Development Environment](https://en.wikipedia.org/wiki/Integrated_development_environment), or in other words, a web app where you will write your code,
- [node.js](https://nodejs.org/), a way of running [JavaScript](https://en.wikipedia.org/wiki/JavaScript) on the server,
- and [Twit](https://github.com/ttezel/twit), a node.js module (or a library) for interacting with Twitter

***Quick note: You might need to disable your adblocking addon/plugin for the [Cloud9](https://c9.io/) website. At least I had a small problem when adding a new project.***

***Also: I wrote this tutorial to help beginner coders join our [Monthly Bot Challenge](/monthly-bot-challenge). Be sure to join the [Botmakers.org](https://botmakers.org/) community to share ideas and ask for help, and follow [@botwikidotorg](https://twitter.com/botwikidotorg/) for updates!***

### [¶](#step-1){.pilcrow} Creating a Twitter app {#step-1}

The way you make bots on Twitter is that you first create a new account, which is going to be the actual bot, and a Twitter app, through which you will control this bot.

So let's start by [creating a new Twitter account](https://twitter.com/signup). This is relatively straightforward. The only tricky part is that if you want your app to be able to post to Twitter, rather than just read from it, you will need to add a phone number to your account. If you already associated your phone number with your main account, see the [**Note on needing a phone number**](/tutorials/twitterbots#note-phone-number) section of the Twitter bot tutorials page for possible solutions.

After you create your account, go to [apps.twitter.com](https://apps.twitter.com/) and create a new app. 

![Creating new Twitter app](/content/tutorials/making-what_capital/images/new-twitter-app.png)

The information here won't really show up anywhere that's relevant for us. Once you're done here and land on the next page, switch to the **Keys and Access Tokens** tab. Under **Application Settings**, make sure that it says *Read and write* for your app's **Access level**.

In a moment, we are going to need four things from this page:

- Consumer Key
- Consumer Secret
- Access Token
- Access Token Secret

You need to click the button in the **Your Access Token** section to generate the last two. Done? Perfect, let's keep this page open for now.


### [¶](#step-2){.pilcrow} Signing up for Cloud9 {#step-2}

![Cloud9](/content/tutorials/making-what_capital/images/cloud9-logo.png){.float-right}


As explained earlier, Cloud9 is a browser-based IDE, or [Integrated Development Environment](https://en.wikipedia.org/wiki/Integrated_development_environment). All this means is just that you can use it to write code, and most of the other things, like setting up your working environment and deploying your app to a server will be taken care of for you.

Cloud9 offers a [free plan](https://c9.io/pricing/public), which gives us more than enough for our simple Twitter bot.

So let's [sign up for our free account](https://c9.io/web/sign-up/free). After we fill out all the necessary information, we should land in our Workspaces view. 


### [¶](#step-3){.pilcrow} Creating a Cloud9 project {#step-3}

Click [Create a new workspace](https://c9.io/new) and fill out your app's information.

![Creating new Cloud9 app](/content/tutorials/making-what_capital/images/new-cloud9-app.png)

Make sure to select the **Private** option for your workspace, and under **Choose a template**, click **Node.js**. Finally, hit the **Create workspace** button. As a reminder, if the site takes a while to create your project, make sure your adblocker is disabled and try again.

After a few seconds, your IDE should load and you should see something like this:

![IDE](/content/tutorials/making-what_capital/images/ide.png)

I will add [links that go into more details](#further-reading), but for now, I'm just going you quickly run you through the basics so you can get an idea what making bots is all about.

The most important things to know are: you can see your files and folders on the left. `server.js` is where you will write your Twitter bot code. The tab at the bottom where it says "bash" is the *command line*, and we will use that to install the Twit module.


### [¶](#step-4){.pilcrow} Installing Twit {#step-4}

We're going to use our command line to install Twit, which, as I mentioned, is a node.js module for interacting with Twitter through their API ([Application Programming Interface](https://en.wikipedia.org/wiki/Application_programming_interface). Simply put, Twit is a sort of a gateway between Twitter and your bot.

Node comes with a very useful tool called **npm** ([What is npm?](https://docs.npmjs.com/getting-started/what-is-npm)) that lets you easily download modules for your project.

Go to the *bash* tab and type `npm install twit`. This command asks *npm* to *install* a module called *twit*. Yep, it's simple as that.

Now for the fun part!


### [¶](#step-5){.pilcrow} Writing code {#step-5}

Right-click into the area with files and folders on the left and click *New file*. Name it `config.js`. This will be your *configuration* file and we'll put your Twitter API keys here. (Note that you can easily right-click the file and click **Rename** if you make a mistake.)

You can think of API keys as, well, *keys* for your bot to access the API, which, again, in turn lets you access data from Twitter and post to it.

```
bot (server.js) -> Twit -> API keys -> Twitter API -> Twitter
```

Copy and paste this into your `config.js` file:

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


Now, switch to your `server.js` file and delete everything inside it and replace it with the following.


```
var fs = require('fs'),
    path = require('path'),
    Twit = require('twit'),
    config = require(path.join(__dirname, 'config.js'));


var T = new Twit(config);

T.post('statuses/update', {
    status: 'Hello world!'
  },
  function(err, data, response) {
    if (err){
      console.log('Error!');
      console.log(err);
    }
    else{
      console.log(data);
    }
  });
```

Let me explain a few things. `require` is a command in node.js that loads libaries and files. This allows us to load the *Twit* library we installed, but also the configuration file with our API keys. `fs` and `path` are node.js modules that will *help* our script find our files, so that we can, for example, easily load our configuration file.

I will include links to some JavaScript and node.js tutorials [at the end](#further-reading), but for now, the code above can be simplified to something like this:


```
load_module_or_file('twit'),
load_module_or_file('config.js');

make_a_new_object_from(Twit).
using_my_configuration_file(config.js);

use_the_object_to_post_to_twitter(){
  text: 'Hello world!'
}, and_when_you_re_done(){
  if_there_was_an_error(){
    tell_me_what_the_error_was();
  }
  otherwise(){
    tell_me_what_twitter_said_back();
  }
}
```

When you're ready, click the **Run** button at the top of the page.

![First run](/content/tutorials/making-what_capital/images/first-run.png){.centered}

If you followed the tutorial closely, you should see your bot make its first tweet.

![First tweet](/content/tutorials/making-what_capital/images/first-tweet.png){.centered}

👏👏👏🎉

If something went wrong, you will see an error message, for example, if you don't copy the API keys correctly, you won't be able to log into Twitter and you will see something like this:

![It's an error!](/content/tutorials/making-what_capital/images/error.png){.centered}


### [¶](#step-6){.pilcrow} Adding images {#step-6}

So we decided that our bot will upload a flag of a country and wait until someone responds to our tweet with the name of the capital of the matching country.

I found a pretty good site called [free-country-flags.com](http://www.free-country-flags.com/), which lets you download [over 200 flags, for free](http://www.free-country-flags.com/flag_pack.php?id=1).

In the top menu, click **File**, then **Upload Local Files**. Go back to the *.zip* archive with the flags, extract the files and upload them to Cloud9. Make sure to name the folder ***flags***.


![Flags galore](/content/tutorials/making-what_capital/images/flags.png){.centered}


Using a neat little library called [countries-list](https://www.npmjs.com/package/countries-list), I created a list of about 200 countries and their capitals. [Download the list from here](/content/tutorials/making-what_capital/source/list_of_countries.js) and also upload it to your project.

And [here is my finished and annotated `server.js` file](/content/tutorials/making-what_capital/source/server.js). Let me quickly explain the main parts of the code.

We are going to load the list of countries similarly to how we loaded our API keys.

```
var Twit = require('twit'),
    config = require('/home/ubuntu/workspace/config.js'),
    list_of_countries = require('/home/ubuntu/workspace/list_of_countries.js')

var fs = require('fs'),
    path = require('path'),
    Twit = require('twit'),
    list_of_countries = require(path.join(__dirname, 'list_of_countries.js')),
    config = require(path.join(__dirname, 'config.js'));
```

This function will choose a random country from our list. I could go a bit further and keep a list of already used countries to avoid using the same country twice, but this is good enough for our tutorial.

```
function pickRandomCountry() {
  return list_of_countries[Math.floor(Math.random() * list_of_countries.length)];
}
```


To make things simple, we're going to keep a global variable `current_country` which will hold the most recently randomly picked country, and this function will check if the tweeted response matches the answer. 


```
function checkAnswer(answer){
  return (answer.toLowerCase().indexOf(current_country.capital.toLowerCase()) > -1);
}
```


As I explained earlier, the Twit library lets us communicate with Twitter by [using its API](https://dev.twitter.com/rest/public). Here's an example:

```
T.get('followers/ids',{
    screen_name: 'tolga_tezel'
  }, function (err, data, response) {
  console.log(data);
})
```

Here, we are using the [`GET followers/ids` method](https://dev.twitter.com/rest/reference/get/followers/ids). So we need to find a method that lets us upload images: [`POST media/upload`](https://dev.twitter.com/rest/reference/post/media/upload). 

Now, this part is a bit more advanced, but essentially works the same way. The `POST media/upload` method requires to pass in the uploaded image as a base64-encoded file. This is really easy to do using the `fs` and `path` modules.

```
current_country = pickRandomCountry();
console.log(current_country);

var imagePath = path.join(__dirname, '/flags/' + current_country.country + '.png'),
    b64content = fs.readFileSync(imagePath, { encoding: 'base64' });

console.log('Uploading flag...');

T.post('media/upload', { media_data: b64content }, function (err, data, response) {
  if (err){
    console.log('ERROR');
    console.log(err);          
  }
  else{
    console.log('Posting the flag...');

    T.post('statuses/update', {
      media_ids: new Array(data.media_id_string)
    },
      function(err, data, response) {
        if (err){
          console.log('Error!');
          console.log(err);
        }
        else{
          console.log('Waiting for someone to answer...');
        }
      }
    );
  }
});
```

![Logging](/content/tutorials/making-what_capital/images/log.png)

Some more ideas to explore:

- you could save the score for each player into a [Google Sheets](https://www.google.com/sheets/about/) spreadsheet (see the [google-spreadsheet](https://www.npmjs.com/package/google-spreadsheet) module); then you could post the leaderboard after each game
- you could add more responses to both when the answer is correct and incorrect (using the same technique as for picking a random country)
- you could let the player know if they probably just misspelled the answer (see the [levenshtein](https://www.npmjs.com/package/levenshtein) module, or learn more about Levenshtein distance on [Wikipedia](https://en.wikipedia.org/wiki/Levenshtein_distance))

This bot can also be "repurposed" and turned into similar games, for example, you could make a bot that posts outlines of countries and the players need to identify them. You could post images of famous people, landmarks, animals, etc. You could even make the game fully text-based and create something like [@TheRiddlerBot](https://botwiki.org/bots/twitterbots/TheRiddlerBot/).


### [¶](#further-reading){.pilcrow} Further reading {#further-reading}

- [Getting Started with Cloud9](https://docs.c9.io/docs/): Useful links and tips for learning how to use our cloud IDE
- [JavaScript Fundamentals](http://thenewcode.com/1027/Web-Developer-Reading-List-JavaScript-Fundamentals)
- [The Absolute Beginner’s Guide to Node.js](http://blog.codeship.com/node-js-tutorial/)
- [Twitter Bot Tutorial](https://www.youtube.com/playlist?list=PLRqwX-V7Uu6atTSxoRiVnSuOn6JHnq2yV) video tutorial series by [Daniel Shiffman](https://twitter.com/shiffman) 

### [¶](#notes){.pilcrow} Notes {#notes}

Earlier I mentioned the need for making your workspace "private". This is mainly so that you don't expose your private Twitter API keys. Anyone who can see those could easily take over your bot and use it to spam people.

Using the free plan, Cloud9 only allows you to have [one private workspace](https://c9.io/pricing/public), which is still very generous. If you want to use Cloud9 to host another bot, you will have to make your additional workspaces public.

Another complication comes from the fact that on the free Cloud9 plan, your app will become idle if it doesn't get any web traffic for a while. You have two options here: you can subscribe to the [$19/month plan](https://c9.io/pricing/webide), or you could use [OpenShift](https://www.openshift.com/) to actually host and run your app, while you'd still edit the code using Cloud9. Note that you will have to ["upgrade" to the free Bronze plan](https://www.openshift.com/pricing/index.html), which, again, is free, but it does require you to add your credit card information anyway.

### [¶](#step-openshift){.pilcrow} Deploying to OpenShift {#step-openshift}

***This section is work in progress.***

Integrating with OpenShift is actually fairly straightforward. I recommend downloading your `config.js` file, deleting your current Cloud9 project and creating a new one. (Below I will add a link to an updated version of **@what_capital**).

Also, we're going to be using *git*, so [here is a very quick overview](https://training.github.com/kit/downloads/github-git-cheat-sheet.pdf) of what git is.

1. Sign up for a [new OpenShift account](https://www.openshift.com/app/account/new) and [switch to the free Bronze plan](https://www.openshift.com/pricing/index.html).
2. Create a [new node.js app](https://openshift.redhat.com/app/console/application_types).
3. Copy [your Cloud9 SSH key](https://c9.io/account/ssh) and [add it to your OpenShift account](https://openshift.redhat.com/app/console/keys/new) (this is essentially needed [for the two sites to communicate](https://simple.wikipedia.org/wiki/Secure_Shell)).
4. When you open your OpenShift app page, on the right side, you will see a text field under *Source Code* and above *Pass this URL to 'git clone' to copy the repository locally*. It will look something like `ssh://65522ee0c2e66c3d300190@whatcapital-botsfortwitter.rhcloud.com/~/git/whatcapital.git/`.
5. Go back to the Cloud9 command line, after you create a new project, and insert the code below, updated with the correct `ssh://...` line:
```
git init
git remote add openshift -m master ssh://65522ee0c2e66c3d300190@whatcapital-botsfortwitter.rhcloud.com/~/git/whatcapital.git/
```
6. Next, we're going to copy over the OpenShift default node.js project:
```
git pull openshift master
``` 
7. [Download the source code for @what_capital](https://github.com/fourtonfish/what_capital) (slightly modified to run on OpenShift), upload it to your project folder and run:
```
git add -A
git commit
git push openshift master
```
8. I highly recommend looking at some [git tutorials](https://try.github.io/), but for simplicity, you can use the commands from the above step every time you want to update your bot, after you update your code.

***This section is work in progress.***

<!--
I am going to follow up this tutorial with one that shows how you can create one node.js app that can control multiple bots, but if you don't mind having your source code visible, there is actually a very simple workaround for having private information in public workspaces: simply [move the configuration file](https://docs.c9.io/docs/sensitive-data-in-public-workspaces) outside of your workspace directory.
-->
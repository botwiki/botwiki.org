/*
Title: Basic intro to Slack bots with with node.js and Botkit
Description: Learn to make a simple Slack bot and host it for free with OpenShift
Thumbnail: /content/tutorials/why-did-the-chicken-cross-the-road-slack-bot-tutorial/images/chicken.png
Has code: yes
Show donation link: yes
Date: May 20, 2016
Tags: tutorial,slack,openshift,node,nodejs,node.js,botkit,fourtonfish,botwiki-original
*/

<div class="note">
  <p>Need help with this tutorial? Join <a href="https://botmakers.org/">the Botmakers community</a>!</p>
</div>

[Slack](https://slack.com/is) is a very popular communication tool for teams. It's a bit like [IRC](https://en.wikipedia.org/wiki/Internet_Relay_Chat), but improved with better design and more features. And much like IRC, Slack also supports bots.

Slack bots range from useful little helpers that make you more effective at your job, to [silly little games](https://botwiki.org/bots/slackbots/slack-connect-4-bot/).

In this tutorial, I will show you how to use node.js and [Botkit](https://github.com/howdyai/botkit) to create your very own Slack bot. In the process, we are going to make a bot that knows a few jokes about chicken crossing the road :-)

## [¶](#getting-set-up){.pilcrow} Getting set up {#getting-set-up}

First, we will need to install node.js. You can follow the [official download and installation guide](https://nodejs.org/en/download/) for your particular operating system. After you sign up for an [OpenShift account](https://www.openshift.com/app/account/new), you might want to [upgrade to the free Bronze plan](https://www.openshift.com/pricing/index.html) to avoid the 24 hour app inactivity limit.

Next, we will [create a new node.js app](https://openshift.redhat.com/app/console/application_type/cart!nodejs-0.10). You don't need to change anything other than the Public URL for your project. To be able to interact with your OpenShift project, you should also download [the rhc command line tool](https://developers.openshift.com/getting-started/index.html).

With rhc installed, let's run the following code to download our newly created node.js app.

```
rhc git-clone -a NAMEOFYOURNODEJSAPP
cd NAMEOFYOURNODEJSAPP
```

Let's also install [Botkit](https://github.com/howdyai/botkit), a node.js library for building Slack (and Facebook Messenger) bots.


```
npm install botkit --save
```

Assuming you already created a new [Slack](https://slack.com/) team, log in as your team's administrator and go to your [Apps and integrations page](https://botmakers.slack.com/apps/manage/custom-integrations). On the Custom Integrations tab click Bots, and then Add Configuration.

![Add your bot](/content/tutorials/why-did-the-chicken-cross-the-road-slack-bot-tutorial/images/bots.png)

After you name your bot, you will receive your bot's API Token. You will need to add this token to your OpenShift app like this:


```
rhc env set SLACK_TOKEN=YOURSLACKBOTTOKEN -a NAMEOFYOURNODEJSAPP
```

You can also run `rhc env list -a NAMEOFYOURNODEJSAPP` to make sure the token was added correctly.


## [¶](#the-coding-part){.pilcrow} The coding part {#the-coding-part}

Now, open the file `server.js` and replace its content with following code:

```
var Botkit = require('./node_modules/botkit/lib/Botkit.js');

function get_response(){
  var responses = [
    'There was a car coming.',
    'To get to the other side.',
    'To get the newspaper.',
    'Because it wanted to find out what those jokes were about.',
    'To boldly go where no chicken has gone before!',
    'Because the light was green.',
    'I could tell you, but then the Chicken Mafia would kill me.'
  ];

  return responses[Math.floor(Math.random() * responses.length)];
}

var controller = Botkit.slackbot({
  debug: false
});


var bot = controller.spawn({
  token: process.env.SLACK_TOKEN
}).startRTM();

controller.hears(['why did the chicken cross the road'], 'direct_message,direct_mention,mention', function(bot, message) {
  bot.reply(message, get_response());
});

```

Let me quickly go through the code and explain what each part does.

```
var Botkit = require('./node_modules/botkit/lib/Botkit.js');
```

Loading node.js modules typically looks like this:

```
var Botkit = require('botkit');
```

For some reason, this doesn't seem to work with the current version of Botkit when I was writing this tutorial (0.2.0).

```
function get_response(){
  var responses = [
    'There was a car coming.',
    'To get to the other side.',
    'To get the newspaper.',
    'Because it wanted to find out what those jokes were about.',
    'To boldly go where no chicken has gone before!',
    'Because the light was green.',
    'I could tell you, but then the Chicken Mafia would kill me.'
  ];

  return responses[Math.floor(Math.random() * responses.length)];
}
```

The `get_response()` function returns a random element from an array of prepared responses. You could also save these as a module and then `require` it, but for simplicity of this tutorial, I am doing it this way. 

```
var controller = Botkit.slackbot({
  debug: false
});


var bot = controller.spawn({
  token: process.env.SLACK_TOKEN
}).startRTM();
```

Here we are initializing the bot, and finally --

```
controller.hears(['why did the chicken cross the road'], 'direct_message,direct_mention,mention', function(bot, message) {
  bot.reply(message, get_response());
});
```

`hears()` is a function that watches what is being said to the bot. You could also do something like this:

```
controller.hears(['hi', 'hello', 'howdy'], 'direct_message,direct_mention,mention', function(bot, message) {
  bot.reply(message, 'Hello there! :wave:');
});
```

Now, save the `server.js` file and push your changes.


```
git commit -a -m "Uploading my Slack bot"
git push
```

And you're done! Go and `/invite` your bot to a channel, and ask it why did the chicken cross the road :-)

![Chicken crossing road joke Slack bot](/content/tutorials/why-did-the-chicken-cross-the-road-slack-bot-tutorial/images/chicken.png)

Your bot can do a lot more, of course! Check out [the Botkit GitHub repo](https://github.com/howdyai/botkit#core-concepts) for documentation and relevant link, and also [some examples of what other people made with Botkit](https://blog.howdy.ai/powered-by-botkit-633aecd2fd0e).


*One quick note: OpenShift seems to expect your app to run on the 8080 port and returns a failure otherwise. This is not really a big issue, though, as the bot will still run correctly.*

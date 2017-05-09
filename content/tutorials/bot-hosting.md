/*
Title: Bot hosting
Description: Learn how to host your bot!
Thumbnail: /content/images/illustrations/man-reading-mail.png
Tags: tutorials,bots,hosting,deploy,deployment,digitalocean,heroku,dexter,cron,hubot,beep boop
Show donation link: yes
Nav: hidden
*/

<div class="note">
  <p>Before you start making bots, consider reading <a href="/articles/bot-ethics">these essays and articles</a>. Also worth browsing: <a href="/resources/libraries-frameworks/#language">resources for cleaning up your bot's language</a>.
  </p>
</div>

You have quite a few options when it comes to hosting your bots!

***Note:** Some [network specific tutorials](/tutorials/network-specific-tutorials) include a step explaining how to host your bot.*


### Self-hosted [¶](#botmaking-self-hosted){.pilcrow} {#botmaking-self-hosted}
- [DigitalOcean](https://digitalocean.com/): a popular VPS (Virtual Private Server), starts at $5/month (it's also used to host this site; our [referral link](https://www.digitalocean.com/?refcode=9e279abc3337) gets you $10 starter credit)
  - [How To Set Up a Node.js Application for Production on Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-set-up-a-node-js-application-for-production-on-ubuntu-16-04) (digitalocean.com)
  - [How To Set Up a Node.js Application for Production on Ubuntu 14.04](https://www.youtube.com/watch?v=Jsmeh7q9Qv4) (DigitalOcean via youtube.com)
  - [How to Deploy a Node.js App to DigitalOcean with a Free SSL Certificate (Video)](https://www.youtube.com/watch?v=kR06NoSzAXY&feature=youtu.be)
  - [Automating bots with cron on DigitalOcean](http://www.colewillsea.com/blog/do-cron) (youtube.com)
- [Glitch](https://glitch.com/): the easiest way to build the app or bot of your dreams
  - [Handy bots](https://glitch.com/handy-bots): collection of starter bot projects
    - [Glitch Twitter bot template](https://glitch.com/edit/#!/project/twitterbot)
    - [Slack slash commands template](https://glitch.com/edit/#!/museum-by-colors)
    - [Facebook Messenger Bot](https://glitch.com/~messenger-bot)
  - [Botkit is better with Slack’s Events API](https://medium.com/slack-developer-blog/botkit-is-better-with-slacks-events-api-f9a27e051591)
- [OpenShift](https://www.openshift.com/): a [PaaS](https://en.wikipedia.org/wiki/Platform_as_a_service), comes with a free plan
  - see [OpenShift tutorials on Botwiki](/tag/tutorial+openshift)
- [Cloud9](https://c9.io/): browser-based IDE (integrated development environment) that vastly simplifies the development process; offers a free plan that works well with OpenShift for hosting
  - see [tutorials on Botwiki that use Cloud9](/tag/tutorial+cloud9)
- [Google Cloud Platform](https://cloud.google.com/) ([Free Tier](https://cloud.google.com/free/))
- [Heroku](https://www.heroku.com): similar to OpenShift, but your app needs to "sleep" for six hours each day (see details on the [pricing page](https://www.heroku.com/pricing)), useful tutorials include:
 - [Intermediate Cron Jobs with Heroku](http://blog.andyjiang.com/intermediate-cron-jobs-with-heroku/)
- [Linode](https://www.linode.com/): another VPS, starts at $10/mo
- [Dreamhost](https://www.dreamhost.com/): web hosting and domain name registrar, their VPS starts at $15/month
- [PythonAnywhere](https://www.pythonanywhere.com/): "Host, run, and code Python in the cloud!"
- [AWS Lambda](https://aws.amazon.com/lambda/)
  - [Claudia Bot Builder](https://claudiajs.com/claudia-bot-builder.html) ([GitHub](https://github.com/claudiajs/claudia-bot-builder)): Create chat bots for Facebook Messenger, Slack, Amazon Alexa, Skype, Telegram, Viber, GroupMe, Kik and Twilio and deploy to AWS Lambda in minutes

### Botmaking platforms [¶](#botmaking-platforms){.pilcrow} {#botmaking-platforms}

- [Dexter](https://rundexter.com/): a platform that makes connecting third-party APIs easy
- [BOT libre!](http://www.botlibre.com/): create your own chat bot with real artificial intelligence, share it, embed it, connect it to the world
- [QnA Maker](https://qnamaker.ai/): "From FAQ to Bot in minutes"
- [Hubot](https://hubot.github.com/): a customizable, life embetterment robot
- [Huginn](https://github.com/cantino/huginn): a system for building agents that perform automated tasks for you online
- [Flow XO](https://flowxo.com/): connect your cloud apps together into automated workflows
- [Botomatic](http://www.botomatic.co/)

See also: [The Bot Stack Compendium](https://airtable.com/shrozHdLLjfpqh8SR) (and a related [blog post](https://medium.com/ddouble/how-to-build-your-best-bot-the-bot-stack-compendium-90a90660167a))

### Twitter bots [¶](#botmaking-twitter){.pilcrow} {#botmaking-twitter}

- [Cheap Bots, Done Quick!](http://cheapbotsdonequick.com/): see [tutorials](/tutorials/twitterbots/#cheap-bots-done-quick) and [examples](/tag/cheapbotsdonequick) of bots created with CBDQ
- [PythonAnywhere](https://www.pythonanywhere.com/), which was mentioned above, see also slides from the [Build A Bot](https://tpinecone.gitbooks.io/build-a-bot-workshop/content/index.html) workshop
- [Google Apps Script](https://script.google.com/d/11dB74uW9VLpgvy1Ax3eBZ8J7as0ZrGtx4BPw7RKK-JQXyAJHBx98pY-7/edit?usp=sharing): see [Bradley Momberger](https://twitter.com/air_hadoken)'s [blog](http://airhadoken.github.io/2015/06/29/twitter-lib-explained.html) for more details
- [tilde.town](http://tilde.town/) (Twitter and IRC bots)
- [@beaugunderson](https://twitter.com/beaugunderson) is offering to let people host bots on his [Linode](https://www.linode.com/) account
- you can even use your [Raspberry Pi](http://www.instructables.com/id/Raspberry-Pi-Twitterbot/)


### Slack bots [¶](#botmaking-slack){.pilcrow} {#botmaking-slack}

- [Beep Boop](https://beepboophq.com): Slack bot hosting platform
- [Slack.Pipe](http://slack.datastack.co/): allows you to create custom bots from any API


See also: [Hosting Slack Integrations](https://medium.com/slack-developer-blog/hosting-slack-integrations-79f3d4b04dd6) on the [Slack API Developer Blog](https://medium.com/slack-developer-blog).


### Notes [¶](#notes){.pilcrow} {#notes}

Common ways to manage multiple bots on the same network are (mostly applies to Twitter bots):

- running each bot as a separate app/process with its own API keys
- running all of your bots in one app, using the same set of API keys
- or as a variation, you can create multiple apps, but still use the same API keys


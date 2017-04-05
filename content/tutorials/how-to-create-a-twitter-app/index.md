/*
Title: How to create a Twitter app
Description: First step before making a Twitter bot.
Thumbnail: /content/tutorials/how-to-create-a-twitter-app/images/new-twitter-app.png
Has code: yes
Show donation link: yes
Date: May 20, 2016
Tags: tutorial,twitter,openshift,images,node,nodejs,node.js,fourtonfish,botwiki-original
*/

<div class="note" markdown="1">
  Need help with this tutorial? Join [the Botmakers community](https://botmakers.org/)!
</div>



So you decided to make your first Twitter bot, congratulations!

Before you can start writing any code, you will need something called **API keys**. These will let you make **API calls**, or in other words, **interact with the data on Twitter's website**.

To get your API keys, you need to first create a **Twitter app**.

Let's start by [signing up for a new Twitter account](https://twitter.com/signup), which will be controlled by our new bot. We also need to [add a phone number to our account](https://support.twitter.com/articles/110250-adding-your-mobile-number-to-your-account-via-web). (You will get an error at the next step if you don't do this.)

***Note:** You can sign up for [Google Voice](https://www.google.com/voice) ([Skype number](https://www.skype.com/en/features/online-number/) won't work, because Skype doesn't let you receive text messages, which you will need to verify your phone number).*

If you are already using your phone number with a different Twitter account, you should be able to remove it, and add it to your new bot account.

The "proper" way to handle multiple bot accounts is to [transfer the API keys to your new account](http://blog.mollywhite.net/twitter-bots-pt2/#createthetwitterapp), but this is done manually by Twitter's staff, and can take from several hours to a few days.

Furthemore, lately I seem to be always forced to verify my phone number every time I make a new bot anyway ¯\\\_(ツ)\_/¯


Once you have your phone number verified, go to [apps.twitter.com](https://apps.twitter.com/) and click the **Create a New App** button.

After that, fill in some basic information about your new app. You can leave the Callback URL field empty.

![New Twitter app](/content/tutorials/how-to-create-a-twitter-app/images/new-twitter-app.png){.centered}

Once you do that, switch to the **Keys and Access Tokens** tab. Under **Application Settings**, make sure that it says **Read and write** for your app's **Access level**.

We are going to need four things from this page:

- **Consumer Key**
- **Consumer Secret**
- **Access Token**
- **Access Token Secret**

(You need to click the button in the **Your Access Token** section to generate the last two.)

Also, if necessary, change the permissions to allow access to DMs. (You will need to re-generate your tokens after changing permissions.)

![Permissions](/content/tutorials/how-to-create-a-twitter-app/images/permissions.png){.centered}

There you go, these are the magical API keys you are going to need to breathe life into your shiny new bot. 

Now, go check out some [Twitter bot tutorials](/tutorials/twitterbots) -- and be sure to share your creations with the [Botmakers community](https://botmakers.org/)!

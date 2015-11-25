/*
Title: Making @what_capital with Cloud9
Description: Learn to make a simple Twitter-based game.
Date: November 25, 2015
Tags: tutorial,twitter,cloud9,node,nodejs,node.js,fourtonfish
*/

![Making Bots with Cloud9](/content/tutorials/images/making-bots-cloud9.png)

Hey there, this is Stefan, the creator of **Botwiki.org**.

In this tutorial, I will introduce you to [Cloud9](https://c9.io/fourtonfish), a browser-based IDE ([integrated development environment](https://en.wikipedia.org/wiki/Integrated_development_environment)) that I used to make a simple Twitter-based game that asks people to identify country flags by responding with a matching name of the country's capital. (It's a bit of a twist on a [game I made a while ago](http://blog.fourtonfish.com/post/75785207705/object-recognition-powered-games-demo-2).)

The game will randomly select and post a country flag, wait for someone to respond with the correct name of the matching country, and finally, update the score saved in a [Google Sheets](https://www.google.com/sheets/about/) spreadsheet.

### [¶](#step-1){.pilcrow} Creating a Twitter app {#step-1}

The way you make bots on Twitter is that you first create a new account, which is going to be the actual bot, and a Twitter app, through which you will control this bot.

So let's start by [creating a new Twitter account](https://twitter.com/signup). This is relatively straightforward. Now, the tricky part is that if you want your app to be able to post to Twitter, rather than just read from it, you will need to add a phone number to your account. See the [**Note on needing a phone number**](/tutorials/twitterbots#note-phone-number) section of the Twitter bot tutorials page for possible solutions.


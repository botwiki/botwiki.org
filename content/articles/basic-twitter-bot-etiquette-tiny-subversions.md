/*
Title: Basic Twitter Bot Etiquette
Description: "Basic rules for making a bot that isn’t an asshole."
Author: Darius Kazemi
Nav: hidden
*/

*Originally posted on [tinysubversions.com](http://tinysubversions.com/2013/03/basic-twitter-bot-etiquette/) by [Darius Kazemi](https://twitter.com/tinysubversions). See also: [Bot Ethics](/articles/bot-ethics/).*

So you want to make a Twitter bot! That’s great! Here are some basic rules for making a bot that isn’t an asshole (and also reduce the chance of the bot getting banned by Twitter).

- Don’t @mention people who haven’t opted in
- Don’t follow Twitter users who haven’t opted in
- Don’t use a pre-existing hashtag
- Don’t go over your rate limits

These are the four basic rules a Twitter bot should follow. Basically: make sure your bot is an entirely opt-in experience, and don’t go over your rate limits. The latter is simple enough and you can avoid it by [programmatically watching your API usage](https://dev.twitter.com/docs/api/1.1/get/application/rate_limit_status). Avoiding unsolicited @mentions should be obvious enough ([@RedScareBot](https://twitter.com/RedScareBot) is such an asshole) — but then there’s the following and hashtag usage. Twitter doesn’t like when a bot autofollows a bunch of people at once, or people who use a particular keyword, or stuff like that. That’s what annoying spambots do (*“I mentioned ‘iPad’ and now a hundred weird sexy ladies are following me”*). Then there’s hashtags. Using an existing hashtag, particularly a trending hashtag, is what Twitter refers to as “hashtag pollution”. You can see it when you search for pretty much any trending topic: a bunch of bots selling pharmaceuticals or whatever and then tagging it with *“#americanIdolFinale”* or whatever.

You’ll notice that I say “who haven’t opted in” for the first two. You could ask people personally, or manually monitor the bot, but also you could automate it. An example of automation would be to program your bot such that whenever someone tweets *“@examplebot mention me”*, the bot adds their username to an internal list of users that it will sometimes mention in tweets. You could even have the bot occasionally tweet “If you want me to mention you in tweets, please @reply me with the text ‘mention me’, thanks!” Same would go for following (or you could just do an automated followback).


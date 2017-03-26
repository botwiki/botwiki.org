/*
Title: How to make a retweet-via-DM Twitter bot using Glitch and node.js 
Description: No server setup necessary!
Thumbnail: /content/tutorials/how-to-make-a-twitter-bot-dm-retweet-glitch/images/share-to-retweet.png
Has code: yes
Show donation link: yes
Date: March 13, 2017
Tags: tutorial,twitter,glitch,gomix,node,nodejs,twit,node.js,fourtonfish,botwiki-original
*/

<div class="note" markdown="1">
  Need help with this tutorial? Join [the Botmakers community](https://botmakers.org/)!
</div>

### Update

Due to how Twitter API works, Glitch is not a suitable platform for hosting this kind of a bot. Feel free to follow the tutorial below to learn about how Twitter bots work. Alternatively, you can take your finished code and [find a hosting platform](https://botwiki.org/tutorials/bot-hosting) that lets you run your app non-stop. You could also rewrite the bot to work with @ mentions, similar to the original version of [@botwikidotorg](/bots/twitterbots/botwikidotorg/); [this Glitch project](https://glitch.com/edit/#!/twitterbot-mentions) will give you some hints on how to do this.

The original tutorial continues below.


### [¶](#intro){.pilcrow} Introduction {#intro}

Hey there, [Stefan](https://botwiki.org/about/team#stefan) here, back with another Twitter bot tutorial.

If this is your first time on Botwiki, be sure to read a bit about [bots](/bots/) to get an idea what they are, and what kind of bots you can make.

In this tutorial, I am going to use the amazing [Glitch](https://glitch.com/) website (formerly known as Gomix, even more formerly known as HyperDev), which lets you [create and remix all kinds of fun apps](https://glitch.com/about/), including [bots](https://glitch.com/handy-bots).

Also, we are going to write our bot with [node.js](https://nodejs.org/) and the [Twit](https://github.com/ttezel/twit) library, but you don't need to install anything on your computer -- all the magic will happen inside Glitch.

If you'd like, you can have a [quick look the finished code](https://glitch.com/edit/#!/project/dm-retweet-twitterbot) before we start.

Sounds good? **Let's do this!**

### [¶](#remix){.pilcrow} Everything is a remix {#remix}

First, you will need to [create a new Twitter app](/tutorials/how-to-create-a-twitter-app); each comes with a set of free API keys which we will need to bring our Twitter bot to life.

Once you take care of that, go ahead and remix the [Glitch Twitter bot template](https://glitch.com/edit/index.html#!/project/twitterbot).

![Remix time!](/content/tutorials/how-to-make-a-twitter-bot-dm-retweet-glitch/images/remix-this.png){.centered}

You can put your API keys inside your `.env` file (look for it in the sidebar), so that it looks something like this:

```
CONSUMER_KEY='1234gibberish'
CONSUMER_SECRET='54321somemoregibberish'
ACCESS_TOKEN='123secret-456stuff'
ACCESS_TOKEN_SECRET='987evenmoresecretstuff'
BOT_USERNAME='username'
```

Make sure to also update `BOT_USERNAME` to your bot's actual username, without the `@` sign.


To make our code easier to manage -- and remix in the future, we are going to create separate functions, each handling a part of the bot's behavior:

- `get_tweet_id`: this function will extract the ID of a Tweet from the Tweet's URL
- `send_twitter_dm`: this will let the bot communicate with us
- `retweet_tweet`: this function will retweet a Tweet by given ID
- and finally, we will put everything together with `user_stream.on('direct_message')`

Before we begin, we need to slightly modify the first few lines of the `server.js` file.


```
var path = require('path'),
    request = require('request'),
    Twit = require('twit'),
    config = {
    /* Be sure to update the .env file with your API keys. See how to get them: https://botwiki.org/tutorials/make-an-image-posting-twitter-bot/#creating-a-twitter-app*/      
      twitter: {
        consumer_key: process.env.CONSUMER_KEY,
        consumer_secret: process.env.CONSUMER_SECRET,
        access_token: process.env.ACCESS_TOKEN,
        access_token_secret: process.env.ACCESS_TOKEN_SECRET
      }
    },
    T = new Twit(config.twitter),
    user_stream = T.stream('user');
```

Notice that I added one extra module called `request`, which will be used to figure out the ID of the tweet shared via DM. I am also listening to the `user` stream, instead of reading a sample of status updates (`statuses/sample`).


### [¶](#getting-tweet-id){.pilcrow} Getting the tweet ID {#getting-tweet-id}

When you share a tweet via DM, you are basically just sending the tweet's URL. On Twitter, all URLs are shortened in the format of `https://t.co/abcd1234`. We need to figure out the original URL (something like `https://twitter.com/username/status/123456789`), extract the ID, and then find a tweet with that ID and retweet it.            

Our first function is going to look like this:

```
function get_tweet_id(url){
  if (url.indexOf('https://twitter.com/')){
    return url.split('/')[5];  
  }
  else{
    return false;
  }
}
```

### [¶](#sending-dm){.pilcrow} Sending a message {#sending-dm}

Next, we will give our bot the ability to speak by adding a generic function for sending direct messages. We can then use this function to respond with confirmation messages, or error messages if something breaks.

```
function send_twitter_dm(username, message){
  T.post('direct_messages/new', {
    screen_name: username,
    text: message
  }, 
  function(err, data, response){
    if (err){
      console.log('Error!');
      console.log(err);
    }
  });  
}
```

### [¶](#retweeting){.pilcrow} Retweeting {#retweeting}

And now, the retweeting function.

```
function retweet_tweet(tweet_id, user_name){
  T.post('statuses/retweet/:id',
    {
      id: tweet_id
    }, function(err, data, response) {
      if (err){
        send_twitter_dm(user_name, 'There was an error!\n\n' + err.message);
      }
      else{
        send_twitter_dm(user_name, 'Retweeted!');          
      }
    }
  );
}
```

Pretty straightforward.

Our function will accept the ID of the tweet, which we will extract using the `get_tweet_id` function, and also the `user_name` of the person sharing the tweet, so we can either confirm that the tweet was successfully retweeted, or respond with an error message.


### [¶](#tying-it-together){.pilcrow} Tying it all together {#tying-it-together}

We are going to listen to [User Streams](https://dev.twitter.com/streaming/userstreams), which is *a stream of data and events specific to the authenticated user*.

In our case, we are going to wait for someone to message our bot.

Now, we don't want to simply retweet every tweet someone shares with the bot. There's a few things we could do to prevent someone hijacking our bot to post spam.

We could, for example, check if the bot is following the sender of the DM. Or we could create a [Twitter list](https://support.twitter.com/articles/76460) and check if the user is on that list. In this tutorial, I am going to go with the first option.


```
user_stream.on('direct_message', function (dm) {
  T.get('friends/ids', { screen_name: process.env.BOT_USERNAME, stringify_ids: true },  function (err, data, response) {
    (function(dm){
      if (data.ids && data.ids.indexOf(dm.direct_message.sender.id_str) > -1){
        var dm_text = dm.direct_message.text,
            dm_sender = dm.direct_message.sender.screen_name;

        if (dm_text.indexOf('https://t.co/') > -1){
          /* Checking if the message is a shortened URL. */
          var r = request.get(dm.direct_message.text, function (err, res, body) {
            /* If yes, we will use the request module to get the original URL. */
            if (r !== undefined){
              var original_url = r.uri.href;
              var tweet_id = get_tweet_id(original_url);
              if (tweet_id){
                retweet_tweet(tweet_id, dm_sender);
              }
              else{
                send_twitter_dm(dm_sender, "This doesn't look like a tweet to me.");
              }
            }
            else{
              send_twitter_dm(dm_sender, "Couldn't get the original URL.");
            }
          });
        }
        else{
          send_twitter_dm(dm_sender, "This doesn't look like a tweet to me.");
        }        
      }
    })(dm);
  });
});
```

The code above might seem a bit more complicated, if you're not familiar with [closures in JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Closures), but since this is out of the scope of this tutorial, feel free to just copy and paste it as it is.

The bottom line is, we need to first fetch the list of accounts the bot is following, and then check if the sender of the DM is on that list. This is done *asynchronously*, meaning, the app won't just wait while we load the list, and without going into too much detail, a *closure* is a way to deal with asynchronous events in JavaScript.


### [¶](#sharing-tweets){.pilcrow} Sharing tweets {#sharing-tweets}

Moving on, we are now ready to test our bot. Make sure the bot follows you, then try sharing a tweet through a DM --

![Sharing and retweeting](/content/tutorials/how-to-make-a-twitter-bot-dm-retweet-glitch/images/share-to-retweet.png){.centered}

-- and the tweet will be retweeted by your bot. If you don't see the retweet, check out the [finished code](https://glitch.com/edit/#!/project/dm-retweet-twitterbot) and make sure you're not missing anything, and that you correctly updated your `.env` file.


There you go, that's *pretty much* all there is to botmaking. Was it fun? Then be sure to share your creations with the [Botmakers community](https://botmakers.org/)!

Thanks for following along, and happy botmaking :-)

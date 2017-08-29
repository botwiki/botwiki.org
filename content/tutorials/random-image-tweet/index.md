/*
Title: Make a Twitter bot that tweets random images (with node.js)
Description: Learn how to make a simple Twitter bot that posts random images.
Thumbnail: /content/tutorials/make-an-image-posting-twitter-bot/images/posting-images.png
Has code: yes
Show donation link: yes
Date: May 20, 2016
Tags: tutorial,twitter,images,node,nodejs,node.js,fourtonfish,botwiki-original
*/

<div class="note">
  <p>Need help with this tutorial? Join <a href="https://botmakers.org/">the Botmakers community</a>!</p>
</div>

<div class="note" markdown="1">
***Note: If you're familiar with concepts like APIs, and maybe even have node.js installed, feel free [to skip the introduction](#creating-a-twitter-app).***
</div>

### Page content [¶](#page-content){.pilcrow} {#page-content}


- [What is a bot?](#what-is-a-bot)
- [A few words on APIs](#a-few-words-on-apis)
- [Node.js](#nodejs)
- [Creating a Twitter app](#creating-a-twitter-app)
- [Cute animals bot](#cute-animals-bot)
- [Attribution](#attribution)
- [Hosting your bot](#hosting-your-bot)

### [What is a bot?](/what-is-a-bot/) [¶](#what-is-a-bot){.pilcrow} {#what-is-a-bot}

Most people might think of bots as little automated programs that send out spam email and messages online. Yes, there are certainly those kinds of bots, but a bot is really just that: a little automated program, and it can automate all kinds of activities. Anything from generating [images](https://twitter.com/generativebot) and [poetry](https://twitter.com/tinypoemgen), to [telling stories](https://twitter.com/space_stories) and letting you [play games](https://twitter.com/letsplaysnake).

The only limits to what a bot can do is your imagination! And maybe the [Twitter API rate limits](https://dev.twitter.com/rest/public/rate-limiting).

In this tutorial, I am going to show you how easy it is to create your own Twitter bot using [node.js](https://nodejs.org/en/), a popular framework that lets you run JavaScript on a server, as opposed to a browser, and [Twit](https://github.com/ttezel/twit), a node.js library for interacting with Twitter's public API.



### A few words on APIs [¶](#a-few-words-on-apis){.pilcrow} {#a-few-words-on-apis}

API, which stands for [Application Programming Interface](https://en.wikipedia.org/wiki/Application_programming_interface), is, to put it simply, a way for you to interact with the data of a website by accessing it directly on their server.
  
So for example, with [Twitter's API](https://dev.twitter.com/rest/public) you will be able to read Tweets as they are posted on the site, or post your own Tweets, respond to people, follow users, and pretty much everything else that a regular Twitter user could do using Twitter's website or mobile app.

This is the key part: Twitter's API is what lets you automate user behavior, in order to create a Twitter bot. And like I said in the beginning, this activity could be non-malicous and even entertaining.

So let's make something fun then!


### Node.js [¶](#nodejs){.pilcrow} {#nodejs}

First, let's install node.js. The instructions will vary a bit depending on your operating system, so just follow the [official download and installation guide](https://nodejs.org/en/download/).

Once you have node.js installed, you can open your command line (check out this [brief tutorial](http://lifehacker.com/5633909/who-needs-a-mouse-learn-to-use-the-command-line-for-almost-anything) if you need to get up to speed with using it) and type:

```
node --version
```

When you type this and hit `Enter`, you should see something like `6.0.0` (the number might be a bit different, but the point is that you should see a number to check that node.js was installed correctly).

Great, now let's bootstrap our node.js application.

At its core, node.js is just JavaScript that can be executed on a web server. Let's try this: create a file called `server.js`. Inside this file, type:

```
console.log('I am making a Twitter bot!');
```

Save the file, go back to your console, and run your script:

```
node '/home/stefan/twitter-bots/server.js' 
```

Your console will display `I am making a Twitter bot!`. Very well, you just wrote your first node.js application! Let's move on to the actual bot now.

Node.js comes with a little program called npm, or Node Package Manager. npm lets  you, among other things, keep node.js up to date, and install various libraries.

The one we are going to need today is called Twit. But before we install it, let's do one thing real quick.

Go back to your command line and type `npm init`. You will be prompted to fill out some basic information about your node.js app.

You can pretty much just keep pressing `Enter` to accept the default values. Once that's done, let's go back to npm and Twit.

Still in the command line, type `npm install twit --save`. This will download the Twit library and place the necessary files into the `node_modules` folder.

There is no real need to interact with the actual files, instead open your `server.js` file, delete the `console.log` command, and replace it with the following:

```
var fs = require('fs'),
    path = require('path'),
    Twit = require('twit'),
    config = require(path.join(__dirname, 'config.js'));
```

Here we are loading a few modules (or libraries). You already know Twit, and fs and path are modules that come with node.js by default and let your work with files.

As for config, we are going to need to make another detour.

### Creating a Twitter app [¶](#creating-a-twitter-app){.pilcrow} {#creating-a-twitter-app}


Before you can start writing any code, you will need something called API keys. These will let you make API calls, or in other words, interact with the data on Twitter's website.

To get your API keys, you need to first create a Twitter app. [Here's a quick guide on how to do that.](/tutorials/how-to-create-a-twitter-app/)

After that, you will have the following information:

- Consumer Key
- Consumer Secret
- Access Token
- Access Token Secret

Now we need to create a new file called `config.js`, it will look like this:

```
var config = {
  consumer_key:         'XXXXX',
  consumer_secret:      'XXXXX',
  access_token:         'XXXXX',
  access_token_secret:  'XXXXX'
}

module.exports = config;
```

Replace `XXXXX` with matching values, for example, `consumer_key` should be your app's Consumer Key, and so on.

Now you can go back to your `server.js` file and add the following code:

```
var T = new Twit(config);

T.post('statuses/update', { status: 'Look, I am tweeting!' }, function(err, data, response) {
  console.log(data)
});

```

So your full `server.js` file should look like this:

```
var Twit = require('twit')

var fs = require('fs'),
    path = require('path'),
    Twit = require('twit'),
    config = require(path.join(__dirname, 'config.js'));

var T = new Twit(config);

T.post('statuses/update', { status: 'Look, I am tweeting!' }, function(err, data, response) {
  console.log(data)
});
```

And now, back to the console:

```
node server.js
```

Your console will fill up with a bit of information about the successful posting of your tweet, and if you switch to your browser and look at your bot's profile page --

![Your bot's first tweet](/content/tutorials/make-an-image-posting-twitter-bot/images/first-tweet.png)

Congratulations, your bot is now tweeting!

There are two more steps left now. Making your bot do something interesting, and hosting your bot somewhere so that you can turn off your computer without having to shut down the script powering your bot.

### Cute animals bot [¶](#cute-animals-bot){.pilcrow} {#cute-animals-bot}


Here's an idea: maybe our bot could post cute pictures of puppies, kittens, panda bears, and other animals! 

First, download a few pictures of animals that you think look cute. Create a folder called `images` and add these images here.

Next, remove the code that posted your first tweet:

```
T.post('statuses/update', { status: 'Look, I am tweeting!' }, function(err, data, response) {
  console.log(data)
});

```


We are going to write these two functions:

- `random_from_array` will pick a random image from a group of images (you can also use this function to [pick random text to be posted with your image](https://github.com/fourtonfish/random-image-twitterbot/blob/master/server.js#L32))
- `upload_random_image` will handle the actual image upload

We will read all the files in our `images` folder and use the above two functions to pick one random image, upload it to Twitter, and post it.

Here is the first function:

```
function random_from_array(images){
  return images[Math.floor(Math.random() * images.length)];
}
```

We're using a little trick here. On its own, `Math.random()` returns a random number between 0 and 1 (excluding the number 1). What we need is to pick a random number between 0 and the last index of our array, so that we can access a random element of the array.

In my case, `images.length` will be 5. So `Math.random() * images.length` will always give me a number between 0 and 5, but excluding the number 5, which is okay, because the index of an array in JavaScript starts at 0, and the last index is always its length minus 1.

To avoid picking a number like 3.202108, we are using the `Math.floor()` function, which rounds the number down to the nearest whole number.

With the `random_from_array()` function in place, we can now start uploading the images. Here is the function, with a few console logs for easier understanding of the code.

```
function upload_random_image(images){
  console.log('Opening an image...');
  var image_path = path.join(__dirname, '/images/' + random_from_array(images)),
      b64content = fs.readFileSync(image_path, { encoding: 'base64' });

  console.log('Uploading an image...');

  T.post('media/upload', { media_data: b64content }, function (err, data, response) {
    if (err){
      console.log('ERROR:');
      console.log(err);
    }
    else{
      console.log('Image uploaded!');
      console.log('Now tweeting it...');

      T.post('statuses/update', {
        media_ids: new Array(data.media_id_string)
      },
        function(err, data, response) {
          if (err){
            console.log('ERROR:');
            console.log(err);
          }
          else{
            console.log('Posted an image!');
          }
        }
      );
    }
  });
}
```

There are some more technical parts to this, but in essence, we pick a random image from our folder (using the `random_from_array` function), and then load the file into a variable `b64content`.

The `b64` refers to Twitter requiring the uploaded media files to be "base64-encoded" (see [this StackOverflow thread](http://stackoverflow.com/questions/3538021/why-do-we-use-base64) for a more technical explanation of what this means).

Once we load our image, we can use Twitter's `media/upload` API endpoint (documented [here](https://dev.twitter.com/rest/reference/post/media/upload)). After the image is succesfully uploaded to Twitter's server, we can use the `statuses/update` method we previously used to post our first tweet and use it to post the image.

We need to first see what files are in our `images` directory.

```
fs.readdir(__dirname + '/images', function(err, files) {
  if (err){
    console.log(err);
  }
  else{
    var images = [];
    files.forEach(function(f) {
      images.push(f);
    });

    setInterval(function(){
      upload_random_image(images);
    }, 10000);
  }
});
```




When you run `node server.js` now, you will see your Twitter bot post a random picture every 10 seconds (or 10,000 milliseconds).


Great job so far!

Your console will show what the bot is up to:

```
Opening an image...
Uploading an image...
Image uploaded!
Now tweeting it...
Posted an image!
```

And once again, looking at our bot's Twitter page, we see it was indeed posting.

![Posting images](/content/tutorials/make-an-image-posting-twitter-bot/images/posting-images.png)

***Running into problems? [See the full code on GitHub.](https://github.com/fourtonfish/random-image-tweet/blob/master/server.js)***

You can press `CTRL+C` while using the command line to end the script.

Also, if you want to delete the image after posting it, you can use [`fs.unlink`](https://nodejs.org/api/fs.html#fs_fs_unlink_path_callback) for that, so add this to the `upload_random_image` function, after you successfully post an image to Twitter:

```
fs.unlink(image_path, function(err){
  if (err){
    console.log('ERROR: unable to delete image ' + image_path);
  }
  else{
    console.log('image ' + image_path + ' was deleted');
  }
});
```

(See [`server-delete-images.js` on GitHub](https://github.com/fourtonfish/random-image-twitterbot/blob/master/server-delete-images.js).)

This way you can choose whether you want to cycle through all the images or only use each image once. You could also keep a list of images you already posted to avoid posting the same one twice in a row, or too many times. Or you could [move the images to a different folder](http://stackoverflow.com/questions/38285546/how-can-i-move-files-to-a-directory-using-node-js) after posting them, and once your original folder is empty, move them back. 




### Attribution [¶](#attribution){.pilcrow} {#attribution}

The bot we made is perfect for sharing images you created yourself. When sharing images created by other folks, remember to [give credit](/tutorials/how-to-make-a-twitter-bot-definitive-guide#bot-attribution) to the original author.

One way to do this is to create an object that lets you organize images together with source links, something like this:

```
var images = [
  { 
    file: 'image0001.png',
    source: 'http://www.example.com/image0001.png'
  },
  { 
    file: 'image0002.png',
    source: 'http://www.example.com/image0002.png'
  },
  { 
    file: 'image0003.png',
    source: 'http://www.example.com/image0003.png'
  },
  { 
    file: 'image0004.png',
    source: 'http://www.example.com/image0004.png'
  }
]

module.exports = images;
```

Then you can load the file the way you load your API keys:

```
images = require(path.join(__dirname, 'images.js'));

```

For the full code, see [my GitHub repo](https://github.com/fourtonfish/random-image-twitterbot/blob/master/server-attribution.js).

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">How cute! Source: <a href="https://t.co/rDUi8aNxK7">https://t.co/rDUi8aNxK7</a> <a href="https://t.co/4U6rAalQfP">pic.twitter.com/4U6rAalQfP</a></p>&mdash; EDDBOTT (@eddbott) <a href="https://twitter.com/eddbott/status/902344697833820160">August 29, 2017</a></blockquote>


### Hosting your bot [¶](#hosting-your-bot){.pilcrow} {#hosting-your-bot}

Great, so now you have your very own image-tweeting bot. The final step is moving the code to a server that will host the bot for you.

I put the [finished code on GitHub](https://github.com/fourtonfish/random-image-tweet) and I also wrote a [tutorial on importing GitHub projects to Glitch](/tutorials/importing-github-glitch), which is a really awesome and free app that lets you [create and remix all kinds of fun apps](https://glitch.com/about/), including [bots](https://glitch.com/handy-bots).

(Note: I made a [Glitch version](https://glitch.com/edit/#!/random-image-twitterbot) as well, but this one doesn't let you delete images.)

For a good overview of all your bot-hosting options, check out [this list of available hosting solutions](https://botwiki.org/tutorials/bot-hosting), but keep in mind that almost all of them are paid, starting at $5-7 a month. And the free options are usually quite limited (for example, [Heroku](https://www.heroku.com/) only allows your app to run for a few hours every day if you're on the free plan).

***Note: This tutorial is based on an older version that used [OpenShift](https://www.openshift.com/) for hosting, [you can find the instructions here](/tutorials/make-an-image-posting-twitter-bot/#hosting-your-bot-on-openshift).***


I hope you enjoyed making your Twitter bot! Feel free to browse the [Twit documentation](https://github.com/ttezel/twit) and [Twitter API documentation](https://dev.twitter.com/overview/documentation) to learn more about what your bot can do, and maybe get some more ideas browsing open source Twitter bots here on Botwiki!

And you are always welcome to [join the Botmakers community](https://botmakers.org/) :-)

<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

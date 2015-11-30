/*
  Annotated source code for twitter.com/what_capital. Created by Stefan Bohacek (twitter.com/fourtonfish) as part of a tutorial: botwiki.org/tutorials/making-what_capital
*/

/*
  Let's start by loading necessary modules and files.
*/
var fs = require('fs'),
    path = require('path'),
    Twit = require('twit'),
/*
  __dirname points to the current working directory. We only need to know the file's name and the folder we put it in ourselves.

  For example, if we moved our file to a directory called 'data', we would write it like this:
 
    list_of_countries = require(path.join(__dirname, 'data/list_of_countries.js')),

  The actual path would probably look something like this: 
    /home/ubuntu/workspace/data/list_of_countries.js
*/
    list_of_countries = require(path.join(__dirname, 'list_of_countries.js')),
    config = require(path.join(__dirname, 'config.js')),
/*
  This will be a global variable that will hold the currently picked country and a matching capital.
*/
    current_country;

function pickRandomCountry() {
/*
  This function will randomly pick one element from the array that holds the list of countries.
*/
  return list_of_countries[Math.floor(Math.random() * list_of_countries.length)];
}

function checkAnswer(answer){
/*
  This function will compare the 'answer' to the currently picked capital. The way we're doing it here is pretty simple: we'll turn both the tweet and the name of the capital to lowercase text and see if the tweet contains the capital's name.

  We could go a bit further here, for example notify the person if they probably just misspelled their answer, using something like see https://www.npmjs.com/package/levenshtein (you can learn more about Levenshtein distance on Wikipedia: https://en.wikipedia.org/wiki/Levenshtein_distance).
*/
  return (answer.toLowerCase().indexOf(current_country.capital.toLowerCase()) > -1);
}

function tweetRandomFlag(){
/*
  We are going to be doing a few things inside this function. We'll start by calling the pickRandomCountry function, which returns a random country from our list.
*/  
  current_country = pickRandomCountry();
/*
  I am using the console.log command to keep a log of what's going on, so you can easily see what your bot is doing inside the 'server.js - Running' tab at the bottom of the screen.
*/

  console.log('New country:');
  console.log(current_country);

/*
  We need to replace spaces in the country's name with _, because that's how the images you downloaded are named.

  readFileSync is a node.js function that loads a file: https://nodejs.org/api/fs.html#fs_fs_readfilesync_file_options

  Twitter expects the file to be encoded as a base64 image. For now, this is just a minor technical details, but you can read more about uploading media to Twitter at https://dev.twitter.com/rest/public/uploading-media .
*/
  
  var imagePath = path.join(__dirname, '/flags/' + current_country.country.replace(/ /g, '_') + '.png'),
      b64content = fs.readFileSync(imagePath, { encoding: 'base64' });

  console.log('Uploading flag...');

  T.post('media/upload', { media_data: b64content }, function (err, data, response) {
    if (err){
      console.log('ERROR');
      console.log(err);          
    }
    else{
    /*
      Once our file is successfully uploaded, we want to take the data returned from Twitter, which will contain the ID of our uploaded image. Then we will compose a tweet containing the image ID -- which needs to be an array. Search for "media_ids" on https://dev.twitter.com/rest/reference/post/statuses/update for a bit more detail.
    */

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
}

/*
  After loading the twit library, we need to create an object that we'll use to access Twitter's API.

  To see examples of how twit is used, check out its GitHub page at https://github.com/ttezel/twit .  
*/


var T = new Twit(config),
    /*
      We are going to use twit to track tweets that contain our bot's username. Later on we will filter out only tweets that directly respond to our tweets, so that we don't respond to people who are only talking about our bot, but not actually playing the game.
    */

    public_stream = T.stream('statuses/filter', {
      track: '@what_capital'
    });

public_stream.on('tweet', function (tweet) {
    console.log('Received new answer!');
    console.log(tweet.text);

    var tweet_response = '';

    if (tweet.in_reply_to_status_id && checkAnswer(tweet.text)){
    /*
      As mentioned above, we only want to consider direct replies as attempts to play the game. We could go a bit further here and, for example, check if the person is responding only to our latest tweet.      
    */

      tweet_response = '.@' + tweet.user.screen_name 
                     + ' That is correct! ' 
                     + current_country.capital + ' is the capital of '
                     + current_country.country + '.';
    /*
      In case you're not familiar with how Twitter works, tweets that start with @ are not visible on your profile, unless you go to the "Tweets & replies" tab.

      What we want to do here is to reply to incorrect answers "privately", but show when someone wins the current round right on our profile. Adding a dot before @ is a common way of forcing a tweet to appear on your main "Tweets" tab.
    */

      console.log('@' + tweet.user.screen_name + ' was correct! Starting a new game.');
    /*
      If the answer was correct, we can start a new game.
    */
      tweetRandomFlag();
    }
    else if(tweet.in_reply_to_status_id){
    /*
      This condition is met if the tweet is a direct reply, but the answer doesn't match the current capital.
    */
      tweet_response = '@' + tweet.user.screen_name + ' Sorry, not the correct answer!';
    }
    else{
    /*
      Finally, here we can respond to tweets mentioning our bot that are not from players. For now, I'm just going to log mentions and not do anything else.
    */
      console.log('New mention!');
      console.log(tweet.text);
    }

    if (tweet_response.length > 0){
    /*
      We will post our response here, but only if we have something to say!
    */
      T.post('statuses/update', {
        in_reply_to_status_id: tweet.id_str,
        status: tweet_response
      },
        function(err, data, response) {
          if (err){
            console.log('Error!');
            console.log(err);
          }
        }
      );       
    }
});

/*
  And now we're ready to start our game!  
*/

tweetRandomFlag();

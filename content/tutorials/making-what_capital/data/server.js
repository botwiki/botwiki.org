var fs = require('fs'),
    path = require('path'),
    Twit = require('twit'),
    list_of_countries = require(path.join(__dirname, 'list_of_countries.js')),
    config = require(path.join(__dirname, 'config.js')),
    current_country;

function pickRandomCountry() {
  return list_of_countries[Math.floor(Math.random() * list_of_countries.length)];
}

function checkAnswer(answer){
  return (answer.toLowerCase().indexOf(current_country.capital.toLowerCase()) > -1);
}

function tweetRandomFlag(){
  current_country = pickRandomCountry();
  console.log(current_country);
  
  var imagePath = path.join(__dirname, '/flags/' + current_country.country.replace(/ /g, '_') + '.png'),
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
}

var T = new Twit(config),
    public_stream = T.stream('statuses/filter', {
      track: '@what_capital'
    });

public_stream.on('tweet', function (tweet) {
    console.log('Received new answer!');
    console.log(tweet.text);

    var tweet_response = '';
    
    if (checkAnswer(tweet.text)){
      tweet_response = '.@' + tweet.user.screen_name 
                     + ' That is correct! ' 
                     + current_country.capital + ' is the capital of '
                     + current_country.country + '.';    

      console.log('@' + tweet.user.screen_name + ' was correct! Starting a new game.');
      tweetRandomFlag();
    }
    else{
      tweet_response = '@' + tweet.user.screen_name + ' Sorry, not the correct answer!';
    }
    
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
});

tweetRandomFlag();

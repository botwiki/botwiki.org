# Botwiki.org

<img style="max-width:100%;" src="content/images/botwiki.png">

***Note: All members of the Botwiki.org team and contributors must read, understand and follow our official [Code of Conduct](https://github.com/botwiki/botmakers.org/blob/master/Code%20of%20Conduct.md).***

## Installing Botwiki

Botwiki is powered by [Pico](http://picocms.org/), which is a very simple CMS running on PHP, the content of the site is created with [Markdown](http://daringfireball.net/projects/markdown/basics). You can install the site with [Composer](https://getcomposer.org/), so one of these should work (provided that you have already installed [PHP](http://php.net/manual/en/install.php)):

```
php composer install
```

Or

```
php composer.phar install
```

See the [Pico documentation for more details](http://picocms.org/docs.html); additionally, if you also want to mess with the look of the site, you will need to install [node](https://nodejs.org/) (which comes with [npm](https://docs.npmjs.com/)).

Then, from the root directory, you can run:

```
sudo npm install
```


## Updating or adding new content

All the website's content is inside the  ```content``` folder. If you only want to update the content or add something new, rather than update the look of the website, go to the main folder and run

```
php -S localhost:5000
```

The folder structure is very simple and corresponds to the actual structure of the site. So, for example, if you want to add a new Twitter bot, you can navigate to 

```
content/bots/twitterbots/
```

Then create a new file ```my_new_bot.md``` and the page will be available at 


localhost:5000/**bots/twitterbots/my_new_bot**

Or

botwiki.org/**bots/twitterbots/my_new_bot**

## Updating the styles

First run the site as above:

```
php -S localhost:5000
```

And then run the gulp tasks, simply with:

```
gulp
```

The site will be available with live-reloading at localhost:3000.

If you for some reason get an error about a node package missing, just install it with

```
sudo npm install NAME_OF_THE_PACKAGE --save-dev
```

## Contributing without GitHub

[The main idea](http://blog.fourtonfish.com/post/124755462290/botwikiorg) behind Botwiki is to keep maintaining, contributing and distributing simple. It runs on PHP, which is the most common back-end language, available even on [free web hosting sites](https://www.google.com/search?q=free+php+hosting). [Markdown](http://daringfireball.net/projects/markdown/basics) is a fairly simple language that uses only text.

If you'd like to contribute outside of GitHub, you can send an email to <a href="mailto:stefan@fourtonfish.com">stefan@fourtonfish.com</a>. Simply copy the content of [this file](https://raw.githubusercontent.com/botwiki/botwiki.org/master/content/bots/twitterbots/holidaybot4000.md) and replace it with relevant information -- and if you'd like, you can also include a screenshot (the width should be **900px**, height is not limited, but shouldn't be more than around 500px). 
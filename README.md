# Botwiki.org

<img style="max-width:100%;" src="content/images/botwiki.png">


## Installing Botwiki

Botwiki is powered by [Pico](http://picocms.org/), which is a very simple CMS running on PHP, the content of the site is created with [Markdown](http://daringfireball.net/projects/markdown/basics). You can install the site with [Composer](https://getcomposer.org/), so one of these should work -- provided that you have already installed [PHP](http://php.net/manual/en/install.php):

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


## Updating content

All the website's content is inside the  ```content``` folder. If you only want to update the content, not the look of the page, go to the main folder and run

```
php -S localhost:5000
```

The folder structure is very simple and corresponds to the actual structure of the site. So, for example, if you want to add a new Twitter bot, you can navigate to 

```
content/bots/twitterbots/
```

Then create a new file ```my_new_bot.md``` and the page will be available at 


localhost:3000/**bots/twitterbots/my_new_bot**

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
# Translating the Botwiki.org content

We are now in phase one of translating the Botwiki.org content. During this phase we are only translating the bot pages as the content of the other pages may still change significantly.

# The process

Let's say you want to translate https://github.com/botwiki/botwiki.org/blob/master/content/bots/twitterbots/11_11_bot.md

1. Create a [new issue](https://github.com/botwiki/botwiki.org/issues/new) on the Botwiki GitHub repo and list the bots you want to translate. Hint -- you can use [checkboxes](https://github.com/blog/1375%0A-task-lists-in-gfm-issues-pulls-comments) to track your progress.
2. After cloning the repo, create a copy of the file `/content/bots/twitterbots/11_11_bot.md` in the same folder, and name it `11_11_bot_xx`, where `xx` is the language code ([ISO 639-1](https://www.loc.gov/standards/iso639-2/php/code_list.php)).
3. Looking at the [actual .md file](https://raw.githubusercontent.com/botwiki/botwiki.org/master/content/bots/twitterbots/11_11_bot.md), add ` (xx)` after the `Title` ([see Pico issue #140](https://github.com/picocms/Pico/issues/140)), update the `Author` tag to your name or your most common online username, then update `Date` to the current date using the format most common in your country, and finally, add a new tag below called `Language: xx`.
4. In the original file, add a tag `Translations:` followed by `xx`. If the `Translations` tag is already present, simply append a comma and a new language code (no spaces), for example `Translations: es,it`. Also, append `(xx)` after the `Title` tag.
5. Translate the content of the page, in this case it would be:

```
[@11_11_bot](https://twitter.com/11_11_bot) is a Twitter bot created by [@swayandsea](https://twitter.com/swayandsea) that will remind of your own mortality, daily.
```

And that's it! You can look at [this finished translation](https://raw.githubusercontent.com/botwiki/botwiki.org/master/content/bots/twitterbots/11_11_bot_es.md) as an example.
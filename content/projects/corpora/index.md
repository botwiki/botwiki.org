/*
Title: Botwiki Corpora API
Thumbnail: /content/projects/corpora/images/corpora-api-thumbnail.png
Show donation link: yes
Description: A free Corpora API.
*/

<div class="note"><p>If you're new to web APIs, <a href="/tutorials/general-programming/#web-apis">check out these tutorials</a>.</p></div>

### [¶](#about){.pilcrow} About the project {#about}

Botwiki Corpora API provides free access to the [Corpora](https://github.com/dariusk/corpora) data, with more advanced features coming soon.

### [¶](#how-to-use){.pilcrow} How to use {#how-to-use}

Currently, only the `api/corpora/data` endpoint is accessible. You can [browse the original Corpora repository](https://github.com/dariusk/corpora) to find the corpus you'd like to use, for example [animals/birds_antarctica.json](https://github.com/dariusk/corpora/blob/master/data/animals/birds_antarctica.json).

Copy the URL and replace

```
https://github.com/dariusk/corpora/blob/master
```

with


```
https://botwiki.org/api/corpora
```

Your final URL should then look like this:

```
https://botwiki.org/api/corpora/data/animals/birds_antarctica.json
```

### [¶](#notes){.pilcrow} Notes and contact {#notes}


The data is refreshed every hour, but feel free to [reach out](mailto:stefan@botwiki.org) (or [@botwikidotorg](https://twitter.com/botwikidotorg)) if you need a more immediate update, or want to report any issues.


Any issues with the data (typos, other inaccuracies) should be reported [to the original project](https://github.com/dariusk/corpora).

And [be sure to submit your bot](https://botwiki.org/submit-your-bot) :-)

[**See other Botwiki projects.**](/projects/)

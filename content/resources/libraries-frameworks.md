/*
Title: Libraries and frameworks
Description: Useful libraries and frameworks in various languages
Show donation link: yes
Date: July 23, 2015
Tags: web,scraping,scraper,language,rhyme,rhyming,nlp,machine learning,nodejs,python,block,offensive
Nav: hidden
*/

For libraries and frameworks for specific networks check out their corresponding pages:

- [Twitter bots](/resources/twitterbots)
- [Slack bots](/resources/slackbots)
- [IRC bots](/resources/irc-bots)

![Another "machine"](/content/images/illustrations/riehle-testing-machine.jpg){.float-right}

### [¶](#bot-frameworks){.pilcrow} General bot frameworks  {#bot-frameworks}

- [Microsoft Bot Framework](https://dev.botframework.com/)


### [¶](#language){.pilcrow} Language  {#language}

#### [¶](#language-filter){.pilcrow} Filtering {#language-filter}

- [dariusk/wordfilter](https://github.com/dariusk/wordfilter) -- a simple Ruby module that lets you filter (bad) words (available for node.js, PHP, Python, and Ruby)
- [Shutterstock's List of Dirty, Naughty, Obscene, and Otherwise Bad Words](https://github.com/shutterstock/List-of-Dirty-Naughty-Obscene-and-Otherwise-Bad-Words/blob/master/en) -- not perfect, but it seems like it could be useful for building your own list

##### [¶](#language-filter-nodejs){.pilcrow} node.js {#language-filter-nodejs}

- [iscool](https://www.npmjs.com/package/iscool) -- tool to help check if a string contains offensive or disrespectful language, or refers to a tragedy.



##### [¶](#language-filter-python){.pilcrow} Python {#language-filter-python}

- [Python script to filter possibly offensive text](https://github.com/molly/CyberPrefixer/blob/master/offensive.py) -- the source code for Molly's [@cyberprefixer](https://twitter.com/cyberprefixer) contains a script


#### [¶](#language-generate-template){.pilcrow} Generating and templating {#language-generate-template}

##### [¶](#language-generate-template-nodejs){.pilcrow} node.js {#language-generate-template-nodejs}


- [queneau-letters](https://www.npmjs.com/package/queneau-letters) -- node.js implementation of [Queneau Assembly/Letter Chunks](http://www.crummy.com/2011/08/18/0) algorithm by Leonard Richardson
- [queneau-buckets](https://www.npmjs.com/package/queneau-buckets) -- node.js implementation of Leonard Richardson's [Queneau Assembly](http://www.crummy.com/2011/08/18/0) buckets algorithm
- [kylestetz/Sentencer](https://github.com/kylestetz/Sentencer) -- madlibs-style sentence templating
- [jimkang/shakesnippet](https://github.com/jimkang/shakesnippet) -- provides a randomly chosen Shakespeare excerpt
- [spewer](https://www.npmjs.com/package/spewer) -- a reverse part-of-speech tagger: give it a list of tags and it spews out matching language
- [shariq/burgundy](https://github.com/shariq/burgundy) -- generates "aesthetically pleasing words", see [burgundy.io](http://burgundy.io/)
- [Improv](http://segue.pw/2016/01/27/improv.html) -- a javascript library for generative text
- [incrediblesound/story-graph](https://github.com/incrediblesound/story-graph) -- the graph that generates stories
- [michaelpaulukonis/tagspewer](https://github.com/michaelpaulukonis/tagspewer) -- spew text based on pos-tagged-templates and associated lexicon; includes tools for parsing text and generating templates and lexicon

##### [¶](#language-generate-template-python){.pilcrow} Python {#language-generate-template-python}

- [cblgh/storyteller](https://github.com/cblgh/storyteller) -- a templating language and python parser for generating small stories
- [nathanielksmith/prosaic](https://github.com/nathanielksmith/prosaic) -- cut-up poetry generation over large corpora
- [ryankiros/neural-storyteller](https://github.com/ryankiros/neural-storyteller) -- recurrent neural network for generating little stories about images
- [mewo2/syllpos](https://github.com/mewo2/syllpos) -- a collection of wordlists

#### [¶](#language-rhyme-pronunciation){.pilcrow} Rhyming and pronunciation {#language-rhyme-pronunciation}

##### [¶](#language-rhyme-pronunciation-nodejs){.pilcrow} node.js {#language-rhyme-pronunciation-nodejs}

- [zeke/cmu-pronouncing-dictionary](https://github.com/zeke/cmu-pronouncing-dictionary) -- all the 134,000+ words in the [CMU pronouncing dictionary](http://www.speech.cs.cmu.edu/cgi-bin/cmudict) as a simple JSON object
- [zeke/rhymes](https://github.com/zeke/rhymes) -- "Give me an English word and I'll give you a list of rhymes." (uses zeke/cmu-pronouncing-dictionary)

##### [¶](#language-rhyme-pronunciation-python){.pilcrow} Python {#language-rhyme-pronunciation-python}

- [aparrish/pronouncingpy](https://github.com/aparrish/pronouncingpy) -- a simple interface for the [CMU pronouncing dictionary](http://www.speech.cs.cmu.edu/cgi-bin/cmudict), useful for finding rhymes


#### [¶](#language-other){.pilcrow} Other {#language-other}

##### [¶](#language-other-nodejs){.pilcrow} node.js {#language-other-nodejs}
- [NaturalNode/natural](https://github.com/NaturalNode/natural) -- general natural language facilities for node
- [stanford-simple-nlp](https://www.npmjs.com/package/stanford-simple-nlp) -- a simple node.js wrapper for Stanford CoreNLP
- [doeg/toke](https://github.com/doeg/toke) -- an experimental linguistics DSL for phrase grammar
- [nemo/natural-synaptic](https://github.com/nemo/natural-synaptic) -- natural language classifier


##### [¶](#language-other-python){.pilcrow} Python {#language-other-python}

- [tensorflow/tensorflow](https://github.com/tensorflow/tensorflow) -- an open source software library for numerical computation using data flow graphs, by Google; see also [models](https://github.com/tensorflow/models) and [other related resources](https://github.com/tensorflow)
- [seatgeek/fuzzywuzzy](https://github.com/seatgeek/fuzzywuzzy) -- fuzzy string matching in Python, read more on [chairnerd.seatgeek.com](http://chairnerd.seatgeek.com/fuzzywuzzy-fuzzy-string-matching-in-python/)
- [karpathy/neuraltalk](https://github.com/karpathy/neuraltalk) -- Python+numpy project for learning Multimodal Recurrent Neural Networks that describe images with sentences
- [mewo2/syllpos](https://github.com/mewo2/syllpos) -- wordlists by part of speech and syllable count
- [hugovk/chroniclingamerica.py](https://github.com/hugovk/chroniclingamerica.py) -- a Python wrapper for the [Chronicling America](http://chroniclingamerica.loc.gov/about/api/) API
- [pteichman/quotefix](https://github.com/pteichman/quotefix) -- Insert matching punctuation for mismatched quotation marks, parentheses, etc. Good postprocessing for N-gram text synthesis.
- [interrogator/corpkit](https://github.com/interrogator/corpkit) --  a Python-based toolkit for working with linguistic corpora





### [¶](#images){.pilcrow} Images {#images}

#### [¶](#images-nodejs){.pilcrow} node.js {#images-nodejs}

- [aleju/cat-generator](https://github.com/aleju/cat-generator) -- generate cat images with neural networks
- [Newmu/dcgan_code](https://github.com/Newmu/dcgan_code) -- generate any image

#### [¶](#images-python){.pilcrow} Python {#images-python}

- [paarthneekhara/text-to-image](https://github.com/paarthneekhara/text-to-image) -- text to image synthesis using thought vectors

#### [¶](#images-lua){.pilcrow} Lua {#images-lua}

- [facebookresearch/deepmask](https://github.com/facebookresearch/deepmask) -- Torch implementation of [DeepMask and SharpMask](https://code.facebook.com/posts/561187904071636)


### [¶](#apis){.pilcrow} APIs {#apis}

#### [¶](#apis-nodejs){.pilcrow} node.js {#apis-nodejs}

- [google-spreadsheet](https://www.npmjs.com/package/google-spreadsheet) -- "a simple Node.js library to read and manipulate data in Google Spreadsheets"; also see [this article](http://feeltrain.com/blog/stay-woke/) on how it can be used



### [¶](#web-scraping-parsing){.pilcrow} Web scraping and parsing {#web-scraping-parsing}

#### [¶](#web-scraping-parsing-nodejs){.pilcrow} node.js {#web-scraping-parsing-nodejs}

- [cheeriojs/cheerio](https://github.com/cheeriojs/cheerio) -- "fast, flexible, and lean implementation of core jQuery designed specifically for the server" (web scraping)
- [feedparser](https://www.npmjs.com/package/feedparser) -- a robust RSS Atom and RDF feed parsing using Isaac Schlueter's [sax](https://github.com/isaacs/sax-js) parser


#### [¶](#web-scraping-parsing-python){.pilcrow} Python {#web-scraping-parsing-python}

- [Beautiful Soup](http://www.crummy.com/software/BeautifulSoup/bs4/doc/) -- "a Python library for pulling data out of HTML and XML files"



### [¶](#other){.pilcrow} Other {#other}

#### [¶](#other-nodejs){.pilcrow} node.js {#other-nodejs}

- [peterbraden/node-opencv](https://github.com/peterbraden/node-opencv) -- OpenCV Bindings for node.js
- [TomaszRewak/ML-games](https://github.com/TomaszRewak/ML-games) -- Machine learning games. Use combination of genetic algorithms and neural networks to control the behaviour of in-game objects. ([demo](http://ml-games.tomasz-rewak.com/))
- [baidu/Paddle](https://github.com/baidu/Paddle) -- PArallel Distributed Deep LEarning ([paddlepaddle.org](http://www.paddlepaddle.org/))


#### [¶](#other-python){.pilcrow} Python {#other-python}

- [hugovk/whatsonthemenu](https://github.com/hugovk/whatsonthemenu) -- Python interface to [NYPL's What's on The Menu API](https://github.com/NYPL/menus-api)


[Darius Kazemi's GitHub repos](https://github.com/dariusk?tab=repositories) are also worth checking out for an assorted collection of tools and libraries for node.js and Python.

[Back to all resources.](/resources)

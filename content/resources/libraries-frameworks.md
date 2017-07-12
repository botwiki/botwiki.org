/*
Title: Libraries and frameworks
Description: Useful libraries and frameworks in various languages
Thumbnail: /content/images/illustrations/riehle-testing-machine-large.jpg
Show donation link: yes
Date: July 23, 2015
Tags: resources,libraries,frameworks,web,scraping,scraper,language,rhyme,rhyming,nlp,machine learning,nodejs,python,block,offensive
Nav: hidden
*/


### Page content [¶](#page-content){.pilcrow} {#page-content}

- [General bot frameworks](#bot-frameworks)
- [Language](#language)
  - [Filtering](#language-filter)
  - [Generating and templating](#language-generate-template)
  - [Rhyming and pronunciation](#language-rhyme-pronunciation)
  - [Other language libraries](#language-other)
- [Images](#images)
- [Math and data](#math-data)
- [APIs](#apis)
- [Web scraping and parsing](#web-scraping-parsing)
- [Machine learning, AI](#machine-learning-ai)
  - [TensorFlow](#tensorflow)


### General bot frameworks [¶](#bot-frameworks){.pilcrow} {#bot-frameworks}

- [Botkit](https://github.com/howdyai/botkit)
- [Microsoft Bot Framework](https://dev.botframework.com/)

For libraries and frameworks for specific networks [check out the Resources page](/resources/#specific-resources).


### Language [¶](#language){.pilcrow} {#language}

#### Filtering [¶](#language-filter){.pilcrow} {#language-filter}

- [dariusk/wordfilter](https://github.com/dariusk/wordfilter): a simple Ruby module that lets you filter (bad) words (available for node.js, PHP, Python, and Ruby)
- [Shutterstock's List of Dirty, Naughty, Obscene, and Otherwise Bad Words](https://github.com/shutterstock/List-of-Dirty-Naughty-Obscene-and-Otherwise-Bad-Words/blob/master/en): not perfect, but it seems like it could be useful for building your own list

##### node.js [¶](#language-filter-nodejs){.pilcrow} {#language-filter-nodejs}

- [iscool](https://www.npmjs.com/package/iscool): tool to help check if a string contains offensive or disrespectful language, or refers to a tragedy.

##### Python [¶](#language-filter-python){.pilcrow} {#language-filter-python}

- [Python script to filter possibly offensive text](https://github.com/molly/CyberPrefixer/blob/master/offensive.py): the source code for Molly's [@cyberprefixer](https://twitter.com/cyberprefixer) contains a script

#### Generating and templating [¶](#language-generate-template){.pilcrow} {#language-generate-template}

##### node.js [¶](#language-generate-template-nodejs){.pilcrow} {#language-generate-template-nodejs}


- [queneau-letters](https://www.npmjs.com/package/queneau-letters): node.js implementation of [Queneau Assembly/Letter Chunks](http://www.crummy.com/2011/08/18/0) algorithm by Leonard Richardson
- [queneau-buckets](https://www.npmjs.com/package/queneau-buckets): node.js implementation of Leonard Richardson's [Queneau Assembly](http://www.crummy.com/2011/08/18/0) buckets algorithm
- [kylestetz/Sentencer](https://github.com/kylestetz/Sentencer): madlibs-style sentence templating
- [jimkang/shakesnippet](https://github.com/jimkang/shakesnippet): provides a randomly chosen Shakespeare excerpt
- [spewer](https://www.npmjs.com/package/spewer): a reverse part-of-speech tagger: give it a list of tags and it spews out matching language
- [shariq/burgundy](https://github.com/shariq/burgundy): generates "aesthetically pleasing words", see [burgundy.io](http://burgundy.io/)
- [Improv](http://segue.pw/2016/01/27/improv.html): a javascript library for generative text
- [incrediblesound/story-graph](https://github.com/incrediblesound/story-graph): the graph that generates stories
- [michaelpaulukonis/tagspewer](https://github.com/michaelpaulukonis/tagspewer): spew text based on pos-tagged-templates and associated lexicon; includes tools for parsing text and generating templates and lexicon

##### Python [¶](#language-generate-template-python){.pilcrow} {#language-generate-template-python}

- [cblgh/storyteller](https://github.com/cblgh/storyteller): a templating language and python parser for generating small stories
- [nathanielksmith/prosaic](https://github.com/nathanielksmith/prosaic): cut-up poetry generation over large corpora
- [ryankiros/neural-storyteller](https://github.com/ryankiros/neural-storyteller): recurrent neural network for generating little stories about images
- [mewo2/syllpos](https://github.com/mewo2/syllpos): a collection of wordlists

#### Rhyming and pronunciation [¶](#language-rhyme-pronunciation){.pilcrow} {#language-rhyme-pronunciation}

##### node.js [¶](#language-rhyme-pronunciation-nodejs){.pilcrow} {#language-rhyme-pronunciation-nodejs}

- [zeke/cmu-pronouncing-dictionary](https://github.com/zeke/cmu-pronouncing-dictionary): all the 134,000+ words in the [CMU pronouncing dictionary](http://www.speech.cs.cmu.edu/cgi-bin/cmudict) as a simple JSON object
- [zeke/rhymes](https://github.com/zeke/rhymes): "Give me an English word and I'll give you a list of rhymes." (uses zeke/cmu-pronouncing-dictionary)

##### Python [¶](#language-rhyme-pronunciation-python){.pilcrow} {#language-rhyme-pronunciation-python}

- [aparrish/pronouncingpy](https://github.com/aparrish/pronouncingpy): a simple interface for the [CMU pronouncing dictionary](http://www.speech.cs.cmu.edu/cgi-bin/cmudict), useful for finding rhymes


#### Other language libraries [¶](#language-other){.pilcrow} {#language-other}

##### node.js [¶](#language-other-nodejs){.pilcrow} {#language-other-nodejs}
- [NaturalNode/natural](https://github.com/NaturalNode/natural): general natural language facilities for node
- [stanford-simple-nlp](https://www.npmjs.com/package/stanford-simple-nlp): a simple node.js wrapper for Stanford CoreNLP
- [doeg/toke](https://github.com/doeg/toke): an experimental linguistics DSL for phrase grammar
- [nemo/natural-synaptic](https://github.com/nemo/natural-synaptic): natural language classifier


##### Python [¶](#language-other-python){.pilcrow} {#language-other-python}

- [NLTK](http://www.nltk.org/): platform for building Python programs to work with human language data
- [seatgeek/fuzzywuzzy](https://github.com/seatgeek/fuzzywuzzy): fuzzy string matching in Python, read more on [chairnerd.seatgeek.com](http://chairnerd.seatgeek.com/fuzzywuzzy-fuzzy-string-matching-in-python/)
- [karpathy/neuraltalk](https://github.com/karpathy/neuraltalk): Python+numpy project for learning Multimodal Recurrent Neural Networks that describe images with sentences
- [mewo2/syllpos](https://github.com/mewo2/syllpos): wordlists by part of speech and syllable count
- [hugovk/chroniclingamerica.py](https://github.com/hugovk/chroniclingamerica.py): a Python wrapper for the [Chronicling America](http://chroniclingamerica.loc.gov/about/api/) API
- [pteichman/quotefix](https://github.com/pteichman/quotefix): Insert matching punctuation for mismatched quotation marks, parentheses, etc. Good postprocessing for N-gram text synthesis.
- [interrogator/corpkit](https://github.com/interrogator/corpkit):  a Python-based toolkit for working with linguistic corpora


##### Other [¶](#language-other-other){.pilcrow} {#language-other-other}

- [facebookincubator/duckling](https://github.com/facebookincubator/duckling): language, engine, and tooling for expressing, testing, and evaluating composable language rules on input strings (Haskell)


### Images [¶](#images){.pilcrow} {#images}

#### node.js [¶](#images-nodejs){.pilcrow} {#images-nodejs}

- [aleju/cat-generator](https://github.com/aleju/cat-generator): generate cat images with neural networks
- [Newmu/dcgan_code](https://github.com/Newmu/dcgan_code): generate any image
- [peterbraden/node-opencv](https://github.com/peterbraden/node-opencv): OpenCV Bindings for node.js
- [nicolaspanel/numjs](https://github.com/nicolaspanel/numjs): node.js module for scientific computing with JavaScript and basic image processing


#### Python [¶](#images-python){.pilcrow} {#images-python}

- [paarthneekhara/text-to-image](https://github.com/paarthneekhara/text-to-image): text to image synthesis using thought vectors
- [phillipi/pix2pix](https://github.com/phillipi/pix2pix): image-to-image translation using conditional adversarial nets
- [friggog/tree-gen](https://github.com/friggog/tree-gen): procedural generation of trees


#### Lua [¶](#images-lua){.pilcrow} {#images-lua}

- [facebookresearch/deepmask](https://github.com/facebookresearch/deepmask): Torch implementation of [DeepMask and SharpMask](https://code.facebook.com/posts/561187904071636)

### Math and data [¶](#math-data){.pilcrow} {#math-data}

##### node.js [¶](#math-data-nodejs){.pilcrow} {#math-data-nodejs}

- [nicolaspanel/numjs](https://github.com/nicolaspanel/numjs): node.js module for scientific computing with JavaScript and basic image processing

##### Python [¶](#math-data-nodejs){.pilcrow} {#math-data-nodejs}

- [NumPy](http://www.numpy.org/): the fundamental package for scientific computing with Python (numpy.org)

### APIs [¶](#apis){.pilcrow} {#apis}

#### node.js [¶](#apis-nodejs){.pilcrow} {#apis-nodejs}

- [google-spreadsheet](https://www.npmjs.com/package/google-spreadsheet): "a simple Node.js library to read and manipulate data in Google Spreadsheets"; also see [this article](http://feeltrain.com/blog/stay-woke/) on how it can be used

#### Python [¶](#apis-python){.pilcrow} {#apis-python}

- [hugovk/whatsonthemenu](https://github.com/hugovk/whatsonthemenu): Python interface to [NYPL's What's on The Menu API](https://github.com/NYPL/menus-api)
- [pyNASA](https://bmtgoncalves.github.io/pyNASA/) (bmtgoncalves.github.io)

### Web scraping and parsing [¶](#web-scraping-parsing){.pilcrow} {#web-scraping-parsing}

#### node.js [¶](#web-scraping-parsing-nodejs){.pilcrow} {#web-scraping-parsing-nodejs}

- [cheeriojs/cheerio](https://github.com/cheeriojs/cheerio): "fast, flexible, and lean implementation of core jQuery designed specifically for the server" (web scraping)
- [feedparser](https://www.npmjs.com/package/feedparser): a robust RSS Atom and RDF feed parsing using Isaac Schlueter's [sax](https://github.com/isaacs/sax-js) parser


#### Python [¶](#web-scraping-parsing-python){.pilcrow} {#web-scraping-parsing-python}

- [Beautiful Soup](http://www.crummy.com/software/BeautifulSoup/bs4/doc/): "a Python library for pulling data out of HTML and XML files"



### Machine learning, AI [¶](#machine-learning-ai){.pilcrow} {#machine-learning-ai}

See dedicated [Machine learning, NLP, and AI resources](/resources/machine-learning-nlp-ai) and [tutorials](/tutorials/machine-learning-nlp-ai).

### More [¶](#more){.pilcrow} {#more}

[Darius Kazemi's GitHub repos](https://github.com/dariusk?tab=repositories) are also worth checking out for an assorted collection of tools and libraries for node.js and Python.

[Back to all resources.](/resources)

/*
Title: Tutorials
Description: Learn how to make your own bot!
Tags: machine learning,nlp,language,processing,opencv,deploy,deploy,deployment,digitalocean,heroku
Show donation link: yes
Weight: 2
*/

<div class="note">Before you start making bots, consider reading <a href="#bot-ethics">these essays and articles</a>. Also worth browsing: <a href="/resources/libraries-frameworks/#language">resources for cleaning up your bot's language</a>.</div>

[![Making Bots with Dexter](/content/tutorials/images/making-bots-dexter.png)](https://twitter.com/fourtonfish/status/664130256266264576){.float-right}

There is a variety of tools that make creating bots very easy. From [Cheap Bots Done Quick](http://cheapbotsdonequick.com/) (specifically for Twitter bots) and [Dexter](https://rundexter.com/), which is still in beta, but aims to make creating bots as easy as [dragging and dropping](https://twitter.com/fourtonfish/status/664130256266264576), to browser-based development environments, like [Cloud9](https://c9.io/). You can also find many [opensourced bots](/tag/opensource) that you can reuse and build on top of.

Botmaking has never been easier!

If you have any questions, try asking in our [community for botmakers and bot enthusiasts](https://botmakers.org/). 

### [¶](#network-specific-tutorials){.pilcrow} Network-specific tutorials {#network-specific-tutorials}

![Man, presumably reading a Twitterbot tutorial](/content/images/illustrations/man-reading-mail-768.jpg){.float-right}

- [Tutorials for Twitter bots](/tutorials/twitterbots)
- [Tutorials for Slack bots](/tutorials/slackbots)
- [Tutorials for Facebook Messenger bots](/tutorials/facebook-messenger-bots)
- [Tutorials for Telegram bots](/tutorials/telegram-bots)
- [Tutorials for YouTube bots](/tutorials/youtube-bots)
- [Tutorials for Reddit bots](/tutorials/redditbots)
- [Tutorials for IRC bots](/tutorials/irc-bots)

### [¶](#bot-hosting){.pilcrow} Bot hosting {#bot-hosting}

You have quite a few options when it comes to hosting your bots.

***Note:** See also [the Tools section](/resources/tools#botmaking).*

- [DigitalOcean](https://digitalocean.com/) -- a popular VPS (Virtual Private Server), starts at $5/month (it's also used to host this site; our [referral link](https://www.digitalocean.com/?refcode=9e279abc3337) gets you $10 starter credit)
- [OpenShift](https://www.openshift.com/) -- a [PaaS](https://en.wikipedia.org/wiki/Platform_as_a_service), comes with a free plan
- [Cloud9](https://c9.io/) -- browser-based IDE (integrated development environment) that vastly simplifies the development process; offers a free plan that works well with OpenShift for hosting
- [Heroku](https://www.heroku.com) -- similar to OpenShift, but your app needs to "sleep" for six hours each day (see details on the [pricing page](https://www.heroku.com/pricing)), useful tutorials include:
 - [Intermediate Cron Jobs with Heroku](http://blog.andyjiang.com/intermediate-cron-jobs-with-heroku/)
- [Linode](https://www.linode.com/) -- another VPS, starts at $10/mo
- [dreamhost](https://www.dreamhost.com/) -- web hosting and domain name registrar, their VPS starts at $15/month
- [Google Apps Script](https://script.google.com/d/11dB74uW9VLpgvy1Ax3eBZ8J7as0ZrGtx4BPw7RKK-JQXyAJHBx98pY-7/edit?usp=sharing) -- see [Bradley Momberger](https://twitter.com/air_hadoken)'s [blog](http://airhadoken.github.io/2015/06/29/twitter-lib-explained.html) for more details
- [PythonAnywhere](https://www.pythonanywhere.com/) -- "Host, run, and code Python in the cloud!" -- see also slides from the [Build A Bot](https://tpinecone.gitbooks.io/build-a-bot-workshop/content/index.html) workshop
- you can even use your [Raspberry Pi](http://www.instructables.com/id/Raspberry-Pi-Twitterbot/)

Specifically for Twitter bots, you can try:
- [Cheap Bots, Done Quick!](http://cheapbotsdonequick.com/) -- see [tutorials](/tutorials/twitterbots/#cheap-bots-done-quick) and [examples](/tag/cheapbotsdonequick) of bots created with CBDQ
- [tilde.town](http://tilde.town/) (Twitter and IRC bots)

See also [Hosting Slack Integrations](https://medium.com/slack-developer-blog/hosting-slack-integrations-79f3d4b04dd6#.5b0vc2x46) on the [Slack API Developer Blog](https://medium.com/slack-developer-blog).

**Note: ** [@beaugunderson](https://twitter.com/beaugunderson) is offering to let people host bots on his [Linode](https://www.linode.com/) account.

Common ways to manage multiple bots on the same network are:

- running each bot as a separate app/process with its own API keys
- running all of your bots in one app, using the same set of API keys
- or as a variation, you can create multiple apps, but still use the same API keys

For more general tutorials on hosting bots, see articles below. (Some [network specific tutorials](#network-specific-tutorials) include a step explaining how to host your bot.)

- [How to Deploy a Node.js App to DigitalOcean with a Free SSL Certificate (Video)](https://www.youtube.com/watch?v=kR06NoSzAXY&feature=youtu.be)
- [Automating bots with cron on DigitalOcean](http://www.colewillsea.com/blog/do-cron)

### [¶](#web-apis){.pilcrow} Learn to work with web APIs {#web-apis}
- [Codecademy](https://www.codecademy.com/apis) -- "learn how to use popular APIs to make your own applications"
- [Make Your Own Web Mashup: Introduction to Web APIs](https://fourtonfish.makes.org/thimble/make-your-own-web-mashup-introduction-to-web-apis) -- by [Stefan](https://twitter.com/fourtonfish)

### [¶](#chat){.pilcrow} Chat/conversational interfaces {#chat}

- [Bots better smarten up ... fast](http://venturebeat.com/2016/08/20/bots-better-smarten-up-fast/)
- [B.A.S.A.A.P. (Be As Smart As A Puppy)](http://berglondon.com/blog/2010/09/04/b-a-s-a-a-p/)
- [Guide to Chat Apps](https://www.gitbook.com/book/towcenter/guide-to-chat-apps/details)
- [The Jack Principles of The Interactive Conversational Interface](http://demos.jellyvisionlab.com/downloads/The_Jack_Principles.pdf) (PDF)
- [Designing Chat for Commerce](https://medium.com/@kipsearch/designing-chat-for-commerce-9faf1e36c040#.60e9wu4h6)
- [What Installing 15+ Slack Bots Taught Me About A Great Onboarding Experience](https://medium.com/@thecoolestcool/what-installing-15-slack-bots-taught-me-about-a-great-onboarding-experience-da04288a33d6#.36j71xppk)
- [Creating a Chat Bot](https://medium.freecodecamp.com/creating-a-chat-bot-42861e6a2acd#.k9tze7zbb)
- [Principles of bot design](https://blog.intercom.io/principles-bot-design/)

***See also:** [github.com/mortenjust/awesome-conversational](https://github.com/mortenjust/awesome-conversational/)*

### [¶](#machine-learning-nlp-ai){.pilcrow} Machine learning, NLP, AI {#machine-learning-nlp-ai}
- [Deep Learning](http://www.deeplearningbook.org/): resource intended to help students and practitioners enter the field of machine learning in general and deep learning in particular
- [Free AI Course Materials](http://popsnip.com/topic/982/)
- [Machine Learning: An In-Depth, Non-Technical Guide](http://www.innoarchitech.com/machine-learning-an-in-depth-non-technical-guide/)
- [Machine learning cheat sheet map](http://scikit-learn.org/stable/tutorial/machine_learning_map/index.html) -- "choosing the right estimator"
- [Intro to NLP with spaCy](http://nicschrading.com/project/Intro-to-NLP-with-spaCy/) -- "an introduction to spaCy for natural language processing and machine learning with special help from Scikit-learn"
- [OpenCV tutorials](http://docs.opencv.org/doc/tutorials/tutorials.html)
- [Deep Learning for NLP resources](https://github.com/andrewt3000/DL4NLP/)
- [Markov Chains Explained Visually](http://setosa.io/ev/markov-chains/)
- [Neural Networks Demystified](http://lumiverse.io/series/neural-networks-demystified)
- [Training a Recurrent Neural Network to Compose Music](https://maraoz.com/2016/02/02/abc-rnn/)
- [Neural Network Architectures](https://culurciello.github.io/tech/2016/06/04/nets.html)

### [¶](#bot-ethics){.pilcrow} Bot ethics {#bot-ethics}

<div class="note">
  Be sure to sign up at <a href="https://botmakers.org/">botmakers.org</a> and join the conversation on <a href="https://botmakers.slack.com/messages/ethics/details/">bot ethics</a>.
</div>

- [You Are The Bot: An intervention for bot developers](https://fourtonfish.com/blog/2016-03-18-you-are-the-bot/)
- [Bots Should Punch Up](bots-should-punch-up) -- by [Leonard Richardson](http://www.crummy.com/)
- [The Bot Rulebook](https://medium.com/slack-developer-blog/the-bot-rulebook-a442d9fb21cb#.cd051jijs)
- [What Good is a Bad Bot?](https://blog.howdy.ai/what-good-is-a-bad-bot-841226281a0e#.1ef1zinl9)
- [Chances are your Models are Racist, Sexist, or both](http://deliprao.com/archives/129)
- [How to Make a Bot That Isn't Racist](http://motherboard.vice.com/read/how-to-make-a-not-racist-bot)
- [TayAndYou - toxic before human contact](http://smerity.com/articles/2016/tayandyou.html)
- [Not just Tay: A recent history of the Internet’s racist bots](https://www.washingtonpost.com/news/the-intersect/wp/2016/03/25/not-just-tay-a-recent-history-of-the-internets-racist-bots/)
- [Where many bots will fail](https://blog.howdy.ai/where-many-bots-will-fail-68ae163e2473#.2gtskxus8)
- [So your AI bot went haywire, should you care?](https://www.linkedin.com/pulse/so-your-ai-bot-went-haywire-should-you-care-azeem-azhar?trk=v-feed)
- [The Veil of Ignorance](http://mrmrs.io/writing/2016/03/23/the-veil-of-ignorance/)
- [Mechanomorphs and the politeness of machines](http://nytlabs.com/blog/2016/03/24/mechanomorphism/)
- [Bots Need to Learn Some Manners, and It’s on Us to Teach Them](http://www.wired.com/2016/04/bots-emergent-behavior-deception/)
- [Basic Twitter bot etiquette](basic-twitter-bot-etiquette-tiny-subversions) -- applies to *all* bots
- [Language necessarily contains human biases, and so will machines trained on language corpora](https://freedom-to-tinker.com/blog/randomwalker/language-necessarily-contains-human-biases-and-so-will-machines-trained-on-language-corpora/)
- [Artificial Intelligence Will Be as Biased and Prejudiced as Its Human Creators](https://psmag.com/artificial-intelligence-will-be-as-biased-and-prejudiced-as-its-human-creators-38fe415f86dd#.u067yviv3)
- [The Real Bias Built In at Facebook](http://www.nytimes.com/2016/05/19/opinion/the-real-bias-built-in-at-facebook.html?_r=0)
- [Why An AI-Judged Beauty Contest Picked Nearly All White Winners](http://motherboard.vice.com/read/why-an-ai-judged-beauty-contest-picked-nearly-all-white-winners)

***See also:** [Critical Algorithm Studies: a Reading List](http://socialmediacollective.org/reading-lists/critical-algorithm-studies/)*

### [¶](#other){.pilcrow} Other {#other}
- [Why developers should treat bots like browser extensions](https://medium.com/@Paul__Walsh/why-developers-should-treat-bots-like-browser-extensions-cf819aab62b2#.m5nkwagsh)
- [How to interact with bots? Dealing with the complexity of a new design paradigm](https://chatbotsmagazine.com/how-to-interact-with-bots-dealing-with-the-complexity-of-a-new-design-paradigm-e89fd7131921#.56c4ywczd)
- [That Emoji Does Not Mean What You Think It Means](http://gizmodo.com/that-emoji-does-not-mean-what-you-think-it-means-1770296372)
- [Creating a Chat Bot](https://medium.freecodecamp.com/creating-a-chat-bot-42861e6a2acd#.cbx4cb7ft)
- [The Bot Stack](https://medium.com/why-not/the-bot-stack-a44bca123ce6) -- by [Ben Brown](https://twitter.com/benbrown)
- [Finding Rhymes with Python](https://docs.google.com/presentation/d/1SxfHEdN8DGliH-Qa4zVsWtCcx5BZAQITXcd1OuDBz_U/edit?pli=1#slide=id.p) by [@nate_smith](https://twitter.com/nate_smith)
- [How to query Wikipedia like a database](http://tinysubversions.com/notes/how-to-query-wikipedia/)
- Video introduction of RiveScript by its author, Noah Petherbridge: [Part 1](https://www.youtube.com/watch?v=Vkd4chh0ewU), [part 2](https://www.youtube.com/watch?v=sRdm2OkZaGk), also see [rivescript.com](http://www.rivescript.com/)
- [Troubleshooting cron jobs for bot makers](http://lizmrush.com/cron-jobs-for-bot-makers/)
- [SMS for Humans: Using NLP and Python To Build Text Interfaces](https://www.youtube.com/watch?v=3o5awRDS0oI), with [Twilio.com](https://www.twilio.com/)


Also check out [the opensourced bots](/tag/opensource).
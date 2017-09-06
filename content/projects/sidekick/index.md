/*
Title: Sidekick
Thumbnail: /content/projects/sidekick/images/reaction-retweet.png
Tags: about,botwiki,projects,sidekick,botwikibot
Show donation link: yes
Description: See what we are working on.
*/

**Sidekick makes managing your Slack group easier.**

<a class="btn" href="#features">Explore features</a> <a class="btn" href="#commands">See commands</a>

### Features [¶](#features){.pilcrow} {#features}

#### Send a group message to admins [¶](#admins-message){.pilcrow} {#admins-message}

![Message all admins in the group](/content/projects/sidekick/images/admin-message-forward.png) {.centered .screenshot}


#### Learn more about the members and bots in your group [¶](#group-info){.pilcrow} {#group-info}

![Learn more about your group](/content/projects/sidekick/images/group-info.png) {.centered .screenshot}



![Learn more about bots and integrations in your group](/content/projects/sidekick/images/group-info-bots.png) {.centered .screenshot}


#### Set up polls [¶](#polls){.pilcrow} {#polls}


![Poll](/content/projects/sidekick/images/polls.png) {.centered .screenshot}

#### Send unobtrusive reminders [¶](#reminders){.pilcrow} {#reminders}

![Code of conduct reminder](/content/projects/sidekick/images/hey-guys.png) {.centered .screenshot}

![Sharing links reminder](/content/projects/sidekick/images/sharing-links.png) {.centered .screenshot}

#### Move messages between channels [¶](#move-messages){.pilcrow} {#move-messages}


![Move messages](/content/projects/sidekick/images/move-message.png) {.centered .screenshot}



#### Monitor Twitter for specific keywords and hashtags [¶](#monitor-twitter){.pilcrow} {#monitor-twitter}

![Monitor Twitter for interesting tweets](/content/projects/sidekick/images/monitor-twitter.png) {.centered .screenshot}

![Ignore users](/content/projects/sidekick/images/ignore.png) {.centered .screenshot}


#### Share tweets with Sidekick to have them retweeted [¶](#dm-to-rt){.pilcrow} {#dm-to-rt}

![Share to retweet](/content/projects/sidekick/images/share-to-retweet.png) {.centered .screenshot}



### Commands [¶](#commands){.pilcrow} {#commands}
<!-- 
#### All members [¶](#commands-all){.pilcrow} {#commands-all}
 -->
<table class="data-table">
<tr>
  <th>Commmand/Reaction</th>
  <th>Effect</th>
</tr>
<tr>
  <td>
    <code>forward to mods</code><br/>
    <code>forward to moderators</code><br/>
    <code>for mods</code><br/>
    <code>for moderators</code><br/>
    <code>forward to admins</code><br/>
    <code>for admins</code>
  </td>
  <td>
    Forward your message to group's moderators.
  </td>
</tr>
<tr>
  <td>
    <code>about this group</code><br/>
    <code>who is online</code><br/>
    <code>who's online</code>
  </td>
  <td>
    See information about your group such as number of registered accounts and how many people are currently online.
  </td>
</tr>
<tr>
  <td>
    <code>list all bots</code><br/>
    <code>what bots are here</code><br/>
    <code>list bots</code>
  </td>
  <td>
    List all bots in the group.
  </td>
</tr>
<tr>
  <td>
    <code>let's vote</code><br/>
    <code>let's have a vote</code><br/>
    <code>let's have a quick vote</code><br/>
    <code>let's have a poll</code><br/>
    <code>let's have a quick poll</code><br/>
    <code>here's a poll</code><br/>
    <code>here's a quick poll</code><br/>
    <code>how about a poll</code><br/>
    <code>how about a quick poll</code>
  </td>
  <td>
    Create a poll. You don't need to @ mention the bot. Here are example messages:
    <ul>
      <li><code>Let's have a poll: 1: Option one. 2: Option two. 3: Option three. 4: Option four</code></li>
      <li><code>Let's have a quick vote: Yay or nay?</code></li>
    </ul>
  </td>
</tr>
<tr>
  <td>
    <code>move that message to <strong>#channel</strong></code>
  </td>
  <td>
    First, mark a message with <code>:information_source:</code>, then you can ask the bot to re-post it to a more appropriate channel. The original message will remain where it was posted.
  </td>
</tr>
<tr>
  <td>
    <code>delete my account</code><br/>
    <code>delete me</code>
  </td>
  <td>
    Deactivate your account. If you change your mind, you can always get in touch with the group moderators via email and have your account restored.
  </td>
</tr>
<tr>
<tr>
  <td>
    <code>:newspaper:</code><br/>
    <code>:rolled_up_newspaper:</code>
  </td>
  <td>
    <p>Adding this reaction to a message in the <strong>#the-feed</strong> channel reposts it in the <strong>#news-and-articles</strong> channel.</p>
    <p><strong>Note:</strong> For moderators, this also retweets the tweet.</p>
  </td>
</tr>
<tr>
  <td>
    <code>:wrench:</code><br/>
    <code>:hammer_and_wrench:</code><br/>
    <code>:hammer:</code><br/>
    <code>:hammer_and_pick:</code>
  </td>
  <td>
    <p>Adding this reaction to a message in the <strong>#the-feed</strong> channel reposts it in the <strong>#projects</strong> channel.</p>
    <p><strong>Note:</strong> For moderators, this also retweets the tweet.</p>
  </td>
</tr>
<tr>
  <td>
    <code>:calendar:</code><br/>
    <code>:date:</code><br/>
    <code>:spiral_calendar_pad:</code>
  </td>
  <td>
    <p>Adding this reaction to a message in the <strong>#the-feed</strong> channel reposts it in the <strong>#events</strong> channel.</p>
    <p><strong>Note:</strong> For moderators, this also retweets the tweet.</p>
  </td>
</tr>
<tr>
  <td>
    <code>:bulb:</code>
  </td>
  <td>
    <p>Adding this reaction to a message in the <strong>#the-feed</strong> channel reposts it in the <strong>#ideas-and-collab</strong> channel.</p>
    <p><strong>Note:</strong> For moderators, this also retweets the tweet.</p>
  </td>
</tr>
<tr>
  <td colspan="2">
    <strong>Following commands are only available to group moderators.</strong>
  </td>
</tr>
<tr>
  <td>
    <code>delete member</code><br/>
    <code>remove member</code><br/>
    <code>kick out member</code><br/>
    <code>delete user</code><br/>
    <code>remove user</code><br/>
    <code>kick out user</code>
  </td>
  <td>
    Deactivate an account.
  </td>
</tr>
<tr>
  <td>
    <code>:star:</code><br/>
    <code>:heart:</code><br/>
    <code>:+1:</code>
  </td>
  <td>
    When used in the <strong>#the-feed</strong> channel, the bot will retweet the message.
  </td>
</tr>
</table>

<!-- 

#### Admins [¶](#commands-admins){.pilcrow} {#commands-admins}

***Coming soon!***

-->

You can join the development of **Sidekick** [in our Botmakers Slack group](https://botmakers.org/)!
/*
Title: @status_withheld
Description: Monitors the status_withheld event on Twitter. In theory.
Thumbnail: /content/bots/twitterbots/images/status_withheld.png
Link: https://twitter.com/status_withheld
Author: Stefan Bohacek
Date: November 8, 2016
Tags: twitter,twitterbot,bot,status_withheld,monitor,status,api,event,inactive,open source,opensource,node,nodejs,node.js,javascript,template,fourtonfish
Nav: hidden
Robots: index,follow
*/

[@status_withheld](https://twitter.com/status_withheld) is an [open source](http://cheapbotsdonequick.com/source/status_withheld) Twitter bot created by [Stefan Bohacek](https://twitter.com/fourtonfish) that monitors the `status_withheld` event on Twitter.

From the [Twitter API documentation](https://dev.twitter.com/streaming/overview/messages-types#withheld-content-notices-status-withheld-user-withheld):

> `status_withheld`
>
> These events contain an `id` field indicating the status ID, a `user_id` indicating the user, and a collection of `withheld_in_countries` uppercase two-letter country codes.

This bot is not active due to the `status_withheld` event [not being updated to support tweets with longer IDs](https://twittercommunity.com/t/status-withheld/76757).

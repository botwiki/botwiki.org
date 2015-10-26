#!/usr/bin/env python
# encoding: utf-8
"""
Unit tests for botsheeter.py
"""
from __future__ import print_function, unicode_literals
from hypothesis import given
from hypothesis.strategies import text
try:
    import unittest2 as unittest
except ImportError:
    import unittest

import botsheeter


class TestIt(unittest.TestCase):

    def test_validate_creator_twitter_url_full(self):
        input = "https://twitter.com/botwikidotorg"
        output = botsheeter.validate_creator_twitter_url(input)
        self.assertEqual(output, "https://twitter.com/botwikidotorg")

    def test_validate_creator_twitter_url_no_https(self):
        input = "twitter.com/botwikidotorg"
        output = botsheeter.validate_creator_twitter_url(input)
        self.assertEqual(output, "https://twitter.com/botwikidotorg")

    def test_validate_creator_twitter_url_username(self):
        input = "botwikidotorg"
        output = botsheeter.validate_creator_twitter_url(input)
        self.assertEqual(output, "https://twitter.com/botwikidotorg")

    def test_validate_creator_twitter_url_at_username(self):
        input = "@botwikidotorg"
        output = botsheeter.validate_creator_twitter_url(input)
        self.assertEqual(output, "https://twitter.com/botwikidotorg")

    def test_validate_creator_twitter_url_username_with_spaces(self):
        input = "botwiki dot org"
        output = botsheeter.validate_creator_twitter_url(input)
        self.assertEqual(output, "https://twitter.com/botwikidotorg")

    def test_validate_location_url_full(self):
        input = "https://twitter.com/botwikidotorg"
        output = botsheeter.validate_location(input)
        self.assertEqual(output, "https://twitter.com/botwikidotorg")

    def test_validate_location_no_https(self):
        input = "twitter.com/botwikidotorg"
        output = botsheeter.validate_location(input)
        self.assertEqual(output, "https://twitter.com/botwikidotorg")

    def test_validate_location_at_username(self):
        input = "@botwikidotorg"
        output = botsheeter.validate_location(input)
        self.assertEqual(output, "https://twitter.com/botwikidotorg")

    def test_validate_location_text(self):
        """ Can't be sure this is a Twitter username """
        input = "Snapchat"
        output = botsheeter.validate_location(input)
        self.assertEqual(output, "Snapchat")

    def test_validate_location_username_with_spaces(self):
        """ Can't be sure this is a Twitter username """
        input = "botwiki dot org"
        output = botsheeter.validate_location(input)
        self.assertEqual(output, "botwiki dot org")

    def test_bot_tags(self):
        bot = {}
        bot['tags'] = "Political, media, corbyn, twitter,headlines"
        bot['location'] = "https://twitter.com/botwikidotorg"
        tags = botsheeter.bot_tags(bot)
        self.assertEqual(
            tags, "twitter,twitterbot,inactive,political,media,corbyn,"
                  "headlines")

    def test_bot_tags_open_source(self):
        bot = {}
        bot['tags'] = "Political, media, corbyn, twitter,headlines"
        bot['location'] = "https://twitter.com/botwikidotorg"
        bot['is_open_source'] = True
        tags = botsheeter.bot_tags(bot)
        self.assertEqual(
            tags, "twitter,twitterbot,inactive,political,media,corbyn,"
                  "headlines,open source,opensource")

    def test_bot_tags_open_source_language(self):
        bot = {}
        bot['tags'] = "Political, media, corbyn, twitter,headlines"
        bot['location'] = "https://twitter.com/botwikidotorg"
        bot['is_open_source'] = True
        bot['open_source_language'] = "python"
        tags = botsheeter.bot_tags(bot)
        self.assertEqual(
            tags, "twitter,twitterbot,inactive,political,media,corbyn,"
                  "headlines,open source,opensource,python")

    def test_bot_tags_nodejs(self):
        bot = {}
        bot['tags'] = "media, node, twitter,headlines"
        bot['location'] = "https://twitter.com/botwikidotorg"
        bot['is_open_source'] = True
        bot['open_source_language'] = "node"
        tags = botsheeter.bot_tags(bot)
        self.assertEqual(
            tags, "twitter,twitterbot,inactive,media,node,headlines,"
                  "open source,opensource,nodejs,node.js")

    def test_bot_tags_authors_twitter_name(self):
        bot = {}
        bot['tags'] = "Political, media, corbyn, twitter,headlines"
        bot['location'] = "https://twitter.com/botwikidotorg"
        bot['creator_twitter_url'] = "https://twitter.com/fourtonfish"
        tags = botsheeter.bot_tags(bot)
        self.assertEqual(
            tags, "twitter,twitterbot,inactive,political,media,corbyn,"
                  "headlines,fourtonfish")

    def test_bot_png_filename(self):
        # Arrange
        bot = {}
        bot['type'] = "twitterbots"
        bot['location'] = "https://twitter.com/botwikidotorg"

        # Act
        filename = botsheeter.bot_png_filename(bot)

        # Assert
        self.assertEqual(
            filename, "/content/bots/twitterbots/images/botwikidotorg.png")

    def test_col_to_num_a_lc_zero_index(self):
        letter = "a"
        zero_index = True
        number = botsheeter.col_to_num(letter, zero_index)
        self.assertEqual(number, 0)

    def test_col_to_num_a_uc_zero_index(self):
        letter = "A"
        zero_index = True
        number = botsheeter.col_to_num(letter, zero_index)
        self.assertEqual(number, 0)

    def test_col_to_num_a_uc_zero_index(self):
        letter = "C"
        zero_index = True
        number = botsheeter.col_to_num(letter, zero_index)
        self.assertEqual(number, 2)

    def test_col_to_num_a_lc_nonzero_index(self):
        letter = "a"
        zero_index = False
        number = botsheeter.col_to_num(letter, zero_index)
        self.assertEqual(number, 1)

    def test_col_to_num_a_uc_nonzero_index(self):
        letter = "c"
        zero_index = False
        number = botsheeter.col_to_num(letter, zero_index)
        self.assertEqual(number, 3)

    def test_bot_tags_interactive(self):
        bot = {}
        bot['tags'] = "twitter"
        bot['location'] = "https://twitter.com/botwikidotorg"
        bot['interactive'] = "Interactive"
        tags = botsheeter.bot_tags(bot)
        self.assertEqual(
            tags, "twitter,twitterbot,inactive,interactive")

    def test_bot_tags_not_interactive(self):
        bot = {}
        bot['tags'] = "twitter"
        bot['location'] = "https://twitter.com/botwikidotorg"
#         bot['interactive'] = "Yes"
        tags = botsheeter.bot_tags(bot)
        self.assertEqual(
            tags, "twitter,twitterbot,inactive")


class TestWithHypothesis(unittest.TestCase):

    @given(text())
    def test_validate_creator_twitter_url(self, x):
        output = botsheeter.validate_creator_twitter_url(x)
        self.assertIsNotNone(output)
        self.assertIsInstance(output, unicode)

    @given(text())
    def test_validate_location(self, x):
        output = botsheeter.validate_location(x)
        self.assertIsNotNone(output)
        self.assertIsInstance(output, unicode)


if __name__ == '__main__':
    unittest.main()

# End of file

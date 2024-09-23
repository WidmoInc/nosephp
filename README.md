# NosePHP is a themeable, module based Head CMS for use with headless backends.
NosePHP works from a single webpage and uses jQuery and AJAX to load
all content dynamically. This can be from local files, an RSS feed
or from supported APIs.

# Powerful jQuery based, front end driven user experience
jQuery powered website with modules for pulling content from APIs
It is a fork of an older Project of mine called BlockPress.

# PHP is used to load the landing page from a selected url/permlink
All of the content is loaded real time by the jQuery so the PHP part
is mostly redundant. A NosePHP can function without the PHP, but PHP
is needed for the permlinks to generate an accurate content preview when
sharing links on social media platforms and apps like discord.

# Current Status: Pre-Alpha
Before we release the alpha version we still need to:
* Generate working PHP based previews for all content modules.
* Add a module to support the WordPress API
* Add a module to support the MediaWiki API

# NoseJS
NosePHP is forked from NoseJS (which is a front end only version that lacks
the content preview feature, but is none-the-less useful for creating
sites in places like github pages that lack back end support).

* https://github.com/WidmoInc/nosejs

# IFramed MantisBT Plugin

[![app-type](https://img.shields.io/badge/category-mantisbt%20plugins-blue.svg)](https://github.com/spmeesseman)
[![app-lang](https://img.shields.io/badge/language-php-blue.svg)](https://github.com/spmeesseman)
[![app-publisher](https://img.shields.io/badge/%20%20%F0%9F%93%A6%F0%9F%9A%80-app--publisher-e10000.svg)](https://github.com/spmeesseman/app-publisher)

[![authors](https://img.shields.io/badge/authors-scott%20meesseman-6F02B5.svg?logo=visual%20studio%20code)](https://github.com/spmeesseman)
[![GitHub issues open](https://img.shields.io/github/issues-raw/spmeesseman/IFramed.svg?maxAge=2592000&logo=github)](https://github.com/spmeesseman/IFramed/issues)
[![GitHub issues closed](https://img.shields.io/github/issues-closed-raw/spmeesseman/IFramed.svg?maxAge=2592000&logo=github)](https://github.com/spmeesseman/IFramed/issues)
[![MantisBT version current](https://app1.spmeesseman.com/projects/plugins/ApiExtend/api/versionbadge/IFramed/current)](https://app1.spmeesseman.com/projects)
[![MantisBT version next](https://app1.spmeesseman.com/projects/plugins/ApiExtend/api/versionbadge/IFramed/next)](https://app1.spmeesseman.com/projects)

- [ProjectPages IFramed Plugin](#ProjectPages-IFramed-Plugin)
  - [Description](#Description)
  - [Installation](#Installation)
  - [Usage](#Usage)
  - [Future Maybes](#Future-Maybes)

## Description

This plugin allows for setting up navigation bar links based that can be opened within the MantisBT UI via Iframe, instead of "leaving" the Mantis page.  Plays nice with the ProjectPages plugin.  Also included is a patch to allow for the Wiki to be opened within the Mantis UI as well.

## Installation

Extract the release archive to the MantisBT installations plugins folder:

    cd /var/www/mantisbt/plugins
    wget -O IFramed.zip https://github.com/spmeesseman/Releases/releases/download/v1.0.0/IFramed.zip
    unzip IFramed.zip
    rm -f IFramed.zip

Ensure to use the latest released version number in the download url: [![MantisBT version current](https://app1.spmeesseman.com/projects/plugins/ApiExtend/api/versionbadge/IFramed/current)](https://app1.spmeesseman.com/projects) (version badge available via the [ApiExtend Plugin](https://github.com/spmeesseman/ApiExtend))

Install the plugin using the default installation procedure for a MantisBT plugin in `Manage -> Plugins`.

A patched file is included that will allow the Wiki page to be opened within the MantisBT UI, as opposed to 'leaving' the page.

    patch/wiki.php

This file was taken from MantisBT v2.21.1. Replace the default file at your own risk and ensure you make a backup of the original before overwriting.

## Usage

See patch/wiki.php for a patched file that will open Wiki links within the IFrame plugin, simply replace the default wiki.php in your mantisbt installation directory.  The patched file adjusts the wiki urls as follows:

    if( $f_type == 'project' ) {
        if( $f_id !== 0 ) {
            project_ensure_exists( $f_id );
        }
        $t_url = wiki_link_project( $f_id );
        $t_url = 'plugin.php?page=IFramed/main&title=Wiki&url='.wiki_link_project( $f_id );
    } else {
        bug_ensure_exists( $f_id );
        $t_url = 'plugin.php?page=IFramed/main&title=Wiki&url='.wiki_link_bug( $f_id );
    }

Example config_inc.php entry using ProjectPages plugin:

    $g_plugin_ProjectPages_main_menu_options_front = array(
        array(
            'title'        => 'Home',
            'access_level' => VIEWER,
            'url'          => 'plugin.php?page=IFramed/main&title=Home&url=https://my.domain.com/websvn/filedetails.php%3Frepname=pja%26path=%2Fproject_name%2Ftrunk%2FREADME.md%26usemime=1',
            'icon'         => 'fa-home',
            'project_id'   => array ( 2, 5, 8 )
        )
    );

    $g_plugin_ProjectPages_main_menu_options_back = array(
        array(
            'title'        => 'Read Me',
            'access_level' => VIEWER,
            'url'          => 'plugin.php?page=IFramed/main&title=Home&url=https://my.domain.com/websvn/filedetails.php%3Frepname=pja%26path=%2Fproject_name%2Ftrunk%2FREADME.md%26usemime=1',
            'icon'         => 'fa-book',
            'project_id'   => array ( -1 )
        ),
        array(
            'title'        => 'WebSVN',
            'access_level' => DEVELOPER,
            'url'          => 'plugin.php?page=IFramed/main&title=WebSVN&url=https://my.domain.com/websvn/listing.php%3Frepname=pja%26path=%2Fproject_name%2Ftrunk%2F',
            'icon'         => 'fa-code-fork',
            'project_id'   => array( -1 )
        )
    );

Note that the keyword `project_name` in the URL text is replaced with the currently loaded MantisBT project's name.

Note that the README page configuration above relies on Scott Meesseman's WebSVN build with markdown support.

The project_id is set to the project_id that the link is to be displayed for, where:

- `0` is the `All Projects` project
- `-1` is all projects except for the `All Projects` project
- `-2` is all projects

See the [ProjectPages Documentation](https://github.com/spmeesseman/ProjectPages/blob/master/README.md) for more details.

Git Gists are supported, any url containing `gist-it.appspot.com` will be converted to a Git Gist.

## Future Maybes

- User level link access

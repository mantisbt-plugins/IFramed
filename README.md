# ProjectPages IFramed Plugin

[![app-type](https://img.shields.io/badge/category-mantisbt%20plugins-blue.svg)](https://github.com/spmeesseman)
[![app-lang](https://img.shields.io/badge/language-php-blue.svg)](https://github.com/spmeesseman)
[![app-publisher](https://img.shields.io/badge/%20%20%F0%9F%93%A6%F0%9F%9A%80-app--publisher-e10000.svg)](https://github.com/spmeesseman/app-publisher)

[![authors](https://img.shields.io/badge/authors-scott%20meesseman-6F02B5.svg?logo=visual%20studio%20code)](https://github.com/spmeesseman)
[![GitHub issues open](https://img.shields.io/github/issues-raw/spmeesseman/IFramed.svg?maxAge=2592000&logo=github)](https://github.com/spmeesseman/mantisbt-plugins/issues)
[![GitHub issues closed](https://img.shields.io/github/issues-closed-raw/spmeesseman/IFramed.svg?maxAge=2592000&logo=github)](https://github.com/spmeesseman/mantisbt-plugins/issues)

- [ProjectPages IFramed Plugin](#ProjectPages-IFramed-Plugin)
  - [Description](#Description)
  - [Installation](#Installation)
  - [Usage](#Usage)
  - [Future Maybes](#Future-Maybes)

## Description

This plugin allows for setting up navigation bar links based that can be opened within the MantisBT UI via Iframe, instead of "leaving" the Mantis page.  Plays nice with the ProjectPages plugin.  Also included is a patch to allow for the Wiki to be opened within the Mantis UI as well.

## Installation

Install the plugin using the default installation procedure for a MantisBT plugin.

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
            'project_id'   => -1
        )
    );

    $g_plugin_ProjectPages_main_menu_options_back = array(
        array(
            'title'        => 'Read Me',
            'access_level' => VIEWER,
            'url'          => 'plugin.php?page=IFramed/main&title=Home&url=https://my.domain.com/websvn/filedetails.php%3Frepname=pja%26path=%2Fproject_name%2Ftrunk%2FREADME.md%26usemime=1',
            'icon'         => 'fa-book',
            'project_id'   => -1
        ),
        array(
            'title'        => 'Developer Doc',
            'access_level' => DEVELOPER,
            'url'          => 'plugin.php?page=IFramed/main&title=Developer%20Doc&url=https://my.domain.com/doc/developernotes.md',
            'icon'         => 'fa-book',
            'project_id'   => 0
        ),
        array(
            'title'        => 'History File',
            'access_level' => REPORTER,
            'url'          => 'plugin.php?page=IFramed/main&title=History.txt&url=https://my.domain.com/websvn/filedetails.php%3Frepname=pja%26path=%2Fproject_name%2Ftrunk%2Fdoc%2Fhistory.txt%26usemime=1',
            'icon'         => 'fa-history',
            'project_id'   => 0
        ),
        array(
            'title'        => 'WebSVN',
            'access_level' => DEVELOPER,
            'url'          => 'plugin.php?page=IFramed/main&title=WebSVN&url=https://my.domain.com/websvn/listing.php%3Frepname=pja%26path=%2Fproject_name%2Ftrunk%2F',
            'icon'         => 'fa-code-fork',
            'project_id'   => 0
        )
    );

## Future Maybes

- User level link access

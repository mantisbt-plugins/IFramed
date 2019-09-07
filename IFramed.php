<?php

# Copyright (c) 2019 Scott Meesseman
# Licensed under GPL3 

class IFramedPlugin extends MantisPlugin
{
  public function register()
  {
    $this->name = plugin_lang_get("title");
    $this->description = plugin_lang_get("description");

    $this->version = "1.1.6";
    $this->requires = array(
      "MantisCore" => "2.0.0",
    );

    $this->author = "Scott Meesseman";
    $this->contact = "spmeesseman@gmail.com";
    $this->url = "https://github.com/mantisbt-plugins/IFramed";
  }

  public function hooks()
  {
    return array(
      "EVENT_MENU_MAIN" => "menu"
    );
  }

  public function menu()
  {
    return array();
  }

  public function config()
  {
    return array();
  }
}

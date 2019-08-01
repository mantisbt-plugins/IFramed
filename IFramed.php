<?php

# Copyright (c) 2015 Maxim Kuzmin
# Licensed under the Apache License

class IFramedPlugin extends MantisPlugin
{
  public function register()
  {
    $this->name = plugin_lang_get("title");
    $this->description = plugin_lang_get("description");

    $this->version = "1.1.3";
    $this->requires = array(
      "MantisCore" => "2.0.0",
    );

    $this->author = "Scott Meesseman";
    $this->contact = "spmeesseman@gmail.com";
    $this->url = "https://github.com/spmeesseman/mantis-plugins";
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

<?php
/**
* Redirect to a random bot page.
*
* @author Stefan Bohacek
* @link https://fourtonfish.com
* @license http://opensource.org/licenses/MIT
*/
class Pico_Random_Bot{
  private $show_random_bot;

  public function __construct(){
      $this->show_random_bot = false;
  }

  public function request_url(&$url){
      if ($url == 'random-bot' || $url == 'random-bot/' ){
        $this->show_random_bot = true;
      }
  }

  public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page){
    if($this->show_random_bot){

      function is_bot_page($page){
        if (is_array($page["tags"])){
          $page_tags = $page["tags"];
        }
        else{
          $page_tags = explode(",", $page["tags"]);
        }
        return(in_array("bot", $page["tags"]));
      }

      $bot_pages = array_filter($pages, "is_bot_page");

      echo "<pre><code>";
      var_dump($bot_pages);
      echo "</code></pre>";
      die();

      // header('Location: ' . $bot_pages[array_keys($bot_pages)[rand(0, count($bot_pages))]]["url"]);
    }
  }
}

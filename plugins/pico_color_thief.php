<?php
/**
* Redirect to a random bot page.
*
* @author Stefan Bohacek
* @link https://fourtonfish.com
* @license http://opensource.org/licenses/MIT
*/

use ColorThief\ColorThief;


class Pico_Color_Thief{
  private $get_color_thief;

  public function before_render(&$twig_vars, &$twig) {
    try {
      if ($twig_vars['meta']['thumbnail']){
        $dominant_color = ColorThief::getColor($_SERVER["DOCUMENT_ROOT"] . $twig_vars['meta']['thumbnail']);
        $twig_vars['meta']['dominant_color'] = "rgb($dominant_color[0],$dominant_color[1],$dominant_color[2])";            
      }
    } catch (Exception $e) {
      $twig_vars['meta']['dominant_color'] = "#fff";      
    }
  }

}

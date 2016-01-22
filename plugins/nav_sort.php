<?php

/**
 * A plugin that gives you control over the order of navigation links
 *
 * @author  BJ Miller <[bjmiller121@gmail.com]>
 * @link https://github.com/bjmiller121
 * @license http://opensource.org/licenses/MIT
 */

class Nav_Sort {

  public function before_read_file_meta(&$headers) {
    $headers['weight'] = 'Weight';
  }

  public function get_page_data(&$data, $page_meta) {
    // Get all pages that have a weight
    if ($page_meta['weight']) {
      $this->navigation[$page_meta['weight']] = array(
        'title' => $data['title'],
        'url' => $data['url'],
      );
    }
  }

  public function before_render(&$twig_vars, &$twig) {
    $twig_vars['nav_sort']['sorted_nav'] = $this->nav_sort_build_nav($this->navigation, $twig_vars['meta']['weight']);
  }

  private function nav_sort_build_nav($navigation = array(), $active = '') {
    $items = '';
    $item_format = "<li%s><a href=\"%s\" title=\"%s\">%s</a></li>\n";

    // Sort items by weight
    ksort($navigation);
    
    // Create each menu item
    if (!empty($navigation)) {
      foreach ($navigation as $weight => $page) {
        $active_class = strpos($_SERVER['REQUEST_URI'], strtolower($page['title'])) > -1 ? ' class="active"' : '';

        $items .= sprintf(
          $item_format,
          $active_class,
          $page['url'],
          $page['title'],
          $page['title']
        );
      }
    }

    return $items;
  }

}
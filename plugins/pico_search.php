<?php

/**
* Plugin providing basic search functionality
*
* @author mwgg
* @link https://github.com/mwgg/Pico-Search
* @license http://opensource.org/licenses/MIT
*/
class Pico_Search
{
    private $pages = array();

    public function before_read_file_meta(&$headers)
    {
        $headers['purpose'] = 'Purpose';
    }

    public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page)
    {
        $this->pages = $pages;
    }

    public function before_render(&$twig_vars, &$twig)
    {
        if (isset($_GET["q"])){
            $q = strtoupper(trim($_GET["q"]));
            while (strstr($q, "  ")) $q = str_replace("  ", " ", $q);

            if (strpos($q, " AND ")){
              $qs = explode(" AND ", $q);
              $search_type = "AND";
            }
            else{            
              $search_type = "OR";
              $qs = explode(" ", $q);
            }

            foreach($this->pages as $k => $page)
            {
              $this->pages[$k]["score"] = 0;
              $title = strtoupper($page["title"]);
              $content = strtoupper($page["content"]);
              $tags = strtoupper($page["tags"]);

              if (strstr($title, $q)) $this->pages[$k]["score"]+= 10;
              if (strstr($content, $q)) $this->pages[$k]["score"]+= 10;
              if (strstr($tags, $q)) $this->pages[$k]["score"]+= 10;

              switch ($search_type) {
                case 'AND':
                  if (count(array_intersect($qs, explode(" ", $title))) == count($qs)){
                    $this->pages[$k]["score"]+= 3;
                  }

                  if (count(array_intersect($qs, explode(" ", $content))) == count($qs)){
                    $this->pages[$k]["score"]+= 3;
                  }

                  if (count(array_intersect($qs, explode(",", $tags))) == count($qs)){
                    $this->pages[$k]["score"]+= 3;
                  }
                break;
                case 'OR':

                  foreach ($qs as $q) {
                    $words = preg_split("/ |_/", $title);
                    
                    foreach ($words as $word) {
                      if (levenshtein($q, $word) < 6 ){
                        $this->pages[$k]["score"]+= 10;
                      }
                    }
                  }

                  foreach ($qs as $q) {
                    $words = preg_split("/ |_/", $content);
                    
                    foreach ($words as $word) {
                      if (levenshtein($q, $word) < 3 ){
                        $this->pages[$k]["score"]+= 8;
                      }
                    }
                  }

                  foreach ($qs as $q) {
                    $words = preg_split("/ |_/", $content);
                    
                    foreach ($words as $word) {
                      if (levenshtein($q, $word) < 6 ){
                        $this->pages[$k]["score"]+= 3;
                      }
                    }
                  }

                  foreach ($qs as $q) {
                    $words = preg_split("/ |_/", $tags);
                    
                    foreach ($words as $word) {
                      if (levenshtein($q, $word) < 6 ){
                        $this->pages[$k]["score"]+= 1;
                      }
                    }
                  }

                break;
              }

            }

            $counts = array();
            foreach($this->pages as $page) $counts[] = $page["score"];
            array_multisort($counts, $this->pages);
            
            foreach(array_reverse($this->pages) as $page)
            {
                if ($page["score"] > 0) $twig_vars['search_results'][] = $page;
            }

            if (isset($twig_vars['search_results'])){
                $twig_vars['search_num_results'] = count($twig_vars['search_results']);
            }
            else{
                $twig_vars['search_num_results'] = 'no';                
            }
            $twig_vars['search_term'] = trim($_GET["q"]);            
        }

    }
}
?>
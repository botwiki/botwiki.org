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

    private function search_loop($search_target, $search_query, $assign_score, &$results){
      $words = explode(" ", preg_replace('/[^a-zA-Z0-9]+/', ' ', $search_target));

      foreach ($search_query as $q) {                    
        foreach ($words as $word) {
          if (levenshtein($q, $word)/strlen($word) < $assign_score/strlen($word) ) {
            $results += $assign_score - levenshtein($q, $word);
          }
        }
      }
    }

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


            if (strpos($q, "TAGS:") !== false){
              // $search_type = "TAGS";
              $search_tags = explode(" ", trim(str_replace("TAGS:", "", $q)));
              header('Location: '  . '/tag/' . strtolower(implode('+', $search_tags)));
            }
            elseif ($q[0] === "#"){
              $q = substr($q, 1);
              // $search_type = "TAGS";
              $qs = explode("#", $q);
              $search_tags = array_map('trim', explode('#', $q));
              header('Location: '  . '/tag/' . strtolower(implode('+', $search_tags)));
            }
            elseif (strpos($q, " AND ") !== false){
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
              $content_stripped = strip_tags($page["content"]);

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

                  // TODO: Rewrite the loops below (DRY).

                  // $this->search_loop($title, $qs, 10, $this->pages[$k]["score"]);
                  // $this->search_loop($content, $qs, 5, $this->pages[$k]["score"]);
                  // $this->search_loop($tags, $qs, 5, $this->pages[$k]["score"]);

                  $words = explode(" ", preg_replace('/[^a-zA-Z0-9]+/', ' ', $title));

                  foreach ($qs as $q) {                    
                    foreach ($words as $word) {
                      if (levenshtein($q, $word)/strlen($word) < 10/strlen($word) ) {
                        $this->pages[$k]["score"]+= 5 - levenshtein($q, $word);
                      }
                    }
                  }


                  $words = explode(" ", preg_replace('/[^a-zA-Z0-9]+/', ' ', $content));

                  foreach ($qs as $q) {                    
                    foreach ($words as $word) {
                      if (levenshtein($q, $word)/strlen($word) < 3/strlen($word) ) {
                        $this->pages[$k]["score"]+= 3 - levenshtein($q, $word);
                        // TODO: Search snippet.
                        //
                        // if (strpos($content_stripped, $q) > -1 ){
                        //   $this->pages[$k]["search_snippet"] = substr($content_stripped, strpos($content_stripped, $q), 100);
                        // }
                        //
                        // Once the search snippet is set up to work, update
                        // search_results.html as below:
                        //
                        // {% if page.search_snippet|length > 0 %}
                        //   <p class="excerpt"><em>{{ page.search_snippet }} ...</em></p>
                        // {% else %}
                        //   <p class="excerpt">{{ page.description }}</p>
                        // {% endif %}
                      }
                    }
                  }

                  $words = explode(" ", preg_replace('/[^a-zA-Z0-9]+/', ' ', $tags));

                  foreach ($qs as $q) {
                    foreach ($words as $word) {
                      if (levenshtein($q, $word)/strlen($word) < 3/strlen($word) ) {
                        $this->pages[$k]["score"]+= 3 - levenshtein($q, $word);
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
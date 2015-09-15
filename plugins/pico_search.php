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
            $qs = explode(" ", $q);

            foreach($this->pages as $k => $page)
            {
                $this->pages[$k]["score"] = 0;
                $title = strtoupper($page["title"]);
                $content = strtoupper($page["content"]);
                $tags = strtoupper($page["tags"]);

                if (strstr($title, $q)) $this->pages[$k]["score"]+= 10;
                if (strstr($content, $q)) $this->pages[$k]["score"]+= 10;
                if (strstr($tags, $q)) $this->pages[$k]["score"]+= 10;

                foreach($qs as $query)
                {
                    if (strstr($title, $query)) $this->pages[$k]["score"]+= 3;
                    if (strstr($content, $query)) $this->pages[$k]["score"]+= 3;
                    if (strstr($tags, $query)) $this->pages[$k]["score"]+= 3;
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
<?php

/**
 * Picotags
 *
 * Adds page tagging functionality to Pico.
 *
 * @author Dan Reeves
 * @link https://github.com/DanReeves/picotags/
 * @license http://danreeves.mit-license.org/
 */
class Picotags {

    public $is_tag;
    public $current_tag;
    public $current_tags;
    private $pagestags;

    /*
        Declaring two functions for sorting tags with special chars
        Thanks to Olivier Laviale (https://github.com/olvlvl)
        http://www.weirdog.com/blog/php/trier-les-cles-accentuees-dun-tableau-associatif.html
    */
    private function wd_remove_accents($str, $charset='utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;
    }
    private function wd_unaccent_compare_ci($a, $b)
    {
        return strcmp(strtolower($this->wd_remove_accents($a)), strtolower($this->wd_remove_accents($b)));
    }

    public function tags_sorting(&$array)
    {
        $array = array_flip($array);
        uksort($array, 'Picotags::wd_unaccent_compare_ci');
        $array = array_flip($array);
    }

    public function config_loaded(&$settings) {

        if (isset($settings['ptags_nbcol']))
        {
            $this->ptags_nbcol = $settings['ptags_nbcol'];
        }
        if (isset($settings['ptags_sort']))
        {
            $this->ptags_sort = $settings['ptags_sort'];
        }
        if (isset($settings['ptags_delunique']))
        {
            $this->ptags_delunique = $settings['ptags_delunique'];
        }
        if (isset($settings['ptags_template']))
        {
            $this->ptags_template = $settings['ptags_template'];
        }
        if (isset($settings['ptags_exclude']))
        {
            $this->ptags_exclude = $settings['ptags_exclude'];
            // Creating an inverted array (value = key ie. blabla = title)
            // for later comparison with parsed pages meta array
            foreach ($this->ptags_exclude as $metakey => $metavalue)
            {
                // Keeping an array with meta keys to check in pages
                $this->exclude_keys[] = $metakey;
                $metavalue = explode('|', $metavalue);
                foreach ($metavalue as $key => $value)
                {
                    $this->metaexclude[$value] = $metakey;
                }
            }
        }
    }

    public function request_url(&$url)
    {
        // Set is_tag to true if the first four characters of the URL are 'tag/'
        $this->is_tag = (substr($url, 0, 4) === 'tag/');
        // If the URL does start with 'tag/', grab the rest of the URL
//        if ($this->is_tag) $this->current_tag = urldecode(substr($url, 4));
          if ($this->is_tag) $this->current_tags = explode('+', substr($url, 4));
    }

    public function before_read_file_meta(&$headers)
    {
        // Define tags variable
        $headers['tags'] = 'Tags';
        $headers['purpose'] = 'Purpose';        
    }

    public function file_meta(&$meta)
    {
        // Parses meta.tags to ensure it is an array
        if (isset($meta['tags']) && !is_array($meta['tags']) && $meta['tags'] !== '') {
            $meta['tags'] = explode(',', $meta['tags']);
            // Sort alphabetically the tags for articles/blog posts
            if (isset($this->ptags_sort) and $this->ptags_sort === true)
            {
                $this->tags_sorting($meta['tags']);
            }
        }
    }

    public function get_page_data(&$data, $page_meta)
    {
        // If tags in page_meta isn't empty
        if ($page_meta['tags'] != '') {
            // Add tags to page in pages
            $data['tags'] = explode(',', $page_meta['tags']);

            // Sort alphabetically the tags for tag pages
            // (works on my local WampServer2.5 and LAMP)
            // for localhost ?

            if (isset($this->ptags_sort) and $this->ptags_sort === true)
            {
                $this->tags_sorting($data['tags']);
            }
        }
    }

    public function exclude_from_tag_list(&$lapage)
    {
        $lapagemeta = array();
        // For every meta key (title, template...) of the ptags_exclude
        // get the value for the parsed page
        if (isset($this->exclude_keys) && !empty($this->exclude_keys)) {
            foreach ($this->exclude_keys as $key => $value) {
                $lapagemeta[$value] = $lapage[$value];
            }
            // Flipping array to compare with the excluded meta values
            $lapagemeta = array_flip(array_filter($lapagemeta));
            $this->diff = array_filter(array_intersect_assoc($lapagemeta, $this->metaexclude));
            if (empty($this->diff)) {
                // if empty, we keep the page in the posts list in tag page
                return false;
            }
            else
            {
                return true;
            }
        }
        else
            return false;
    }

    public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page)
    {
        // If the URL starts with 'tag/' do this different logic
        if ($this->is_tag === true) {
            // Init $new_pages and $tag_list arrays
            $new_pages = array();
            $tag_list = array();
            // Loop through the pages
            foreach ($pages as $page) {
                // If the page has tags and if the page has not meta in the exclude meta list
                if (isset($page['tags']) and $page['tags'] and $this->exclude_from_tag_list($page) == false) {
                    if (!is_array($page['tags'])) {
                        $page['tags'] = explode(',', $page['tags']);

                        // Sort alphabetically the tags for tag pages
                        // (works on my OVH server)

                        if (isset($this->ptags_sort) and $this->ptags_sort === true)
                        {
                            $this->tags_sorting($page['tags']);
                        }
                    }
                    // Loop through the tags
                    foreach ($page['tags'] as $tag) {
                        // And add them to the tag_list array
                        $tag_list[] = $tag;
                        // If the tag matches the current_tag
                        if (count(array_intersect($this->current_tags, $page['tags'])) == count($this->current_tags) && !in_array($page, $new_pages)){
                            // Add that page to the new_pages
                            $new_pages[] = $page;
                        }
                    }
                }
            }

            // Removing from the tags list the tags with only one reference
            // Change the value to $config['ptags_delunique'] = true; in the config.php

            if (isset($this->ptags_delunique) and $this->ptags_delunique === true)
            {
                foreach(array_count_values($tag_list) as $val => $occ)
                {
                    if($occ == 1)
                    {
                        $key = array_search($val, $tag_list);
                        unset($tag_list[$key]);
                    }
                }
            }

            // Sort alphabetically, case insensitive
            // Change the value to $config['ptags_sort'] = true; in the config.php

            if (isset($this->ptags_sort) and $this->ptags_sort === true)
            {

                $tag_list_sorted = array();
                $tag_list_sorted = $tag_list;
                $tag_list = array();
                $this->tags_sorting($tag_list_sorted);
                foreach ($tag_list_sorted as $key => $value) {
                    $tag_list[] = $value;
                }
                // Add the tag list to the class scope, taking out duplicate or empty values
                $this->tag_list = array_unique(array_filter($tag_list));
            }
            else {
                // Add the tag list to the class scope, taking out duplicate or empty values
                $this->tag_list = array_unique(array_filter($tag_list));
            }
            sort($this->tag_list);
            // Overwrite $pages with $new_pages
            $this->pagestags = $new_pages;
        } else { // Workaround
            if (isset($page['tags'])){
                $new_pages = array();
                foreach ($pages as $page) {
                    if (!is_array($page['tags'])) {
                        $page['tags'] = explode(',', $page['tags']);
                    }
                    // Loop through the tags
                    foreach ($page['tags'] as $tag) {
                        // And add them to the tag_list array
                        $tag_list[] = $tag;
                    }
                    $new_pages[] = $page;
                }
                $this->pagestags = $new_pages;
                $this->tag_list = array_unique(array_filter($tag_list));

            }
        }
    }

    public function before_render(&$twig_vars, &$twig, &$template)
    {
        if ($this->is_tag) {
            // Override 404 header
            header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
            // Set template if defined in config.php
            if (isset($this->ptags_template) && $this->ptags_template != '')
            {
                $template = $this->ptags_template;
            }
            // Set page title to #TAG
            $twig_vars['meta']['title'] = "#" .implode(", #", $this->current_tags);
            // Return current tag and list of all tags as Twig vars
        }

        function sort_by_date($a, $b){
            $t1 = strtotime(str_replace(',', '', $a['date']));
            $t2 = strtotime(str_replace(',', '', $b['date']));
            return $t2 - $t1;
        }

        usort($this->pagestags, 'sort_by_date');
        $twig_vars['pagestags'] = $this->pagestags;

        $twig_vars['current_tag'] = $this->current_tag; /* {{ current_tag }} is a string*/
        $twig_vars['current_tags'] = $this->current_tags;
        /*
            MULTICOLUMNS OUTPUT
            Change the value of $config['ptags_nbcol'] = 5; in the config.php
            In your template, for a two columns output :
            <ul>
                {% for tag in tag_list_0 %}
                    <li><a href="/tag/{{ tag }}">#{{ tag }}</a></li>
                {% endfor %}
            </ul>
            <ul>
                {% for tag in tag_list_1 %}
                    <li><a href="/tag/{{ tag }}">#{{ tag }}</a></li>
                {% endfor %}
            </ul>
        */
        if (isset($this->ptags_nbcol) && $this->ptags_nbcol != '') {
            $nbtags = sizeof($this->tag_list);
            $nbtagscol = ceil ($nbtags/$this->ptags_nbcol);
            $tag_list_cut = array();
            $tag_list_sorted_cut = array();
            for ($i=0;$i<$this->ptags_nbcol;$i++)
            {
                $this->tag_list_cut = array_slice($this->tag_list, $i*$nbtagscol, $nbtagscol);
                $twig_vars['tag_list_'.$i] = $this->tag_list_cut;
            }
            // Keeping the original tag_list twig var
            $twig_vars['tag_list'] = $this->tag_list;
        }
        // else {
        if (isset($this->tag_list)){
            $twig_vars['tag_list'] = $this->tag_list; // {{ tag_list }} in an array
        }
        // }
    }
}
?>
<?php

$bot_list = array();

function read_file_meta($content){
    $headers = array(
        'title' => 'Title',
        'description' => 'Description',
        'author' => 'Author',
        'date' => 'Date',
        'language' => 'Language',
        'translations' => 'Translations',
        'robots' => 'Robots',
        'template' => 'Template',
        'nav' => 'Nav',
        'thumbnail' => 'Thumbnail',
        'smallthumbnail' => 'Small thumbnail',
        'link' => 'Link',
        'translations' => 'Translations',
        'installed' => 'Installed',
        'show_donation_link' => 'Show donation link',
        'has_code' => 'Has code'
    );

    foreach ($headers as $field => $regex) {
        if (preg_match('/^[ \t\/*#@]*' . preg_quote($regex, '/') . ':(.*)$/mi', $content, $match) && $match[1]) {
            $headers[$field] = trim(preg_replace("/\s*(?:\*\/|\?>).*/", '', $match[1]));
        } else {
            $headers[$field] = '';
        }
    }

    if (isset($headers['date'])) {
        $headers['date_formatted'] = utf8_encode(strftime('%B %e, %Y', strtotime($headers['date'])));
    }

    return $headers;
}


function endsWith($haystack, $needle){
  $length = strlen($needle);
  return (substr($haystack, -$length) === $needle);
}

function getBots($dir){
  if (endsWith($dir, '/images')){
    return false;
  }
  global $bot_list;
  $ffs = scandir($dir);
  foreach($ffs as $ff){
    if($ff != '.' && $ff != '..'){
      if (!endsWith($ff, 'index.md') && endsWith($ff, '.md')){
        $bot_url =  $dir . '/' . $ff ;

        $page_content = file_get_contents($bot_url);
        $page_meta = read_file_meta($page_content);

        $page_meta['page_url'] = substr($bot_url, 13, strlen($bot_url) - 16);
        // var_dump($page_meta);
        if ($page_meta['language'] == ''){
          // Only list original English pages.
          array_push($bot_list, '"' . $page_meta['page_url'] . '"');          
        }
      }
      if (is_dir($dir.'/'.$ff)){
        getBots($dir.'/'.$ff);
      }
    }
  }
}

if (isset($_GET['filter'])){
  getBots('../../content/bots/' . $_GET['filter']);
}
else{
  getBots('../../content/bots');
}

header('Content-type: application/json');
echo '[' . implode(',', $bot_list) . ']';

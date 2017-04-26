<?php

/**
 * Botwiki Corpora API
 *
 * @author Stefan Bohacek
 */
class Corpora_API {

	private $is_corpora_api;

	private function getDirContents($dir, &$results = array()){
    $files = scandir($dir);

    foreach($files as $key => $value){
      $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
      if(!is_dir($path)) {
        $results[] = $path;
      } else if($value != "." && $value != "..") {
        $this->getDirContents($path, $results);
      }
    }
    return $results;
	}

	public function __construct(){
		$this->is_corpora_api = false;
	}

	public function request_url(&$url)
	{
		if(rtrim($url, '/') == 'corpora-api') $this->is_corpora_api = true;
	}
	
	public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page){
		if($this->is_corpora_api){
			$data = '{"corpora-api": "coming soon"}';

			$all_files = $this->getDirContents(rtrim(ROOT_DIR, '/') . '/api/corpora/data');


      if (isset($_GET["random"])){
				// $data = json_encode(file_get_contents($all_files[array_rand($all_files)]));
				$random_corpus = $all_files[array_rand($all_files)];
				$data = array(
					'title' => $random_corpus,
					// 'data' => $all_files
					'data' => json_decode(file_get_contents($random_corpus))
					);
			
      }

			header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
			header('Content-Type: application/json');
			die(json_encode($data));
		}
	}
}

?>

<?php

/**
 * Botwiki Corpora API
 *
 * @author Stefan Bohacek
 */
class Pico_Corpora {

	private $is_corpora_api;

	public function __construct(){
		$this->is_corpora_api = false;
	}

	public function request_url(&$url)
	{
		if($url == 'api/corpora') $this->is_corpora_api = true;
	}
	
	public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page){
		if($this->is_corpora_api){
			header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
			header('Content-Type: application/json');
			die("{'corpora-api': 'coming soon'}");
		}
	}

}

?>

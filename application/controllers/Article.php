<?php 

/**
* Class Article handles all article-format page
*/
class Article extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function loadTopArticle($param) {
		$data = array(
			'test' => $param,
			);
		$this->load->view('pages/article', $data);
	}

	public function loadLevelArticle($parent_article, $lvl, $article) {
		$data = array(
			'parent_article' => $parent_article,
			'level' => $lvl,
			'article' => $article
			);

		$this->load->view('pages/article', $data);
	}
}
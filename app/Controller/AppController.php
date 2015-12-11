<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	/**********************************
	* vars
	**********************************/
	//REF global variable http://stackoverflow.com/questions/12638962/global-variable-in-controller-cakephp-2
	public $dpath_Log;
	
	public $dpath_Utils;

	public $dpath_Docs;

	/**********************************
	* funcs
	**********************************/
	public function beforeFilter() {
	
		$this->_Setup_Paths();
	
		// 		require_once $this->path_Utils.DS.$this->fname_Utils;
		// 		require $this->path_Utils.DS.$this->fname_Utils;
	
		require_once $this->dpath_Utils.DS."cons.php";
	
		require_once $this->dpath_Utils.DS."utils.php";
	
		require_once $this->dpath_Utils.DS."mp3file.class.php";
	
		// 		require_once $this->path_Utils.DS."db_util.php";
	
// 		$this->Auth->allow('index', 'view');
	
	}
	
	
	private function
	_Setup_Paths() {
		/****************************************
		 * Build: Paths
		****************************************/
		$this->dpath_Log = join(DS, array(ROOT, "lib", "log"));
		// 		$this->path_Log = join(DS, array(ROOT, APP_DIR, "Lib", "log"));
	
		$this->fpath_Log = join(DS, array(ROOT, "lib", "log", "log.txt"));
	
		$this->dpath_Utils = join(DS, array(ROOT, APP_DIR, "Lib", "utils"));
	
		$this->dpath_Docs = join(DS, array(ROOT, APP_DIR, "Lib", "docs"));
	
		$this->path_BackupUrl_Text =
		"http://localhost/PHP_server/CR6_cake/texts/add";
		// 						"http://localhost/PHP_server/CR6_cake/texts/index";
	
		/****************************************
		 * Create dir: log
		****************************************/
		//REF recursive http://stackoverflow.com/questions/2795177/how-to-convert-boolean-to-string
		// 		$res = mkdir($path_Log.DS."loglog", $mode=0777, $recursive=false);
	
		$res = false;
	
		if (!file_exists($this->dpath_Log)) {
	
			$res = @mkdir($this->dpath_Log, $mode=0777, $recursive=true);
	
		}
	
		/****************************************
		 * Create dir: utils
		****************************************/
		$res2 = false;
	
		if (!file_exists($this->dpath_Utils)) {
	
			$res = @mkdir($this->dpath_Utils, $mode=0777, $recursive=true);
	
		}
	
		/****************************************
		 * Create dir: utils
		****************************************/
		if (!file_exists($this->dpath_Docs)) {
	
			$res = @mkdir($this->dpath_Docs, $mode=0777, $recursive=true);
	
		}
	
	
	}//public function _Setup_Paths()
	
}


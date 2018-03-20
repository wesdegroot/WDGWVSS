<?php
/** Plain text databse controller
 *
 * Controller for a plain text database
 */

namespace WDGWV\CMS\controllers\databases;

/*
------------------------------------------------------------
-                :....................,:,                  -
-              ,.`,,,::;;;;;;;;;;;;;;;;:;`                 -
-            `...`,::;:::::;;;;;;;;;;;;;::'                -
-           ,..``,,,::::::::::::::::;:;;:::;               -
-          :.,,``..::;;,,,,,,,,,,,,,:;;;;;::;`             -
-         ,.,,,`...,:.:,,,,,,,,,,,,,:;:;;;;:;;             -
-        `..,,``...;;,;::::::::::::::'';';';:''            -
-        ,,,,,``..:;,;;:::::::::::::;';;';';;'';           -
-       ,,,,,``....;,,:::::::;;;;;;;;':'''';''+;           -
-       :,::```....,,,:;;;;;;;;;;;;;;;''''';';';;          -
-      `,,::``.....,,,;;;;;;;;;;;;;;;;'''''';';;;'         -
-      :;:::``......,;;;;;;;;:::::;;;;'''''';;;;:-         -
-      ;;;::,`.....,::;;::::::;;;;;;;;'''''';;,;;,         -
-      ;:;;:;`....,:::::::::::::::::;;;;'''':;,;;;         -
-      ';;;;;.,,,,::::::::::::::::::;;;;;''':::;;'         -
-      ;';;;;.;,,,,::::::::::::::::;;;;;;;''::;;;'         -
-      ;'';;:;..,,,;;;:;;:::;;;;;;;;;;;;;;;':::;;'         -
-      ;'';;;;;.,,;:;;;;;;;;;;;;;;;;;;;;;;;;;:;':;         -
-      ;''';;:;;.;;;;;;;;;;;;;;;;;;;;;;;;;;;''';:.         -
-      :';';;;;;;::,,,,,,,,,,,,,,:;;;;;;;;;;'''';          -
-       '';;;;:;;;.,,,,,,,,,,,,,,,,:;;;;;;;;'''''          -
-       '''';;;;;:..,,,,,,,,,,,,,,,,,;;;;;;;''':,          -
-       .'''';;;;....,,,,,,,,,,,,,,,,,,,:;;;''''           -
-        ''''';;;;....,,,,,,,,,,,,,,,,,,;;;''';.           -
-         '''';;;::.......,,,,,,,,,,,,,:;;;''''            -
-         `''';;;;:,......,,,,,,,,,,,,,;;;;;''             -
-          .'';;;;;:.....,,,,,,,,,,,,,,:;;;;'              -
-           `;;;;;:,....,,,,,,,,,,,,,,,:;;''               -
-             ;';;,,..,.,,,,,,,,,,,,,,,;;',                -
-               '';:,,,,,,,,,,,,,,,::;;;:                  -
-                 `:;'''''''''''''''';:.                   -
-                                                          -
- ,,,::::::::::::::::::::::::;;;;,:::::::::::::::::::::::: -
- ,::::::::::::::::::::::::::;;;;,:::::::::::::::::::::::: -
- ,:; ## ## ##  #####     ####      ## ## ##  ##   ##  ;:: -
- ,,; ## ## ##  ## ##    ##         ## ## ##  ##   ##  ;:: -
- ,,; ## ## ##  ##  ##  ##   ####   ## ## ##   ## ##   ;:: -
- ,,' ## ## ##  ## ##    ##    ##   ## ## ##   ## ##   ::: -
- ,:: ########  ####      ######    ########    ###    ::: -
- ,,,:,,:,,:::,,,:;:::::::::::::::;;;:::;:;::::::::::::::: -
- ,,,,,,,,,,,,,,,,,,,,,,,,:,::::::;;;;:::::;;;;::::;;;;::: -
-                                                          -
-       (c) WDGWV. 2013, http://www.wdgwv.com              -
-    Websites, Apps, Hosting, Services, Development.       -
------------------------------------------------------------
 */

if (!defined('DB_PATH')) {
	define('DB_PATH', './data/database/');
}

define('PT_CMS_DB', DB_PATH . 'CMS.db');
define('PT_MENU_DB', DB_PATH . 'menuItems.db');
define('PT_USER_DB', DB_PATH . 'userInfo.db');
define('PT_POST_DB', DB_PATH . 'posts.db'); // Tip, Purge every year.
define('PT_PAGE_DB', DB_PATH . 'pages.db');
define('PT_SHOP_DB', DB_PATH . 'shopItems.db');
define('PT_WIKI_DB', DB_PATH . 'wikiItems.db');
define('PT_ORDER_DB', DB_PATH . 'orders.db');
define('PT_FORUM_DB', DB_PATH . 'forumItems.db');

class plainText extends \WDGWV\CMS\controllers\databases\base {
	private $CMSDatabase = array();
	private $userDatabase = array();
	private $postDatabase = array();
	private $pageDatabase = array();
	private $shopDatabase = array();
	private $wikiDatabase = array();
	private $orderDatabase = array();
	private $forumDatabase = array();

	/**
	 * Call the database
	 * @since Version 1.0
	 */
	public static function sharedInstance() {
		static $inst = null;
		if ($inst === null) {
			$inst = new \WDGWV\CMS\controllers\databases\plainText();
		}
		return $inst;
	}

	private function _loadDatabase($databasePath) {
		if (!file_exists($databasePath)) {
			if (!touch($databasePath)) {
				$databaseName = end(explode("/", $databasePath));
				$databaseName = explode(".", $databaseName)[0];

				$error = sprintf("<b>Fatal error: Could not create '%s' database.</b>", $databaseName);
				if (class_exists('\WDGWV\CMS\Debugger')) {
					\WDGWV\CMS\Debugger::sharedInstance()->error($error);
				}
				echo $error;

				exit;
			}

		}

		$_database = @gzuncompress(file_get_contents($databasePath));
		if (strlen($_database) > 10) {
			return json_decode($_database);
		}

		return array();
	}

	/**
	 * Private so nobody else can instantiate it
	 *
	 */
	private function __construct() {
		$this->pageDatabase = $this->_loadDatabase(PT_PAGE_DB);
		$this->userDatabase = $this->_loadDatabase(PT_USER_DB);
		$this->postDatabase = $this->_loadDatabase(PT_POST_DB);
		$this->shopDatabase = $this->_loadDatabase(PT_SHOP_DB);
		$this->wikiDatabase = $this->_loadDatabase(PT_WIKI_DB);
		$this->forumDatabase = $this->_loadDatabase(PT_FORUM_DB);
		$this->orderDatabase = $this->_loadDatabase(PT_ORDER_DB);
		$this->CMSDatabase = $this->_loadDatabase(PT_CMS_DB);

		if (!$this->userExists('admin')) {
			if (is_array($this->generateUserDB())) {
				$this->userDatabase[] = (object) $this->generateUserDB();
			}

			$this->userDatabase[] = (object) array(
				'username' => 'admin',
				'password' => hash('sha512', 'changeme'),
				'email' => 'admin@localhost',
				'userlevel' => 'admin',
				'is_activated' => true,
				'extra' => array('userLevel' => 100, 'is_admin' => true),
			);
		}
		if (!$this->postExists('Welcome to the WDGWV CMS!')) {
			$this->postDatabase[] = array(
				'Welcome to the WDGWV CMS!',
				'Welcome to the WDGWV CMS!<br />',
				'Welcome,WDGWV,CMS',
				date('d-m-Y H:i:s'),
				array('userID' => 0, 'sticky' => true),
			);
		}
	}

	public function __destruct() {
		file_put_contents(
			PT_CMS_DB,
			gzcompress(
				json_encode(
					$this->CMSDatabase
				), 9
			)
		);
		file_put_contents(
			PT_USER_DB,
			gzcompress(
				json_encode(
					$this->userDatabase
				), 9
			)
		);
		file_put_contents(
			PT_POST_DB,
			gzcompress(
				json_encode(
					$this->postDatabase
				), 9
			)
		);
		file_put_contents(
			PT_PAGE_DB,
			gzcompress(
				json_encode(
					$this->pageDatabase
				), 9
			)
		);
		file_put_contents(
			PT_SHOP_DB,
			gzcompress(
				json_encode(
					$this->shopDatabase
				), 9
			)
		);
		file_put_contents(
			PT_WIKI_DB,
			gzcompress(
				json_encode(
					$this->wikiDatabase
				), 9
			)
		);
		file_put_contents(
			PT_ORDER_DB,
			gzcompress(
				json_encode(
					$this->orderDatabase
				), 9
			)
		);
		file_put_contents(
			PT_FORUM_DB,
			gzcompress(
				json_encode(
					$this->forumDatabase
				), 9
			)
		);
	}

	public function postExists($postTitle, $strict = false) {
		if ($strict) {
			return isset($this->postDatabase[$postTitle]);
		}

		for ($i = 0; $i < sizeof($this->postDatabase); $i++) {
			if (strtolower($postTitle) !== strtolower($this->postDatabase[$i][0])) {
				// continue
			} else {
				return true;
			}
		}
		return false;
	}

	public function postGetLast() {
		return $this->postDatabase[sizeof($this->postDatabase) - 1];
	}

	public function postCreate($postTitle, $postContents, $postKeywords, $postDate, $postOptions, $postID = 0) {
		if ($postID === 0) {
			if (!$this->postExists($postTitle)) {
				$this->postDatabase[] = array(
					$postTitle,
					$postContents,
					$postKeywords,
					$postDate,
					$postOptions,
				);
			} else {
				return false;
			}
		} else {
			$this->postDatabase[$postID] = array(
				$postTitle,
				$postContents,
				$postKeywords,
				$postDate,
				$postOptions,
			);
		}
		return true;
	}

	public function postLoad($postID, $strict = false) {
		if ($this->postExists($postID, $strict)) {
			if (is_numeric($postID)) {
				return $this->postDatabase[$postID];
			} else {
				for ($i = 0; $i < sizeof($this->postDatabase); $i++) {
					if (strtolower($postID) !== strtolower($this->postDatabase[$i][0])) {
						// continue
					} else {
						return $this->postDatabase[$i];
					}
				}
			}
		} else {
			echo "postID does not exists!";
		}
	}

	public function postRemove($postID) {
		if ($this->postExists($postID, true)) {
			unset($this->postDatabase[$postID]);
		}
	}

	public function editPost($postID, $postTitle, $postContents, $postKeywords, $postDate, $postOptions) {
		if ($this->postRemove($postID)) {
			if ($this->postCreate($postTitle, $postContents, $postKeywords, $postDate, $postOptions, $postID)) {
				return true;
			}
		}
		return false;
	}

	private function userExists($userID) {
		for ($i = 0; $i < sizeof($this->userDatabase); $i++) {
			if (isset($this->userDatabase[$i]->username) && $this->userDatabase[$i]->username !== $userID) {
				continue;
			} else {
				return true;
			}
		}

		if (sizeof($this->userDatabase) == 0) {
			echo "Unown error occured.<script>window.location.reload();</script>";
		}
		return false;
	}

	public function userLoad($userID) {

	}

	public function userLogin($userID, $userPassword) {
		for ($i = 0; $i < sizeof($this->userDatabase); $i++) {
			// Loaded
			// stdClass Object
			if (
				isset($this->userDatabase[$i]->password) &&
				$this->userDatabase[$i]->password == hash('sha512', $userPassword) &&
				(
					$i === $userID Or // userID matches DB ID
					$this->userDatabase[$i]->username === $userID Or // userID matches userName
					$this->userDatabase[$i]->email === $userID // userID matches userEmail
				)
			) {
				return true;
			}
		}

		return false;
	}

	public function userDelete($userID) {
		if ($this->userExists($userID)) {
			for ($i = 0; $i < sizeof($this->userDatabase); $i++) {
				if ($this->userDatabase[$i]->username !== $userID) {
					continue;
				} else {
					unset($this->userDatabase[$i]);
					return true;
				}
			}

			return false;
		}
	}

	public function userRegister($userID, $userPassword, $userEmail, $options = array()) {
		if (!$this->userExists($userID)) {
			$user = new \stdClass();
			$user->username = $userID;
			$user->password = hash('sha512', $userPassword);
			$user->email = $userEmail;
			$user->userlevel = 'member';
			$user->is_activated = false;
			$user->extra = $options;

			$this->userDatabase[] = $user;

			return true;
		} else {
			return false;
		}
	}

	public function createPage($pageTitle, $pageContents, $pageKeywords, $pageOptions = array(), $pageID = 0) {
		if ($pageID === 0) {
			if (!$this->pageExists($pageTitle)) {
				$this->pageDatabase[] = array(
					$pageTitle,
					$pageContents,
					$pageKeywords,
					time(),
					$pageOptions,
				);
			} else {
				return false;
			}
		} else {
			$this->pageDatabase[$pageID] = array(
				$pageTitle,
				$pageContents,
				$pageKeywords,
				time(),
				$pageOptions,
			);
		}
		return true;
	}

	public function pageExists($pageTitleOrID, $strict = false) {
		if ($strict) {
			return isset($this->pageDatabase[$pageTitleOrID]);
		}

		for ($i = 0; $i < sizeof($this->pageDatabase); $i++) {
			if (strtolower($pageTitleOrID) !== strtolower($this->pageDatabase[$i][0])) {
				// continue
			} else {
				return true;
			}
		}
		return false;
	}

	public function loadPage($pageTitleOrID, $strict = false) {
		if ($strict) {
			return ($this->pageDatabase[$pageTitleOrID]);
		}

		for ($i = 0; $i < sizeof($this->pageDatabase); $i++) {
			if (strtolower($pageTitleOrID) !== strtolower($this->pageDatabase[$i][0])) {
				// continue
			} else {
				return $this->pageDatabase[$i];
			}
		}
		return false;
	}

	public function setMenuItems($menuItemsArray) {
		$this->CMSDatabase['menu'] = $menuItemsArray;
	}

	public function loadMenu() {
		if (isset($this->CMSDatabase->menu)) {
			// force downcast stdClass to array.
			$this->CMSDatabase = json_decode(json_encode($this->CMSDatabase), true);
		}
		if (is_array(@$this->CMSDatabase['menu'])) {
			return $this->CMSDatabase['menu'];
		} else {
			if (sizeof($this->CMSDatabase) == 0) {
				$this->CMSDatabase = $this->generateSystemDB();
			}
			return $this->CMSDatabase['menu'] = $this->generateMenuDB();
		}
	}
}
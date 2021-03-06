<?php
/** Plain text databse controller
 *
 * Controller for a plain text database
 */

namespace WDGWV\CMS\Controllers\Databases;

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
-       (c) WDGWV. 2018, http://www.wdgwv.com              -
-    Websites, Apps, Hosting, Services, Development.       -
------------------------------------------------------------
 */

/**
 * Check if 'PT_DB_PATH' is already defined.
 */
if (!defined('PT_DB_PATH')) {
    /**
     * Define 'PT_DB_PATH' to 'Data/Database/'
     */
    define('PT_DB_PATH', 'Data/Database/');
}

/**
 * Check if 'PT_CMS_DB' is already defined.
 */
if (!defined('PT_CMS_DB')) {
    /**
     * Define 'PT_CMS_DB' to 'Data/Database/CMS.PTdb'
     */
    define('PT_CMS_DB', PT_DB_PATH . 'CMS.PTdb');
}

/**
 * Check if 'PT_MENU_DB' is already defined.
 */
if (!defined('PT_MENU_DB')) {
    /**
     * Define 'PT_MENU_DB' to 'Data/Database/menuItems.PTdb'
     */
    define('PT_MENU_DB', PT_DB_PATH . 'menuItems.PTdb');
}

/**
 * Check if 'PT_USER_DB' is already defined.
 */
if (!defined('PT_USER_DB')) {
    /**
     * Define 'PT_USER_DB' to 'Data/Database/userInfo.PTdb'
     */
    define('PT_USER_DB', PT_DB_PATH . 'userInfo.PTdb');
}

/**
 * Check if 'PT_POST_DB' is already defined. (Tip, Purge every year.)
 */
if (!defined('PT_POST_DB')) {
    /**
     * Define 'PT_POST_DB' to 'Data/Database/posts.PTdb'
     */
    define('PT_POST_DB', PT_DB_PATH . 'posts.PTdb');
}

/**
 * Check if 'PT_PAGE_DB' is already defined. (Tip, Purge every year.)
 */
if (!defined('PT_PAGE_DB')) {
    /**
     * Define 'PT_PAGE_DB' to 'Data/Database/pages.PTdb'
     */
    define('PT_PAGE_DB', PT_DB_PATH . 'pages.PTdb');
}

/**
 * Check if 'PT_SHOP_DB' is already defined.
 */
if (!defined('PT_SHOP_DB')) {
    /**
     * Define 'PT_SHOP_DB' to 'Data/Database/shopItems.PTdb'
     */
    define('PT_SHOP_DB', PT_DB_PATH . 'shopItems.PTdb');
}

/**
 * Check if 'PT_WIKI_DB' is already defined.
 */
if (!defined('PT_WIKI_DB')) {
    /**
     * Define 'PT_WIKI_DB' to 'Data/Database/wikiItems.PTdb'
     */
    define('PT_WIKI_DB', PT_DB_PATH . 'wikiItems.PTdb');
}

/**
 * Check if 'PT_ORDER_DB' is already defined.
 */
if (!defined('PT_ORDER_DB')) {
    /**
     * Define 'PT_ORDER_DB' to 'Data/Database/orders.PTdb'
     */
    define('PT_ORDER_DB', PT_DB_PATH . 'orders.PTdb');
}

/**
 * Check if 'PT_FORUM_DB' is already defined.
 */
if (!defined('PT_FORUM_DB')) {
    /**
     * Define 'PT_FORUM_DB' to 'Data/Database/forumItems.PTdb'
     */
    define('PT_FORUM_DB', PT_DB_PATH . 'forumItems.PTdb');
}

/**
 * Class 'PlainText'
 *
 * @extends \WDGWV\CMS\Controllers\Databases\Base
 * @version 1.0
 * @copyright Wesley de Groot
 * @package \WDGWV\CMS
 * @depends \WDGWV\CMS\Controllers\Databases\Base
 */
class PlainText extends \WDGWV\CMS\Controllers\Databases\Base
{
    /**
     * @var array
     */
    private $CMSDatabase = array();

    /**
     * @var array
     */
    private $userDatabase = array();

    /**
     * @var array
     */
    private $postDatabase = array();

    /**
     * @var array
     */
    private $pageDatabase = array();

    /**
     * @var array
     */
    private $shopDatabase = array();

    /**
     * @var array
     */
    private $wikiDatabase = array();

    /**
     * @var array
     */
    private $orderDatabase = array();

    /**
     * @var array
     */
    private $forumDatabase = array();

    /**
     * @var mixed
     */
    private $compressDatabase = false;

    /**
     * Call the database
     * @since Version 1.0
     */
    public static function shared()
    {
        /**
         * @var mixed
         */
        static $inst = null;
        if ($inst === null) {
            $inst = new \WDGWV\CMS\Controllers\Databases\PlainText();
        }
        return $inst;
    }

    /**
     * @param $databasePath
     */
    private function loadDatabase($databasePath)
    {
        if (!file_exists($databasePath)) {
            if (!touch($databasePath)) {
                $databaseName = end(explode("/", $databasePath));
                $databaseName = explode(".", $databaseName)[0];

                $error = sprintf("<b>Fatal error: Could not create '%s' database.</b>", $databaseName);
                if (class_exists('\WDGWV\CMS\Debugger')) {
                    \WDGWV\CMS\Debugger::shared()->error($error);
                }
                echo $error;

                exit;
            }
        }

        if ($this->compressDatabase) {
            $_database = @gzuncompress(file_get_contents($databasePath));
        } else {
            $_database = file_get_contents($databasePath);
        }
        if (strlen($_database) > 10) {
            return json_decode($_database);
        }

        return array();
    }

    /**
     * @param $databasePath
     * @param $databaseContents
     */
    private function saveDatabase($databasePath, $databaseContents)
    {
        $error = false;
        if (!is_writeable($databasePath)) {
            $error = true;
        }

        if ($this->compressDatabase) {
            $_compressed = gzcompress(json_encode($databaseContents), 9);
        } else {
            $_compressed = json_encode($databaseContents);
        }

        if (!file_put_contents($databasePath, $_compressed)) {
            $error = true;
        }

        if (file_get_contents($databasePath) !== $_compressed) {
            $error = true;
        }

        if ($error) {
            $databaseName = explode("/", $databasePath);
            $databaseName = explode(".", end($databaseName))[0];

            $error = sprintf(
                "<b>Fatal error: Could not create '%s' database.</b>" .
                "<br />Expected length: %s, got %s.<br />",
                $databaseName,
                strlen($_compressed),
                strlen(file_get_contents($databasePath))
            );

            if (class_exists('\WDGWV\CMS\Debugger')) {
                \WDGWV\CMS\Debugger::shared()->error($error);

                \WDGWV\CMS\Debugger::shared()->error("Expected: {$_compressed}");
                \WDGWV\CMS\Debugger::shared()->error("Got: " . file_get_contents($databasePath));
            }

            echo $error;
        }
    }

    /**
     * Private so nobody else can instantiate it
     * Construct the database
     */
    protected function __construct()
    {
        parent::__construct();

        $this->pageDatabase = $this->loadDatabase(PT_PAGE_DB);
        $this->userDatabase = $this->loadDatabase(PT_USER_DB);
        $this->postDatabase = $this->loadDatabase(PT_POST_DB);
        $this->shopDatabase = $this->loadDatabase(PT_SHOP_DB);
        $this->wikiDatabase = $this->loadDatabase(PT_WIKI_DB);
        $this->forumDatabase = $this->loadDatabase(PT_FORUM_DB);
        $this->orderDatabase = $this->loadDatabase(PT_ORDER_DB);
        $this->CMSDatabase = $this->loadDatabase(PT_CMS_DB);

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
                'extra' => array('userlevel' => 100, 'is_admin' => true),
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

    public function __destruct()
    {
        $this->saveDatabase(PT_CMS_DB, $this->CMSDatabase);
        $this->saveDatabase(PT_USER_DB, $this->userDatabase);
        $this->saveDatabase(PT_POST_DB, $this->postDatabase);
        $this->saveDatabase(PT_PAGE_DB, $this->pageDatabase);
        $this->saveDatabase(PT_SHOP_DB, $this->shopDatabase);
        $this->saveDatabase(PT_WIKI_DB, $this->wikiDatabase);
        $this->saveDatabase(PT_ORDER_DB, $this->orderDatabase);
        $this->saveDatabase(PT_FORUM_DB, $this->forumDatabase);
    }

    /**
     * @param $postTitle
     * @param $strict
     */
    public function postExists($postTitle, $strict = false)
    {
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

    /**
     * @return mixed
     */
    public function postGetLast()
    {
        return $this->postDatabase[sizeof($this->postDatabase) - 1];
    }

    /**
     * @param $postTitle
     * @param $postContents
     * @param $postKeywords
     * @param $postDate
     * @param $postOptions
     * @param $postID
     */
    public function postCreate($postTitle, $postContents, $postKeywords, $postDate, $postOptions, $postID = 0)
    {
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

    /**
     * @param $postID
     * @param $strict
     * @return mixed
     */
    public function postLoad($postID, $strict = false)
    {
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

    /**
     * @param $postID
     */
    public function postRemove($postID)
    {
        if ($this->postExists($postID, true)) {
            unset($this->postDatabase[$postID]);
        }
    }

    /**
     * @param $postID
     * @param $postTitle
     * @param $postContents
     * @param $postKeywords
     * @param $postDate
     * @param $postOptions
     */
    public function postEdit($postID, $postTitle, $postContents, $postKeywords, $postDate, $postOptions)
    {
        if ($this->postRemove($postID)) {
            if ($this->postCreate($postTitle, $postContents, $postKeywords, $postDate, $postOptions, $postID)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $userID
     */
    private function userExists($userID)
    {
        for ($i = 0; $i < sizeof($this->userDatabase); $i++) {
            if (isset($this->userDatabase[$i]->username) && $this->userDatabase[$i]->username !== $userID) {
                continue;
            } else {
                return true;
            }
        }

        if (sizeof($this->userDatabase) == 0) {
            $this->userDatabase = $this->generateUserDB();
            echo "Unown error occured.<script>window.location.reload();</script>";
        }
        return false;
    }

    /**
     * @param $userID
     */
    public function userLoad($userID)
    {
    }

    /**
     * @param $userID
     * @param $userPassword
     */
    public function userLogin($userID, $userPassword)
    {
        for ($i = 0; $i < sizeof($this->userDatabase); $i++) {
            // Loaded
            // stdClass Object
            if (isset($this->userDatabase[$i]->password) &&
                $this->userDatabase[$i]->password == hash('sha512', $userPassword) &&
                (
                    $i === $userID or // userID matches DB ID
                    $this->userDatabase[$i]->username === $userID or // userID matches userName
                    $this->userDatabase[$i]->email === $userID // userID matches userEmail
                )
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $userID
     */
    public function userDelete($userID)
    {
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

    /**
     * @param $userID
     * @param $userPassword
     * @param $userEmail
     * @param array $options
     */
    public function userRegister($userID, $userPassword, $userEmail, $options = array())
    {
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

    /**
     * @param $pageTitle
     * @param $pageContents
     * @param $pageKeywords
     * @param array $pageOptions
     * @param $pageID
     */
    public function pageCreate($pageTitle, $pageContents, $pageKeywords, $pageOptions = array(), $pageID = 0)
    {
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

    /**
     * @param $pageTitleOrID
     * @param $strict
     */
    public function pageExists($pageTitleOrID, $strict = false)
    {
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

    /**
     * @param $pageTitleOrID
     * @param $strict
     * @return mixed
     */
    public function pageLoad($pageTitleOrID, $strict = false)
    {
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

    /**
     * @param $menuItemsArray
     */
    public function menuSetItems($menuItemsArray)
    {
        $this->CMSDatabase['menu'] = $menuItemsArray;
    }

    public function themeGet()
    {
        return isset($this->CMSDatabase->theme) ? $this->CMSDatabase->theme : 'admin';
    }

    /**
     * @param $themeName
     */
    public function themeSet($themeName)
    {
        if (file_exists(sprintf('Data/Themes/%s', $themeName))) {
            if (isset($this->CMSDatabase->theme)) {
                $this->CMSDatabase->theme = $themeName;
            }
        }
    }
    /**
     * @return mixed
     */
    public function menuLoad()
    {
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

<?php
/**
 * WDGWV CMS Extension file.
 * Extension: Demo Mode
 * Version: 1.0
 * Description: Disable all admin calls.
 * Hash: ee12bcf71c819379706aae2d749b03f3
 * Integrity check: Required
 */

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

namespace WDGWV\CMS\Extension; /* Module namespace */

if (!file_exists("Data/Extensions/DemoMode/disabled")) {
    class DemoMode extends \WDGWV\CMS\ExtensionBase
    {
        /**
         * Call the shared
         * @since Version 1.0
         */
        public static function shared()
        {
            static $inst = null;
            if ($inst === null) {
                $inst = new \WDGWV\CMS\Extension\DemoMode();
            }
            return $inst;
        }

        /**
         * Private so nobody else can instantiate it
         *
         */
        private function __construct()
        {
            return;
        }

        public function _display()
        {
            unset($_POST);
            $_POST = array();
            unset($_GET);
            $_GET = array();

            if (sizeof($_GET) > 0 ||
                sizeof($_POST) > 0) {
                $page = array(
                    '⚠️ Warning: Couldn\'t remove post/get data.',
                    '<table><tr><td style=\'font-size: 124px;\'>⚠️</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h1>Warning</h1><h3>Demo mode activated</h3><br />All changes on system settings are <b>rejected</b>.<br /><br />In about 5 seconds you\'ll be redericted to saftey.</td></tr></table><script>window.setTimeout(function () {history.back(-1);}, 5000);</script>');

                return $page;
            }

            return;
        }
    }

    \WDGWV\CMS\Hooks::shared()->createHook(
        'after-content',
        'demo mode',
        array(
            'demo mode',
            'Welcome on this public <a href=\'https://www.wdgwv.com/products/cms\' target=\'_blank\'>WDGWV CMS</a> demo server.<br />You can browse the interface, but you can\'t make changes on the system.',
        )
    );

    if (sizeof($_GET) > 0 ||
        sizeof($_POST) > 0) {
        // Display Warning.
        \WDGWV\CMS\Hooks::shared()->createHook(
            'before-content',
            'warning',
            array(
                '⚠️ Warning: Demo mode activated',
                '<table><tr><td style=\'font-size: 124px;\'>⚠️</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h1>Warning</h1><h3>Demo mode activated</h3><br />All changes on system settings are disabled.</td></tr></table>',
            )
        );

        // Remove all values.
        \WDGWV\CMS\Hooks::shared()->createHook(
            'url',
            sprintf('/%s*', (new \WDGWV\CMS\Config())->adminURL()), // Supports also /calendar/i*cs and then /calendar/ixcs works also
            array(DemoMode::shared(), '_display')
        );
    }
}

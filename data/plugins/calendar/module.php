<?php
/**
 * WDGWV CMS Module file.
 * Full access: false
 * Module: Calendar
 * Version: 1.0
 * Description: Have a nice calendar.
 */

/*
:....................,:,
,.`,,,::;;;;;;;;;;;;;;;;:;`
`...`,::;:::::;;;;;;;;;;;;;::'
,..``,,,::::::::::::::::;:;;:::;
:.,,``..::;;,,,,,,,,,,,,,:;;;;;::;`
,.,,,`...,:.:,,,,,,,,,,,,,:;:;;;;:;;
`..,,``...;;,;::::::::::::::'';';';:''
,,,,,``..:;,;;:::::::::::::;';;';';;'';
,,,,,``....;,,:::::::;;;;;;;;':'''';''+;
:,::```....,,,:;;;;;;;;;;;;;;;''''';';';;
`,,::``.....,,,;;;;;;;;;;;;;;;;'''''';';;;'
:;:::``......,;;;;;;;;:::::;;;;'''''';;;;:
;;;::,`.....,::;;::::::;;;;;;;;'''''';;,;;,
;:;;:;`....,:::::::::::::::::;;;;'''':;,;;;
';;;;;.,,,,::::::::::::::::::;;;;;''':::;;'
;';;;;.;,,,,::::::::::::::::;;;;;;;''::;;;'
;'';;:;..,,,;;;:;;:::;;;;;;;;;;;;;;;':::;;'
;'';;;;;.,,;:;;;;;;;;;;;;;;;;;;;;;;;;;:;':;
;''';;:;;.;;;;;;;;;;;;;;;;;;;;;;;;;;;''';:.
:';';;;;;;::,,,,,,,,,,,,,,:;;;;;;;;;;'''';
'';;;;:;;;.,,,,,,,,,,,,,,,,:;;;;;;;;'''''
'''';;;;;:..,,,,,,,,,,,,,,,,,;;;;;;;''':,
.'''';;;;....,,,,,,,,,,,,,,,,,,,:;;;''''
''''';;;;....,,,,,,,,,,,,,,,,,,;;;''';.
'''';;;::.......,,,,,,,,,,,,,:;;;''''
`''';;;;:,......,,,,,,,,,,,,,;;;;;''
.'';;;;;:.....,,,,,,,,,,,,,,:;;;;'
`;;;;;:,....,,,,,,,,,,,,,,,:;;''
;';;,,..,.,,,,,,,,,,,,,,,;;',
'';:,,,,,,,,,,,,,,,::;;;:
`:;'''''''''''''''';:.

,,,::::::::::::::::::::::::;;;;,::::::::::::::::::::::::
,::::::::::::::::::::::::::;;;;,::::::::::::::::::::::::
,:; ## ## ##  #####     ####      ## ## ##  ##   ##  ;::
,,; ## ## ##  ## ##    ##         ## ## ##  ##   ##  ;::
,,; ## ## ##  ##  ##  ##   ####   ## ## ##   ## ##   ;::
,,' ## ## ##  ## ##    ##    ##   ## ## ##   ## ##   :::
,:: ########  ####      ######    ########    ###    :::
,,,:,,:,,:::,,,:;:::::::::::::::;;;:::;:;:::::::::::::::
,,,,,,,,,,,,,,,,,,,,,,,,:,::::::;;;;:::::;;;;::::;;;;:::

(c) WDGWV. 2013, http://www.wdgwv.com
websites, Apps, Hosting, Services, Development.

File Checked.
Checked by: WdG.
File created: WdG.
date: 07-06-2013

© WDGWV, www.wdgwv.com
All Rights Reserved.
 */

namespace WDGWV\CMS\Modules; /* Module namespace*/

class calendar extends \WDGWV\CMS\extensionBase {
	/**
	 * Call the sharedInstance
	 * @since Version 1.0
	 */
	public static function sharedInstance() {
		static $inst = null;
		if ($inst === null) {
			$inst = new \WDGWV\CMS\Modules\calendar();
		}
		return $inst;
	}

	/**
	 * Private so nobody else can instantiate it
	 *
	 */
	private function __construct() {

	}

	public function _generateICAL() {
		echo "Woops, this must be created, sorry!";
		exit();
	}
}

\WDGWV\CMS\hooks::sharedInstance()->createHook(
	'url',
	'/calendar/ics', // Supports also /calendar/i*cs and then /calendar/ixcs works also
	array(calendar::sharedInstance(), '_generateICAL')
);
?>
<?php
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
$i = 0;

$start = microtime();

while ($i <= 100001) {
	echo "TEST {$i}\n";
	$i++;
}

$stop = microtime();

echo $i . " Tests taked " . ($start - $stop) . "ms";
?>
<?php
/*
                                                                          
                                #,,;                        :,        
                *,. ,,,..::* ;,,,,,;*                 :,..,,,,*       
            ;;;;;;***:::::+;  +:::*+        :,,,,:::+ *;::,,++#       
             +;;;**  +:::*+    :::   :::;;;+;;;;::++*   ;::;          
              ;;;;+   ;:::+    ::*   ***;*** +;;;:+     :::*          
              +;;;+   ;;;:+   *::     **;:+   ;;;;*     ::;           
               ;;;;+  ;;;;*+  ::*     +***+   +;;;;+   *::*           
               **;:#  ;;;;:+  ;;*      ***:+  *;;;:+   ;;*            
               +***+#*;+;;;+ ;;;       +**;+  ;;;;;;  *;;*            
                ***:+**+;;;;+;;;   `**  ****  ;+;;;:+ ;;*             
                ****+*;*;;;;+;;;  `*`*+ ***;+**+;;;;* ;;;             
                 ***;** +;;;+;;   * *   +*****;**;;;*+;;*             
                 ******  *;;;*;   **,    ***:*: +*;;*;;:              
                 +****;  ****;;  ++*`*   *****;  *;;;;;*              
                  ***;*  +***;  +, ++    #***;*  ***;;*               
                  +***    **;*  +;+++;    ****   #***;*               
                   ***    **++  ;++`+`    +**;    *****               
                   ***    +**    #         *+;    +***                
                                           #*      **;                
                                                    +                 
    WDGWV.

  File Checked.
  Checked by: WdG.
  File created: WdG.
  date: 07-06-2013

  © WDGWV, www.wdgwv.nl
  All Rights Reserved.
*/
  
if (file_exists('WDGWVSS')) //DOES WDGWVSS EXISTS?
{
	include 'WDGWVSS'; //LOAD WDGWVSS
	WDGWVSS(INIT); //INIT WDGWVSS
}
else
{
	/* Error System not found, Killing. */
	echo 'SYSTEM NOT DONE YET, PLEASE UPDATE THE REPO WHEN THERE ARE NEW COMMITS!';
	exit(1);
}

if (WDGWVSS_NEEDS_TO_CHECK_FOR_UPDATES()) //NEEDS TO UPDATE?
	WDGWVSS_CHECK_UPDATES(); //UPDATE IF POSSIBLE

WDGWVSS_SET_LAYOUT(DEFAULT); //SET THE LAYOUT

WDGWVSS_LAYOUT(SYSTEM); // SET THE LAYOU
WDGWVSS_CREATE(PAGE); // CREATE A PAGE
WDGWVSS_PAGE(HOME); // LOADS THE PAGE "HOME"
WDGWVSS_APPEND(CONTENTS); // APPENDS THE "CONTENTS" OF THE PAGE
WDGWVSS_APPEND(LAYOUT); // APPENDS THE "LAYOUT" TO THE PAGE
WDGWVSS_RUN(); // RUNS THE SYSTEM
WDGWVSS_DISPLAY(); // DISPLAYS THE PAGE
WDGWVSS_CLEANUP(ALL); // CLEAN UP ALL THE TEMP FILES.

?>
rem ================================
rem 	2022”N4ŒŽ22“ú14:41:22
rem 	this file used in : C:\WORKS_2\WS\WS_Cake_IFM11\commands\cake-ifm_commands.txt
rem ================================

rem : choose browser
goto yandex


:filezilla
"C:\Program Files\Mozilla Firefox\firefox.exe" "http://127.0.0.1:8000/im/"

:yandex
set browser="C:\Users\iwabuchiken\AppData\Local\Yandex\YandexBrowser\Application\browser.exe"

set url=http://127.0.0.1:8000/im/

%browser% %url%


rem "http://127.0.0.1:8000/im/"


rem pause

rem : 2022”N6ŒŽ2“ú10:11:02
goto yandex

rem goto opera
REM goto chrome

REM ================================
REM 	open with : firefox
REM 	2019/06/27 11:06:21
REM ================================
:firefox
pushd "C:\Program Files\Mozilla Firefox"
start firefox.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"

goto end

REM ================================
REM 	open with : chrome
REM 	2019/06/27 11:06:21
REM ================================
:chrome
pushd "C:\Program Files (x86)\Google\Chrome\Application"
start chrome.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"

goto end

REM ================================
REM 	open with : opera
REM 	2019/08/13 08:10:14
REM ================================
:opera
	pushd "C:\WORKS_2\Programs\opera"
	start launcher.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"
	
goto end

REM ================================
REM 	open with : yandex
REM 	2019/08/13 08:10:14
REM ================================
:yandex
pushd "C:\Users\iwabuchiken\AppData\Local\Yandex\YandexBrowser\Application"
start browser.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"
	
goto end

rem pause

:end

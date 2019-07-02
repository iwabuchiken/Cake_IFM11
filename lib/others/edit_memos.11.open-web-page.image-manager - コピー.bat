goto chrome

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

rem pause

:end

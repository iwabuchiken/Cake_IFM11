pushd "C:\Program Files\Mozilla Firefox"
start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index"
start firefox.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"

goto end

pushd "C:\Program Files (x86)\Google\Chrome\Application"
start chrome.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index"
start chrome.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"

rem pause

:end

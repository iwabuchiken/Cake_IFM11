pushd "C:\Program Files\Mozilla Firefox"
start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/add_From_DB_File?command=GO"

goto end

pushd "C:\Program Files (x86)\Google\Chrome\Application"
start chrome.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/add_From_DB_File?command=GO"

rem pause

:end

## 請解釋後端與前端的差異。

前端：主要負責的是使用者所看到的網頁畫面，使用者可透過前端建構的網頁與網站互動。
後端：主要負責的是使用者由前端傳入的相對應資料，處理使用者指令提供前端內容。


## 假設我今天去 Google 首頁搜尋框打上：JavaScri[t 並且按下 Enter，請說出從這一刻開始到我看到搜尋結果為止發生在背後的事情。

user > 開啟瀏覽器 > 在google網頁搜尋js按下enter

瀏覽器會發送指令(使用get method)到web伺服器，使用者端就發送出一個封包，封包會帶著的指令，然後經過 DNS 幫你找 IP、 Router 指引你往對的方向⋯⋯，等伺服器收到以後，伺服器就會調用資料，把文件用 HTML的格式回傳給你的瀏覽器。

## 請列舉出 5 個 command line 指令並且說明功用

pwd：查看目前所在目錄
ls：查看所有在內檔案和路徑
cd：改變現在的路徑
touch：建立檔案
mv：修改檔案名稱或移動檔案
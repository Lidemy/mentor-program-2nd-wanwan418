## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
	
	- varchar 和 text 都是用來儲存字元及二進位資料的固定及可變長度資料類型。
	- varchar：[ ( n | max ) ] 可變長度的非 Unicode 字串資料。 n 定義字串長度，可以是 1 到 8,000 之間的值。 max 表示儲存體大小上限是 2^31-1 個位元組 (2 GB)。 儲存體大小是輸入資料的實際長度再加上 2 位元組。 varchar 的 ISO 同義字為 charvarying 或 charactervarying。
	- text：在伺服器字碼頁中、最大字串長度為 2^31-1 (2,147,483,647) 的可變長度非 Unicode 資料。 當伺服器字碼頁使用雙位元組字元時，儲存體大小仍是 2,147,483,647 個位元組。 儲存體大小有可能少於 2,147,483,647 個位元組，這會隨著字元字串而不同。

	參考資料：http://www.codedata.com.tw/database/mysql-tutorial-8-storage-engine-datatype/


## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
    - Cookie（複數形態Cookies），又稱為「小甜餅」。類型為「小型文字檔案」，指某些網站為了辨別用戶身分而儲存在用戶端（Client Side）上的資料（通常經過加密）。
    - 收到一個 HTTP 請求時，伺服器可以傳送一個 Set-Cookie 的標頭和回應。Cookie 通常存於瀏覽器中，並隨著請求被放在Cookie HTTP 標頭內，傳給同個伺服器。可以註明 Cookie 的有效或終止時間，超過後 Cookie 將不再發送。此外，也可以限制 Cookie 不傳送到特定的網域或路徑。
    - 簡易 HTTP 請求過程：
    1.Client 發一個 request 給 server，請求某網頁
    2.Server 發 response，Cookie以一種key=value形式的字符串，伺服器需要記錄這個客戶端請求的狀態，因此包一個Set-Cookie欄位。
    3.Client 再次請求，客戶端請求中會包含一個Cookie請求，客戶端會對伺服器響應的Set-Cookie頭信息進行存儲。再次請求時，將會在請求中包含伺服器響應的Cookie信息。


    參考資料：https://zh.wikipedia.org/zh-tw/Cookie
    參考資料：https://kknews.cc/zh-tw/tech/oy3zop.html

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
    - XSS (Cross-site scripting) 跨網站指令碼攻擊）
    - 因為當使用者，可以任意輸入 HTML、JavaScript，並且正常解析執行，攻擊者便可以在留言時，留下惡意的程式，當其他使用者瀏覽這篇留言時，便會執行到惡意的程式。  


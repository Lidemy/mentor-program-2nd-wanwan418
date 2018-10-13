1. 什麼是 DOM？
		
		Document Object Model，用來表示與操作HTML、XML文件內容的基礎API。它提供了文件的結構表述（representation），讓你可以更動其中的內容及可見物。其本質是建立網頁與 Script 或程式語言溝通的橋樑。

		所有網頁設計師可操作及建立文件的屬性、方法及事件都以[物件]來展現（例如，document 就代表「文件本身」這個物件，table 物件則代表 HTML 的表格物件等等）。這些物件可以由當今大多數的瀏覽器以 Script 來取用。

2. 什麼是 Ajax？

		Asynchronous JavaScript and XML，瀏覽器端網頁開發技術，主要用戶端不需要不斷重複更新頁面。傳統的web由用戶填寫表單，送出表單等於向 web server 發出 request，server接收後處理傳來的表單，再送回新的網頁，浪費許多頻寬，每次溝通都需要向 server 發送 request 導致速度較慢。AJAX 可向 server 傳送並取回必須的資料，用戶端採用 javascript 處理 server的回應， web 和 server 的資料大量減少。

3. HTTP method 有哪幾個？有什麼不一樣？
		
		get、post、put、patch、delete。
	  get：


4. `GET` 跟 `POST` 有哪些區別，可以試著舉幾個例子嗎？

		（1）GET提交，請求的資料會附在URL之後（就是把資料放置在HTTP協定頭中），以分割URL和傳輸資料，多個參數用&連接；例如：login.action?name=hyddd&password=idontknow&verify=%E4%BD%A0 %E5%A5%BD。如果資料是英文字母/數位，原樣發送，如果是空格，轉換為+，如果是中文/其他字元，則直接把字串用BASE64加密，得出如：%E4%BD%A0%E5%A5%BD，其中％XX中的XX為該符號以16進制表示的ASCII。

		POST提交：把提交的資料放置在是HTTP包的包體中。上文示例中紅色字體標明的就是實際的傳輸資料，因此，GET提交的資料會在位址欄中顯示出來，而POST提交，位址欄不會改變

		(2)傳輸資料的大小：

		首先聲明：HTTP協定沒有對傳輸的資料大小進行限制，HTTP協定規範也沒有對URL長度進行限制。而在實際開發中存在的限制主要有：
		- GET：特定流覽器和伺服器對URL長度有限制，例如IE對URL長度的限制是2083位元組(2K+35)。對於其他流覽器，如Netscape、FireFox等，理論上沒有長度限制，其限制取決於作業系統的支援。因此對於GET提交時，傳輸資料就會受到URL長度的限制。

		- POST：由於不是通過URL傳值，理論上資料不受限。但實際各個WEB伺服器會規定對post提交資料大小進行限制，Apache、IIS6都有各自的配置。

		(3)安全性：

		- .POST的安全性要比GET的安全性高。注意：這裡所說的安全性和上面GET提到的“安全”不是同個概念。上面“安全”的含義僅僅是不作數據修改，而這裡安全的含義是真正的Security的含義，比如：通過GET提交資料，用戶名和密碼將明文出現在URL上，因為(1)登錄頁面有可能被流覽器緩存(2)其他人查看流覽器的歷史紀錄，那麼別人就可以拿到你的帳號和密碼了，除此之外，使用GET提交資料還可能會造成Cross-site request forgery攻擊

		參考資料：http://jimmy0222.pixnet.net/blog/post/35960095-http-post-get-%E6%9C%AC%E8%B3%AA%E5%8D%80%E5%88%A5%E8%A9%B3%E8%A7%A3-%28%E8%BD%89%E8%BC%89%29

5. 什麼是 RESTful API？
		
		Representational State Transfer，簡稱REST，它是一種網路架構風格，他並不是一種標準。而 RESTful 可以這樣子想像: 美麗 (Beauty) 的事物可以稱為 Beautiful; 設計為 REST 的系統就可以稱為 RESTful。RESTful API 充分地使用了 HTTP protocol (GET/POST/PUT/DELETE)，達到：
		- 以直觀簡潔的資源 URI
    - 並且善用 HTTP Verb
    - 達到對資源的操作
    - 並使用 Web 所接受的資料類型: JSON, XML, YAML 等，最常見的是 JSON



6. JSON 是什麼？

		JSON 是個以純文字為基底去儲存和傳送簡單結構資料，你可以透過特定的格式去儲存任何資料(字串,數字,陣列,物件)，也可以透過物件或陣列來傳送較複雜的資料。一旦建立了您的 JSON 資料，就可以非常簡單的跟其他程式溝通或交換資料，因為 JSON 就只是純文字個格式。

		參考資料：https://blog.wu-boy.com/2011/04/%E4%BD%A0%E4%B8%8D%E5%8F%AF%E4%B8%8D%E7%9F%A5%E7%9A%84-json-%E5%9F%BA%E6%9C%AC%E4%BB%8B%E7%B4%B9/

7. JSONP 是什麼？

		JSON with Padding。其實有些東西是不受同源政策限制的，例如說<script>這個 Tag，我們不是常常引用 CDN 或是 Google Analytics 之類的第三方套件嗎？網址都是其他 Domain 的，但是卻能正常載入。JSONP 就是利用<script>的這個特性來達成跨來源請求的。利用<script>裡面放資料，透過指定好的 function 把資料給帶回去。你只要把第一段的<script>那邊想成是 Server 的回傳值，你就可以理解了。實務上在操作 JSONP 的時候，Server 通常會提供一個callback的參數讓 client 端帶過去。利用 JSONP，也可以存取跨來源的資料。

		參考資料：https://blog.techbridge.cc/2017/05/20/api-ajax-cors-and-jsonp/

8. 要如何存取跨網域的 API？

		區分是否為跨網域是依照網站的 Domain 與 Port 做區分，當兩個網頁執行在相同的 Domain 與 Port 下時就代表的是同網域，而如兩個網頁在不同的 Domain 與 Port 或同 Domain 不同 Port 時就會變成跨網域，所以上方兩個網址就代表了是跨網域的情況，在這種情況下因為安全性問題所以發送 Ajax 要求時將被拒絕，這時就必須透過使用 CORS 或 JSONP 方式存取。

		CORS (Cross-origin resource sharing) 跨來源資源共享，是針對如用戶端透過 Ajax 從 A 網域呼叫 B 網域服務的互動而定義的標準，也屬於 W3C 中推廣的標準之一，簡單的說就是使用 Ajax 跨網域呼叫的一種標準，要使用跨網域的方法時其實還有另一種選擇「JSONP」，JSONP 的作法是一種透過 Server 回傳資料與 Callback 方法名後 Client 再去呼叫 Callback 方法接收其值，相較於 CORS 來說，JSONP 只提供 HTTP GET 動詞可以使用，而 CORS 提供了所有 HTTP 動詞且安全性比較高。

		參考資料：https://dotblogs.com.tw/joysdw12/2013/05/25/web-api-cors
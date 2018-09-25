## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
		- <em> 元素：標記文字斜線。
		- <hr> 元素：一條水平線，可用來當作主題分隔線。
		- <form> 元素：為 HTML 表單，可放置表單元素，例如 input ，fotm 會將資料傳送到 action 設定的目的地。


## 請問什麼是盒模型（box modal）
		box model 用於網頁的版面配置，可以將網頁當作是由一個個 box 堆疊而成，每個 box 代表一個網頁元素，例如：div、span。
		box model 由四個部分組成，分別是 content、padding、border、margin，四個部分加起來才代表 box 的高、寬。
		- content：為 box 的內容，顯示文字、圖片。
		- padding：content 和 border 間的留白區域。
		- border：為 content 加 padding 外的線條，也是 padding 和 margin 間的線條。
		- margin：border外的空間。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？
		 inline, block 跟 inline-block都是box的排列方式，inline 代表行內、block 代表區塊。
		 - block 會佔滿一個橫列，高度與內容等高，高、寬可以用 CSS 調整，新物件會到下一行，div、h1、p 都是屬於 block。
		 - inline 尺寸取決於內容，緊鄰前一個物件，span、em 都是屬於 inline。
		 - inline-block 排列方式以inline的方式呈現，但擁有block的屬性，可以設定寬高、上下外距等屬性。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
		 - static 為 box 排列的預設值，等於沒有設定，block 元素就是一行一個、inline 元素依內容大小可與其他元素並列一行。
		 - relative 以 static 的預設定位來移動。
		 - absolute 有兩種情形，第一種是沒有設定另一種元素的任何 position 設定，就會以視窗的最左上角移動；另一種如果有將另外一個元素 position 設為 relative，會從設定 relative的元素開始移動。
		 - fixed 為固定定位，是以視窗左上角來移動。


資料庫名稱：comments

| 欄位名稱  | 欄位型態  | 說明           |
|--------- |-------- |------          | 
|  id      | integer | 留言 id         |
|  user_id | integer | 使用者 id       |
| content  | text    | 留言內容         |
| parent_id| integer | 子留言/母留言 id  |
|created_at| datetime| 留言時間         |

資料庫名稱：users
| 欄位名稱  | 欄位型態  | 說明           |
|--------- |-------- |------          | 
|  id      | integer | 使用者 id        |
| content  | text    | 留言內容         |
| parent_id| integer | 子留言/母留言 id  |
|created_at| datetime| 留言時間         |
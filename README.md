# 台中旅遊趣

## 1. 專題名稱

### 台中旅遊趣（Taichung Travel）

「台中慢遊趣」是一個以台中市旅遊景點為主題的旅遊資訊網站，透過簡潔直覺的介面，讓使用者可以瀏覽台中景點、查看景點詳細資訊，以及收藏自己感興趣的景點。

![網站首頁](README_images/01_home.png)

---

## 2. 專題簡介

台中市擁有豐富的人文歷史、自然景觀、建築景點與特色美食，因此本專題以「台中旅遊」為主題，設計一個提供景點資訊與收藏功能的旅遊網站。

使用者可以從首頁進入景點列表，依照景點分類與行政區瀏覽景點，點擊景點卡片後可以查看詳細資訊，也可以將喜歡的景點加入「我的景點」，方便日後再次查看。

本專題除了前台網站外，也建立後台景點管理系統，透過 Laravel CRUD 功能管理景點資料，並搭配資料庫保存網站資訊。

### 網站特色

* 台中旅遊景點資訊
* 景點分類與行政區資訊
* 景點詳細介紹
* 我的景點收藏功能
* 後台景點 CRUD 管理
* API 資料處理
* RWD 響應式網頁設計
* Git / GitHub 版本控制

---

## 3. 使用技術

### 前端

* HTML5
* CSS3
* JavaScript
* Bootstrap
* jQuery
* AJAX
* Responsive Web Design（RWD）

### 後端

* PHP
* Laravel
* Laravel Blade
* Laravel Controller
* Laravel Route
* Laravel Eloquent ORM

### 資料庫

* MySQL
* Laravel Migration
* Eloquent ORM

### 開發工具

* Visual Studio Code
* Figma
* Git
* GitHub

### AI 輔助

* AI 輔助程式開發
* AI 輔助程式除錯
* AI 輔助 Laravel / PHP 學習
* AI 輔助 README 與專題文件整理

---

## 4. 系統功能說明

## 4.1 網站首頁

首頁為網站主要入口，提供網站名稱、主視覺圖片、台中旅遊介紹及網站導覽功能，使用者可以從首頁快速進入景點列表。

![網站首頁](README_images/01_home.png)

---

## 4.2 景點列表

景點列表提供台中旅遊景點的瀏覽功能，每個景點以卡片方式呈現，包含景點圖片、名稱、介紹、分類及行政區等資訊。

使用者可以透過景點列表快速瀏覽不同景點，並點擊「前往」按鈕查看景點詳細資訊。

![景點列表](README_images/02_travel_list.png)

---

## 4.3 景點詳細頁

使用者從景點列表點擊景點後，可以進入景點詳細頁面。

詳細頁提供較完整的景點資訊，例如景點名稱、景點介紹、分類、行政區、地址、電話及其他相關資訊，讓使用者可以在前往景點前取得完整資訊。

![景點詳細頁](README_images/03_travel_detail.png)

---

## 4.4 我的景點

使用者可以將感興趣的景點加入「我的景點」，方便將喜歡的景點集中管理。

透過收藏功能，使用者可以快速查看自己收藏的旅遊景點，也可以取消不需要的收藏。

![我的景點](README_images/04_my_favorite.png)

---

## 4.5 後台景點管理

後台管理系統提供景點資料管理功能，管理者可以查看目前資料庫中的景點資料，並進行新增、修改及刪除等操作。

![後台景點列表](README_images/05_admin_list.png)

---

## 4.6 新增景點

管理者可以透過新增景點功能建立新的景點資料，填寫景點名稱、介紹、分類、行政區、地址、電話及相關資訊後，將資料儲存至資料庫。

![新增景點](README_images/06_admin_create.png)

---

## 4.7 編輯景點

管理者可以選擇既有景點進行資料修改，修改完成後將更新後的內容儲存至資料庫。

此功能對應 CRUD 中的 Update 操作。

![編輯景點](README_images/07_admin_edit.png)

---

# 5. CRUD 功能

本專題使用 Laravel 建立景點資料 CRUD 管理功能。

| 操作     | 功能說明   |
| ------ | ------ |
| Create | 新增景點資料 |
| Read   | 查看景點資料 |
| Update | 修改景點資料 |
| Delete | 刪除景點資料 |

透過 CRUD 可以讓管理者直接管理網站中的景點資料，而不需要直接修改程式碼。
![景點管理頁面](README_images/景點管理頁.png)
![新增景點](README_images/新增景點成功.png)
![新增景點結果](README_images/新增景點結果.png)
![刪除景點頁面](README_images/刪除景點頁面.png)
![刪除景點成功](README_images/刪除景點成功.png)
![編輯景點頁面](README_images/編輯景點頁面.png)
![編輯景點內容](README_images/編輯景點內容.png)
![編輯景點成功](README_images/編輯景點成功.png)
![編輯景點結果](README_images/編輯景點結果.png)
![景點查詢成功01](README_images/景點查詢成功01.png)
![景點查詢成功02](README_images/景點查詢成功02.png)


# 6. 資料庫設計

本專題使用資料庫儲存旅遊景點及收藏相關資料。

資料庫主要負責保存：

* 景點基本資料
* 景點分類
* 行政區資訊
* 景點地址
* 景點電話
* 景點圖片
* 收藏資料

Laravel 透過 Migration 建立資料表，並使用 Eloquent ORM 與資料庫進行資料操作。

![資料庫設計](README_images/08_database.png)
![資料庫設計-favorites資料表](README_images/08-1_database_favorites.png)
![資料庫設計-spots資料表](README_images/08-2_database_spots.png)

---

# 7. API 說明

本專題使用 Laravel Route、Controller 與資料庫處理網站資料，提供景點資料及收藏功能所需的資料處理。

| Method | API / Route               | 功能         |
| ------ | ------------------------- | ---------- |
| GET    | `/front/travel_list`      | 取得景點列表     |
| GET    | `/front/travel_list/{id}` | 取得指定景點詳細資料 |
| GET    | `/front/my_favorite`      | 取得收藏景點     |
| POST   | `/front/favorites/store`  | 新增收藏       |
| DELETE | `/front/favorites/{id}`   | 取消收藏       |

API 透過 HTTP Method 區分不同操作，並由 Laravel Controller 負責接收請求及處理資料。

![API 測試](README_images/09_api.png)
![API 測試](README_images/api.png)




---

# 8. AI 功能說明

本專題開發過程中使用 AI 作為程式開發與學習的輔助工具。

AI 協助的項目包含：

1. Laravel 專案架構與 CRUD 開發
2. PHP 與 Laravel 語法學習
3. Blade Template 程式碼撰寫與整理
4. Bootstrap 與 RWD 版面調整
5. JavaScript、jQuery 及 AJAX 程式除錯
6. Controller、Model、Route 與 Eloquent 使用方式說明
7. Git / GitHub 操作協助
8. 程式錯誤分析與除錯
9. README 文件內容整理
10. 專題開發流程與功能規劃

AI 主要作為開發輔助工具，實際程式碼由開發者進行修改、測試及整合。

![AI 使用紀錄](README_images/10_ai.png)
![AI景點介紹01](README_images/AI景點介紹01.png)
![AI景點介紹01](README_images/AI景點介紹02.png)
![AI景點副標題](README_images/AI景點副標題.png)


---

# 9. RWD 響應式設計

本專題採用 Responsive Web Design（RWD）設計，使網站能夠適應不同尺寸的裝置。

開發過程中針對桌面電腦、平板及手機尺寸進行測試，並調整導覽列、圖片、文字、按鈕及內容區塊的排列方式。

在手機尺寸 575px 下，網站仍能正常顯示，且主要內容沒有產生水平溢出。

首頁 RWD 測試結果可參考：

![首頁 RWD-375px](README_images/14-1_rwd-375px.png) 
![首頁 RWD-768px](README_images/14-2_rwd-768px.png) 
![首頁 RWD-1200px](README_images/14-3_rwd-1200px.png) 


---

# 10. 測試結果

本專題於開發完成後進行功能與介面測試，以下列出兩項測試結果。

## 測試一：景點收藏功能

### 測試目的

確認使用者是否可以正常收藏及取消收藏景點。

### 測試步驟

1. 進入景點列表。
2. 選擇一個景點。
3. 將景點加入收藏。
4. 進入「我的景點」。
5. 確認收藏的景點是否正常顯示。
6. 取消收藏。
7. 確認景點是否從收藏列表移除。

### 測試結果

**通過。**

收藏景點可以正常新增至「我的景點」，取消收藏後也可以正常移除。

![測試結果一](README_images/11_test_01.png)

---

## 測試二：RWD 響應式設計

### 測試目的

確認網站在不同螢幕尺寸下是否能正常顯示。

### 測試尺寸

| 裝置類型    |   測試寬度 | 結果 |
| ------- | -----: | -- |
| Desktop | 1920px | 通過 |
| Tablet  |  768px | 通過 |
| Mobile  |  575px | 通過 |

### 測試項目

* 導覽列
* Logo
* Hero 主視覺
* 文字內容
* 按鈕
* 景點內容
* Footer
* 水平溢出

### 測試結果

**通過。**

網站在不同尺寸下皆可以正常顯示，手機版 575px 畫面沒有產生水平溢出。

![首頁 RWD-375px](README_images/14-1_rwd-375px.png) 
![首頁 RWD-768px](README_images/14-2_rwd-768px.png) 
![首頁 RWD-1200px](README_images/14-3_rwd-1200px.png) 

---

# 11. Git / GitHub

本專題使用 Git 進行版本控制，並使用 GitHub 建立 Repository 管理專案程式碼。

Git 可記錄專案開發過程中的程式碼變更，方便進行版本管理及備份。

主要使用的 Git 操作包含：

```bash
git init
git add .
git commit
git status
git push
```

GitHub Repository 用於保存專案程式碼，方便進行專案管理與成果展示。

---

# 12. 開發者資訊

| 項目   | 資訊                     |
| ---- | ---------------------- |
| 專題名稱 | 台中慢遊趣                  |
| 開發者  | Neil Hsu   22號許承濬            |
| 開發框架 | Laravel                |
| 程式語言 | PHP / JavaScript       |
| 前端技術 | HTML / CSS / Bootstrap |
| 資料庫  | MySQL                  |
| 版本控制 | Git / GitHub           |

---

# 13. 專案截圖

本專題主要成果截圖如下：

```text
README_images/
├── 01_home.png
├── 02_travel_list.png
├── 03_travel_detail.png
├── 04_my_favorite.png
├── 05_admin_list.png
├── 06_admin_create.png
├── 07_admin_edit.png
├── 08_database.png
├── 09_api.png
├── 10_ai.png
├── 11_test_01.png
├── 12_test_02.png
├── 14-1_rwd-375px.png
├── 14-2_rwd-768px.png
├── 14-3_rwd-1200px.png
├── AI景點介紹01.png
├── AI景點介紹02.png
├── AI景點副標題.png
└── api.png

```

以上截圖分別展示網站首頁、景點瀏覽、景點詳細資訊、收藏功能、後台 CRUD、資料庫、API、AI 輔助開發以及測試結果。

# Note

## 20. Creating Laravel Project

- composer 會去 package repository 中取得指定的 package 叫做 laravel/laravel，然後開始依據 composer.json 安裝依賴套件。
- name space 遵循 PSR 4
- 一般來說 在 php 中要去包含其它 php 檔案的 code 必須手動載入 ，使用 require 或者 include
- 沒有手動載入 可以加入 namespaces，然後使用 use statement 去自動載入來自期其它，namespace 的一些 code 或者 class。
- namespace 是可以被編輯的，在 composer.json 中 的 autoload 區塊。
- boostrap 裡面的東西鮮少會去異動，尤其在初學階段。 這邊多存放快取以及最佳化的東西來讓整個服務加快，所以這邊都是自動產出的東西沒有手動加的。
- index.php 是整個應用的進入點
- composer.json 裡面的 require 表示是必要的套件，而 require-dev 則是在測試環境中才會有的套件，比如 unit test 所需的 phpunit， 因為你不需要再正式環境 run testing
- 在 composer.json 中 scripts 包含很多特規的 scripts，其中一個是 php artisan key generate，產生 secure key。
- `php artisan` 可以查看 artisan 指令

## 21. All About Routing

- `routing` 引導使用者請求的過程。
- `php artisan route:list`，列出已有的 route。
- 當專案變大的時候 利用 route name 來做 redirect 將會比較方便。
- `Route:: fallback()`，當找不到任何 route 的時候。

## 22. Blade Templates

- 使用 `View()`  並且攜帶參數的時候應要避免包含 HTML tag 除了無法作用之外，這裡是要避免有人利用 HTML tag 進行 XSS，比如說使用 `<script>`   
`所謂的跨站腳本攻擊（Cross-Site Scripting，簡稱 XSS）是一種網站安全漏洞，它允許攻擊者將惡意腳本注入到其他用戶會查看的正常網頁中。XSS 攻擊通常發生在網站允許用戶輸入數據，但未對這些數據進行充分的檢查或清理時。當其他用戶查看受影響的網頁時，這些惡意腳本會在他們的瀏覽器中執行。`

## 23. Blade Directives

- 關於 `name()`，prifix 代表所圍繞的資源，後面則是操作。

## 24. Layouts Using Template Inheritance

- `section()` 如果不夾帶 html 的話可以只帶參數。

## 26. Connecting to the Database From Laravel

- 在 `.env` 修改 db conection 相關設定 ，之後到該專案下面使用   `php artisan migrate` 來測試連線，如果沒有發現指定的資料庫會詢問要不要新增。

## 27. Models and Migrations

- to generate a model and migration file same time you can use `-m` option `php artisan make:model Task -m`。
- run  `php artisan migrate:rollback`  to rollback the last migration.
- run `php artisan migrate` to migrate.

## 28. Model Factory and Seeder
- run `php artisan make:factory TaskFactory --model=Task`
- Using the faker object (`fake()`), you can use `sentence` or `sentence()`,  `sentence` is the default, if you want to custom can use `sentence()`
- if you want to use the factory function, you must `use HasFactory` in the model. the `HasFactoryuse` statement is default when you use the artisan command to generate the model.
- run `php artisan db:seed` to generate records.
- the db:seed command is only for adding data.   
so if you want to keep the data in the correct amount you can use the command as follows: `php artisan migrate:refresh --seed`   
it will recreate the database and then seed, so this command is very dangerous. make sure you run this command in the development environment. Never on the production, it will clear all your data.
- see the steps to re-seeding:
  - roll back migrations. 
  - running migrations. 
  - seeding database.
- in the factory, you can add some variants, for example, lower price, higher price, incomplete, etc.  here the example is unverified, it will make the `email_verified_at` column null.
- in line 16, it will create 2 records with unverified.
- you can use this function to design different cases.

## 30. Forms and CSRF Protection
- about the csrf see: https://zh.wikipedia.org/zh-tw/%E8%B7%A8%E7%AB%99%E8%AF%B7%E6%B1%82%E4%BC%AA%E9%80%A0
- `_token` is csrf token

## 31. Validating and Storing Data
- 使用 validate 來驗證  request 的資料，如果正確的話 $data 將會有資料，如果沒有的話 將會集合所有錯誤到 session ，這些存在 client side 的 session 可以用來後續的處理，比如：可以在表單旁顯示這些錯誤，ＸＸ欄位為必填 等等。

## 32. Sessions, Errors & Flash Messages
- 不建議將 session 存在 file 因為這樣不便於像其他 server 分享 session ，如果專案較大的話此問題就會顯現。
- 當使用 redirect 的時候 可以使用 with($key, $value) 來加上想要的 session 變數，如果在網頁上掉用到這個變數只會出現一次，重整後就會消失。然後在 blade 還有 laravel framwork 中都可以使用 session() 的方法。
- session() 中的 has() 可以用來確認是不是含有某個 key。

## 34. Keeping Old Values in the Form
- blade provides a method `old()` to keep the old value. 機敏資料不宜使用此方法

## 35. Reusability (Route Model Binding Form Requests, Mass Assignment)
- 依賴注入 指定的 model class 可以把 route 上對應的變數名稱作為該 tabel 的 primiry key 來搜尋，取代了 `findOrFail()`

## 37. Reusing Blade Code - Subviews
- 不只有 form 可以這樣拉出來寫，只要是重複度高的 都可以這樣做

## 39. Toggling Task State
- 當需要 ID 的時候 Laravel 可以自動解析 model 取得 主鍵， 所以可以不用指定 ->id 可以直接傳遞整個 model.
- 使用 `->back()`  導轉到前一頁
- 可以在 model 中加上想要使用的方法。

## 40. Adding Styling with Tailwind CSS
- https://tailwindcss.com/docs/installation/play-cdn
- `<script src="https://cdn.tailwindcss.com"></script>`
- 即使只有引入 tailwind 不做任何事 laravel 也會預設使用樣式
- https://zh.wikipedia.org/zh-tw/%E5%85%A7%E5%AE%B9%E5%82%B3%E9%81%9E%E7%B6%B2%E8%B7%AF
- https://alpinejs.dev/   
`<script src="//unpkg.com/alpinejs" defer></script>`




# PHP Slim Framework

build by slim framework

- web root: src/public/
- vendor: slim/slim-skeleton

USE slim framework

## src/
>Dependency	依賴的模組  
>Middleware	中間層，可在REQUEST前與後增加程式  
>Model		處理DB  
>Route		處理路由  
>View		擺放顯示模板  
>public		專案網站根目錄  
>setup.php	Slim設定擋  


## setting db
path: src/setup.php

db -> test
- engine
- host
- dbName
- user
- passwd

## Testing
`
php -S localhost:8080 -t {your public directory} {your index.php place}
`

Ex.
`
php -S localhost:8080 -t public public/index.php
`

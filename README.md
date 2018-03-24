# 常用验证 组件
## 安装组件
使用 composer 命令进行安装或下载源代码使用。
>composer require aweitian/sql-auto-gen
>

```
$gen = new \Aw\Sql\Mysql\gen();
$gen->setConnection(new Aw\Db\Connection\Mysql (array(
    'host' => '127.0.0.1',
    'port' => '3306',
    'user' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'database' => 'hdf'
)));
$gen->setTableName('data_article');
```
### select ($gen->select())
SELECT * FROM data_article
### insert ($gen->insert())
INSERT INTO data_article (kw,desc,thumb,title,content,date) 
VALUES (:kw,:desc,:thumb,:title,:content,:date)
### delete ($gen->remove())
DELETE FROM data_article WHERE sid = :sid
### update ($gen->update())
UPDATE data_article SET kw=:kw,desc=:desc,thumb=:thumb,
title=:title,content=:content,date=:date 
WHERE sid = :sid

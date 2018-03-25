<?php

class BaseTest extends PHPUnit_Framework_TestCase
{
    public function testCommon()
    {
        $gen = new \Aw\Sql\Mysql\Gen();
        $gen->setConnection(new Aw\Db\Connection\Mysql (array(
            'host' => '127.0.0.1',
            'port' => '3306',
            'user' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'database' => 'hdf'
        )));
        $gen->setTableName('data_article');
        $this->assertEquals("SELECT * FROM data_article", $gen->select());
        $this->assertEquals("INSERT INTO data_article (kw,desc,thumb,title,content,date) VALUES (:kw,:desc,:thumb,:title,:content,:date)", $gen->insert());
        $this->assertEquals("DELETE FROM data_article WHERE sid = :sid", $gen->remove());
        $this->assertEquals("UPDATE data_article SET kw=:kw,desc=:desc,thumb=:thumb,title=:title,content=:content,date=:date WHERE sid = :sid", $gen->update());
    }

    public function testWhere()
    {
        $gen = new \Aw\Sql\Mysql\Gen();
        $gen->setConnection(new Aw\Db\Connection\Mysql (array(
            'host' => '127.0.0.1',
            'port' => '3306',
            'user' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'database' => 'hdf'
        )));
        $gen->setTableName('data_article');
        $this->assertEquals("SELECT * FROM data_article WHERE thumb = :thumb AND title = :title", $gen->select('thumb,title'));
        $this->assertEquals("SELECT kw,desc FROM data_article WHERE thumb = :thumb AND title = :title", $gen->select('thumb,title','kw,desc'));
        $this->assertEquals("INSERT INTO data_article (kw,desc,thumb,title,content,date) VALUES (:kw,:desc,:thumb,:title,:content,:date)", $gen->insert());
        $this->assertEquals("DELETE FROM data_article WHERE sid = :sid", $gen->remove());
        $this->assertEquals("UPDATE data_article SET kw=:kw,desc=:desc,thumb=:thumb,title=:title,content=:content,date=:date WHERE sid = :sid", $gen->update());
    }
}


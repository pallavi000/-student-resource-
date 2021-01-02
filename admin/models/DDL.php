<?php

class DDL extends MainModel
{

    public function __construct()
    {
        parent::__construct();
        $this->tble_admin();
        $this->tble_nav();
        $this->tble_tutorial();
        $this->tble_meta_tag();
        $this->tble_advertise();
        $this->tble_article();
        $this->tble_gallery();
        $this->tble_subscriber();
        $this->tble_comment();
        $this->tble_category();
        $this->tble_slideshow();
        $this->tble_role();
        $this->tble_picture();
        $this->tble_topics();
        $this->tble_topic_type();

    }

    private function tble_admin()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(100) NOT NULL,
  `user_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(250) NOT NULL,
  `mobile_number` VARCHAR(30) NOT NULL,
  `address` TEXT NOT NULL,
  `last_login_ip` VARCHAR(50) NOT NULL,
  `last_login_date` DATETIME NOT NULL,
  `secret_key` VARCHAR(250) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);
    }

    private function tble_nav()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `url` VARCHAR(250) NOT NULL,
  `seo_title` VARCHAR(200) NOT NULL,
  `seo_description` VARCHAR(200) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `url` (`url` ASC))
";
        $this->BySqlStatement($sql);
    }

    private function tble_tutorial()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `category_id` INT(11) NOT NULL,
  `tutorial_self_id` INT(11) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `url` VARCHAR(100) NOT NULL,
  `hits` INT(11) NOT NULL DEFAULT '0',
  `seo_title` VARCHAR(100) NOT NULL,
  `seo_description` VARCHAR(200) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);
    }

    private function tble_meta_tag()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `meta_title` TEXT NOT NULL,
  `meta_description` TEXT NOT NULL,
  `meta_keyword` TEXT NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '0',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);
    }

    private function tble_advertise()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `alignment` VARCHAR(7) NOT NULL,
  `belongs_page` VARCHAR(20) NOT NULL,
  `style` TEXT NOT NULL,
  `url` VARCHAR(100) NOT NULL,
  `code` TEXT NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);
    }

    private function tble_article()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `topics_id` INT(11) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `url` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  `summary` TEXT NOT NULL,
  `details` TEXT NOT NULL,
  `hits` INT(11) NOT NULL DEFAULT '0',
  `approved` TINYINT(1) NOT NULL DEFAULT '1',
  `status` TINYINT(1) NOT NULL DEFAULT '0',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seo_title` VARCHAR(100) NOT NULL,
  `seo_description` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);
    }

    private function tble_gallery()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `location` VARCHAR(200) NOT NULL,
  `date` DATE NOT NULL,
  `url` VARCHAR(200) NOT NULL,
  `seo_title` VARCHAR(200) NOT NULL,
  `seo_description` VARCHAR(200) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }

    private function tble_subscriber()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(30) NOT NULL,
  `post_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` TINYINT(1) NULL DEFAULT '0',
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }

    private function tble_comment()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `topic_id` INT(11) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `via` VARCHAR(20) NOT NULL,
  `comment` TEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }

    private function tble_category()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `category_self_id` INT(10) NOT NULL,
  `url` VARCHAR(100) NOT NULL,
  `seo_title` VARCHAR(100) NOT NULL,
  `seo_description` VARCHAR(200) NOT NULL,
  `hits` INT(11) NOT NULL DEFAULT '0',
  `status` TINYINT(1) NOT NULL,
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }

    private function tble_slideshow()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `caption` VARCHAR(30) NOT NULL,
  `purpose` VARCHAR(10) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  `serial` INT(11) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }

    private function tble_role()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `role` VARCHAR(100) NOT NULL,
  `date` DATETIME NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }

    private function tble_picture()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` INT(11) NOT NULL DEFAULT '0',
  `image` VARCHAR(100) NOT NULL,
  `caption` VARCHAR(30) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }

    private function tble_topics()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `category_id` INT(11) NOT NULL,
  `tutorials_id` INT(11) NOT NULL,
  `topic_type_id` INT(10) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `url` VARCHAR(100) NOT NULL,
  `seo_title` VARCHAR(100) NOT NULL,
  `seo_description` VARCHAR(200) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hits` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }

    private function tble_topic_type()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . __FUNCTION__ . " (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(100) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
";
        $this->BySqlStatement($sql);

    }
}
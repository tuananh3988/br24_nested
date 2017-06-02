<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseModel
 *
 * @author tuana
 */
class BaseModel {
    public $db;
    public $config;
            
    function __construct($config) {
        $this->config = $config;
        $db = $config['db'];
        $this->db = new PDO("mysql:host={$db['host']};dbname={$db['db_name']};charset=utf8mb4", $db['username'], $db['password']);
    }
}

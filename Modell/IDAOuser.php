<?php

interface IDAOuser{


public function getAllProduct($table) ;

function getStatus($table, $field, $value);

function insertTableEntry($table, $data = []);

function deleteTableEntry($table, $clause = [], $operator = []);

function isUse($table, $field, $value);
    
function updateTableEntry($table, $data = [], $clause = [], $operator = []);

function updateUser($table,$active,$username);

function countUser($table,$password,$username);
   
    
}













?>
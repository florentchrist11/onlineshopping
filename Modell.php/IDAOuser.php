<?php

interface IDAOuser{


public function getAllProduct($table) ;

function insertTableEntry($table, $data = []);

function deleteTableEntry($table, $clause = [], $operator = []);

function isUse($table, $field, $value);
    
function updateTableEntry($table, $data = [], $clause = [], $operator = []);
   
    
}













?>
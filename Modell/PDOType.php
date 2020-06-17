<?php
if (!function_exists("getPDOtype")) {
    function getPDOtype($value)
    {
        switch (true) {
            case is_bool($value):
                $dataType = PDO::PARAM_BOOL;
                break;
            case is_int($value):
                $dataType = PDO::PARAM_INT;
                break;
            case is_null($value):
                $dataType = PDO::PARAM_NULL;
                break;
            default:
                $dataType = PDO::PARAM_STR;
        }
        return $dataType;
    }
}
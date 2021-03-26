<?php


namespace App\Imports;


class ImportHelpers
{

    public static function exists($row,$uniqueField, $fieldInCsv, $model){
        $genericModel = $model::where($uniqueField, $row[$fieldInCsv])->first();
        return $genericModel;
    }

    public static function checkFieldNotNull($val){
        return ($val != null) ? $val : "";
    }

}

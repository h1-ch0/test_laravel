<?php

namespace App\Models;

class TestLists_v01 {
    public static function getAll() {
        return [
            [ "idx" => 1,
            "subject" => 'first context',
            "contents" => 'main body'
            ],
            [ "idx" => 2,
            "subject" => 'second context',
            "contents" => 'main body'
            ]
        ];
    }
    public static function getOnetest($idx) {
        return self::getAll()[$idx];
    }
    public static function getOne($idx) {
        $lists = self::getAll() ;
        foreach ($lists as $row) {
            if ($row['idx'] == $idx) {
                return $row;
           }
        }
    }
}
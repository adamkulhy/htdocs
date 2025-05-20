<?php

class Uvod
{
    public function vratZanry() {
        $sql = "
            SELECT *
            FROM zanry
        ";
        var_dump(Db::dotazVsechny($sql));
        return Db::dotazVsechny($sql);
    }
}
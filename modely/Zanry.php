<?php

class Zanry
{
    public function vratZanry() {
        $sql = "
            SELECT *
            FROM zanry
        ";
        return Db::dotazVsechny($sql);
    }
}
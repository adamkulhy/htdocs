<?php

class Autori
{
    public function vratAutory() {

        $sql = "
            SELECT *
            FROM autori
        ";
        return Db::dotazVsechny($sql);
    }
}
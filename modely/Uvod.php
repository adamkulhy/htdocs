<?php

class Uvod
{
    public function vratZanry() {
        $sql = "
            SELECT *
            FROM zanry
        ";
        return Db::dotazVsechny($sql);
    }

    public function vratKnihy() {
        $zanry = $_GET['zanry'] ?? [];
        if ($zanry) {
            $placeholders = implode(',', array_fill(0, count($zanry), '?'));
            $sql = "
            SELECT k.*
            FROM knihy k JOIN kniha_zanr kz ON k.id_knih = kz.id_knih
            WHERE kz.id_knih IN ($placeholders)
            GROUP BY k.id_knih
        ";
        return Db::dotazVsechny($sql, [...$zanry]);
        }
        else {
            $sql = "
            SELECT *
            FROM knihy
        ";
        return Db::dotazVsechny($sql);
        }
    }

    public function vratAutory() {

            $sql = "
            SELECT *
            FROM autori
        ";
            return Db::dotazVsechny($sql);
    }


}
<?php

class Knihy
{
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

    public function pridatKnihu(): void
    {
        Db::vloz("knihy", [$_POST["jmeno_knih"], $_POST["id_aut"], $_POST["obsah_knih"]]);
        $idKnihy = Db::idPoslednihoVlozeneho();
        foreach ($_POST["zanr"] as $zanr){
            Db::vloz("kniha_zanr", [$idKnihy, $zanr]);
        }

    }
}
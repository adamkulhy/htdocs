<?php

class Kniha
{
    public function vratKnihy() {
        $zanry = $_GET['zanry'] ?? [];
        if ($zanry) {
            $placeholders = implode(',', array_fill(0, count($zanry), '?'));
            $sql = "
            SELECT k.*
            FROM knihy k JOIN kniha_zanr kz ON k.id_knih = kz.id_knih
            WHERE kz.id_zanr IN ($placeholders)
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

    public function pridatKnihu(): int
    {

        Db::vloz("knihy", [
            "jmeno_knih"=>$_POST["jmeno_knih"],
            "id_aut"=> $_POST["id_aut"],
            "obsah_knih"=> $_POST["obsah_knih"]
        ]);
        $idKnihy = Db::idPoslednihoVlozeneho();
        foreach ($_POST["id_zanr"] as $zanr){
            Db::vloz("kniha_zanr", ["id_knih" => $idKnihy, "id_zanr" => $zanr]);
        }
        return $idKnihy;
    }

    public function upravitKnihu(): void
    {
        Db::zmen("knihy","WHERE id_knih = ?", [$_POST['id_knih']], ["jmeno_knih" => $_POST['jmeno_knih'], "id_aut" => $_POST['id_aut'], "obsah_knih" => $_POST['obsah_knih']]);
    }

    public function najitKnihu()
    {
        return Db::dotazJeden("SELECT * FROM knih WHERE id_knih = ?", [$_POST['id_knih']]);
    }

    public function smazatKnihu(): void
    {
        Db::dotazJeden("DELETE FROM knihy WHERE id_knih = ?", [$_POST['id_knih']]);
    }
}
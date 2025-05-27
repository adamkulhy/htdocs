<?php

class Autor
{
    public function vratAutory() {

        $sql = "
            SELECT *
            FROM autori
        ";
        return Db::dotazVsechny($sql);
    }

    public function pridatAutora() {
        Db::vloz("autori", [
            "jmeno_aut" => $_POST['jmeno_aut'],
            "prijmeni_aut" => $_POST['prijmeni_aut']
        ]);
    }
}
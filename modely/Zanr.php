<?php

class Zanr
{
    public function vratZanry() {
        $sql = "
            SELECT *
            FROM zanry
        ";
        return Db::dotazVsechny($sql);
    }

    public function pridatZanr($jmeno, $bg_color): void
    {
        Db::vloz("zanry", [
            "jmeno_zanr" => $jmeno,
            "bg_color" => $bg_color
        ]);
    }

    public function upravitZanr($id, $jmeno, $bg_color): void
    {
        Db::zmen("zanry","WHERE id_zanru = ?", [$id], ["jmeno_zanr" => $jmeno, "bg_color" => $bg_color]);
    }

    public function najitZanr($id)
    {
        return Db::dotazJeden("SELECT * FROM zanry WHERE id_zanr = ?", [$id]);
    }

    public function smazatZanr($id): void
    {
        Db::dotazJeden("DELETE FROM zanry WHERE id_zanr = ?", [$id]);
    }
}
<?php

class KnihaKontroler extends Kontroler
{
    function zpracuj($parametry)
    {
        $this->nactiSpolecnaData();
        $idKnihy = $parametry[0] ?? null;
        $this->data["zanry"] = Db::dotazVsechny("SELECT * FROM zanry z inner join kniha_zanr kz on kz.id_zanr = z.id_zanr WHERE kz.id_knih = ?", [$idKnihy]);
        $kniha = Db::dotazJeden("SELECT * FROM knihy WHERE id_knih = ?", [$idKnihy]);
        $this->data["kniha"] = $kniha;
        $this->pohled = "kniha";
        $komentarModel = new Komentar();
        if (isset($_POST["komentar"])) {
            $komentarModel->pridejKomentar();
        }
    }
}
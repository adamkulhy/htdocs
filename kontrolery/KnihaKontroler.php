<?php

class KnihaKontroler extends Kontroler
{
    function zpracuj($parametry)
    {
        $this->nactiSpolecnaData();
        $idKnihy = $parametry[0] ?? null;
        $zanrModel = new Zanr();
        $knihaModel = new Kniha();
        $this->data["zanry"] = $zanrModel->zanryKnihy($idKnihy);
        $kniha = $knihaModel->najitKnihu($idKnihy);
        $this->data["kniha"] = $kniha;
        $this->pohled = "kniha";
    }
}
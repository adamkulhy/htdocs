<?php
class UvodKontroler extends Kontroler
{
    public function zpracuj($parametry): void
    {
        $this->pohled = "uvod";
        $knihyModel = new Kniha();
        $this->nactiSpolecnaData();
        if (isset($_GET["zanry"])) {
            $this->data["knihy"] = $knihyModel->vratKnihy();
        }

    }




}

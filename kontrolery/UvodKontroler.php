<?php
class UvodKontroler extends Kontroler
{
    public function zpracuj($parametry) {
        $this->pohled = "uvod";
        $uvod = new Uvod();
        $this->data["zanry"] = $uvod->vratZanry();
        if (isset($_GET["zanry"])) {
            $this->data["knihy"] = $uvod->vratKnihy();
            $this->data["autori"] = $uvod->vratAutory();
        }
    }




}

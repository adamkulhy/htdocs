<?php

class PridaniKontroler extends Kontroler
{
    public function zpracuj($parametry) {
        $this->pohled = "pridaniKnihy";
        $this->nactiSpolecnaData();
    }
}
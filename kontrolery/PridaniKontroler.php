<?php

class PridaniKontroler extends Kontroler
{
    public function zpracuj($parametry) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $knihyModel = new Knihy();
            $idknihy = $knihyModel->pridatKnihu();
            if (isset($_FILES['knihaImg']) && $_FILES['knihaImg']['error'] === UPLOAD_ERR_OK) {
                $uploadService = new UploadService();
                try {
                    $_FILES["knihaImg"]["name"] = $idknihy . ".jpg";
                    $uploadService->upload($_FILES["knihaImg"]);
                } catch (Exception $e) {
                }
            } else {
                echo "No file uploaded or error occurred.";
            }
        }
        $this->nactiSpolecnaData();
        $this->pohled = 'pridaniKnihy';
    }
}
<?php

class EditKontroler extends Kontroler
{
    public function zpracuj($parametry) {
        if (isset($_POST['jmeno_knih'])) {
            $knihyModel = new Kniha();
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

        if (isset($_POST['jmeno_zanr'])) {
            $zanryModel = new Zanr();
            $zanryModel->pridatZanr($_POST['jmeno_zanr'], $_POST['bg_color']);
        }

        if (isset($_POST['jmeno_aut'])) {
            $autorModel = new Autor();
            $autorModel->pridatAutora($_POST['jmeno_aut'], $_POST['prijmeni_aut']);
        }
        $this->nactiSpolecnaData();
        $this->pohled = 'edit';
    }
}
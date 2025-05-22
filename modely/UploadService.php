<?php

class UploadService
{
    /**
     * @throws Exception
     */
    public function upload(array $file): void
    {
            $fileTmpPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];

            $uploadFolder = 'uploads/';
            $destPath = $uploadFolder . basename($fileName);

            // Create uploads folder if not exists
            if (!is_dir($uploadFolder)) {
                mkdir($uploadFolder, 0755, true);
            }

            if (!move_uploaded_file($fileTmpPath, $destPath)) {
                echo "Error moving the file.";
            }
    }
}
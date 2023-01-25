<?php
if (!is_dir('uploads')){
    mkdir('uploads', '0755'); // Permissions d'écriture.
}

if (isset($_FILES['file'])){
    $name = $_FILES['file']['tmp_name'];

    $new = $_FILES['file']['name']; // Nom du fichier

    $allowedType = ['image/jpeg', 'text/plain'];
    if (in_array($_FILES["file"]['type'], $allowedType)){ // Check si le type de fichier est correspondant
        $maxSize = 2 * 1024 * 1024;
        if ((int)$_FILES['file']["size"] <= $maxSize){
            $uploads_dir = 'uploads/';
            //move_uploaded_file($name, 'uploads/');
            // move_uploaded_file($name, $uploads_dir);
            move_uploaded_file($name, $uploads_dir);
            echo "Le fichier $new a été téléchargé et déplacé..";
        }
        else{
            echo "Le format ou la taille est incorrect.";
        }
    }
    else{
        echo "Format incorrect";
    }
}
else{
    echo "Aucun fichier existant";
}

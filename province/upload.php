<?php
// Chemin du dossier DAEC sur le serveur
$dossierDAEC = "C:/Users/FUJITSU/Desktop/stage province/DAEC/SEPCP/";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["oldFileName"]) && isset($_POST["newFileName"])) {
    $oldFileName = $_POST["oldFileName"];
    $newFileName = $_POST["newFileName"];

    // Chemin complet des fichiers dans le dossier DAEC
    $oldFilePath = $dossierDAEC . $oldFileName;
    $newFilePath = $dossierDAEC . $newFileName;

    // Vérifier si le fichier précédent existe
    if (file_exists($oldFilePath)) {
        // Récupérer l'extension du fichier précédent
        $oldFileExtension = pathinfo($oldFilePath, PATHINFO_EXTENSION);

        // Vérifier l'extension du nouveau fichier
        $newFileExtension = pathinfo($newFileName, PATHINFO_EXTENSION);

        // Si l'extension du nouveau fichier est vide, utiliser l'extension du fichier précédent
        if (empty($newFileExtension)) {
            $newFileName .= "." . $oldFileExtension;
            $newFilePath .= "." . $oldFileExtension;
        } else {
            // Si l'extension du nouveau fichier n'est pas vide, vérifier si elle est différente de celle du fichier précédent
            if (strtolower($oldFileExtension) !== strtolower($newFileExtension)) {
                // Si les extensions sont différentes, utiliser l'extension du fichier précédent
                $newFileName = preg_replace('/\.[^.]*$/', '', $newFileName);
                $newFileName .= "." . $oldFileExtension;
                $newFilePath = preg_replace('/\.[^.]*$/', '', $newFilePath);
                $newFilePath .= "." . $oldFileExtension;
            }
        }

        // Renommer le fichier en utilisant le nouveau nom saisi avec l'extension correcte
        if (rename($oldFilePath, $newFilePath)) {
            echo "Le fichier a été renommé et enregistré avec succès.";
        } else {
            echo "Une erreur s'est produite lors du renommage et de l'enregistrement du fichier.";
        }
    } else {
        echo "Erreur : Le fichier précédent n'existe pas.";
    }
} else {
    echo "Erreur : Veuillez soumettre un nom de fichier valide.";
}
?>
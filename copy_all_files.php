<?php

// Directoarele din care vrei să copiezi fișierele
$directoare = [
    'src/',
    'templates/',
    'assets',
    'migrations',
];

// Fișierul de destinație
$fisierDestinatie = 'all_files.txt';

// Funcție recursivă pentru a parcurge directoarele și subdirectoarele
function copieContinutFisiere($director, &$output) {
    $fisiere = scandir($director);

    foreach ($fisiere as $fisier) {
        if (in_array($fisier, ['.', '..'])) {
            continue; // Ignoră directoarele curente și părinte
        }

        $caleCompleta = $director . '/' . $fisier;

        if (is_dir($caleCompleta)) {
            // Dacă este director, apelează recursiv funcția
            copieContinutFisiere($caleCompleta, $output);
        } else {
            // Dacă este fișier, copiază conținutul
            $output .= "Cale: $caleCompleta\n";
            $output .= "Nume: $fisier\n";
            $output .= "Continut:\n";
            $output .= file_get_contents($caleCompleta);
            $output .= "\n-------------------------------------\n";
        }
    }
}

// Inițializează output-ul
$output = '';

// Parcurge directoarele specificate
foreach ($directoare as $director) {
    copieContinutFisiere($director, $output);
}

// Scrie output-ul în fișierul de destinație
file_put_contents($fisierDestinatie, $output);

echo "Conținutul fișierelor a fost copiat în '$fisierDestinatie'.\n";

?>
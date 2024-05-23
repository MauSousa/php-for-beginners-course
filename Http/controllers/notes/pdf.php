<?php

use Core\App;
use Core\Database;

require_once BASE_PATH . '/vendor/autoload.php';

$db = App::resolve(Database::class);

$notes = $db->query("select * from notes")->findAll();

$html = '
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>';
foreach ($notes as $note) {
    $html .= '<li>' . htmlspecialchars($note['body']) . '</li>';
}
$html .= '</ul><div>';

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(
    [
        'mode' => 'utf-8',
        'format' => [190, 236],
        'orientation' => 'L'
    ]
);

$mpdf->SetTitle('Notes pdf');

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->OutputHttpInline();

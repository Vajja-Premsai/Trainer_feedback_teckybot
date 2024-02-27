<?php
require 'vendor/autoload.php'; // Include the PhpSpreadsheet autoload file
include_once 'database.php'; // Include your database connection file

// Fetch data from the database
$sql = "SELECT * FROM trainers";
$result = $conn->query($sql);

// Create a new PhpSpreadsheet instance
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add headers to the Excel file
$headers = ['Trainer Name', 'Content', 'Communication', 'Interactive', 'Presentation', 'Recommendation', 'Rating', 'Overall', 'Feedback'];
$columnIndex = 1;
foreach ($headers as $header) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $header);
    $columnIndex++;
}

// Populate the Excel file with data
$row = 2;
while ($row_data = $result->fetch_assoc()) {
    $columnIndex = 1;
    foreach ($row_data as $value) {
        $sheet->setCellValueByColumnAndRow($columnIndex, $row, $value);
        $columnIndex++;
    }
    $row++;
}

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="trainer_data.xlsx"');
header('Cache-Control: max-age=0');

// Save the Excel file to the output
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// Close database connection
$conn->close();
?>

<?php
// Load the HTML file
$html = file_get_contents('table.html'); // Change this to your actual file path

// Create a new DOMDocument
$dom = new DOMDocument();
libxml_use_internal_errors(true); // Prevent warnings from malformed HTML
$dom->loadHTML($html);
libxml_clear_errors();

// Create DOMXPath to query the document
$xpath = new DOMXPath($dom);

// Find the table (assuming there's only one; adjust the XPath if needed)
$table = $xpath->query('//table')->item(0);
if (!$table) {
    die("No table found in the document.\n");
}

// Extract rows from the table
$rows = $table->getElementsByTagName('tr');

$data = [];
foreach ($rows as $row) {
    $cells = $row->getElementsByTagName('td'); // Change to 'th' for headers if needed
    $rowData = [];
    foreach ($cells as $cell) {
        $rowData[] = trim($cell->nodeValue);
    }
    if (!empty($rowData)) {
        $data[] = $rowData;
    }
}

// Save data to CSV
$csvFile = 'output.csv';
$file = fopen($csvFile, 'w');

foreach ($data as $line) {
    fputcsv($file, $line, ",", '"', "\\");
}

fclose($file);

echo "CSV file '$csvFile' has been created successfully.\n";
?>

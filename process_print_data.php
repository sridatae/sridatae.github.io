<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $invoiceNumber = isset($_POST["currentInvoiceNumber"]) ? $_POST["currentInvoiceNumber"] : '';
    $date = isset($_POST["currentatenum"]) ? $_POST["currentatenum"] : '';
    $discountValue = isset($_POST['discountValuefield1']) ? $_POST["discountValuefield1"] : '';
    $totalamount = isset($_POST['totalamount']) ? $_POST["totalamount"] : '';

    // Format the date as needed (adjust this format based on your requirements)
    $formattedDate = date("Y-m-d H:i:s", strtotime($date));

    // Prepare data for CSV
    $data = [
        $invoiceNumber,
        $formattedDate,
        $discountValue,
        $totalamount,
    ];

    // CSV file path
    $csvFilePath = "invoices_discounts.csv";

    // Check if the file exists, if not, create a new file with headers
    if (!file_exists($csvFilePath)) {
        $header = [
            "Invoice Number",
            "Date",
            "discountValue",
            "totalamount",
        ];

        file_put_contents($csvFilePath, implode(",", $header) . PHP_EOL, FILE_APPEND);
    }

    // Append data to the CSV file
    if (file_put_contents($csvFilePath, implode(",", $data) . PHP_EOL, FILE_APPEND) === false) {
        // Log an error message or return an appropriate response to the client
        die("Error writing to CSV file");
    }

    // Optionally, you can return a success message or redirect to another page
    // echo "Data added to CSV successfully";
    // exit();
}
?>

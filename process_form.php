<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $invoiceNumber = isset($_POST["invoice-number"]) ? $_POST["invoice-number"] : '';
    $date = isset($_POST["current-date"]) ? $_POST["current-date"] : '';
    $customerName = isset($_POST["customer-name"]) ? $_POST["customer-name"] : '';
    $locality = isset($_POST["locality"]) ? $_POST["locality"] : '';
    $product = isset($_POST["product"]) ? $_POST["product"] : '';
    $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : '';
    $price = isset($_POST["price"]) ? $_POST["price"] : '';
    $formerCustomer = isset($_POST["former-customer"]) ? $_POST["former-customer"] : '';
    $salesPerson = isset($_POST["sales-person"]) ? $_POST["sales-person"] : '';
    $paymentMethod = isset($_POST["payment-method"]) ? $_POST["payment-method"] : '';
    $formattedTotal = isset($_POST['formattedTotal']) ? $_POST["formattedTotal"] : '';
    // $discountValue = isset($_POST['discountValuefield']) ? $_POST["discountValuefield"] : '';

    // Format the date as needed (assuming it's in the format YYYY-MM-DD HH:mm:ss)
    $formattedDate = date("Y-m-d H:i:s", strtotime($date));

    // Prepare data for CSV
    $data = [
        $invoiceNumber,
        $formattedDate, // Use the formatted date
        $customerName,
        $locality,
        $product,
        $quantity,
        $price,
        $formerCustomer,
        $salesPerson,
        $paymentMethod,
        $formattedTotal,
        // $discountValue,
    ];

    // CSV file path
    $csvFilePath = "invoices.csv";

    // Check if the file exists, if not, create a new file with headers
    if (!file_exists($csvFilePath)) {
        $header = [
            "Invoice Number",
            "Date",
            "Customer Name",
            "Locality",
            "Product",
            "Quantity",
            "Price",
            "Former Customer",
            "Salesperson",
            "Payment Method",
            "Subtotal",
            // "discountValue",
        ];

        file_put_contents($csvFilePath, implode(",", $header) . PHP_EOL, FILE_APPEND);
    }

    // Append data to the CSV file
    if (file_put_contents($csvFilePath, implode(",", $data) . PHP_EOL, FILE_APPEND) === false) {
        die("Error writing to CSV file");
    }

    // Optionally, you can redirect to another page
    // header("Location: another_page.html");
    // exit();
    // Note: Make sure there is no content output before the header is set.

    // You can also stay on the same page without any output
    exit();
}
?>

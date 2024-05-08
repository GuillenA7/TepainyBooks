<?php

require 'config/config.php';

if (!isset($_SESSION['user_cliente'])) {
    $msg = "No se ha iniciado sesión";
    header("refresh:1; url=login.php");
    echo '<div>' . $msg . '</div>';
    echo '<p>Serás redirigido al log in en 5 segundos.</p>';
    // header("Location: products.php");
    exit;
}

$id = $_SESSION['user_cliente'];
$stmt = $con->prepare("SELECT * FROM clientes WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$rUsr = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['email'] = $rUsr['email'];

require('fpdf/fpdf.php');

// Create instance of FPDF
$pdf = new FPDF('P', 'mm', 'A4');

// Add a page
$pdf->AddPage();

// Set font for the title
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'RECIBO', 0, 1, 'C');

// Set font for the rest of the content
$pdf->SetFont('Arial', '', 12);

// General data
$pdf->Cell(0, 10, 'DE: TepainyBooks', 0, 1, 'L');
$pdf->Cell(0, 10, 'Fecha: ' . date("d-m-Y"), 0, 1, 'L');
$pdf->Cell(0, 10, 'Telefono: 3741484000', 0, 1, 'L');
$pdf->Cell(0, 10, 'Correo: tepainybooks@gmail.com', 0, 1, 'L');

// Buyer's information
$pdf->Cell(0, 10, 'Para: ' . $rUsr['nombres'] . ' ' . $rUsr['apellidos'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Email: ' . $_SESSION['email'], 0, 1, 'L');

// Products table header
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 10, 'Producto', 1, 0, 'C');
$pdf->Cell(20, 10, 'Precio', 1, 0, 'C');
$pdf->Cell(20, 10, 'Cantidad', 1, 0, 'C');
$pdf->Cell(25, 10, 'Subtotal', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);

// Initialize total
$total = 0;

// Check if the cart is defined
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito']['productos'] as $id => $producto) {
        $pdf->Cell(40, 10, $producto['nombre'], 1, 0, 'L');
        $pdf->Cell(20, 10, '$' . $producto['precio'], 1, 0, 'L');
        $pdf->Cell(20, 10, $producto['cantidad'], 1, 0, 'L');

        $iva = $producto['subtotal'] * 0.16;

        $pdf->Cell(25, 10, '$' . $producto['subtotal'], 1, 1, 'L');

        $total += $producto['subtotal'];
    }

    $sub = $total;

    $pdf->Cell(30, 10, 'TOTAL:', 0, 0, 'L');
    $pdf->Cell(0, 10, '$' . $total, 0, 1, 'L');

    $pdf->Cell(30, 10, 'SUBTOTAL:', 0, 0, 'L');
    $pdf->Cell(0, 10, '$' . $sub, 0, 1, 'L');
} else {
    $pdf->Cell(0, 10, 'El carrito se encuentra vacio en estos momentos', 0, 1);
}

// Footer
$pdf->Cell(0, 10, 'GRACIAS POR SU COMPRA', 0, 1, 'C');

// Output the PDF
$title = 'resumen de compra de ' . $rUsr['nombres'] . " " . Date("F_j_Y");
$pdf->Output('F', $title . ".pdf");

// Email configuration
$to = $_SESSION['email'];
$subject = $title;
$msg = 'Se adjuntan los detalles de su compra en Grubi';
$file = $title . ".pdf";
$attachment = chunk_split(base64_encode(file_get_contents($file)));
$boundary = md5(date('r', time()));

$headers = "From: TB \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "\r\n" . chunk_split(base64_encode($msg)) . "\r\n";

$body .= "--$boundary\r\n";
$body .= "Content-Type: application/pdf; name=\"$file\"\r\n";
$body .= "Content-Disposition: attachment; filename=\"$file\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "\r\n" . $attachment . "\r\n";
$body .= "--$boundary--";

if (mail($to, $subject, $body, $headers)) {
    header("Location: ../index.php");
    $_SESSION['carrito'] = [];
} else {
    echo "Email sending failed.";
}

?>
<?php
// Ensure the form was submitted with a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the template file name and user's name from the form
    $templateName = $_POST['temp'];
    $userName = $_POST['str_1'];
    
    // Define the path to the images directory
    $imagePath = 'images/';
    $fullTemplatePath = $imagePath . $templateName;

    // Check if the template image file exists
    if (file_exists($fullTemplatePath)) {
        // Load the template image
        $image = imagecreatefromjpeg($fullTemplatePath);
        
        if ($image) {
            // Set the font and color for the text
            $font = 'NotoKufiArabic-Regular.ttf'; // You'll need to upload a font file
            $color = imagecolorallocate($image, 0, 0, 0); // Black color (RGB: 0, 0, 0)
            
            // Set font size and position for the text
            $fontSize = 20; // Adjust as needed
            $xPosition = 120; // Adjust based on your template
            $yPosition = 380; // Adjust based on your template

            // Add the user's name to the image
            imagettftext($image, $fontSize, 0, $xPosition, $yPosition, $color, $font, $userName);
            
            // Set HTTP headers to force a file download
            header('Content-Description: File Transfer');
            header('Content-Type: image/jpeg');
            header('Content-Disposition: attachment; filename="ID_Card.jpg"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            
            // Output the final image
            imagejpeg($image);
            
            // Free up memory by destroying the image resource
            imagedestroy($image);
        } else {
            echo "Error: Could not load the image template.";
        }
    } else {
        echo "Error: Template file not found.";
    }
} else {
    // Redirect or show an error if the request is not a POST
    echo "Access Denied: This page is for form submissions only.";
}
?>

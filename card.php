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
         <?php
// Ensure the form was submitted with a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. GET THE TEMPLATE AND USERNAME
    $templateName = $_POST['temp'];
    $userName = $_POST['str_1'];

    // 2. PASTE THE CODE BELOW THIS LINE
    // Adjust coordinates based on the selected template
    if ($templateName === 'temp1.jpg') {
        $xPosition = 120;
        $yPosition = 380;
    } elseif ($templateName === 'temp2.jpg') {
        $xPosition = 150;
        $yPosition = 400;
    } elseif ($templateName === 'temp3.jpg') {
        $xPosition = 100;
        $yPosition = 350;
    } elseif ($templateName === 'temp4.jpg') {
        $xPosition = 180;
        $yPosition = 420;
    } else {
        // Fallback coordinates if no matching template is found
        $xPosition = 120;
        $yPosition = 380;
    }
    
    // ... rest of your code
}
?>

            // Add the user's name to the image
            imagettftext($image, 20, 0, $xPosition, $yPosition, $color, $font, $userName);

            // ... rest of the code for headers and output

        } else {
            echo "Error: Could not load the image template.";
        }
    } else {
        echo "Error: Template file not found.";
    }
} else {
    echo "Access Denied: This page is for form submissions only.";
}
?>

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

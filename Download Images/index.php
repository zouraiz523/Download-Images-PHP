<?php
// if download button clicked
if (isset($_POST['downloadBtn'])) {
    // getting the user img url from input field
    $imgURL = $_POST['file']; // storing in variable
    $regPattern = '/\.(jpe?g|png|gif|bmp)$/i'; // pattern to validate img extension

    if (preg_match($regPattern, $imgURL)) { // if pattern matched to user img url
        $initCURL = curl_init($imgURL); // initializing curl
        curl_setopt($initCURL, CURLOPT_RETURNTRANSFER, true);
        $downloadImgLink = curl_exec($initCURL); // executing curl
        curl_close($initCURL); // closing curl

        // now we convert the base 64 format to jpg to download
        header('Content-type: image/jpg'); // in which extension you want to save img
        header('Content-Disposition: attachment; filename="image.jpg"'); // in which name you want to save img
        echo $downloadImgLink;
        exit(); // terminate the script after downloading the image
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="wrapper">
        <div class="preview-box">
            <div class="cancel-icon"><i class="fas fa-times"></i></div>
            <div class="img-preview"></div>
            <div class="content">
                <div class="img-icon"><i class="far fa-image"></i></div>
                <div class="text">Paste the image URL below, <br/>to see a preview or download!</div>
            </div>
        </div>
        <form action="index.php" method="POST" class="input-data">
            <input id="field" type="text" name="file" placeholder="Paste the image URL to download..." autocomplete="off">
            <input id="button" name="downloadBtn" type="submit" value="Download">
        </form>
    </div>

    <script src="script.js"></script>
    
</body>
</html>
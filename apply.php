<?php
include('config/config.php');
$link = $_SERVER['HTTP_REFERER'];

function getCVRating($conn,$filePath,$vacancy_id){
    include_once('library/screening.php');
    $sql = "select * from vacancy where id=$vacancy_id";
    $vacancy_details = mysqli_query($conn,$sql);
    $vacancy_details = mysqli_fetch_assoc($vacancy_details);
    return rateCV($filePath,$vacancy_details['description']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $vacancy_id = $_POST['vacancy_id'];
    $targetDir = "uploads/resumes/";
    
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["cv"]["name"]);

    $filePath = $targetDir . time() . "_" . $fileName;
    $fileType = pathinfo($filePath, PATHINFO_EXTENSION);

    $allowedTypes = ["pdf"];

    if (in_array(strtolower($fileType), $allowedTypes)) {
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $filePath)) {
            $cv_rating = getCVRating($conn,$filePath,$vacancy_id);
            $stmt = $conn->prepare("INSERT INTO applications (name, email, cv, vacancy_id,cv_rating) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $filePath, $vacancy_id, $cv_rating);

            if ($stmt->execute()) {
                
                $_SESSION['flash'] = "Application submitted successfully!";
            } else {
                $_SESSION['flash'] = 'Something went wrong';
            }

            $stmt->close();
        } else {
            $_SESSION['flash'] = 'Something went wrong';
        }
    } else {
        $_SESSION['flash'] = 'Only pdf are allowed';
    }
}
header("Location: $link");
exit();

?>

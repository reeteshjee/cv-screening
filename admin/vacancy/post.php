<?php
	include_once('../../config/config.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$postData = $_POST;
		$title = mysqli_real_escape_string($conn, $postData['title']);
		$location = mysqli_real_escape_string($conn, $postData['location']);
		$company = mysqli_real_escape_string($conn, $postData['company']);
		$salary = mysqli_real_escape_string($conn, $postData['salary']);
		$description = mysqli_real_escape_string($conn, $postData['description']);
		$deadline = mysqli_real_escape_string($conn, $postData['deadline']);
		if(isset($postData['id'])){
			$id = $postData['id'];
			$sql = "update vacancy set title='$title',location='$location',company='$company',salary='$salary',description='$description',deadline='$deadline' where id=$id";
		}else{
			$sql = "insert into vacancy(title,location,company,salary,description,deadline) values('$title','$location','$company','$salary','$description','$deadline')";
		}
		

		mysqli_query($conn,$sql);
		header("Location: ".BASE_URL."admin/vacancy");
		exit;
	}
?>
<?php include('../partials/meta.php');?>
<body>
    <?php include('../partials/sidebar.php');?>


    <main class="main-content">
        <?php include('../partials/topbar.php');?>
        <?php include('../partials/postvacancy.php');?>
    </main>
    <?php include('../partials/footer.php');?>
</body>
</html>
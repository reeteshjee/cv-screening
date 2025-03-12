<?php
    include_once('config/config.php');
    $id = $_GET['id'];
    $sql = "select * from vacancy where id=$id";
    $details = mysqli_query($conn,$sql);
    $details = mysqli_fetch_assoc($details);
?>
<?php include('partials/meta.php');?>
<body>

    <?php include('partials/nav.php');?>
    <?php include('partials/hero.php');?>

    <?php if(isset($_SESSION['flash'])){?>
    	<div class="alert alert-success" role="alert">
		  <?php echo $_SESSION['flash']; unset($_SESSION['flash']);?>
		</div>
    <?php } ?>
    <div class="container jobs-container">
        <div class="section-header">
            <h1 class="section-title">
            	<?php echo $details['title'];?>
            </h1>
        </div>
    
        <div class="card mt-4 job-details">
            <div class="card-body">
            	<button data-bs-toggle="modal" data-bs-target="#applyModal" class="float-end btn btn-primary btn-sm">Apply Now</button>
            	<p><strong>Company:</strong> <?php echo $details['company'];?></p>
            	<p><strong>Location:</strong> <?php echo $details['location'];?></p>
                <p><strong>Salary:</strong> <?php echo $details['salary'];?></p>
                <p><strong>Application Deadline:</strong> <?php echo $details['deadline'];?></p>
                <h4>Job Description</h4>
                <div class="job-description">
                	<?php echo $details['description'];?>
                </div>

                
            </div>
        </div>



<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applyModalLabel">Apply for <?php echo $details['title'];?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="apply.php" method="post" enctype="multipart/form-data">
                    	<input type="hidden" value="<?php echo $details['id'];?>" name="vacancy_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="cv" class="form-label">Upload CV</label>
                            <input type="file" class="form-control" name="cv" accept=".pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


           
    </div>
<?php include('partials/footer.php');?>

</body>
</html>
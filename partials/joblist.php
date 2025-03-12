<?php
	$sql = "select * from vacancy order by id desc";
	$result = mysqli_query($conn,$sql);

?>

<?php while($row=mysqli_fetch_assoc($result)){?>
	<div class="job-card mb-5">
	    <div class="job-info">
	        <h3 class="job-title"><?php echo $row['title'];?></h3>
	        <div class="job-meta">
	            <span class="job-location"><i class="fas fa-map-marker-alt"></i>
	            	<?php echo $row['location'];?>
	            </span>
	            <span class="job-salary"><i class="fas fa-dollar-sign"></i> 
	            	<?php echo $row['salary'];?>
	            </span>
	        </div>
	        <p class="job-description pe-5">
	        	<?php echo substr(strip_tags($row['description']),0,400);?>...
	        </p>
	    </div>
	    <div class="job-actions">
	        <a class="apply-btn"  style="text-decoration:  none;" href="job.php?id=<?php echo $row['id'];?>">
	        	<i class="fas fa-paper-plane"></i> Apply Now
	        </a>
	    </div>
	</div>
<?php } ?>
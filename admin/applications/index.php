<?php include_once('../../config/config.php');?>

<?php include('../partials/meta.php');?>
<body>
    <?php include('../partials/sidebar.php');?>


    <main class="main-content">
        <?php include('../partials/topbar.php');?>
        <?php
        	$sql = "select vacancy.title, vacancy.company,vacancy.salary, applications.* from applications join vacancy on applications.vacancy_id=vacancy.id order by applications.cv_rating desc";
            if(isset($_GET['id'])){
                $sql = "select vacancy.title, vacancy.company,vacancy.salary, applications.* from applications join vacancy on applications.vacancy_id=vacancy.id where vacancy.id=".$_GET['id']." order by applications.cv_rating desc";
            }
        	$result = mysqli_query($conn,$sql);
        ?>
		<table class="table table-striped table-bordered">
			<thead>
    			<tr>
    				<th>ID</th>
    				<th>Title</th>
    				<th>Vacancy Applied</th>
                    
    				<th>Applied At</th>
                    <th>CV Rating</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		
    		<tbody>
    			<?php while($row = mysqli_fetch_assoc($result)){?>
        			<tr>
        				<td><?php echo $row['id'];?></td>
        				<td><?php echo $row['name'];?></td>
        				<td>
        					<p>Title: <?php echo $row['title'];?></p>
        					<p>Company: <?php echo $row['company'];?></p>
        					<p>Salary: <?php echo $row['salary'];?></p>

    					</td>
        				<td><?php echo $row['created_at'];?></td>
                        <td><?php echo $row['cv_rating'];?></td>
        				<td>
        					<a class="btn btn-sm btn-primary" target="_blank" href="<?php echo BASE_URL;?>job.php?id=<?php echo $row['vacancy_id'];?>">
        						View Vacancy Details
        					</a>
        				</td>
        			</tr>
        		<?php } ?>
    		</tbody>
		</table>

    </main>
    <?php include('../partials/footer.php');?>
</body>
</html>
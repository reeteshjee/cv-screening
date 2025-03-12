<?php include_once('../../config/config.php');?>

<?php include('../partials/meta.php');?>
<body>
    <?php include('../partials/sidebar.php');?>


    <main class="main-content">
        <?php include('../partials/topbar.php');?>
        <?php
        	$sql = "select * from vacancy order by id desc";
        	$result = mysqli_query($conn,$sql);
        ?>
		<table class="table table-striped table-bordered">
			<thead>
    			<tr>
    				<th>ID</th>
    				<th>Title</th>
    				<th>Company</th>
    				<th>Salary</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		
    		<tbody>
    			<?php while($row = mysqli_fetch_assoc($result)){?>
                    <?php
                        $sql = "select count(*) as applications from applications where vacancy_id=".$row['id'];
                        $applications = mysqli_query($conn,$sql);
                        $applications = mysqli_fetch_assoc($applications)['applications'];
                    ?>
        			<tr>
        				<td><?php echo $row['id'];?></td>
        				<td><?php echo $row['title'];?></td>
        				<td><?php echo $row['company'];?></td>
        				<td><?php echo $row['salary'];?></td>
        				<td>
        					<a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $row['id'];?>">
        						Edit
        					</a>
                            <a class="btn btn-info btn-sm" href="<?php echo BASE_URL;?>admin/applications?id=<?php echo $row['id'];?>">
                                <?php echo $applications;?> Applications
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
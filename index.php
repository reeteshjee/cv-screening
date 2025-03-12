<?php
    include_once('config/config.php');
?>
<?php include('partials/meta.php');?>
<body>

    <?php include('partials/nav.php');?>
    <?php include('partials/hero.php');?>

    <div class="container jobs-container">
        <div class="section-header">
            <h2 class="section-title">Open Positions</h2>
            <button class="filter-btn d-none">
                <i class="fas fa-filter"></i> Filter Jobs
            </button>
        </div>


        <?php include('partials/joblist.php');?>


        <div class="load-more">
            <button class="load-more-btn">Load More Jobs <i class="fas fa-chevron-down ms-2"></i></button>
        </div>
    </div>
<?php include('partials/footer.php');?>
</body>
</html>
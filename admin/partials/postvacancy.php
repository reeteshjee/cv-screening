
<div class="card">
	<div class="card-body p-4">
<form action="" method="post">
	<div class="row">
		<div class="col-4">
			<div class="mb-3">
		        <label class="form-label">Job Title</label>
		        <input type="text" class="form-control" name="title" placeholder="Enter job title" required>
		    </div>
		    <div class="mb-3">
		        <label class="form-label">Company Name</label>
		        <input type="text" class="form-control" name="company" placeholder="Enter company name" required>
		    </div>
		    <div class="mb-3">
		        <label class="form-label">Location</label>
		        <input type="text" class="form-control" name="location" placeholder="Enter job location" required>
		    </div>
		    <div class="mb-3">
		        <label class="form-label">Salary</label>
		        <input type="number" class="form-control" name="salary" placeholder="Enter salary" required>
		    </div>
		    <div class="mb-3">
		        <label class="form-label">Application Deadline</label>
		        <input type="date" name="deadline" class="form-control" required>
		    </div>
		</div>
		<div class="col-8">
			<div class="mb-3">
		        <label class="form-label">Job Description</label>
		        <textarea class="form-control" name="description" rows="4" placeholder="Enter job description"></textarea>
		    </div>
		</div>
	</div>
    <button type="submit" class="btn btn-primary">Post Job</button>
</form>
</div>
</div>

<script src="https://cdn.tiny.cloud/1/ex5p9pmnk9z9eny4nng75yugobb4kf28z3y5btfr8qfl4w40/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
        selector: 'textarea',
        menubar:false,
        height:'500',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak code',
        toolbar: "h1 h2 h3 h4 | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link | alsoread | code",
   });
</script>

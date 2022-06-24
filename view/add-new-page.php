<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add New</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
	
</head>
<body>
	<form id="another_form" method="POST" action="#">
	  <div class="form-group">
	    <label for="username">Name</label>
	    <input type="name" id="username" class="form-control" name="username" placeholder="Enter name" required>
	  </div>
	  <div class="form-group mb-4">
	    <label for="email">Email</label>
	    <input type="email" name="email" class="form-control" id="email" placeholder="email"  required>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>
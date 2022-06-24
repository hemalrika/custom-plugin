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
	<?php
		global $wpdb;
		// $wpdb->insert('wp_custom_table', array(
		// 	'name' => 'MD Hemal Akhand',
		// 	'email' => "hemalrika@gmai.com"
		// ));

		// $wpdb->query(
		// 	$wpdb->prepare(
		// 		"INSERT INTO wp_custom_table (name, email, address) VALUES('%s','%s', '%s')", 'MD Hemal', 'hemalrika@gmail.com', 'your address'
		// 	)
		// );
		/**
		 * Update
		 * */
		// $wpdb->update(
		// 	'wp_custom_table',
		// 	array(
		// 		'name' => 'Tawhid Akhand',
		// 	),
		// 	array(
		// 		'id' => 1
		// 	)
		// );
		// $wpdb->query(
		// 	$wpdb->prepare(
		// 		"UPDATE wp_custom_table set name='%s' WHERE id=%d", "Rika", 1
		// 	)
		// );
		/***
		 * Delete
		 * */
		// $wpdb->delete('wp_custom_table', array(
		// 	'id' => 1
		// ));
		$wpdb->query(
			$wpdb->prepare(
				"DELETE FROM wp_custom_table WHERE id=%d", 2
			)
		);
	?>
	<form id="add_form" method="POST" action="#">
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
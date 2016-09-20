<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo e($error_number); ?> - <?php echo e($error_message); ?></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
	<h1><?php echo e($error_number); ?></h1>
	<p><?php echo e($error_message); ?></p>
</body>
</html>

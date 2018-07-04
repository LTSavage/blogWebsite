<?php  include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/adminFunctions.php'); ?>
<html>
<head>
	<?php include(ROOT_PATH . '/admin/includes/headSection.php'); ?>
	<title>Admin | Dashboard</title>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="<?php echo BASE_URL .'admin/dashboard.php' ?>">
				<h1>KMBlog - Admin</h1>
			</a>
		</div>
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
				<a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a>
			</div>
		<?php endif ?>
	</div>
	<div class="container dashboard">
		<h1>Welcome</h1>
		<div class="stats">
        
			<a href="users.php" class="first">
				<div><?php echo $userNu ?></div> <br>
				<span>Registered users</span>
			</a>
			<a href="posts.php">
				<div><?php echo $postNu ?></div> <br>
				<span>Published posts</span>
			</a>
			<a href="topics.php">
				<div><?php echo $topicNu ?></div> <br>
				<span>Topics</span>
			</a>
		</div>
		<br><br><br>
		<div class="buttons">
			<a href="users.php">Add Users</a>
			<a href="posts.php">Add Posts</a>
		</div>
	</div>
</body>
</html>
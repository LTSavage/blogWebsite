<!-- Initial Load  -->
<?php include("config.php") ?>
<?php include('includes/publicFunctions.php'); ?>
<?php require_once( ROOT_PATH . '/includes/publicFunctions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registrationLogin.php') ?>
<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); 
    //Retrieve Topics
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();
?>

<!DOCTYPE html>
<html>

<head>
    <?php include( ROOT_PATH . "/includes/headSection.php"); ?>
    <title>KMBlog</title>
</head>

<body>
    <!-- container - wraps whole page -->
    <div class="container">
        <!-- navbar -->
        <?php include( ROOT_PATH . "/includes/navbar.php"); ?>
        <!-- // navbar -->
        
        <!-- Page content -->
        <div class="content">
                <?php print_r($_SESSION); ?>
                <h2 class="content-title">Articles</h2>
                

                <?php foreach ($posts as $post): ?>
                <div class="post" style="margin-left: 0px;">
                    <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
                    <!-- Added this if statement... -->
                    <?php if (isset($post['topic']['name'])): ?>
                    <a href="<?php echo BASE_URL . 'filteredPosts.php?topic=' . $post['topic']['id'] ?>" class="btn category">
                        <?php echo $post['topic']['name'] ?>
                    </a>
                    <?php endif ?>

                    <a href="singlePost.php?post-slug=<?php echo $post['slug']; ?>">
                        <div class="post_info">
                            <h3>
                                <?php echo $post['title'] ?>
                            </h3>
                            <div class="info">
                                <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                                <span class="read_more">Read more...</span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            
        </div>
        <!-- // Page content -->
        
        <!-- footer -->
        <?php include( ROOT_PATH . "/includes/footer.php"); ?>
        <!-- // footer -->

    </div>
    <!-- // container -->
</body>

</html>

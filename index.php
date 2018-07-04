<!-- Initial Load  -->
<?php include("config.php");?>
<?php require_once( ROOT_PATH . '/includes/publicFunctions.php') ?>

<?php 
    //Retrieve 4 posts from database
    $posts = get4(); 
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
    <link rel="stylesheet" href="static/css/homepage.css">
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
            <div class="row">
                <div class="column left">
                    <h2>Recent Articles</h2>
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
                <div class="column right">
                    <h2>Current Projects</h2>
                    <ul>
                        <li class="curproj"><a href="#tbc">Blog Inner Workings</a></li>
                        <li class="curproj"><a href="#tbc">Documentation (for EVERYTHING)</a></li>
                        <li class="curproj"><a href="#tbc">Overwatch Tracker v2.0</a></li>
                        <li class="curproj"><a href="https://kieranmolloy.me/projects/projectEuler">Project Euler</a></li>

                    </ul>

                    <h2>Recent Video</h2>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ZpZR3po2m_4?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <!-- // Page content -->

        <!-- footer -->
        <?php include( ROOT_PATH . "/includes/footer.php"); ?>
        <!-- // footer -->
    </div>
    <!-- // container -->
</body>

</html>

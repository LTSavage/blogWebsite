
<?php 
/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}
/* * * * * * * * * * * * * * *
* Returns all published posts IN DESC ORDER
* * * * * * * * * * * * * * */
function getPublishedPostsDESC() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY updated_at DESC";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}


/* * * * * * * * * * * * * * *
* Returns 4 Posts, for Homepage.php
* * * * * * * * * * * * * * */
function get4(){
    $all_posts = getPublishedPostsDESC();
    $post_4 = array();
    for ($i = 0; $i < 4; $i++){
        $post=$all_posts[$i];
        array_push($post_4,$post);
    }  
    return $post_4;
}
/* * * * * * * * * * * * * * *
* Receives a post id and
* Returns topic of the post
* * * * * * * * * * * * * * */
function getPostTopic($post_id){
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}
/* * * * * * * * * * * * * * * *
* Returns all posts under a topic
* * * * * * * * * * * * * * * * */
function getPublishedPostsByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}
/* * * * * * * * * * * * * * * *
* Returns topic name by topic id
* * * * * * * * * * * * * * * * */
function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}
/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */
function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}
/* * * * * * * * * * * *
*  Returns all topics
* * * * * * * * * * * * */
function getAllTopics()
{
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}
/* * * * * * * * * * * * * * * * *
*  Returns user info from session
* * * * * * * * * * * * * * * * */


function getuserInfo()
{
        global $conn;
        $userid = $_SESSION['user']['id'];
        //$username = "Kieran";
	    $sql = "SELECT * FROM users WHERE id='$userid'";
	    $result = mysqli_query($conn, $sql);
	    $userInfo = mysqli_fetch_row($result);
	    
        return $userInfo;

}

function getUserLState(){
    try{
        if ($_SESSION['cstatus']=0) {
            $message = ("<a href='login.php>Login</a>");
            return $message;
        }else{
            //$message = returnUsername();
            return "<a href='userinfo.php'>UserName</a>";
        }
        
        } 
    catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}
}

/*
function returnUsername(){
        $message = ("<a href='userinfo.php'>".$_SESSION['user']['username']."</a>");
        return $message;
}
*/

?>

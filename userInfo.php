<!-- Initial Load  -->
<?php include("config.php") ?>
<?php require_once( ROOT_PATH . '/includes/publicFunctions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registrationLogin.php') ?>

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
        
        <!-- Content -->
        <div class="content">
        <?php $userInformation = getUserInfo() ?>
        
        <h1>User Information</h1>
        <table>
            <tr>
                <td class="titlecol">Username:</td>
                <td><?php echo $userInformation[1] ?></td>
                <td class="changecol"><a href="">Change</a></td>
            </tr>
            <tr>
                <td class="titlecol">Password:</td>
                <td>&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;</td>
                <td class="changecol"><a href="">Change</a></td>
            </tr>
            <tr>
                <td class="titlecol">Email:</td>
                <td><?php echo $userInformation[2] ?></td>
                <td class="changecol"><a href="">Change</a></td>
            </tr>
            <tr>
                <td class="titlecol">User Since:</td>
                <td><?php echo date("F j, Y ", strtotime($userInformation[5])); ?></td>
                <td class="changecol"></td>
            </tr>
            
        </table>
            
        <a class='fakebutton' href='logout.php'>Logout</a>
        <a class='fakebutton' href='admin/dashboard.php'>Admin Panel</a>
        
        <?php include( ROOT_PATH . "/includes/footer.php"); ?>
        <!-- // footer -->
        </div>
        <!--// content -->
    </div>
    <!-- // container -->
    
    <script>
        function gologout()
            
    </script>
</body>

</html>


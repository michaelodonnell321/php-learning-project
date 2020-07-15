<?php include 'db.php'; ?>
<!-- Header -->
<?php include 'header.php';?>

    <!-- Navigation -->
    <?php include 'navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php
    if(isset($_POST['submit'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
        $searchQuery = mysqli_query($connection,$query);
        if(!$searchQuery) {
            die('Query failed' . mysqli_error($sconnection));
        }

        $count = mysqli_num_rows($searchQuery);
        if($count == 0) {
            echo "<h1>NO RESULTS</h1>";
        } else {
                    while($row = mysqli_fetch_assoc($searchQuery)) {
                        $postTitle= $row['post_title'];
                        $postAuthor= $row['post_author'];
                        $postDate= $row['post_date'];
                        $postImage= $row['post_image'];
                        $postContent= $row['post_content'];
                    ?>
                
            
                <!-- Posts section -->
                <h2>
                    <a href="#"><?php echo $postTitle ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postDate ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $postImage; ?>" alt="">
                <hr>
                <p><?php echo $postContent ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    <?php }
        }

    }
    
?>
            <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'sidebar.php';?>

            </div>

        </div>
        <!-- /.row -->

        <hr>
    <?php include 'footer.php';?>
<?php 

function insertCategories() {
    global $connection;
    if(isset($_POST['addCategory'])) {
        $title = $_POST['categoryTitle'];

        if($title == "" || empty($title)) {
            echo "<script type='text/javascript'>alert('Cannot add blank category');</script>";
        } else {
        $query = "INSERT INTO categories(title) VALUE ('{$title}') ";

        $createCategoryQuery = mysqli_query($connection,$query);

            if(!$createCategoryQuery) {
                die(mysqli_error($connection));
            }
        }
        $title = '';
    }
}

?>
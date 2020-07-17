<?php include "includes/admin-header.php" ?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin-navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Page
                            <small>Time to administrate</small>
                        </h1>
                        <!-- add category form -->
                        <div class="col-xs-6">
                        <?php 
                            insertCategories();
                        ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title">Category To Add</label>
                                    <input class="form-control" type="text" name="categoryTitle">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="addCategory" value="Add Category">
                                </div>
                            </form>
                            <?php 
                                if(isset($_GET['editCategory'])) {
                                    include "includes/editCategories.php";
                                }
                             ?>
                        </div>
                        <div class="col-xs-6" style="max-height: 215px; overflow: scroll;">
<?php 
    // edit category query
    if(isset($_POST['editCategory'])) {
        $editCategoryId = $_POST['editCategory'];
        $query = "UPDATE categories SET title = ${editCategory}WHERE id={$editCategoryId}";
        $editCategoryQuery = mysqli_query($connection,$query);
    }
?>
<?php
    // find all categories query
    $query = "SELECT * FROM categories";
    $selectCategories = mysqli_query($connection, $query);
?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th></th> <!-- delete -->
                                    <th></th> <!-- edit -->
                                </tr>
                            </thead>
                            <tbody class="overflow-auto">
<?php 
    while($row = mysqli_fetch_assoc($selectCategories)) {
        $categoryId = $row['id'];
        $categoryTitle = $row['title'];
        echo "<tr>";
        echo "<td>{$categoryId}";
        echo "<td>{$categoryTitle}</td>";
        // using js to confirm delete
        echo "<td><a onClick=\"javascript: return confirm('This will delete this category forever, are you sure?');\" href='categories.php?delete={$categoryId}'>Delete</a></td>";
        echo "<td><a href='editCategories.php?update={$categoryId}'>Edit</a></td>";
        echo "</tr>";
    }
?>
<?php
    // delete category query
    if(isset($_GET['delete'])) {
        $categoryIdToDelete = $_GET['delete'];
        $query = "DELETE FROM categories WHERE id={$categoryIdToDelete}";
        $categoryDeleteQuery = mysqli_query($connection,$query);
        // refresh page after delete
        header("Location: categories.php");
    }
?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin-footer.php" ?>
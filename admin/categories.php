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
                            <form action="">
                            <div class="form-group">
                                <label for="title">Category To Add</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                            </form>
                        </div>
                        <div class="col-xs-6">
<?php
    $query = "SELECT * FROM categories LIMIT 4";
    $selectCategories = mysqli_query($connection, $query);
?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
    while($row = mysqli_fetch_assoc($selectCategories)) {
        $categoryId = $row['id'];
        $categoryTitle = $row['title'];
        echo "<tr>";
        echo "<td>{$categoryId}";
        echo "<td>{$categoryTitle}</td>";
        echo "</tr>";
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
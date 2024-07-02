<!-- Pastor List Section -->
<?php include("./logic/pastor/readpastor.php"); ?>

<div class="mb-5 pb-5">
    <div class="container-fluid container-service py-5">
        <div class="container py-5">

            <div class="row mb-3">
                <div class="col-md-6">
                </div>
                <div class="col-md-3 text-right">
                    <a href="addpastor.php" class="btn btn-success">Add Pastor</a>
                </div>
            </div>

            <!-- Pastor Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Biography</th>
                        <th style="width: 40%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo mb_strimwidth($row['name'], 0, 20, "..."); ?></td>
                            <td><?php echo mb_strimwidth($row['title'], 0, 20, "..."); ?></td>
                            <td><?php echo mb_strimwidth($row['biography'], 0, 60, "..."); ?></td>
                            <td>
                                <a href="updatepastor.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                <a href="logic/pastor/deletepastor.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this pastor?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

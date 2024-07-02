<!-- Blog List Section -->
<?php include("./logic/blog/readblog.php"); ?>

<div class="mb-5 pb-5">
    <div class="container-fluid container-service py-5">
        <div class="container py-5">

            <div class="row mb-3">
                <div class="col-md-6">
                </div>
                <div class="col-md-3 text-right">
                    <a href="addblog.php" class="btn btn-success">Add Blog Post</a>
                </div>
            </div>

            <!-- Blog Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th style="width: 40%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo mb_strimwidth($row['title'], 0, 20, "..."); ?></td>
                            <td>
                                <?php if (!empty($row['image'])) { ?>
                                    <img src="blog_img/<?php echo htmlspecialchars($row['image']); ?>" alt="Blog Image" style="max-width: 100px; max-height: 100px;">
                                <?php } else { ?>
                                    No Image
                                <?php } ?>
                            </td>
                            <td><?php echo mb_strimwidth($row['author'], 0, 20, "..."); ?></td>
                            <td>
                    
                                <a href="updateblog.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                <a href="logic/blog/deleteblog.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this blog post?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="mb-5 pb-5">
    <div class="container-fluid container-service py-5">
        <div class="container py-5">

            <div class="row mb-3">
                <div class="col-md-6">
                </div>
                <div class="col-md-3 text-right">
                    <a href="addalbum.php" class="btn btn-success">Add Album</a>
                </div>
            </div>

            <!-- Album Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Album Name</th>
                        <th>Description</th>
                        <th>Cover Image</th>
                        <th style="width: 40%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $albums = include(__DIR__ . "/../logic/album/readalbum.php");

                    if (!empty($albums) && is_array($albums)) {
                        foreach ($albums as $row) {
                            echo '<tr>
                                    <td>' . mb_strimwidth($row['title'], 0, 20, "...") . '</td>
                                    <td>' . mb_strimwidth($row['description'], 0, 30, "...") . '</td>
                                    <td><img src="' . $row['cover_image'] . '" alt="' . $row['title'] . '" width="100"></td>
                                    <td>
                                        
                                        <a href="updatealbum.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Update</a>
                                        <a href="logic/album/deletealbum.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                  </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">No albums found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

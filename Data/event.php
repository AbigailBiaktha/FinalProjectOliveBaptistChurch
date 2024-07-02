<?php
$events_result = include("./logic/event/read_events.php");
?>

<div class="mb-5 pb-5">
    <div class="container-fluid container-service py-5">
        <div class="container py-5">

            <div class="row mb-3">
                <div class="col-md-6">
            
                </div>
                <div class="col-md-3 text-right">
                    <a href="addevent.php" class="btn btn-success">Add Event</a>
                </div>
            </div>

            <!-- Event Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th style="width: 40%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($events_result && mysqli_num_rows($events_result) > 0) {
                        while ($row = mysqli_fetch_assoc($events_result)) { ?>
                            <tr>
                                <td><?php echo mb_strimwidth(htmlspecialchars($row['title']), 0, 20, "..."); ?></td>
                                <td><?php echo mb_strimwidth(htmlspecialchars($row['description']), 0, 60, "..."); ?></td>
                                <td>
                                    <a href="updateevent.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="logic/event/delete_event.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this event?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='3'>No upcoming events.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

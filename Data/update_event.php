<?php 
include("logic/event/read_events.php");
include("logic/event/update_event.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Event</title>
</head>
<body>
    <div id="message"><?php if (isset($_SESSION['message'])) { echo htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); } ?></div>
    
    <?php if (isset($row)): ?>
    <form method="post" enctype="multipart/form-data" action="logic/event/update_event.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        
        <table class="table">
            <tbody>
                <tr>
                    <td><label for="day">Day</label></td>
                    <td><input type="text" name="day" value="<?php echo htmlspecialchars($row['day']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="month">Month</label></td>
                    <td><input type="text" name="month" value="<?php echo htmlspecialchars($row['month']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="year">Year</label></td>
                    <td><input type="text" name="year" value="<?php echo htmlspecialchars($row['year']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="title">Title</label></td>
                    <td><input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="time">Time</label></td>
                    <td><input type="text" name="time" value="<?php echo htmlspecialchars($row['time']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="description">Description</label></td>
                    <td><textarea name="description" id="description" cols="30" rows="10"><?php echo htmlspecialchars($row['description']); ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="updateBtn" class="btn btn-primary">Submit</button>
                        <a href="admin_view.php" class="btn btn-primary">Back</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    
    <?php else: ?>
        <p>No data available to update.</p>
    <?php endif; ?>
</body>
</html>

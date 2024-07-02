<?php
require_once(__DIR__ . "/../connect.php");


// Fetch events from the database
$sql = "SELECT id, day, month, year, title, time, description FROM events";
$result = $conn->query($sql);

// Check if query was successful
if ($result && $result->num_rows > 0) {
    // Return the result set for use in event.php
    $events_result = $result;
} else {
    $events_result = null; // Set $events_result to null if no events found
}



if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-lg-4 mb-4">
                <div class="event-card">
                  <div class="event-date">
                    <div class="day">' . $row["day"] . '</div>
                    <div class="month-year">
                      <div class="month">' . $row["month"] . '</div>
                      <div class="year">' . $row["year"] . '</div>
                    </div>
                  </div>
                  <div class="event-info">
                    <h3 class="mb-3">' . $row["title"] . '</h3>
                    <p><strong>Time:</strong> ' . $row["time"] . '</p>
                    <p>' . $row["description"] . '</p>
                  </div>
                </div>
              </div>';
    }
} else {
    echo "<p>No upcoming events.</p>";
}

$conn->close();
?>

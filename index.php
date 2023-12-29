<?php
//connect to database
$conn = mysqli_connect('localhost', 'admin', 'ma9shapatel', 'personal');

//check connection
if (!$conn) {
    echo 'connection error: ' . mysqli_connect_error();
}

//write query for all events table
$sql = 'SELECT * from EVENTS';

//get the results of the query
$results = mysqli_query($conn, $sql);

//fetch the results as an array
$events = mysqli_fetch_all($results, MYSQLI_ASSOC);

//free up memory
mysqli_free_result($results);

//close connection
mysqli_close($conn);

include 'header.php';
?>
<div class="container-wedding">
    <h1>Celebrating unforgettabe memories</h1>
</div>
<div>
    <?php foreach($events as $event) { ?>
        <div class="container-wedding__teaser">
            <div class="container-wedding__teaser-card">
                <h3><?php echo ($event['NAME']); ?></h3>
                <div class="container-wedding__teaser-info"><?php echo ($event['DESCRIPTION']); ?></div>
                <div class="container-wedding__teaser-info"><?php echo date('d-m-Y', strtotime($event['DATE'])); ?></div>
                <?php if ($event['START_TIME'] < ('12:00')) 
                { $start_time = $event['START_TIME'] . 'am'; }
                else {$start_time = $event['START_TIME'] . 'pm'; }?>
                <div class="container-wedding__teaser-info"><?php echo 'Time: ' . $start_time . ' -' . ($event['END_TIME']) . 'pm'; ?></div>
                <div class="container-wedding__teaser-info"><?php echo 'Address: ' . ($event['ADDRESS']); ?></div>
            </div>
        </div>            
    <?php } ?>
</div>
<?php
include 'footer.php';
?>

<section class="search_and_list">
    <aside>
        <form method="post" action="index.php">
            <ul class="search_movie">
                <li>
                    Sök
                </li>
                <li>
                    <input type="text" name="search">
                </li>
            </ul>
        </form>
    </aside>

    
    <section class="movie_list">

<?php //list the movies 

    $movieObject = new event;

    $result = $movieObject->get_all_events();

    while($row = $result->fetch()) {
        $todaysDate = date('Y-m-d');
        if(!($row['finished'] == $todaysDate)) {

?>

        <!-- template card -->

        <section class="movie_list_card">
            <div>
                <img src="<?php echo $row['picture']; ?>">
            </div>
            <div>
                <h1>
                    <?php echo $row['eventName']; ?>
                </h1>
                <p>
                    <?php echo $row['info']; ?>
                </p>
                <div>
                    <form method="post" action="index.php">
                        <input type="hidden" name="page" value="movie">
                        <input type="hidden" name="showMovie" value="<?php echo $row['eventID']; ?>">
                        <button name="moreInfo">Mer info</button>
                    </form>
                </div>
            </div>
        </section>

<?php 
        }
    } //end of movie list
?>

    </section>
</section>
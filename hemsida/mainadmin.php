
<main class="main_admin">
    
<!-- template card -->
<?php
        if(isset($_SESSION['adminLoggedIn'])) {
            //log in form if not logged in
?>

    <section class="admin_login">
        <div>
            <form method="post" action="index.php">
                <div>
                    <label for="username">Användarnamn</label>
                </div>
                <div>
                    <input type="text" name="username">
                </div>
                <div>
                    <label for="password">Lösenord</label>
                </div>
                <div>
                    <input type="text" name="password">
                </div>
            </form>
        </div>
    </section>
<?php   
        } else {
            //if logged in check which page and get that
            if($page=="addEvent") {
                //add event

                include_once "add_event.php" ;
            } elseif ($page=="addVenue") {
                //add venue

                include_once "add_venue.php";
                
            } elseif ($page=="addTickets") {
                //add tickets

                include_once "add_tickets.php";
            } elseif ($page=="seeTicket") {
                //see ticket

                include_once "see_ticket.php";
            } elseif ($page=="validateTicket") {
                //admin profile

                include_once "validate_ticket.php";
            } elseif ($page=="adminMyProfile") {
                //admin profile

                include_once "admin_profile.php";
            } else {
                //admin start

                include_once "admin_start.php";
                
            }
        }
?>

</main>
<body <?php
    if(isset($_SESSION['userType'])) {
        
    } else {
        $_SESSION['userType'] = "Guest";
        echo 'onload="alertCookies()"';
    }
?>>
<div>
<?php 

$page = "";
$mainpage = "client";
$headerImg = "#";

if(isset($_POST['page'])) {
    // check if it is one of the admin pages
    if($_POST['page'] == "admin" || $_POST['page'] == "addEvent" || $_POST['page'] == "addVenue" || $_POST['page'] == "addTickets" || $_POST['page'] == "seeTicket" || $_POST['page'] == "adminMyProfile" || $_POST['page'] == "adminLoggedOut" || $_POST['page'] == "adminLogIn"){
        // check wich admin page
        switch($_POST['page']) {
            case "addEvent":
                $page = "addEvent";
                break;
            case "addVenue":
                $page = "addVenue";
                break;
            case "addTickets":
                $page = "addTickets";
                break;
            case "seeTicket":
                $page = "seeTicket";
                break;
            case "validateTicket":
                $page = "validateTicket";
                break;
            case "adminMyProfile":
                $page = "adminMyProfile";
                break;
            case "adminLoggedOut":
                $page = "adminLoggedOut";
                break;
            case "adminLogIn":
                $page = "adminLogIn";
                break;
            default:
                $page = "admin";
        }
        $mainpage = "admin";
        $headerImg = "#";

        if($page == "adminLoggedOut") {
            //logout and
            $page="admin";
        }

    //otherwise it isnt an admin page
    } else {
        //check which page
        switch($_POST['page']) {
            case "home":
                $page = "home";
                break;
            case "searchMovies":
                $page = "searchMovies";
                break;
            case "movie":
                $page = "movie";
                break;
            case "myTickets":
                $page = "myTickets";
                break;
            case "myProfile":
                $page = "MyProfile";
                break;
            case "loggedOut":
                $page = "loggedOut";
                break;
            case "logIn":
                $page = "logIn";
                break;
            default:
                $page = "client";
        }

        $mainpage = "client";
        $headerImg = "#";

        if($page == "loggedOut") {
            //logout and
            $page="client";
        }

    }
} else {
        $mainpage = "client";
        $headerImg = "#";
        $page="client";
}

?>
    <header>
        <form method="post" action="index.php">
            <input type="hidden" name="page" value="client">
            <button>
                <img src="<?php echo $headerImg; ?>">
            </button>
        </form>
<?php if($mainpage=="client") {?>
        <div id="behind" class="behind-overlay-windows hidden" onclick="close_overlay_windows()">
        </div>

        <div class="shopping_cart_icon" id="shopping_cart_icon_div" onclick="open_cart_window()">
            <i class="fas fa-shopping-cart" id="shopping_cart_icon"></i>
        </div>

        <div class="noOfTickets <?php if($basketTotalProductTypes==0){ echo "hidden";} ?>" id="noOfTicketsIcon">
            &nbsp;<?php echo $basketTotalProductTypes; ?>
        </div>

        <div class="shopping_cart_window hidden" id="shopping_cart_window">
            <h1>Varukorg</h1>
            <table>
                <thead>
                    <tr>
                        <th>Film
                        </th>
                        <th>Antal
                        </th>
                        <th>Pris
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
<?php 
                    if(isset($_COOKIE['basketTotalProductTypes'])) {
                        $i=0;
                        for($i=0; isset($_COOKIE["eventID" . $i]); $i++) {
                            $singleMovieObject->eventID = $_COOKIE["eventID" . $i];
                            $result = $singleMovieObject->get_event();
                            $row = $result->fetch();
                        
?>
                    <!-- temp row -->
                    <tr>
                        <td><?php echo $row['eventName']; ?>
                        </td>
                        <td>
                            <button id="remove<?php echo $i; ?>" onclick="return removeTicket(<?php echo $value['noOfTickets']; ?>, <?php echo $row['eventID']; ?>, <?php echo $row['price']; ?>, <?php echo $i; ?>)"><</button>
                            <input id="hidden_noOfTickets<?php echo $i; ?>" type="hidden" name="numberOfTickets<?php echo $row['eventID']; ?>" value="<?php echo $value['noOfTickets']; ?>">
                            <div class="basketText" id="noOfTickets<?php echo $i; ?>"><?php echo $value['noOfTickets']; ?></div>
                            <button id="add<?php echo $i; ?>" onclick="return addTicket(<?php echo $value['noOfTickets']; ?>, <?php echo $row['eventID']; ?>, <?php echo $row['price']; ?>, <?php echo $i; ?>)">></button>
                        </td>
                        <td ><div class="basketText" id="price<?php echo $i; ?>"><?php $price = $row['price'] * $value['noOfTickets']; echo $price; ?></div>
                        </td>
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="page" value="<?php echo $page; ?>">
                                <input type="hidden" name="ticketNumber" value="<?php echo $row['eventID']; ?>">
                                <button name="deleteTicket">X</button>
                            </form>
                        </td>
                    </tr>


<?php 
                        }
                    }
?>

                </tbody>
            </table>
        </div>
        
        <div class="user_icon" id="user_icon_div" onclick="open_user_window()">
            <i class="fas fa-user" id="user_icon"></i>
        </div>
        <div class="user_login hidden" id="user_login">
            <form method="post" action="index.php">
                <label for="username">Användarnamn</label>
                <input type="text" name="customer_username" id="user_login_username">
                <label for="password">Lösenord</label>
                <input type="text" name="customer_password" id="user_login_password">
                <input type="submit" name="customer_login" value="Logga in" class="user_login_button">
            </form>
        </div>
        
<?php } ?>
    </header>
<?php ?>

    <nav>
        <ul>
            <form method="post" action="index.php">
<?php   if($mainpage=="admin"){  
            if(!isset($_SESSION['adminLoggedIn'])) { ?>
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="addEvent">Lägg till Event</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="addVenue">Lägg till Salong</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="addTickets">Lägg till Biljetter</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="seeTicket">Se Biljett</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="adminMyProfile">Min Profil</button>
                </li>
                <li id="login">
                    <button class="navbutton" name="page" value="adminLoggedOut">Logga Ut</button>
                </li>
            </form>
<?php       } else { ?>
            <form method="post" action="index.php">
                <li id="logout">
                    <button class="navbutton" name="page" value="adminLogIn">Logga In</button>
                </li>
            </form>
<?php       }
        }  else { ?>
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="home">Hem</button>
                </li>
                <li>
                    <input type="hidden" name="test" value="test">
                    <button class="navbutton" name="page" value="searchMovies">Filmer</button>
                </li>
            </form>
<?php       if(isset($_SESSION['loggedIn'])) { ?>
            <form method="post" action="index.php">
                <li>
                    <button class="navbutton" name="page" value="myTickets">Mina Biljetter</button>
                </li>
                <li>
                    <button class="navbutton" name="page" value="myProfile">Min profil</button>
                </li>
                <li id="logout">
                    <button class="navbutton" name="page" value="logout">Logga Ut</button>
                </li>
            </form>
<?php       }
        }
?>
        </ul>
    </nav>

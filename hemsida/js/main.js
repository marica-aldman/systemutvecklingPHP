function open_user_window() {
    if (document.getElementById("user_login").classList.contains("hidden")) {
        document.getElementById("user_login").classList.remove("hidden");
        document.getElementById("user_icon").classList.add("fa-user-window-show");
        document.getElementById("behind").classList.remove("hidden");
        if (!document.getElementById("shopping_cart_window").classList.contains("hidden")) {
            document.getElementById("shopping_cart_window").classList.add("hidden");
            document.getElementById("shopping_cart_icon").classList.remove("fa-shopping-cart-window-show");
        }
    } else {
        document.getElementById("user_login").classList.add("hidden");
        document.getElementById("user_icon").classList.remove("fa-user-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
}

function open_cart_window() {
    if (document.getElementById("shopping_cart_window").classList.contains("hidden")) {
        document.getElementById("shopping_cart_window").classList.remove("hidden");
        document.getElementById("shopping_cart_icon").classList.add("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.remove("hidden");
        if (!document.getElementById("user_login").classList.contains("hidden")) {
            document.getElementById("user_login").classList.add("hidden");
            document.getElementById("user_icon").classList.remove("fa-user-window-show");
        }
    } else {
        document.getElementById("shopping_cart_window").classList.add("hidden");
        document.getElementById("shopping_cart_icon").classList.remove("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
}

function close_overlay_windows() {

    if (!document.getElementById("shopping_cart_window").classList.contains("hidden")) {
        document.getElementById("shopping_cart_window").classList.add("hidden");
        document.getElementById("shopping_cart_icon").classList.remove("fa-shopping-cart-window-show");
        document.getElementById("behind").classList.add("hidden");
    }
    if (!document.getElementById("user_login").classList.contains("hidden")) {
        document.getElementById("user_login").classList.add("hidden");
        document.getElementById("user_icon").classList.remove("fa-user-window-show");
        document.getElementById("behind").classList.add("hidden");
    }

}

function addTicket(numberOfTickets, eventID, price, index) {
    var newNumberOfTickets = parseInt(numberOfTickets) + 1;

    if (newNumberOfTickets < 1) {

        deleteTicket(eventID);


    } else if (newNumberOfTickets > 10) {
        alert("Du kan endast beställa 10 biljetter per film.");
    } else {

        var addButtonID = "add" + eventID;
        var addFunctionText = "return addTicket(" + newNumberOfTickets + "," + eventID + "," + price + ")";
        document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

        var hiddenNoOfTickets = "hidden_noOfTickets" + eventID;
        document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

        var noOfTickets = "noOfTickets" + eventID;
        document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

        var removeButtonID = "remove" + eventID;
        var removeFunctionText = "return removeTicket(" + newNumberOfTickets + "," + eventID + "," + price + ")";
        document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

        var priceID = "price" + eventID;
        var newPrice = newNumberOfTickets * price;
        document.getElementById(priceID).innerHTML = newPrice;

        var cookieIDNoOfTickets = "noOfTickets" + index;

        setCookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

        return false;
    }
}

function removeTicket(numberOfTickets, eventID, price) {
    var newNumberOfTickets = parseInt(numberOfTickets) - 1;

    var addButtonID = "add" + eventID;
    var addFunctionText = "return addTicket(" + newNumberOfTickets + "," + eventID + "," + price + ")";
    document.getElementById(addButtonID).setAttribute("onclick", addFunctionText);

    var hiddenNoOfTickets = "hidden_noOfTickets" + eventID;
    document.getElementById(hiddenNoOfTickets).setAttribute("value", newNumberOfTickets);

    var noOfTickets = "noOfTickets" + eventID;
    document.getElementById(noOfTickets).innerHTML = newNumberOfTickets;

    var removeButtonID = "remove" + eventID;
    var removeFunctionText = "return removeTicket(" + newNumberOfTickets + "," + eventID + "," + price + ")";
    document.getElementById(removeButtonID).setAttribute("onclick", removeFunctionText);

    var priceID = "price" + eventID;
    var newPrice = newNumberOfTickets * price;
    document.getElementById(priceID).innerHTML = newPrice;

    var cookieIDNoOfTickets = "noOfTickets" + index;

    setCookie(cookieIDNoOfTickets, newNumberOfTickets, 7);

    return false;
}

function addNewTicket() {

}

function buyTicket(p1) {

    //add ticket(s) to basket

    //add basket to cookie

    //show number of lines in basket on basket

    return false;
}

function deleteTicket(index) {

    var cookieIDEventID = "eventID" + index;
    var cookieIDNoOfTickets = "noOfTickets" + index;

    unsetCookie(cookieIDEventID);
    unsetCookie(cookieIDNoOfTickets);

}

function alertCookies() {
    var r = confirm("Denna sida använder cookies och session för sidans funktionalitet.");
    if (r == false) {
        window.location.assign("https://www.google.com");
    }
}

function alertGDPR() {
    var r = confirm(".");
    if (r == false) {

    }
}

function setCookie(name, value, days) {
    var d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function unsetCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

function getCookie(name) {
    var cookieName = name + "=";
    var allCookies = document.cookie;
    var ca = allCookies.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(cookieName) == 0) {
            return c.substring(cookieName.length, c.length);
        }
    }
    return "none";

    //if the cookie exists this function returns the value of the cookie with that the given name. No cookies on this site are serialized, encoded or otherwise as both php and js need to be able to read and set them
}
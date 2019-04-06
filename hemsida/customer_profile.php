<section>
        <div>
            <div>
                Användarnamn
            </div>
            <div>
                <!-- fill in -->
            </div>
        </div>
        <div>
            <div>
                Förnamn
            </div>
            <div>
                <!-- fill in -->
            </div>
        </div>
        <div>
            <div>
                Efternamn
            </div>
            <div>
                <!-- fill in -->
            </div>
        </div>
        <div>
            <div>
                Email
            </div>
            <div>
                <!-- fill in -->
            </div>
        </div>
        <div>
            <div>
                Adresser
            </div>
            <div>
                <div>
                    <div>
                        Adress 1
                    </div>
                    <div>
                        <div>
                            Gatuadress
                        </div>
                        <div>
                            <!-- fill in -->
                        </div>
                    </div>
                    <div>
                        <div>
                            Postnummer
                        </div>
                        <div>
                            <!-- fill in -->
                        </div>
                    </div>
                    <div>
                        <div>
                            Postort
                        </div>
                        <div>
                            <!-- fill in -->
                        </div>
                    </div>
                    <div>
                        <div>
                            <button page="changeAdress" value="<?php //echo number ?>">Ändra Adress</button>
                        </div>
                        <div>
                            <button page="removeAdress" value="<?php //echo number ?>">Tabort Adress</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
    if($page == "changeAdress") {
?>

    <section>
        <form method="post" action="index.php">
            <div>
                Adress 1
            </div>
            <div>
                <div>
                    Gatuadress
                </div>
                <div>
                    <!-- fill in -->
                    <input type="text" name="streetadress">
                </div>
            </div>
            <div>
                <div>
                    Postnummer
                </div>
                <div>
                    <!-- fill in -->
                    <input type="text" name="postnumber">
                </div>
            </div>
            <div>
                <div>
                    Postort
                </div>
                <div>
                    <!-- fill in -->
                    <input type="text" name="postadress">
                </div>
            </div>
            <div>
                <div>
                    <input type="hidden" name="adressID" value="<?php //echo adressid ?>">
                    <button name="page" value="saveAdress">Spara</button> 
                </div>
                <div>
                    <button name="page" value="myProfile">Ångra</button>
                </div>
            </div>
        </form>
    </section>

<?php
    }
?>
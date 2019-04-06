<section>
        <div>
            <div>Användarnamn
            </div>
            <div><!-- temp div-->
            </div>
        </div>
        <div>
            <button name="changeAdminPassword" onclick="return changeAdminPassword">Ändra lösenord</button><button name="changeAdminUsername" onclick="return changeAdminUsername">Ändra användarnamn</button>
        </div>
    </section>

    <section>
        <form method="post" action="index.php">
            <div>
                <div>
                    Nytt Användarnamn
                </div>
                <div>
                    <input type="text" name="newAdminUsername">
                </div>
            </div>
        </form>
    </section>

    <section>
        <form method="post" action="index.php">
            <div>
                <div>
                    Nytt Lösenord
                </div>
                <div>
                    <input type="text" name="newAdminPassword">
                </div>
            </div>
        </form>
    </section>
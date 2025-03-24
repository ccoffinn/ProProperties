<link rel="stylesheet" href="../css/ProPropStyle.css">

<nav>
    <ul>
        <li>
            <div class="search-container">
                <!--Action for functionality, empty for now-->
                <!--Search Bar Reference: https://www.youtube.com/watch?v=f6ocDCkCmhM -->
                <form action="">
                    <div class="search">
                        <span class="search-icon material-symbols-outlined">search</span>
                        <!--Placeholder is default text for search bar-->
                        <input class="search-input" type="search" placeholder="Search">
                    </div>
                </form>
            </div>
        </li>

        <li>
            <a href="index.php">Home</a>
        </li>

        <li>
            <a href="booking.php">Booking</a>
        </li>

        <li>
            <a href="contact.php">Contact</a>
        </li>

        <!-- Check if there is a value for the email session -->
        <?php if (isset($_SESSION['Email'])): ?>

        <!-- Link to the current website (using <p> takes up a new line) -->
            <li><a href="#">Logged in as <?php echo ($_SESSION['Email']); ?></a></li>

            <li><a href="logout.php">Logout</a></li>

        <!-- Otherwise show the login option -->
        <?php else: ?>

            <li><a href="login.php">Login</a></li>

        <?php endif; ?>
    </ul>
</nav>

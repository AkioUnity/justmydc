<!-- MENU START -->
<div id="navbar">
    <a href="#default" id="logo"><img src="https://2019fun.justmy.com/assets/dev2019/justmy.jpg">
        <?php echo $market['market_name']; ?>
    </a>
    <div id="navbar-right">
        <a href="javascript:void(0);" id="burger" onclick="mobmenu()"><img
                    src="https://2019fun.justmy.com/assets/dev2019/menu.png"></a>
        <ul class="menu-desktop">
            <li><a href="dashboard">Home</a></li>
            <?php include 'menu/channel_menu.php'; ?>
            <?php include 'menu/category_menu.php'; ?>

            <li><a href="categories/claimed">My Business</a></li>
            <li class="dropdown">
                <a href="#">LOCAL Services <b class="caret"></b></a>
            </li>
            <li class="dropdown">
                <a href="#">Memberships <b class="caret"></b></a>
                <div class="dropdown-content">
                    <p><a href="sign_up_club_local.php">Free Membership</a></p>
                    <p><a href="team_local_about.php">JustMy for Businesses</a></p>
                    <p><a href="team_giving_about.php">JustMy for Non Profits</a></p>
                    <p><a href="looking_for_interns.php">Join the #FunCrew</a></p>
                </div>
            </li>
            <li class="dropdown">
                <a href="#">About & Reach <b class="caret"></b></a>
                <div class="dropdown-content">
                    <p><a href="love-big-live-big.php">Our Story</a></p>
                    <p><a href="team_local_about.php">Cities</a></p>
                    <p><a href="contact.php">Contact Us</a></p>
                    <p><a href="preregistration_content_partners.php">Got an Idea for a Story?</a></p>
                </div>
            </li>
            <li><a href="login">Login</a></li>
        </ul>
    </div>
</div>

<!-- MENU END -->
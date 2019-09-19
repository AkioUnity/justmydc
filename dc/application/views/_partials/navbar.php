<!-- MENU START -->
<div id="navbar">
    <a href="#default" id="logo"><img src="https://2019fun.justmy.com/assets/dev2019/justmy.jpg">
        <?php echo $market['market_name']; ?>
    </a>
    <div id="navbar-right">
        <a href="javascript:void(0);" id="burger" onclick="mobmenu()"><img
                    src="https://2019fun.justmy.com/assets/dev2019/menu.png"></a>
        <ul class="menu-desktop" id="">
            <li><a href="dashboard">Home</a></li>
            <?php include 'menu/channel_menu.php'; ?>
            <?php include 'menu/category_menu.php'; ?>

            <li class="dropdown">
                <a href="#">For You! <b class="caret"></b></a>
                <div class="dropdown-content">
                    <p><a href="categories/claimed">My Business</a></p>
                </div>
            </li>
            <li><a href="login">Login</a></li>
        </ul>
    </div>
</div>

<!-- MENU END -->
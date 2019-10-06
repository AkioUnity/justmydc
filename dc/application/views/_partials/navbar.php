<!-- MENU START -->
<style>
    .dropdown .dropbtn {
        font-size: 17px;
        border: none;
        outline: none;
        color: black;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .dropdown-content a {
        padding: 2px 2px!important;
        display: block;
        text-align: left;
    }

    @media screen and (max-width: 600px) {
        .topnav a:not(:first-child), .dropdown .dropbtn {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        .topnav.responsive {
            position: relative;
            overflow: auto;
            max-height: 600px;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left !important;
        }

        .topnav.responsive .dropdown {
            float: none;
            overflow: hidden;
            display: block;
        }

        .topnav.responsive .dropdown-content {
            position: relative;
        }

        .topnav.responsive .dropdown .dropbtn {
            display: block;
            width: 100%;
            text-align: left;
            padding: 11px;
        }
    }
</style>
<div id="navbar">
    <a href="#default" id="logo"><img src="https://2019fun.justmy.com/assets/dev2019/justmy.jpg">
        <?php echo $market['market_name']; ?>
    </a>
    <div id="navbar-right" class="topnav">
        <a href="javascript:void(0);" id="burger" onclick="mobileMenu()"><img
                    src="https://2019fun.justmy.com/assets/dev2019/menu.png"></a>

        <a href="/dashboard">Home</a>
        <?php include 'menu/channel_menu.php'; ?>
        <?php include 'menu/category_menu.php'; ?>

<!--        <div class="dropdown">-->
<!--            <button class="dropbtn">For You! <b class="caret"></b></button>-->
<!--            <div class="dropdown-content">-->
<!--                <a href="categories/claimed">My Business</a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <a href="login">Login</a>-->

    </div>
</div>

<script>

    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar").style.padding = "0px 10px";
            document.getElementById("logo").style.fontSize = "25px";
        } else {
            document.getElementById("navbar").style.padding = "20px 10px";
            document.getElementById("logo").style.fontSize = "35px";
        }
    }


    function mobileMenu() {
        var x = document.getElementById("navbar-right");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

</script>


<!-- MENU END -->


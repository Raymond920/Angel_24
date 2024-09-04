<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../style/navigationStyle.css">
<link rel="stylesheet" href="../style/profile.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="top_nav" id="topNav">
    <div class="nav-left">

        <div class="profile-dropdown">
            <div class="profile-btn" onmouseover="closeExpandMenu()"></div>
            <div class="profile-menu">
                <div><a href="../profile"><i class="fas fa-user-edit"></i>Edit Profile</a></div>
                <div><a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a></div>
            </div>

        </div>
        <!-- Navigation Links -->
        <div class="home-button"><a href="/Angel_24/home">Home</a></div>
        <div class="item-dropdown">
            <button class="dropbtn">Item
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="item-dropdown-content">
                <div><a href="../itemList/displayItemList.php?product_type=Instant%20Food">Instant Food</a></div>
                <div><a href="../itemList/displayItemList.php?product_type=Instant%20Noodle">Instant Noodle</a></div>
                <div><a href="../itemList/displayItemList.php?product_type=Snacks">Snacks</a></div>
            </div>
        </div>
        <div class="cart-button"><a href="/Angel_24/cart">
            <i class="fa fa-shopping-cart"></i> Cart</a></div>
        <div class="contact-button"><a href="/Angel_24/contact">
            <i class="fa fa-phone"></i> Contact</a></div>
    </div>

    <!-- Search Bar -->
    <div class="searchbar">
        <form method="get" action="../search/search_results.php"> 
            <input type="text" placeholder="Search..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <a href="javascript:void(0);" class="icon" onclick="toggleExpandMenu()">
        <i class="fa fa-bars"></i></a>
    </div>

    <!-- Hamburger Icon -->
    <div class="expand-menu" id="expand-menu">
        <!-- Search Bar -->
        <div class="expand-menu-searchbar">
            <form method="get" action="../search/search_results.php"> 
                <input type="text" placeholder="Search..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- Navigation Links -->
        <div><a href="/Angel_24/home">Home</a></div>
        <div class="item-dropdown" onclick="itemDropdownOnclick(this)">
            <button class="dropbtn">Item
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="item-dropdown-content">
                <div><a href="../itemList/displayItemList.php?product_type=Instant%20Food">Instant Food</a></div>
                <div><a href="../itemList/displayItemList.php?product_type=Instant%20Noodle">Instant Noodle</a></div>
                <div><a href="../itemList/displayItemList.php?product_type=Snacks">Snacks</a></div>
            </div>
        </div>
        <div><a href="/Angel_24/cart">
            <i class="fa fa-shopping-cart"></i> Cart</a>
        </div>
        <div><a href="/Angel_24/contact">
            <i class="fa fa-phone"></i> Contact</a>
        </div>
    </div>
</div>

<script>
function toggleExpandMenu() {
    var expandMenu = document.getElementById("expand-menu");
    expandMenu.classList.toggle("responsive");
}

function closeExpandMenu() {
    var expandMenu = document.getElementById("expand-menu");
    expandMenu.className = "expand-menu";
}

function itemDropdownOnclick(element) {
    element.classList.toggle("onClick");
}

function checkScreenWidth() {
    if(window.innerWidth > 900) {
        closeExpandMenu();
    }
}

window.addEventListener('resize', checkScreenWidth);
</script>

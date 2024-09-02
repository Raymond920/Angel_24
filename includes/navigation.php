<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../style/navigationStyle.css">
<link rel="stylesheet" href="../style/profile.css">
<div class="top_nav">
    <div class="nav-left">
    <div class="profile-dropdown">
        <div class="profile-btn"></div>
        <div class="profile-menu">
            <a href="#edit-profile"><i class="fas fa-user-edit"></i>Edit Profile</a>
            <a href="#settings"><i class="fas fa-cog"></i>Settings</a>
            <a href="#logout"><i class="fas fa-sign-out-alt"></i>Log out</a>
        </div>
    </div>
        <a href="/Angel_24/home">Home</a>
        <div class="item-dropdown">
            <button class="dropbtn">Item
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="item-dropdown-content">
                <a href="../itemList/displayItemList.php?product_type=Instant%20Food">Instant Food</a>
                <a href="../itemList/displayItemList.php?product_type=Instant%20Noodle">Instant Noodle</a>
                <a href="../itemList/displayItemList.php?product_type=Snacks">Snacks</a>
            </div>
        </div>
        <a href="/Angel_24/cart">
        <i class="fa fa-shopping-cart"></i> Cart</a>
        <a href="/Angel_24/contact">
        <i class="fa fa-phone"></i> Contact</a>
    </div>
    <div class="searchbar">
        <form method="get" action="../search/search_results.php"> 
            <input type="text" placeholder="Search..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
<br>
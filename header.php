<style>
    .nav-link{
        text-decoration:none;
        color:rgba(34,54,69,7);
        font-weight : 500;
        margin-top : 0.2rem;

    }
    .nav-link:hover{
        color :rgb(143, 124, 112);
    }

    ul {
        list-style-type : none;
    }

    .navbar{
        background : white;
        height : 0rem;
        min-height : 10vh;
       
    }

    .navbar .navbar-brand a {
        padding : 1rem 0;
        display : block;
        text-decoration : none;
    }

    .navbar-brand{
        font-family : 'patrick', cursive;
        margin-right : 2%;

    }

    a:link { 
  text-decoration: none; 
  color : #28221e;
}


a:visited { 
  text-decoration: none;
  color : #28221e;
}


a:hover { 
  text-decoration: none;
  color : #28221e;
}


a:active { 
  text-decoration: none; 
  color : #28221e;
}
.dropdown-menu{
        border-radius: 0;
    }
    .dropdown-item:focus {
        background-color: #614e41;
        border-color: #614e41;
    }
    .btn-dark {
        background-color: #614e41;
        border-color: #614e41;      
    }

    .btn-dark:hover {
        background-color: #7f6951;
        border-color: #7f6951;
    }
</style>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
            <img src="images/logo-nav.png" style="height: 50px">
        </a>

        <!-- <a class="navbar-brand" href="home.php">Bellagio Hotel</a> -->
        <button class="navbar-toggler" id= "navbartoggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" ></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav" style = "background-color:white; opacity: 0.9; margin-left: -0.7rem; margin-right: 0.7rem; padding-left : 1rem; margin-right : -0.8rem; padding-bottom : 0.7rem; padding-top : 0.3rem;" >
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
          		<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Rooms</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="Rooms.php?room_id=R001">Classic Twin</a></li>
					<li><a class="dropdown-item" href="Rooms.php?room_id=R002">Classic Deluxe</a></li>
					<li><a class="dropdown-item" href="Rooms.php?room_id=R003">King Suite</a></li>
				</ul>
        	</li>
            <li class="nav-item dropdown">
          		<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Meeting Rooms</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="Rooms.php?room_id=R004">Rafflesia</a></li>
					<li><a class="dropdown-item" href="Rooms.php?room_id=R005">Fuchsia</a></li>
					<li><a class="dropdown-item" href="Rooms.php?room_id=R006">Cruss</a></li>
				</ul>
        	</li>
            <li class="nav-item dropdown">
          		<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Compare Rooms</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="compareRoom.php">Hotel Rooms</a></li>
					<li><a class="dropdown-item" href="compareMeetingRooms.php">Meeting Rooms</a></li>
				</ul>
        	</li>
            <li class="nav-item">
            <a class="nav-link "  href="<?php echo (isset($_SESSION['id']))?'wishlist.php':'login.php' ?>"  style = "margin-right: 0.75ex; ">Wishlist</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="<?php echo (isset($_SESSION['id']))?'Order Summary.php':'login.php' ?>" style = "margin-right: 0.5ex;">Order Summary</a>
                </li>
            </ul>
            <div class = "login" style="padding-top : 0.4rem;">
                <?php
                    if(isset($_SESSION["id"])){
                        echo "<button type='button' class='btn btn-dark' style='border-radius: 0px;'><a href = 'logout.php' class='text-white'>Logout</a></button>";
                    }
                    else{
                        echo '<button type="button" class="btn btn-dark" style="border-radius: 0px; margin-right: 1ex;"><a href = "login.php" class="text-white">Login </a></button>
                            <button type="button" class="btn btn-dark" style="border-radius: 0px;"><a href = "register.php" class="text-white">Register</a></button>';
                }
                ?>
            </div>        
        </div>
    </div>
</nav>
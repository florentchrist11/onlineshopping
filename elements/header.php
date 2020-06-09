<!--Justin Bathke-->
<!DOCTYPE html>
<html>

<head>

    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Mobile Ansicht-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Alef&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Zugriff auf css datei-->


</head>

<body>

    <div class="col-xs-3 col-sm-3 hidden-lg hidden-md">

        <div class="NavBar">
            <!--CSS Klasse NavBar-->
            <span class="hamburger_Icon" id="openNav">&#9776;</span>
        </div>

        <div id="showMenu" class="overlay">
            <!--CSS Klasse showMenu-->

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <!--Javascript für Toggel Effekt-->

            <div class="overlay-content">
                <!--CSS Klasse overlay-content-->
                <!--Hamburger Menü-->

                <ul>

                    <li><a href="index.php"><span class="glyphicon glyphicon-eye-open"></span>&nbsp; Home</a></li>
                    <li><a href="basket.php"><i class="fa fa-shopping-basket"></i>&nbsp; Basket</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> &nbsp;<i class="fa fa-user"></i>&nbsp; Customer <i class="fa fa-caret-down"></i>

							<ul class="dropdown-menu" role="menu" style="position: relative;width: 100%;margin-left: 0%;background-color: #5ea75e">

								<li><a href="registrieren.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="unternehmenkonto.php">Selleraccount</a></li>
                    <li><a href="login_admin.php">Administrator</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>

                </li>
                <li>
                    <a herf="order.php"> <i class="fa fa-shopping-bag"></i>&nbsp; Order</a>
                </li>

                </ul>
            </div>

        </div>
    </div>

    <div class="col-md-12 col-lg-12 hidden-sm hidden-xs navbar" style="background-color: #4ba04b">
        <!--Desktop Menü-->

        <div class="col-md-3 col-lg-4 hidden-sm hidden-xs"></div>

        <div class="col-md-6 col-lg-5 hidden-sm hidden-xs">
            <ul class="nav navbar-nav" style="font-size: 125%;margin-left: 0%">
                <li class="changeColor">
                    <a href="index.php" style="color: white;"> <span class="glyphicon glyphicon-home"></span> Home </a>
                </li>
                <li class="changeColor">
                    <a href="basket.php" style="color: white;"> <i class="fa fa-shopping-basket"></i> Basket </a>
                </li>
                <li class="changeColor" id="customer">

                    <a href="#" style="color: white;transition: 1s" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="fa fa-user"></i> Customer <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="registrieren.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="unternehmenkonto.php">Selleraccount</a></li>
                        <li><a href="login_admin.php">Administrator</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>

                </li>

                <li class="changeColor">
                    <a href="order.php" style="color: white;"> <i class="fa fa-shopping-bag"></i> Order </a>
                </li>

            </ul>
        </div>

        <div class="col-md-3 col-lg-3 hidden-sm hidden-xs"></div>

    </div>


    <script type="text/javascript">
        //Toggel effekt beim Hamburger Menü
        $(document).ready(function() {

            $('#menuToggle').click(function() { // klicken auf die Hamburger Menü aktiviert 
                $(".menu-content").toggleClass('active');
                $('#menuToggle').toggleClass('active');

            });

            $('#openNav').click(function() {

                document.getElementById("showMenu").style.width = "60%"; //öffne Menü zu 60%

            });



            $('.dropdown').click(function() {
                $('.dropdown-menu').slideToggle('slow');
            });

            $('#customer').click(function() {
                $('.dropdown-menu').slideToggle('slow');
            });

        });

        function closeNav() {
            document.getElementById("showMenu").style.width = "0%"; // schließe menü 
        }
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- font awesome file -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <!-- googlefonts file -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- materialize css file -->
    <link rel="stylesheet" href="/styles/materialize.min.css" />
    <!-- custom stylesheet file -->
    <link rel="stylesheet" href="/styles/index.css" />
    <link rel="manifest" href="/manifest.json" />
    <link rel="apple-touch-icon" href="/img/icons/icon-96x96.png" />
    <meta name="apple-mobile-web-app-status-bar" content="#AA7700" />
    <meta name="theme-color" content="#FFE1C4" />

    <title>Food Splash - A Complete Food Review and Guide</title>
</head>

<body class="grey lighten-4">

    <!-- navbar section -->
    <nav class="blue white-text lighten-2">
        <div class="nav-wrapper container">
            <a href="/">Food Splash!</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/pages/about.html">About</a></li>
                <li><a href="/pages/blog.html">Blog</a></li>
                <li><a href="/pages/contact.html">Contact</a></li>
            </ul>
            <span class="right">
                <i class="material-icons sidenav-trigger hide-on-large-only" data-target="sidenav-menu">menu</i>
            </span>
        </div>
    </nav>

    <!-- sidenav section -->
    <ul id="sidenav-menu" class="sidenav sidenav-menu">
        <li><a href="/pages/about.html"><i class="material-icons">account_box</i>About</a></li>
        <li><a href="/pages/blog.html"><i class="material-icons">library_books</i>Blog</a></li>
        <li><a href="/pages/contact.html"><i class="material-icons">mail</i>Contact</a></li>
    </ul>

    <?php
    $template = '
    <form action="manage.php" method="post">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" placeholder="Username" id="username" name="username">
                <label for="username"></label>
            </div>
            <div class="input-field col s12">
                <input type="password" placeholder="Password" id="password" name="password">
                <label for="password"></label>
            </div>
            <input type="submit" value="Log In" class="btn blue lighten-2 white-text">
        </div>
    </form>';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "admin" && $password == "1234") {
            echo '    
            <div class="content container center-align" style="min-height: 100vh;">
            <form id="add-form">
            <div class="row">
                <div class="input-field col s12 l6">
                    <input type="text" placeholder="eg. Chicken Rice" id="name" class="validate">
                    <label for="name">Food</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="text" placeholder="eg. McDonald" id="restaurant" class="validate">
                    <label for="restaurant">Restaurant Name</label>
                </div>
                <div class="input-field col s12 l8">
                    <input type="text" placeholder="eg. Brunswick" id="location" class="validate">
                    <label for="location">Location</label>
                </div>
                <div class="input-field col s12 l4">
                    <select id="stars">
                        <option value="" selected disable>Choose your option</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label for="stars">Stars Rating</label>
                </div>
                <div class="input-field col s12 l4">
                    <select id="fixedPrice">
                        <option value="" selected disable>Choose your option</option>
                        <option value="true">Fixed</option>
                        <option value="false">Approximately</option>
                    </select>
                    <label for="fixedPrice">Price Type</label>
                </div>
                <div class="input-field col s12 l4">
                    <input type="text" placeholder="eg. 4.50" id="price" class="validate">
                    <label for="price">Price</label>
                </div>
                <div class="input-field col s12 l4">
                    <select id="currency">
                        <option value="" selected disable>Choose your option</option>
                        <option value="MYR">Malaysian Ringgit (MYR)</option>
                        <option value="AUD">Australian Dollars (AUD)</option>
                        <option value="USD">American Dollars (USD)</option>
                    </select>
                    <label for="fixedPrice">Price Type</label>
                </div>
                <div class="input-field col s12 l4">
                    <textarea id="comments" class="materialize-textarea"></textarea>
                    <label for="comments">Comments</label>
                </div>
                <input type="submit" value="Add Review" class="btn blue lighten-2 white-text">
            </div>
        </form>
            </div>';
        } else {
            echo '
            <div class="content container center-align" style="min-height: 100vh;">'
                . $template .
                '<div class="card-panel red lighten-4 center-align">
                    <p>Your credential is incorrect</p>
                </div>
            </div>';
        }
    } else {
        echo '
    <div class="content container center-align" style="min-height: 100vh;">'
            . $template .
            '</div>';
    }
    ?>

    <!-- footer section -->
    <footer class="blue white-text lighten-2">
        <div class="container center-align">
            <h5>Keep in Touch!</h5>
            <br>
            <hr>
            <br>
            <div class="row">
                <div class="col l1 offset-l4 s3">
                    <a href="/"><i class="fab fa-instagram fa-3x"></i></a>
                </div>
                <div class="col l1 s3">
                    <a href="/"><i class="fab fa-facebook fa-3x"></i></a>
                </div>
                <div class="col l1 s3">
                    <a href="/"><i class="fab fa-twitter fa-3x"></i></a>
                </div>
                <div class="col l1 s3">
                    <a href="/"><i class="fab fa-youtube fa-3x"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container center-align">
                <span>Copyright &#xA9; 2019 FoodSplash! - All Rights Reserved</span>
            </div>
        </div>
    </footer>

    <!-- materialize js script -->
    <script src="/script/materialize.min.js"></script>
    <!-- custom js script -->
    <script src="/script/index.js"></script>
    <script src="/script/app.js"></script>
</body>

</html>
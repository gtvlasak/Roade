<?php
    // Houses the classes that are utilized to populate page information.
    include('search_functions.php');
    // Houses the code needed to integrate MySQL/PHP operations.
    include('database.php');
    include('city_list.php');
?>

<?php include('header.php'); ?>
<!-- Header information is generated here from PHP file. -->
<div class="jumbotron jumbotron-fluid">
    <div class="roadeIcon">
        <!-- Jumbotron and title area - beginning of index body -->
        <div class="container" id="portalBanner">
            <div class="row align-items-right text-right justify-content-right">
                <h1 class="display-4 col-sm-12" id="jumboTitle">REDEFINING MEANS OF <span
                        class="yellowText">TRANSPORTATION.</span><br /></h1>
            </div>
            <div class="row align-items-right text-right justify-content-right">
                <p class="lead col-sm-12 text-right" id="jumboHeader">FIND A FLEET NEAR YOU<br />AND <span
                        class="yellowText">JOIN THE REVOLUTION.</span></p>
            </div>
        </div>
    </div>
    <div class=" searchWrap">
        <div class="container searchContainer">
            <!-- Beginning of table structure for the array to be loaded into. -->
            <div class="row justify-content-center searchText">
                FIND A FLEET NEAR YOU.
            </div>
            <div class="d-flex justify-content-center h-100">
                <div class="searchbar">
                    <form method="post" action="" class="searchform">
                        <input class="search_input" type="text" name="name" placeholder="Search...">
                        <span class="search_icon">
                            <i class="fas fa-search">
                                <input type="submit" value="" name="submit" class="submitSearch">
                                <?php City::searchQuery($pdo) ?>
                                <!-- ABOVE CALLS THE SEARCH QUERY SCRIPTS NEEDED TO HAVE A WORKABLE SEARCH. OOP METHODS USED -->
                            </i>
                        </span>
                        <div class="suggested"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center howItWorks">
        <div class="container">
            <div class="row text-center justify-content-center">
                <h1 id="hiwText">
                    HOW IT <span class="yellowText">WORKS</span>
                </h1>
            </div>
            <div class="row text-center justify-content-center hiwContent">
                <div class="col-sm">
                    <img src="images/hiw1@2x.png" id="hiwImg1" />
                </div>
                <div class="col-sm">
                    <img src="images/hiw2@2x.png" id="hiwImg2" />
                </div>
                <div class="col-sm">
                    <img src="images/hiw3@2x.png" id="hiwImg3" />
                </div>
            </div>
        </div>
    </div>
    <script src="remove_search.js"></script>
    <?php include('footer.php'); ?>
    <!-- Footer information is generated here from PHP file. -->
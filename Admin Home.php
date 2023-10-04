

<html>

<head>
    <meta charset="utf-8">
    <title>Amethyst|Admin Home</title>
    <link rel="stylesheet" href="css/Admin Home - Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script defer src="include/Modify&Delete.js"></script>
</head>

<body>

    <?php
    include('include/Admin Header.php');
    require('include/mySQL Connect.php');
    require('include/Queries.php');

    if (isset($_GET['action']) && $_GET['action'] == "delete") {
        delete_product($dbc, $_GET['id']);
    }
    ?>

    <!-------- NO Products --------->
    <?php
    $product_result = products_display($dbc);
    if ($product_result == '0') { ?>
        <div class="no_products">
            <h1>No Products Found</h1>
            <a href="Add Products.php">Add Products</a>
        </div>
    <?php } ?>

    <?php if ($product_result != '0') { ?>
        <div class="main-body">

            <!-- search -->

            <form method="post" action="Admin Home.php">
                <div class="table-search-cell">
                    <input type="text" name="search" class="Search-input" placeholder="What are you looking for?">
                    <button class="search-button" type="submit" name="search_button">
                        <img class="search-button-image static" src="images/Static Search.png" alt="search icon" style='height: 100%; width: 100%; object-fit: contain'>
                        <img class="search-button-image move" src="images/Search.gif" alt="search icon" style='height: 100%; width: 100%; object-fit: contain'>
                    </button>
                </div>
            </form>

            <?php
            if (isset($_POST['search_button'])) {
                $result = search($dbc, $_POST['search']);
            ?>

                <div class="table-images-cell table-images-cell-search">
                    <table align="center" summary="Search Content/Products">
                        <?php if ($result == "none") { ?>
                            <h2 class="title">Sorry, no products found with the name "<?php echo $_POST['search']; ?> "</h2>
                        <?php } ?>

                        <?php if ($result == "no value") { ?>
                            <h2 class="title">Please enter a name to search and retry</h2>
                        <?php } ?>

                        <?php if ($result != "none" && $result != "no value") { ?>
                            <h2 class="title">Search Results for "<?php echo $_POST['search']; ?> "</h2>
                            <?php
                            $counter = 1;
                            // fetch each record in result set
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($counter == 1) {
                            ?>
                                    <tr>

                                    <?php
                                }
                                $counter++;
                                    ?>
                                    <td>
                                        <div class="image-overlay-container">
                                            <img src="<?php echo $row['picture']; ?>" alt="<?php echo "Picture: " . $row['picture']; ?>" class="image-overlay">
                                            <div class="image-overlay-position">
                                                <div class="image-overlay-buttons">
                                                    <input type="button" value="Modify" onclick="onModify(<?php echo $row['p_id']; ?>)" />
                                                </div>

                                                <div class="image-overlay-buttons">
                                                    <input type="button" value="Delete" onclick="onDelete(<?php echo $delete = $row['p_id']; ?>)" />
                                                </div>

                                            </div>
                                        </div>

                                        <div style="height: 50px;">
                                            <h4><?php echo $row['name']; ?></h4>
                                        </div>
                                        <div style="height: 50px;">
                                            <p><?php echo $row['price']; ?> SAR</p>
                                        </div>
                                    </td>


                                    <?php
                                    if ($counter  == 5) {
                                    ?>
                                    </tr>
                                    <br>

                                <?php
                                        $counter = 1;
                                    } ?>

                        <?php
                            }
                        } // end inner while
                        ?>
                    </table>

                </div>

            <?php } ?>


            <div class="table-images-cell">
                <table summary="Featured Products Content/Products">
                    <!-------- Featured Products --------->

                    <h2 class="title">Featured Products</h2>
                    <?php
                    $result = featured_products_display($dbc);
                    $counter = 1;
                    // fetch each record in result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($counter == 1) {
                    ?>
                            <tr>

                            <?php
                        }
                        $counter++;
                            ?>
                            <td>
                                <div class="image-overlay-container">
                                    <img src="<?php echo $row['picture']; ?>" alt="<?php echo "Picture: " . $row['picture']; ?>" class="image-overlay">
                                    <div class="image-overlay-position">
                                        <div class="image-overlay-buttons">
                                            <input type="button" value="Modify" onclick="onModify(<?php echo $row['p_id']; ?>)" />
                                        </div>

                                        <div class="image-overlay-buttons">
                                            <input type="button" value="Delete" onclick="onDelete(<?php echo $delete = $row['p_id']; ?>)" />
                                        </div>
                                    </div>
                                </div>

                                <div style="height: 50px;">
                                    <h4><?php echo $row['name'] ?></h4>
                                </div>
                                <div style="height: 50px;">
                                    <p><?php echo $row['price'] ?> SAR</p>
                                </div>
                            </td>


                            <?php
                            if ($counter  == 5) {
                            ?>
                            </tr>
                            <br>

                        <?php
                                $counter = 1;
                            } ?>

                    <?php
                    } // end inner while
                    ?>
                </table>
            </div>

            <!-------- Products --------->
            <div class="table-images-cell" id="Products">

                <table summary="All Products Content/Products">

                    <h2 class="title">Products</h2>
                    <?php
                    $result = products_display($dbc);
                    $counter = 1;
                    // fetch each record in result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($counter == 1) {
                    ?>
                            <tr>

                            <?php
                        }
                        $counter++;
                            ?>
                            <td>
                                <div class="image-overlay-container">
                                    <img src="<?php echo $row['picture']; ?>" alt="<?php echo "Picture: " . $row['picture']; ?>" class="image-overlay">
                                    <div class="image-overlay-position">
                                        <div class="image-overlay-buttons">
                                            <input type="button" value="Modify" onclick="onModify(<?php echo $row['p_id']; ?>)" />
                                        </div>

                                        <div class="image-overlay-buttons">
                                            <input type="button" value="Delete" onclick="onDelete(<?php echo $delete = $row['p_id']; ?>)" />
                                        </div>
                                    </div>
                                </div>

                                <div style="height: 50px;">
                                    <h4><?php echo $row['name'] ?></h4>
                                </div>
                                <div style="height: 50px;">
                                    <p><?php echo $row['price'] ?> SAR</p>
                                </div>
                            </td>


                            <?php
                            if ($counter  == 5) {
                            ?>
                            </tr>
                            <br>

                        <?php
                                $counter = 1;
                            } ?>

                    <?php
                    } // end inner while
                    ?>
                </table>
            </div>
        </div>

    <?php
    } //end of $product_result
    ?>


</body>

</html>

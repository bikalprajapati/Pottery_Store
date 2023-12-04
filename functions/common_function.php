<?php
//including connect file
// include('./includes/connect.php');

//getting products
function getproducts()
{
    global $con;

    //condition to check isset or not
    if (!isset($_GET['category'])) {


        $select_query = "Select * from `products` order by rand() LIMIT 0,9";
        // orderby product_title for alphabetic order
        $result_query = mysqli_query($con, $select_query);
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo "<div class='col-md-4  px-5 mt-2 '>
                    <div class='card mt-3 mb-5' style='width: 22rem;'>
                    
                        <img class='card-img-top' style='height: 200px; object-fit:contain;'
                         src='./admin./product_images/$product_image1' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}

// function getRecommendations()
// {
//     global $con;

//     //condition to check isset or not
//     if (!isset($_GET['category'])) {


//         $select_query = "Select * from `products` ";
//         // orderby product_title for alphabetic order
//         $result_query = mysqli_query($con, $select_query);
//         // $row = mysqli_fetch_assoc($result_query);
//         // echo $row['product_title'];
//         while ($row = mysqli_fetch_assoc($result_query)) {
//             $product_id = $row['product_id'];
//             $product_title = $row['product_title'];
//             $product_description = $row['product_description'];
//             $product_image1 = $row['product_image1'];
//             $product_image2 = $row['product_image2'];
//             $product_price = $row['product_price'];
//             $category_id = $row['category_id'];
//             echo "<div class='col-md-4  px-5 mt-2 '>
//                     <div class='card mt-3 mb-5' style='width: 22rem;'>

//                         <img class='card-img-top' style='height: 200px; object-fit:contain;'
//                          src='./admin./product_images/$product_image1' alt='$product_title'>
//                         <div class='card-body'>
//                             <h5 class='card-title'>$product_title</h5>
//                             <p class='card-text'>$product_description</p>
//                             <p class='card-text'>Price: $product_price/-</p>
//                             <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
//                             <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
//                         </div>
//                     </div>
//                 </div>";
//         }
//     }
// }

//getting all products
function get_all_products()
{
    global $con;

    //condition to check isset or not
    if (!isset($_GET['category'])) {


        $select_query = "Select * from `products` order by rand()";
        // orderby product_title for alphabetic order
        $result_query = mysqli_query($con, $select_query);
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo "<div class='col-md-4 mb-5 mt-3 px-5'>
                    <div class='card' style='width: 22rem;'>
                    
                        <img class='card-img-top' style='height: 200px; object-fit:contain;'
                         src='./admin./product_images/$product_image1' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }

}

//getting unique categories
function get_uniquecategories()
{
    global $con;

    //condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];

        $select_query = "Select * from `products` where category_id=$category_id";
        // orderby product_title for alphabetic order
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Stock For this Category</h2>";
        }

        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card' style='width: 22rem;'>
                    
                        <img class='card-img-top' style='height: 200px; object-fit:contain;'
                         src='./admin./product_images/$product_image1' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}


//Displaying Categories in sidenav
function getcategories()
{
    global $con;
    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    // $row_data = mysqli_fetch_assoc($result_categories);
    // echo $row_data['category_title'];
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        // echo $category_title;
        echo "<li class='nav-item'>
                    <a class='nav-link text-light' href='index.php?category=$category_id'>
                    $category_title
                </a></li>";
    }
}


//searching products
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `products` where product_keyword like  '%$search_data_value%'";
        // orderby product_title for alphabetic order
        $result_query = mysqli_query($con, $search_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No match found.The Searched Product is not present!</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card' style='width: 22rem;'>
                    
                        <img class='card-img-top' style='height: 200px; object-fit:contain;'
                         src='./admin./product_images/$product_image1' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}




////////w0rked
function calculateJaccardSimilarity($set1, $set2)
{
    $intersectionCount = count(array_intersect($set1, $set2));
    $unionCount = count(array_unique(array_merge($set1, $set2)));
    return $unionCount > 0 ? $intersectionCount / $unionCount : 0;
}

function view_recommend()
{
    global $con;

    if (isset($_GET['product_id']) && !isset($_GET['category'])) {
        $product_id = $_GET['product_id'];
        $no_recommendation = true; // Initialize the variable

        // Fetch the product's keywords (current product)
        $current_product_features_query = "SELECT product_keyword FROM products WHERE product_id = $product_id";
        $current_product_features_result = mysqli_query($con, $current_product_features_query);
        $current_product_row = mysqli_fetch_assoc($current_product_features_result);
        $current_product_features = explode(',', $current_product_row['product_keyword']);

        // Initialize an array to store product similarities
        $product_similarities = array();

        // Get all tables from the database
        $tables_query = "SELECT product_id, product_keyword, product_title, product_image1, product_description, product_price FROM products";
        $tables_result = mysqli_query($con, $tables_query);
        echo "<div class='mt-5'><h2>Recommended Products</h2></div><br/>";

        while ($table_row = mysqli_fetch_assoc($tables_result)) {
            $similar_product_id = $table_row['product_id'];

            // Skip the current product ID
            if ($similar_product_id == $product_id) {
                continue;
            }

            $table_product_features = explode(',', $table_row['product_keyword']);
            $similarity = calculateJaccardSimilarity($current_product_features, $table_product_features);

            if ($similarity > 0) {
                $no_recommendation = false; // There is at least one recommendation

                $similar_product_title = $table_row['product_title'];
                $similar_product_image = $table_row['product_image1'];
                $similar_product_description = $table_row['product_description'];
                $similar_product_price = $table_row['product_price'];

                echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card' style='width: 22rem;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$similar_product_title</h5>
                                <img class='card-img-top' style='height: 200px; object-fit:contain;'
                                    src='./admin./product_images/$similar_product_image' alt='$similar_product_title'>
                                <p class='card-text'>$similar_product_description</p>
                                <p class='card-text'>Price:$similar_product_price</p>

                                <a href='product_details.php?product_id=$similar_product_id' class='btn btn-info'>View Details</a>
                            </div>
                        </div>
                    </div>
                ";
            }
        }

        // Display a message if there are no recommendations
        if ($no_recommendation) {
            echo "<div class='mt-3 text-danger'><h2 class='text-center'>No recommendations available.</h2></div>";
        }
    }
}


// function view_recommend()
// {
//     global $con;

//     if (isset($_GET['product_id']) && !isset($_GET['category'])) {
//         $product_id = $_GET['product_id'];

//         // Fetch the product's keywords (current product)
//         $current_product_features_query = "SELECT product_keyword FROM products WHERE product_id = $product_id";
//         $current_product_features_result = mysqli_query($con, $current_product_features_query);
//         $current_product_row = mysqli_fetch_assoc($current_product_features_result);
//         $current_product_features = explode(',', $current_product_row['product_keyword']);

//         // Initialize an array to store product similarities
//         $product_similarities = array();

//         // Get all tables from the database
//         $tables_query = "SELECT product_id, product_keyword, product_title, product_image1, product_description FROM products";
//         $tables_result = mysqli_query($con, $tables_query);
//         echo "<div class='mt-5'><h2>Recommended Products</h2></div><br/>";

//         while ($table_row = mysqli_fetch_assoc($tables_result)) {
//             $similar_product_id = $table_row['product_id'];

//             // Skip the current product ID
//             if ($similar_product_id == $product_id) {
//                 continue;
//             }

//             $table_product_features = explode(',', $table_row['product_keyword']);
//             $similarity = calculateJaccardSimilarity($current_product_features, $table_product_features);

//             if ($similarity > 0) {
//                 $no_recommendation = false; // There is at least one recommendation

//                 $similar_product_title = $table_row['product_title'];
//                 $similar_product_image = $table_row['product_image1'];
//                 $similar_product_description = $table_row['product_description'];

//                 echo "
//                     <div class='col-md-4 mb-2'>
//                         <div class='card' style='width: 22rem;'>
//                             <div class='card-body'>
//                                 <h5 class='card-title'>$similar_product_title</h5>
//                                 <img class='card-img-top' style='height: 200px; object-fit:contain;'
//                                     src='./admin./product_images/$similar_product_image' alt='$similar_product_title'>
//                                 <p class='card-text'>$similar_product_description</p>
//                                 <a href='product_details.php?product_id=$similar_product_id' class='btn btn-info'>View Details</a>
//                             </div>
//                         </div>
//                     </div>
//                 ";
//             }
//         }

//         // Display a message if there are no recommendations
//         if ($no_recommendation) {
//             echo "<div class='mt-3 text-danger'><h2 class='text-center'>No recommendations available.</h2></div>";
//         }
//     }
// }

//////////



// //view_recommend()
// Function to calculate Jaccard similarity between two sets
// function calculateJaccardSimilarity($set1, $set2)
// {
//     $intersectionCount = count(array_intersect($set1, $set2));
//     $unionCount = count(array_unique(array_merge($set1, $set2)));
//     return $unionCount > 0 ? $intersectionCount / $unionCount : 0;
// }



// function view_recommend()
// {
//     global $con;

//     if (isset($_GET['product_id'])) {
//         if (!isset($_GET['category'])) {
//             $product_id = $_GET['product_id'];

//             // Fetch the product's keywords (current product)
//             $current_product_features_query = "SELECT product_keyword FROM products WHERE product_id = $product_id";
//             $current_product_features_result = mysqli_query($con, $current_product_features_query);
//             $current_product_row = mysqli_fetch_assoc($current_product_features_result);
//             $current_product_features = explode(',', $current_product_row['product_keyword']);

//             // Initialize an array to store product similarities
//             $product_similarities = array();

//             // Calculate Jaccard similarity for each product in the same category
//             $category_query = "SELECT category_id FROM products WHERE product_id = $product_id";
//             $category_result = mysqli_query($con, $category_query);
//             $row = mysqli_fetch_assoc($category_result);
//             $current_category_id = $row['category_id'];

//             $similar_products_query = "SELECT product_id, product_keyword FROM products WHERE category_id = $current_category_id AND product_id != $product_id";
//             $result_query = mysqli_query($con, $similar_products_query);

//             while ($row = mysqli_fetch_assoc($result_query)) {
//                 $similar_product_id = $row['product_id'];
//                 $similar_product_features = explode(',', $row['product_keyword']);

//                 // Calculate Jaccard similarity between the current product and each similar product
//                 $similarity = calculateJaccardSimilarity($current_product_features, $similar_product_features);

//                 // Store product similarity
//                 $product_similarities[$similar_product_id] = $similarity;
//             }

//             // Sort products by similarity in descending order
//             arsort($product_similarities);

//             // Display recommended products
//             echo "<div class='mt-5'><h2>Recommended Products</h2></div><br/>";

//             $no_recommendation = true; // Flag to check if there are no recommendations

//             foreach ($product_similarities as $similar_product_id => $similarity) {
//                 if ($similarity > 0) {
//                     $no_recommendation = false; // There is at least one recommendation

//                     // Fetch details of the similar product
//                     $similar_product_details_query = "SELECT * FROM products WHERE product_id = $similar_product_id";
//                     $similar_product_details_result = mysqli_query($con, $similar_product_details_query);
//                     $similar_product_details = mysqli_fetch_assoc($similar_product_details_result);

//                     // Display or recommend similar products
//                     echo "
//                         <div class='col-md-4 mb-2'>
//                             <div class='card' style='width: 22rem;'>
//                                 <div class='card-body'>
//                                     <h5 class='card-title'>" . $similar_product_details['product_title'] . "</h5>
//                                     <img class='card-img-top' style='height: 200px; object-fit:contain;'
//                                          src='./admin./product_images/" . $similar_product_details['product_image1'] . "' alt='" . $similar_product_details['product_title'] . "'>
//                                     <p class='card-text'>" . $similar_product_details['product_description'] . "</p>
//                                     <a href='product_details.php?product_id=$similar_product_id' class='btn btn-info'>View Details</a>
//                                 </div>
//                             </div>
//                         </div>
//                     ";
//                 }
//             }

//             // Display a message if there are no recommendations
//             if ($no_recommendation) {
//                 echo "<div class='mt-3 text-danger'><h2 class='text-center'>No recommendations available.</h2></div>";
//                 echo $similarity;

//             }
//         }
//     }
// }


// function view_recommend()
// {
//     global $con;

//     if (isset($_GET['product_id'])) {
//         if (!isset($_GET['category'])) {
//             $product_id = $_GET['product_id'];

//             // Fetch the category ID of the current product
//             $category_query = "SELECT category_id FROM products WHERE product_id = $product_id";
//             $category_result = mysqli_query($con, $category_query);
//             $row = mysqli_fetch_assoc($category_result);
//             $current_category_id = $row['category_id'];

//             // Fetch products with the same category
//             $similar_products_query = "SELECT * FROM products WHERE category_id = $current_category_id AND product_id != $product_id";
//             $result_query = mysqli_query($con, $similar_products_query);

//             // Features for the current product
//             $current_product_features_query = "SELECT product_keyword FROM products WHERE product_id = $product_id";
//             $current_product_features_result = mysqli_query($con, $current_product_features_query);
//             $current_product_row = mysqli_fetch_assoc($current_product_features_result);
//             $current_product_features = explode(',', $current_product_row['product_keyword']);

//             // Initialize an array to store product similarities
//             $product_similarities = array();

//             while ($row = mysqli_fetch_assoc($result_query)) {
//                 // Calculate Jaccard similarity between the current product and each similar product
//                 $similar_product_features = explode(',', $row['product_keyword']);
//                 $similarity = calculateJaccardSimilarity($current_product_features, $similar_product_features);

//                 // Store product similarity
//                 $product_similarities[$row['product_id']] = $similarity;
//             }

//             // Sort products by similarity in descending order
//             arsort($product_similarities);

//             echo "<div class='mt-5'><h2>Recommended Products</h2></div><br/>";

//             $no_recommendation = true; // Flag to check if there are no recommendations

//             foreach ($product_similarities as $similar_product_id => $similarity) {
//                 if ($similarity > 0) {
//                     $no_recommendation = false; // There is at least one recommendation

//                     // Fetch details of the similar product
//                     $similar_product_details_query = "SELECT * FROM products WHERE product_id = $similar_product_id";
//                     $similar_product_details_result = mysqli_query($con, $similar_product_details_query);
//                     $similar_product_details = mysqli_fetch_assoc($similar_product_details_result);

//                     // Display or recommend similar products
//                     echo "
//                         <div class='col-md-4 mb-2'>
//                             <div class='card' style='width: 22rem;'>
//                                 <div class='card-body'>
//                                     <h5 class='card-title'>" . $similar_product_details['product_title'] . "</h5>
//                                     <img class='card-img-top' style='height: 200px; object-fit:contain;'
//                                          src='./admin./product_images/" . $similar_product_details['product_image1'] . "' alt='" . $similar_product_details['product_title'] . "'>
//                                     <p class='card-text'>" . $similar_product_details['product_description'] . "</p>
//                                     <a href='product_details.php?product_id=$similar_product_id' class='btn btn-info'>View Details</a>
//                                 </div>
//                             </div>
//                         </div>
//                     ";
//                 }
//             }

//             // Display a message if there are no recommendations
//             if ($no_recommendation) {
//                 echo "<div class='mt-3 text-danger'><h2 class='text-center'>No recommendations available.</h2></div>";
//             }
//         }
//     }
// }

// Function to calculate Jaccard similarity between two sets
// function calculateJaccardSimilarity($set1, $set2)
// {
//     $intersectionCount = count(array_intersect($set1, $set2));
//     $unionCount = count(array_unique(array_merge($set1, $set2)));
//     return $intersectionCount / $unionCount;
// }


// function view_recommend()
// {

//     global $con;

//     if (isset($_GET['product_id'])) {
//         if (!isset($_GET['category'])) {
//             $product_id = $_GET['product_id'];

//             // Fetch the category ID of the current product
//             $category_query = "SELECT category_id FROM products WHERE product_id = $product_id";
//             $category_result = mysqli_query($con, $category_query);
//             $row = mysqli_fetch_assoc($category_result);
//             $current_category_id = $row['category_id'];

//             // Fetch products with the same category
//             $similar_products_query = "SELECT * FROM products WHERE category_id = $current_category_id AND product_id != $product_id";
//             $result_query = mysqli_query($con, $similar_products_query);
//             echo "<div class='mt-5'><h2>Recommended Products</h2></div><br/>";
//             $no_recommendation = true; // Flag to check if there are no recommendations

//             while ($row = mysqli_fetch_assoc($result_query)) {
//                 $no_recommendation = false; // There is at least one recommendation
//                 // Display the similar products or use them for recommendation
//                 // ...

//                 $similar_product_id = $row['product_id'];
//                 $similar_product_title = $row['product_title'];
//                 $similar_product_description = $row['product_description'];
//                 $similar_product_image = $row['product_image1'];
//                 // Display or recommend similar products

//                 echo "

//                 <div class='col-md-4 mb-2'>

//                         <div class='card' style='width: 22rem;'>

//                             <div class='card-body'>
//                                 <h5 class='card-title'>$similar_product_title</h5>
//                                 <img class='card-img-top' style='height: 200px; object-fit:contain;'
//                          src='./admin./product_images/$similar_product_image' alt='$similar_product_title'>
//                                 <p class='card-text'>$similar_product_description</p>

//                                 <a href='product_details.php?product_id=$similar_product_id' class='btn btn-info'>View Details</a>
//                             </div>
//                         </div>
//                     </div>
//                     ";
//             }
//             // Display a message if there are no recommendations
//             if ($no_recommendation) {
//                 echo "<div class='mt-3 text-danger'><h2 class='text-center'>No recommendations available.</h2></div>";
//             }
//         }
//     }
// }


//view details function
function view_details()
{
    global $con;

    if (isset($_GET['product_id'])) {

        //condition to check isset or not
        if (!isset($_GET['category'])) {

            $product_id = $_GET['product_id'];


            $select_query = "Select * from `products` where product_id = $product_id";
            // orderby product_title for alphabetic order
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];

                $product_price = $row['product_price'];
                $category_id = $row['category_id'];

                $productSet = array(
                    'product_id' => $product_id,
                    'product_title' => $product_title,
                    'product_description' => $product_description,
                    'product_price' => $product_price,
                    'category_id' => $category_id
                );


                echo "<div class='col-md-4 mb-2'>
                    <div class='card' style='width: 22rem;'>
                        <img class='card-img-top' style='height: 200px; object-fit:contain;'
                         src='./admin./product_images/$product_image1' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            <a href='index.php' class='btn btn-secondary'>Go Home</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                        <!-- related images -->
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related Products</h4>
                            </div>
                            <div class='col-md-10'>
                                <img class='card-img-top' style='height: 400px; object-fit:contain;'
                                    src='./admin./product_images/$product_image2' alt='$product_title'>

                            </div>
                            
                           

                        </div>
                    </div>
                    ";

            }
        }



    }

}

//get  Ip Address Function
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;

//cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item is added to cart')</script>";


        }
    }
}

//function to get cart item numbers
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);


    }
    echo $count_cart_items;
}

//total price in cart function
function toatal_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "Select * from `products` where product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;


        }
    }
    echo $total_price;
}

//get user order details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "Select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "Select * from`user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if ($row_count > 0) {
                        echo "<h3 class='mt-5 mb-2 text-center text-success my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                      <p class='text-center'>  <a class='text-dark' href='profile.php?my_orders'>Order Details</a></p>";
                    } else {
                        echo "<h3 class='mt-5 mb-2 text-center text-success my-5'>You have Zero pending orders</h3>
                        <p class='text-center'>  <a class='text-dark' href='../index.php'>Explore Products</a></p>";
                    }
                }


            }
        }
    }
}


?>
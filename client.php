<?php
require_once('includes/dbh-inc.php');
session_start();








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./style/style.css">
    <title>Get your plant </title>
</head>

<body class="flex flex-col min-h-screen relative">
    <nav>
        <div class="header bg-lime-700 flex justify-between">
            <div class="logo">
                <img class="h-16 mx-8" src="./images/opep-high-resolution-logo.png" alt="Logo">
            </div>
            <div class="register-link px-8  ">
                <ul class="flex ">
                    <li class="bg-white text-lime-700 px-16 cursor-pointer">Catalog </li>
                    <li class="  px-16 cursor-pointer "><img id="icon" class="h-8 " src="./images/icons9.png" alt=""></li>
                </ul>
            </div>
        </div>
    </nav>



    <section class="grid grid-cols-4">
        <?php
        $query = "SELECT * FROM plant  JOIN categories ON plant.cat_id = categories.cat_id; ";
        $exec = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($exec)) {




        ?>
            <div class="flex min-h-screen items-center justify-center">
                <div class=" px-5">
                    <div class="max-w-xs cursor-pointer rounded-lg bg-lime-700 p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
                        <img class="w-full h-64 rounded-lg object-cover object-center" src="<?php echo $row['pic']; ?>" alt="product" />
                        <div>
                            <div class="my-6 flex items-center justify-between px-4">
                                <p class="font-bold text-white"><?php echo $row['p_name']; ?></p>
                                <p class="rounded-full bg-lime-400 px-2 py-0.5 text-xs font-semibold text-white"><?php echo $row['price']; ?>$</p>
                            </div>
                            <div class="my-4 flex items-center justify-between px-4">
                                <p class="text-sm font-semibold text-white">Categorie</p>
                                <p class="rounded-full bg-lime-900 px-2 py-0.5 text-xs font-semibold text-white"><?php echo $row['cat_name']; ?></p>
                            </div>
                            <div class="my-4 flex items-center justify-between px-4">
                                <p class="text-sm font-semibold text-white">Stock</p>
                                <p class="rounded-full bg-lime-900 px-2 py-0.5 text-xs font-semibold text-white"><?php echo $row['qty']; ?></p>
                            </div>
                            <div class="my-4 flex items-center justify-center px-4">
                                <a href="#" id="add" name="add" class="text-white bg-lime-400 hover:bg-lime-400 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><?php $id = $row['plant_id']; ?>Add to cart</a>
                            </div>


                        </div>
                    </div>
                </div>



            </div>
        <?php
        }

        ?>
<?php 

while(isset($_POST['add'])){
    $query1 = "SELECT * FROM plant where plant_id = $id";
    $do = mysqli_query($con,$query1);
    $id = $row['plant_id'];
    




    
}



?>

        <div id="modal" class=" container    absolute right-0 w-1/2 bg-gray-200 h-screen transform translate-x-full transition-transform ease-in-out duration-300 ">
            <div class="flex pt-4">
                <div class="w-10/12 bg-lime-700 mx-auto rounded-lg shadow-lg ">
                    <img class="h-32 w-32 p-4" src="<?php echo $row['pic']; ?>" alt="">
                </div>
                <div>

                </div>
                




            </div>
        </div>

    </section>

    <footer class="bg-lime-700 h-16 text-center p-4 w-full ">
        <span class="text-center text-white">© 2023 O'PEP. All rights reserved.</span>
    </footer>
    <script src="./javascript/panier.js"></script>

</body>

</html>
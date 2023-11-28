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
    <title>Dashboard</title>
</head>

<body class="flex flex-col min-h-screen">
    <nav>
        <div class="header bg-lime-700 flex justify-between">
            <div class="logo">
                <img class="h-16 mx-8" src="./images/opep-high-resolution-logo.png" alt="Logo">
            </div>
            <div class="register-link px-8  ">
                <ul class="flex ">
                    <li class="text-white px-16 cursor-pointer"><a href="admin1.php">Categories</a></li>
                    <li class="bg-white text-lime-700 px-16 cursor-pointer"><a href="admin.php">Plants</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section>

        <div class=" min-h-screen items-center bg-white">
            <div class="p-6 px-0">
                <table class="w-full min-w-max table-auto text-left">
                    <thead>
                        <tr>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Plant</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Price</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">ID</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Status</p>
                            </th>
                            <th class="border-y border-blue-gray-900 opacity-90 p-4">
                                <button class="bg-transparent text-blue-gray-900 hover:bg-lime-700 text-blue-gray-900  font-semibold hover:text-blue-gray-900 py-2 px-4 border border-lime-700 hover:border-transparent rounded">
                                    Add Plant
                                </button>
                            </th>



                        </tr>
                    </thead>
                    <tbody>



                        <?php
                        $query = "SELECT * FROM plant";
                        $exec = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($exec)) {



                        ?>
                            <tr>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo $row['pic']; ?>" alt="Spotify" class="inline-block relative object-center !rounded-full w-12 h-12 rounded-lg  p-1">
                                        <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold"><?php echo $row['p_name']; ?></p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal"><?php echo $row['price']; ?>$</p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal"><?php echo $row['plant_id']; ?></p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-max">
                                        <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-900 py-1 px-2 text-xs rounded-md" style="opacity: 1;">
                                            <span class=""><?php echo $row['qty']; ?></span>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-900 hover:bg-lime-700/75 active:bg-lime-700" type="button">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </td>





                    </tbody>

                    </tr>
                <?php
                        }
                ?>
                </table>

            </div>


        </div>

    </section>



    <footer class="bg-lime-700 h-16 text-center p-4 w-full ">
        <span class="text-center text-white">© 2023 O'PEP. All rights reserved.</span>
    </footer>
</body>

</html>
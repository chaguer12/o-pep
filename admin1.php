<?php
require_once('includes/dbh-inc.php');
session_start();

// Process form submission for category addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_cat'])) {
    $cat_name = mysqli_real_escape_string($con, $_POST['category']);

    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO categories (cat_name) VALUES (?)";
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameter and execute the statement
    mysqli_stmt_bind_param($stmt, "s", $cat_name);
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    if ($result) {
        // Insert successful, redirect to prevent re-submission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        // Insert failed
        echo "Error: " . mysqli_error($con);
    }
}

// Process form submission for category deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_cat'])) {
    $cat_id = mysqli_real_escape_string($con, $_POST['delete_cat']);

    // Use prepared statement to prevent SQL injection
    $query = "DELETE FROM categories WHERE cat_id = ?";
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameter and execute the statement
    mysqli_stmt_bind_param($stmt, "i", $cat_id);
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    if (!$result) {
        // Deletion failed
        echo "Error: " . mysqli_error($con);
    }
}

// Process form submission for category modification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_cat'])) {
    $edit_cat_id = mysqli_real_escape_string($con, $_POST['edit_cat_id']);
    $new_category_name = mysqli_real_escape_string($con, $_POST['new_category']);

    // Use prepared statement to prevent SQL injection
    $query = "UPDATE categories SET cat_name = ? WHERE cat_id = ?";
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "si", $new_category_name, $edit_cat_id);
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    if ($result) {
        // Update successful, you can redirect or display a success message
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        // Update failed
        echo "Error: " . mysqli_error($con);
    }
}
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

<body class="flex flex-col min-h-screen bg-white">
    <nav>
        <div class="header bg-lime-700 flex justify-between">
            <div class="logo">
                <img class="h-16 mx-8" src="./images/opep-high-resolution-logo.png" alt="Logo">
            </div>
            <div class="register-link px-8  ">
                <ul class="flex ">
                    <li class="bg-white text-lime-700 px-16 cursor-pointer"><a href="admin1.php">Categories</a></li>
                    <li class="text-white px-16 cursor-pointer"><a href="admin.php">Plants</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="min-h-screen items-center bg-white">
            <div class="p-6 px-0">
                <div class="m-8">
                    <form action="" method="post">
                        <td>
                            <input type="text" name="category" required placeholder="Enter category" class="border border-solid px-2 py-1">
                        </td>
                        <td>
                            <button name="add_cat" type="submit" class="bg-lime-700 text-white px-4 py-2 rounded-md">
                                Add category
                            </button>
                        </td>
                    </form>
                </div>

                <table class="w-full min-w-max table-auto text-left">
                    <thead>
                        <tr>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">ID</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Category</p>
                            </th>
                            <th class="border-y border-blue-gray-900 opacity-90 p-4">
                                <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Actions</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM categories";
                        $exec = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($exec)) {
                        ?>
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal"><?php echo $row['cat_id']; ?></p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <!-- Display the category name -->
                                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal"><?php echo $row['cat_name']; ?></p>

                                    <!-- Add an input field for editing -->
                                    <form action="" method="post">
                                        <input type="hidden" name="edit_cat_id" value="<?php echo $row['cat_id']; ?>">
                                        <input type="text" name="new_category" placeholder="Enter new category name" class="border border-solid px-2 py-1">
                                        <button name="edit_cat" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                            Update
                                        </button>
                                    </form>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <form action="" method="post">
                                        <input type="hidden" name="delete_cat" value="<?php echo $row['cat_id']; ?>">
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <footer class="bg-lime-700 h-16 text-center p-4 w-full">
        <span class="text-center text-white">© 2023 O'PEP. All rights reserved.</span>
    </footer>
</body>

</html>

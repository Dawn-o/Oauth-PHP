<?php

session_start();

if (!isset($_SESSION['authenticate'])) {
    header("location: index.php?message=please_login_first");
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Meet our talented team driving the success of our platform." />
        <meta name="keywords" content="team, web development, technology" />
        <link href="../src/output.css" rel="stylesheet" />
        <title>Main Page</title>
    </head>

    <body class="bg-gray-900 font-body">


        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Welcome Back,<br /> <?= $_SESSION['name'] ?>!</h2>
                <p class="font-light lg:mb-16 sm:text-xl text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis vel harum ipsum odio optio, aliquam impedit quod error magni quaerat..</p>
            </div>
            <div class="flex justify-center">
                <div class="rounded-lg shadow w-52 bg-gray-800 border-gray-700 flex items-center">
                    <img class="w-16 h-16 rounded-full object-cover mx-2 my-2" src="<?= $_SESSION['picture'] ?>" alt="<?= $_SESSION['name'] ?>">
                    <div class="p-5">
                        <h3 class="text-xl font-bold tracking-tight text-white">
                            <p><?= $_SESSION['name'] ?></p>
                        </h3>
                        <span class="text-gray-400"><?= $_SESSION['email'] ?></span>
                        <p class="mt-3 mb-4 font-light text-gray-400">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi, molestias.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4">
                <a href="../function/google_auth.php?logout" class="text-white uppercase font-medium px-5 py-2.5 me-2 mb-2 hover:underline">
                    Logout
                </a>
            </div>

        </div>
        <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

    </body>

    </html>
<?php } ?>
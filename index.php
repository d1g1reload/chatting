<?php
include 'core/init.php';

if($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST)) {

        $email = trim(stripslashes(htmlentities($_POST["email"], ENT_QUOTES)));
        $password = $_POST['password'];

        if(!empty($email) && !empty($password)) {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid format email";
            } else {
                $user = $userObj->emailExists($email);
                if($user) {
                    var_dump($user);
                } else {
                    $error = "your email not found";
                }
            }
        } else {
            $error = "Please enter email and password for login!";
        }

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Facebook Messenger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="assets/style/style.css">
</head>
<body>
<div class="wrapper">
<div class="inner-wrapper">
<!--WRAPPER FOR LOGIN-->
<div class="flex h-screen w-screen justify-center"> 
<div class="h-4/5 w-full flex fb-body-bg">
<div class="flex items-center flex-1">
<div class="flex mx-auto" style="width: 980px;">
    <div class="flex-col flex p-2 pt-16"> 
        <div>
            <h1 class="font-bold fb-color text-6xl">facebook</h1>
        </div>
        <div>
            <h2 class="text-gray-700 text-4xl">Facebook helps you connect and share with the people in your life.</h2>
        </div>
    </div>
    <div style="width: 396px;" class="shadow-md bg-white rounded-xl border border-gray-100 mx-2">
        <div>
            <div class="mx-1 my-1 p-2">
                <ul class="flex flex-col">
                    <form method="POST">
                    <li class="m-1 my-2">
                    <input  type="Email" 
                            name="email" 
                            placeholder="Email address or phone number"
                            class="login-input"
                            >
                    </li>
                    <li class="m-1 my-2">
                    <input  type="password" 
                            name="password" 
                            placeholder="Password"
                            class="login-input"
                            >
                    </li>
                    <li class="m-1 my-2">
                     <!-- ERROR -->
                      <?php
                        if(isset($error)) {
                            echo '<p class="text-red-400 text-sm">'.$error.'</p>';
                        }
?>
                     </li>
                    <li class="m-1 my-2">
                        <button class="text-lg py-2 px-5 fb-bg text-white w-full rounded-lg font-bold">Log In</button>
                    </li>
                    <li class="m-1 my-2 text-center">
                        <a href="#" class="fb-color text-sm">Forgot password</a>
                    </li>
                    <li class="m-1 my-2 border-t border-gray-200"></li>
                    <li class="m-1 my-2 text-center">
                        <button class="text-lg py-2 px-5 fb-green text-white rounded-lg font-bold">Create New Account</button>
                    </li>
                     
                </form>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div><!--WRAPPER FOR LOGIN-END-->
</div><!----INNER_WRAPPER---->
</div><!----WRAPPER ENDSS--->
</body>
</html>
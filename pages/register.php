<?php
require_once '../base.php';

require __DIR__ . "./../vendor/autoload.php";

if(isset($_GET['register']))
{

    $userController = new \App\Controllers\UserController();

    switch ($_GET['register'])
    {
        case 'client':
            $result = $userController->createUser(\App\Entity\User::PROFILE_CLIENT, [
                    'first_name' =>  $_POST['firstName'],
                    'last_name' => $_POST['lastName'],
                    'password' => $_POST['password'],
                    'email' => $_POST['email'],
                    'mobile' => $_POST['phone'],
//                    'gender' => $_POST['gender'],
//                    'answer' => $_POST['answer'],
                    ]);
            break;
        case 'user':
            $result =  $userController->createUser(\App\Entity\User::PROFILE_USER, [
                'first_name' =>  $_POST['firstNameUser'],
                'last_name' => $_POST['lastNameUser'],
                'password' => $_POST['passwordUser'],
                'email' => $_POST['emailUser'],
                #'mobile' => $_POST['phone'],
            ]);
            break;
    }


}


?>


<style>
    .register {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 3%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }
</style>

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEyIDUxMiIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnPjxwYXRoIGQ9Im00MzEuNDIzIDIwMi4xMzVoLTU4LjE0di00OS4zOGwtMTUuMDYtLjAzLTI4NC4xMS0uNjJ2MzIyLjRjLTUuODggMC0xMC45NyAzLjM3LTEzLjQ0IDguMjktMS4wMSAyLjAyLTEuNTggNC4yOS0xLjU4IDYuNzEgMCA0LjE0IDEuNjggNy44OSA0LjQgMTAuNnM2LjQ3IDQuMzkgMTAuNjIgNC4zOWgyOTkuMTdjOC4yOSAwIDE1LjAxLTYuNzEgMTUuMDEtMTQuOTkgMC00LjE1LTEuNjgtNy44OS00LjQtMTAuNjEtMi43MS0yLjcxLTYuNDctNC4zOS0xMC42MS00LjM5di03OS43OGg1OC4xNGMxNi40MSAwIDI5LjcxLTEzLjMgMjkuNzEtMjkuNzF2LTEzMy4xN2MwLTE2LjQxLTEzLjMtMjkuNzEtMjkuNzEtMjkuNzF6bS0uMjkgMTYyLjU5aC01Ny44NXYtMTMyLjU5aDU3Ljg1eiIgZmlsbD0iI2ZmZThhNyIvPjxwYXRoIGQ9Im00MzEuNDIzIDIwMi4xMzVoLTU4LjE0di00OS4zOGwtMTUuMDYtLjAzdjMwNS40N2MwIDEzLjU4LTExLjAyIDI0LjYtMjQuNiAyNC42aC0yNzIuOTVjLTEuMDEgMi4wMi0xLjU4IDQuMjktMS41OCA2LjcxIDAgNC4xNCAxLjY4IDcuODkgNC40IDEwLjZzNi40NyA0LjM5IDEwLjYyIDQuMzloMjk5LjE3YzguMjkgMCAxNS4wMS02LjcxIDE1LjAxLTE0Ljk5IDAtNC4xNS0xLjY4LTcuODktNC40LTEwLjYxLTIuNzEtMi43MS02LjQ3LTQuMzktMTAuNjEtNC4zOXYtNzkuNzhoNTguMTRjMTYuNDEgMCAyOS43MS0xMy4zIDI5LjcxLTI5Ljcxdi0xMzMuMTdjMC0xNi40MS0xMy4zLTI5LjcxLTI5LjcxLTI5Ljcxem0tLjI5IDE2Mi41OWgtNTcuODV2LTEzMi41OWg1Ny44NXoiIGZpbGw9IiNmZmQ0NjkiLz48cGF0aCBkPSJtMzQzLjY5MyAxNTIuMTA1djI3Ni4wOWMwIDE0Ljk3LTEyLjEzIDI3LjEtMjcuMSAyNy4xaC0xODUuNzljLTE0Ljk3IDAtMjcuMTEtMTIuMTMtMjcuMTEtMjcuMXYtMjc1LjQxeiIgZmlsbD0iI2U5ZmJmZiIvPjxwYXRoIGQ9Im0zNDMuNjkzIDIwMi44MjV2MjI1LjM3YzAgMTQuOTctMTIuMTMgMjcuMS0yNy4xIDI3LjFoLTE4NS43OWMtMTEuNzUgMC0yMS43Ni03LjQ4LTI1LjUyLTE3Ljk0LTEuMDMtMi44Ni0xLjU5LTUuOTUtMS41OS05LjE2di0yMzguMDZjNDAgMCA0MCAxNCA4MCAxNCA3LjU1IDAgMTMuNjctLjUgMTguOTEtMS4zMXoiIGZpbGw9IiNmZWFmODIiLz48cGF0aCBkPSJtMzQzLjY5MyAyMDIuODI1djIyNS4zN2MwIDE0Ljk3LTEyLjEzIDI3LjEtMjcuMSAyNy4xaC0xODUuNzljLTExLjc1IDAtMjEuNzYtNy40OC0yNS41Mi0xNy45NGgyMDQuMTdjOC41NCAwIDE1LjQ2LTYuOTMgMTUuNDYtMTUuNDZ2LTIxOS4wN3oiIGZpbGw9IiNkZjlmN2EiLz48Zz48cGF0aCBkPSJtNDA2LjIyNyAxMjIuOTN2LjI1YzAgMTYuMzMtMTMuMjQgMjkuNTctMjkuNTcgMjkuNTctOS4xIDAtMTcuMzQgMy42OS0yMy4zMSA5LjY1LTUuOTYgNS45Ny05LjY1IDE0LjIxLTkuNjUgMjMuMzF2MjUuMjhjMCA5LjYyLTcuODEgMTcuNDMtMTcuNDMgMTcuNDItNC44MiAwLTkuMTctMS45NS0xMi4zMi01LjFzLTUuMS03LjUxLTUuMS0xMi4zMnYtMjMuMDNjMC0xMC44Ni04LjgxLTE5LjY3LTE5LjY4LTE5LjY3LTUuNDMgMC0xMC4zNSAyLjItMTMuOTEgNS43NnMtNS43NiA4LjQ4LTUuNzYgMTMuOTF2MTYuNjVjMCA0LjU3LTEuODUgOC43MS00Ljg1IDExLjcxcy03LjE0IDQuODUtMTEuNzEgNC44NS04LjcyIDEuODUtMTEuNzIgNC44NWMtMi45OSAzLTQuODUgNy4xNC00Ljg1IDExLjcxdjQwLjg0YzAgOS4zMy03LjU2IDE2Ljg5LTE2Ljg4IDE2Ljg5LTkuMzMgMC0xNi44OS03LjU2LTE2Ljg5LTE2Ljg5di05Mi44MmMwLTE4LjItMTQuNzYtMzIuOTYtMzIuOTYtMzIuOTZoLTg5LjJjLTEzLjE4IDAtMjQuMzUtOC42Mi0yOC4xNi0yMC41NC0uOTItMi44NS0xLjQxLTUuODgtMS40MS05LjAzdi0uMjVjLjAxLTE0LjQ3IDEwLjQ4LTI2LjggMjQuNzYtMjkuMTUuOTctMjEuNjggMTguNTYtMzguOSA0MC4yNi0zOS40MiAyLjg0IDAgNS42Ny4zMiA4LjQ0Ljk1LS4yMy0xLjc4LS4zNC0zLjU3LS4zNi01LjM2LS41Ni0yMi44OSAxNy41Mi00MS45IDQwLjQxLTQyLjQ5IDE3Ljc0LjI4IDMzLjI1IDEyLjA1IDM4LjMxIDI5LjA1IDEwLjE3LTE2LjkyIDI4LjA0LTI3Ljc0IDQ3Ljc1LTI4LjkyIDMzLjAzLTEuOTkgNjEuNDMgMjMuMTcgNjMuNDIgNTYuMjEgNy40Mi04LjIgMTcuOTQtMTIuOSAyOS0xMi45NSAxLjU1LjA0IDMuMDkuMTYgNC41OS4zNyAyMC42NyAyLjgyIDM2LjM0IDIwLjc5IDM1LjgyIDQyLjEyIDAgLjI4LS4wNC41MS0uMDQuNzYgNi43MiAxLjUzIDEyLjQ3IDUuMjggMTYuNTQgMTAuMzcgNC4wNiA1LjA5IDYuNDYgMTEuNTMgNi40NiAxOC40MnoiIGZpbGw9IiNlOWZiZmYiLz48cGF0aCBkPSJtNDA2LjIyNyAxMjIuOTN2LjI1YzAgMTYuMzMtMTMuMjQgMjkuNTctMjkuNTcgMjkuNTctOS4xIDAtMTcuMzQgMy42OS0yMy4zMSA5LjY1LTUuOTYgNS45Ny05LjY1IDE0LjIxLTkuNjUgMjMuMzF2MjUuMjhjMCA5LjYyLTcuODEgMTcuNDMtMTcuNDMgMTcuNDItNC44MiAwLTkuMTctMS45NS0xMi4zMi01LjFzLTUuMS03LjUxLTUuMS0xMi4zMnYtMjMuMDNjMC0xMC44Ni04LjgxLTE5LjY3LTE5LjY4LTE5LjY3LTUuNDMgMC0xMC4zNSAyLjItMTMuOTEgNS43NnMtNS43NiA4LjQ4LTUuNzYgMTMuOTF2MTYuNjVjMCA0LjU3LTEuODUgOC43MS00Ljg1IDExLjcxcy03LjE0IDQuODUtMTEuNzEgNC44NS04LjcyIDEuODUtMTEuNzIgNC44NWMtMi45OSAzLTQuODUgNy4xNC00Ljg1IDExLjcxdjQwLjg0YzAgOS4zMy03LjU2IDE2Ljg5LTE2Ljg4IDE2Ljg5LTkuMzMgMC0xNi44OS03LjU2LTE2Ljg5LTE2Ljg5di05Mi44MmMwLTE4LjItMTQuNzYtMzIuOTYtMzIuOTYtMzIuOTZoLTg5LjJjLTEzLjE4IDAtMjQuMzUtOC42Mi0yOC4xNi0yMC41NGgyODguMzNjMTIuMTEgMCAyMS45My05LjgyIDIxLjkzLTIxLjkzdi0yMS4zNGMwLTE0LjYyLTUuNzUtMjcuOTEtMTUuMDktMzcuNzIgMjAuNjcgMi44MiAzNi4zNCAyMC43OSAzNS44MiA0Mi4xMiAwIC4yOC0uMDQuNTEtLjA0Ljc2IDYuNzIgMS41MyAxMi40NyA1LjI4IDE2LjU0IDEwLjM3IDQuMDYgNS4wOSA2LjQ2IDExLjUzIDYuNDYgMTguNDJ6IiBmaWxsPSIjZDBlZGY1Ii8+PC9nPjwvZz48Zz48cGF0aCBkPSJtNDMxLjQyNSAxOTQuNjM3aC01MC42NDR2LTM0LjYxNGMxOC41MS0yLjA1NyAzMi45NTEtMTcuNzk1IDMyLjk1MS0zNi44NDN2LS4yNTljLS4wMi0xNS4zNTItOS4yNjItMjguNzE1LTIzLjA5NC0zNC4yOTItMS44NzMtMjQuNzI3LTIyLjI3OC00NC41ODItNDcuNTgzLTQ1LjIzMy0uMDc1LS4wMDMtLjE1MS0uMDAzLS4yMjQtLjAwMy04LjM5NC4wMzQtMTYuNTY1IDIuMzQxLTIzLjY2OSA2LjU0NC04LjEyOC0zMC4yNjktMzYuNzEtNTEuNzcxLTY5LjE3OC00OS43OTYtMTcuNzA0IDEuMDY2LTM0LjA2OSA5LjAzLTQ1Ljc4IDIxLjg4My04LjUzOS0xMy4zMDItMjMuMjQ3LTIxLjc1OS0zOS43MDctMjIuMDIyLS4xMDQtLjAwMi0uMjA4LS4wMDEtLjMxMy4wMDItMjUuODcyLjY2Ni00Ni42MjEgMjEuNDA2LTQ3LjY4MSA0Ni45MDItLjIwMi0uMDAzLS40MDQtLjAwNS0uNjA3LS4wMDUtLjA1NS4wMDEtLjEyNS4wMDEtLjE4OS4wMDItMjMuNjEzLjU2My00My4yNTkgMTguMTAyLTQ2Ljk4NSA0MC45MTUtMTQuOTc5IDQuOTQzLTI1LjM0NSAxOC45MTUtMjUuMzU0IDM1LjE1MnYuMjQ5YzAgMTUuNTU2IDkuNjMyIDI4LjkwNCAyMy4yNDUgMzQuMzk2djYyLjUyOGMwIDQuMTQzIDMuMzU4IDcuNSA3LjUgNy41czcuNS0zLjM1NyA3LjUtNy41di01OS44NTNoMTQuNTg1djI2Ny45MDNjMCAxOS4wOCAxNS41MjMgMzQuNjAzIDM0LjYwNCAzNC42MDNoMTEzLjE5N2M0LjE0MiAwIDcuNS0zLjM1NyA3LjUtNy41cy0zLjM1OC03LjUtNy41LTcuNWgtMTEzLjE5OGMtMTAuODEgMC0xOS42MDQtOC43OTQtMTkuNjA0LTE5LjYwM3YtMjMwLjM2N2MxMy44NTcuNzMzIDIxLjc0MiAzLjQ5MiAzMC4wMjEgNi4zODkgMTAuNDI0IDMuNjQ4IDIxLjIwMyA3LjQyMSA0Mi40NzcgNy40MjEgNC4wMzUgMCA3LjgxNy0uMTM1IDExLjQwNy0uNDF2NjcuMzQ4YzAgMTMuNDQ1IDEwLjkzOSAyNC4zODQgMjQuMzg1IDI0LjM4NHMyNC4zODYtMTAuOTM4IDI0LjM4Ni0yNC4zODR2LTQwLjg0MWMwLTQuOTk4IDQuMDY2LTkuMDYzIDkuMDY1LTkuMDYzIDEzLjI3IDAgMjQuMDY1LTEwLjc5NSAyNC4wNjUtMjQuMDY0di0xNi42NDVjMC02LjcxIDUuNDYtMTIuMTY5IDEyLjE3MS0xMi4xNjlzMTIuMTcxIDUuNDU5IDEyLjE3MSAxMi4xNjl2MjMuMDI4YzAgMTMuNzQxIDExLjE3OSAyNC45MjIgMjQuOTIxIDI0LjkyNWguMDA1YzMuNDcyIDAgNi44MzUtLjcwNSA5LjkyNi0yLjA0N3YxOTQuMzI3YzAgMTAuODA5LTguNzk0IDE5LjYwMy0xOS42MDQgMTkuNjAzaC0zNy45MzhjLTQuMTQyIDAtNy41IDMuMzU3LTcuNSA3LjVzMy4zNTggNy41IDcuNSA3LjVoMzcuOTM4YzE5LjA4MSAwIDM0LjYwNC0xNS41MjIgMzQuNjA0LTM0LjYwM3YtMjQyLjQ4M2MwLTEwLjE1IDUuOTcxLTE4LjkzMSAxNC41ODQtMjMuMDE3djM5LjQ0M2MwIDQuMTQzIDMuMzU4IDcuNSA3LjUgNy41aDU4LjE0NGMxMi4yNDYgMCAyMi4yMDggOS45NjIgMjIuMjA4IDIyLjIwNnYxNi43MTZjMCA0LjE0MyAzLjM1OCA3LjUgNy41IDcuNXM3LjUtMy4zNTcgNy41LTcuNXYtMTYuNzE2YzAtMjAuNTE2LTE2LjY5Mi0zNy4yMDYtMzcuMjA4LTM3LjIwNnptLTIzNi4zMjQgMS41MzljLTMuNTQuMzA4LTcuMzE2LjQ2LTExLjQwNy40Ni0xOC43MjUgMC0yNy44NTUtMy4xOTUtMzcuNTIxLTYuNTc4LTkuMTIyLTMuMTkzLTE4LjUxNS02LjQ4LTM0Ljk3Ni03LjI1MnYtMjIuNTE2aDU4LjQ0MmMxNC4wNCAwIDI1LjQ2MiAxMS40MjEgMjUuNDYyIDI1LjQ2em0xNDEuMDk2LTEwLjQ2NXYyNS4yNzhjMCAyLjY1MS0xLjAzMyA1LjE0NC0yLjkwOCA3LjAxOS0xLjg3NSAxLjg3NC00LjM2NyAyLjkwNi03LjAxOSAyLjkwNmgtLjAwMmMtNS40NzItLjAwMS05LjkyNC00LjQ1My05LjkyNC05LjkyNXYtMjMuMDI4YzAtMTQuOTgxLTEyLjE4OS0yNy4xNjktMjcuMTcxLTI3LjE2OXMtMjcuMTcxIDEyLjE4OC0yNy4xNzEgMjcuMTY5djE2LjY0NWMwIDQuOTk4LTQuMDY3IDkuMDY0LTkuMDY1IDkuMDY0LTEzLjI3IDAtMjQuMDY1IDEwLjc5NS0yNC4wNjUgMjQuMDYzdjQwLjg0MWMwIDUuMTc0LTQuMjEgOS4zODQtOS4zODYgOS4zODQtNS4xNzUgMC05LjM4NS00LjIxLTkuMzg1LTkuMzg0di05Mi44MjRjMC0yMi4zMS0xOC4xNTEtNDAuNDYtNDAuNDYyLTQwLjQ2aC04OS4xOTljLTEyLjE3MSAwLTIyLjA3My05LjkwMS0yMi4wNzMtMjIuMDcxdi0uMjQ1Yy4wMDYtMTAuODQzIDcuNzc3LTE5Ljk5IDE4LjQ3OC0yMS43NTEgMy40OTktLjU3NSA2LjExNi0zLjUyMiA2LjI3NS03LjA2NS43ODktMTcuNjM3IDE1LjIwOC0zMS43ODggMzIuODQ5LTMyLjI1NyAyLjI1My4wMSA0LjUxMS4yNjcgNi43MTIuNzYyIDIuMzg0LjUzNiA0Ljg4MS0uMTIxIDYuNjkxLTEuNzY2IDEuODA5LTEuNjQ0IDIuNzA0LTQuMDY2IDIuMzk3LTYuNDkxLS4xODctMS40NzktLjI4Ny0yLjk4My0uMjk3LTQuNDcgMC0uMDQ1LS4wMDEtLjA4OS0uMDAyLS4xMzMtLjQ1Ny0xOC42NTcgMTQuMzA4LTM0LjIzNSAzMi45NDQtMzQuODAxIDE0LjQ3Ni4yOTkgMjYuOTU1IDkuODAyIDMxLjA4MyAyMy42OS44NDcgMi44NSAzLjI5NiA0LjkzIDYuMjQ0IDUuMzA0IDIuOTQ4LjM3OCA1Ljg0LTEuMDI4IDcuMzcyLTMuNTc0IDguOTA3LTE0LjgwOSAyNC41MjMtMjQuMjcgNDEuNzczLTI1LjMwOSAyOC44NTktMS43NDEgNTMuNzQ3IDIwLjMyMiA1NS40ODUgNDkuMTc1LjE4MiAzLjAxNSAyLjE1MyA1LjYyNSA1LjAwMiA2LjYyNiAyLjg1Ljk5OSA2LjAyMS4xOTMgOC4wNDYtMi4wNDYgNS45NjQtNi41OTQgMTQuNDczLTEwLjQwNyAyMy4zNjEtMTAuNDc1IDE4LjY1Ny41NDIgMzMuNDQ1IDE2LjEzIDMyLjk4NyAzNC44MDJ2LjAwNGMtLjAyNC4zMTMtLjA0MS42MTktLjA0MS45NDUgMCAzLjUwMSAyLjQyMiA2LjUzNyA1LjgzNiA3LjMxMyAxMC4wOTYgMi4yOTYgMTcuMTU2IDExLjEzIDE3LjE2OSAyMS40NzN2LjI0OWMwIDEyLjE3LTkuOTAyIDIyLjA3MS0yMi4wNzMgMjIuMDcxLTIyLjMxLjAwMS00MC40NjEgMTguMTUxLTQwLjQ2MSA0MC40NjF6Ii8+PHBhdGggZD0ibTM3My4yODEgMzcyLjIyOGg1Ny44NTJjNC4xNDIgMCA3LjUtMy4zNTcgNy41LTcuNXYtMTMyLjU5M2MwLTQuMTQzLTMuMzU4LTcuNS03LjUtNy41aC01Ny44NTJjLTQuMTQyIDAtNy41IDMuMzU3LTcuNSA3LjV2MTMyLjU5M2MwIDQuMTQyIDMuMzU4IDcuNSA3LjUgNy41em03LjUtMTMyLjU5M2g0Mi44NTJ2MTE3LjU5M2gtNDIuODUyeiIvPjxwYXRoIGQ9Im00NjEuMTMzIDI3NS4zNDZjLTQuMTQyIDAtNy41IDMuMzU3LTcuNSA3LjV2ODIuMTczYzAgMTIuMjQ0LTkuOTYzIDIyLjIwNi0yMi4yMDggMjIuMjA2aC01OC4xNDRjLTQuMTQyIDAtNy41IDMuMzU3LTcuNSA3LjV2NzkuNzc4YzAgNC4xNDMgMy4zNTggNy41IDcuNSA3LjUgNC4xNDQgMCA3LjUxNSAzLjM2NCA3LjUxNSA3LjQ5OXMtMy4zNzEgNy40OTgtNy41MTUgNy40OThoLTI5OS4xNjljLTQuMTQ0IDAtNy41MTUtMy4zNjMtNy41MTUtNy40OThzMy4zNzEtNy40OTkgNy41MTUtNy40OTljNC4xNDIgMCA3LjUtMy4zNTcgNy41LTcuNXYtMjE5LjU0OWMwLTQuMTQzLTMuMzU4LTcuNS03LjUtNy41cy03LjUgMy4zNTctNy41IDcuNXYyMTMuMzMyYy04LjczOCAzLjA5NS0xNS4wMTUgMTEuNDM3LTE1LjAxNSAyMS4yMTYgMCAxMi40MDUgMTAuMSAyMi40OTggMjIuNTE1IDIyLjQ5OGgyOTkuMTY5YzEyLjQxNSAwIDIyLjUxNS0xMC4wOTMgMjIuNTE1LTIyLjQ5OCAwLTkuNzc5LTYuMjc3LTE4LjEyMS0xNS4wMTUtMjEuMjE2di02Ni4wNjJoNTAuNjQ0YzIwLjUxNyAwIDM3LjIwOC0xNi42OSAzNy4yMDgtMzcuMjA2di04Mi4xNzNjMC00LjE0Mi0zLjM1OC03LjQ5OS03LjUtNy40OTl6Ii8+PGNpcmNsZSBjeD0iMTk1LjE3NyIgY3k9Ijk0LjkwMiIgcj0iNy40OTkiLz48Y2lyY2xlIGN4PSIxNjMuMTc3IiBjeT0iNTQuOTA1IiByPSI3LjQ5OSIvPjxjaXJjbGUgY3g9IjMzNi4xNzciIGN5PSIxMDUuODk3IiByPSI3LjQ5OSIvPjxjaXJjbGUgY3g9IjE0MC4xNzciIGN5PSIzODAuODgyIiByPSI3LjQ5OSIvPjxjaXJjbGUgY3g9IjE3Mi4xNzciIGN5PSI0MjAuODc3IiByPSI3LjQ5OSIvPjxjaXJjbGUgY3g9IjI5OS4xNzciIGN5PSI0MTEuODc1IiByPSI3LjQ5OSIvPjwvZz48L3N2Zz4=" />

<!--            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>-->
            <h3>Bienvenido</h3>
            <p>Registrate y podras disfrutar de nuestros beneficios!</p>
            <input type="submit" name="" value="Login" onclick='javascript:goLogin("<?php echo DOMAIN_ROOT ?>");'/><br/>
        </div>
        <?php if($result): ?>
          <script>
              //import swal from 'sweetalert';
              swal({
                  title: "Buen trabajo!",
                  text: "Usuario creado con exito!",
                  icon: "success",
                  buttons: ['Seguir registrando',"ir a login"],
              }).then((willDoLogin) => {
                  if (willDoLogin) {
                      return window.location.href = "http://localhost/laUltimaYnosVamosPHP/pages/login.php";
                  }
              });
          </script>
        <?php endif;?>

        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false">Empleado</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Registrarme como Cliente</h3>
                    <form class="needs-validation" id="formCliente" action="register.php?register=client" method="POST" novalidate>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationTooltip01"
                                           placeholder="First name" name="firstName" value="" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="lastName" placeholder="Last Name *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"   placeholder="Confirm Password *"
                                           value=""/>
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" name="phone"
                                           class="form-control" placeholder="Your Phone *" value=""/>
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option class="hidden" selected disabled>Please select your Sequrity Question
                                        </option>
                                        <option>What is your Birthdate?</option>
                                        <option>What is Your old Phone Number</option>
                                        <option>What is your Pet Name?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="answer" class="form-control" placeholder="Enter Your Answer *" value=""/>
                                </div>
                                <input type="submit" class="btnRegister" value="Register"/>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="register-heading">Registrarme como Empleado</h3>
                    <form class="needs-validation" id="formEmpleado" action="register.php?register=user" method="POST" novalidate>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text"  name="firstNameUser"  class="form-control" placeholder="First Name *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="lastNameUser" placeholder="Last Name *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"  name="emailUser" placeholder="Email *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="10" minlength="10" class="form-control"
                                           placeholder="Phone *" value=""/>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="passwordUser" placeholder="Password *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password *"
                                           value=""/>
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option class="hidden" selected disabled>Please select your Sequrity Question
                                        </option>
                                        <option>What is your Birthdate?</option>
                                        <option>What is Your old Phone Number</option>
                                        <option>What is your Pet Name?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="`Answer *" value=""/>
                                </div>
                                <input type="submit" class="btnRegister" value="Register"/>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



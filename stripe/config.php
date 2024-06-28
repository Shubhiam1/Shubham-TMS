<?php
    require("stripe-php/init.php");


    $Publish_key = "pk_test_51PHHhPJkMEQg0LmDVt8MxmEVotUu7fA9Iz9g3mNEfriJwStfcl1XEGmGOaGoRub7zCUbAnA4F2yMwnWNoivTm7M000zQU0nEq0";

    $Secret_key = "sk_test_51PHHhPJkMEQg0LmDdLzalWZtzb4Ngnu6nb4Qk0NEGHGHjBnMMXjcWIQzEERFHJkJQ7dKRWGwDB1oJFk5IdTxGBaq007KG1q2VY";


    \Stripe\Stripe::setApiKey($Secret_key);
?>
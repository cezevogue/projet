<?php

function add(int $id)
{
    $panier = $_SESSION['cart'];

//    $test=array(
//      2=>2,
//      3=>1,
//    );

    if (!empty($panier[$id])):
        $panier[$id]++;
    else:
        $panier[$id]=1;
    endif;
    $_SESSION['cart']=$panier;

}

function remove(int $id)
{
    $panier = $_SESSION['cart'];

//    $test=array(
//      2=>2,
//      3=>1,
//    );

    if (!empty($panier[$id]) && $panier[$id]!==1):
        $panier[$id]--;
    else:
        unset($panier[$id]);
    endif;
    $_SESSION['cart']=$panier;

}

function delete(int $id)
{
    $panier = $_SESSION['cart'];

//    $test=array(
//      2=>2,
//      3=>1,
//    );

    if (!empty($panier[$id])):
        unset($panier[$id]);
    endif;
    $_SESSION['cart']=$panier;

}

function destroy()
{
    unset($_SESSION['cart']);

}


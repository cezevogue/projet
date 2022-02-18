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
        //$panier[$id]=0;
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

function getFullCart()
{
    $panier = $_SESSION['cart'];

    $panierDetail=[];

    foreach ($panier as $id=>$quantity):
        $resultat=executeRequete("SELECT * FROM product WHERE id=:id", array(
            ':id'=>$id
        ));
        $product=$resultat->fetch(PDO::FETCH_ASSOC);
        $panierDetail[]=[
            'product'=>$product,
            'quantity'=>$quantity,
            'total'=>$product['price']*$quantity

        ];

    endforeach;

    return $panierDetail;

}

function getTotal()
{
    $total=0;
    foreach (getFullCart() as $item):

        $total += $item['total'];

    endforeach;

    return $total;


}

function getQuantity()
{
    $total=0;
    foreach (getFullCart() as $item):

        $total += $item['quantity'];

    endforeach;

    return $total;

}



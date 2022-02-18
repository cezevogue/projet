<?php require_once '../inc/header.php';

$details=getFullCart();
$total=getTotal();

if(isset($_GET['add'])):
    add($_GET['add']);
    header('location:./fullCart.php');
    exit();
endif;

if(isset($_GET['remove'])):
    remove($_GET['remove']);
    header('location:./fullCart.php');
    exit();
endif;

if(isset($_GET['delete'])):
    delete($_GET['delete']);
    header('location:./fullCart.php');
    exit();
endif;

if(isset($_GET['destroy'])):
    destroy();
    header('location:../');
    exit();
endif;


?>
    <a href="?destroy=1"><button class="btn btn-outline-info btn-rounded mt-3" >Vider le panier</button></a>

    <table class="table mt-3">
        <thead class="thead-dark text-center">
        <tr>
            <th >Nom</th>
            <th >Photo</th>
            <th >Prix Total</th>
            <th ><button class="btn btn-primary">Retirer</button></th>
            <th >Quantité</th>
            <th ><button class="btn btn-primary">Ajouter</button>  </th>
            <th >Annuler</th>
        </tr>
        </thead>
        <tbody class="text-center">

        <?php  foreach ($details as $item): ?>
        <tr>
            <td><?=  $item['product']['name'] ; ?></td>
            <td><img height="40" width="40" src="<?=  SITE.$item['product']['picture'] ; ?>" alt=""></td>

            <td><?=  $item['total'] ; ?> €</td>
            <td>
                <a href="?remove=<?=  $item['product']['id'] ; ?>"><button class="btn btn-primary text-white">-</button></a></td>
            <td><?=  $item['quantity'] ; ?></td>
            <td>
                <a href="?add=<?=  $item['product']['id'] ; ?>"><button class="btn btn-primary text-white">+</button></a></td>

            <td>
                <a href="?delete=<?=  $item['product']['id'] ; ?>"><button class="btn btn-outline-danger btn-rounded" >Annuler</button></a></td>
        </tr>
        <?php  endforeach; ?>

        </tbody>

    </table>

<div class="mt-3"><h4>Total du panier: <?=  $total ; ?> €</h4></div>



<?php  require_once '../inc/footer.php'; ?>
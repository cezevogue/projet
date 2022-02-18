<?php require_once '../inc/header.php';

$details=getFullCart();
$total=getTotal();


?>


    <table class="table">
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
                <a href=""><button class="btn btn-primary text-white">-</button></a></td>
            <td><?=  $item['quantity'] ; ?></td>
            <td>
                <a href=""><button class="btn btn-primary text-white">+</button></a></td>

            <td>
                <a href=""><button class="btn btn-outline-danger btn-rounded" >Annuler</button></a></td>
        </tr>
        <?php  endforeach; ?>

        </tbody>

    </table>

<div class="mt-3"><h4>Total du panier: <?=  $total ; ?> €</h4></div>



<?php  require_once '../inc/footer.php'; ?>
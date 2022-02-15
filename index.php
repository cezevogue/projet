<?php require_once 'inc/header.php';


$resultat= executeRequete("SELECT * FROM product");

$products=$resultat->fetchAll(PDO::FETCH_ASSOC);  // fetchAll() à utiliser systématiquement lorsque l'on a un jeu de résultat supérieur à un
// renvoie un tableau

//debug($products);
//die();




?>

<div class="row justify-content-between">
<?php foreach ($products as $product):  ?>
<div class="card border-secondary mb-3 col-md-4" style="max-width: 20rem;">
    <div class="card-header text-center">
        <img width="200" src="<?=  $product['picture'] ; ?>" alt="">

    </div>
    <div class="card-body">
        <h4 class="card-title"><?=  $product['name'] ; ?></h4>
        <h4 class="card-title"><?=  $product['price'] ; ?> €</h4>
        <p class="card-text text-center"><?=  $product['description'] ; ?></p>
    </div>
</div>

<?php  endforeach; ?>
</div>






<?php  require_once 'inc/footer.php'?>



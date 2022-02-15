<?php
require_once '../inc/header.php';


if (!empty($_POST)): // si le formulaire a été soumis

    if (!empty($_FILES['picture']['name'])):

//    debug($_FILES);
//       die;

    $picture_name=date_format( new DateTime(), 'dmYHis' ).uniqid().$_FILES['picture']['name'];

    $picture_bdd='upload/'.$picture_name;

    if(!file_exists('../upload')):
     mkdir('../upload', 0777, true);
    endif;
      copy($_FILES['picture']['tmp_name'], '../'.$picture_bdd);


    endif;

    // insert en BDD :

   $requete= executeRequete("REPLACE INTO product VALUES (:id, :name ,:price, :picture, :description)", array(
           ':id'=>$_POST['id'],
           ':name'=>$_POST['name'],
           ':price'=>$_POST['price'],
           ':picture'=>$picture_bdd,
           ':description'=>$_POST['description']

   ));




endif;

?>

    <form action="" method="post" enctype="multipart/form-data" >
        <fieldset>

            <input type="hidden" name="id" value="0">
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">Nom</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Entrez le nom du produit">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">Prix</label>
                <input type="number" name="price" class="form-control" id="exampleInputPassword1"
                       placeholder="Entrez le prix du produit">
            </div>
            <!--        <div class="form-group">-->
            <!--            <label for="exampleSelect1" class="form-label mt-4">Example select</label>-->
            <!--            <select class="form-select" id="exampleSelect1">-->
            <!--                <option>1</option>-->
            <!--                <option>2</option>-->
            <!--                <option>3</option>-->
            <!--                <option>4</option>-->
            <!--                <option>5</option>-->
            <!--            </select>-->
            <!--        </div>-->

            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4">Description</label>
                <textarea name="description" class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label mt-4">Photo</label>
                <input name="picture" class="form-control" type="file" id="formFile">
            </div>


            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </fieldset>
    </form>

<?php
require_once '../inc/footer.php';


?>
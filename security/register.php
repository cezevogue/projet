<?php
require_once '../inc/header.php';

if (!empty($_POST)):
    $mdp= password_hash($_POST['password'], PASSWORD_DEFAULT);

    executeRequete("INSERT INTO user (nickname, email, password) VALUES (:nickname, :email, :password)", array(
            ':nickname'=>$_POST['nickname'],
            ':email'=>$_POST['email'],
            ':password'=>$mdp

    ));

    $_SESSION['messages']['success'][]="Félicitation, vous êtes à présent inscrit";

    header('location:./login.php');
    exit();


endif;


?>


<form method="post" action="">

    <section class="vh-100 bg-image" style="background-color: #C7C8C9;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Inscription</h2>

                                <label for="inputEmail">Email</label>
                                <input type="email" value="" name="email" id="inputEmail"
                                       class="form-control" autocomplete="email" required autofocus>
                                <label for="inputPassword" class="mt-3">Mot de passe</label>
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                       autocomplete="current-password" required>
                                <label for="inputPassword" class="mt-3">Confirmation de mot de passe</label>
                                <input type="password" name="confirmPassword" id="inputPassword" class="form-control"
                                       autocomplete="current-password" required>
                                <label for="inputPassword" class="mt-3">Pseudo</label>
                                <input type="text" name="nickname" id="inputPassword" class="form-control"
                                       autocomplete="current-password" required>


                                <button class="btn mb-2 mt-3 mb-md-0 btn-outline-secondary btn-block" type="submit">
                                    Valider
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</form>


<?php require_once '../inc/footer.php' ?>

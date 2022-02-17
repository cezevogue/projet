<?php
require_once '../inc/header.php';
if (connect()):
header('location:../');
exit();
endif;



if (!empty($_POST)):

    function password_strength_check($password, $min_len = 6, $max_len = 15, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1) {
        // Build regex string depending on requirements for the password
        $regex = '/^';
        if ($req_digit == 1) { $regex .= '(?=.*\d)'; }              // Match at least 1 digit
        if ($req_lower == 1) { $regex .= '(?=.*[a-z])'; }           // Match at least 1 lowercase letter
        if ($req_upper == 1) { $regex .= '(?=.*[A-Z])'; }           // Match at least 1 uppercase letter
        if ($req_symbol == 1) { $regex .= '(?=.*[^a-zA-Z\d])'; }    // Match at least 1 character that is none of the above
        $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

        if(preg_match($regex, $password)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    $resultat = executeRequete("SELECT * FROM user WHERE email=:email", array(
        ':email' => $_POST['email']
    ));

    if ($resultat->rowCount() !== 0):
        $_SESSION['messages']['danger'][] = "Un compte est déjà existant à cette adresse mail";

        header('location:./register.php');
        exit();
    endif;

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
        $_SESSION['messages']['danger'][] = "email invalide";

        header('location:./register.php');
        exit();
    endif;

    if(!password_strength_check($_POST['password'])):

        $_SESSION['messages']['danger'][] = "Votre mot de passe doit contenir au minimum 6 caractères, maximum 15 caractères,majuscule, minuscule et un caractère spécial ! # @ % & * + -";
        header('location:./register.php');
        exit();

    endif;


    if ($_POST['password'] == $_POST['confirmPassword']):

        $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

        executeRequete("INSERT INTO user (nickname, email, password, roles) VALUES (:nickname, :email, :password, :roles)", array(
            ':nickname' => $_POST['nickname'],
            ':email' => $_POST['email'],
            ':password' => $mdp,
            ':roles' => 'ROLE_USER'

        ));

        $_SESSION['messages']['success'][] = "Félicitation, vous êtes à présent inscrit";

        header('location:./login.php');
        exit();

    else:

        $_SESSION['messages']['danger'][] = "Les mots de passe ne correspondent pas";

        header('location:./register.php');
        exit();

    endif;


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
                                <input type="text" value="" name="email" id="inputEmail"
                                       class="form-control" autocomplete="email">
                                <label for="inputPassword" class="mt-3">Mot de passe</label>
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                       autocomplete="current-password">
                                <label for="inputPassword" class="mt-3">Confirmation de mot de passe</label>
                                <input type="password" name="confirmPassword" id="inputPassword" class="form-control"
                                       autocomplete="current-password">
                                <label for="inputPassword" class="mt-3">Pseudo</label>
                                <input type="text" name="nickname" id="inputPassword" class="form-control"
                                       autocomplete="current-password">


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

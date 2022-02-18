<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet e-commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css"
          integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<?php require_once 'init.php';

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= SITE; ?>">Mon site E-commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= SITE; ?>">Accueil

                    </a>
                </li>
                <?php if (admin()):

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE . 'admin/ajoutProduit.php'; ?>">Ajout produit</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= SITE . 'front/fullCart.php'; ?>">
                        <button type="button" class="rounded btn btn-outline-warning position-relative p-2 ">
                            <i class="fa-solid fa-cart-arrow-down fa-2xl "></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
    <?=  getQuantity() ; ?>+

  </span>
                        </button>
                    </a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <?php if (!connect()):
                ?>
                <div class="text-center ">
                    <a href="<?= SITE . 'security/login.php'; ?>" class="btn btn-success">Se connecter</a>
                    <a href="<?= SITE . 'security/register.php'; ?>" class="btn btn-primary ">S'inscrire</a>
                </div>
            <?php else: ?>
                <div class="text-center ">
                    <a href="<?= SITE . '?unset=1'; ?>" class="btn btn-primary mt-1"><i
                                class="fa-solid fa-power-off"></i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container">
    <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])):
        foreach ($_SESSION['messages'] as $type => $mess):
            foreach ($mess as $key => $message):
                ?>

                <div class="alert alert-<?= $type; ?> text-center">
                    <p><?= $message; ?></p>
                </div>
                <?php unset($_SESSION['messages'][$type][$key]); ?>
            <?php endforeach; endforeach; endif; ?>



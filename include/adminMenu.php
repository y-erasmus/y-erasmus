<section class="admin-menu">
    <h2 style="margin-left : 10px;font-family : Roboto; font-weight : 300; margin-bottom : 60px;"><?php echo $_SESSION['lastname'] ?></br> <?php echo $_SESSION['firstname'] ?></h2>
    <div class="menu-item">
        <p>Résultats</p>
    </div>
    <div class="menu-item">
        <p><a href="<?php echo URL?>/correction">Correction</a></p>
    </div>
    <div class="btn logout">Déconnexion</div>
    <form action="<?php echo URL ?>" method="post" class="logoutForm">
        <input type="hidden" name="todo" value="logout">
    </form>
</section>

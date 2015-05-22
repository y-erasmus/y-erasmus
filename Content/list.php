<section class="users-list">
  <h1 class="title-XL">Découvrir des profils !</h1>

    <div class="outer-select half-left">
      <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
      <input type="hidden" name="todo" value="filterbylang">
      <select name="Sort" class="form-control textbox inputtext">
        <option selected disabled>Trier par langue</option>
        <option value="1">Français</option>
        <option value="2">English</option>
        <option value="3">Español</option>
        <option value="4">русский</option>
          <option value="5">العربية</option>
          <option value="6">中国</option>
          <option value="7">Deutsch</option>
          <option value="8">日本人</option>
          <option value="9">Português</option>
          <option value="10">हिन्दी</option>
        </select>
    </div>

      <button type="submit" class="btn btn-default TriLangueButton subbtn">Rechercher</button>
  </form>

  <?php
  foreach($users as $user){ ?>
    <div class="user">
        <div class="left">
            <img src="Assets/images/img2.png" alt=""/>
        </div>
        <div class="right">
            <p> Pseudo : <?php echo $user['Pseudo'] ?> </p>
            <p> Nom : <?php echo $user['Nom'] ?>    </p>
            <p> Prénom : <?php echo $user['Prenom'] ?> </p>
        </div>
    </div>

<?php
}
?>
</section>

<div class="parentcenter">
	<div class="verticalcenter">
		<div class="jumbotron jumbotronbody">
			<h1 class="title-XL">Inscription</h1>
            <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
				<div class="innerForm">
                    <input name="todo" type="hidden" value="register">
                    <input class="form-control textbox inputtext half-left" type="text" placeholder="Nom" name="nom" autocomplete="off">
                    <input class="form-control textbox inputtext half-right" type="text" placeholder="Prénom" name="prenom" autocomplete="off">
                    <input class="form-control textbox inputtext half-left" id="Email" type="text" placeholder="Pseudo" name="pseudo" autocomplete="off">
                    <input id="password" type="password" placeholder="Mot de passe" class="form-control inputtext textbox half-right" name="password" autocomplete="off" readonly="" onfocus="this.removeAttribute('readonly');">
					<p class="formError"></p>
                </div>
				<button type="submit" class="btn btn-default formbutton subbtn">Go !</button>
            </form>
		</div>
	</div>
</div>

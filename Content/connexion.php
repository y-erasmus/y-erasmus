<div class="parentcenter">
	<div class="verticalcenter">
		<div class="jumbotron jumbotronbody">
			<h1 class="title-XL">Welcome on Y-erasmus</h1>
            <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
				<div class="innerForm">
                    <input name="todo" type="hidden" value="connection">
                    <input class="form-control textbox inputtext half-left" id="pseudo"  type="text" placeholder="Pseudo" name="pseudo" autocomplete="off">
                    <input id="password" type="password" placeholder="Mot de passe" class="form-control inputtext textbox half-right" name="password" autocomplete="off" readonly="" onfocus="this.removeAttribute('readonly');">
					<p class="formError"></p>
                </div>
				<button type="submit" class="btn btn-default formbutton subbtn">Log me !</button>
            </form>
				<button type="button" href=URLFOFILE."/inscription" class="btn btn-default inscriptionButton subbtn">S'inscrire</button>
		</div>
	</div>
</div>

<!-- ======= AFTER ASSESSMENT LOGIN AND BEFORE ASSESSMENT ========-->
<div class="parentcenter">
	<div class="verticalcenter">
		<div class="jumbotron jumbotronbody">
            <h1 class="title-L">Inscription</h1>
            <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
                <div class="innerForm">
                    <input class="form-control textbox inputtext" name="todo" type="hidden" value="register">
                    <input class="form-control textbox inputtext" name="mail" type="text" placeholder="E-mail">
                    <input class="form-control textbox inputtext half-left" name="firstname" type="text" placeholder="Nom">
                    <input class="form-control textbox inputtext half-right" name="lastname" type="text" placeholder="Prénom">
                    <div class="outer-select half-left">
	                    <select name="formation" class="form-control textbox inputtext">
	                      <option selected disabled>Formation</option>
	                      <option value="1">Ingésup</option>
	                      <option value="2">Infosup</option>
	                      <option value="3">Limart</option>
	                      <option value="4">ESSCA</option>
	                    </select>
					</div>
                    <div class="outer-select half-right">
	                    <select name="class" class="form-control textbox inputtext">
	                      <option selected disabled>Classe</option>
	                      <option value="1">Bachelor 1</option>
	                      <option value="2">Bachelor 2</option>
	                      <option value="3">Bachelor 3</option>
	                      <option value="4">Mastere 1</option>
	                      <option value="5">Mastere 2</option>
	                    </select>
					</div>
					<p class="formError"></p>
				</div>
                <button type="submit" class="btn btn-default formbutton subbtn">Register</button>
            </form>
        </div>
	</div>
</div>

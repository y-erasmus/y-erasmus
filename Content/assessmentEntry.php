<!-- ======= AFTER ASSESSMENT LOGIN AND BEFORE ASSESSMENT ========-->
<div class="parentcenter">
	<div class="verticalcenter">
		<div class="jumbotron jumbotronbody">
            <h1 class="title-L">Registration</h1>
            <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
                <div class="innerForm">
                    <input class="form-control textbox inputtext" name="todo" type="hidden" value="goAssessment">
                    <input class="form-control textbox inputtext" name="mail" type="text" value="cp@ultranoir.com" readonly>
                    <input class="form-control textbox inputtext half-left" name="firstname" type="text" placeholder="Nom">
                    <input class="form-control textbox inputtext half-right" name="lastname" type="text" placeholder="Prénom">
					<div class="outer-select">
	                    <select name="class" class="form-control textbox inputtext">
	                      <option selected disabled>Classe</option>
	                      <option value="value2">Valeur 2</option>
	                      <option value="value3">Valeur 3</option>
	                      <option value="value3">Valeur 3</option>
	                      <option value="value3">Valeur 3</option>
	                      <option value="value3">Valeur 3</option>
	                      <option value="value3">Valeur 3</option>
	                    </select>
					</div>
					<p class="formError"></p>
				</div>
                <button type="submit" class="btn btn-default formbutton subbtn">Start assessment</button>
            </form>
        </div>
	</div>
</div>

<div id="register" class="modal">
    <div class="modal-content">
      	<h4 class="center-align grey-text"><i class="material-icons right">person_outline</i>Panel Rejestracji</h4>
      		
      	<form action="controller/register.php" method="POST">
	      	<div class="input-field col s12">
	      		<i class="material-icons prefix">account_circle</i>
	          	<input id="icon_prefix3" type="text" class="validate" name="login" maxlength="30">
	          	<label for="icon_prefix3">Nazwa Użytkownika</label>
	        </div>
	      	<div class="input-field col s12">
	      		<i class="material-icons prefix">lock</i>
	          	<input id="icon_prefix4" type="password" class="validate" name="password" maxlength="50">
	          	<label for="icon_prefix4">Wprowadź Hasło</label>
	        </div>
	      	<div class="input-field col s12">
	      		<i class="material-icons prefix">lock</i>
	          	<input id="icon_prefix5" type="password" class="validate" name="password2" maxlength="50">
	          	<label for="icon_prefix5">Powtórz Hasło</label>
	        </div>
	      	<div class="input-field col s12">
	      		<i class="material-icons prefix">email</i>
	          	<input id="icon_prefix6" type="email" class="validate" name="email" maxlength="50">
	          	<label for="icon_prefix6">Wprowadź adres Email</label>
	          	<span class="helper-text" data-error="Adres Email niepoprawny" data-success="Adres Email poprawny"></span>
	        </div>
	</div>
	<div class="modal-footer">
		<a href="" class="modal-close waves-effect waves-green btn-flat">Anuluj</a>
		<button name="register" class="modal-close waves-effect waves-green btn-flat">Zarejestruj się</button>
	</div>
	</form>
</div>
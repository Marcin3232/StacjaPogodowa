<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title" id="ustawienia"><span class="oi oi-cog"></span> Ustawienia Konta</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col">
          <h4><span class="oi oi-envelope-closed"></span> Zmień Adress Email:</h4>
          <div class="pasek1"></div>
          <p></p>
          <form>
            <div class="form-group">

              <input type="email" class="form-control form-control-lg " onblur='return  rejestracja3()' id="email" name="email" required aria-describedby="podpowiedzemail" placeholder="np.: jankowalski@gmail.com">
              <h4><small id="podpowiedzemail" class="form-text text-muted">W powyższym polu wpisujesz swój nowy Email.</small></h4>
            </div>
            <button type="submit" class="btn btn-secondary btn-lg">Zmień Email</button>
          </form>
        </div>


        <!-- druga kolumna -->
        <div class="col">
          <h4><span class="oi oi-lock-unlocked"></span> Zmień Hasło:</h4>
          <div class="pasek1"></div>
          <p></p>
          <form>
            <div class="form-group">
              <label for="haslo">
                <h4 class="dark"><span class="oi oi-lock-locked"></span> Stare Hasło:</h4>
              </label>
              <input type="password" onblur='return haslocorrect()' class="form-control form-control-lg " required id="haslo" name="haslo1" aria-describedby="podpowiedzhaslo" placeholder="Wpisz stare hasło">
              <h4><small id="podpowiedzhaslo" class="form-text text-muted">W powyższym polu wpisujesz swoje stare hasło.</small></h4>
            </div>
            <div class="form-group">
              <label for="haslo">
                <h4 class="dark"><span class="oi oi-lock-locked"></span> Nowe Hasło:</h4>
              </label>
              <input type="password" onblur='return  haslonext()' class="form-control form-control-lg " required id="haslo" name="haslo1" aria-describedby="podpowiedzhaslo" placeholder="Wpisz nowe hasło">
              <h4><small id="podpowiedzhaslo" class="form-text text-muted">W powyższym polu wpisujesz swoje nowe hasło.</small></h4>
            </div>
            <div class="form-group">
              <label for="haslo1">
                <h4 class="dark"><span class="oi oi-lock-locked"></span>Powtórz Hasło:</h4>
              </label>
              <input type="password" onblur='return  haslonext()' class="form-control form-control-lg " required id="haslo" name="haslo1" aria-describedby="podpowiedzhaslo" placeholder="Wpisz ponownie hasło">
              <h4><small id="podpowiedzhaslo" class="form-text text-muted">W powyższym polu wpisujesz ponownie nowe hasło.</small></h4>
            </div>
            <button type="submit" class="btn btn-secondary btn-lg">Zmień Hasło</button>
          </form>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Zamknij</button>
    </div>
  </div>
</div>
<script type="text/javascript">
  function rejestracja3() {
    var regex = new RegExp("^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$");
    var nazwisko = document.getElementById("email").value;
    var sprawdz1 = regex.test(nazwisko);
    var registerResult1 = document.getElementById("podpowiedzemail");
    if (nazwisko == '') {
      registerResult1.innerHTML = '<h4 class="text-danger"><span class="oi oi-x"></span> Nie wpisano Emailu!</h4>';
    } else if (!sprawdz1) {
      registerResult1.innerHTML = '<h4 class="text-danger"><span class="oi oi-x"></span>Niepoprawnie wpisany email!(przykladowyemail@o2.pl)</h4>';
    } else {
      registerResult1.innerHTML = '<h4 class="text-success"><span class="oi oi-check"></span>Email jest poprawny!</h4>';
    }
    return true;
  }
</script>
<div class="modal" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Merci d'avoir répondu à notre sondage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Toute l'équipe de <strong>Bigscreen</strong> vous remercie pour votre engagement. Grâce à votre investissement, nous vous préparons une application toujours plus facile à utiliser, seul ou en famille
        Si vous désirez consulter vos réponse ultérieurement, vous pouvez consulter cette adresse :</p>
        @if(Session::has('success'))
            <p><a href="{{url('/', Session::get('success'))}}">Cliquez ici</a></p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
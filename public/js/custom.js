$(function() {
    $('#question_8').change(function() {
        $this = $(this);
        if($this.val() == 'Autre'){
            $this.after('<input placeholder="Autre :" type="text"id="input_8" class="form-control mb-4" name="question_8"/>');
        }
        else{
            $('#input_8').remove()
        }
    });

      // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });

 });
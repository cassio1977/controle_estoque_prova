<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    Materialize.updateTextFields();
    $(".button-collapse").sideNav();

    $(".mais").click(function(){
      //se for uma saída limita a saída ao estoque
      if ( $('#Tipos').is(':checked') ) {
        if($("#quantidade").val()<$("#total").val()){
          $("#quantidade").val(parseFloat($("#quantidade").val())+parseFloat(1));
        } else {
          alert("Não é possível subtrair mais do que o disponível em estoque!");
        }
      } else {
          $("#quantidade").val(parseFloat($("#quantidade").val())+parseFloat(1));
      }
    });
    $(".menos").click(function(){
      if($("#quantidade").val()>0){
        $("#quantidade").val($("#quantidade").val()-1);
      } else {
        $("#quantidade").val(0);
        alert("Não é possível valores negativos!");
      }
    });
    $("#quantidade").focusout(function(){
      //se for uma saída
      if ( $('#Tipos').is(':checked') ) {
        if($("#quantidade").val()>$("#total").val()){
          alert("Não é possível subtrair mais do que o disponível em estoque!");
          $("#quantidade").val($("#total").val());
        }
      }
    });
    $('.verificar').each(function(){
      if($(this).text()<100)
      $(this).css("background-color", "#f44336");
    });
  });
</script>
</body>
</html>

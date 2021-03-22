<?php
session_start();
include "../../isadmin.php";
?>

<form method="POST" action="../../connects/add_ach.php" enctype="multipart/form-data">>
<div class="card-hover-shadow-2x mb-3 card">
<div class="col-md-12">
<div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Nowe osiągnięcie</div>
           
                <input class="form-control col-md-4 ml-5" placeholder="Tytuł osiągięcia" type="text" name="title">
                <input type="file" class="form-control ml-5" name="fileToUpload" id="fileToUpload" accept="image/*">
            </div>
<div class="row">
<div class="form-group col-md-4">
               <label for ="dif">Rodzaj </label>
<select class="form-control" name="role">
<option value="1">Czasowe</option>
<option value="2">Ukończona ilość pytań</option>
<option value="3">Ukończona kategoria</option>
<option value="4">Rozegrane wyzwania Graczy</option>
<option value="5">Seria dobrych Odpowiedzi</option>
</select>


</div>

<div class="form-group md-2 ml-5">
<label for="public">Warunek</label>
<input type="number" class="form-control" min="0" name="req">
</div>


<div class="form-group col-md-3">
<label for ="cat">Kategoria<br> <span style="color: red">Tylko dla rodzaj: ukończona kategoria</span></label>
<select id="cat" class="form-control" name="id_cat">
<?php
                              include "../../config.php";
                              $result = $connect->query("select id,name from categories");
                              $count = $result->num_rows;
                              while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['name'];
                              
                              ?>
                              <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
<?php } ?>
</select>
</div>



</div>


  <div class="d-block text-right card-footer">
  <div class="text-left text-primary">Rodzaj: czasowe, warość: w sek.
  <br>Rodzaj: Ukończona ilość pytań, wartość: liczba pytań<br>
  Rodzaj: Ukończona kategoria, wartość: kategoria<br>
  Rodzaj: Rozegrane wyzwania Graczy, wartość: ilość wyzwań <br>
  Rodzaj: Seria dobrych Odpowiedzi, wartość: ilość pytań</div>
  <button role="submit" class="btn btn-success" name="submit">Dodaj</button>
  <a id="back" href="#questions" role="button" class=" btn btn-danger">Anuluj</a>
  </div>
</div>
</div>
</form>
  <script>
   $(document).ready(function(){
    $("#back").click(function(){
            $("#content").load("./#achievements.php");
        });
   });
  </script>






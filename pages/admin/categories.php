<?php
session_start();
include "../../isadmin.php";

?>

<div class="row d-flex justify-content-center container">
    <div class="col-md-8">
        <div class="card-hover-shadow-2x mb-3 card">
          <form method="POST" action="../../connects/add_category.php">
        <div class="row">
        <div class="col-md-4">
        
        <input class="form-control ml-5" placeholder="Nazwa kategorii" type="text" name="name_category">
        </div>
        <div class="col-md-1">
        <button role="submit" class="btn btn-info ml-5 mr-5">Dodaj</button>
        </div>
        
      </div>
          </form>
      <hr>
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Lista Kategorii</div>
            </div>
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                              <?php
                              include "../../config.php";
                              $result = $connect->query("select id,name from categories");
                              $count = $result->num_rows;
                              while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['name'];
                              
                              ?>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <!-- <div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div> -->
                                            </div>
                                            <form method="POST" action="../../connects/edit_category.php">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">
                                                
                                                
                                                  <h5  class="edit-h" id="h-<?php echo $id;?>"><?php echo $name; ?></h5>
                                                  <div  style="display: none" class ="form-group row ml-5 edit-form" id="e-<?php echo $id;?>">
                                                  
                                                  <div class="col-xs-3">
                                                  <input type="hidden" name="cat_id" value="<?php echo $id;?>">
                                                  <input type="text" class="form-control" name="name_category" value="<?php echo $name;?>">
                                                  </div>
                                                  
                                                  <button role="submit" class="btn btn-primary ml-5 mr-5">Zapisz</button>
                                                  <button type="button" onclick="end_edit(this)" class="btn btn-secondary ml-5 mr-5" value="<?php echo $id?>">Anuluj</button>
                                                  </div>
                                                  
                                                   
                                                </div>
                                                
                                            </div>
                                            </form>
                                            <div class="widget-content-right"> 

                                            <!-- <form method="POST" action="../../connects/edit_category.php"> -->
                                                <!-- <input type="hidden" name="cat_id" value="<?php echo $id;?>"> -->
                                              <button onclick="show_edit(this)"  class="border-0 btn-transition btn btn-outline-success" value="<?php echo $id?>"> <i class="fa fa-edit"></i></button>
                                              <!-- </form> -->

                                            <form method="POST" action="../../connects/delete_category.php">
                                            <input type="hidden" name="cat_id" value="<?php echo $id;?>">
                                            <button role="submit" class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> 
                                            </form>
                                          </div>
                                        </div>
                                    </div>
                                </li>
                              <?php
                              }
                              ?>  
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <div class="d-block text-right card-footer">
            
        <span class="text-danger ml-5">
                            <?php
                                if(isset($_SESSION["err_cat"]))
                                if($_SESSION["err_cat"] != ""){
                                    
                                    echo '<i class="fa fa-close"> ';
                                    echo $_SESSION["err_cat"];
                                    echo '</i>';
                                    $_SESSION["err_cat"] = "";
                                }
                            ?>

           </span>
           <span class="text-success ml-5">
           <?php
                                if(isset($_SESSION["success"]))
                                if($_SESSION["success"] != ""){
                                    
                                    echo '<i class="fa fa-check"> ';
                                    echo $_SESSION["success"];
                                    echo '</i>';
                                    $_SESSION["success"] = "";
                                }
                            ?>
           </span>
           
            </div>
        </div>
    </div>
</div>

<script>
  function show_edit(e)
  {
    close_all();

    var id = e.value;
    var h = document.getElementById("h-"+ id);
    var div = document.getElementById("e-"+id);

    h.style.display = "none";
    div.style.display = "flex";
  }

  function close_all()
  {
    var divs = document.getElementsByClassName("edit-form");
    var h = document.getElementsByClassName("edit-h");

    for(let i = 0; i < divs.length; i++)
    {
      divs[i].style.display = "none";
      h[i].style.display = "block";
    }
  }

  function end_edit(e)
  {
    var id = e.value;
    var h = document.getElementById("h-"+ id);
    var div = document.getElementById("e-"+id);

    h.style.display = "block";
    div.style.display = "none";
  }
</script>
      <script>
            $(document).ready(function(){
                function fetch_data(){
                    $.ajax({
                       url:"../database.php",
                       method:"POST",
                       success:function(data){
                           $('#live_data').html(data);
                       }
                    });
                }
                fetch_data();
                $(document).on('click', '#btn_add', function(){
                   var deal_name = $('#deal_name').text(); 
                   var deal_desc = $('#deal_desc').text(); 
                   var deal_price = $('#deal_price').text(); 
                   var deal_day = $('#deal_day').text(); 
                   var deal_active = $('#deal_active').text(); 
                   if(deal_name ==''){
                       alert("Enter Deal Name"); return false;
                   }
                   if(deal_desc ==''){
                       alert("Enter Deal Desc"); return false;
                   }
                   if(deal_price ==''){
                       alert("Enter Deal Price"); return false;
                   }
                   if(deal_day ==''){
                       alert("Enter Deal Day"); return false;
                   }
                   if(deal_active ==''){
                       alert("Enter Deal Active Status"); return false;
                   }
                   $.ajax({
                       url: "insert.php",
                       method: "POST",
                       data:{deal_name:deal_name, deal_desc:deal_desc, deal_price:deal_price, deal_day:deal_day, deal_active:deal_active},
                       dataType:"text",
                       success:function(data) {
                           alert(data);
                           fetch_data();
                       }
                       
                   });    
                    
                });
            });
            
        </script>
        
        
          <form id="myForm" action="dashboardDealInfo.php" method="post" enctype="multipart/form-data" autocomplete="off" class="form-group">
                <!--DEAL NAME-->
                <div class="col-md-3">
                    <input type="text" class="form-control" id="dealName" name="dealName" placeholder="Deal Name" required autofocus/>
                </div>
                <!--DEAL DESCRIPTION-->
                <div class="col-md-4">
                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Deal Description" required/>
                </div>
                <!--PRICE-->
                <div class="col-md-2">
                    <input type="number" step="any" class="form-control" id="dealPrice" name="dealPrice" placeholder="Price" required/>
                </div>
                <!--DROP DOWN MENU FOR WEEKDAY-->
                <div class="col-md-3">
                    <select class="form-control" id="daySelect" name="day">
                                <option selected>Week Day</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                            </select>
                </div>

                <!--CHECKBOX TO LET USER ACTIVATE DEAL RIGHT AWAY-->
                <div class="col-md-12 text-center">
                    <label class="checkbox-inline text-center ">
                                <br/>
                                <input name="active_deal" id="active_deal" value="0" type="hidden" />
                                <input name="active_deal" id="active_deal" type="checkbox" value="1"/>Activate
                            </label>
                </div>

                <!--HIDDEN INPUT FIELD TO PASS VENDOR ID TO BACKEND PROCESSOR THEN TO SQL TABLE-->
                <input type="hidden" id="vendor_id" name="vendor_id" value="<?php echo $_SESSION['vendor_id']; ?>" />

                <div class="col-md-12 text-center">
                    <br/>
                    <input type="submit" value="Add Deal" class="btn btn-primary" />
                </div>

            </form>
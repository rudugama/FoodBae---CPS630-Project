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
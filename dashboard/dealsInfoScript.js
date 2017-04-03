$(document).ready(function(){  
    $('#add').click(function(){  
        $('#insert').val("Insert");  
        $('#insert_form')[0].reset();  
    });  
    $(document).on('click', '.edit_data', function(){  
        var deal_id = $(this).attr("id");  
        $.ajax({  
            url:"fetch.php",  
            method:"POST",  
            data:{deal_id:deal_id},  
            dataType:"json",  
            success:function(data){  
                $('#deal_name').val(data.deal_name);  
                $('#deal_desc').val(data.deal_desc);  
                $('#price').val(data.price);  
                $('#day').val(data.day);  
                $('#active_deal').val(data.isActive);  
                $('#deal_id').val(data.deal_id);  
                $('#vendor_id').val(data.vendor_id);  
                $('#insert').val("Update");  
                $('#add_data_Modal').modal('show');  
            }  
        });  
    });  
    $('#insert_form').on("submit", function(event){  
        event.preventDefault();  
        if($('#deal_name').val() == "")  
        {  
            alert("Name is required");  
        }  
        else if($('#deal_desc').val() == '')  
        {  
            alert("Description is required");  
        }  
        else if($('#price').val() == '')  
        {  
            alert("Price is required");  
        }  
        else if($('#day').val() == '')  
        {  
            alert("Weekday is required");  
        }  
        else  
        {  
            $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:$('#insert_form').serialize(),  
                beforeSend:function(){  
                    $('#insert').val("Inserting");  
                },  
                success:function(data){  
                    $('#insert_form')[0].reset();  
                    $('#add_data_Modal').modal('hide');  
                    $('#deal_table').html(data);  
                }  
            });  
        }  
    });  
    $(document).ready(function(){  
        $('.view_data').click(function(){  
            var deal_id = $(this).attr("id");  
            $.ajax({  
                url:"select.php",  
                method:"POST",  
                data:{deal_id:deal_id},  
                success:function(data){  
                    $('#deal_detail').html(data);  
                    $('#dataModal').modal("show");  
                }  
            });  
        });  
    });
});  
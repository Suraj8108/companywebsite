var counter = 6;
$(document).ready(function(){
    $('.add-particular').live('click', function(event){
        event.preventDefault();
        counter++;
        var newRow = jQuery('<tr><td><label class="field field_v1"><input class="field__input" name="Sno'+counter+'" value="' + 
        counter +'"></label></td</tr>  <td> <label class="field field_v1"> <input class="field__input" name="particular'+counter+'"> </label></td>'+
        '<td> <label class="field field_v1"> <input class="field__input" name="hsn'+counter+'"> </label></td>' + 
        '<td> <label class="field field_v1"> <input class="field__input pieces '+counter+'" name="pieces'+counter+'"> </label></td>' + 
        '<td> <label class="field field_v1"> <input class="field__input rate '+counter+'" name="rate'+counter+'"> </label></td>' + 
        '<td> <label class="field field_v1"> <input class="field__input" name="Rs'+counter+'" readonly> </label></td>' + 
        '<td> <label class="field field_v1"> <input class="field__input" name="Ps'+counter+'" readonly> </label></td>');
        jQuery('table.particulars').append(newRow);
    });
});
jQuery('add-particular').click(function(event){
    //console.log("hell");
    //field__input pieces counter
    //focus on pieces or qunatity
    //split class name by space and get counter
    //replace a value of getIdby(piecesCounter).value 

});

$(document).ready(function(){

    $('.pieces, .rate').live('keyup',function(event) {
    let cname = $(event.target).attr('class');
    const val = cname.split(" ");
    let current = val[val.length-1];
    let pieces = $('input[name="pieces'+current+'"]').val() == "" ? 0 : $('input[name="pieces'+current+'"]').val();
    let rate = $('input[name="rate'+current+'"]').val() == "" ? 0 : $('input[name="rate'+current+'"]').val();
    let amount = rate*pieces;
    amount = amount.toFixed(2);
    const mrp = String(amount).split(".");
    $('input[name="Rs'+current+'"]').val(mrp[0]);
    $('input[name="Ps'+current+'"]').val(mrp[1]);
    //console.log(amount,mrp);
    //console.log($(event.target).attr('class'));   
    
    // Update Total and GST Value

    let total_val = 0;
    console.log(counter);
    for(let i=1; i<=counter; i++){
        let pcs = $('input[name="pieces'+i+'"]').val() == "" ? 0 : $('input[name="pieces'+i+'"]').val();
        let rt = $('input[name="rate'+i+'"]').val() == "" ? 0 : $('input[name="rate'+i+'"]').val();
        let amt = pcs*rt
        amt = amt.toFixed(2);
        total_val += Number(amt);
        console.log("Counter",counter);
    }
    $('input[name="total_val"').val(total_val);

    //SGST and CGST value
    var sgst_rate = $('input[name="sgst_rate"]').val();
    var cgst_rate = $('input[name="cgst_rate"]').val();
    var igst_rate = $('input[name="igst_rate"]').val();
    let sgst = (total_val*sgst_rate)/100;
    let cgst = (total_val*cgst_rate)/100;
    let igst = (total_val*igst_rate)/100;
    $('input[name="sgst"]').val(sgst);
    $('input[name="cgst"]').val(cgst);
    $('input[name="igst"]').val(igst);
    
    //Taxable Value Set
    let taxval = Math.round(sgst+cgst+igst)
    $('input[name="taxval"').val(taxval);

    //Final Amount
    let final_amount = total_val +  taxval;
    $('input[name="finalVal"').val(final_amount);

    });
});


//Add a class Active on click
$(document).ready(function(){
    $('.nav-links li').click(function() {
        console.log("Hell");
        $('.nav-links li a').removeClass('active');
        $(this).addClass('active');
    });
});

var path = window.location.origin + "/autocomplete";
$(document).ready(function(){
    $('#comp_name').typeahead({

        source:function(query, process){
            return $.get(path, {query:query}, function(data){
            console.log(data);
            return process(data);

            });
        }
    });
});

$(document).ready(function(){
    $('#rec_name').typeahead({

        source:function(query, process){
            return $.get(path, {query:query}, function(data){
            console.log(data);
            return process(data);

            });
        }
    });
});

/* Add automatically the values in input box */
$(document).ready(function(){
    $('input[name="comp_name"]').change(function(event){
        event.preventDefault();
        $.ajax({
            dataType:"json",
            method:"get",
            url:"findcompany",
            data:{ comp_name : $('input[name="comp_name"]').val(), },
            success: function(data) {
                if(data !== undefined && data.length != 0){
                    //console.log(data);
                    $('#c_name').val(data[0]['comp_name']);
                    $('#comp_gst').val(data[0]['comp_gst']);
                    $('#comp_add').val(data[0]['comp_address']);
                    $('#comp_mob').val(data[0]['comp_number']);
                    $('#comp_email').val(data[0]['comp_email']);

                    $('#c_name_top').val(data[0]['comp_name']);
                    $('#comp_gst_top').val(data[0]['comp_gst']);
                    $('#comp_mob_top').val(data[0]['comp_number']);
                }
            },
            error: function(data) {
                console.log("Error");
            },
        });

    }).change();
});

$(document).ready(function(){
    $('input[name="rec_name"]').change(function(event){
        event.preventDefault();
        $.ajax({
            dataType:"json",
            method:"get",
            url:"findcompany",
            data:{ comp_name : $('input[name="rec_name"]').val(), },
            success: function(data) {
                if(data !== undefined && data.length != 0){
                    $('#bill_name').val(data[0]['comp_name']);
                    $('#bill_gst').val(data[0]['comp_gst']);
                    $('#bill_add').val(data[0]['comp_address']);
                    $('#bill_mob').val(data[0]['comp_number']);
                }
            },
            error: function(data) {
                console.log("Error");
            },
        });

    }).change();
});

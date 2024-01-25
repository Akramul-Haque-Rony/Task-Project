 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 jQuery(document).ready(function (){
    // for address city zone area on change 
    jQuery('.add_city').on('change',function(){
     $('.add_area').empty();
     $('.add_zone').empty();
     var cid = jQuery(this).val();
     if(cid)
     {
      jQuery.ajax({
       url : '/ajax/AddZone?cid=' +cid,
       type : "GET",
       dataType : "json",
       success:function(data)
       {
        // console.log(data);
        jQuery('.add_zone').empty();
           $('.add_zone').append('<option value="">Select one </option>');
        jQuery.each(data, function(key,value){
           $('.add_zone').append('<option value="'+ key +'">'+ value +'</option>');
        });
       }
      });
     }
     else
     {
        $('.add_zone').empty();
     }
    });

  jQuery('.add_zone').on('change',function(){
     var cid = jQuery(this).val();
     if(cid)
     {
      jQuery.ajax({
       url : '/ajax/AddArea?cid=' +cid,
       type : "GET",
       dataType : "json",
       success:function(data)
       {
        // console.log(data);
        jQuery('.add_area').empty();
           $('.add_area').append('<option value="">Select one </option>');
        jQuery.each(data, function(key,value){
           $('.add_area').append('<option value="'+ key +'">'+ value +'</option>');
        });
       }
      });
     }
     else
     {
        $('.add_area').empty();
     }
  });



  // for ajax autocomplete 
  $( "#employee_search" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      $.ajax({
        url:'/ajax/autocomplete2/',
        type: 'post',
        dataType: "json",
        data: {
           _token: CSRF_TOKEN,
           search: request.term
        },
        success: function( data ) {
           response( data );
        }
      });
    },
    select: function (event, ui) {
       // Set selection
       $('#employee_search').val(ui.item.label); // display the selected text
       $('.id2').val(ui.item.value); // save selected id to input
       $('.id').val(ui.item.value); 
       $('.name2').val(ui.item.label); 
       $('.mobile2').val(ui.item.mobile); 
       $('.mobile').val(ui.item.mobile); 
       // alert(ui.item);
        console.log(ui.item);
       return false;
    }
  });

  // search doctor
  $( ".doctor_search" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      $.ajax({
        url:'/ajax/searchDoctor/',
        type: 'get',
        dataType: "json",
        data: {
           _token: CSRF_TOKEN,
           search: request.term
        },
        success: function( data ) {
           response( data );
        }
      });
    },
    select: function (event, ui) {
       // Set selection
       $('.doctor_search').val(ui.item.label); // display the selected text
       $('.room_no').val(ui.item.room_no); // save selected id to input
       $('.id').val(ui.item.value); 
       $('.doctor_id').val(ui.item.id);        
       $('.fee').val(ui.item.fee); 
       // $('.name2').val(ui.item.label); 
       $('.displayName').text(ui.item.displayName); 
       // $('.mobile').val(ui.item.mobile); 
       // alert(ui.item);
        console.log(ui.item);
       return false;
    }
  });

// $.ajax({
//     type: "POST",
//     url: '/your_url',
//     data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
//     success: function (data) {
//        console.log(data);
//     },
//     error: function (data, textStatus, errorThrown) {
//         console.log(data);

//     },
// });

  // customer for ajax autocomplete 
  $( ".searchCustomer" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      $.ajax({
        url:'/ajax/searchCustomer/',
        type: 'get',
        dataType: "json",
        data: {
           _token: '{{csrf_token()}}',
           search: request.term
        },
        success: function( data ) {
           response( data );
        }
      });
    },
    select: function (event, ui) {
       // Set selection
       $('.searchCustomer').val(ui.item.label); // display the selected text
       $('.patient_id').val(ui.item.value); // save selected id to input
       $('.id').val(ui.item.value); 
       $('.name').val(ui.item.name); 
       $('.mobile2').val(ui.item.mobile); 
       $('.mobile').val(ui.item.mobile); 
       $('.age').val(ui.item.age); 
       $('.age_type').val(ui.item.age_type).change(); 
       $('.gender').val(ui.item.gender).change(); 
       $('.blood_group').val(ui.item.blood_group).change(); 
       $('.pname2').val(ui.item.name); 
       $('.pmobile2').val(ui.item.mobile); 
       $('.customer_name').change();
       // alert(ui.item);
        console.log(ui.item);
       return false;
    }
  });

  // prodcut for ajax autocomplete 
  $( "#searchProduct,.searchProduct" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      $.ajax({
        url:'/ajax/searchProduct/',
        type: 'get',
        dataType: "json",
        data: {
           _token: CSRF_TOKEN,
           search: request.term
        },
        success: function( data ) {
           response( data );
        }
      });
    },
    select: function (event, ui) {
       // Set selection
       // $('.searchProduct').val(ui.item.label); // display the selected text
       $('.searchProduct').val(''); // display the selected text
       // $('.id2').val(ui.item.value); // save selected id to input
       // $('.id').val(ui.item.value); 
       // $('.name2').val(ui.item.label); 
       // $('.mobile2').val(ui.item.mobile); 
       // $('.mobile').val(ui.item.mobile); 
       // '+ui.item.product_code+'
    // <!-- salesItemShowType =  1=general, 2=daiangonstic -->
       var salesItemShowType = $('#salesItemShowType').val(); // display the selected text
       // alert(salesItemShowType);
       // for common 
       if(salesItemShowType==1){
       var slno = $('.slno').length+1;
       var datalist = '<tr>'
       +'<td> <span class="slno">'+slno+'</span> <input type="hidden" name="item[id][]" value="'+ui.item.value+'"> </td>'
       +'<td><input value="'+ui.item.name+'" class="form-control"></td>'
       +'<td>  <input type=""  name="item[disc][]" value="" placeholder="disc notes" class="form-control" > </td>'
       +'<td>  <input type="number" step="1" class="qty form-control" name="item[qty][]" value="1" min="1" > </td>'
       +'<td align="right"><input class="price form-control" type="number" step="any" name="item[price][]" min="0" value="'+ui.item.price+'"  ></td>'
       +'<td align="right"><input class="total form-control" type="" name="item[item_total][]" value="'+ui.item.price+'" readonly ></td>'
       +'<td align="center"> <i class="fa fa-trash del"> </i> </td>'
       +'</tr>';
      }
      //  //for diagonstic
       else if(salesItemShowType==2){
       var slno = $('.slno').length+1;
       var datalist = '<tr>'
       +'<td> <span class="slno">'+slno+'</span> <input type="hidden" name="item[id][]" value="'+ui.item.value+'"> </td>'
       +'<td> '+ui.item.product_code+'</td>'
       +'<td>'+ui.item.name+'  <input type="hidden" class="qty" name="item[qty][]" value="1" > </td>'
       +'<td align="right">'+ui.item.price+'<input class="price" type="hidden" name="item[price][]" value="'+ui.item.price+'" readonly style="width:100px"></td>'
       +'<td align="right">'+ui.item.price+'<input class="total" type="hidden" name="item[item_total][]" value="'+ui.item.price+'" readonly style="width:100px"></td>'
       +'<td align="center"> <i class="fa fa-trash del"> </i> </td>'
       +'</tr>';
      }
      else
      {
       // var slno = $('.slno').length+1;
       var datalist = '<tr>'
       +'<td> <span class="slno">'+slno+'</span> <input type="hidden" name="item[id][]" value="'+ui.item.value+'"> </td>'
       +'<td>'+ui.item.name+'  <input type="" class="qty" name="item[qty][]" value="1" > </td>'
       +'<td align="right">'+ui.item.price+'<input class="price" type="" name="item[price][]" value="'+ui.item.price+'" readonly style="width:100px"></td>'
       +'<td align="right">'+ui.item.price+'<input class="total" type="" name="item[item_total][]" value="'+ui.item.price+'" readonly style="width:100px"></td>'
       +'<td align="center"> <i class="fa fa-trash del"> </i> </td>'
       +'</tr>';
      }

       $('.append_items').append(datalist);
       $('.newChange').change();
       // alert(ui.item);
        console.log(ui.item);
       return false;
    }
  });


  // end for ajax autcomplete

    

// end address city zone area
});

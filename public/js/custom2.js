
// **************************** Mahedi *******************************


 jQuery(document).ready(function ()
    {
   $(".refFor").click(function() {
        var val = $(this).val();
        if (val==2) {
         $(".refForQt").hide();
         $(".refForNone").hide();
         $(".refForSO").show();
         // $('.refNo').val($('.refForSO').find("option:selected").text());

        }else if (val==1){
         $(".refForQt").show();
         $(".refForSO").hide();
         $(".refForNone").hide();
         // $('.refNo').val($('.refForQt').find("option:selected").text());
         
        }else if (val==3){
         window.location.href = '/transaction/Invoice/create'; return false;         
        }
        $(".table tbody").html('');
        $(".clear_data :input, .clear_data").val('');
        $(".clear_data1").text('');
        // $('.refForSO').find("option:selected").val('');
        // $('.refForSO').find("option:selected").text('');
        
      // window.location.href = '/transaction/Invoice/create';
      // return false;
    });
 $('.newChange').change(function() {
     update_amounts_sum(); //alert($('.subDiscount').val())
  });

 function update_amounts_sum(){
  var sum1 = 0; sum1 = parseInt($('.subTotal1').val());
  var sum2 = 0; sum2 = parseInt($('.subTotal2').val());
  var sum3 = 0; sum3 = parseInt( $('.subTotal3').val());
  var subVat = 0; subVat = parseInt($('.subVat').val());
  var subDiscount = 0; subDiscount = parseInt($('.subDiscount').val());
 
 var total = ((sum1+sum2+sum3+subVat)-subDiscount);
 var total2and3 = ((sum2+sum3+subVat)-subDiscount);
  $('.subTotal1and2').text(sum1+sum2);
  $('.subTotal1and2').val(sum1+sum2);
  $('.subTotal2and3').text(sum2+sum3);
  $('.subTotal2and3').val(sum2+sum3);
  $('.subTotalNet').text(total);
  $('.subTotalNet').val(total);
  $('.subTotalNet2and3').text(total2and3);
  $('.subTotalNet2and3').val(total2and3);
 
  var paidAmount  = parseInt($('.paidAmount').val());
  var dueAmount  = parseInt($('.dueAmount').val(total-paidAmount));
  var dueAmount  = parseInt($('.dueAmount').text(total-paidAmount));

  // alert(dueAmount)
  
}

setTimeout(function(){ 
        $( ".newChange" ).change()
     }, 1000);


  jQuery('.payment_method').on('change',function(){
      
     var m_id = jQuery(this).val();
     if(m_id)
     {
        jQuery.ajax({
           url : '/ajax/providerName?type=' +m_id,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              jQuery('.provider').empty();
                 $('.provider').append('<option value="">Select one </option>');
              jQuery.each(data, function(key,value){
                 $('.provider').append('<option value="'+ key +'">'+ value +'</option>');
              });
           }
        });
     }
     else
     {
        $('.provider').empty();
     }
  });

  jQuery('.account_type').on('change',function(){
     var acc_id = jQuery(this).val();
     if(acc_id)
     {
        jQuery.ajax({
           url : '/ajax/ChartOfAccounts?type=' +acc_id,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              jQuery('.account_details').empty();
                 $('.account_details').append('<option value="">Select one </option>');
              jQuery.each(data, function(key,value){
                 $('.account_details').append('<option value="'+ key +'">'+ value +'</option>');
              });
           }
        });
     }
     else
     {
        $('.account_details').empty();
     }
  });


  jQuery('.company_name').on('change',function(){
     var com_id = jQuery(this).val();
     if(com_id)
     {
        jQuery.ajax({
           url : '/ajax/CompanyBranchName?type=' +com_id,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              jQuery('.branch_name').empty();
                 $('.branch_name').append('<option value="">Select one </option>');
              jQuery.each(data, function(key,value){
                 $('.branch_name').append('<option value="'+ key +'">'+ value +'</option>');
              });
           }
        });
     }
     else
     {
        $('.branch_name').empty();
     }
  });

  jQuery('.customer_name').on('change',function(){
   // alert()
     var cus_id = jQuery(this).val();
     if(cus_id)
     {
        jQuery.ajax({
           url : '/ajax/CustomerContactName?type=' +cus_id,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              jQuery('.contact_name').empty();
                 $('.contact_name').append('<option value="">Select one </option>');
              jQuery.each(data, function(key,value){
                 $('.contact_name').append('<option value="'+ key +'">'+ value +'</option>');
              });

              // jQuery('.contact_name').empty();
               $('.contact_name2').append('<option value="">Select one </option>');
              jQuery.each(data, function(key,value){
                 $('.contact_name2').append('<option value="'+ key +'">'+ value +'</option>');
              });

           }
        });
     }
     else
     {
        $('.contact_name').empty();
     }
  });

 

  $( "#party_id" ).change(function(){ 
    $("table.DueReceiveTbl tbody").html(''); $('.submit').attr('disabled',true);
    $.getJSON("/ajax/invoice/"+ $(this).val() +"/due", function(jsonData){
        htmldata = '';
          $.each(jsonData, function(i,data)
          {
            if (data.net_total > data.paid_total) {
              var date=" ";
              if (parseInt(data.due_date)) {
                date=data.due_date;
              }
              
              // select +='<option value="'+data.detail_type_id+'" data-info4fill="'+data.details+'" >'+data.dcode+' :: '+data.detail_type_name+'</option>';
              // <td align="center"> <input type="checkbox" name="billReceive[bill_no][]" value="'+data.id+'"></td>
            htmldata +='<tr>'+
                ''+
                '<td title="'+data.id+'"><b class="text-blue">Invoice #'+data.bill_no+'</b>, V#'+data.transaction_id +'<br>'+data.bill_date+'</td>'+
                '<td>'+date+'</td>'+
                '<td align="center">'+data.net_total+'</td>'+
                '<td align="center">'+data.paid_total+'</td>'+
                '<td align="center">'+(data.net_total-data.paid_total)+'</td>'+
                '<td><input type="" name="billReceive[payment]['+data.id+']" class="form-control ramount input amountCR" autocomplete="off" onchange="rAmountSum()" value="0"></td>'+
              '</tr>';
            // $('.submit').attr('disabled',false);
            }
            
          });
        
        $("table.DueReceiveTbl tbody").html(htmldata);
        if(htmldata==''){ $("table.DueReceiveTbl tbody").html('<tr><td colspan="7" align="center" class="alert alert-info"><i>No data found </i></td></tr>');
          $('.submit').attr('disabled',true);
        }

        $('table.DueReceiveTbl tbody').each(function(i, el) {
          if($(el).html() != "" ) {
            $(el).html($(el).html().replace(/null/ig, ""));
          }
        });

    });
  });

  $( "#find_deposit" ).click(function(){ 
    // alert($('.undepoist_id').val());
    $("table.DepositPendingTable tbody").html(''); $('.submit').attr('disabled',true);
    $.getJSON("/ajax/deposit_pending_transection/"+ $('.payment_method').val() +"/"+ $('.undepoist_id').val() +"/find", function(jsonData){
        // alert(jsonData);
        htmldata = '';
          $.each(jsonData, function(i,data)
          {

          htmldata +='<tr>'+
            '<td align="center"><input type="checkbox" name="billPay[bill_no][]" value="'+data.transactionID+'"> </td>'+
            '<td>'+data.transactionID+'</td>'+
            '<td>'+data.transaction_date+'</td>'+
            '<td>'+data.type_name+'</td>'+
            '<td>'+data.name+'</td>'+
            '<td align="center">'+data.instrument_no+'</td>'+
            '<td align="right"><input type="number" align="right" value='+data.transaction_amount+' class="form-control undeposit_amount" autocomplete="off" readonly></td>'+
          '</tr>';
          });
        
        $("table.DepositPendingTable tbody").html(htmldata);
        if(htmldata==''){ $("table.DepositPendingTable tbody").html('<tr><td colspan="7" align="center" class="alert alert-info"><i>No data found </i></td></tr>');
          $('.submit').attr('disabled',true);
        }

        $('table.DepositPendingTable tbody').each(function(i, el) {
          if($(el).html() != "" ) {
            $(el).html($(el).html().replace(/null/ig, ""));
          }
        });

        var sum = 0;
    $('.undeposit_amount').each(function(){
        sum += parseFloat(this.value);
    });
    $('.sumis').text(sum);

    });

  });

  $( "#requisiton_id" ).change(function(){ 
    // alert($('#requisiton_id').val());
    $("table.RequsitionItemTbl tbody").html(''); $('.submit').attr('disabled',true);
    $.getJSON("/ajax/requsition/"+ $(this).val() +"/find", function(jsonData){
        htmldata = '';
          $.each(jsonData, function(i,data)
          {

              
              // select +='<option value="'+data.detail_type_id+'" data-info4fill="'+data.details+'" >'+data.dcode+' :: '+data.detail_type_name+'</option>';
            htmldata +='<tr>'+

              '<td align="center"><input type="checkbox" name="product[req_id][]" value="'+data.id+'"><input type="hidden" name="product[reqID][]" value="'+data.id+'"></td>'+
              
              '<td><input type="hidden" name="product[product_id][]" value="'+data.product_id+'"><input type="text" class="form-control" value="'+data.product_name+'" readonly></td>'+

              '<td><input type="text" name="product[disc][]" class="form-control" value="'+data.disc_notes+'" readonly></td>'+

              '<td align="center"><input type="number" class="qty required form-control" step="1" name="product[qty][]" value="'+data.final_qty+'" readonly></td>'+

              '<td align="center"><input type="number" class="price required form-control" step="1" name="product[amount][]" value="'+data.rate+'"><input type="hidden" class="disc form-control" step="1" name="product[discount_total][]" value="{{@$value->discount}}"></td>'+

              '<td><input style="text-align:right;" type="number" class="form-control total required" step="any" name="product[t_amount][]" value="0" readonly></td>'+'</tr>';
            // $('.submit').attr('disabled',false);
            
            
          });

        
         $("table.RequsitionItemTbl tbody").html(htmldata);
      if(htmldata==''){ $("table.RequsitionItemTbl tbody").html('<tr><td colspan="6" align="center" class="alert alert-info"><i>No data found </i></td></tr>');
        $('.submit').attr('disabled',true);
      }

      $('table.RequsitionItemTbl tbody').each(function(i, el) {
        if($(el).html() != "" ) {
          $(el).html($(el).html().replace(/null/ig, ""));
        }
        });

    });
  });


$("#party_id").change();
$("#requisiton_id").change();

$(function(){

  $(".pay_method").change(function(){
    if ($(this).val()==1) {
      $(".pay_method_action").attr("disabled", "disabled");
      
    }
    else{
      $(".pay_method_action").removeAttr("disabled");
                      
    }
  });
});

$(function(){
  $(".emp_type").change(function(){
    if ($(this).val()==3) {
      $(".emp_type_action").removeAttr("readonly");
    }
    else{
      $(".emp_type_action").attr("readonly", "readonly");

                      
    }
  });
});

$(function(){
  $(".emp_type").change(function(){
    if ($(this).val()==7) {
      $(".terminated_date").removeAttr("readonly");
    }
    else{
      $(".terminated_date").attr("readonly", "readonly");

                      
    }
  });
});

$(function(){
  $(".emp_type").change(function(){
    if ($(this).val()==8) {
      $(".resign_date").removeAttr("readonly");
    }
    else{
      $(".resign_date").attr("readonly", "readonly");

                      
    }
  });
});


  jQuery('.product').on('change',function(){
     var pro_id = jQuery(this).val();
     if(pro_id)
     {
        jQuery.ajax({
           url : '/ajax/ProductRate?type=' +pro_id,
           type : "GET",
           dataType : "json",
           success:function(data)
           {

            $('.price').val(data);

           }

        });
     }
     else
     {
        $('.price').empty();
     }


  });

//   function update_amounts_sum(){
//   var sum1 = 0; sum1 = parseInt($('.subTotal1').val());
//   var sum2 = 0; sum2 = parseInt($('.subTotal2').val());
//   var sum3 = 0; sum3 = parseInt( $('.subTotal3').val());
//   var subVat = 0;
//   var subDiscount = 0;
//   var vat_percent = 0; vat_percent = $('.vat_percent').val();
//   var dis_type = 0; dis_type = parseInt($('.dis_type').val());
//   var dis_amount = 0; dis_amount = parseInt($('.dis_amount').val());

//   var subVat=Math.ceil((vat_percent/100)*sum3);

//   if (dis_type==1){
//     subDiscount=(dis_amount/100)*sum3;
//   }
//   else if(dis_type==2){
//     subDiscount=dis_amount;
//   }
 
//  var total = ((sum1+sum2+sum3+subVat)-subDiscount);
//  var total2and3 = ((sum2+sum3+subVat)-subDiscount);
//   $('.subVat').text(subVat);
//   $('.subVat').val(subVat);
//   $('.subDiscount').text(subDiscount);
//   $('.subDiscount').val(subDiscount);
//   $('.subTotal1and2').text(sum1+sum2);
//   $('.subTotal1and2').val(sum1+sum2);
//   $('.subTotal2and3').text(sum2+sum3);
//   $('.subTotal2and3').val(sum2+sum3);
//   $('.subTotalNet').text(total);
//   $('.subTotalNet').val(total);
//   $('.subTotalNet2and3').text(total2and3);
//   $('.subTotalNet2and3').val(total2and3);
// }

  // $('.vat_percent,.dis_amount,.dis_type').change(function() {
  //    update_amounts_sum(); 
  // });
  // $('table.cart_table1').change(function() {
  //   update_amounts(); update_amounts_sum();
  // });
  // $('table.cart_table2').change(function() {
  //   update_amounts2(); update_amounts_sum();
  // });
  // $('table.cart_table3').change(function() {
  //   update_amounts3(); update_amounts_sum();
  // });
  // $('table.cart_table1').change();
  // $('table.cart_table2').change();
  // $('table.cart_table3').change();

  // $(".vat_percent").change(function() {
  //     var subTotal3 = $('.subTotal3').val();
  //     var vat_percent = $('.vat_percent').val();
  //     var vat=(vat_percent/100)*subTotal3
  //     // alert(vat);
  //     $('.subVat').text(vat);
  //     $('.subVat').val(vat);
  // });




});

 function rAmountSum() {
    var sum = 0;
    $('.ramount').each(function(){
        sum += parseFloat(this.value);
    });
    $('.sumis').text(sum);
    $('.sumis').val(sum);
  }


(function ($) {


setTimeout(function() {
        $(".cart_table1").change();
    }, 1000);

$('.check_first').click(function(){ 

 $('.info4session').val($(this).find(':selected').data("info4session"));
 $('.info4session').text($(this).find(':selected').data("info4session"));
 
  // alert($(this).find(':selected').data("info4session"));
   });

$(".check_first").click();

})(jQuery)

// for profile picture upload
$("#profileImage").click(function(e) {
  $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});


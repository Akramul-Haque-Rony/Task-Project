(function ($) {
  'use strict'
$(".datainfo").on('click,change', function(e) {
    var info4fill = $(this).find(':selected').data("info4fill");
    var info4fill2 = $(this).find(':selected').data("info4fill2");
     // alert(info4fill);
    $('.info4fill').html(info4fill);
     $('.seatAvailable').val(info4fill2);
	
});

setTimeout(function() {
    $('.customer_name').change(); 
}, 1000); // <-- time in milliseconds
 
setTimeout(function(){ 
        $( ".newChange" ).change()
     }, 1000);
      
// $('#printNow').click(function () {
//       $('.defultHide').show()
//       $('.printHide').hide()
//       print();  
//       $('.printHide').show()
//       $('.defultHide').hide()
// });

$('#printNow').click(function () {
   $('.defultHide').show()
   // print();  
   // $('.defultHide').hide()
});

$(".btn-add").click(function(){ 
  var lsthmtl = $(".clone").html();
  $(".increment").after(lsthmtl);
});
$("body").on("click",".btn-danger",function(){ 
  $(this).parents(".hdtuto").remove();
});



$('.datainfo').click(function(){ 
  var info4fill = $(this).find(':selected').data("info4fill");
    var info4fill2 = $(this).find(':selected').data("info4fill2");
     
 $('.info4fill').html(info4fill);
 $('.seatAvailable').val(info4fill2);
 $('.info4session').val($(this).find(':selected').data("info4session"));
 $('.info4session').text($(this).find(':selected').data("info4session"));
 $('.info4trainer').val($(this).find(':selected').data("info4trainer"));
 $('.info4trainer').text($(this).find(':selected').data("info4trainer"));
 $('.info4training').text($(this).find(':selected').data("info4training"));
 $('.info4training').val($(this).find(':selected').data("info4training"));
 $('.info4organization').val($(this).find(':selected').data("info4organization"));
 $('.info4organization').text($(this).find(':selected').data("info4organization"));
 $('.info4location').text($(this).find(':selected').data("info4location"));
 $('.info4location').val($(this).find(':selected').data("info4location"));
 $('.info4start').val($(this).find(':selected').data("info4start"));
 $('.info4start').text($(this).find(':selected').data("info4start"));
 $('.info4end').val($(this).find(':selected').data("info4end"));
 $('.info4end').text($(this).find(':selected').data("info4end"));
 $('.info4max').val($(this).find(':selected').data("info4max"));
 $('.info4enroll').val($(this).find(':selected').data("info4enroll"));
 $('.info4cost').val($(this).find(':selected').data("info4cost"));
	// alert($(this).find(':selected').data("info4session"));
   });

$(".datainfo").click();


$('.checkall').on("change", function(){ 
	var checkclass = ($(this).val());
	if(this.checked) {$('.'+checkclass).prop('checked',true); }
	else{$('.'+checkclass).prop('checked',false); }
});
$('.checkall1').on("change", function(){ 
	var checkclass = ($(this).val());
	if(this.checked) {$('.'+checkclass).prop('checked',true); }
	else{$('.'+checkclass).prop('checked',false); }
});
$('.checkall2').on("change", function(){ 
   var checkclass = ($(this).val());
   if(this.checked) {$('.'+checkclass).prop('checked',true); }
   else{$('.'+checkclass).prop('checked',false); }
});

$(".terms, .from_date").on("change", function(){ 
   var terms = ($(this).val());
   var startdate = ($('.from_date').val()); 
   var newDate = moment(startdate, "YYYY-MM-DD").add(terms, 'days').format('YYYY-MM-DD');
   $('.due_date').val(newDate); 
});



$(".cart_table3,.table").on('change','.productChange',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         var price = $(this).find(':selected').data("sales_price");      
         // alert(pricje);
         currentRow.find(".price").val(price);   
         currentRow.find(".details").val($(this).find(':selected').data("details"));   
         currentRow.find(".stock").val($(this).find(':selected').data("stock"));   
         currentRow.find(".product_code").val($(this).find(':selected').data("product_code"));   
         // $('.sales_price').val($(this).find(':selected').data("sales_price"));
         // $('.stock').text($(this).find(':selected').data("stock"));
         // $('.product_code').val($(this).find(':selected').data("product_code"));
         // $('.details').text($(this).find(':selected').data("details"));
         // $('.details').text($(this).find(':selected').data("details"));
    });

   
$(".doctor_id_new").click(function(){
      $('.doctor_id').prop('required',false);
      $('.doctor_id_text').text('');
  });

})(jQuery)




 jQuery(document).ready(function ()
    {
            jQuery('.company').on('change',function(){
               var cid = jQuery(this).val();
               if(cid)
               {
                  jQuery.ajax({
                     url : '/ajax/empDepartment?company_id=' +cid,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        // console.log(data);
                        jQuery('.dept').empty();
                           $('.dept').append('<option value="">Select one </option>');
                        jQuery.each(data, function(key,value){
                           $('.dept').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('.dept').empty();
               }


              var cid = jQuery(this).val();
               if(cid)
               {
                  jQuery.ajax({
                     url : '/ajax/empDesignation?company_id=' +cid,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        // console.log(data);
                        jQuery('.desig').empty();
                           $('.desig').append('<option value="">Select one </option>');
                        jQuery.each(data, function(key,value){
                           $('.desig').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('.desig').empty();
               }
            });

            jQuery('.dept00').on('change',function(){
               var deptid = jQuery(this).val();
               if(deptid)
               {
                  jQuery.ajax({
                     url : '/ajax/empDesignation?deptid=' +deptid,
                     type : "post",
                     dataType : "json",
                     success:function(data)
                     {
                        jQuery('.desig').empty();
                           $('.desig').append('<option value="">Select one </option>');
                        jQuery.each(data, function(key,value){
                           $('.desig').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('.desig').empty();
               }
            });

// <input type="checkbox"  name="billPay[bill_no][]" value="'+data.id+'"> 
 $( "#party_id" ).change(function(){ 
    $("table.DueBillTbl tbody").html(''); $('.submit').attr('disabled',true);
    $.getJSON("/ajax/bill/"+ $(this).val() +"/due", function(jsonData){
        htmldata = '';
          $.each(jsonData, function(i,data)
          {
            // select +='<option value="'+data.detail_type_id+'" data-info4fill="'+data.details+'" >'+data.dcode+' :: '+data.detail_type_name+'</option>';
            // <input type="checkbox"  name="billPay[bill_no][]" value="'+data.id+'"> 
            htmldata +='<tr>'+
                '<td></td>'+
                '<td title="'+data.id+'"><b class="text-blue">Bill #'+data.bill_no+'</b>, V#'+data.transaction_id
                     +'<br>'+data.bill_date+'</td>'+
                '<td>'+data.due_date+'</td>'+
                '<td>'+data.net_total+'</td>'+
                '<td>'+data.discount_total+'</td>'+
                '<td>'+data.vat_total+'</td>'+
                '<td align="right">'+data.paid_total+'</td>'+
                '<td align="right">'+(data.net_total-data.paid_total)+'</td>'+
                '<td><input type="" name="billPay[payment]['+data.id+']" class="form-control pamount input amountCR" autocomplete="off" onchange="pAmountSum()" value="0"></td>'+
              '</tr>';
            // $('.submit').attr('disabled',false);
          });
        
        $("table.DueBillTbl tbody").html(htmldata);
        if(htmldata==''){ $("table.DueBillTbl tbody").html('<tr><td colspan="9" align="center" class="alert alert-info"><i>No data found </i></td></tr>');
          $('.submit').attr('disabled',true);
        }

        $('table.DueBillTbl tbody').each(function(i, el) {
          if($(el).html() != "" ) {
            $(el).html($(el).html().replace(/null/ig, ""));
          }
        });

    });
  });

            
    });
 function pAmountSum() {
    var sum = 0;
    $('.pamount').each(function(){
        sum += parseFloat(this.value);
    });
    $('.sumis').text(sum);

  }

// for ajax call
 $("#country").change(function(){
            $.ajax({
                url: "{{ route('admin.cities.get_by_country') }}?country_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#city').html(data.html);
                }
            });
        });

 
 


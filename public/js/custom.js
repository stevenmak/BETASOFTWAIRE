$(document).on('click','#checkAll', function()
{
    $(".itemRow").prop("checked",this.checked);
});
$(document).on('click', '.itemRow',function(){
    if($('.itemRow:checked').length == $('.itemRow').length)
    {
        $('#checkAll').prop('checked',true);
    }
    else
    {
        $('#checkAll').prop('checked',false);
    }
});
$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++;
      });

   /* $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
    });*/

    $(document).on('click', '#delete_row', function(){
        if(i>1){
        $(".itemRow:checked").each(function() {
            $(this).closest('tr').remove();
        });
        $('#checkAll').prop('checked', false);
        calculateTotal();}
    });


	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);

			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseFloat($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}

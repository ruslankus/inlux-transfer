$(document).ready(function(e) {
    
	$('#topUpbtn').click(function(e) {
        var errStatus = false;
        var selValue = $("#slctAmnt").val();
        if(!selValue){
            
            $('div.errorMessage').html("Choose ammount");
            errStatus = true;
        }
        else
        {
            $('div.errorMessage').html("");    
        }
        
        return !errStatus;      
    });// click
	
	

	
	
	$('#btnModal').click(function(e) {
        
		var number = $('#phoneNumber').val();
		var errStatus = false;
		
        // checking - is a number available * 
        $.ajax({
			type: 'POST',
			url: '/form/card/checknumber/',
            data:{number:number},
			dataType: 'json',
			async: false,
			success: function(data) {
				
                if(data['status'] == 0)
                {            
                   $('#phoneNumber').next().html('Not correct number!')
                    errStatus = true;              
                }
                else
                {
					$("#hdnNumber").val(number);
                    $('#phoneNumber').next().html('');
					errStatus = false;
                }
			}
		});
		
		return !errStatus;
		
    });// modalClick
	
	
	$("#btnBal").click(function(e) {
        
		var number = $('#phoneNumber').val();
		var errStatus = false;
		
        // checking - is a number available * 
        $.ajax({
			type: 'POST',
			url: '/form/card/checknumber/',
            data:{number:number},
			dataType: 'json',
			async: false,
			success: function(data) {
				
                if(data['status'] == 0)
                {            
                   $('#phoneNumber').next().html('Not correct number!')
                    errStatus = true;              
                }
                else
                {
                    $('#phoneNumber').next().html('');
					errStatus = false;
                }
			}
		});
		
		return !errStatus;

		
		
    });

	
	
	
	
});
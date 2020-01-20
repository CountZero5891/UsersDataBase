$(document).ready(function () {
    readRecords(); 
	});

  	function addRecord(){
  		var id = $('#id').val();
  		var fio = $('#fio').val();
  		var username = $('#username').val();
  		var email = $('#email').val();
          var phone_number = $('#phone_number').val();

  		$.ajax({
  			url:"fromdb.php",
  			type:'post',
  			data: { id :id,
  				fio : fio,
  				username : username,
  				email : email,
				  phone_number : phone_number
  			 },

  			 success:function(data,status){
  			 	readRecords();
  			 }

  		});
  	}	
      function readRecords(){
		var readrecords = "readrecords";
		$.ajax({
			url:"fromdb.php",
			type:"POST",
			data:{readrecords:readrecords},
			success:function(data,status){
				$('#records_content').html(data);
			},

		});
	}
    function DeleteUser(deleteid){
        var conf = confirm("Вы уверены что хотите удалить запись?");
        if(conf == true) {
        $.ajax({
            url:"fromdb.php",
            type:'POST',
            data: {  deleteid : deleteid},

            success:function(data, status){
                readRecords();
            }
        });
        }
    }
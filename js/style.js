function fedback()
	{
		var email = $('#email').val();
		var name = $('#name').val();
		var msg = $('#msg').val();
		var id = $('#art').val();
		$.ajax(
			{
				type: 'POST',
				url: 'blog.php',
				datatype: 'json',
				data: {email:email,name:name,msg:msg,id:id},
				success: function(data)
					{
						document.getElementById('ddiv').innerHTML = data;
					},
				error: function (e) 
					{
						document.getElementById('ddiv').innerHTML = e;
					}
			
			}
		);
	}

function save()
	{
		var email = $('#email').val();
		var name = $('#name').val();
		var msg = $('#msg').val();
		$.ajax(
			{
				type: 'POST',
				url: 'contact.php',
				datatype: 'json',
				data: {email:email,name:name,msg:msg},
				success: function(data)
					{
						document.getElementById('thanks').innerHTML = data;
					},
				error: function (e) 
					{
						document.getElementById('thanks').innerHTML = e;
					}
			
			}
		);
	}



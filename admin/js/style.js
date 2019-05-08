function log()
	{
		var email = $("#em").val();
		var password = $("#pw").val();
		$.ajax(
			{
				type: 'POST',
				url: 'index.php',
				datatype: 'json',
				data: {email:email,password:password},
				success: function(data)
					{
						window.location.replace("dashboard.php");
					},
				error: function (e) 
					{
						document.getElementById('div').innerHTML = data;
					}
			}
		);
	}

function add_art()
	{
		var title = $("#title").val();
		var image = $("#image").val();
		var stext = $("#stext").val();
		var btext = $("#btext").val();
		$.ajax(
			{
				type: 'POST',
				url: 'add_articles.php',
				datatype: 'json',
				data: {title:title,image:image,stext:stext,btext:btext},
				success: function(data)
					{
						window.location.replace("edit_articles.php");
					},
				error: function (e) 
					{
						alert("error");
					}
			}	
		);
	}

function edit_art()
	{
		var image = $("#img").val();
		var id = $("#id").val();
		var title = $("#tit").val();
		var stext = $("#stxt").val();
		var btext = $("#btxt").val();
		$.ajax(
			{
				type: 'POST',
				url: 'edit.php',
				datatype: 'json',
				data: {title:title,image:image,stext:stext,btext:btext,id:id},
				success: function(data)
					{
						window.location.replace("edit_articles.php");
					},
				error: function (e) 
					{
						alert("error");
					}
			}
		);
	}

function edit_about()
	{
		var image = $("#image").val();
		var id = $("#id").val();
		var title = $("#title").val();
		var text = $("#text").val();
		$.ajax(
			{
				type: 'POST',
				url: 'edit_about.php',
				datatype: 'json',
				data: {title:title,image:image,text:text,id:id},
				success: function(data)
					{
						window.location.replace("../about.php");
					},
				error: function (e) 
					{
						alert("error");
					}
			}
		);
	}

function add_admn()
	{
		var name = $("#name").val();
		var image = $("#image").val();
		var email = $("#email").val();
		var password = $("#password").val();
		$.ajax(
			{
				type: 'GET',
				url: 'new_admin.php',
				datatype: 'json',
				data: {name:name,image:image,email:email,password:password},
				success: function(data)
					{
						window.location.replace("new_admin.php");
					},
				error: function (e) 
					{
						alert("error");
					}
			}
		);
	}
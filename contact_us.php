<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery.js"></script>
    <title>Contact Us</title>

    <script type="text/javascript" >
	   $(document).ready(function()
	   {
			$('#ContactForm').on('submit', function(e){
				e.preventDefault();
				$("#feedback").hide();
				$("#animation").show();
				var formData = new FormData($(this)[0]);
				$.ajax({
					url : $(this).attr('action') || window.location.pathname,
					type: 'POST',
					data: formData,
					success: function (data) {
						$("#animation").hide();
						var obj = $.parseJSON(data);
						var feedback = obj['feedback'];
						var response = obj['response'];
						if(feedback==1)
						{
							$("#feedback").show();
							$("#feedback").html("<div class='success'><p>"+response+"</p></div>");
						}else{
							if(response!=""){
								$("#feedback").show();
								$("#feedback").html("<div class='error'><p>"+response+"</p></div>");
							}
						}
					},
					cache: false,
					contentType: false,
					processData: false
				});
			});
	   });
	</script>
</head>
<body>
    <div class="container">
        <div class="box">
            <h3>Contact Us</h3>
            <form action="process.php" method="POST" id="ContactForm">
                <input type="text" name="name" id="" placeholder="Name">
                <input type="name" name="email" id="" placeholder="Email">
                <textarea name="message" id="" cols="30" rows="5" placeholder="Message"></textarea>
                <input type="submit" name="submit" value="SEND">
            </form>
        </div>
        <div class="image">
            <img src="1.jpg" alt="">
        </div>
    </div>
    <div id="animation">
        <div class="spinner"></div>
     </div>
     <div id="feedback">
        <!-- <div class="success">You have successfully login</div> -->
     </div>
</body>
</html>
<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="logo-foter"><a href="index.php" title=""><img src="images/logo-footer.png" alt=""></a></div>
          <p style="color:#fff; font-size:13px; margin-top:7px;">JourneyBid's mission is to enrich group travel planning. With single-post updates and faster, cheaper, bookings, with confidence and value. JourneyBid is your new travel marketplace. Let bus and travel firms bid for your trips: corporate, school or festival transport. No more costly searches.

<br /> <br /> One stop marketplace for bus and coach planning, commission free for group travellers and group planners. 

          
          <br /> <br />
          
          <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> (+353) 91 556 608 <br />
          
          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email: info@journeybid.com
          
          
          
          
          </p>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2">
          <div class="ul-ft">
            <ul>
              <li><a href="about-us.php" title="">About</a></li>
                            <li><a href="how-it-works.php" title="">How it Works</a></li>
                                          <li><a href="faq.php" title="">FAQ</a></li>
              <li><a href="https://journeybid.wordpress.com/" target="_blank">Blog</a></li>



            </ul>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2">
          <div class="ul-ft">
            <ul>

              <li><a href="privacy.php" title="">Privacy Policy</a></li>
              <li><a href="terms-conditions.php" title="">Term of Service</a></li>
                            <li><a href="providers-list.php" title="">Providers</a></li>
                                          <li><a href="contact.php" title="">Contact Us</a></li>
             <!-- <li><a href="javascript:void(0)" title="">Live Help</a></li>-->
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <p class="copyright">© 2016 JourneyBid™ All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        if($(this).attr("value")=="red"){
            //$(".red").toggle();
			$(".red").show();
			$(".green").hide();
			$("#provider").attr('checked',false);
        }
        if($(this).attr("value")=="green"){
            //$(".green").toggle();
			$(".green").show();
			$(".red").hide();
			$("#traveller").attr('checked',false);
        }

    });
});
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/library/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="js/library/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/library/parallax.min.js"></script>
<script type="text/javascript" src="js/library/jquery.nicescroll.js"></script>
<script type="text/javascript" src="js/library/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="js/library/jquery.mb.YTPlayer.min.js"></script>
<script type="text/javascript" src="js/library/SmoothScroll.js"></script>
<script type="text/javascript" src="js/library/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
	/*$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});*/
	$(':input').on('focus',function(){
        $(this).attr('autocomplete', 'off');
    });
	$( function() {
		$( ".calendar-input" ).datepicker({
			dateFormat: "dd/mm/yy"
		});
	} );
	$(document).ready(function(){
			$('.check_mail_existence').on('keyup',function(){
			var emailID = $(this).val();
			$.ajax({
			type:"get",
			url:"check_mail_existence.php?email="+emailID,
			dataType: "json",
			success: function(data){
					if(data.status == 'error'){
						//alert("This Email ID is already registered");
						$(".error-1").html('<label for="cname" generated="true" class="error">Email Is Already Registered.</label>');
						$(".signupdisabled").attr('disabled','disabled');
						$(".signupdisabled1").attr('disabled','disabled');
					}else{
						$(".signupdisabled").removeAttr('disabled');
						$(".signupdisabled1").removeAttr('disabled');
						$(".error-1").html('');
					}
				}
			});
		});
		
		$('.signupdisabled').click(function(){
			if($('.agreecheckedfld').is(':checked')){
				//alert('Please Check Terms & Policies');
			} else {
				alert('Please Check Terms & Policies');
			}		
		});
		$('.signupdisabled1').click(function(){
			if($('.agreecheckedfld1').is(':checked')){
				//$(".signupdisabled1").removeAttr('disabled');
			} else {
				alert('Please Check Terms & Policies');
			}		
		});
		
		/*$(".signupdisabled").attr('disabled','disabled');
		
		$(".signupdisabled1").attr('disabled','disabled');
		
		$('.agreecheckedfld').click(function(){
			if($('.agreecheckedfld').is(':checked')){
				$(".signupdisabled").removeAttr('disabled');
			} else {
				$(".signupdisabled").attr('disabled','disabled');
			}		
		});
		$('.agreecheckedfld1').click(function(){
			if($('.agreecheckedfld1').is(':checked')){
				$(".signupdisabled1").removeAttr('disabled');
			} else {
				$(".signupdisabled1").attr('disabled','disabled');
			}		
		});*/
		
	});
	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();
		$("#journey").validate();
		$("#search").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});
	});
	
</script>
<script>
	$(document).ready(function(){
		$("#resetpassform").validate({
			rules : {
				newpass1 : {
					required : true
				},
				newpass2 : {
					required : true,
					equalTo : "#newpass1"
				},
			},
		});
	});
	/*
	$(document).ready(function(){
		$('.approve').click(function(){
			transemail = $('.email'+$(this).attr('data-btn')).text();
			  $.ajax({    //create an ajax request to load_page.php
					type: "GET",
					url: "ajax.php?email="+transemail,             
					dataType: "html",   //expect html to be returned                
					success: function(response){                    
						$("#responsecontainer").html(response); 
						//alert(response);
					}

    });
		})
	})*/
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".actual_pay_amount").keyup(function(){			
			var actual_amount = $(".actual_pay_amount").val();
			var journey_commission = ( actual_amount * (10/100) );
			$("#jbf").val(journey_commission);
		});
	});
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<script type="text/javascript">
	$("#ccbtn").click(function(){
	var selected_opt = $('select[name=trav_sel_op]').val();
	if(selected_opt == 'Complete'){ $(".com_can_form").attr("action","leave-review.php"); }
	if(selected_opt == 'Cancel'){ $(".com_can_form").attr("action","journey_cancel.php"); }
	
	});
	/*$("#open-review-box").click(function(){
		var rrating = $('input:radio[name=optionsRadios]:checked').val();
	});*/
	
</script>
<!--
<script type="text/javascript">
	$(document).ready(function(){
		$('#transemailvalidate').keyup(function() {
			email = $('#transemailvalidate').val();
			$.ajax({
				type : "GET",
				url: "checkemail_duplicacy.php?email="+email,
				success: function(response){                    
								$("#responsecontainer").html(response); 
								//alert(response);
							}
			});
		});
	});	
</script>
-->
</body>
</html>

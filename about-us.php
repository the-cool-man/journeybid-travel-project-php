<?php include 'header.php';?>
	<div class="container">
		<div class="row">
			<?php
            $select="select * from page where slug='about-us'";
			$contents=mysql_query($select);
			$con=mysql_fetch_array($contents);				
					
			echo htmlspecialchars_decode($con['page_content'],ENT_QUOTES);
			?>
            
            
            <section class="follow-about" style="margin-bottom:20px;">
          <div class="follow-group">
          <a href="https://www.facebook.com/journeybid" title="" target="_blank"><i class="fa fa-facebook"></i></a> 
          <a href="https://twitter.com/JourneyBid" title="" target="_blank"><i class="fa fa-twitter"></i></a> 
          <a href="#" title=""><i class="fa fa-linkedin"></i></a> 

          </div>
        </section>
        
        
		</div>
	</div>
<?php include 'footer.php';?>
 
	<section id="content">
	
	<div class="container">
		<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
								
    
    <div class="contact-info">
        <p><strong>Email:</strong> <a href="timesjobs@gmail.com">timesjobs@gmai.com</a></p>
        <p><strong>Phone:</strong> 9727374054</p>
        <p><strong>Address:</strong> pin-395008 surat, gujarat, india.</p>
    </div>
								</div>  
							</div>
						</div>
	<div class="row">
								<div class="col-md-6">
									
								  	
		   <!-- Form itself -->
		   <form name="sentMessage" id="contactForm"  novalidate>
	       <h3>Contact me</h3>
		 <div class="control-group">
                    <div class="controls">
			<input type="text" class="form-control" 
			   	   placeholder="Full Name" id="name" required
			           data-validation-required-message="Please enter your name" />
			  <p class="help-block"></p>
		   </div>
	         </div> 	
                <div class="control-group">
                  <div class="controls">
			<input type="email" class="form-control" placeholder="Email" 
			   	            id="email" required
			   		   data-validation-required-message="Please enter your email" />
		</div>
	    </div> 	
			  
               <div class="control-group">
                 <div class="controls">
				 <textarea rows="10" cols="100" class="form-control" 
                       placeholder="Message" id="message" required
		       data-validation-required-message="Please enter your message" minlength="5" 
                       data-validation-minlength-message="Min 5 characters" 
                        maxlength="999" style="resize:none"></textarea>
		</div>
               </div> 		 
	     <div id="success"> </div> <!-- For success/fail messages -->
	    <button type="submit" class="btn btn-primary pull-center" style="margin: 20px;">Send</button><br />
          </form>
								</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Location Map</title>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- CSS for Map Container -->
    <style>
        #map {
            height: 500px;
            width: 50%;
        }
    </style>
</head>
<body>

<!-- Map Container -->
<div id="map"></div>

<!-- Include Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Coordinates of Surat, Gujarat
    var suratLocation = [21.1702, 72.8311];

    // Initialize Leaflet map with the Surat location as the center
    var map = L.map('map').setView(suratLocation, 13); // Use an appropriate zoom level

    // Add a base tile layer from OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker for the Surat location
    var suratMarker = L.marker(suratLocation).addTo(map);

    // Add a popup to the marker (Optional)
    suratMarker.bindPopup("<b>Surat</b><br>395008").openPopup();
</script>

</body>
</html>

								
								

								
 
	</section>

	
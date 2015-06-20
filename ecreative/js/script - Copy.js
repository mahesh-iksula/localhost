/*
* Author:      Marco Kuiper (http://www.marcofolio.net/)
*/

// Speed of the automatic slideshow
var slideshowSpeed = 8000;

// Variable to store the images we need to set as background
// which also includes some text and url's.
var photos = [ {
		"title" : "Creative Portraits",
		"image" : "creative_portraits_slider.jpg",
		"url" : "http://glitzphotography.com/creative",
		"firstline" : "Super-fly, epically-rad, KICK-ASS, FASHION-INSPIRED",
		"secondline" : "CREATIVE PORTRAITS"
	}, {
		"title" : "Fashion",
		"image" : "fashion_slider.jpg",
		"url" : "http://glitzphotography.com/creative/fashion/",
		"firstline" : "fabulous",
		"secondline" : "so fashion"
	}, {
		"title" : "Live",
		"image" : "live_slider.jpg",
		"url" : "http://glitzphotography.com/creative/live/",
		"firstline" : "Let's rock",
		"secondline" : "Live event"
	}, {
		"title" : "Cinema",
		"image" : "cinema_slider.jpg",
		"url" : "http://glitzphotography.com/creative/cinema/",
		"firstline" : "Tellin' Stories, Overloadin' your eyes",
		"secondline" : "Cinematic Stories"
	}, {
		"title" : "Weddings",
		"image" : "wedding_slider.jpg",
		"url" : "http://glitzphotography.com/creative/weddings/",
		"firstline" : "Capturing the love ",
		"secondline" : "Lifestyle Weddings"
	}
];



$(document).ready(function() {
		
		
	
	
	$("#portraits").click(function() {
		currentImg = 0;					   
		navigate("next");
		$("#portraits").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/portraits_over.png)" });
		
		
	});
	
		$("#fashion").click(function() {
			currentImg = 1;					   
		navigate("next");				
	
		$("#fashion").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/fashion_over.png)" });
			
	});
		
			$("#live").click(function() {
				currentImg = 2;					   
		navigate("next");				 
		
		$("#live").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/live_over.png)" });
	
	});
			
				$("#cinema").click(function() {
								
			currentImg = 3;					   
		navigate("next");
		$("#cinema").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/cinema_over.png)" });

	});
				
					$("#wedding").click(function() {
											
			currentImg = 4;					   
		navigate("next");
		$("#wedding").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/weddings_over.png)" });
		
	});
	
	
	

	
	
	
	var interval;
	
	
	var activeContainer = 1;	
	var currentImg = 0;

	

	var navigate = function(direction) {
		// Check if no animation is running. If it is, prevent the action
	
		
		
		
		// Check which current image we need to show
		if(direction == "next") {
			currentImg++;
			if(currentImg == photos.length + 1) {
				currentImg = 1;
			}
			
			
		} else if (direction == "previous") {
			currentImg--;
			if(currentImg == 0) {
				currentImg = photos.length;
			}
		}
		
		// Check which container we need to use
		var currentContainer = activeContainer;
		if(activeContainer == 1) {
			activeContainer = 2;
		} else {
			activeContainer = 1;
		}
		
		if (direction == "portraits") {
			currentImg = 0;
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}
			
			if (direction == "fashion") {
			currentImg = 1;
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}
			
			if (direction == "live") {
			currentImg = 2;
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}
			
			if (direction == "cinema") {
			currentImg = 3;
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}
			
			if (direction == "weddings") {
			currentImg = 4;
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}
			
		/*	if (direction == "fashion") {
			showImage(photos[1], currentContainer, activeContainer);
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}
			
		if (direction == "live") {
			showImage(photos[2], currentContainer, activeContainer);
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}	
			
			if (direction == "cinema") {
			showImage(photos[3], currentContainer, activeContainer);
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}
			
			if (direction == "weddings") {
			showImage(photos[4], currentContainer, activeContainer);
		}else {
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
			}
		*/
	};
	
	var currentZindex = -1;
	var showImage = function(photoObject, currentContainer, activeContainer) {
		animating = true;
		
		
		if (photoObject.title == "Creative Portraits") {
				$("#portraits").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/portraits_over.png)" });
				
			}else {
				$("#portraits").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/portraits.png)" });
			};
			
			
			
			if (photoObject.title == "Fashion") {
				$("#fashion").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/fashion_over.png)" });
				
			}else {
				$("#fashion").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/fashion.png)" });
			};
			
			if (photoObject.title == "Live") {
				$("#live").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/live_over.png)" });
				
			}else {
				$("#live").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/live.png)" });
			};
			
			
			if (photoObject.title == "Cinema") {
				$("#cinema").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/cinema_over.png)" });
				
			}else {
				$("#cinema").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/cinema.png)" });
			};
			
			
			if (photoObject.title == "Weddings") {
				$("#wedding").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/weddings_over.png)" });
				
			}else {
				$("#wedding").css({ "background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/sliderNav/weddings.png)" });
			};
		
		
		// Make sure the new container is always on the background
		currentZindex--;
		
		// Set the background image of the new active container
		$("#headerimg" + activeContainer).css({
			"background-image" : "url(http://glitzphotography.com/wp-content/themes/GlitzPhotography2010/skins/dark/images/" + photoObject.image + ")",
			"display" : "block",
			"z-index" : currentZindex
		});
		
		// Hide the header text
		$("#headertxt").css({"display" : "none"});
		
		// Set the new header text
		$("#firstline").html(photoObject.firstline);
		$("#secondline")
			.attr("href", photoObject.url)
			.html(photoObject.secondline);
		$("#pictureduri")
			.attr("href", photoObject.url)
			.html("Ready? Go //");
		
		
		// Fade out the current container
		// and display the header text when animation is complete
		$("#headerimg" + currentContainer).fadeOut(function() {
			setTimeout(function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
				
			
			
		
			
			}, 500);
		});
	};
	
	
	
	// We should statically set the first image
	navigate("next");
	
	// Start playing the animation
	interval = setInterval(function() {
		navigate("next");
		
		
	}, slideshowSpeed);
	
});
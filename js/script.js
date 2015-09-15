var screen1_top_offset = 0;
var screen2_top_offset = 0;
var screen3_top_offset = 0;
var screen4_top_offset = 0;
var screen5_top_offset = 0;
var screen6_top_offset = 0;
var screen7_top_offset = 0;
var screen8_top_offset = 0;

var screen1_animated = false;
var screen2_animated = false;
var screen3_animated = false;
var screen4_animated = false;
var screen5_animated = false;
var screen6_animated = false;
var screen7_animated = false;
var screen8_animated = false;

var contacts_animated = false;

$(window).load(function(){
	resize();
	
    $('#loading').fadeOut(function(){
	    $('#body').animate({'opacity': 1}, 800);
		initScrolling();
    });
    $('#newsletter-button').click(function(){
    	url = 'http://nmg.us10.list-manage1.com/subscribe?u=fe3bbc3daf0cecda1c2a2bf3b&id=0e01780af7&MERGE0='+$('#newsletter-input').val();
    	window.open(url, '_blank');
	});
	$('.search-submit').click(function(){
    	url = 'https://www.google.com/search?q='+$('.search-input').val()+'+site:nmg.us.com';
    	window.open(url, '_blank');
	});
}); 
$(window).resize(function(){
	resize();
	initScrolling();
});

function initScrolling(){
	header_height  = $('.home-body .site-header').height();
	screen1_height = $('.home-body .slider').height();
	screen2_height = $('.home-body .excellence').height();
	screen3_height = $('.home-body .products-count').height();
	screen4_height = $('.home-body .about-elements').height();
	screen5_height = $('.home-body .industries').height();
	screen6_height = $('.home-body .special').height();
	screen7_height = $('.home-body .delivery').height();

	screen1_top_offset = header_height;
	screen2_top_offset = screen1_height + screen1_top_offset;
	screen3_top_offset = screen2_height + screen2_top_offset;
	screen4_top_offset = screen3_height + screen3_top_offset;
	screen5_top_offset = screen4_height + screen4_top_offset;
	screen6_top_offset = screen5_height + screen5_top_offset;
	screen7_top_offset = screen6_height + screen6_top_offset;

	$(window).bind('scroll', doScrollEvents);
	doScrollEvents();
}

function doScrollEvents(){
    var scrollTop = $(this).scrollTop();
    var scrollBottom = scrollTop+screenHeight;

	/********************************************/
	/******************* home *******************/
	/********************************************/
	if( !screen2_animated && scrollBottom >= screen2_top_offset+300 ){
    	screen2_animated = true;

    	$('.home-body .excellence .excellence-heading').css('margin-left', '-30px');
	    $('.home-body .excellence .excellence-heading').animate({'margin-left': '+=30', 'opacity': 1}, 800);
	    $('.home-body .excellence .excellence-content').css('margin-left', '-30px');
	    $('.home-body .excellence .excellence-content').delay(800).animate({'margin-left': '+=30', 'opacity': 1}, 800);
	    $('.home-body .excellence .excellence-bar').delay(1600).animate({'opacity': 1}, 400);
    }

	if( !screen4_animated && scrollBottom >= screen4_top_offset+(screen4_height*2/3) ){
    	screen4_animated = true;
    	$('.home-body .about-elements .about-hexagon').animate({'opacity': 1}, 800);
    }

	if( !screen6_animated && scrollBottom >= screen6_top_offset+(screen6_height/2) ){
    	screen6_animated = true;
    	time = 0;
	    $('.home-body .special .hexagon-outter').each(function() {
	    	$(this).css('top', '-40px');
		    $(this).delay(time).animate({'top': '+=40', 'opacity': 1}, 800);
		    time += 200;
		});
    }

	if( !screen7_animated && scrollBottom >= screen7_top_offset+screen7_height ){
    	screen7_animated = true;
		$('.home-body .delivery .delivery-graph .bars').animate({width: 'show'}, 1600, function(){
			$('.home-body .delivery .delivery-graph .info').animate({'opacity': 1}, 800);
			$('.home-body .delivery .delivery-line').animate({'opacity': 1}, 800);
		});
    }

    /********************************************/
	/***************** contacts *****************/
	/********************************************/
	if( !contacts_animated && scrollBottom >= $('.offices-body').height()+($('.contacts-body').height()/2) ){
    	contacts_animated = true;
		time = 0;
	    $('.contacts-body .item').each(function() {
	    	$(this).css('left', '-50px');
		    $(this).delay(time).animate({'left': '+=50', 'opacity': 1}, 800);
		    time += 500;
		});
	}
}

$(window).load(function(){
	/********************************************/
	/******************* home *******************/
	/********************************************/
	//accordion
 	close_slide_width = $("#accordion li").width();
 	open_slide_width = $("#accordion").width() - (close_slide_width*3) - 1;

    activeItem = $("#accordion li:first");
    $(activeItem).addClass('active');
    $(activeItem).width(open_slide_width);

    $("#accordion li").mouseenter(function(){
        $(activeItem).animate({width: close_slide_width+"px"}, {duration:800, queue:false});
        $(this).animate({width: open_slide_width+"px"}, {duration:800, queue:false});
        $(activeItem).removeClass('active');
        activeItem = this;
        $(activeItem).addClass('active');
    });

	//rolling background
	(function loopBackground() {
	   $('.products-count').animate({'background-position': '+=1000%'}, $(".products-count").width()*150, 'linear', function(){
	   		loopBackground();
	   }); 
	})();

	//timeline
	$('.home-body .timeline .year .year-title').hover(function(){
        $(this).parent().children('.year-content').fadeIn(400);
    }, function(){
        $(this).parent().children('.year-content').fadeOut(400);
    });
        
	/********************************************/
	/***************** services *****************/
	/********************************************/
	$(".services-body .items-selection").find(".item").click(function(){
		left_offset = $(".services-body .items .item").width()*$(this).index();
		$(".services-body .items").animate({'left': '-'+left_offset+'px'}, 500);
		$('.services-body .items-selection .item.active').removeClass('active');
		$(this).addClass('active');
		window.location.hash = '#!' + $(this).attr('id');
	});
	hash = window.location.hash;
	if( hash != '' && hash.indexOf('#!') === 0 ){
		$(".services-body .items-selection #"+hash.substring(2)).click();
	}

	/********************************************/
	/***************** partners *****************/
	/********************************************/
	$(".partner-body .items-selection").find(".item").click(function(){
		index = $(this).index();
		left_offset = $(".partner-body .items .item").width()*index;
		$(".partner-body .items").animate({'left': '-'+left_offset+'px'}, 500);
		$('.partner-body .items-borders .item.active').removeClass('active');
		$('.partner-body .items-borders .item:eq('+index+')').addClass('active');
		window.location.hash = '#!' + $(this).attr('id');
	});
	hash = window.location.hash;
	if( hash != '' && hash.indexOf('#!') === 0 ){
		$(".partner-body .items-selection #"+hash.substring(2)).click();
	}

	/********************************************/
	/****************** gallery *****************/
	/********************************************/
	$('.gallery-body .contianer .item a').hover(function(){
    	$(this).parent().find('.arrow-and-details').animate({'opacity': 1}, 400);
    }, function(){
       	$(this).parent().find('.arrow-and-details').animate({'opacity': 0}, 400);
    });

	$(".projects-body .filter-buttons .arrow.down").click(function(){
    	$(this).fadeOut(10, function(){
			$(".projects-body .filter-buttons .filters").css({'top': '-=210'});
			$(".projects-body .filter-buttons .filters").show();
	    	$(".projects-body .filter-buttons .filters").animate({'top': '+=210'}, 400);
			$(".projects-body .filter-buttons .arrow.up").css({'top': '-=210'});
    		$(".projects-body .filter-buttons .arrow.up").show();
	    	$(".projects-body .filter-buttons .arrow.up").animate({'top': '+=210'}, 400);
    	});
	});
	$(".projects-body .filter-buttons .arrow.up").click(function(){
    	$(".projects-body .filter-buttons .filters").animate({'top': '-=210'}, 400, function(){
    		$(".projects-body .filter-buttons .filters").hide();
			$(".projects-body .filter-buttons .filters").css({'top': '+=210'});
    	});
    	$(".projects-body .filter-buttons .arrow.up").animate({'top': '-=210'}, 400, function(){
    		$(".projects-body .filter-buttons .arrow.up").hide();
			$(".projects-body .filter-buttons .arrow.up").css({'top': '+=210'});
    	});
    	$(".projects-body .filter-buttons .arrow.down").delay(400).fadeIn(10);
	});
	$(".projects-body .sliders-buttons").find(".slider-button").click(function(){
		index = $(this).index();
		left_offset = $(".projects-body").width()*index;
		$(".projects-body .projects-contianer").animate({'left': '-'+left_offset+'px'}, 800);
		$('.projects-body .sliders-buttons .slider-button.active').removeClass('active');
		$('.projects-body .sliders-buttons .slider-button:eq('+index+')').addClass('active');
		// window.location.hash = '#!' + $(this).attr('id');
	});
	// hash = window.location.hash;
	// if( hash != '' && hash.indexOf('#!') === 0 ){
	// 	$(".projects-body .items-selection #"+hash.substring(2)).click();
	// }
	// $(".projects-body .type-buttons .type-button").click(function(){
	// 	id = $(this).attr('id');
	// 	type = id.substring(0, id.length-7);
	// 	filter = 'has_'+type;
	// 	// $(".projects-body .projects-contianer .project-contianer").fadeOut();
	// 	$(".projects-body .projects-contianer .project-contianer:not(."+filter+")").hide(800);
	// 	$(".projects-body .projects-contianer .project-contianer."+filter).show(800);
	// });

	$(document).keydown(function(e) {
	    switch(e.which) {
	        case 37: // left
	        	$(".project-body .slider-button.left").click();
	        	break;
	        case 39: // right
	        	$(".project-body .slider-button.right").click();
	        	break;
	        default: 
	        	return; // exit this handler for other keys
	    }
	    e.preventDefault(); // prevent the default action (scroll / move caret)
	});
	$(".project-body").find(".slider-button").click(function(){
		left_offset = $(".project-body").width();
		contianer = $(".project-body .project-contianer .project-items");
		current_left_offset = contianer.css('left');
		contianer_width = contianer.width();

		if( contianer_width == 0 || left_offset == contianer_width ){
			return;
		}

		if( $(this).hasClass('left') ){ 
			if( current_left_offset != '0px' ){
				contianer.animate({'left': '+='+left_offset+'px'}, 800);
			}else{
				contianer.animate({'left': '-'+(contianer_width-left_offset)+'px'}, 800);
			}
		}else if( $(this).hasClass('right') ){
			if( current_left_offset != '-'+(contianer_width-left_offset)+'px' ){
				contianer.animate({'left': '-='+left_offset+'px'}, 800);
			}else{
				contianer.animate({'left': '0px'}, 800);
			}
		}
		// window.location.hash = '#!' + $(this).attr('id');
	});
	// hash = window.location.hash;
	// if( hash != '' && hash.indexOf('#!') === 0 ){
	// 	$(".project-body .items-selection #"+hash.substring(2)).click();
	// }
	$(".project-body .project-contianer .top-layer .thumbnails .arrow.up").click(function(){
    	$(this).fadeOut(10, function(){
	    	$(".project-body .project-contianer .top-layer .thumbnails .images").animate({'top': '0'}, 400);
	    	$(".project-body .project-contianer .top-layer .thumbnails .arrow.down").animate({'top': '0'}, 400);
    	});
	});
	$(".project-body .project-contianer .top-layer .thumbnails .arrow.down").click(function(){
    	$(".project-body .project-contianer .top-layer .thumbnails .images").animate({'top': '300'}, 400);
    	$(".project-body .project-contianer .top-layer .thumbnails .arrow.down").animate({'top': '300'}, 400);
    	$(".project-body .project-contianer .top-layer .thumbnails .arrow.up").delay(400).fadeIn(10);
	});
	$(".project-body .project-contianer .top-layer .thumbnails .images").find(".image-contianer").click(function(){
		left_offset = $(".project-body").width();
		index = $(this).index();
		$(".project-body .project-contianer .project-items").animate({'left': '-'+(index*left_offset)+'px'}, 800);
		// window.location.hash = '#!' + $(this).attr('id');
	});

	/********************************************/
	/***************** contacts *****************/
	/********************************************/
    $('.offices-body .items-triggers').find(".item-trigger").hover(function(){
    	index = $(this).index();
		$('.offices-body .items .item:eq('+index+')').animate({'opacity': 1}, 300);
    }, function(){
       	index = $(this).index();
		$('.offices-body .items .item:eq('+index+')').animate({'opacity': 0}, 300);
    });

	$(".contactus-body .contianer .button").click(sendEmail);
	$(".contactus-body .contianer .button-image").click(sendEmail);
	function sendEmail(){
		    $.ajax({
		      url: 'index.php?r=site/sendEmail',
		      type: "post",
		      data: { name: $(".contactus-body .contianer #name").val(), 
		              email: $(".contactus-body .contianer #email").val(), 
		         	  subject: $(".contactus-body .contianer #subject").val(), 
		         	  message: $(".contactus-body .contianer #message").val() },  
		      error: function(xhr,tStatus,e){
		        if(!xhr){
		            alert(" We have an error ");
		            alert(tStatus+"   "+e.message);
		        }else{
		            alert("else: "+e.message); // the great unknown
		        }
		      },
		      success: function(resp){
		      	if( resp == 'done' ){
		      		$('#loading_spinner').remove();
			        $(".contactus-body .contianer #name").val(''); 
		            $(".contactus-body .contianer #email").val('');
		         	$(".contactus-body .contianer #subject").val(''); 
		         	$(".contactus-body .contianer #message").val('');
		      	}
         		alert(resp);
		      } 
		    });
	}
});
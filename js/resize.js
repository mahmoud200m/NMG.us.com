var screenWidth, screenHeight;
var documentWidth = 2880;
var old_ratio = 1;
var ratio;

function resize() {
	screenWidth = document.documentElement.clientWidth;
	screenHeight = document.documentElement.clientHeight;
	ratio = screenWidth / documentWidth;
	ratio = ratio / old_ratio;
	old_ratio = screenWidth / documentWidth;

	$("*").each(function(){
		if( $(this).hasClass('no-resize') ){
			return true;
		}

		$(this).width($(this).width() * ratio);
		$(this).height($(this).height() * ratio);
		$(this).css({"margin-top": ($(this).css("margin-top").replace("px", "") * ratio) + "px"});
		$(this).css({"margin-right": ($(this).css("margin-right").replace("px", "") * ratio) + "px"});
		$(this).css({"margin-bottom": ($(this).css("margin-bottom").replace("px", "") * ratio) + "px"});
		$(this).css({"margin-left": ($(this).css("margin-left").replace("px", "") * ratio) + "px"});
		$(this).css({"padding-top": ($(this).css("padding-top").replace("px", "") * ratio) + "px"});
		$(this).css({"padding-right": ($(this).css("padding-right").replace("px", "") * ratio) + "px"});
		$(this).css({"padding-bottom": ($(this).css("padding-bottom").replace("px", "") * ratio) + "px"});
		$(this).css({"padding-left": ($(this).css("padding-left").replace("px", "") * ratio) + "px"});
		$(this).css({"top": ($(this).css("top").replace("px", "") * ratio) + "px"});
		$(this).css({"right": ($(this).css("right").replace("px", "") * ratio) + "px"});
		$(this).css({"bottom": ($(this).css("bottom").replace("px", "") * ratio) + "px"});
		$(this).css({"left": ($(this).css("left").replace("px", "") * ratio) + "px"});

		$(this).css({"line-height": ($(this).css("line-height").replace("px", "") * ratio) + "px"});
		$(this).css({"font-size": ($(this).css("font-size").replace("px", "") * ratio) + "px"});
	});
}

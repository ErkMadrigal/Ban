$(document).ready(function(){

	var height = $(window).height();

	ajustesIniciales();


	function ajustesIniciales(){
		$(".body").css({"margin-top": height - 10 + "px"});
	}


	$(document).scroll(function(){
		var scrollTop = $(this).scrollTop();
		var pixels = scrollTop / 70;

		if(scrollTop < height){
			$(".contenedor_general").css({
				"-webkit-filter": "blur(" + pixels + "px)",
				"background-position": "center -" + pixels * 10 + "px"
			});

		}

	});

});
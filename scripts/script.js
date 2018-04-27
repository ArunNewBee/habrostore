$(document).ready(function(){
	
	$(window).scroll(function(event) {
		
		var y=$(this).scrollTop();
		if(y>=120)
		{
			$('#scroll').removeClass('sc');
			$('#head').addClass('hd');
			$('#mainani').addClass('mainancls');
			$('#subani').addClass('subancls');
		}
		if(y>=100)
		{
			$('#mainani').addClass('mainancls');
			$('#subani').addClass('subancls');
			$('#divmenu').addClass('divmenu1');
		}
		if(y<100)
		{
			$('#mainani').removeClass('mainancls');
			$('#subani').removeClass('subancls');
			$('#menu').removeClass('divmenu1');
		}
		
	});

});
	
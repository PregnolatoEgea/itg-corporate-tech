$.ajax({
		url: "https://syndication.teleborsa.it/Italgas/Feeds/jsonValues", 
		method: "get",		
		success: function(result){
        	$("#title-perc").text(result.percentChange);
			$("#title-price").text(result.lastTrade);
		}
    });
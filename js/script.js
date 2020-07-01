function load(){
		month();
		all();
}
function month(){
	var itens = "", url = "php/bill/consultBillMonth.php";

    $.ajax({
	    url: url,
	    cache: false,
	    dataType: "json",
	    beforeSend: function() {
		    $("h2").html("Loading..."); 
	    },
	    error: function() {
		    $("h2").html("Source problem");
	    },
	    success: function(retorno) {
		    if(retorno[0].erro){
			    $("h2").html(retorno[0].erro);
		    }
		    else{
			    for(var i = 0; i<retorno.length; i++){
				    itens += "<tr>";
				    itens += "<td>" + retorno[i].user + "</td>";
				    itens += "<td>" + retorno[i].totalMonth+ "</td>";
				    itens += "<td>" + retorno[i].month + "</td>";
				    itens += "<td>" + retorno[i].year + "</td>";
				    itens += "</tr>";
			    }
			    $("#myTableMonth tbody").html(itens);		    
			    $("h2").html("Loaded");
		    }
	    }
    });
}
function all(){
	var itens = "", url = "php/bill/consultBillAll.php";

    $.ajax({
	    url: url,
	    cache: false,
	    dataType: "json",
	    beforeSend: function() {
		    $("h2").html("Loading..."); 
	    },
	    error: function() {
		    $("h2").html("Source problem");
	    },
	    success: function(retorno) {
		    if(retorno[0].erro){
			    $("h2").html(retorno[0].erro);
		    }
		    else{
			    for(var i = 0; i<retorno.length; i++){
				    itens += "<tr>";
				    itens += "<td>" + retorno[i].name + "</td>";
				    itens += "<td>" + retorno[i].value+ "</td>";
				    itens += "<td>" + retorno[i].month + "</td>";
				    itens += "<td>" + retorno[i].year + "</td>";
				    itens += "</tr>";
			    }
			    $("#myTableAll tbody").html(itens);		    
			    $("h2").html("Loaded");
		    }
	    }
    });
}
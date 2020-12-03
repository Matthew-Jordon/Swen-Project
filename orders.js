window.onload = funtion (){
	var btn = document.querySelector("button")[0];
	var textInput = document.getElementsByTagName("input");
	var searchI = document.getElementById("searchinput").value;
	var searchT = document.getElementById("searchTRN");
	var checkOut = document.getElementById("checkout");
	var end = document.getElementById("cancel");
	var result = document.getElementsByClassName("result");
	var xhttp = new XMLHttpRequest();
	
	
	searchT.addEventListener("click", function(e){
		e.preventDefault();
		
		xhttp.open("GET", "server.php?trn="+searchI+"&context=statussearch", true);
		
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4){
				if(xhttp.status == 200){
					if (searchI.length !== 0){
						var info = xhttp.responseText;
						result.innerHTML = info;
					}
				}
			}else if(searchI.length < 9){
				alert("Check TRN");
			}
		}
		
		// var textInput = document.getElementById("textinput").value;
		for(i=0; i < textInput.length; i++){
			if (textInput[i].value == ""){
				textInput[i].style.background = "red";
				textInput[i].classList.add("error");
				textInput[i].setCustomValidity("Please fill out this field");
			}
		}
		
		xttp.send();
	});
	
	checkOut.addEventListener("click". function(e){
		e.preventDefault();
		
		
		
		xhttp.open("GET", "server.php?trn="+searchI+"&context=statussearch", true);
	});
	
	end.addEventListener("click", function(e){
		e.preventDefault();
		
		for(i=0; i < textInput.length; i++){
		textInput[i].value = "";
		}
	}
}
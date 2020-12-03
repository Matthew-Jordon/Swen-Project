window.onload = funtion (){
	var btn = document.querySelector("button")[0];
	var searchI = document.getElementById("searchbu");
	var searchT = document.getElementById("searchTRN");
	
	
	btn.addEventListener("click", function(e){
		e.preventDefault();
		
		var textInput = document.getElementById("textinput").value;
		for(i=0; i < textInput.length; i++){
			if (textInput[i] == ""){
				textInput[i].style.background = "red";
				textInput[i].classList.add("error");
				textInput[i].setCustomValidity("Please fill out this field");
			}
		}
	});
	
	searchT.addEventListener("click". function(e){
		e.preventDefault();
		
		if(searchI.length < 8){
			alert("Check TRN");
		}
	}
}
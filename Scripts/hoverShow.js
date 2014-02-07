    function HideContent(ident) {
		if(ident.length < 1) { return; }
		document.getElementById(ident).style.display = "none";
	}

	function setPosition(display) {
		display.style.left = "100px";
		display.style.top = "10px";
    }
	
    function ShowContent(ident) {
		if(ident.length < 1) { return; }
		var tag = document.getElementById(ident);
		setPosition(tag);
		tag.style.display = "block";
    }
	
    function ReverseContentDisplay(ident) {
		if(ident.length < 1) { return; }
		var tag = document.getElementById(ident);
		setPosition(tag);
		if(tag.style.display == "none") {
			tag.style.display = "block"; 
		}
		else {
			tag.style.display = "none";
		}
    }

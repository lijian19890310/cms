function cswitchTab(ctabID, ctabboxDivID) {
		for (i = 1; i < 9; i++) {
			if ("ctab" + i == ctabID) {
				document.getElementById(ctabID).className = "current";
			} else {
				document.getElementById("ctab" + i).className = "";
			}
			if ("ctabboxDiv" + i == ctabboxDivID) {
				document.getElementById(ctabboxDivID).style.display = "";
			} else {
				document.getElementById("ctabboxDiv" + i).style.display ="none";
			}
		}
	}
function nswitchTab(ntabsID, ntabboxDivID) {
		for (i = 1; i < 8; i++) {
			if ("ntabs" + i == ntabsID) {
				document.getElementById(ntabsID).className = "n_current";
			} else {
				document.getElementById("ntabs" + i).className = "";
			}
			if ("ntabboxDiv" + i == ntabboxDivID) {
				document.getElementById(ntabboxDivID).style.display = "";
			} else {
				document.getElementById("ntabboxDiv" + i).style.display ="none";
			}
		}
	}
$(document).ready(function() {
	$("#mega_menu1").css('left','0px'); 
	$("#mega_menu2").css('left','113px'); 
	$("#mega_menu3").css('left','225px'); 
	$("#mega_menu4").css('left','0px'); 
	$("ul#ntabs li").hover(function() { //Hover over event on list item
		$(this).find("div").show(); //Show the subnav
		//alert($(this).find("a").size());
		if($(this).find("a").size()>1){
			$("#blank1").css('height','38px'); 
			if($(window).width()>1000){
			$("#ntabboxDiv1").css('left',(($(window).width()-1000)/2)+'px'); 
			$("#ntabboxDiv2").css('left',(($(window).width()-1000)/2)+'px'); 
			$("#ntabboxDiv3").css('left',(($(window).width()-1000)/2)+'px'); 
			$("#ntabboxDiv4").css('left',(($(window).width()-1000)/2)+'px'); 
			$("#ntabboxDiv1 span").css('left',73+'px'); 
			$("#ntabboxDiv2 span").css('left',(73+150)+'px'); 
			$("#ntabboxDiv3 span").css('left',(73+300)+'px'); 
			$("#ntabboxDiv4 span").css('left',(73+450)+'px'); 
			}
		}
	} , function() { //on hover out...
		$(this).find("div").hide(); //Hide the subnav
		if($(this).find("a").size()>1){
			$("#blank1").css('height','0px'); 
		}
	});
});

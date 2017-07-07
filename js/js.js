



/*
........................................
........................................
........................................
.......... Quotes Genaration Part........
........................................
........................................
........................................ 

*/





var person=[" -Dr. Seuss","-Oscar Wilde","-Albert Einstein",
"-Frank Zappa","-Marcus Tullius Cicero","-Mae West","-Mark Twain"];
var quotesArray =["“Don't cry because it's over, smile because it happened.” ", 
"“Be yourself; everyone else is already taken.”",
"“Two things are infinite: the universe and human stupidity;"+
"and I'm not sure about the universe.” ","“So many books, so little time.” ",
"“A room without books is like a body without a soul."
,"“You only live once, but if you do it right, once is enough.” ",
"“If you tell the truth, you don't have to remember anything.”"];



var index=  Math.floor(((quotesArray.length-1)*Math.random())) ;
document.getElementById("quotes").innerHTML = quotesArray[index];

document.getElementById("quotesPerson").innerHTML = person[index];

function grayBlueBlack() {

	document.getElementById("text").style.color = "#1f0d30";
	document.getElementById("text").style.backgroundColor = "#00b1ae";
	document.getElementById("text").style.borderColor = "#8d371e";
	document.getElementById("text").style.fontSize = "20px";
	document.getElementById("text").style.fontFamily = "cursive";

}

function blueAshPurple() {

	document.getElementById("text").style.color = "#581010";
	document.getElementById("text").style.backgroundColor = "#c9ffea";
	document.getElementById("text").style.borderColor = "#536eff";

	document.getElementById("text").style.borderSize = "2px";
	document.getElementById("text").style.fontSize = "20px";
	document.getElementById("text").style.fontFamily = 'Chewy', 'cursive';
	
}

function kathColor() {

	document.getElementById("text").style.color = "#ffffff";
	document.getElementById("text").style.backgroundColor = "#eac786";
	document.getElementById("text").style.borderColor = "#986627";
	document.getElementById("text").style.fontSize = "20px";
	document.getElementById("text").style.fontFamily = 'Indie Flower', 'cursive';
	
}
function orangeYellowGray() {

	document.getElementById("text").style.color = "#581010";
	document.getElementById("text").style.backgroundColor = "#dae121";
	document.getElementById("text").style.borderColor = "#f57a20";
	document.getElementById("text").style.fontSize = "20px";
	document.getElementById("text").style.fontFamily = 'Dancing Script', 'cursive';
	
}



/*
........................................
........................................
........................................
..........   convert...................
........................................
........................................
........................................ 

*/
function convert(formss) {
	var val=document.forms["heroConverter"]["weight"].value;
	//var e=document.getElementById("convertValue");
	var e=formss.vall;
	//alert(e.value);

	if (val==null) 
	{
		window.alert("value field is empty");

	}
	else if((e.value)=="lb"){
		val*=2.2046;
		document.getElementById("convertion_print").innerHTML = val;
	}
	else{
		val*=0.4536;
		document.getElementById("convertion_print").innerHTML = val;
	}
	
	return false;
}




/*
........................................
........................................
........................................
..........mathConvertion................
........................................
........................................
........................................ 

*/

function mathConvertion(argument) {
	var val=document.forms["matheMaticalOperation"]["multipleValue"].value;
	var arr =val.split(",");
	var avg=0;
	for (var i = 0; i < arr.length; i++) 
	{
		var avg=avg+ parseInt(arr[i]);
	}
	
	

	var max=parseInt(arr[0]);
	for (var i = 0; i < arr.length; i++) 
	{
		if(max<(parseInt(arr[i])))
		{
			max=(parseInt(arr[i]));
		}
	}



	var min=parseInt(arr[0]);
	for (var i = 0; i < arr.length; i++) 
	{
		if(min>(parseInt(arr[i])))
		{
			min=(parseInt(arr[i]));
		}
	}
	
	var reverse=arr[arr.length-1];

	for (var i = arr.length-2; i >= 0; i--) 
	{
		reverse=reverse+","+arr[i];
	}


	document.getElementById("max").innerHTML = "Max: "+max;
	document.getElementById("min").innerHTML = "Min: "+min;
	document.getElementById("average").innerHTML = "Average: "+avg;
	document.getElementById("reverse_order").innerHTML = "Reverse: "+reverse;
}


/*
........................................
........................................
........................................
.......... Clear All.....................
........................................
........................................
........................................ 

*/


function ClearAll() {

	document.getElementById("myTextarea").value = "";


} 




/*
........................................
........................................
........................................
.......... Case Toggler................
........................................
........................................
........................................ 

*/
var toggler=true;
function caseToggler() {

	if (toggler) {
		var str = document.getElementById("myTextarea").value;
		var upper=str.toUpperCase();
		document.getElementById("myTextarea").value = upper;
		toggler=false;
	}else{
		var str = document.getElementById("myTextarea").value;
		var upper=str.toLowerCase();
		document.getElementById("myTextarea").value = upper;
		toggler=true;
	}

 	// body...
 }



/*
........................................
........................................
........................................
..........  Sort .................
........................................
........................................
........................................ 

*/
function sort(argument) {
	var str = document.getElementById("myTextarea").value;
	str=str.split("");
	str=str.sort();
	str = str.sort( case_insensitive_comp )
	str=str.join("");
	document.getElementById("myTextarea").value = str;
}




/*
........................................
........................................
........................................
.......... Reverse_Line..................
........................................
........................................
........................................ 

*/
function reverse_Line(argument) {
	var rev="";
 	// body...
 	var arr=(document.getElementById("myTextarea").value).split('\n');
 	var i = 0;
 	for (; i < arr.length; i++) {
 		var reverse =arr[i].split("");
 		for (var c = reverse.length-1; c >=0; c--) {
 			rev=rev+reverse[c];
 		}
 		rev=rev+'\n';
 	} 
 	document.getElementById("myTextarea").value = rev;
 	rev="";

 }


/*
........................................
........................................
........................................
.......... Strip Blank...................
........................................
........................................
........................................ 

*/

var print=""; 
function strip_Blank(argument) {
 	// body...
 	var arr=(document.getElementById("myTextarea").value).split('\n');

 	for (var i = 0; i < arr.length; i++) {
 		
 		if ((arr[i]==null)) 
 		{
 			alert("asd");
 		}
 		else{
 			var space_remove=arr[i].split("");

 			for (var c = 0; c < space_remove.length; c++) {

 				if(space_remove[c]==" ")
 				{

 				}
 				else{
 					print=print+space_remove[c];
 				}

 			}
 			print=print+'\n'

 		}
 	}
 	document.getElementById("myTextarea").value = print;
 	print="";
 }


 var str="";
 var count=1;
 function addNumber() {
 	// body...

 	var arr=(document.getElementById("myTextarea").value).split('\n');
 	for (var i = 0; i < arr.length; i++) {
 		str=str+count+"."+arr[i]+'\n';
 		count++;
 	}
 	document.getElementById("myTextarea").value = str;
 }


 function suffle(){
 	// body...
 	var str="";
 	var check=false;
 	var arr=(document.getElementById("myTextarea").value).split('\n');



 	for (var i = 0; i < arr.length; i++) {
 		var index=  Math.floor(((arr.length-1)*Math.random())) ;
 		for (var c = 0; c < arr.length; c++) {
 			if ((shuffleArr[c]==(arr[index]))) 
 			{
 				check=true;
 			}
 		}
 		
 	}

 	document.getElementById("myTextarea").value=str;
 	str="";
 }
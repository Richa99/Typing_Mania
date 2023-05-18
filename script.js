 const typingTest = document.querySelector(".type_text p");
 inpText = document.querySelector(".wrapper .input_text");
 mistakes= document.querySelector(".mistakes span")
 time_tag=document.querySelector(".time span b")
 cpm_tag=document.querySelector(".cpm span")
 wpm_tag=document.querySelector(".wpm span")
 trybutton=document.querySelector(".tryagain")

let cindx=0 ,timer, maxtime=60;
let timeLeft=maxtime,
mistakecount=0,
istyping=0;

 function randomParagraph(){
 	let randIndex=Math.floor(Math.random()* para.length);
 	typingTest.innerHTML= ""
 	//console.log(para[randIndex].split(""));
 	para[randIndex].split("").forEach(s => {
 		let spanTag= `<span>${s}</span>`;
 		typingTest.innerHTML += spanTag;
 		//console.log(typingTest)
 	});
 	document.addEventListener("keydown",()=> inpText.focus());
 	typingTest.addEventListener("click",()=> inpText.focus());
 }

 function initTyping(){
 	const character= typingTest.querySelectorAll("span");
 	let typed=inpText.value.split("")[cindx];
 	if(cindx<character.length-1 && timeLeft>0){

	 	if(istyping==false){
	 		timer=setInterval(initTime,1000);
	 		istyping=true;
	 	}
	 	
	 	//console.log(typed)
	 	//console.log(character)
	 	if(typed== null){ //for backsapce
	 		cindx--;
	 		if(character[cindx].classList.contains("incorrect")){
	 			mistakecount--;
	 		}
	 		character[cindx].classList.remove("correct","incorrect");

	 	}
	 	else{ // key pressed
	 		if(character[cindx].innerHTML === typed){
		 		//console.log("correct")
		 		character[cindx].classList.add("correct");
		 	}
		 	else{
		 		//console.log("incorrect");
		 		character[cindx].classList.add("incorrect");
		 		mistakecount++;
		 	}
		 	cindx++;
	 	}
	 	let wpm=Math.round((((cindx-mistakecount)/5)/(maxtime-timeLeft))*60)
	 	if(wpm<0||!wpm||wpm===Infinity){
	 		wpm=0;
	 	}
	 	mistakes.innerHTML=mistakecount;
	 	cpm_tag.innerHTML=cindx-mistakecount;
	 	wpm_tag.innerHTML=wpm;
 	} 
 	else{
 		inpText.value="";
 		clearInterval(timer);
 	}
 }

  function initTime(){
  	if(timeLeft>0){
  		timeLeft--;
  		time_tag.innerHTML=timeLeft+"s";
  	}
  	else{
  		alert("Times up!!")
  		clearInterval(timer)
  	}
  }

  function reset(){
  	randomParagraph();
  	timeLeft=maxtime
  	cindx=0
	mistakecount=0
	istyping=0
	mistakes.innerHTML=mistakecount;
	time_tag.innerHTML=timeLeft
	cpm_tag.innerHTML=0;
	wpm_tag.innerHTML=0;
	inpText.value="";
 	clearInterval(timer);

  }

  randomParagraph();
  inpText.addEventListener("input",initTyping)
  trybutton.addEventListener("click", reset)
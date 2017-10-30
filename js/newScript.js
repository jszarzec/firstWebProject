function slideShowElement(name, location, picture ){
    this.name=name;
    this.location=location;
    this.picture="img/"+picture;
    
    this.getImgTag = function(){
   
    var photo = '<img src = " ' + this.picture + '"';
    photo+= 'width = "70%" height = "auto"';
    photo+='class="w3-circle">';
    return photo;
     
    }
    
    this.describe = function(){
        var string = "<br><br><p>" + this.name+ "</p>";
        string+= "<p>" + this.location+"</p>";
        return string;
    }
    
}


/*function getImgTag(){
    
         var output = '<img src="img/mountain.jpg" width = "500px" height = "auto">';
         
         document.getElementById("pictures").innerHTML=output;
}*/

var slides = new Array()

function initSlides()
{
    slides[0]=new slideShowElement("Big Mountain","Silverton, CO.","mountain.jpg");
    slides[1]=new slideShowElement("Snowy Trees","Silverton, CO.","trees.jpg");
    slides[2]=new slideShowElement("Skier","Silverton, CO.","skier.jpg");
}

function display(index){
    var picture = slides[index];
    var output = picture.getImgTag()+picture.describe();
    document.getElementById("pictures").innerHTML = output;
}

var currentSlide = 0;

function nextSlide(){
    currentSlide++;
    if(currentSlide>=slides.length)
        currentSlide=0;
    display(currentSlide);

}


function prevSlide(){
    currentSlide--;
    if(currentSlide<0)
        currentSlide=slides.length-1;
    display(currentSlide);

}

/*Blog Functions*/

/*Blog 0*/

//click header
function showParagraph(){
    
document.getElementById("p0").style.display="inline";
document.getElementById("button").style.display="inline";
document.getElementById("txtCommentOutput").style.display="inline";
document.frmAddComment.style.display='none';

}



//click hide button
function hideParagraph(){
    
    document.getElementById("p0").style.display="none";
    document.getElementById("button").style.display="none";
    document.getElementById("txtCommentOutput").style.display="none";
    document.frmAddComment.style.display='none';
    
}

//click comment button
function showForm(){
    document.frmAddComment.style.display='inline';
    document.getElementById("button").style.display="none";
    
}

function addComment(){
    
    var comment = document.frmAddComment.txtComment.value.trim();
    if(comment==''||comment==null)
    {
        
        alert("Comments cannot be left blank");
        document.frmAddComment.style.display='none';
        document.getElementById("button").style.display="inline";
        return false;
    }
    else
    {
    document.frmAddComment.style.display='none';
    document.getElementById("button").style.display="inline";
    return true;
    }

}

function Comment(comment,name)
{
    this.comment=comment;
    this.name=name;
}

var cmt = new Array();
    
cmt.push(
    new Comment("Excellent Website! please show more ","Jacob"));

cmt.push(
    new Comment("You should be hired as a web developer! ","Jacob"));


function displayComment()
{
    var index;
    
    var output = '';
    for(index=0;index<=cmt.length-1;index++)
    {
        var c = cmt[index];
        output+=c.comment+'<br>';
        output+='<p style="color:red">'+c.name+'</p><br>';
    }

    document.getElementById("txtCommentOutput").innerHTML=output;
}
/********************** Blog 0***************************/

/*Blog1*/

//click header
function showParagraph1(){
    
document.getElementById("p1").style.display="inline";
document.getElementById("button1").style.display="inline";
document.getElementById("txtCommentOutput1").style.display="inline";
document.frmAddComment1.style.display='none';

}



//click hide button
function hideParagraph1(){
    
    document.getElementById("p1").style.display="none";
    document.getElementById("button1").style.display="none";
    document.getElementById("txtCommentOutput1").style.display="none";
    document.frmAddComment1.style.display='none';
    
}

//click comment button
function showForm1(){
    document.frmAddComment1.style.display='inline';
    document.getElementById("button1").style.display="none";
    
}

function addComment1(){
    
    var comment = document.frmAddComment1.txtComment1.value.trim();
    if(comment==''||comment==null)
    {
        
        alert("Comments cannot be left blank");
        document.frmAddComment1.style.display='none';
        document.getElementById("button1").style.display="inline";
        return false;
    }
    else
    {
    document.frmAddComment1.style.display='none';
    document.getElementById("button1").style.display="inline";
    return true;
    }

}

function Comment1(comment,name)
{
    this.comment=comment;
    this.name=name;
}

var cmt1 = new Array();
    
cmt1.push(
    new Comment1("Excellent Website! please show more ","Jacob"));

cmt1.push(
    new Comment1("You should be hired as a web developer! ","Jacob"));


function displayComment1()
{
    var index;
    
    var output = '';
    for(index=0;index<=cmt1.length-1;index++)
    {
        var c = cmt1[index];
        output+=c.comment+'<br>';
        output+='<p style="color:red">'+c.name+'</p><br>';
    }

    document.getElementById("txtCommentOutput1").innerHTML=output;
}

/************************ blog1 *********************************/

/*Blog2*/

//click header
function showParagraph2(){
    
document.getElementById("p2").style.display="inline";
document.getElementById("button2").style.display="inline";
document.getElementById("txtCommentOutput2").style.display="inline";
document.frmAddComment2.style.display='none';

}



//click hide button
function hideParagraph2(){
    
    document.getElementById("p2").style.display="none";
    document.getElementById("button2").style.display="none";
    document.getElementById("txtCommentOutput2").style.display="none";
    document.frmAddComment2.style.display='none';
    
}

//click comment button
function showForm2(){
    document.frmAddComment2.style.display='inline';
    document.getElementById("button2").style.display="none";
    
}

function addComment2(){
    
    var comment = document.frmAddComment2.txtComment2.value.trim();
    if(comment==''||comment==null)
    {
        
        alert("Comments cannot be left blank");
        document.frmAddComment2.style.display='none';
        document.getElementById("button2").style.display="inline";
        return false;
    }
    else
    {
    document.frmAddComment2.style.display='none';
    document.getElementById("button2").style.display="inline";
    return true;
    }

}

function Comment2(comment,name)
{
    this.comment=comment;
    this.name=name;
}

var cmt2 = new Array();
    
cmt2.push(
    new Comment2("Excellent Website! please show more ","Jacob"));

cmt2.push(
    new Comment2("You should be hired as a web developer! ","Jacob"));


function displayComment2()
{
    var index;
    
    var output = '';
    for(index=0;index<=cmt2.length-1;index++)
    {
        var c = cmt2[index];
        output+=c.comment+'<br>';
        output+='<p style="color:red">'+c.name+'</p><br>';
    }

    document.getElementById("txtCommentOutput2").innerHTML=output;
}

/************************ blog2 *********************************/
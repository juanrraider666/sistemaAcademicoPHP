window.onload = function(){
    var bglist=new Array("bg--one", "bg--two", "bg--three", "bg--four", "bg--five");
    $(".login-content").addClass(bglist[Math.floor(Math.random()*bglist.length)]);
}
$(document).ready(function(){
  $("#hide").click(function(){
    document.getElementById('studentform').style.display = 'none';
    document.getElementById('loginform').style.display = 'block';
  });
  $("#show").click(function(){
    document.getElementById('studentform').style.display = 'block';
    document.getElementById('loginform').style.display = 'none';
  });
});

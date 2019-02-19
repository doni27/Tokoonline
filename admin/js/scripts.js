$(document).ready(function() {
    
    $('#selectAllBoxes').click(function(){
        if(this.checked){
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        }
        else{
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });
    
    var div_box ="<div id='load-screen'><div id='loading'></div></div>";
    $("body").prepend(div_box);
    
    $('#load-screen').delay(500).fadeOut(400, function(){
        $(this).remove();
    });
  
    
});

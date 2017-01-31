function change_input(slug,id){
    var quantity=document.querySelector('#input_quantity_'+id).value;
    var port=window.location.port;
    if(window.location.port){
        var url='update/'+slug+'/'+quantity;
        window.location.href=url;
        
    }else{
        var url='update/'+slug+'/'+quantity;
         window.location.href=url;
    }
    
   
}
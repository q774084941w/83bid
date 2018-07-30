jQuery(function(){
    for(var i =1; i< 7; i++){
        jQuery(".balloon").eq(i-1).css("background","url("+ mypublic +"/Home/Images/intro/"+ i +".png) no-repeat");
    }
        jQuery(".balloon").eq(0).animate({width:"85px"},1000,function(){
            jQuery(this).next().fadeIn(1000,function(){
                jQuery(".arrow").eq(0).animate({width:"17px"},1000,function(){
                    jQuery(".balloon").eq(1).animate({width:"85px"},1000,function(){
                        jQuery(this).next().fadeIn(1000,function(){
                            jQuery(".arrow").eq(1).animate({width:"17px"},1000,function(){
                                jQuery(".balloon").eq(2).animate({width:"85px"},1000,function(){
                                    jQuery(this).next().fadeIn(1000,function(){
                                                
                                    })
                                })            
                            })     
                        })    
                    })        
                })       
            })    
        })
        
        jQuery(".balloon").eq(3).animate({width:"85px"},1000,function(){
            jQuery(this).next().fadeIn(1000,function(){
                jQuery(".arrow").eq(2).animate({width:"17px"},1000,function(){
                    jQuery(".balloon").eq(4).animate({width:"85px"},1000,function(){
                        jQuery(this).next().fadeIn(1000,function(){
                            jQuery(".arrow").eq(3).animate({width:"17px"},1000,function(){
                                jQuery(".balloon").eq(5).animate({width:"85px"},1000,function(){
                                    jQuery(this).next().fadeIn(1000,function(){
                                                
                                    })
                                })            
                            })     
                        })    
                    })        
                })       
            })    
        })
        //}
    //})                     
})

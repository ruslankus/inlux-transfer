jQuery(document).ready(function(){


    /*
    jQuery(".menu-slide-down").click(function(){
        var sum_len = 0;
        var arr_links = jQuery(this).find("a");

        for(i=0; i < arr_links.length; i++)
        {
            sum_len += jQuery(arr_links[i]).height();
        }

//        jQuery(this).css({height:sum_len+arr_links.length+60+"px"});
        jQuery(this).animate({height:sum_len+arr_links.length+60+"px"},200);
    });

    jQuery(".menu-slide-down").mouseleave(function(){},function(){jQuery(this).css({height:60+"px"});});
    */



    jQuery(".menu-slide-down").hover(function(){
        var sum_len = 0;
        var arr_links = jQuery(this).find("a");

        for(i=0; i < arr_links.length; i++)
        {
            sum_len += jQuery(arr_links[i]).height();
        }

        jQuery(this).css({height:sum_len+arr_links.length+60+"px"});

    },
        function(){jQuery(this).css({height:60+"px"});}
    );

});
jQuery(document).ready(function(){

    // D E L E T I N G

    jQuery(".del-link").click(function(){
        var link = jQuery(this).attr('href');
        jQuery(".dialog").dialog({

            title: 'Удалить',
            text: 'Вы действительно хотите удалить этот элемент ?',
            resizable:false,
            modal:true,
            buttons:{
                "Удалить": function(){
                    window.location = link;
                },
                "Отмена": function(){
                    $(this).dialog( "close" );
                }
            }
        });

        jQuery(".dialog").html("Вы действительно хотите удалить этот элемент ?");

        return false;
    });


    // F I E L D  V A L I D A T I O N (E M P T Y)
});
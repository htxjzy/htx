jQuery(document).ready(function() {  
    //bs_upload_button为上传按钮的class  
    jQuery('input.bs_upload_button').click(function() {  
        //input为文本域  
         targetfield = jQuery(this).prev('input');  
         tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');  
         return false;  
    });  
      
    window.send_to_editor = function(html) {  
         imgurl = jQuery('img',html).attr('src');  
         jQuery(targetfield).val(imgurl);  
         tb_remove();  
    }  
      
});
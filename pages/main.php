<?php

html_robots_noindex();

layout_page_header_begin($_GET['title'] ? $_GET['title'] : plugin_lang_get('title'));

layout_page_header_end();

layout_page_begin(__FILE__);

$t_url = $_GET['url'];

?>

<script type="text/javascript">
    var hasLoaded = 0;
    function autoResize(id) 
    {
        var elem = document.getElementById(id);
        var newheight = 0;
        var contHeight = window.innerHeight - 260; // minus header/footer height
        try {
            if (hasLoaded) { // reset height, otherwise if last page had height > new page, sizing gets messed up
                elem.height = contHeight;     // and resizes too much height
            }
            newheight = document.getElementById(id).contentWindow.document.body.scrollHeight + 35;
        }
        catch (e) {
            // probably cross-domain iframe error
            console.log(e);
        }
        
        if (newheight < contHeight) {
            newheight = contHeight;
        }

        elem.height = newheight + "px";

        hasLoaded = 1;
    }
</script>

<?php

if (strstr($t_url, "gist-it.appspot.com") == FALSE)
{
    echo '<div style="width:98%;margin-left:auto;margin-right:auto;">
        <iframe onLoad="autoResize(\'iframed\');" style="border:0;margin-left:15px;margin-right:15px;" border="0" id="iframed" name="iframed" src="'.$t_url.'" width="98%"></iframe>
    </div>';
}
else
{
    echo '<div style="width:98%;margin-left:auto;margin-right:auto;">
        <!--<div style="margin-left:15px;margin-right:auto;">-->
        <script src="'.$t_url.'"></script>
    </div>';
}

layout_page_end();
?>
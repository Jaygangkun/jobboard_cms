<pre>
<code>
&lt;script type="text/javascript"&gt;
    var employer_link = $('.jobDetail-headerMedia a').attr('href');
    var employer_links = employer_link.split('/employers/');

    if(employer_links.length > 1){
        employer_link = employer_links[1];
    }
    else{
        employer_link = employer_links[0];
    }
    let myScript = document.createElement("script");
    myScript.setAttribute("src", '<?php echo $site_url?>script/<?php echo $site_id?>/' + employer_link);
    document.body.appendChild(myScript);
&lt;/script&gt;
</code>
</pre>
<?php $view = get_view(); ?>

<div id="googleanalyticserr_form">
<?php 
echo $view->formLabel(
        GOOGLE_ANALYTICS_ACCOUNT_OPTION, 
            'Google Analytics Account ID:'
        );
echo $view->formText(
        GOOGLE_ANALYTICS_ACCOUNT_OPTION, 
            get_option(GOOGLE_ANALYTICS_ACCOUNT_OPTION),
                array(
                            'rows' => '15',
                                    'cols' => '80'
                                        ));
?>
</div>

<p>To find you Google Analytics Account ID, follow these steps:</p>
<ol style="list-style: decimal inside;">
<li>Create or log into 
<a href="https://www.google.com/analytics/" target="_blank">Google Analytics</a> account;
</li>
<li> Add a &quot;Website Profile&quot; for this Omeka.net website;</li>
<li>Copy the value for the account ID found next to the site URL (starts with &quot;UA-&quot;);</li>
<li>Paste it into the text field above and save changes.</li>
</ol>


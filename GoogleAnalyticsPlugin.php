<?php
define('GOOGLE_ANALYTICS_PLUGIN_DIR', dirname(__FILE__));
define('GOOGLE_ANALYTICS_ACCOUNT_OPTION', 'googleanalytics_account_id');

class GoogleAnalyticsPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'uninstall',
        'public_head',
        'config',
        'config_form'
    );

    protected $_filters = array();

    public function hookUninstall()
    {
        delete_option(GOOGLE_ANALYTICS_ACCOUNT_OPTION);
    }

    public function hookPublicHead()
    {
        $accountId = get_option(GOOGLE_ANALYTICS_ACCOUNT_OPTION);
        if (empty($accountId)) {
            return;
        }

        $js = file_get_contents(GOOGLE_ANALYTICS_PLUGIN_DIR . '/snippet.js');
        $escapedId = js_escape($accountId);
        $html = sprintf('
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160365497-1"></script>
                <script>
                    var analyticsId = %s;
                    %s
                </script>', $escapedId, $js);

        echo $html;
    }

    public function hookConfig($args)
    {
        $post = $args['post'];
        set_option(
            GOOGLE_ANALYTICS_ACCOUNT_OPTION,
            $post[GOOGLE_ANALYTICS_ACCOUNT_OPTION]
        );
    }

    public function hookConfigForm()
    {
        include GOOGLE_ANALYTICS_PLUGIN_DIR . '/config_form.php';
    }
}

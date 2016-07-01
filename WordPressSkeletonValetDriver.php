<?php
class WordPressSkeletonValetDriver extends BasicValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return (file_exists($sitePath.'/local-config.php') && is_dir($sitePath.'/wp'));
    }
    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        $_SERVER['PHP_SELF']    = $uri;
        $_SERVER['SERVER_ADDR'] = '127.0.0.1';
        return parent::frontControllerPath($sitePath, $siteName, $uri);
    }
}

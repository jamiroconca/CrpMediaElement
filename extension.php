<?php
/**
 * MediaElement.js Extension for Bolt, by Daniele Conca <conca.daniele@gmail.com>
 *
 * @copyright Daniele Conca 2013 - MediaElement.js extension for Bolt
 * @author Daniele Conca <conca.daniele@gmail.com>
 */
namespace CrpMediaElement;

class Extension extends \Bolt\BaseExtension
{

    /**
     * Info block for MediaElement.js Extension.
     */
    function info()
    {
        $data = array(
            'name' => "MediaElement.js",
            'description' => "A small Bolt extension for a HTML5 audio and video players in pure HTML and CSS.",
            'keywords' => "Bolt,MediaElement,jQuery",
            'author' => "Daniele Conca",
            'link' => "https://github.com/jamiroconca",
            'version' => "0.1",
            'required_bolt_version' => "1.2.1",
            'highest_bolt_version' => "1.2.1",
            'type' => "General",
            'first_releasedate' => "2013-11-20",
            'latest_releasedate' => "2013-11-20",
            'dependencies' => "",
            'priority' => 10
        );

        return $data;
    }

    /**
     * Initialize Media Element.
     * Called during bootstrap phase.
     */
    function initialize()
    {

        // If yourextension has a 'config.yml', it is automatically loaded.
        // $foo = $this->config['bar'];

        // Make sure jQuery is included
        $this->addJquery();

        // Add javascript file
        $this->addJavascript("assets/mediaelement-and-player.min.js");

        // Add CSS file
        $this->addCSS("assets/mediaelementplayer.min.css");

        $this->addTwigFunction('mediaelementplayer', 'mediaElementPlayer');
    }

    public function mediaElementPlayer($src=null)
    {

        // code from: https://twitter.com/about/resources/buttons#tweet
        $html = <<< EOM
		<audio src="%src%"></audio>
		<script>
		// using jQuery
		$('video,audio').mediaelementplayer(/* Options */);
		</script>
EOM;

        $html = str_replace("%src%", $src, $html);

        return new \Twig_Markup($html, 'UTF-8');
    }
}



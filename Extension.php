<?php

namespace Bolt\Extension\jamiroconca\CrpMediaElement;

class Extension extends BaseExtension
{
  

    public function initialize() {
    	if ($this->app['config']->getWhichEnd() == 'frontend') {
    		$this->addJquery();
            // Add javascript file
            $this->addJavascript("assets/mediaelement-and-player.min.js", true);
            // Add CSS file
            $this->addCSS("assets/mediaelementplayer.min.css");
            $this->addTwigFunction('mediaelementplayer', 'mediaElementPlayer');
    	}
    }

    public function getName()
    {
        return "CrpMediaElement";
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







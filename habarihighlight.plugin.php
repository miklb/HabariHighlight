<?php

class HabariHighlight extends Plugin {
	public function action_template_header () 
	{
		Stack::add('template_stylesheet','http://yandex.st/highlightjs/8.0/styles/github.min.css','highlight');
		Stack::add('template_header_javascript','http://yandex.st/highlightjs/8.0/highlight.min.js','highlightjs');
		Stack::add('template_header_javascript',$this->get_url() . '/habarihighlight.js', 'hljs', 'highlightjs');
	}

}

?>
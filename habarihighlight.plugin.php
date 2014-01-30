<?php

class HabariHighlight extends Plugin 

{
	public function action_template_header () 
	{
		Stack::add('template_stylesheet','http://yandex.st/highlightjs/8.0/styles/'. Options::get('habarihighlight_theme') .'.min.css','highlight');
		Stack::add('template_footer_javascript','http://yandex.st/highlightjs/8.0/highlight.min.js','highlightjs');
		Stack::add('template_footer_javascript','hljs.initHighlightingOnLoad();', 'hljs', 'highlightjs');
	}

	/**
	 * Adds a Configure action to the plugin
	 *
	 * @param array $actions An array of actions that apply to this plugin
	 * @param string $plugin_id The id of a plugin
	 * @return array The array of actions
	 */
	public function filter_plugin_config( $actions, $plugin_id )
	{
		if ( $this->plugin_id() == $plugin_id ){
			$actions[]= 'Configure';
		}
		return $actions;
	}

	/**
	 * Creates a UI form to handle the plugin configuration
	 *
	 * @param string $plugin_id The id of a plugin
	 * @param array $actions An array of actions that apply to this plugin
	 */
	public function action_plugin_ui( $plugin_id, $action )
	{
		if ( $this->plugin_id()==$plugin_id && $action=='Configure' ) {
			$form = new FormUI( strtolower(get_class( $this ) ) );
			$form->append( 'select', 'highlighttheme', 'option:habarihighlight_theme', _t('Choose Highlight.js Theme'));
			$form->highlighttheme->options = array (
				'default'=>'Default',
				'arta'=>'Arta',
				'ascetic'=>'Ascetic',
				'atelier-dune' => 'Atelier Dune',
				'atelier-forest.dark' => 'Atelier Forest, Dark',
				'atelier-forest.light' => 'Atelier Forest, Light',
				'atelier-heath.dark' => 'Atelier Heath, Dark',
				'atelier-heath.light' => 'Atelier Heath, Light',
				'atelier-lakeside.dark' => 'Atelier Lakeside, Dark',
				'atelier-lakeside.light' => 'Atelier Lakeside, Light',
				'atelier-seaside.dark' => 'Atelier Seaside, Dark',
				'atelier-seaside.light' => 'Atelier Seaside, Light',
				'brown_paper' => 'Brown Paper',
				'dark' => 'Dark',
				'docco' => 'Docco',
				'far' => 'Far',
				'foundation' => 'Foundation',
				'github' => 'Github',
				'googlecode' => 'Google Code',
				'ir_black'=> 'IR Black',
				'magula' => 'Magula',
				'mono-blue' => 'Mono Blue',
				'monokai' => 'Monokai',
				'monokai_sublime' => 'Monokai Sublime',
				'obsidian' => 'Obsidian',
				'paraiso.dark' => 'Paraiso Dark',
				'paraiso.light' => 'Paraiso Light',
				'pojoaque' => 'Pojoaque',
				'railscasts' => 'Railscasts',
				'rainbow' => 'Rainbow',
				'school_book' => 'School Book',
				'solarized_dark' => 'Solarized Dark',
				'solarized_light' => 'Solarized Light',
				'tomorrow' => 'Tommorow',
				'tomorrow-night' => 'Tommorow Night',
				'tomorrow-night-blue' => 'Tommorow Night, Blue',
				'tomorrow-night-bright' => 'Tommorow Night, Bright',
				'tomorrow-night-eighties' => 'Tommorow Night, Eighties',
				'vs' => 'VS',
				'xcode' => 'XCode',
				'zenburn' => 'Zenburn'
			);
			$form->highlighttheme->value = 'default';
			$form->append( 'submit', 'save', _t( 'Save' ) );
			$form->out();
		}
	}
}
?>

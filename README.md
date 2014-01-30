# Habari Highlight #

A drop dead simple Habari plugin to load the [highlight.js](https://github.com/isagalaev/highlight.js) library.

## Usage ##
This will highlight all code on the page marked up as `<pre><code> .. </code></pre>`.

If you are using HabariMarkdown plugin, you can simply use a code fence:

`~~~`

Your code here.

`~~~`

Additionally, you can apply a class to the `<code class="php">` to help highlight.js know what language you are using (though I believe the script has ability to detect common languages and attempts to apply.)

Again, if using Markdown, to set the class it is as easy as

 `~~~php`
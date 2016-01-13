<!DOCTYPE html>

<html>

    <head>
        <title>PageDown Demo Page</title>
        
        <link rel="stylesheet" href="{{URL::to('assets')}}/pagedown/demo.css" rel="stylesheet">
        
    <script src="{{URL::to('assets')}}/pagedown/Markdown.Converter.js"></script>
    <script src="{{URL::to('assets')}}/pagedown/Markdown.Sanitizer.js"></script>
    <script src="{{URL::to('assets')}}/pagedown/Markdown.Editor.js"></script>
    </head>
    
    <body>
        <div class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <textarea class="wmd-input" id="wmd-input">
This is the *second* editor.
------------------------------

It has a plugin hook registered that surrounds all words starting with the
letter A with asterisks before doing the Markdown conversion. Another one gives bare links
a nicer link text. User input isn't sanitized here:

<marquee>I'm the ghost from the past!</marquee>

http://google.com

http://stackoverflow.com

It also includes a help button.

Finally, note that when you press Ctrl-Q or click the "Blockquote" button (without having a
selection), this editor creates an example text that's different from the first editor.
</textarea>
        </div>
        <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
        
        <br /> <br />
        
        <div class="wmd-panel">
            <div id="wmd-button-bar-second"></div>
            <textarea class="wmd-input" id="wmd-input-second">
This is the *second* editor.
------------------------------

It has a plugin hook registered that surrounds all words starting with the
letter A with asterisks before doing the Markdown conversion. Another one gives bare links
a nicer link text. User input isn't sanitized here:

<marquee>I'm the ghost from the past!</marquee>

http://google.com

http://stackoverflow.com

It also includes a help button.

Finally, note that when you press Ctrl-Q or click the "Blockquote" button (without having a
selection), this editor creates an example text that's different from the first editor.
</textarea>
        </div>
        <div id="wmd-preview-second" class="wmd-panel wmd-preview"></div>


        <script type="text/javascript">
            (function () {
                var converter1 = Markdown.getSanitizingConverter();
                
                converter1.hooks.chain("preBlockGamut", function (text, rbg) {
                    return text.replace(/^ {0,3}""" *\n((?:.*?\n)+?) {0,3}""" *$/gm, function (whole, inner) {
                        return "<blockquote>" + rbg(inner) + "</blockquote>\n";
                    });
                });
                
                var editor1 = new Markdown.Editor(converter1);
                
                editor1.run();
                
                var converter2 = new Markdown.Converter();

                converter2.hooks.chain("preConversion", function (text) {
                    return text.replace(/\b(a\w*)/gi, "*$1*");
                });

                converter2.hooks.chain("plainLinkText", function (url) {
                    return "This is a link to " + url.replace(/^https?:\/\//, "");
                });
                
                var help = function () { alert("Do you need help?"); }
                var options = {
                    helpButton: { handler: help },
                    strings: { quoteexample: "whatever you're quoting, put it right here" }
                };
                var editor2 = new Markdown.Editor(converter2, "-second", options);
                
                editor2.run();
            })();
        </script>
    </body>
</html>

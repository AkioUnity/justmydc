<!--font styles-->
<link rel="stylesheet prefetch prerender" href="https://cdn.rawgit.com/tonsky/FiraCode/1.206/distr/fira_code.css" data-noprefix>
<link rel="stylesheet prefetch prerender" href="https://fonts.googleapis.com/css?family=Source+Code+Pro:400,700" data-noprefix>

<!--jquery ui styles-->
<link rel="stylesheet" href="./css/jquery-ui.min.css">
<link rel="stylesheet" href="./css/jquery-ui.structure.min.css">

<!--codemirror styles-->
<link rel="stylesheet" href="./codemirror/lib/codemirror.css">
<link rel="stylesheet" href="./codemirror/addon/fold/foldgutter.css">
<link rel="stylesheet" href="./codemirror/addon/scroll/simplescrollbars.css">
<link rel="stylesheet" href="./codemirror/addon/lint/lint.css">
<link rel="stylesheet" href="./codemirror/theme/dracula.css">

<!--requried styles-->
<link rel="stylesheet" href="./css/styles.css">

<!--html5 shiv-->
<!--[if lt IE 9]><script src="./js/html5shiv-printshiv.min.js"></script><![endif]-->

<!--required scripts-->
<!--<script src="./js/prefixfree.min.js"></script>-->
<!--<script src="./js/jquery.min.js"></script>-->
<!--<script src="./js/jquery-ui.min.js"></script>-->
<script src="https://unpkg.com/htmlhint@0.10.3/lib/htmlhint.js"></script>
<script src="https://unpkg.com/csslint@1.0.5/dist/csslint.js"></script>
<script src="https://unpkg.com/jshint@2.10.2/dist/jshint.js"></script>

<!--codemirror main-->
<script src="./codemirror/lib/codemirror.js"></script>

<!--codemirror modes-->
<script src="./codemirror/mode/xml/xml.js"></script>
<script src="./codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="./codemirror/mode/css/css.js"></script>
<script src="./codemirror/mode/javascript/javascript.js"></script>

<!--codemirror addons-->
<script src="./codemirror/addon/fold/xml-fold.js"></script>
<script src="./codemirror/addon/fold/foldcode.js"></script>
<script src="./codemirror/addon/fold/foldgutter.js"></script>
<script src="./codemirror/addon/fold/brace-fold.js"></script>
<script src="./codemirror/addon/edit/matchtags.js"></script>
<script src="./codemirror/addon/edit/matchbrackets.js"></script>
<script src="./codemirror/addon/edit/closetag.js"></script>
<script src="./codemirror/addon/edit/closebrackets.js"></script>
<script src="./codemirror/addon/edit/trailingspace.js"></script>
<script src="./codemirror/addon/scroll/simplescrollbars.js"></script>
<script src="./codemirror/addon/selection/active-line.js"></script>
<script src="./codemirror/addon/comment/comment.js"></script>
<script src="./codemirror/addon/lint/lint.js"></script>
<script src="./codemirror/addon/lint/html-lint.js"></script>
<script src="./codemirror/addon/lint/css-lint.js"></script>
<script src="./codemirror/addon/lint/javascript-lint.js"></script>

<!--codemirror keymap-->
<script src="./codemirror/keymap/sublime.js"></script>

<!--twitter typeahead-->
<script src="./js/typeahead.bundle.min.js"></script>

<!--emmet-->
<script async src="./js/emmet.min.js"></script>


<!--font awesome-->
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/solid.js" integrity="sha384-IA6YnujJIO+z1m4NKyAGvZ9Wmxrd4Px8WFqhFcgRmwLaJaiwijYgApVpo1MV8p77" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/fontawesome.js" integrity="sha384-EMmnH+Njn8umuoSMZ3Ae3bC9hDknHKOWL2e9WJD/cN6XLeAN7tr5ZQ0Hx5HDHtkS" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

<!--begin wrapper-->
<div id="wrapper" style="padding: 1rem">
    <textarea id='editor'>var editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
    mode: "javascript",
    lineNumbers: true,
});
    editor.save()
    </textarea>
    <section id="editor">
        <div class="code-pane">
            <div class="code-pane-html">
                <textarea id="htmlcode" name="htmlcode"></textarea>
            </div>
        </div>
    </section>
</div>

<script>
    var editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
        mode: "javascript",
        lineNumbers: true,
    });
    editor.save()
</script>

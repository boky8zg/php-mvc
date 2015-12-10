<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{app-name}}{{subtitle}}</title>

        <link rel="stylesheet" href="//{{root}}/css/bootstrap.min.css" />
        <link rel="stylesheet" href="//{{root}}/css/jumbotron-narrow.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//{{root}}/js/bootstrap.min.js"></script>
        <script src="//{{root}}/js/String.format.js"></script>
        <script src="//{{root}}/js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                    <?php starteach(Menu()); ?>
                        <li role="presentation" {{active}}><a href="//{{root}}{{href}}">{{text}}</a></li>
                    <?php endeach(); ?>
                    </ul>
                </nav>
                <h3 class="text-muted">{{app-name}}{{subtitle}}</h3>
            </div>

            {{content}}

            <footer class="footer">
                <p>&copy; 2015 Company, Inc.</p>
            </footer>

        </div>
    </body>
</html>
<div id="menu">
    <ul>
<?php starteach($data, 'text'); ?>
        <li><a href="#">{{text}}</a></li>
<?php endeach(); ?>
    </ul>
</div>
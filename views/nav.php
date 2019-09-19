<nav>
    <ul>
        <?php var_dump(App\DI::$router->getUri()); ?>
        <li><a href="/">home</a></li>
        <li><a href="/page1">page 1</a></li>
        <li><a href="/page2">page 2</a></li>
    </ul>
</nav>
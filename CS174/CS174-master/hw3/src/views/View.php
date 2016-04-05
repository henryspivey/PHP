<?php

namespace spivotron\hw3\views;

abstract class View {
    /**
     * This method should be overriden to draw a web page to the browser
     */
    public abstract function render($data);
}

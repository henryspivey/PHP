<?php
namespace spivotron\hw3\views\elements;

use spivotron\hw3\controllers as c;
require_once "src/controllers/Controller.php";


/**
 * Base class for all Elements used in hw3
 */
abstract class Element{

    public function __construct($view) {
        $this->view = view($view);
    }
    /**
     * This method should be overriden
     */
    public abstract function render($data);
}

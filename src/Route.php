<?php namespace AdamWathan\FluentRouter;

class Route
{
    public $uri;
    public $extras = [];

    public function __construct($uri, $uses = null)
    {
        $this->uri = $uri;
        if (is_array($uses)) {
            $this->extras = $uses;
        } else {
            $this->uses($uses);
        }
    }

    public function __call($method, $args)
    {
        if (count($args) === 1) {
            $args = $args[0];
        }
        $this->extras[$method] = $args;
        return $this;
    }
}

<?php

namespace zest\types;

abstract class AbstractType {
    abstract public function name();
    abstract public function extension();
    abstract public function encoder();
}
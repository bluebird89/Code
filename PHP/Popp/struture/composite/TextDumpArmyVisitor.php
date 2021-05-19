<?php


namespace Popp\struture\composite;

class TextDumpArmyVisitor extends ArmyVisitor
{
    private string $text = '';

    public function visit(Unit $node)
    {
        $ret = '';
        $pad = 2 * $node->getDepth();
        $ret .= sprintf("%{$pad}s", "");
        $ret .= basename(str_replace('\\', '/', get_class($node))).': ';
        $ret .= 'bombard:'.$node->bombardStrength().PHP_EOL;
        $this->text .= $ret;
    }

    public function getText()
    {
        return $this->text;
    }
}

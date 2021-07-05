<?php

namespace Tests\DesignPatterns;

use PHPUnit\Framework\TestCase;
use DesignPatterns\Structural\Composite;

class CompositeTest extends TestCase
{
    public function testRender()
    {
        $form = new Composite\Form();
        $form->addElement(new Composite\TextElement());
        $form->addElement(new Composite\InputElement());
        $embed = new Composite\Form();
        $embed->addElement(new Composite\TextElement());
        $embed->addElement(new Composite\InputElement());
        $form->addElement($embed);  // 这里我们添加一个嵌套树到表单

        $this->assertRegExp('#^\s{4}#m', $form->render());
    }

    /**
     * 组合模式最关键之处在于如果你想要构建组件树每个组件必须实现组件接口
     */
    public function testFormImplementsFormElement()
    {
        $className = 'DesignPatterns\Structural\Composite\Form';
        $abstractName = 'DesignPatterns\Structural\Composite\FormElement';
        $this->assertTrue(is_subclass_of($className, $abstractName));
    }
}

<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* common/sidebar_box.twig */
class __TwigTemplate_e0b1cd73ff002e068564241076ad0bcee06357bde718f414f65de1b5ab2663f5 extends \XLite\Core\Templating\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 4
        echo "
<div class=\"";
        // line 5
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getBlockClasses", [], "method"), "html", null, true);
        echo "\">
  ";
        // line 6
        if ($this->getAttribute(($context["this"] ?? null), "getHead", [], "method")) {
            // line 7
            echo "  <h3>";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), [$this->getAttribute(($context["this"] ?? null), "getHead", [], "method")]), "html", null, true);
            echo "</h3>
  ";
        }
        // line 9
        echo "  <div class=\"content\">";
        $fullPath = \XLite\Core\Layout::getInstance()->getResourceFullPath($this->getAttribute(($context["this"] ?? null), "getBody", [], "method"));        list($templateWrapperText, $templateWrapperStart) = $this->getThis()->startMarker($fullPath);
        if ($templateWrapperText) {
echo $templateWrapperStart;
}

        $this->loadTemplate($this->getAttribute(($context["this"] ?? null), "getBody", [], "method"), "common/sidebar_box.twig", 9)->display($context);
        if ($templateWrapperText) {
            echo $this->getThis()->endMarker($fullPath, $templateWrapperText);
        }
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "common/sidebar_box.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 9,  39 => 7,  37 => 6,  33 => 5,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "common/sidebar_box.twig", "/home/vagrant/next/output/xcart/src/skins/crisp_white/customer/common/sidebar_box.twig");
    }
}

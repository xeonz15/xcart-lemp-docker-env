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

/* common/tooltip.twig */
class __TwigTemplate_590b9b8333c4c42c49012df15ace1d761e3b9b966ea49b043fc7128d1e85c96d extends \XLite\Core\Templating\Twig\Template
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
";
        // line 5
        ob_start(function () { return ''; });
        // line 6
        echo "  <span
      data-toggle=\"popover\"
      data-trigger=\"";
        // line 8
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getTrigger", [], "method"), "html", null, true);
        echo "\"
      data-placement=\"";
        // line 9
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getParam", [0 => "placement"], "method"), "html", null, true);
        echo "\"
      data-content=\"";
        // line 10
        if ($this->getAttribute(($context["this"] ?? null), "getParam", [0 => "helpWidget"], "method")) {
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getParam", [0 => "helpWidget"], "method"), "html", null, true);
        } else {
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getParam", [0 => "text"], "method"), "html", null, true);
        }
        echo "\"
      data-html=\"true\"
      data-help-id=\"";
        // line 12
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getHelpId", [], "method"), "html", null, true);
        echo "\"
      data-delay=\"";
        // line 13
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getDelay", [], "method"), "html", null, true);
        echo "\"
      data-keep-on-hover=\"";
        // line 14
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "isKeepOnHover", [], "method"), "html", null, true);
        echo "\"
      v-xlite-tooltip
      class=\"tooltip-main\">
";
        // line 17
        if ($this->getAttribute(($context["this"] ?? null), "isImageTag", [], "method")) {
            // line 18
            echo "  <i ";
            echo $this->getAttribute(($context["this"] ?? null), "getAttributesCode", [], "method");
            echo "></i>
";
        } else {
            // line 20
            echo "  <span ";
            echo $this->getAttribute(($context["this"] ?? null), "getAttributesCode", [], "method");
            echo ">";
            echo $this->getAttribute(($context["this"] ?? null), "getParam", [0 => "caption"], "method");
            echo "</span>
";
        }
        // line 22
        echo "</span>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "common/tooltip.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 22,  78 => 20,  72 => 18,  70 => 17,  64 => 14,  60 => 13,  56 => 12,  47 => 10,  43 => 9,  39 => 8,  35 => 6,  33 => 5,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "common/tooltip.twig", "/var/www/xcart/skins/admin/common/tooltip.twig");
    }
}

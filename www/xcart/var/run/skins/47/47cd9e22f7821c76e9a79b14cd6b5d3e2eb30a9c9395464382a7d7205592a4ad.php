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

/* main_center/page_container_parts/header_parts/storefront_status.twig */
class __TwigTemplate_4b9c129eeee7009d4ac90c1a47db998313d54da13ec8510f4a7aab552f46d509 extends \XLite\Core\Templating\Twig\Template
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
<div ";
        // line 5
        echo $this->getAttribute(($context["this"] ?? null), "printTagAttributes", [0 => $this->getAttribute(($context["this"] ?? null), "getContainerTagAttributes", [], "method")], "method");
        echo ">
  ";
        // line 6
        if ($this->getAttribute(($context["this"] ?? null), "isTogglerVisible", [], "method")) {
            // line 7
            echo "    <a href=\"";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getLink", [], "method"), "html", null, true);
            echo "\" ";
            echo $this->getAttribute(($context["this"] ?? null), "printTagAttributes", [0 => $this->getAttribute(($context["this"] ?? null), "getTogglerTagAttributes", [], "method")], "method");
            echo "><div><span class=\"svg\">";
            echo $this->getAttribute(($context["this"] ?? null), "getSVGImage", [0 => "images/check.svg"], "method");
            echo "</span></div></a>
  ";
        }
        // line 9
        echo "  <a href=\"";
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getOpenedShopURL", [], "method"), "html", null, true);
        echo "\" class=\"link opened\" target=\"_blank\">";
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["View storefront"]), "html", null, true);
        echo "</a>
  <a href=\"";
        // line 10
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getClosedShopURL", [], "method"), "html", null, true);
        echo "\" class=\"link closed\" target=\"_blank\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"";
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Private link"]), "html", null, true);
        echo "\">
    ";
        // line 11
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Storefront is closed"]), "html", null, true);
        echo "
  </a>
  ";
        // line 14
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "main_center/page_container_parts/header_parts/storefront_status.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 14,  62 => 11,  56 => 10,  49 => 9,  39 => 7,  37 => 6,  33 => 5,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "main_center/page_container_parts/header_parts/storefront_status.twig", "/var/www/xcart/skins/admin/main_center/page_container_parts/header_parts/storefront_status.twig");
    }
}
